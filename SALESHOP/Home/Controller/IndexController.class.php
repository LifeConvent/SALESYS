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
        if (!$conn) {
            $result['status'] = 'failed';
            $result['hint'] = '数据库连接失败！';
        }
        else {
            $select = "Select * from TMP_DAYPOST_USER where account ='".$user."'";
            $result_rows = oci_parse($conn, $select); // 配置SQL语句，执行SQL
            $row_count = oci_execute($result_rows, OCI_DEFAULT); // 行数  OCI_DEFAULT表示不要自动commit
            $result = oci_fetch_array($result_rows,OCI_RETURN_NULLS);
            if($result['ACCOUNT']!=$user){
                $result['status'] = 'failed';
                $result['hint'] = '用户名不存在！';
            }else if($result['PASS']!=$pass){
                $temp = $user.'-'.time().'-'.'failed';
                $token = $method->encode($temp);
                $_SESSION["token"] = $token;
                $result['status'] = 'failed';
                $result['hint'] = '用户名或密码错误！';
            }else{
                $temp = $user.'-'.time().'-'.'success'.'-2';
                $token = $method->encode($temp);
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
//         echo phpinfo();

//        $userAccount = M('tmp_bx_old_cdqcb');//账户表 账户-ID
//        $condition['rownum'] = 1;
//        $result = $userAccount->where($condition)->select();
//        dump($result);

//        $arr_result = array();
//        $arr_result['result'] = 'false';  //true false 为黑名单
//
//        //取数据库参数
//        $db_host_name='10.1.168.5/DMGdb';
//        $db_user_name='ncl_1';
//        $db_pwd='ncl_1';
//
//        //连接Oracle
//        $conn = oci_connect($db_user_name,$db_pwd,$db_host_name);
//        if (!$conn) {
//            $e = oci_error();
//            $arr_result['result'] = 'false';
//            echo json_encode($arr_result);  //默认为不是黑名单
//            return;
//        }
//        else {
//            echo("连接成功！");
//            $select = "Select * from TMP_DAYPOST_USER where ACCOUNT = 'gaobiao_bx' ";
//            $result_rows = oci_parse($conn, $select); // 配置SQL语句，执行SQL
//            $row_count = oci_execute($result_rows, OCI_DEFAULT); // 行数  OCI_DEFAULT表示不要自动commit
//            $result = oci_fetch_array($result_rows,OCI_RETURN_NULLS);
//            //echo($row_count);
//            dump($result);
//            echo $result['ACCOUNT'];
//        }
        $queryDate = "2018-09-05";
        $method = new MethodController();
        $org = $method->getDictArry();
        $userDire =  $method->getUserDictArray();
        for($i = 0;$i<=sizeof($org);$i++){
            $result[$i]['org'] = $org[$i];
        }
        //连接数据库
        $conn = $method->OracleOldDBCon();
        //契约数据赋值
        for($i = 0;$i<=sizeof($org);$i++){
            $result[$i]['nb_old_count'] =0;
            $result[$i]['nb_new_count'] =0;
            $result[$i]['nb_cannt_count'] =0;
            $result[$i]['nb_fix_count'] =0;
            $result[$i]['nb_pro_count'] =0;
            $result[$i]['nb_profix_count'] =0;
            $result[$i]['nb_besame_count'] =0;
            $result[$i]['nb_bfsame_count'] =0;
        }
        //保全数据查询
        //#001 保全受理新核心当天
        $where_old_time  = "SELECT USER_NAME,count(*) AS NUM FROM TMP_NCS_QD_BX_BQSL_BD where OLD_INSERT_TIME = to_date('".$queryDate."','yyyy-mm-dd')  GROUP BY USER_NAME";
        $result_rows = oci_parse($conn, $where_old_time); // 配置SQL语句，执行SQL
        $result_old_time = $method->search_long($result_rows);

        #002 保全受理新老核心当天
        $where_new_old_time  = "SELECT user_name,count(*) AS NUM FROM TMP_NCS_QD_BX_BQSL_BD where OLD_INSERT_TIME = to_date('".$queryDate."','yyyy-mm-dd') and NEW_INSERT_TIME = to_date('".$queryDate."','yyyy-mm-dd')  GROUP BY USER_NAME";
        $result_rows = oci_parse($conn, $where_new_old_time); // 配置SQL语句，执行SQL
        $result_new_old_time = $method->search_long($result_rows);

        #003 保全受理老核心当天<>新核心,且新核心不为空
        $where_new_no_old_time  = "SELECT user_name,count(*) AS NUM FROM TMP_NCS_QD_BX_BQSL_BD where OLD_INSERT_TIME = to_date('".$queryDate."','yyyy-mm-dd') and NEW_INSERT_TIME <> OLD_INSERT_TIME and NEW_INSERT_TIME IS NOT NULL GROUP BY USER_NAME";
        $result_rows = oci_parse($conn, $where_new_no_old_time); // 配置SQL语句，执行SQL
        $result_new_no_old_time = $method->search_long($result_rows);

        #004 保全受理老核心当天且新核心为空
        $where_new_null  = "SELECT user_name,count(*) AS NUM FROM TMP_NCS_QD_BX_BQSL_BD where OLD_INSERT_TIME = to_date('".$queryDate."','yyyy-mm-dd') and NEW_INSERT_TIME IS NULL GROUP BY USER_NAME";
        $result_rows = oci_parse($conn, $where_new_null); // 配置SQL语句，执行SQL
        $result_new_null = $method->search_long($result_rows);

        #005 保全受理老核心当天且TC不为空
        $where_tc_no_null  = "SELECT user_name,count(*) AS NUM FROM TMP_NCS_QD_BX_BQSL_BD where OLD_INSERT_TIME = to_date('".$queryDate."','yyyy-mm-dd') and TC_ID IS NOT NULL GROUP BY USER_NAME";
        $result_rows = oci_parse($conn, $where_tc_no_null); // 配置SQL语句，执行SQL
        $result_tc_no_null = $method->search_long($result_rows);

        #006 保全受理新老核心金额一致数量
        $where_new_old_money  = "SELECT user_name,count(*) AS NUM FROM TMP_NCS_QD_BX_BQSL_BD where OLD_INSERT_TIME = to_date('".$queryDate."','yyyy-mm-dd') and NEW_INSERT_TIME = to_date('".$queryDate."','yyyy-mm-dd') and IS_SAME_SFF='是' GROUP BY USER_NAME";
        $result_rows = oci_parse($conn, $where_new_old_money); // 配置SQL语句，执行SQL
        $result_new_old_money = $method->search_long($result_rows);


//        dump($result_old_time);
//        dump($result_new_old_time);
//        dump($result_new_no_old_time);
//        dump($result_new_null);
//        dump($result_tc_no_null);
//        dump($result_new_old_money);

        $temp['cs_old_count'] = 0;
        //保全数据赋值
        for($i = 0;$i<=sizeof($org)-1;$i++){
            $result[$i]['cs_old_count'] =0;//老核心当天插入
            $result[$i]['cs_new_count'] =0;//老核心新核心当天插入
            $result[$i]['cs_cannt_count'] =0;//老核心当天插入新核心无插入日期
            $result[$i]['cs_fix_count'] =0;//老核心当天插入，新核心非当天插入
            $result[$i]['cs_pro_count'] =0;//老核心当天插入，TC不为空
            $result[$i]['cs_profix_count'] =0;//当天插入，TC状态为已关闭，分机构TC数据库直接获取
            $result[$i]['cs_fysame_count'] =0;//新老核心均为当天且金额一致
            //除小计之外单个计算，小计通过计数累加
            #001
            foreach ($result_old_time as &$value) {
                if($userDire[$value['USER_NAME']]==$org[$i]&&$org[$i]!='小计'){
                    $result[$i]['cs_old_count'] += (int)($value['NUM']);
                    $temp['cs_old_count'] += (int)($value['NUM']);
                }
            }
            #002
            foreach ($result_new_old_time as &$value) {
                if($userDire[$value['USER_NAME']]==$org[$i]&&$org[$i]!='小计'){
                    $result[$i]['cs_new_count'] += (int)$value['NUM'];
                    $temp['cs_new_count'] += (int)$value['NUM'];
                }
            }
            #004
            foreach ($result_new_null as &$value) {
                if($userDire[$value['USER_NAME']]==$org[$i]&&$org[$i]!='小计'){
                    $result[$i]['cs_cannt_count'] += (int)$value['NUM'];
                    $temp['cs_cannt_count'] += (int)$value['NUM'];
                }
            }
            #003
            foreach ($result_new_no_old_time as &$value) {
                if($userDire[$value['USER_NAME']]==$org[$i]&&$org[$i]!='小计'){
                    $result[$i]['cs_fix_count'] += (int)$value['NUM'];
                    $temp['cs_fix_count'] += (int)$value['NUM'];
                }
            }
            #005
            foreach ($result_tc_no_null as &$value) {
                if($userDire[$value['USER_NAME']]==$org[$i]&&$org[$i]!='小计'){
                    $result[$i]['cs_pro_count'] += (int)$value['NUM'];
                    $temp['cs_pro_count'] += (int)$value['NUM'];
                }
            }
            #TC数据库待定
            #006
            foreach ($result_new_old_money as &$value) {
                if($userDire[$value['USER_NAME']]==$org[$i]&&$org[$i]!='小计'){
                    $result[$i]['cs_fysame_count'] += (int)$value['NUM'];
                    $temp['cs_fysame_count'] +=(int)$value['NUM'];
                }
            }
        }
        //理赔数据赋值
        for($i = 0;$i<=sizeof($org);$i++){
            $result[$i]['clm_old_count'] =0;
            $result[$i]['clm_new_count'] =0;
            $result[$i]['clm_cannt_count'] =0;
            $result[$i]['clm_fix_count'] =0;
            $result[$i]['clm_pro_count'] =0;
            $result[$i]['clm_profix_count'] =0;
            $result[$i]['clm_fysame_count'] =0;
        }
        //默认不加载TC数据，通过申请队列加载

//        dump($temp);
//        dump($result);

        if ($result) {
            exit(json_encode($result));
        } else {
            exit(json_encode(''));
        }
    }

}