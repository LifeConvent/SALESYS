<?php
/**
 * Created by PhpStorm.
 * User: lawrance
 * Date: 2016/11/30
 * Time: 上午9:54
 */

namespace Home\Controller;

use Think\Controller;

class DataManageController extends Controller
{

    public function userCourse()
    {
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        if ($result) {
            $method = new MethodController();
            $table = $method->getTableStruct();
            $DBtable = '<option value="0">|----     无</option>';
            foreach ($table AS $key => $val) {
                $DBtable .= '<option value="'.$val.'">'. '|----    ' .$val.'</option>';
            }
            $this->assign('username', $username);
            $this->assign('DBtable', $DBtable);
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function sysCourse()
    {
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        if ($result) {
            $this->assign('username', $username);
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function userInfo()
    {
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        if ($result) {
            $this->assign('username', $username);
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    /**
     * 问卷结果统计
     */
    public function surveyCount()
    {
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        if ($result) {
            $this->assign('username', $username);
            $group = M('survey_group');
            $select = $group->select();
            $content = '<option value="-1">|---- 无</option>';
            for ($i = 0; $i < sizeof($select); $i++) {
                $content .= '<option value="' . $select[$i]['group_id'] . '">' . '|----' . $select[$i]['group_name'] . '</option>';
            }
            $this->assign('groupSelectList', $content);
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function qrcode()
    {
        $save_path = isset($_GET['save_path']) ? $_GET['save_path'] : 'Public/qrcode/';  //图片存储的绝对路径
        $web_path = isset($_GET['save_path']) ? $_GET['web_path'] : 'Public/qrcode/';        //图片在网页上显示的路径
        $qr_data = isset($_GET['qr_data']) ? $_GET['qr_data'] : 'http://www.zetadata.com.cn/';
        $qr_level = isset($_GET['qr_level']) ? $_GET['qr_level'] : 'H';
        $qr_size = isset($_GET['qr_size']) ? $_GET['qr_size'] : '10';
        $save_prefix = isset($_GET['save_prefix']) ? $_GET['save_prefix'] : 'ZETA';
        if ($filename = \createQRcode($save_path, $qr_data, $qr_level, $qr_size, $save_prefix)) {
            $pic = $web_path . $filename;
        }
        echo "<img src='../../../$pic'>";
    }


    public function outputResult()
    {
        $survey_id = I('get.s_i');
//        $survey_id = '1480748407';
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        if ($result) {
            $survey_answer = M('survey_answer');
            $condition_survey['survey_id'] = "$survey_id";
            $result_answer = $survey_answer->where($condition_survey)->order('question_id ASC')->select();
            $temp = 1;

            $survey = M('survey');
            $condition_survey['survey_id'] = "$survey_id";
            $result = $survey->where($condition_survey)->select();
            $string = $result[0]['question'];
            $survey_name = $result[0]['name'];
            $que_list = M('survey_question');
            /**
             * 当前问卷的所有问题
             */
            $result_question = $que_list->where('question_id IN (' . $string . ')')->select();
            $string = explode(',', $string);
            $count = sizeof($string);

            foreach ($result_question AS $k => $v) {
                $question_name[$k + 1] = $v['name'];
                $answer = $v['content'];
                $answer = str_replace('[', '', $answer);
                $answer = str_replace(']', '', $answer);
                $answer = str_replace('"', '', $answer);
                $string = explode(',', $answer);
                foreach ($string AS $key => $val) {
                    $select[$k + 1][$key + 1] = $val;
                }
            }

            foreach ($result_answer AS $k => $v) {
                $output[$v['openid']][0] = $v['create_time'];
                $output[$v['openid']][$temp] = $v['content'];
                if ($temp > 0 && $select[$temp][1] != '2') {
                    $string_select = explode(',', $v['content']);
                    $content = '';
                    foreach ($string_select AS $key => $val) {
                        $content .= $select[$temp][$val] . '    ';
                    }
                    $output[$v['openid']][$temp] = $content;
                }
                if ($v['question_id'] != $result_answer[$k + 1]['question_id']) {
                    $temp++;
                }
            }
            //去掉openid避免查看回答者
            $c = 0;
            foreach ($output AS $k => $v) {
                $output_new[$c++] = $v;
            }
            $xlsName = "问卷结果统计";
            $xlsTitle = $survey_name . '的回答结果统计';
//            $title[0] = '';
            $cell[0] = array(0, '回答时间');
            for ($i = 1; $i <= $count; $i++) {
                $cell[$i] = array($i, $question_name[$i]);
            }
            $method = new MethodController();
            $method->exportExcel($xlsTitle, $cell, $output_new, $xlsName);

//            dump($output_new);
//            dump($xlsCell);
//            dump($cell);
        } else {
            $this->redirect('Index/index');
        }
    }


    /**
     * 后台处理获取问卷图形显示数据
     */
    public function getSurveyImageCount()
    {
        $survey_id = I('get.s_i');
//        $survey_id = '1480748407';
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        if ($result || I('get.QR') == 1) {


            $survey = M('survey');
            $condition_survey['survey_id'] = "$survey_id";
            $result = $survey->where($condition_survey)->select();
            $string = $result[0]['question'];
            $survey_name = $result[0]['name'];
            $que_list = M('survey_question');
            /**
             * 当前问卷的所有问题
             */
            $result_question = $que_list->where('question_id IN (' . $string . ')')->select();
            $string = explode(',', $string);

//        dump($result_question);
            /**
             * 针对每个问题获取答案
             */
            $answer = M('');
            //二维解析结果坐标
            $one = $two = 0;
            $fill_question = null;
            $fill_question_count = 0;

            for ($i = 0; $i < sizeof($result_question); $i++) {
                $count = 0;
                $condition_answer = null;
                $question_id = $result_question[$i]['question_id'];
                $condition_answer['survey_id'] = "$survey_id";
                $condition_answer['question_id'] = "$question_id";
                $condition_answer['_string'] = 'type=1 OR type=2';
                /**
                 * result_answer查询结束后，应当补充不包含的选项比例调节为零
                 */
                $result_answer = null;
                $result_total = null;
                $result_answer = $answer->table('tb_survey_answer')
                    ->field('content,COUNT(*) AS total')
                    ->where($condition_answer)
                    ->query('SELECT %FIELD% FROM %TABLE% %WHERE% GROUP BY content ORDER BY content', true);
                $result_total = $answer->table('tb_survey_answer')
                    ->field('COUNT(*) AS total')
                    ->where($condition_answer)
                    ->query('SELECT %FIELD% FROM %TABLE% %WHERE% GROUP BY question_id', true);
                $total = (int)$result_total[0]['total'];

//                dump($question_id);
//                dump($result_answer);

                /**
                 * 解析封装处理结果
                 */
                $output['name'] = $survey_name;
                $output['id'] = $survey_id;
                //问卷信息
                $output[$one]['name'] = $result_question[$i]['name'];
                $output[$one]['id'] = $result_question[$i]['question_id'];
                if ($result_question[$i]['type'] == '1') {//当前问题的类型
                    //单选题的数据统计结果
                    $output[$one]['type'] = '1';
                    $content = $result_question[$i]['content'];
                    //解析content转换为数组
                    $content = str_replace('[', '', $content);
                    $content = str_replace(']', '', $content);
                    $content = str_replace('"', '', $content);
                    $content = explode(',', $content);
//                dump($content);

                    $question_list = null;
                    $question_list = $content;
                    $count = sizeof($question_list);
                    //问题数量的多少不一定与答案查询结果中group的多少相匹配,目前为按顺序匹配比率，应比对问题序号后匹配
                    $answer_count = 0;
                    for ($j = 0; $j < sizeof($question_list); $j++) {
                        $output[$one][$j]['name'] = $question_list[$j];

//                    echo $result_answer[$answer_count]['content'] . '----' . ($j + 1) . '|';

                        if ((int)$result_answer[$answer_count]['content'] != ($j + 1)) {
                            $output[$one][$j]['num'] = (float)0;
                        } else {
//                        $output[$one][$j]['num'] = (float)$result_answer[$answer_count]['total'] / $total;//百分比
                            $output[$one][$j]['num'] = $result_answer[$answer_count]['total'];//总数
                            $answer_count++;
                        }
                    }
                    $one++;
                } else if ($result_question[$i]['type'] == '2') {
                    //单选题的数据统计结果
                    $output[$one]['type'] = '2';
                    $content = $result_question[$i]['content'];
                    //解析content转换为数组
                    $content = str_replace('[', '', $content);
                    $content = str_replace(']', '', $content);
                    $content = str_replace('"', '', $content);
                    $content = explode(',', $content);
//                dump($content);

                    $question_list = null;
                    $question_list = $content;
                    $count = null;
                    $answer_content_list = null;
                    $count = sizeof($question_list);
//                根据问题总数生成结果存储数组
                    for ($c = 0; $c < $count; $c++) {
                        $answer_content_list[$c] = 0;
                    }
//                dump($question_list);
//                dump($result_answer);
                    for ($m = 0; $m < sizeof($result_answer); $m++) {
                        $answer_content = $result_answer[$m]['content'];
                        if (strlen($answer_content) <= 1 && $answer_content != '') {
                            //多选题中只选择了一个选项
                            for ($c = 0; $c < $count; $c++) {
                                if (($c + 1) == $answer_content) {
                                    ++$answer_content_list[$c];
//                                echo ($c + 1) . '--' . $answer_content_list[$c] . '---&';
                                }
                            }
                        } else {
                            //多选题中选择了多个选项
                            $answer_content_count = 0;
                            $answer_content = explode(',', $answer_content);
                            for ($c = 0; $c < $count; $c++) {
//                            dump($answer_content);
                                if (($c + 1) == $answer_content[$answer_content_count]) {
                                    ++$answer_content_list[$c];
                                    $answer_content_count++;
//                                echo ($c + 1) . '--' . $answer_content_list[$c] . '---&';
                                }
                            }
                        }
                    }
                    $total_mutiply = 0;
                    foreach ($answer_content_list as $k => $v) {
                        $total_mutiply += $v;
                    }
                    $answer_count = 0;
                    for ($j = 0; $j < sizeof($question_list); $j++) {
                        $output[$one][$j]['name'] = $question_list[$j];
//                    $output[$one][$j]['num'] = (float)$answer_content_list[$j] / $total_mutiply;//百分比
                        $output[$one][$j]['num'] = $answer_content_list[$j];//总数
                        $answer_count++;
                    }
                    $one++;
//                dump($answer_content_list);
                } else if ($result_question[$i]['type'] == '3') {
                    //默认是按顺序排列的
                    $fill_question[$fill_question_count]['question_id'] = $result_question[$i]['question_id'];
                    $fill_question[$fill_question_count++]['question_name'] = $result_question[$i]['name'];
                }
//            dump($total);
            }
            //单选题的数据统计结果

            //填空题统计处理（问题题号、名称、答案，相同题号归为一组）   封装处理返回数组  格式 【0】- array (ID和所有回答内容)
            $condition_answer = null;
            $condition_answer['survey_id'] = "$survey_id";
            $condition_answer['type'] = "3";
            $result_fill = $answer->table('tb_survey_answer')
                ->field('question_id,content')
                ->where($condition_answer)
                ->query('SELECT %FIELD% FROM %TABLE% %WHERE% ORDER BY question_id', true);

            //回答问题情况=$result_fill  问卷中填空题列表=$fill_question,都按序排列，以填空题列表顺序添加问题结果
            $result_fill_count = 0;
            $output_result_count = 0;
//            dump($result_fill);
            if ($fill_question) {
                foreach ($result_fill AS $k => $v) {
                    if ($v['question_id'] != $fill_question[$result_fill_count]['question_id']) {
                        $result_fill_count++;
                        $output_result_count++;
                    } else {
                        $fill_result[$output_result_count]['question_id'] = $fill_question[$result_fill_count]['question_id'];
                        $fill_result[$output_result_count]['question_name'] = $fill_question[$result_fill_count]['question_name'];
                        $fill_result[$output_result_count]['content'][] = $v['content'];
                    }
                }
            }
            $output['fill'] = $fill_result;

//            dump($result_answer);
//            dump($output);
//            dump($fill_question);

//        $html_charts_temp = '<div style="float: left;margin-top: 20px;text-align: center;" class="col-sm-6"><span id="surveyHint'+ +'" style="font-size:16px;">' + +'</span><div id="surveyAnswer' + +'" style="width: 300px;height: 300px;margin:0 auto;"></div></div>';
            $html_charts_temp = '';
            $content_count = 0;
            $content = null;
            foreach ($output as $k => $v) {
                if (is_array($v)) {
                    $html_charts_temp .= '<div style="float: left;margin-top: 20px;text-align: center;" class="col-sm-6"><span id="surveyHint' . ($k + 1) . '" style="font-size:16px;">' . $v['name'] . '</span><div id="surveyAnswer' . ($k + 1) . '" style="width: 300px;height: 300px;margin:0 auto;"></div></div>';
                    if ($v['type'] == '1' || $v['type'] == '2') {
                        $data = '[';
                        foreach ($v as $key => $val) {
                            if (is_array($val)) {
                                $data .= '{"label":"' . $val['name'] . '","value":"' . $val['num'] . '"},';
                            }
                        }
                        $data = substr($data, 0, -1);
                        $data .= ']';
                    }
                    $content[$content_count++] = '{"element": "surveyAnswer' . $content_count . '","data": ' . $data . ',"colors": ["#1AA9B3", "#7CBCA5", "#AAD774", "#8177C5", "#E0E4CC", "#69D2E7", "#45BFBD", "#F38630"]}';
//                $content[$content_count++] = $data;
                }
            }
//        echo(json_encode($content));
            $append = '';
            foreach ($output['fill'] AS $k => $v) {
                $append .= '<div style="float: left" class="col-sm-6"><li class="list-group-item color-hui text-white" style="text-align: center">' . $v['question_name'] . '</li><ul class="list-group">';
                foreach ($v['content'] AS $key => $val) {
                    if ($val != '')
                        $append .= '<li class="list-group-item"> ' . $val . '</li>';
                }
                $append .= '</ul></div>';
            }
            $this->assign('append_html', $append);
            $this->assign('name', $output['name']);
            $this->assign('content', json_encode($content));
            $this->assign('html_charts', $html_charts_temp);
            $this->assign('username', $username);
            if (I('get.QR') == 1) {
                $this->display('surveyQRCharts');
            } else {
                $save_path = 'Public/qrcode/';  //图片存储的绝对路径
                $web_path = 'Public/qrcode/';        //图片在网页上显示的路径
                $qr_data = HOST . 'CESBack/index.php/Home/DataManage/getSurveyImageCount?QR=1&s_i=' . $survey_id;
                $qr_level = 'L';
                $qr_size = '5';
                $save_prefix = 'SCCE';
                if ($filename = \createQRcode($save_path, $qr_data, $qr_level, $qr_size, $save_prefix)) {
//                    $pic = $web_path . $filename;
                    $logo = 'Public/img/logo.png';//准备好的logo图片
                    $QR = $save_path . $filename;//已经生成的原始二维码图

                    if ($logo !== FALSE) {
                        $QR = imagecreatefromstring(file_get_contents($QR));
                        $logo = imagecreatefromstring(file_get_contents($logo));
                        $QR_width = imagesx($QR);//二维码图片宽度
                        $QR_height = imagesy($QR);//二维码图片高度
                        $logo_width = imagesx($logo);//logo图片宽度
                        $logo_height = imagesy($logo);//logo图片高度
                        $logo_qr_width = $QR_width / 5;
                        $scale = $logo_width / $logo_qr_width;
                        $logo_qr_height = $logo_height / $scale;
                        $from_width = ($QR_width - $logo_qr_width) / 2;
                        //重新组合图片并调整大小
                        imagecopyresampled($QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width,
                            $logo_qr_height, $logo_width, $logo_height);
                    }
//输出图片
                    unlink($save_path . $filename);
                    $filename = $survey_id . '.png';
                    imagepng($QR, $save_path . $filename);
                    $pic = HOST . 'CESBack/Public/qrcode/' . $filename;
                    $this->assign('src_url', $pic);
                    $this->assign('pc_url', $qr_data);
                }
                $this->display('surveyCharts');
            }
        } else {
            $this->redirect('Index/index');
        }
    }
}