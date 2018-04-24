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
        if($user==null||$pass==null){
            $result['status'] = 'failed';
            $result['hint'] = '登录失败！';
        }else{
            $res = $this->searchUser($user,$pass);
            $method = new MethodController();
            if($res){
                $temp = $user.'-'.time().'-'.'success';
                $token = $method->encode($temp);
                $_SESSION["token"] = $token;
                $result['status'] = 'success';
                $result['hint'] = '登录成功！';
            }else{
                $temp = $user.'-'.time().'-'.'failed';
                $token = $method->encode($temp);
                $_SESSION["token"] = $token;
                $result['status'] = 'failed';
                $result['hint'] = '用户名或密码错误！';
            }
        }
        exit(json_encode($result));
    }

    public function searchUser($user,$pass){
        $userTb = M('admin');
        $condition['user'] = "$user";
        $condition['password'] = "$pass";
        $result = $userTb->where($condition)->select();
        if(!$result){
            return false;
        }else{
            if($result[0]['user']==$user&&$result[0]['password']==$pass){
                return true;
            }else{
                return false;
            }
        }
    }

}