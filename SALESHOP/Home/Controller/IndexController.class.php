<?php
namespace Home\Controller;

use Think\Controller;
use Think\Log;

class IndexController extends Controller
{
    public function index()
    {
        $this->assign('TITLE', TITLE);
        $this->assign('ip', $this->getClientIp());
        $this->display();
    }

    public function login()
    {
        $user = I('post.user');
        $pass = I('post.pass');
        $ip = I('post.ip');
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        header('Access-Control-Allow-Methods: GET, POST, PUT');
        if($user==null||$pass==null){
            $result['status'] = 'failed';
            $result['hint'] = '登录失败！';
        }else{
            $result = $this->searchUser($user,$pass,$ip);
        }
        exit(json_encode($result));
    }

    public function searchUser($user,$pass,$ip){//登录账户用多种
        Log::write('用户开始登录','INFO');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        Log::write('用户名：'.$user.'用户密码：'.$pass,'INFO');
        ##############################################################  公共JS处理部分  ############################################################################
        //JS请求公共处理部分 TRUE锁定
        if($method->publicCheck($user)==1){
            $result['status'] = "failed";
            $result['lock'] = "true";
            $result['hint'] = "您的用户已被锁定，已无法使用本系统，如有疑问请联系管理员确认！";
            Log::write('用户锁定','INFO');
            exit(json_encode($result));
        }else if($method->publicCheck($user)==2){
            $result['status'] = "failed";
            $result['lock'] = "false";
            $result['hint'] = "管理员正在后台进行灌数，暂时无法刷新系统，如有疑问请联系管理员确认！";
            Log::write('管理员灌数','INFO');
            exit(json_encode($result));
        }
        ############################################################################################################################################################
//        $user = 'gaobiao_bx';
//        $pass = '380c0aeaf0b49bba0fa630bdd7b52f3d';
        if (!$conn) {
            Log::write('数据库连接失败','INFO');
            $result['status'] = 'failed';
            $result['hint'] = '数据库连接失败！';
        }else {
            $select = "Select ACCOUNT,PASS,TYPE,IS_LOCK from TMP_DAYPOST_USER where ACCOUNT ='".$user."'";
            $result_rows = oci_parse($conn, $select); // 配置SQL语句，执行SQL
            oci_execute($result_rows, OCI_DEFAULT); // 行数  OCI_DEFAULT表示不要自动commit
            $result = oci_fetch_array($result_rows,OCI_RETURN_NULLS);
//            dump($result);
            Log::write('用户查询SQL：'.$select.'用户登录结果：'.$result,'INFO');
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
                $temp = $user.'-'.(string)time().'-success-'.$result['TYPE'].'-'.$_SERVER["REMOTE_ADDR"];
//                dump($temp);
                $token = $method->encode((string)$temp);
//                echo $token;
//                $token = $method->decode($token);
//                $info = explode('-', $token);
//                echo $token;
//                dump($info);
                $res = $this->recordLogInfo($user,$ip);
//                $res = 'true';//开门红期间暂时关闭
                if(strcmp($res,'true')==0){
                    $_SESSION["token"] = $token;
                    $result['status'] = 'success';
                    $result['hint'] = '登录成功！';
                }else if(strcmp($res,'empty')==0){
                    $result['status'] = 'failed';
                    $result['hint'] = '系统版本相差过多,请强制刷新后登录（CTRL+F5）！';
                    return $result;
                }else{
                    $result['status'] = 'failed';
//                    $result['hint'] = '该用户已在IP地址'.$res.'登录！';
                    $result['hint'] = '该用户已登录,无法同时登录多个账号！';
                    return $result;
                }
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

    function getClientIp() {
        static $realip;
        if (isset($_SERVER)) {
            if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $realip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } else if (isset($_SERVER['HTTP_CLIENT_IP'])) {
                $realip = $_SERVER['HTTP_CLIENT_IP'];
            } else {
                $realip = $_SERVER['REMOTE_ADDR'];
            }
        } else {
            if (getenv('HTTP_X_FORWARDED_FOR')) {
                $realip = getenv('HTTP_X_FORWARDED_FOR');
            } else if (getenv('HTTP_CLIENT_IP')) {
                $realip = getenv('HTTP_CLIENT_IP');
            } else {
                $realip = getenv('REMOTE_ADDR');
            }
        }
        return $realip;
    }

    public function recordLogInfo($username,$ip){
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        //获取用户IP进行存储以便登录时进行校验
//        $IP = $this->getClientIp();
        $IP = $ip;
        if(empty($IP)){
            return 'empty';
        }
        $select_des = "SELECT * FROM USER_LOGIN_INFO WHERE IS_VAILD = '1' AND USER_ACCOUNT = '".$username."' ORDER BY LOG_TIME";
        Log::write($username.'登录查询 SQL：'.$select_des,'INFO');
        $result_rows = oci_parse($conn, $select_des); // 配置SQL语句，执行SQL
        $result = $method->search_long($result_rows);
        if(empty($result[0]['IP'])||strcmp($IP,$result[0]['IP'])==0){
            //新增登录信息
            $time = date('Y-m-d H:i:s',time());
            $insert = "INSERT INTO USER_LOGIN_INFO(USER_ACCOUNT,IS_VAILD,IP,LOG_TIME) VALUES('".$username."','1','".$IP."',TO_DATE('".$time."','YYYY-MM-DD HH24:mi:ss'))";
            $result_rows = oci_parse($conn, $insert);
            Log::write($username.'登录插入 SQL：'.$insert,'INFO');
            if(oci_execute($result_rows,OCI_COMMIT_ON_SUCCESS)){
                return 'true';
            }else{
                return $result[0]['IP'];
            }
        }else{
            return $result[0]['IP'];
        }
        oci_free_statement($result_rows);
        oci_close($conn);
        return 'true';
    }

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

