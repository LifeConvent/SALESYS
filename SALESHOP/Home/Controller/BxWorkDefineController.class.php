<?php
/**
 * Created by PhpStorm.
 * User: gaobiao
 * Date: 2019/4/18
 * Time: 9:11
 */

namespace Home\Controller;
use Think\Controller;
use Think\Log;


class BxWorkDefineController extends Controller
{
    public function csDefine(){
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        $type =  $method->getUserTypeBySql($username);
        $can =  $method->getCanDayPostBySql($username);
        $is_reviewer =  $method->getReviewer($username);
        if ($result) {
            $this->assign('username', $username);
            $this->assign('user_name', $username);
            $this->assign('user_type', $type);
            $this->assign('user_day_post', $can);
            $this->assign('is_reviewer', $is_reviewer);
            $this->assign('TITLE', TITLE);
            $this->assign('list_type',  $method->getListTypeBySql($username));
            if(!$method->getSystype($username)){
                $this->redirect('Index/errorSys');
            }
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function csReviewDefine(){
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        $type =  $method->getUserTypeBySql($username);
        $can =  $method->getCanDayPostBySql($username);
        $is_reviewer =  $method->getReviewer($username);
        if ($result) {
            $this->assign('username', $username);
            $this->assign('user_name', $username);
            $this->assign('user_type', $type);
            $this->assign('user_day_post', $can);
            $this->assign('is_reviewer', $is_reviewer);
            $this->assign('TITLE', TITLE);
            $this->assign('list_type',  $method->getListTypeBySql($username));
            if(!$method->getSystype($username)){
                $this->redirect('Index/errorSys');
            }
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }
    
    public function getCsDefine(){
        $queryDateStart = I('get.queryDateStart');
        $queryDateEnd = I('get.queryDateEnd');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        //获取用户权限类型-1-管理员2-机构组长3-个人
        $userType = $method->getUserType();
        $otherUser = $method->getOtherUser();

        ##############################################################  公共条件处理部分-无用户区分  ############################################################################
        if (!empty($queryDateStart)) {
            if (!empty($queryDateEnd)) {
                $where_time_bqsl = " AND TRUNC(A.INSERT_SYSDATE) BETWEEN to_date('" . $queryDateStart . "','yyyy/mm/dd') AND to_date('" . $queryDateEnd . "','yyyy/mm/dd') ";
            } else {
                $where_time_bqsl = " AND TRUNC(A.INSERT_SYSDATE) = to_date('" . $queryDateStart . "','yyyy/mm/dd') ";
            }
        } else {
            $where_time_bqsl = " AND TRUNC(A.INSERT_SYSDATE) = TRUNC(SYSDATE) ";
        }
        ##############################################################  测试数据  ############################################################################
        #$where_time_bqsl = "";
        ##############################################################  测试数据  ############################################################################
        $user_name = "";
        $method->checkIn($user_name);
        #33 保全受理、复核处理个人待查询列表
        $orgName = $method->getOrgName();
        $fuhe_user = $method->getFuheUser();
        $clm_user = $method->getClmUser();
        $uw_user = $method->getUwUser();
        if((int)$userType==1){
            $where_type_fix = "";
        }else if((int)$userType==2){
            $organCode = $method->getUserOrganCode();
//            dump($organCode);
            $where_type_fix =  " AND A.OLD_ORGAN_CODE LIKE '".$organCode[$user_name]."%'";
        }else if((int)$userType==3){
            $where_type_fix = " AND A.NEW_USER_NAME = '".$user_name."'";
        }
        if(in_array($user_name,$otherUser)){
            $where_type_fix =  " AND A.OLD_ORGAN_CODE NOT LIKE '8647%'";
        }
        Log::write($user_name.' 数据库查询条件：'.$where_time_bqsl.$where_type_fix,'INFO');
        $num = 0;
        ################################################################   保全受理   #######################################################################
        //保全室、理赔室、核保室不参与
        if((!in_array($user_name,$fuhe_user)&&!in_array($user_name,$clm_user)&&!in_array($user_name,$uw_user))||(int)$userType==1) {
            #033 个人待确认保全受理查询
            $select_bqsl = "SELECT DISTINCT A.OLD_ORGAN_CODE,
                                       A.NEW_ORGAN_CODE,
                                       A.OLD_USER_NAME,
                                       A.NEW_USER_NAME,
                                       A.OLD_ORGAN_NAME,
                                       A.OLD_SERVICE_CODE,
                                       A.NEW_SERVICE_CODE,
                                       A.OLD_SERVICE_TYPE,
                                       A.NEW_SERVICE_TYPE,
                                       A.OLD_POLICY_CODE,
                                       A.NEW_POLICY_CODE,
                                       A.OLD_ACCEPT_CODE,
                                       A.NEW_ACCEPT_CODE,
                                       A.OLD_GET_MONEY,
                                       A.NEW_GET_MONEY,
                                       TO_CHAR(A.OLD_INSERT_TIME,'YYYY-MM-DD') AS OLD_INSERT_TIME,
                                       TO_CHAR(A.NEW_INSERT_TIME,'YYYY-MM-DD') AS NEW_INSERT_TIME,
                                       A.IS_ACCORDANCE,
                                       TO_CHAR(A.INSERT_SYSDATE,'YYYY-MM-DD') AS INSERT_SYSDATE,
                                       B.RESULT AS SYS_RESULT,
                                       B.IS_SUBMIT,
                                       B.IS_REVIEW,
                                       B.IS_PASS,
                                       B.NO_REASON,
                                       B.HD_USER_NAME,
                                       TO_CHAR(B.SYS_INSERT_DATE,'YYYY-MM-DD') AS SYS_INSERT_DATE,
                                       (SELECT W.TC_ID FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID,',') WITHIN group(order by N.TC_ID) AS TC_ID FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = TRIM(A.OLD_ACCEPT_CODE) AND W.FIND_NODE = A.BUSINESS_NODE) AS TC_ID,
                                       (CASE
                                          WHEN C.TC_USER_NAME IS NULL THEN B.HD_USER_NAME
                                            ELSE C.TC_USER_NAME
                                        END) AS HD_USER_NAME,
                                        (CASE
                                          WHEN (SELECT TO_CHAR(W.CREATE_DATE,'YYYY-MM-DD') FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,N.CREATE_DATE FROM TMP_QDSX_TC_BUG N WHERE 1=1 order BY N.CREATE_DATE ASC) W WHERE W.BUSINESS_CODE = A.OLD_ACCEPT_CODE AND W.FIND_NODE = A.BUSINESS_NODE AND ROWNUM = 1) IS NULL THEN TO_CHAR(B.SYS_INSERT_DATE,'YYYY-MM-DD')
                                          ELSE (SELECT TO_CHAR(W.CREATE_DATE,'YYYY-MM-DD') FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,N.CREATE_DATE FROM TMP_QDSX_TC_BUG N WHERE 1=1 order BY N.CREATE_DATE ASC) W WHERE W.BUSINESS_CODE = A.OLD_ACCEPT_CODE AND W.FIND_NODE = A.BUSINESS_NODE AND ROWNUM = 1)
                                        END) AS SYS_INSERT_DATE,
                                        (CASE
                                          WHEN B.DESCRIPTION IS NOT NULL THEN B.DESCRIPTION
                                            ELSE (SELECT W.DESCRIPTION FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID||'-'||N.DESCRIPTION,',') WITHIN group(order by N.TC_ID) AS DESCRIPTION FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.OLD_ACCEPT_CODE AND W.FIND_NODE = A.BUSINESS_NODE)
                                         END) AS DESCRIPTION,
                                       (SELECT W.STATUS FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID||'-'||N.STATUS_DESC,',') WITHIN group(order by N.TC_ID) AS STATUS FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.OLD_ACCEPT_CODE AND W.FIND_NODE = A.BUSINESS_NODE) AS STATUS
                                   FROM TMP_NCS_BX_BQSL_BD A
                                   LEFT JOIN TMP_BX_DAYPOST_DESCRIPTION B
                                        ON A.OLD_ACCEPT_CODE = B.BUSINESS_CODE
                                        AND A.OLD_POLICY_CODE = B.POLICY_CODE
                                        AND B.BUSINESS_NODE = A.BUSINESS_NODE
                                        AND TRUNC(B.BUSINESS_DATE) = TRUNC(A.INSERT_SYSDATE)
                                  LEFT JOIN TMP_QDSX_TC_BUG C  
                                    ON C.BUSINESS_CODE = A.OLD_ACCEPT_CODE
                                    AND C.POLICY_CODE = A.OLD_POLICY_CODE
                                    AND C.FIND_NODE = A.BUSINESS_NODE
                                 WHERE 1=1 " . $where_time_bqsl . $where_type_fix;
            $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
            $bqsl_result_time = null;
            $bqsl_result_time = $method->search_long($result_rows);
            Log::write($user_name.' 数据库查询SQL：'.$select_bqsl,'INFO');
            Log::write($user_name.' 数据库查询看结果：'.$bqsl_result_time,'INFO');
            for ($i = $num; $i < sizeof($bqsl_result_time); $i++) {
                $value = $bqsl_result_time[$i];
                $result[$i]['old_organ_code'] = $value['OLD_ORGAN_CODE'];
                $result[$i]['new_organ_code'] = $value['NEW_ORGAN_CODE'];
                $result[$i]['old_user_name'] = $value['OLD_USER_NAME'];
                $result[$i]['new_user_name'] = $value['NEW_USER_NAME'];
                $result[$i]['old_organ_name'] = $value['OLD_ORGAN_NAME'];
                $result[$i]['old_service_code'] = $value['OLD_SERVICE_CODE'];
                $result[$i]['new_service_code'] = $value['NEW_SERVICE_CODE'];
                $result[$i]['old_service_type'] = $value['OLD_SERVICE_TYPE'];
                $result[$i]['new_service_type'] = $value['NEW_SERVICE_TYPE'];
                $result[$i]['old_policy_code'] = $value['OLD_POLICY_CODE'];
                $result[$i]['new_policy_code'] = $value['NEW_POLICY_CODE'];
                $result[$i]['old_accept_code'] = $value['OLD_ACCEPT_CODE'];
                $result[$i]['new_accept_code'] = $value['NEW_ACCEPT_CODE'];
                $result[$i]['old_get_money'] = $value['OLD_GET_MONEY'];
                $result[$i]['new_get_money'] = $value['NEW_GET_MONEY'];
                $result[$i]['busi_insert_date'] = $value['INSERT_SYSDATE'];
                $result[$i]['sys_insert_date'] = $value['SYS_INSERT_DATE'];
                $result[$i]['is_submit'] = $value['IS_SUBMIT'];
                $result[$i]['is_review'] = $value['IS_REVIEW'];
                $result[$i]['is_pass'] = $value['IS_PASS'];
//                $result[$i]['insert_date'] = $value['INSERT_SYSDATE'];
//                $result[$i]['new_insert_time'] = $value['NEW_INSERT_TIME'];
                $result[$i]['is_accordance'] = $value['IS_ACCORDANCE'];
                if(empty( $value['NO_REASON'])){
                    $result[$i]['no_pass_reason'] = "-";
                }else{
                    $result[$i]['no_pass_reason'] = $value['NO_REASON'];
                }
                if(empty( $value['TC_ID'])){
                    $result[$i]['tc_id'] = "-";
                }else{
                    $result[$i]['tc_id'] = $value['TC_ID'];
                }
                if(empty( $value['SYS_RESULT'])){
                    $result[$i]['sys_result'] = "-";
                }else{
                    $result[$i]['sys_result'] = $value['SYS_RESULT'];
                }
//                $result[$i]['sys_insert_date'] = $value['SYS_INSERT_DATE'];
                if (empty($value['DESCRIPTION'])) {
                    $result[$i]['description'] = "-";
                } else {
                    $result[$i]['description'] = $value['DESCRIPTION'];
                }
                if (empty($value['STATUS'])) {
                    $result[$i]['status'] = "-";
                } else {
                    $result[$i]['status'] = $value['STATUS'];
                }
                if (empty($value['HD_USER_NAME'])) {
                    $result[$i]['hd_user_name'] = "-";
                } else {
                    $result[$i]['hd_user_name'] = $value['HD_USER_NAME'];
                }
                if (empty($value['IS_SUBMIT'])) {
                    $result[$i]['is_submit'] = "0";
                } else {
                    $result[$i]['is_submit'] = $value['IS_SUBMIT'];
                }
                if (empty($value['IS_REVIEW'])) {
                    $result[$i]['is_review'] = "0";
                } else {
                    $result[$i]['is_review'] = $value['IS_REVIEW'];
                }
                if (empty($value['IS_PASS'])) {
                    $result[$i]['is_pass'] = "0";
                } else {
                    $result[$i]['is_pass'] = $value['IS_PASS'];
                }
            }
            $num += sizeof($bqsl_result_time);
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

    public function getCsReviewDefine(){
        $queryDateStart = I('get.queryDateStart');
        $queryDateEnd = I('get.queryDateEnd');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        //获取用户权限类型-1-管理员2-机构组长3-个人
        $userType = $method->getUserType();
        $otherUser = $method->getOtherUser();

        ##############################################################  公共条件处理部分-无用户区分  ############################################################################
        if (!empty($queryDateStart)) {
            if (!empty($queryDateEnd)) {
                $where_time_bqsl = " AND TRUNC(A.INSERT_SYSDATE) BETWEEN to_date('" . $queryDateStart . "','yyyy/mm/dd') AND to_date('" . $queryDateEnd . "','yyyy/mm/dd') ";
            } else {
                $where_time_bqsl = " AND TRUNC(A.INSERT_SYSDATE) = to_date('" . $queryDateStart . "','yyyy/mm/dd') ";
            }
        } else {
            $where_time_bqsl = " AND TRUNC(A.INSERT_SYSDATE) = TRUNC(SYSDATE) ";
        }
        ##############################################################  测试数据  ############################################################################
        #$where_time_bqsl = "";
        ##############################################################  测试数据  ############################################################################
        $user_name = "";
        $method->checkIn($user_name);
        #33 保全受理、复核处理个人待查询列表
        $orgName = $method->getOrgName();
        $fuhe_user = $method->getFuheUser();
        $clm_user = $method->getClmUser();
        $uw_user = $method->getUwUser();
        if((int)$userType==1){
            $where_type_fix = "";
        }else if((int)$userType==2){
            $organCode = $method->getUserOrganCode();
//            dump($organCode);
            $where_type_fix =  " AND A.OLD_ORGAN_CODE LIKE '".$organCode[$user_name]."%'";
        }else if((int)$userType==3){
            $where_type_fix = " AND A.NEW_USER_NAME = '".$user_name."'";
        }
        if(in_array($user_name,$otherUser)){
            $where_type_fix =  " AND A.OLD_ORGAN_CODE NOT LIKE '8647%'";
        }
        Log::write($user_name.' 数据库查询条件：'.$where_time_bqsl.$where_type_fix,'INFO');
        $num = 0;
        ################################################################   保全受理   #######################################################################
        //保全室、理赔室、核保室不参与
        if((!in_array($user_name,$fuhe_user)&&!in_array($user_name,$clm_user)&&!in_array($user_name,$uw_user))||(int)$userType==1) {
            #033 个人待确认保全受理查询
            $select_bqsl = "SELECT DISTINCT A.OLD_ORGAN_CODE,
                                       A.NEW_ORGAN_CODE,
                                       A.OLD_USER_NAME,
                                       A.NEW_USER_NAME,
                                       A.OLD_SERVICE_CODE,
                                       A.NEW_SERVICE_CODE,
                                       A.OLD_POLICY_CODE,
                                       A.NEW_POLICY_CODE,
                                       A.OLD_ACCEPT_CODE,
                                       A.NEW_ACCEPT_CODE,
                                       TO_CHAR(A.OLD_INSERT_TIME,'YYYY-MM-DD') AS OLD_INSERT_TIME,
                                       TO_CHAR(A.NEW_INSERT_TIME,'YYYY-MM-DD') AS NEW_INSERT_TIME,
                                       A.IS_ACCORDANCE,
                                       TO_CHAR(A.INSERT_SYSDATE,'YYYY-MM-DD') AS INSERT_SYSDATE,
                                       B.RESULT AS SYS_RESULT,
                                       B.IS_SUBMIT,
                                       B.IS_REVIEW,
                                       B.IS_PASS,
                                       B.NO_REASON,
                                       B.HD_USER_NAME,
                                       TO_CHAR(B.SYS_INSERT_DATE,'YYYY-MM-DD') AS SYS_INSERT_DATE,
                                       (SELECT W.TC_ID FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID,',') WITHIN group(order by N.TC_ID) AS TC_ID FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = TRIM(A.OLD_ACCEPT_CODE) AND W.FIND_NODE = A.BUSINESS_NODE) AS TC_ID,
                                       (CASE
                                          WHEN C.TC_USER_NAME IS NULL THEN B.HD_USER_NAME
                                            ELSE C.TC_USER_NAME
                                        END) AS HD_USER_NAME,
                                        (CASE
                                          WHEN (SELECT TO_CHAR(W.CREATE_DATE,'YYYY-MM-DD') FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,N.CREATE_DATE FROM TMP_QDSX_TC_BUG N WHERE 1=1 order BY N.CREATE_DATE ASC) W WHERE W.BUSINESS_CODE = A.OLD_ACCEPT_CODE AND W.FIND_NODE = A.BUSINESS_NODE AND ROWNUM = 1) IS NULL THEN TO_CHAR(B.SYS_INSERT_DATE,'YYYY-MM-DD')
                                          ELSE (SELECT TO_CHAR(W.CREATE_DATE,'YYYY-MM-DD') FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,N.CREATE_DATE FROM TMP_QDSX_TC_BUG N WHERE 1=1 order BY N.CREATE_DATE ASC) W WHERE W.BUSINESS_CODE = A.OLD_ACCEPT_CODE AND W.FIND_NODE = A.BUSINESS_NODE AND ROWNUM = 1)
                                        END) AS SYS_INSERT_DATE,
                                        (CASE
                                          WHEN B.DESCRIPTION IS NOT NULL THEN B.DESCRIPTION
                                            ELSE (SELECT W.DESCRIPTION FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID||'-'||N.DESCRIPTION,',') WITHIN group(order by N.TC_ID) AS DESCRIPTION FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.OLD_ACCEPT_CODE AND W.FIND_NODE = A.BUSINESS_NODE)
                                         END) AS DESCRIPTION,
                                       (SELECT W.STATUS FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID||'-'||N.STATUS_DESC,',') WITHIN group(order by N.TC_ID) AS STATUS FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.OLD_ACCEPT_CODE AND W.FIND_NODE = A.BUSINESS_NODE) AS STATUS
                                   FROM TMP_NCS_BX_BQFH_BD A
                                   LEFT JOIN TMP_BX_DAYPOST_DESCRIPTION B
                                        ON A.OLD_ACCEPT_CODE = B.BUSINESS_CODE
                                        AND A.OLD_POLICY_CODE = B.POLICY_CODE
                                        AND B.BUSINESS_NODE = A.BUSINESS_NODE
                                        AND TRUNC(B.BUSINESS_DATE) = TRUNC(A.INSERT_SYSDATE)
                                  LEFT JOIN TMP_QDSX_TC_BUG C  
                                    ON C.BUSINESS_CODE = A.OLD_ACCEPT_CODE
                                    AND C.POLICY_CODE = A.OLD_POLICY_CODE
                                    AND C.FIND_NODE = A.BUSINESS_NODE
                                 WHERE 1=1 " . $where_time_bqsl . $where_type_fix;
            $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
            $bqsl_result_time = null;
            $bqsl_result_time = $method->search_long($result_rows);
            Log::write($user_name.' 数据库查询SQL：'.$select_bqsl,'INFO');
            Log::write($user_name.' 数据库查询看结果：'.$bqsl_result_time,'INFO');
            for ($i = $num; $i < sizeof($bqsl_result_time); $i++) {
                $value = $bqsl_result_time[$i];
                $result[$i]['old_organ_code'] = $value['OLD_ORGAN_CODE'];
                $result[$i]['new_organ_code'] = $value['NEW_ORGAN_CODE'];
                $result[$i]['old_user_name'] = $value['OLD_USER_NAME'];
                $result[$i]['new_user_name'] = $value['NEW_USER_NAME'];
                $result[$i]['old_service_code'] = $value['OLD_SERVICE_CODE'];
                $result[$i]['new_service_code'] = $value['NEW_SERVICE_CODE'];
                $result[$i]['old_policy_code'] = $value['OLD_POLICY_CODE'];
                $result[$i]['new_policy_code'] = $value['NEW_POLICY_CODE'];
                $result[$i]['old_accept_code'] = $value['OLD_ACCEPT_CODE'];
                $result[$i]['new_accept_code'] = $value['NEW_ACCEPT_CODE'];
                $result[$i]['busi_insert_date'] = $value['INSERT_SYSDATE'];
                $result[$i]['sys_insert_date'] = $value['SYS_INSERT_DATE'];
                $result[$i]['is_submit'] = $value['IS_SUBMIT'];
                $result[$i]['is_review'] = $value['IS_REVIEW'];
                $result[$i]['is_pass'] = $value['IS_PASS'];
//                $result[$i]['insert_date'] = $value['INSERT_SYSDATE'];
//                $result[$i]['new_insert_time'] = $value['NEW_INSERT_TIME'];
                $result[$i]['is_accordance'] = $value['IS_ACCORDANCE'];
                if(empty( $value['NO_REASON'])){
                    $result[$i]['no_pass_reason'] = "-";
                }else{
                    $result[$i]['no_pass_reason'] = $value['NO_REASON'];
                }
                if(empty( $value['TC_ID'])){
                    $result[$i]['tc_id'] = "-";
                }else{
                    $result[$i]['tc_id'] = $value['TC_ID'];
                }
                if(empty( $value['SYS_RESULT'])){
                    $result[$i]['sys_result'] = "-";
                }else{
                    $result[$i]['sys_result'] = $value['SYS_RESULT'];
                }
//                $result[$i]['sys_insert_date'] = $value['SYS_INSERT_DATE'];
                if (empty($value['DESCRIPTION'])) {
                    $result[$i]['description'] = "-";
                } else {
                    $result[$i]['description'] = $value['DESCRIPTION'];
                }
                if (empty($value['STATUS'])) {
                    $result[$i]['status'] = "-";
                } else {
                    $result[$i]['status'] = $value['STATUS'];
                }
                if (empty($value['HD_USER_NAME'])) {
                    $result[$i]['hd_user_name'] = "-";
                } else {
                    $result[$i]['hd_user_name'] = $value['HD_USER_NAME'];
                }
                if (empty($value['IS_SUBMIT'])) {
                    $result[$i]['is_submit'] = "0";
                } else {
                    $result[$i]['is_submit'] = $value['IS_SUBMIT'];
                }
                if (empty($value['IS_REVIEW'])) {
                    $result[$i]['is_review'] = "0";
                } else {
                    $result[$i]['is_review'] = $value['IS_REVIEW'];
                }
                if (empty($value['IS_PASS'])) {
                    $result[$i]['is_pass'] = "0";
                } else {
                    $result[$i]['is_pass'] = $value['IS_PASS'];
                }
            }
            $num += sizeof($bqsl_result_time);
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

    public function updateReason(){
        header('Content-type: text/html; charset=utf-8');
        $user_name = $_POST['username'];
        $business_node = $_POST['business_node'];
        $insert_date = $_POST['insert_date'];
        Log::write($user_name.' 业务节点：'.$business_node,'INFO');
        $policy_code = $_POST['policy_code'];
        $business_code = $_POST['business_code'];
        $description = $_POST['description'];
        $result_des = $_POST['result'];
        $no_pass_reason = $_POST['no_pass_reason'];//不通过时才会传值
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        if(!empty($no_pass_reason)){//审核不通过流程
            $select = "SELECT IS_SUBMIT FROM TMP_BX_DAYPOST_DESCRIPTION WHERE BUSINESS_CODE = '".$business_code."' AND POLICY_CODE = '".$policy_code."' AND BUSINESS_NODE = '".$business_node."' AND TO_CHAR(SYS_INSERT_DATE,'YYYY-MM-DD') ='".$insert_date."'";
            $result_rows1 = oci_parse($conn, $select); // 配置SQL语句，执行SQL
            $select_result = $method->search_long($result_rows1);
            Log::write($user_name.' 是否更新原因SQL：'.$select,'INFO');
            if((int)($select_result[0]['IS_SUBMIT']) == 1){
                $update_sql = "UPDATE TMP_BX_DAYPOST_DESCRIPTION SET NO_REASON = '".$no_pass_reason."',IS_SUBMIT = '0', IS_PASS = '0',IS_REVIEW = '0' WHERE BUSINESS_CODE = '".$business_code."' AND POLICY_CODE = '".$policy_code."'AND BUSINESS_NODE = '".$business_node."' AND TO_CHAR(SYS_INSERT_DATE,'YYYY-MM-DD') ='".$insert_date."'";
                $result_rows = oci_parse($conn, $update_sql); // 配置SQL语句，执行SQL
                Log::write($user_name.' 审核不通过原因更新SQL：'.$update_sql,'INFO');
                if(oci_execute($result_rows,OCI_COMMIT_ON_SUCCESS)) {
                    $result['status'] = "success";
                    $result['message'] = "关键业务号：".$business_code."-业务号：".$policy_code." 更新成功！";
                    Log::write($user_name.' 更新原因SQL：'.$update_sql,'INFO');
                    exit(json_encode($result));
                } else {
                    $result['status'] = "failed";
                    $result['message'] = $user_name."您好，审核不通过原因更新失败，请联系管理员确认！";
                    Log::write($user_name.' 更新原因SQL：'.$update_sql,'INFO');
                    exit(json_encode($result));
                }
            }else{
                $result['status'] = "failed";
                $result['message'] = $user_name."您好，在操作员未提交核对说明时，不可进行审核！！";
                exit(json_encode($result));
            }
            Log::write($user_name.' 业务节点+关键业务号：'.$business_node.$business_code,'INFO');
        }
        if(!empty($result)){//审核通过流程
            $select = "SELECT IS_REVIEW FROM TMP_BX_DAYPOST_DESCRIPTION WHERE BUSINESS_CODE = '".$business_code."' AND POLICY_CODE = '".$policy_code."' AND BUSINESS_NODE = '".$business_node."' AND TO_CHAR(SYS_INSERT_DATE,'YYYY-MM-DD') ='".$insert_date."'";
            $result_rows1 = oci_parse($conn, $select); // 配置SQL语句，执行SQL
            $select_result = $method->search_long($result_rows1);
            Log::write($user_name.(int)$select_result[0]['IS_REVIEW'].' 是否更新审核通过结果SQL：'.$select,'INFO');
            $result = null;
            if((int)$select_result[0]['IS_REVIEW'] == 1){
                $result['status'] = "failed";
                $result['message'] = $user_name."您好，审核通过结果已存在，无法修改。请联系管理员确认！";
                exit(json_encode($result));
            }
            $update_sql = "UPDATE TMP_BX_DAYPOST_DESCRIPTION SET RESULT = '".$result_des."',IS_SUBMIT = '1', IS_PASS = '1',IS_REVIEW = '1' WHERE BUSINESS_CODE = '".$business_code."' AND POLICY_CODE = '".$policy_code."'AND BUSINESS_NODE = '".$business_node."' AND TO_CHAR(SYS_INSERT_DATE,'YYYY-MM-DD') ='".$insert_date."'";
            $result_rows = oci_parse($conn, $update_sql); // 配置SQL语句，执行SQL
            if(oci_execute($result_rows,OCI_COMMIT_ON_SUCCESS)) {
                $result['status'] = "success";
                $result['message'] = "关键业务号：".$business_code."-业务号：".$policy_code." 审核通过结论更新成功！";
                Log::write($user_name.' 审核通过结论更新SQL：'.$update_sql,'INFO');
                exit(json_encode($result));
            } else {
                $result['status'] = "failed";
                $result['message'] = $user_name."您好，审核通过结论更新失败，请联系管理员确认！";
                Log::write($user_name.' 审核通过结论更新SQL：'.$update_sql,'INFO');
                exit(json_encode($result));
            }
        }
        if(empty($description)){
            $description = "";
        }
        if(empty($link_business)){
            $link_business = "";
        }
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
        $select = "SELECT HD_USER_NAME FROM TMP_BX_DAYPOST_DESCRIPTION WHERE BUSINESS_CODE = '".$business_code."' AND POLICY_CODE = '".$policy_code."' AND BUSINESS_NODE = '".$business_node."' AND DESCRIPTION = '".$description."' AND TO_CHAR(SYS_INSERT_DATE,'YYYY-MM-DD') ='".$insert_date."'";
        $result_rows1 = oci_parse($conn, $select); // 配置SQL语句，执行SQL
        $select_result = $method->search_long($result_rows1);
        if(!empty($select_result[0]['HD_USER_NAME'])){
            $result['status'] = "failed";
            $result['message'] = $user_name."您好，该原因描述已提交，无修改不可重复提交！";
            exit(json_encode($result));
        }
        Log::write($user_name.' 查询是否修改原因描述SQL：'.$select,'INFO');
        $select = "SELECT HD_USER_NAME FROM TMP_BX_DAYPOST_DESCRIPTION WHERE BUSINESS_CODE = '".$business_code."' AND POLICY_CODE = '".$policy_code."' AND BUSINESS_NODE = '".$business_node."' AND TO_CHAR(SYS_INSERT_DATE,'YYYY-MM-DD') ='".$insert_date."'";
        $result_rows1 = oci_parse($conn, $select); // 配置SQL语句，执行SQL
        $select_result = $method->search_long($result_rows1);
        Log::write($user_name.' 是否更新原因SQL：'.$select,'INFO');
        if(!empty($select_result[0]['HD_USER_NAME'])){
            $update_sql = "UPDATE TMP_BX_DAYPOST_DESCRIPTION SET DESCRIPTION = '".$description."',IS_SUBMIT = '1' WHERE BUSINESS_CODE = '".$business_code."' AND POLICY_CODE = '".$policy_code."'AND BUSINESS_NODE = '".$business_node."' AND TO_CHAR(SYS_INSERT_DATE,'YYYY-MM-DD') ='".$insert_date."'";
            $result_rows = oci_parse($conn, $update_sql); // 配置SQL语句，执行SQL
            if(oci_execute($result_rows,OCI_COMMIT_ON_SUCCESS)) {
                $result['status'] = "success";
                $result['message'] = "关键业务号：".$business_code."-业务号：".$policy_code." 更新成功！";
                Log::write($user_name.' 更新原因SQL：'.$select,'INFO');
                exit(json_encode($result));
            } else {
                $result['status'] = "failed";
                $result['message'] = $user_name."您好，该原因描述更新失败，请联系管理员确认！";
                Log::write($user_name.' 更新原因SQL：'.$select,'INFO');
                exit(json_encode($result));
            }
        }
        Log::write($user_name.' 业务节点+关键业务号：'.$business_node.$business_code,'INFO');
        ############################################################################################################################################################
        #$sysDate = date('yyyy/mm/dd', time());
        if(empty($policy_code)){
            if(empty($insert_date)){
                $insert_sql = "INSERT INTO TMP_BX_DAYPOST_DESCRIPTION(BUSINESS_CODE,HD_USER_NAME,BUSINESS_NODE,IS_SUBMIT,SYS_INSERT_DATE,DESCRIPTION) VALUES('".$business_code."','".$user_name."','".$business_node."','1',SYSDATE,'".$description."')";
            }else{
                $insert_sql = "INSERT INTO TMP_BX_DAYPOST_DESCRIPTION(BUSINESS_CODE,HD_USER_NAME,BUSINESS_NODE,IS_SUBMIT,SYS_INSERT_DATE,BUSINESS_DATE,DESCRIPTION) VALUES('".$business_code."','".$user_name."','".$business_node."','1',SYSDATE,TO_DATE('".$insert_date."','YYYY-MM-DD'),'".$description."')";
            }
        }else{
            if(empty($insert_date)){
                $insert_sql = "INSERT INTO TMP_BX_DAYPOST_DESCRIPTION(BUSINESS_CODE,POLICY_CODE,HD_USER_NAME,BUSINESS_NODE,IS_SUBMIT,SYS_INSERT_DATE,DESCRIPTION) VALUES('".$business_code."','".$policy_code."','".$user_name."','".$business_node."','1',SYSDATE,'".$description."')";
            }else{
                $insert_sql = "INSERT INTO TMP_BX_DAYPOST_DESCRIPTION(BUSINESS_CODE,POLICY_CODE,HD_USER_NAME,BUSINESS_NODE,IS_SUBMIT,SYS_INSERT_DATE,BUSINESS_DATE,DESCRIPTION) VALUES('".$business_code."','".$policy_code."','".$user_name."','".$business_node."','1',SYSDATE,TO_DATE('".$insert_date."','YYYY-MM-DD'),'".$description."')";
            }
        }
        #$update_cs_define = "UPDATE TMP_QDSX_DAYPOST_DESCRIPTION SET BUSINESS_CODE = '".$accept_code."', HD_USER_NAME = '".$user_name."', POLICY_CODE = '".$policy_code."', RESULT = '".$result."', BUSINESS_NODE = '".$node_result[0]['BUSINESS_NODE']."'";
        Log::write($user_name.' 确认结果数据库插入SQL：'.$insert_sql,'INFO');
        $result_rows = oci_parse($conn, $insert_sql); // 配置SQL语句，执行SQL
        if(oci_execute($result_rows, OCI_COMMIT_ON_SUCCESS)){
            $result['status'] = "success";
            $result['message'] = "关键业务号：".$business_code."-业务号：".$policy_code." 确认成功！";
        }else{
            $result['status'] = "failed";
            $e = oci_error();
            $result['message'] = "确认失败".$e['message'];
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
}