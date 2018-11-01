<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $this->assign('TITLE', TITLE);
        $this->display();
    }

    public function login()
    {
        $user = I('post.user');
        $pass = I('post.pass');
        if ($user == null || $pass == null) {
            $result['status'] = 'failed';
            $result['hint'] = '登录失败！';
        } else {
            $res = $this->searchUser($user, $pass);
            $method = new MethodController();
            if ($res != null) {
                $temp = $user . '-' . time() . '-' . 'success' . '-' . $res;
                $token = $method->encode($temp);
                $_SESSION["token"] = $token;
                $result['status'] = 'success';
                $result['hint'] = '登录成功！';
            } else {
                $temp = $user . '-' . time() . '-' . 'failed';
                $token = $method->encode($temp);
                $_SESSION["token"] = $token;
                $result['status'] = 'failed';
                $result['hint'] = '用户名或密码错误！';
            }
        }
        exit(json_encode($result));
    }

    public function searchUser($user, $pass)
    {//登录账户用多种
        $userAccount = M('per_user');//账户表 账户-ID
        $condition['user_account'] = "$user";
        $condition['phone'] = "$user";
        $condition['email'] = "$user";
        $condition['_logic'] = "OR";
        $result = $userAccount->where($condition)->select();
        if (!($result[0]['user_id'] != null && $result[0]['user_id'] != '')) {
            return false;
        } else {
            $user_id = $result[0]['user_id'];
            $userPass = M('sys_user_info');//密码表-ID
            $whereCon['user_id'] = $user_id;
            $sqlPass = $userPass->where($whereCon)->select();
            if ($result[0]['user_account'] == $user && $sqlPass[0]['user_pass'] == $pass) {
                $data = array('LG_TYPE' => '2', 'LG_STATE' => '1');
                $userAccount->where("USER_ACCOUNT='$user'")->setField($data);
                return $user_id;
            } else if ($result[0]['phone'] == $user && $sqlPass[0]['user_pass'] == $pass) {
                $data = array('LG_TYPE' => '1', 'LG_STATE' => '1');
                $userAccount->where("PHONE='$user'")->setField($data);
                return $user_id;
            } else if ($result[0]['email'] == $user && $sqlPass[0]['user_pass'] == $pass) {
                $data = array('LG_TYPE' => '0', 'LG_STATE' => '1');
                $userAccount->where("EMAIL='$user'")->setField($data);
                return $user_id;
            }
            return null;
        }
    }

    public function test()
    {
//            $userAccount = M('per_user');//账户表 账户-ID
//            $result = $userAccount->select();
//        dump($result);
        $temp = 2000;
        $inital = 0;
        for ($i = 0; $i < 30 * 12; $i++) {
            echo $inital.'='.$temp.'+'.$inital.'*1.0034';
            $inital = ($inital + $temp) * 1.0034;
            echo '   当月价格：'.$inital."<br>";
        }
        echo $temp*30*12;
        echo "<br>";
        echo $temp*30*12*1.2;
        echo "<br>";
        echo '亏损率： '.($inital-$temp*30*12*1.2)/$inital;
        echo "<br>";
        for($i=800;$i<2000;$i=$i+50){
            $temp = $i;
            $inital = 0;
            for ($j = 0; $j < 30 * 12; $j++) {
                $inital = ($inital + $temp) * 1.0034;
            }
            echo '基础价格：'.$temp;
            echo '  的亏损率： '.($inital-$temp*30*12*1.2)/$inital;
            echo "<br>";
        }
    }

}