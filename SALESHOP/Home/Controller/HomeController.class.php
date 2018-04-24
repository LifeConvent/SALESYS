<?php
/**
 * Created by PhpStorm.
 * User: lawrance
 * Date: 2016/11/6
 * Time: 下午11:04
 */

namespace Home\Controller;

use Think\Controller;

class HomeController extends Controller
{
    public function home()
    {

        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);

        if ($result) {
            $time = time() - 60 * 60 * 24;
            $t_s = date("Y-m-d", $time);
            $time = time() - 60 * 60 * 24 * 6;
            $t_e = date("Y-m-d", $time);
            $t_s = '2016-12-16';
            $t_e = '2016-12-22';
            $res = $this->dealHomeCount($t_s, $t_e);
            for ($i = 0; $i < 7; $i++) {
                $new[$i] = (int)$res[$i]['new'];
                $all_user[$i] = (int)$res[$i]['all_user'];
                $survey[$i] = (int)$res[$i]['survey'];
                $is_match[$i] = (int)$res[$i]['is_match'];
                if ($i == 6) {
                    $new_ = (int)$res[$i]['new'];
                    $all_user_ = (int)$res[$i]['all_user'];
                    $survey_ = (int)$res[$i]['survey'];
                    $is_match_ = (int)$res[$i]['is_match'];
                }
            }
            //发出微信端数据统计请求，访问数据库获取近来评价数据四数组大小为7，过7不与
            $this->assign('count', $is_match_);//微信匹配用户总量
            $this->assign('count1', $survey_);//课程评价总数
            $this->assign('count2', $all_user_);//微信关注量
            $this->assign('count3', $new_);//新增用户

            $this->assign('weChatMatch', json_encode($is_match));
            $this->assign('weChatSub', json_encode($new));
            $this->assign('weChatNum', json_encode($all_user));
            $this->assign('weCESNum', json_encode($survey));
            $this->assign('username', $username);
            $this->assign('TITLE', TITLE);
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function login($user, $pass)
    {
        if ($user == null || $pass == null) {
            return false;
        } else {
            $index = new IndexController();
            $res = $index->searchUser($user, $pass);
            if ($res) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function dealHomeCount($time_start = null, $time_end = null)
    {
        /**
         * 在部署到服务器之前都是用模拟数据
         */
        $time_start = '2016-12-16';
        $time_end = '2016-12-22';

        $count = M('');
        $result = $count->field('time,new,all_user,survey,is_match')
            ->table('tb_home_count')
            ->where('time >=\'' . $time_start . '\' AND time <=\'' . $time_end . '\'')
            ->query('SELECT %FIELD% FROM %TABLE% %WHERE% ORDER BY time ASC', true);
        if ($result) {
            return $result;
        } else {
            return '';
        }
    }

    public function getTotalUser()
    {
        $user = M();
        $result = $user->where('openid!=\'NULL\'')
            ->table('tb_user')
            ->field('count(*)')
            ->query('SELECT %FIELD% AS total FROM %TABLE% %WHERE%', true);
        if ($result) {
            return $result[0]['total'];
        } else {
            return 0;
        }
    }

    public function getTotalSurvey()
    {
        $user = M();
        $result = $user->table('tb_survey_plan')
            ->field('count(*)')
            ->query('SELECT %FIELD% AS total FROM %TABLE%', true);
        if ($result) {
            return $result[0]['total'];
        } else {
            return 0;
        }
    }

    public function getWeChatSee()
    {
        return $this->https_request('http://localhost/CES/index.php/Home/Data/getTotalUser');
    }

    public function https_request($url, $data = null)
    {
        $curl = curl_init();
        if (class_exists('/CURLFile')) {//php5.5跟php5.6中的CURLOPT_SAFE_UPLOAD的默认值不同
            curl_setopt($curl, CURLOPT_SAFE_UPLOAD, true);
        } else {
            if (defined('CURLOPT_SAFE_UPLOAD')) {
                curl_setopt($curl, CURLOPT_SAFE_UPLOAD, false);
            }
        }
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)) {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }
}