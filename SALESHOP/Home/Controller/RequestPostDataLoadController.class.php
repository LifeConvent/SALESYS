<?php
/**
 * Created by PhpStorm.
 * User: gaobiao
 * Date: 2018/11/2
 * Time: 13:11
 */

namespace Home\Controller;
use Think\Controller;


class RequestPostDataLoadController extends Controller
{
    public function loadData()
    {
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        if ($result) {
            $usertype = $method->getUserType();
            $this->assign('usertype', $usertype);
            $this->assign('username', $username);
            $this->assign('TITLE', TITLE);
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function postAddTcData(){
        $tc_reason = $_POST['load_tc_reason'];
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $userName = $method->getUserName();
        $request_insert  = "INSERT INTO TMP_DATALOAD_REQUEST(REQUEST_ACCOUNT,REQUEST_TYPE,REASON) VALUES('".$userName."','1','".$tc_reason."')";
        $result_rows = oci_parse($conn, $request_insert); // 配置SQL语句，执行SQL
        if(oci_execute($result_rows, OCI_COMMIT_ON_SUCCESS)){
            $result['status'] = 'success';
            $result['message'] = 'TC申请提交成功!';
        }else{
            $result['status'] = 'failed';
            $result['message'] = 'TC申请提交失败,请稍后再试!';
        }
        oci_free_statement($result_rows);
        oci_close($conn);
        if ($result) {
            exit(json_encode($result));
        } else {
            exit(json_encode(''));
        }
    }

    public function postAddData(){
        $type = $_POST['load_data_type'];
        $with_tc = $_POST['with_tc'];
        $reason = $_POST['load_data_reason'];
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $userName = $method->getUserName();
        $request_insert  = "INSERT INTO TMP_DATALOAD_REQUEST(REQUEST_ACCOUNT,REQUEST_TYPE,REASON,DATA_TYPE,IS_WITH_TC) VALUES('".$userName."','2','".$reason."','".$type."','".$with_tc."')";
        $result_rows = oci_parse($conn, $request_insert); // 配置SQL语句，执行SQL
        if(oci_execute($result_rows, OCI_COMMIT_ON_SUCCESS)){
            $result['status'] = 'success';
            $result['message'] = '数据申请提交成功!';
        }else{
            $result['status'] = 'failed';
            $result['message'] = '数据申请提交失败,请稍后再试!';
        }
        oci_free_statement($result_rows);
        oci_close($conn);
        if ($result) {
            exit(json_encode($result));
        } else {
            exit(json_encode(''));
        }
    }

    public function getRequestList(){
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $userType = $method->getUserType();
        $userName = $method->getUserName();
        $where = "";
        if((int)$userType!=1){
            $where = " WHERE REQUEST_ACCOUNT = '".$userName."' ";
        }
        $request_select  = "SELECT A.*,TO_CHAR(A.TIME,'YYYY-MM-DD HH24:mi:ss') AS TIME2CHAR FROM TMP_DATALOAD_REQUEST A".$where;
        $result_rows = oci_parse($conn, $request_select); // 配置SQL语句，执行SQL
        $request_result =  $method->search_long($result_rows);
        $num = sizeof($request_result);
        for($i=0;$i<$num;$i++){
            $result[$i]['request_account'] = $request_result[$i]['REQUEST_ACCOUNT'];
            if((int)$request_result[$i]['REQUEST_TYPE']==2){
                $result[$i]['request_type'] = "业务数据";
            }else{
                $result[$i]['request_type'] = "TC数据";
            }
            $result[$i]['reason'] = $request_result[$i]['REASON'];
            $result[$i]['data_type'] = $request_result[$i]['DATA_TYPE'];
            if((int)$request_result[$i]['IS_WITH_TC']==0){
                $result[$i]['with_tc'] = "否";
            }else{
                $result[$i]['with_tc'] = "是";
            }
            $result[$i]['check_account'] = $request_result[$i]['CHECK_ACCOUNT'];
            if((int)$request_result[$i]['IF_FINISH']==0){
                $result[$i]['is_finish'] = "否";
            }else{
                $result[$i]['is_finish'] = "是";
            }
            $result[$i]['exec_account'] = $request_result[$i]['EXEC_ACCOUNT'];
            if((int)$request_result[$i]['IS_NOTICE']==0){
                $result[$i]['is_notice'] = "否";
            }else{
                $result[$i]['is_notice'] = "是";
            }
            if(!empty( $request_result[$i]['NO_PASS_REASON'])){
                $result[$i]['no_pass_reason'] = $request_result[$i]['NO_PASS_REASON'];
            }
            $result[$i]['time'] = $request_result[$i]['TIME2CHAR'];
            $result[$i]['type'] = $method->getUserType();
        }
//        dump($result);
        oci_free_statement($result_rows);
        oci_close($conn);
        if ($result) {
            exit(json_encode($result));
        } else {
            exit(json_encode(''));
        }
    }

    public function updateRequestCheck(){
        $is_check = $_POST['is_pass'];
        $request_account = $_POST['request_account'];
        $time = $_POST['time'];
//        $request_account = "gaobiao_bx";
//        $is_check = '1';
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $username = "";
        $method->checkIn($username);
        if((int)$is_check==1){
            $update_sql = "UPDATE TMP_DATALOAD_REQUEST SET CHECK_ACCOUNT = '".$username."' WHERE REQUEST_ACCOUNT = '".$request_account."' AND TO_CHAR(TIME,'YYYY-MM-DD HH24:mi:ss') =  '".$time."'";
        }else{
            $update_sql = "UPDATE TMP_DATALOAD_REQUEST SET CHECK_ACCOUNT = '".$username."',NO_PASS_REASON = '".$is_check."' WHERE REQUEST_ACCOUNT = '".$request_account."' AND TO_CHAR(TIME,'YYYY-MM-DD HH24:mi:ss') =  '".$time."'";
        }
        $result_rows = oci_parse($conn, $update_sql); // 配置SQL语句，执行SQL
        if(oci_execute($result_rows, OCI_COMMIT_ON_SUCCESS)){
            $result['status'] = 'success';
            $result['message'] = '审核成功!';
        }else{
            $result['status'] = 'failed';
            $result['message'] = '审核失败,请稍后再试!';
        }
        oci_free_statement($result_rows);
        oci_close($conn);
//        dump($username);
//        dump($request_account);
//        dump($is_check);
        if ($result) {
            exit(json_encode($result));
        } else {
            exit(json_encode(''));
        }
    }

    public function updateRequestFinish(){
        $request_account = $_POST['request_account'];
        $time = $_POST['time'];
//        $request_account = "gaobiao_bx";
//        $is_check = '1';
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $username = "";
        $method->checkIn($username);
        $update_sql = "UPDATE TMP_DATALOAD_REQUEST SET EXEC_ACCOUNT = '".$username."',IF_FINISH = '1' WHERE REQUEST_ACCOUNT = '".$request_account."' AND TO_CHAR(TIME,'YYYY-MM-DD HH24:mi:ss') = '".$time."'";
        $result_rows = oci_parse($conn, $update_sql); // 配置SQL语句，执行SQL
        if(oci_execute($result_rows, OCI_COMMIT_ON_SUCCESS)){
            $result['status'] = 'success';
            $result['message'] = '确认完成成功!';
        }else{
            $result['status'] = 'failed';
            $result['message'] = '确认完成失败,请稍后再试!';
        }
        oci_free_statement($result_rows);
        oci_close($conn);
//        dump($username);
//        dump($request_account);
//        dump($is_check);
        if ($result) {
            exit(json_encode($result));
        } else {
            exit(json_encode(''));
        }
    }



}