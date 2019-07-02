<?php
/**
 * Created by PhpStorm.
 * User: lawrance
 * Date: 2016/11/30
 * Time: 上午9:54
 */

namespace Home\Controller;
use Think\Controller;
use Think\Log;

class DataApplyController extends Controller
{

    public function dataApply(){
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        $controller = new MethodController();
        if ($result) {
            $controller->assignPublic($username,$controller);
            if(!$method->getSystype($username)){
                $this->redirect('Index/errorSys');
            }
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function getDataApply(){
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $select_delete = "SELECT * FROM TMP_DELETE_RECORD WHERE TRUNC(SYS_INSERT_DATE) = TRUNC(SYSDATE)";
        Log::write('用户查询SQL：'.$select_delete,'INFO');
        $result_rows = oci_parse($conn, $select_delete); // 配置SQL语句，执行SQL
        $result_data = $method->search_long($result_rows);
        for ($i = 0; $i < sizeof($result_data); $i++) {
            $value = $result_data[$i];
            $result[$i]['USER_NAME'] = $value['USER_NAME'];
            $result[$i]['BUSINESS_CODE'] = $value['BUSINESS_CODE'];
            $result[$i]['USER_ACCOUNT'] = $value['USER_ACCOUNT'];
            $result[$i]['IS_REVIEW_PASS'] = $value['IS_REVIEW_PASS'];
            $result[$i]['IS_DELETE_WORK'] = $value['IS_DELETE_WORK'];
            $result[$i]['IS_DELETE_SYS'] = $value['IS_DELETE_SYS'];
            $result[$i]['DELETE_REASON'] = $value['DELETE_REASON'];
            $result[$i]['PASS_REASON'] = $value['PASS_REASON'];
            $result[$i]['NO_PASS_REASON'] = $value['NO_PASS_REASON'];
            $result[$i]['BUSINESS_CODE'] = $value['BUSINESS_CODE'];
            $result[$i]['POLICY_CODE'] = $value['POLICY_CODE'];
        }
        oci_free_statement($result_rows);
        oci_close($conn);
        if ($result) {
            exit(json_encode($result));
        } else {
            exit(json_encode(''));
        }
    }

    public function addDataApply(){
        $policy_code = $_POST['policy_code'];
        $accept_code = $_POST['business_code'];
        $user_account = $_POST['user_account'];
        $delete_reason = $_POST['delete_reason'];
        $user_name = $_POST['user_name'];
        $method = new MethodController();
        ##############################################################  公共JS处理部分  ############################################################################
        //JS请求公共处理部分 TRUE锁定
        if($method->publicCheckNoParam()==1){
            $result['status'] = "failed";
            $result['lock'] = "true";
            $result['message'] = "您的用户已被锁定，已无法使用本系统，如有疑问请联系管理员确认！";
            exit(json_encode($result));
        }else if($method->publicCheckNoParam()==2){
            $result['status'] = "failed";
            $result['lock'] = "false";
            $result['message'] = "管理员正在后台进行灌数，暂时无法刷新系统，如有疑问请联系管理员确认！";
            exit(json_encode($result));
        }
        ############################################################################################################################################################
        $conn = $method->OracleOldDBCon();
        $insert_sql = "INSERT INTO TMP_DELETE_RECORD(BUSINESS_CODE,USER_NAME,USER_ACCOUNT,POLICY_CODE,DELETE_REASON) VALUES('".$accept_code."','".$user_name."','".$user_account."','".$policy_code."','".$delete_reason."')";
        Log::write($user_name.' 删除申请数据库插入SQL：'.$insert_sql,'INFO');
        $result_rows = oci_parse($conn, $insert_sql); // 配置SQL语句，执行SQL
        if(oci_execute($result_rows, OCI_COMMIT_ON_SUCCESS)){
            $result['status'] = "success";
            $result['message'] = "关键业务号：".$accept_code."-业务号：".$policy_code." 申请成功！";
        }else{
            $result['status'] = "failed";
            $e = oci_error();
            $result['message'] = "申请失败".$e['message'];
        }
        #######################################################################################################################################
        oci_free_statement($result_rows);
        oci_close($conn);
        if ($result) {
            exit(json_encode($result));
        } else {
            exit(json_encode(''));
        }
    }

    public function updateDeleteApply(){
        $policy_code = $_POST['policy_code'];
        $accept_code = $_POST['business_code'];
        $no_pass_reason = $_POST['no_pass_reason'];
        $pass_reason = $_POST['pass_reason'];
        $is_reviewer = $_POST['is_reviewer'];
        $type = $_POST['type'];
        $method = new MethodController();
        ##############################################################  公共JS处理部分  ############################################################################
        //JS请求公共处理部分 TRUE锁定
        if($method->publicCheckNoParam()==1){
            $result['status'] = "failed";
            $result['lock'] = "true";
            $result['message'] = "您的用户已被锁定，已无法使用本系统，如有疑问请联系管理员确认！";
            exit(json_encode($result));
        }else if($method->publicCheckNoParam()==2){
            $result['status'] = "failed";
            $result['lock'] = "false";
            $result['message'] = "管理员正在后台进行灌数，暂时无法刷新系统，如有疑问请联系管理员确认！";
            exit(json_encode($result));
        }
        ############################################################################################################################################################
        $conn = $method->OracleOldDBCon();
        $select = "SELECT USER_NAME FROM TMP_DELETE_RECORD WHERE BUSINESS_CODE = '".$accept_code."' AND POLICY_CODE = '".$policy_code."'";
        ############################################################################################################################################################
        $result_rows1 = oci_parse($conn, $select); // 配置SQL语句，执行SQL
        $select_result = $method->search_long($result_rows1);
        if($type=='no_pass'){
            if(!empty($select_result[0]['NO_PASS_REASON'])){
                $result['status'] = "failed";
                $result['message'] = "用户：".$select_result[0]['HD_USER_NAME']."已处理为不通过，无需进行再次确认！";
                exit(json_encode($result));
            }
        }else if($type=='pass'){
            if(!empty($select_result[0]['PASS_REASON'])){
                $result['status'] = "failed";
                $result['message'] = "用户：".$select_result[0]['HD_USER_NAME']."已处理为通过，无需进行再次确认！";
                exit(json_encode($result));
            }
        }
        if(!empty($no_pass_reason)){
            $update_cs_define = "UPDATE TMP_DELETE_RECORD SET IS_REVIEW_PASS = '1', NO_PASS_REASON = '".$no_pass_reason."' WHERE BUSINESS_CODE = '".$accept_code."' AND POLICY_CODE = '".$policy_code."' AND TRUNC(SYS_INSERT_DATE) = TRUNC(SYSDATE)";
        }else if(!empty($pass_reason)){
            $update_cs_define = "UPDATE TMP_DELETE_RECORD SET IS_REVIEW_PASS = '1', PASS_REASON = '".$pass_reason."' WHERE BUSINESS_CODE = '".$accept_code."' AND POLICY_CODE = '".$policy_code."' AND TRUNC(SYS_INSERT_DATE) = TRUNC(SYSDATE)";
        }
        if($type == 'delete_work'){
            $update_cs_define = "UPDATE TMP_DELETE_RECORD SET IS_DELETE_WORK = '1' WHERE BUSINESS_CODE = '".$accept_code."' AND POLICY_CODE = '".$policy_code."' AND TRUNC(SYS_INSERT_DATE) = TRUNC(SYSDATE)";
        }else if($type == 'delete_sys'){
            $update_cs_define = "UPDATE TMP_DELETE_RECORD SET IS_DELETE_SYS = '1' WHERE BUSINESS_CODE = '".$accept_code."' AND POLICY_CODE = '".$policy_code."' AND TRUNC(SYS_INSERT_DATE) = TRUNC(SYSDATE)";
        }
        Log::write(' 数据库查询SQL：'.$update_cs_define,'INFO');
        $result_rows = oci_parse($conn, $update_cs_define); // 配置SQL语句，执行SQL
        if(oci_execute($result_rows, OCI_COMMIT_ON_SUCCESS)){
            $result['status'] = "success";
            $result['message'] = "关键业务号：".$accept_code."-业务号：".$policy_code." 确认成功！";
        }else{
            $result['status'] = "failed";
            $e = oci_error();
            $result['message'] = "确认失败".$e['message'];
        }
        oci_free_statement($result_rows);
        oci_close($conn);
        if ($result) {
            exit(json_encode($result));
        } else {
            exit(json_encode(''));
        }
    }
}