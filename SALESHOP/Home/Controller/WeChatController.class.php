<?php
/**
 * Created by PhpStorm.
 * User: lawrance
 * Date: 2016/11/8
 * Time: 下午5:02
 */

namespace Home\Controller;

use Think\Controller;

class WeChatController extends Controller
{
    public function setWeChatMenu()
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

    public function messageGroupSend()
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

    public function setAutoRes()
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

    public function getInfo()
    {
        $user = M();
        $result = $user->query('SELECT u.stu_name,u.stu_num,u.stu_class,stu_graclass,openid,stu_sex,is_match,p.stu_pro FROM tb_user AS u,tb_proclass_list AS p WHERE p.pro_id=u.stu_pro');
        echo json_encode($result);
    }

    public function searchInfo()
    {
        $user = M();
        $class = I('get.class');
        $pro = I('get.pro');
        $gra = I('get.gra');
        $condition = null;
        if ($class != null) {
            $condition['stu_class'] = "$class";
        }
        if ($pro != null) {
            switch($pro){
                case '1':
                    $pro = '计算机科学与技术';
                    break;
                case '2':
                    $pro = '信息安全';
                    break;
                case '3':
                    $pro = '信息与计算科学';
                    break;
                case '4':
                    $pro = '计算机科学与技术（中加方向）';
                    break;
                case '5':
                    $pro = '网络工程';
                    break;
                case '6':
                    $pro = '物联网工程';
                    break;
                case '7':
                    $pro = '通信工程';
                    break;
            }
            $condition['stu_pro'] = "$pro";
        }
        if ($gra != null) {
            $condition['stu_graclass'] = "$gra";
        }

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
        $condition['_string'] = ' a.stu_num NOT IN (SELECT stu_num FROM tb_survey_plan WHERE ' . $sql;
        $result = $user->where($condition)
            ->query('SELECT * FROM (SELECT u.stu_name,u.stu_num,u.stu_class,openid,stu_graclass,stu_sex,is_match,p.stu_pro FROM tb_user AS u,tb_proclass_list AS p WHERE p.pro_id=u.stu_pro) AS a %WHERE%', true);
        echo json_encode($result);
    }
}