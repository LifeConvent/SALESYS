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
            $result = $this->searchUser($user,$pass);
        }
        exit(json_encode($result));
    }

    public function searchUser($user,$pass){//登录账户用多种
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
//        $user = 'gaobiao_bx';
//        $pass = '380c0aeaf0b49bba0fa630bdd7b52f3d';
        if (!$conn) {
            $result['status'] = 'failed';
            $result['hint'] = '数据库连接失败！';
        }
        else {
            $select = "Select ACCOUNT,PASS,TYPE,IS_LOCK from TMP_DAYPOST_USER where ACCOUNT ='".$user."'";
            $result_rows = oci_parse($conn, $select); // 配置SQL语句，执行SQL
            oci_execute($result_rows, OCI_DEFAULT); // 行数  OCI_DEFAULT表示不要自动commit
            $result = oci_fetch_array($result_rows,OCI_RETURN_NULLS);
//            dump($result);
            if(strcmp($result['ACCOUNT'],$user)!=0){
                $result['status'] = 'failed';
                $result['hint'] = '用户名不存在！';
            }else if(strcmp($result['PASS'],$pass)!=0){
                $temp = $user.'-'.time().'-'.'failed';
                $token = $method->encode($temp);
                $_SESSION["token"] = $token;
                $result['status'] = 'failed';
                $result['hint'] = '用户名或密码错误！';
            }else{
                if(strcmp($result['IS_LOCK'],"1")==0){
                    $result['status'] = 'failed';
                    $result['hint'] = '该用户已锁定联系管理员确认！';
                    return $result;
                }
                $temp = $user.'-'.(string)time().'-success-'.$result['TYPE'];
//                dump($temp);
                $token = $method->encode((string)$temp);
//                echo $token;
//                $token = $method->decode($token);
//                $info = explode('-', $token);
//                echo $token;
//                dump($info);
                $_SESSION["token"] = $token;
                $result['status'] = 'success';
                $result['hint'] = '登录成功！';
            }
            return $result;
        }
//
//        $userAccount = M('per_user');//账户表 账户-ID
//        $condition['user_account'] = "$user";
//        $condition['phone'] = "$user";
//        $condition['email'] = "$user";
//        $condition['_logic'] = "OR";
//        $result = $userAccount->where($condition)->select();
//        if(!($result[0]['user_id']!=null&&$result[0]['user_id']!='')){
//            return false;
//        }else{
//            $user_id = $result[0]['user_id'];
//            $userPass = M('sys_user_info');//密码表-ID
//            $whereCon['user_id'] = $user_id;
//            $sqlPass = $userPass->where($whereCon)->select();
//            if($result[0]['user_account']==$user&&$sqlPass[0]['user_pass']==$pass){
//                $data = array('LG_TYPE'=>'2','LG_STATE'=>'1');
//                $userAccount->where("USER_ACCOUNT='$user'")->setField($data);
//                return $user_id;
//            }else if($result[0]['phone']==$user&&$sqlPass[0]['user_pass']==$pass){
//                $data = array('LG_TYPE'=>'1','LG_STATE'=>'1');
//                $userAccount->where("PHONE='$user'")->setField($data);
//                return $user_id;
//            }else if($result[0]['email']==$user&&$sqlPass[0]['user_pass']==$pass){
//                $data = array('LG_TYPE'=>'0','LG_STATE'=>'1');
//                $userAccount->where("EMAIL='$user'")->setField($data);
//                return $user_id;
//            }
//            return null;
//        }
    }

    /**
     *
     */
    public function test(){

        $db_host_name='10.1.168.5/DMGdb';
        $db_user_name='ncl_1';
        $db_pwd='ncl_1';
        //连接Oracle
        $conn = oci_connect($db_user_name,$db_pwd,$db_host_name);
        $select = "Select * from TMP_DAYPOST_USER where account ='gaobiao_bx'";
        $result_rows = oci_parse($conn, $select); // 配置SQL语句，执行SQL
        oci_execute($result_rows, OCI_DEFAULT); // 行数  OCI_DEFAULT表示不要自动commit
        $result = oci_fetch_array($result_rows,OCI_RETURN_NULLS);
        dump($result);
    }

}