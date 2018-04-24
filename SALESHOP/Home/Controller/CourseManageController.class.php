<?php
/**
 * Created by PhpStorm.
 * User: lawrance
 * Date: 2016/11/30
 * Time: 上午9:52
 */

namespace Home\Controller;

use Think\Controller;

class CourseManageController extends Controller
{
    public function courseManage()
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

    public function surveyManage()
    {
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        if ($result) {
            $this->assign('username', $username);
            $group = M('survey_group');
            $select = $group->select();
            $content = '<option value="0">|---- 无</option>';
            $content_search = '';
            for ($i = 0; $i < sizeof($select); $i++) {
                $content .= '<option value="' . $select[$i]['group_id'] . '">' . '|----' . $select[$i]['group_name'] . '</option>';
                $content_search .= '<option value="' . $select[$i]['group_id'] . '">' . '|----' . $select[$i]['group_name'] . '</option>';
            }
            $this->assign('groupSelectList', $content);
            $this->assign('groupSelectList_search', $content_search);
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function surveyPublish()
    {
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        if ($result) {
            $this->assign('username', $username);
            $group = M('survey_group');
            $select = $group->select();
            $content = '<option value="0">|---- 无</option>';
            $content_search = '';
            for ($i = 0; $i < sizeof($select); $i++) {
                $content .= '<option value="' . $select[$i]['group_id'] . '">' . '|----' . $select[$i]['group_name'] . '</option>';
                $content_search .= '<option value="' . $select[$i]['group_id'] . '">' . '|----' . $select[$i]['group_name'] . '</option>';
            }
            $this->assign('groupSelectList', $content);
            $this->assign('groupSelectList_search', $content_search);
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function surveyCondition()
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

    public function getCourse()
    {
        $course = M('course_list');
        $result = $course->field('course_id,name,teacher_name,semester,take_num,type,is_must')->select();
        if ($result) {
            exit(json_encode($result));
        } else {
            exit(json_encode(''));
        }
    }

    public function getCourseNoName()
    {
        $course = M('course_list');
        $result = $course->field('sys_course_id,name,semester,take_num,COUNT(*) AS take_class')
            ->table('tb_course_list')
            ->query("SELECT %FIELD% FROM %TABLE% GROUP BY sys_course_id,semester", true);
        if ($result) {
            exit(json_encode($result));
        } else {
            exit(json_encode(''));
        }
    }

    public function searchCourse()
    {
        $course_num = I('get.c_n');
        $course_name = I('get.c_a');
        $course_semester = I('get.c_s');
        $count = 0;
        $sql = '';
        if ($course_num != null) {
            if ($count == 0) {
                $sql .= " course_id LIKE '%" . $course_num . "%' ";
                $count++;
            }
        }
        if ($course_name != null) {
            if ($count == 0) {
                $sql .= " name LIKE '%" . $course_name . "%' ";
                $count++;
            } else {
                $sql .= " AND name LIKE '%" . $course_name . "%' ";
                $count++;
            }
        }
        if ($course_semester != null) {
            if ($count == 0) {
                $sql .= " semester LIKE '%" . $course_semester . "%' ";
                $count++;
            } else {
                $sql .= " AND semester LIKE '%" . $course_semester . "%' ";
                $count++;
            }
        }
        $course = M();
        $result = $course->field('sys_course_id,name,semester,take_num,COUNT(*) AS take_class')
            ->table('tb_course_list')
            ->where($sql)
            ->query("SELECT %FIELD% FROM %TABLE% %WHERE% GROUP BY sys_course_id,semester", true);
        if ($result) {
            exit(json_encode($result));
        } else {
            exit(json_encode(''));
        }
    }

    public function addNewQuestion()
    {
//        必填项
        $level = I('post.q_level');
        $is_must = I('post.q_ismust');
        $type = I('post.q_qtype');
        $name = I('post.q_name');
        $question_group = I('post.group');
//        问题在问卷中的顺序
        $sort = I('post.q_surveyorder');

//        单选多选选项
        $option = I('post.option');
        //填空输入框大小
        $q_input_size = I('post.q_level');
        if ($type == '1' || $type == '2') {
            $content = $option;
        } else {
            $content = $q_input_size;
        }
        $method = new MethodController();
        $content = $method->replace($content);

//        非必填
        $hint = I('post.q_hint');
        $before_des = I('post.q_beforehint');
        $after_des = I('post.q_afterhint');
        $question_id = time();

        $condition['level'] = $level;
        $condition['is_must'] = $is_must;
        $condition['type'] = $type;
        $condition['level'] = $level;
        $condition['name'] = $name;
        $condition['question_group'] = $question_group;
        $condition['sort'] = $sort;
        $condition['q_input_size'] = $q_input_size;
        $condition['content'] = $content;
        $condition['hint'] = $hint;
        $condition['before_des'] = $before_des;
        $condition['after_des'] = $after_des;
        $condition['question_id'] = $question_id;

        $question = M('survey_question');
        $res = $question->add($condition);
        if ($res) {
            $result['status'] = 'success';
            $result['id'] = $question_id;
        } else {
            $result['status'] = 'failed';
            $result['message'] = '数据库读写失败';
        }
        exit(json_encode($result));
    }

    public function addNewSurvey()
    {
//        必填项
        $count = I('post.count');
        $name = I('post.name');
        $survey_group = I('post.group');
        $level = I('post.level');
        $question = I('post.question');
        $is_demo = I('post.is_demo');

//        选填项
        $description = I('post.detail');

        $method = new MethodController();
        $method->checkIn($username);

        $survey_id = time();
        $condition['level'] = $level;
        $condition['count'] = $count;
        $condition['question'] = $question;
        $condition['description'] = $description;
        $condition['name'] = $name;
        $condition['survey_group'] = $survey_group;
        $condition['survey_id'] = $survey_id;
        $condition['owner'] = $username;
        if ($is_demo == 1) {
            $condition['is_demo'] = 1;
        } else {
            $condition['is_demo'] = 0;
        }

        $survey = M('survey');
        $res = $survey->add($condition);
        if ($res) {
            $result['status'] = 'success';
        } else {
            $result['status'] = 'failed';
            $result['message'] = '数据库读写失败';
        }
        exit(json_encode($result));
    }

    public function modifySurvey()
    {
//        必填项
        $count = I('post.count');
        $name = I('post.name');
        $survey_group = I('post.group');
        $level = I('post.level');
        $question = I('post.question');
        $survey_id = I('post.id');
        $is_demo = I('post.is_demo');

//        选填项
        $description = I('post.detail');

        $method = new MethodController();
        $method->checkIn($username);


        $temp['survey_id'] = $survey_id;

        $condition['level'] = $level;
        $condition['count'] = $count;
        $condition['question'] = $question;
        $condition['description'] = $description;
        $condition['name'] = $name;
        $condition['survey_group'] = $survey_group;
        $condition['owner'] = $username;
        if ($is_demo == 1) {
            $condition['is_demo'] = 1;
        } else {
            $condition['is_demo'] = 0;
        }

        $survey = M('survey');
        $res = $survey->where($temp)->save($condition);
        if ($res) {
            $result['status'] = 'success';
        } else {
            $result['status'] = 'failed';
            $result['message'] = '问卷修改失败！' . $survey_id;
        }
        exit(json_encode($result));
    }

    public function surveyMatch()
    {
        $survey = I('post.s');
        $user = I('post.u');
        $openid = I('post.o');

        $survey = htmlspecialchars_decode($survey);
        $user = htmlspecialchars_decode($user);
        $openid = htmlspecialchars_decode($openid);

        $survey = json_decode($survey);
        $user = json_decode($user);
        $openid = json_decode($openid);

        $errorinfo = json_last_error();

        for ($i = 0; $i < sizeof($survey); $i++) {
            $survey_id = $survey[$i];
            for ($j = 0; $j < sizeof($user); $j++) {
                $temp['survey_id'] = $survey_id;
                $temp['stu_num'] = $user[$j];
                $temp['openid'] = $openid[$j];
                $condition[] = $temp;
            }
        }
        $survey_plan = M('survey_plan');
        $res = $survey_plan->addAll($condition);
        if ($res) {
            $result['status'] = 'success';
        } else {
            $result['status'] = 'failed';
            $result['message'] = '数据库读写失败' . $errorinfo;
        }
        exit(json_encode($result));
    }

    public function deleteCourse()
    {
        $id = I('post.id');
        $condition['course_id'] = "$id";
        $sysResponse = M('course_list');
        $res = $sysResponse->where($condition)->delete();
        if ($res) {
            $result['status'] = 'success';
            $result['message'] = '删除成功！';
        } else {
            $result['status'] = 'failed';
            $result['message'] = '删除失败！';
        }
        exit(json_encode($result));
    }

    public function modifyCourse()
    {
        $id = I('post.c_i');
        $name = I('post.c_n');
        $t_name = I('post.t_n');
        $se = I('post.c_s');
        $condition['course_id'] = "$id";
        $temp['name'] = "$name";
        $temp['teacher_name'] = "$t_name";
        $temp['semester'] = "$se";
        $sysResponse = M('course_list');
        $res = $sysResponse->where($condition)->save($temp);
        if ($res) {
            $result['status'] = 'success';
            $result['message'] = '修改成功！';
        } else {
            $result['status'] = 'failed';
            $result['message'] = '修改失败！';
        }
        exit(json_encode($result));
    }

    public function delQuestion()
    {
        $q_id = I('post.q_id');
        $survey_q = M('survey_question');
        $condition['question_id'] = "$q_id";
        $res = $survey_q->where($condition)->delete();
        if ($res) {
            $result['status'] = 'success';
        } else {
            $result['status'] = 'failed';
        }
        exit(json_encode($result));
    }

    public function delSurvey()
    {
        $s_id = I('post.s_id');
        $survey = M('survey');
        $condition['survey_id'] = "$s_id";
        $res = $survey->where($condition)->delete();
        if ($res) {
            $result['status'] = 'success';
        } else {
            $result['status'] = 'failed';
        }
        exit(json_encode($result));
    }

    public function getSurveyGroup()
    {
        $group = M('survey_group');
        $res = $group->select();
        if ($res) {
            exit(json_encode($res));
        } else {
            exit(json_encode(''));
        }
    }

    public function addNewGroup()
    {
        $name = I('post.name');
        $group = M('survey_group');
        $condition['group_name'] = "$name";
        $res = $group->add($condition);
        if ($res) {
            $result['status'] = 'success';
        } else {
            $result['status'] = 'failed';
            $result['message'] = '添加失败！';
        }
        exit(json_encode($result));
    }

    public function delGroup()
    {
        $id = I('post.id');
        $group = M('survey_group');
        $condition['group_id'] = "$id";
        $res = $group->where($condition)->delete();
        if ($res) {
            $result['status'] = 'success';
        } else {
            $result['status'] = 'failed';
        }
        exit(json_encode($result));
    }

    public function modifyGroup()
    {
        $id = I('post.id');
        $name = I('post.name');
        $group = M('survey_group');
        $condition['group_id'] = "$id";
        $temp['group_name'] = "$name";
        $res = $group->where($condition)->save($temp);
        if ($res) {
            $result['status'] = 'success';
        } else {
            $result['status'] = 'failed';
        }
        exit(json_encode($result));
    }

    public function getSurveyPlan()
    {
        $plan = M();
        $result = $plan->field('p.id,p.survey_id,p.stu_num,p.openid,p.is_finish,s.name')
            ->table('tb_survey_plan')
            ->where('s.survey_id=p.survey_id')
            ->query('SELECT %FIELD% FROM %TABLE% AS p,tb_survey AS s %WHERE%', true);
        if ($result) {
            for ($i = 0; $i < sizeof($result); $i++) {
                if ($result[$i]['is_finish'] == '1') {
                    $result[$i]['is_finish'] = '是';
                } else {
                    $result[$i]['is_finish'] = '否';
                }

                if ($result[$i]['openid'] != '' && $result[$i]['openid'] != null) {
                    $result[$i]['is_match'] = '是';
                } else {
                    $result[$i]['is_match'] = '否';
                }
            }
            echo json_encode($result);
        } else {
            echo '';
        }
    }

    public function searchSurveyDemo()
    {
        $id = I('post.id');
        $condition['survey_id'] = "$id";
        $plan = M('survey');
        $s_result = $plan->field('survey_id,name,level,description,survey_group,count,question')
            ->where($condition)->select();
        if ($s_result) {
            $q_list = $s_result[0]['question'];
            $q_list = explode(',', $q_list);
            $q = M('survey_question');
            foreach ($q_list AS $k => $v) {
                $con['question_id'] = "$v";
                $ques = $q->where($con)->select();
                if ($ques) {
                    $question[$k]['question_id'] = $ques[0]['question_id'];
                    $question[$k]['name'] = $ques[0]['name'];
                } else {
                    $question[$k]['name'] = 'NULL';
                    $question[$k]['question_id'] = 'NULL';
                }
            }
            $s_result[0]['question'] = $question;
            $result['status'] = 'success';
            $result['data'] = json_encode($s_result);
        } else {
            $result['status'] = 'failed';
            $result['message'] = '问卷模版不存在，请重新选择！';
        }
        exit(json_encode($result));
    }

    public function modifySurveyCondition()
    {
        $stu_num = I('post.s_n');
        $is_finish = I('post.i_f');
        $id = I('post.id');
        $condition['id'] = "$id";
        $temp['stu_num'] = "$stu_num";
        $temp['is_finish'] = "$is_finish";
        $plan = M('survey_plan');
        $res = $plan->where($condition)->save($temp);
        if ($res) {
            $result['status'] = 'success';
        } else {
            $result['status'] = 'failed';
        }
        exit(json_encode($result));
    }

    public function delCondition()
    {
        $id = I('post.id');
        $condition['id'] = "$id";
        $plan = M('survey_plan');
        $res = $plan->where($condition)->delete();
        if ($res) {
            $result['status'] = 'success';
        } else {
            $result['status'] = 'failed';
        }
        exit(json_encode($result));
    }

    public function searchCondition()
    {
        $group = I('get.g');
        $name = I('get.s_name');
        $num = I('get.s_num');
        $count = 0;
        $sql = '';
        if ($group != '-1' && $group != null) {
            if ($count == 0) {
                $sql .= " s.survey_group =" . $group;
                $count++;
            } else {
                $sql .= "AND s.survey_group =" . $group;
                $count++;
            }
        }
        if ($name != null) {
            if ($count == 0) {
                $sql .= " s.name LIKE '%" . $name . "%' ";
                $count++;
            } else {
                $sql .= " AND s.name LIKE '%" . $name . "%' ";
                $count++;
            }
        }
        if ($num != null) {
            if ($count == 0) {
                $sql .= " p.stu_num LIKE '%" . $num . "%' ";
                $count++;
            } else {
                $sql .= " AND p.stu_num LIKE '%" . $num . "%' ";
                $count++;
            }
        }
        $course = M();
        $result = $course->field('p.id,p.survey_id,p.stu_num,p.openid,p.is_finish,s.name')
            ->table('tb_survey')
            ->where('s.survey_id=p.survey_id AND' . $sql)
            ->query("SELECT %FIELD% FROM %TABLE% AS s,tb_survey_plan AS p %WHERE% ", true);
        if ($result) {
            for ($i = 0; $i < sizeof($result); $i++) {
                if ($result[$i]['is_finish'] == '1') {
                    $result[$i]['is_finish'] = '是';
                } else {
                    $result[$i]['is_finish'] = '否';
                }

                if ($result[$i]['openid'] != '' && $result[$i]['openid'] != null) {
                    $result[$i]['is_match'] = '是';
                } else {
                    $result[$i]['is_match'] = '否';
                }
            }
            exit(json_encode($result));
        } else {
            exit(json_encode(''));
        }
    }

    public function searchSurvey()
    {
        $level = I('get.l');
        $group = I('get.g');
        $condi = I('get.s_n');
//        $condi = '2015-2016学年课程评价调查问卷';
        $method = new MethodController();
        $method->write('data', $group . '---' . $condi . '为什么为空');
        $count = 0;
        $sql = '';
        if ($level != null) {
            if ($count == 0) {
                $sql .= " level LIKE '%" . $level . "%' ";
                $count++;
            }
        }
        if ($group != null) {
            if ($count == 0) {
                $sql .= " survey_group LIKE '%" . $group . "%' ";
                $count++;
            } else {
                $sql .= " AND survey_group LIKE '%" . $group . "%' ";
                $count++;
            }
        }
        if ($condi != null) {
            if ($count == 0) {
                $sql .= " s.name LIKE '%" . "$condi" . "%' ";
                $count++;
            } else {
                $sql .= " AND s.name LIKE '%" . "$condi" . "%' ";
                $count++;
            }
        }
        $course = M();
        $result = $course->field('g.group_name,name,survey_id,level,owner')
            ->table('tb_survey')
            ->where($sql . 'AND g.group_id=s.survey_group')
            ->query("SELECT %FIELD% FROM %TABLE% AS s, tb_survey_group AS g %WHERE%", true);

        if ($result) {
            /**
             * 对问卷等级进行中文解析
             */
            for ($i = 0; $i < sizeof($result); $i++) {
                switch ($result[$i]['level']) {
                    case '1':
                        $result[$i]['level'] = '系级';
                        break;
                    case '2':
                        $result[$i]['level'] = '院级';
                        break;
                    case '3':
                        $result[$i]['level'] = '校级';
                        break;
                }
            }
            exit(json_encode($result));
        } else {
            exit(json_encode(''));
        }
    }

    public function chooseNoUser()
    {
        $survey_list = I('get.s_l');
        $survey_list = htmlspecialchars_decode($survey_list);
        $survey_list = json_decode($survey_list);
        $sql = '';
        for ($i = 0; $i < sizeof($survey_list); $i++) {
            $survey_id = $survey_list[$i]->survey_id;
            if ($i == sizeof($survey_list) - 1)
                $sql .= ('survey_id = ' . $survey_id . ')');
            else
                $sql .= ('survey_id = ' . $survey_id . ' OR ');
        }
        $table = M('');
        $map['_string'] = 'p.pro_id=u.stu_pro AND u.stu_num NOT IN (SELECT stu_num FROM tb_survey_plan WHERE ' . $sql;
        $result = $table->field('u.stu_name,u.stu_num,u.stu_class,stu_graclass,openid,stu_sex,is_match,p.stu_pro')
            ->table('tb_user')
            ->where($map)
            ->query("SELECT %FIELD% FROM %TABLE% AS u,tb_proclass_list AS p %WHERE% ", true);
        if ($result) {
            exit(json_encode($result));
        } else {
            exit('');
        }
    }

    public function coursePublish()
    {
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        if ($result) {
            $this->assign('username', $username);
            $group = M('survey_group');
            $select = $group->select();
            $content = '<option value="0">|---- 无</option>';
            $content_search = '';
            for ($i = 0; $i < sizeof($select); $i++) {
                $content .= '<option value="' . $select[$i]['group_id'] . '">' . '|----' . $select[$i]['group_name'] . '</option>';
                $content_search .= '<option value="' . $select[$i]['group_id'] . '">' . '|----' . $select[$i]['group_name'] . '</option>';
            }
            $this->assign('groupSelectList', $content);
            $this->assign('groupSelectList_search', $content_search);
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function publishCourseDemo()
    {
        $survey_id = I('post.survey_id');
        $course_id = I('post.course_id');
        $semester = I('post.semester');
        $method = new MethodController();
        $res = $method->checkIn($username);
        if ($res) {
            $survey = M('survey');
            $con['survey_id'] = $survey_id;
            $survey_content = $survey->where($con)->select();
            $survey_name = $survey_content[0]['name'];
            $survey_name_demo = $survey_name;
            //拆分course_id
            $course_array = explode('-', $course_id);
            $course_name_list = $survey_id_list = '';
            foreach ($course_array AS $key => $value) {
                $survey_name_use = $survey_name;
                //补充模版的唯一标识
                $condition_survey['name'] = $survey_content[0]['name'];
                $condition_survey['title'] = $survey_content[0]['title'];
                $condition_survey['level'] = $survey_content[0]['level'];
                $condition_survey['description'] = $survey_content[0]['description'];
                $condition_survey['question'] = $survey_content[0]['question'];
                $condition_survey['owner'] = $survey_content[0]['owner'];
                $condition_survey['survey_group'] = $survey_content[0]['survey_group'];
                $condition_survey['count'] = $survey_content[0]['count'];
                $condition_survey['course_demo_id'] = time() . "$value";
                $survey_demo_id = $condition_survey['course_demo_id'];
                $survey_id_list .= $survey_demo_id . '-';
                $condition_survey['course_id'] = "$value";
                $course_list = M('course_list');
                $con_course['sys_course_id'] = "$value";
                $course_content = $course_list->where($con_course)->select();
                $course_name = $course_content[0]['name'];
                $course_name_list .= $course_name . '-';
                $survey_name_use = str_replace('【课程名】', $course_name, $survey_name_use);
                //问卷名称
                $condition_survey['name'] = "$survey_name_use";
                $condition_survey['survey_id'] = "$survey_demo_id";
                $survey_new = M('survey');
                $result_survey = $survey_new->add($condition_survey);
                if ($result_survey) {
                    $course_take = M('course_take');
                    $con_c_t['course_id'] = $value;
                    $con_c_t['stu_semester'] = $semester;
                    $course_per = $course_take->field('stu_num')->where($con_c_t)->select();
                    $con_s['course_demo_id'] = $survey_demo_id;
                    if (!$course_per) {
                        $result['status'] = 'failed';
                        $result['message'] = '包含无人上课课程，按序发布至该课程时失败，课程名称是' . $course_name;
                        exit(json_encode($result));
                    }
                    foreach ($course_per AS $k => $v) {
                        $condition_plan['stu_num'] = $v['stu_num'];
                        //openid不确定是否需要填写
                        $user = M('user');
                        $stu_num = $v['stu_num'];
                        $con_user['stu_num'] = "$stu_num";
                        $openid = $user->field('openid')->where($con_user)->select();
                        $condition_plan['survey_id'] = "$survey_demo_id";
                        if ($openid[0]['openid'] == '' || $openid[0]['openid'] == null) {
                            $openid_stu = '';
                        } else {
                            $openid_stu = $openid[0]['openid'];
                        }
                        $condition_plan['openid'] = $openid_stu;
                        $survey_plan = M('survey_plan');
                        $add_plan = $survey_plan->add($condition_plan);
                        if (!$add_plan) {
                            $result['status'] = 'failed';
                            $result['message'] = '问卷计划添加失败';
                            exit(json_encode($result));
                        }
                    }
                } else {
                    $result['status'] = 'failed';
                    $result['message'] = '问卷创建失败';
                    exit(json_encode($result));
                }
            }
            //将发布记录保存至数据库
            $record['survey_id_demo'] = $survey_id;
            $record['survey_name_demo'] = $survey_name_demo;
            $survey_id_list = substr($survey_id_list, 0, strlen($survey_id_list) - 1);
            $record['survey_id'] = $survey_id_list;
            $record['course_id_list'] = $course_id;
            $course_name_list = substr($course_name_list, 0, strlen($course_name_list) - 1);
            $record['course_name_list'] = $course_name_list;
            $demo_record = M('demo_record');
            $demo_record->add($record);
            //记录可能添加失败
            $result['status'] = 'success';
            exit(json_encode($result));
        } else {
            $result['status'] = 'failed';
            $result['message'] = '权限错误';
            exit(json_encode($result));
        }
    }

    public function getRecord()
    {
        $record = M('demo_record');
        $result = $record->select();
        if ($result) {
            exit(json_encode($result));
        } else {
            exit(json_encode(''));
        }
    }

    public function searchRecord()
    {
        $record_survey = I('get.r_s');
        $record_course = I('get.r_c');
        $count = 0;
        $sql = '';
        if ($record_survey != null) {
            if ($count == 0) {
                $sql .= " survey_name_demo LIKE '%" . $record_survey . "%' ";
                $count++;
            }
        }
        if ($record_course != null) {
            if ($count == 0) {
                $sql .= " course_name_list LIKE '%" . $record_course . "%' ";
                $count++;
            } else {
                $sql .= " AND course_name_list LIKE '%" . $record_course . "%' ";
                $count++;
            }
        }
        $record = M();
        $result = $record->table('tb_demo_record')
            ->where($sql)
            ->query("SELECT * FROM %TABLE% %WHERE%", true);
        if ($result) {
            exit(json_encode($result));
        } else {
            exit(json_encode(''));
        }
    }

    public function deleteRecord()
    {
        $id = I('post.id');
        $survey_list = I('post.s_l');
        $survey_list = explode('-', $survey_list);
        $plan = M('survey_plan');
        $res = '';
        foreach ($survey_list AS $key => $value) {
            $con = null;
            $con['survey_id'] = "$value";
            $result = $plan->where($con)->delete();
            if (!$result) {
                $res .= $value;
            }
        }
        if ($res == '') {
            $record = M('demo_record');
            $condi['id'] = "$id";
            $record->where($condi)->delete();
            $status['status'] = 'success';
            $status['message'] = '删除成功！';
        } else {
            $status['status'] = 'failed';
            $status['message'] = '删除失败！';
        }
        exit(json_encode($status));
    }
}