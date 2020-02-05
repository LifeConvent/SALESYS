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
    public function assignPublic($username,$controller){
        $method = new MethodController();
        $type =  $method->getUserTypeBySql($username);
        $can =  $method->getCanDayPostBySql($username);
        $is_reviewer =  $method->getReviewer($username);
        $controller->assign('username', $username);
        $controller->assign('user_name', $username);
        $controller->assign('username_chinese', $method->getUserCNNameBySql($username));
        $controller->assign('user_type', $type);
        $controller->assign('user_day_post', $can);
        $controller->assign('is_reviewer', $is_reviewer);
        $controller->assign('TITLE', TITLE);
        $controller->assign('list_type',  $method->getListTypeBySql($username));
    }

    public function csDefine(){
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
//        $type =  $method->getUserTypeBySql($username);
//        $can =  $method->getCanDayPostBySql($username);
//        $is_reviewer =  $method->getReviewer($username);
        if ($result) {
//            $this->assign('username', $username);
//            $this->assign('user_name', $username);
//            $this->assign('username_chinese', $method->getUserCNNameBySql($username));
//            $this->assign('user_type', $type);
//            $this->assign('user_day_post', $can);
//            $this->assign('is_reviewer', $is_reviewer);
//            $this->assign('TITLE', TITLE);
//            $this->assign('list_type',  $method->getListTypeBySql($username));
            $method->assignPublic($username,$this);
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
        $this->assign('username_chinese', $method->getUserCNNameBySql($username));
        $can =  $method->getCanDayPostBySql($username);
        $is_reviewer =  $method->getReviewer($username);
        if ($result) {
            $method->assignPublic($username,$this);
//            $this->assign('username', $username);
//            $this->assign('user_name', $username);
//            $this->assign('user_type', $type);
//            $this->assign('user_day_post', $can);
//            $this->assign('is_reviewer', $is_reviewer);
//            $this->assign('TITLE', TITLE);
//            $this->assign('list_type',  $method->getListTypeBySql($username));
            if(!$method->getSystype($username)){
                $this->redirect('Index/errorSys');
            }
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function uwDefine(){
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        $type =  $method->getUserTypeBySql($username);
        $this->assign('username_chinese', $method->getUserCNNameBySql($username));
        $can =  $method->getCanDayPostBySql($username);
        $is_reviewer =  $method->getReviewer($username);
        if ($result) {
            $method->assignPublic($username,$this);
//            $this->assign('username', $username);
//            $this->assign('user_name', $username);
//            $this->assign('user_type', $type);
//            $this->assign('user_day_post', $can);
//            $this->assign('is_reviewer', $is_reviewer);
//            $this->assign('TITLE', TITLE);
//            $this->assign('list_type',  $method->getListTypeBySql($username));
            if(!$method->getSystype($username)){
                $this->redirect('Index/errorSys');
            }
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function nbDefine(){
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        $type =  $method->getUserTypeBySql($username);
        $this->assign('username_chinese', $method->getUserCNNameBySql($username));
        $can =  $method->getCanDayPostBySql($username);
        $is_reviewer =  $method->getReviewer($username);
        if ($result) {
            $method->assignPublic($username,$this);
//            $this->assign('username', $username);
//            $this->assign('user_name', $username);
//            $this->assign('user_type', $type);
//            $this->assign('user_day_post', $can);
//            $this->assign('is_reviewer', $is_reviewer);
//            $this->assign('TITLE', TITLE);
//            $this->assign('list_type',  $method->getListTypeBySql($username));
            if(!$method->getSystype($username)){
                $this->redirect('Index/errorSys');
            }
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function clmDefine(){
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        $type =  $method->getUserTypeBySql($username);
        $this->assign('username_chinese', $method->getUserCNNameBySql($username));
        $can =  $method->getCanDayPostBySql($username);
        $is_reviewer =  $method->getReviewer($username);
        if ($result) {
            $method->assignPublic($username,$this);
//            $this->assign('username', $username);
//            $this->assign('user_name', $username);
//            $this->assign('user_type', $type);
//            $this->assign('user_day_post', $can);
//            $this->assign('is_reviewer', $is_reviewer);
//            $this->assign('TITLE', TITLE);
//            $this->assign('list_type',  $method->getListTypeBySql($username));
            if(!$method->getSystype($username)){
                $this->redirect('Index/errorSys');
            }
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function nbBdDefine(){
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        $type =  $method->getUserTypeBySql($username);
        $can =  $method->getCanDayPostBySql($username);
        if ($result) {
            $method->assignPublic($username,$this);
//            $this->assign('username', $username);
//            $this->assign('user_name', $username);
//            $this->assign('username_chinese', $method->getUserCNNameBySql($username));
//            $this->assign('user_type', $type);
//            $this->assign('user_day_post', $can);
//            $this->assign('TITLE', TITLE);
//            $this->assign('list_type',  $method->getListTypeBySql($username));
            if(!$method->getSystype($username)){
                $this->redirect('Index/errorSys');
            }
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function capDefine(){
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        $type =  $method->getUserTypeBySql($username);
        $can =  $method->getCanDayPostBySql($username);
        if ($result) {
            $method->assignPublic($username,$this);
//            $this->assign('username', $username);
//            $this->assign('user_name', $username);
//            $this->assign('username_chinese', $method->getUserCNNameBySql($username));
//            $this->assign('user_type', $type);
//            $this->assign('user_day_post', $can);
//            $this->assign('TITLE', TITLE);
//            $this->assign('list_type',  $method->getListTypeBySql($username));
            if(!$method->getSystype($username)){
                $this->redirect('Index/errorSys');
            }
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function chatDefineClmUw(){
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        $type =  $method->getUserTypeBySql($username);
        $can =  $method->getCanDayPostBySql($username);
        if ($result) {
            $method->assignPublic($username,$this);
//            $this->assign('username', $username);
//            $this->assign('user_name', $username);
//            $this->assign('username_chinese', $method->getUserCNNameBySql($username));
//            $this->assign('user_type', $type);
//            $this->assign('user_day_post', $can);
//            $this->assign('TITLE', TITLE);
//            $this->assign('list_type',  $method->getListTypeBySql($username));
            if(!$method->getSystype($username)){
                $this->redirect('Index/errorSys');
            }
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function chatDefineDz(){
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        $type =  $method->getUserTypeBySql($username);
        $can =  $method->getCanDayPostBySql($username);
        if ($result) {
            $method->assignPublic($username,$this);
            if(!$method->getSystype($username)){
                $this->redirect('Index/errorSys');
            }
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function chatDefineNb(){
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        $type =  $method->getUserTypeBySql($username);
        $can =  $method->getCanDayPostBySql($username);
        if ($result) {
            $method->assignPublic($username,$this);
//            $this->assign('username', $username);
//            $this->assign('user_name', $username);
//            $this->assign('username_chinese', $method->getUserCNNameBySql($username));
//            $this->assign('user_type', $type);
//            $this->assign('user_day_post', $can);
//            $this->assign('TITLE', TITLE);
//            $this->assign('list_type',  $method->getListTypeBySql($username));
            if(!$method->getSystype($username)){
                $this->redirect('Index/errorSys');
            }
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function chatDefineCs(){
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        $type =  $method->getUserTypeBySql($username);
        $can =  $method->getCanDayPostBySql($username);
        if ($result) {
            $method->assignPublic($username,$this);
//            $this->assign('username', $username);
//            $this->assign('user_name', $username);
//            $this->assign('username_chinese', $method->getUserCNNameBySql($username));
//            $this->assign('user_type', $type);
//            $this->assign('user_day_post', $can);
//            $this->assign('TITLE', TITLE);
//            $this->assign('list_type',  $method->getListTypeBySql($username));
            if(!$method->getSystype($username)){
                $this->redirect('Index/errorSys');
            }
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function getCapDefine(){
        $queryDateStart = I('get.queryDateStart');
        $queryDateEnd = I('get.queryDateEnd');
        $type = I('get.type');
        if(strcmp($type,"004")==0){
            $type = " AND TRIM(A.OLD_SOURCE_NAME) = '10' ";
        }else if(strcmp($type,"005")==0){
            $type = " AND TRIM(A.OLD_SOURCE_NAME) = '9' ";
        }else if(strcmp($type,"001")==0){
            $type = " AND TRIM(A.OLD_SOURCE_NAME) IN ('00','6','7') ";
        }else if(strcmp($type,"003")==0){
            $type = " AND TRIM(A.OLD_SOURCE_NAME) IN ('2','3','02','03','8','08','15','25') ";
        }else{
            $type = '';
        }
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        //获取用户权限类型-1-管理员2-机构组长3-个人
        $userType = $method->getUserType();
        $otherUser = $method->getOtherUser();

        ##############################################################  公共条件处理部分-无用户区分  ############################################################################
        if (!empty($queryDateStart)) {
            if (!empty($queryDateEnd)) {
                $where_time_bqsl = " AND TRUNC(A.SYS_INSERT_DATE) BETWEEN TRUNC(to_date('" . $queryDateStart . "','yyyy-mm-dd')) AND TRUNC(to_date('" . $queryDateEnd . "','yyyy-mm-dd')) ";
            } else {
                $where_time_bqsl = " AND TRUNC(A.SYS_INSERT_DATE) = TRUNC(to_date('" . $queryDateStart . "','yyyy-mm-dd')) ";
            }
        } else {
            $where_time_bqsl = " AND TRUNC(A.SYS_INSERT_DATE) = TRUNC(SYSDATE) ";
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
        $where_type_fix = "";
//        if((int)$userType==1){
//            $where_type_fix = "";
//        }else if((int)$userType==2){
//            $organCode = $method->getUserOrganCode();
////            dump($organCode);
//            $where_type_fix =  " AND A.OLD_ORGAN_CODE LIKE '".$organCode[$user_name]."%'";
//        }else if((int)$userType==3){
//            $where_type_fix = " AND A.USER_NAME = '".$user_name."'";
//        }
//        if(in_array($user_name,$otherUser)){
//            $where_type_fix =  " AND A.ORGAN_CODE NOT LIKE '".$organCode[$user_name]."%'";
//        }
        Log::write($user_name.' 数据库查询条件：'.$where_time_bqsl.$where_type_fix,'INFO');
        $num = 0;
        ################################################################   保全受理   #######################################################################
        //保全室、理赔室、核保室不参与
        if((!in_array($user_name,$fuhe_user)&&!in_array($user_name,$clm_user)&&!in_array($user_name,$uw_user))||(int)$userType==1) {
            #033 个人待确认保全受理查询
            $select_bqsl = "SELECT    
                                       A.UNIT_NUMBER,
                                       A.BUSINESS_CODE,
                                       A.BANK_ACCOUNT,
                                       A.BANK_CODE,
                                       A.BIZ_SOURCE_NAME,
                                       A.ARAP_FLAG,
                                       A.BUSI_FEE_AMOUNT,
                                       A.SALES_CHANNEL_NAME,
                                       (CASE A.BUSINESS_NODE
                                             WHEN 'SFFYZP' THEN '收付费制盘'
                                        END) AS BUSINESS_NAME,
                                       A.BUSINESS_NODE,
                                       B.RESULT AS RESULT,
                                       B.IS_SUBMIT,
                                       B.IS_REVIEW,
                                       B.IS_PASS,
                                       B.NO_REASON,
                                       B.HD_USER_NAME,
                                       TO_CHAR(A.SYS_INSERT_DATE,'YYYY-MM-DD') AS INSERT_SYSDATE,
                                       (SELECT W.TC_ID FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID,',') WITHIN group(order by N.TC_ID) AS TC_ID FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = TRIM(A.UNIT_NUMBER) AND W.FIND_NODE = A.BUSINESS_NODE) AS TC_ID,
                                       (CASE
                                          WHEN C.TC_USER_NAME IS NULL THEN B.HD_USER_NAME
                                            ELSE C.TC_USER_NAME
                                        END) AS HD_USER_NAME,
                                        (CASE
                                          WHEN (SELECT TO_CHAR(W.CREATE_DATE,'YYYY-MM-DD') FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,N.CREATE_DATE FROM TMP_QDSX_TC_BUG N WHERE 1=1 order BY N.CREATE_DATE ASC) W WHERE W.BUSINESS_CODE = A.UNIT_NUMBER AND W.FIND_NODE = A.BUSINESS_NODE AND ROWNUM = 1) IS NULL THEN TO_CHAR(B.SYS_INSERT_DATE,'YYYY-MM-DD')
                                          ELSE (SELECT TO_CHAR(W.CREATE_DATE,'YYYY-MM-DD') FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,N.CREATE_DATE FROM TMP_QDSX_TC_BUG N WHERE 1=1 order BY N.CREATE_DATE ASC) W WHERE W.BUSINESS_CODE = A.UNIT_NUMBER AND W.FIND_NODE = A.BUSINESS_NODE AND ROWNUM = 1)
                                        END) AS SYS_INSERT_DATE,
                                        (CASE
                                          WHEN B.DESCRIPTION IS NOT NULL THEN B.DESCRIPTION
                                            ELSE (SELECT W.DESCRIPTION FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID||'-'||N.DESCRIPTION,',') WITHIN group(order by N.TC_ID) AS DESCRIPTION FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.UNIT_NUMBER AND W.FIND_NODE = A.BUSINESS_NODE)
                                         END) AS DESCRIPTION,
                                       (SELECT W.STATUS FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID||'-'||N.STATUS_DESC,',') WITHIN group(order by N.TC_ID) AS STATUS FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.UNIT_NUMBER AND W.FIND_NODE = A.BUSINESS_NODE) AS STATUS
                                  FROM TMP_BX_CAP_PRE_DETAIL A
                                  LEFT JOIN TMP_BX_DAYPOST_DESCRIPTION B
                                        ON A.UNIT_NUMBER = B.BUSINESS_CODE
                                        AND B.BUSINESS_NODE = A.BUSINESS_NODE
                                        AND TRUNC(B.BUSINESS_DATE) = TRUNC(A.SYS_INSERT_DATE)
                                  LEFT JOIN TMP_QDSX_TC_BUG C  
                                    ON C.BUSINESS_CODE = A.UNIT_NUMBER
                                    AND C.FIND_NODE = A.BUSINESS_NODE
                                 WHERE 1=1 ".$type . $where_time_bqsl . $where_type_fix;
            $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
            $bqsl_result_time = null;
            $bqsl_result_time = $method->search_long($result_rows);
            Log::write($user_name.' 数据库查询SQL：'.$select_bqsl,'INFO');
            Log::write($user_name.' 数据库查询看结果：'.$bqsl_result_time,'INFO');
            for ($i = $num; $i < sizeof($bqsl_result_time); $i++) {
                $value = $bqsl_result_time[$i];
                $result[$i]['old_unit_number'] = $value['OLD_UNIT_NUMBER'];
                $result[$i]['new_unit_number'] = $value['NEW_UNIT_NUMBER'];
                $result[$i]['old_business_code'] = $value['OLD_BUSINESS_CODE'];
                $result[$i]['new_business_code'] = $value['NEW_BUSINESS_CODE'];
                $result[$i]['old_bank_account'] = $value['OLD_BANK_ACCOUNT'];
                $result[$i]['new_bank_account'] = $value['NEW_BANK_ACCOUNT'];
                $result[$i]['old_bank_code'] = $value['OLD_BANK_CODE'];
                $result[$i]['new_bank_code'] = $value['NEW_BANK_CODE'];
                $result[$i]['old_source_name'] = $value['OLD_SOURCE_NAME'];
                $result[$i]['new_source_name'] = $value['NEW_SOURCE_NAME'];
                $result[$i]['biz_source_name'] = $value['BIZ_SOURCE_NAME'];
                $result[$i]['old_arap_flag'] = $value['OLD_ARAP_FLAG'];
                $result[$i]['new_arap_flag'] = $value['NEW_ARAP_FLAG'];
                $result[$i]['old_fee_amount'] = $value['OLD_FEE_AMOUNT'];
                $result[$i]['new_fee_amount'] = $value['NEW_FEE_AMOUNT'];
                $result[$i]['sales_channel_name'] = $value['SALES_CHANNEL_NAME'];
                $result[$i]['business_type_name'] = $value['BUSINESS_TYPE_NAME'];
                $result[$i]['business_node'] = $value['BUSINESS_NODE'];
                $result[$i]['business_name'] = $value['BUSINESS_NAME'];
                $result[$i]['busi_insert_date'] = $value['INSERT_SYSDATE'];
                $result[$i]['business_date'] = $value['INSERT_SYSDATE'];
                $result[$i]['sys_insert_date'] = $value['SYS_INSERT_DATE'];
                $result[$i]['is_submit'] = $value['IS_SUBMIT'];
                $result[$i]['is_review'] = $value['IS_REVIEW'];
                $result[$i]['is_pass'] = $value['IS_PASS'];
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
                if(empty( $value['RESULT'])){
                    $result[$i]['result'] = "-";
                }else{
                    $result[$i]['result'] = $value['RESULT'];
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

    public function updateCapDefine(){
        header('Content-type: text/html; charset=utf-8');
        $user_name = $_POST['username'];
        $result_des = $_POST['result'];
        $business_name = $_POST['business_name'];
        $insert_date = $_POST['insert_date'];
        Log::write($user_name.' 业务节点：'.$business_name,'INFO');
        $policy_code = $_POST['policy_code'];
        $business_code = $_POST['business_code'];
        $description = $_POST['description'];
        $business_node = "SFFZFP";
        if(empty($description)){
            $description = "";
        }
        if(empty($link_business)){
            $link_business = "";
        }
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
        $select_node = "SELECT BUSINESS_NODE FROM TMP_BUSINESS_NODE WHERE BUSINESS_NAME = '".$business_name."'";
        $result_rows = oci_parse($conn, $select_node); // 配置SQL语句，执行SQL
        $node_result = $method->search_long($result_rows);

        Log::write($user_name.' 业务节点：'.$business_name,'INFO');
        $select = "SELECT HD_USER_NAME FROM TMP_BX_DAYPOST_DESCRIPTION WHERE BUSINESS_CODE = '".$business_code."' AND BUSINESS_NODE = '".$node_result[0]['BUSINESS_NODE']."' AND BUSINESS_DATE = TO_DATE('".$insert_date."','YYYY-MM-DD') ";
        ############################################################################################################################################################
        $result_rows1 = oci_parse($conn, $select); // 配置SQL语句，执行SQL
        $select_result = $method->search_long($result_rows1);
        if(!empty($select_result[0]['HD_USER_NAME'])){
            $result['status'] = "failed";
            $result['message'] = "用户：".$select_result[0]['HD_USER_NAME']."已进行该业务核对，无需进行再次核对！";
            exit(json_encode($result));
        }
        Log::write($user_name.' 业务节点+关键业务号：'.$node_result[0]['BUSINESS_NODE'].$business_code,'INFO');
        #$sysDate = date('yyyy/mm/dd', time());
        if(empty($policy_code)){
            if(empty($insert_date)){
                $insert_sql = "INSERT INTO TMP_BX_DAYPOST_DESCRIPTION(BUSINESS_CODE,HD_USER_NAME,BUSINESS_NODE,IS_SUBMIT,SYS_INSERT_DATE,DESCRIPTION,RESULT) VALUES('".$business_code."','".$user_name."','".$business_node."','1',SYSDATE,'".$description."','".$result_des."')";
            }else{
                $insert_sql = "INSERT INTO TMP_BX_DAYPOST_DESCRIPTION(BUSINESS_CODE,HD_USER_NAME,BUSINESS_NODE,IS_SUBMIT,SYS_INSERT_DATE,BUSINESS_DATE,DESCRIPTION,RESULT) VALUES('".$business_code."','".$user_name."','".$business_node."','1',SYSDATE,TO_DATE('".$insert_date."','YYYY-MM-DD'),'".$description."','".$result_des."')";
            }
        }else{
            if(empty($insert_date)){
                $insert_sql = "INSERT INTO TMP_BX_DAYPOST_DESCRIPTION(BUSINESS_CODE,POLICY_CODE,HD_USER_NAME,BUSINESS_NODE,IS_SUBMIT,SYS_INSERT_DATE,DESCRIPTION,RESULT) VALUES('".$business_code."','".$policy_code."','".$user_name."','".$business_node."','1',SYSDATE,'".$description."','".$result_des."')";
            }else{
                $insert_sql = "INSERT INTO TMP_BX_DAYPOST_DESCRIPTION(BUSINESS_CODE,POLICY_CODE,HD_USER_NAME,BUSINESS_NODE,IS_SUBMIT,SYS_INSERT_DATE,BUSINESS_DATE,DESCRIPTION,RESULT) VALUES('".$business_code."','".$policy_code."','".$user_name."','".$business_node."','1',SYSDATE,TO_DATE('".$insert_date."','YYYY-MM-DD'),'".$description."','".$result_des."')";
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

    public function getNbChatDefine(){
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
                $where_time_bqsl = " AND A.SYS_INSERT_DATE BETWEEN to_date('" . $queryDateStart . "','yyyy-mm-dd') AND to_date('" . $queryDateEnd . "','yyyy-mm-dd') ";
            } else {
                $where_time_bqsl = " AND A.SYS_INSERT_DATE = to_date('" . $queryDateStart . "','yyyy-mm-dd') ";
            }
        } else {
            $where_time_bqsl = " AND A.SYS_INSERT_DATE = TRUNC(SYSDATE) ";
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
        $organCode = $method->getUserOrganCode();
        if((int)$userType==1){
            $where_type_fix = "";
        }else if((int)$userType==2){
//            dump($organCode);
            $where_type_fix =  " AND A.ORGAN_CODE LIKE '".$organCode[$user_name]."%'";
        }else if((int)$userType==3){
            $where_type_fix = " AND A.USER_NAME = '".$user_name."'";
        }
        if(in_array($user_name,$otherUser)){
            $where_type_fix =  " AND A.ORGAN_CODE NOT LIKE '".$organCode[$user_name]."%'";
        }

        $num = 0;
        ################################################################   保全受理   #######################################################################
        //保全室、理赔室、核保室不参与
        if((!in_array($user_name,$fuhe_user)&&!in_array($user_name,$clm_user)&&!in_array($user_name,$uw_user))||(int)$userType==1) {
            #033 个人待确认保全受理查询
            $select_bqsl = "SELECT DISTINCT 
                                  --A.SEND_ID,
                                  --A.RECEIVE_OBJ,
                                  A.CHANNEL_TYPE,
                                  A.APPLY_CODE,
                                  A.POLICY_CODE,
                                  A.HOLDER_MOBILE,
                                  A.HOLDER_NAME,
                                  A.HOLDER_GENDER,
                                  A.INSURED_NAME,
                                  A.INSURED_GENDER,
                                  A.BUSI_PROD_NAME,
                                  TO_CHAR(A.SYS_INSERT_DATE,'YYYY-MM-DD') AS BUSI_INSERT_DATE,
                                  TO_CHAR(A.ISSUE_DATE,'YYYY-MM-DD') AS ISSUE_DATE,
                                  TO_CHAR(A.VALIDATE_DATE,'YYYY-MM-DD') AS VALIDATE_DATE,
                                  A.AGENT_NAME,
                                  A.AGENT_MOBILE,
                                  --A.SEND_MOBILE,
                                  --TO_CHAR(A.SEND_CONTENT) AS SEND_CONTENT,
                                  A.USER_NAME,
                                  A.ORGAN_CODE,
                                  B.IS_SELECT_POLICY,
                                  B.IS_CHECK_POLICY,
                                  D.BUSINESS_NAME,
                                  (SELECT W.TC_ID FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID,',') WITHIN group(order by N.TC_ID) AS TC_ID FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.APPLY_CODE AND W.FIND_NODE = A.BUSINESS_NODE) AS TC_ID,
                                   --C.TC_ID,
                                   (CASE
                                      WHEN C.TC_ID IS NULL THEN B.RESULT
                                        ELSE '错误'
                                    END) AS RESULT,
                                   (CASE
                                      WHEN C.TC_USER_NAME IS NULL THEN B.HD_USER_NAME
                                        ELSE C.TC_USER_NAME
                                    END) AS HD_USER_NAME,
                                    (CASE
                                  WHEN (SELECT TO_CHAR(W.CREATE_DATE,'YYYY-MM-DD') FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,N.CREATE_DATE FROM TMP_QDSX_TC_BUG N WHERE 1=1 order BY N.CREATE_DATE ASC) W WHERE W.BUSINESS_CODE = A.APPLY_CODE AND W.FIND_NODE = A.BUSINESS_NODE AND ROWNUM = 1) IS NULL THEN TO_CHAR(B.SYS_INSERT_DATE,'YYYY-MM-DD')
                                  ELSE (SELECT TO_CHAR(W.CREATE_DATE,'YYYY-MM-DD') FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,N.CREATE_DATE FROM TMP_QDSX_TC_BUG N WHERE 1=1 order BY N.CREATE_DATE ASC) W WHERE W.BUSINESS_CODE = A.APPLY_CODE AND W.FIND_NODE = A.BUSINESS_NODE AND ROWNUM = 1)
                                END) AS SYS_INSERT_DATE,
                              --C.TC_ID||'-'||C.DESCRIPTION AS DESCRIPTION,
                                   (SELECT W.DESCRIPTION FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID||'-'||N.DESCRIPTION,',') WITHIN group(order by N.TC_ID) AS DESCRIPTION FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.APPLY_CODE AND W.FIND_NODE = A.BUSINESS_NODE) AS DESCRIPTION,
                                   --C.STATUS,
                                   (SELECT W.STATUS FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID||'-'||N.STATUS_DESC,',') WITHIN group(order by N.TC_ID) AS STATUS FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.APPLY_CODE AND W.FIND_NODE = A.BUSINESS_NODE) AS STATUS
                                  FROM TMP_QDSX_NB A
                                  LEFT JOIN TMP_BX_DAYPOST_DESCRIPTION B 
                                     ON A.APPLY_CODE = B.BUSINESS_CODE
                                     AND B.BUSINESS_NODE = A.BUSINESS_NODE
                                     AND B.BUSINESS_DATE = A.SYS_INSERT_DATE
                                     LEFT JOIN TMP_QDSX_TC_BUG C  
                                     ON C.BUSINESS_CODE = A.APPLY_CODE
                                     AND C.FIND_NODE = A.BUSINESS_NODE
                                     LEFT JOIN TMP_BUSINESS_NODE D
                                     ON D.BUSINESS_NODE = A.BUSINESS_NODE
                                 WHERE 1=1" . $where_time_bqsl . $where_type_fix;
            Log::write('承保短信查询条件：'.$where_time_bqsl . $where_type_fix,'INFO');
            Log::write('承保短信查询条件：'.$select_bqsl,'INFO');
            $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
            $bqsl_result_time = $method->search_long($result_rows);
            for ($i = $num; $i < sizeof($bqsl_result_time); $i++) {
                $value = $bqsl_result_time[$i];
//                $result[$i]['send_id'] = $value['SEND_ID'];
//                $result[$i]['receive_obj'] = $value['RECEIVE_OBJ'];
                $result[$i]['channel_type'] = $value['CHANNEL_TYPE'];
                $result[$i]['apply_code'] = $value['APPLY_CODE'];
                $result[$i]['policy_code'] = $value['POLICY_CODE'];
                $result[$i]['holder_mobile'] = $value['HOLDER_MOBILE'];
                $result[$i]['holder_name'] = $value['HOLDER_NAME'];
                $result[$i]['holder_gender'] = $value['HOLDER_GENDER'];
                $result[$i]['insured_name'] = $value['INSURED_NAME'];
                $result[$i]['insured_gender'] = $value['INSURED_GENDER'];
                $result[$i]['busi_prod_name'] = $value['BUSI_PROD_NAME'];
                $result[$i]['issue_date'] = $value['ISSUE_DATE'];
                $result[$i]['validate_date'] = $value['VALIDATE_DATE'];
                $result[$i]['agent_name'] = $value['AGENT_NAME'];
                $result[$i]['agent_mobile'] = $value['AGENT_MOBILE'];
//                $result[$i]['send_mobile'] = $value['SEND_MOBILE'];
//                $result[$i]['send_content'] = $value['SEND_CONTENT'];
                $result[$i]['user_name'] = $value['USER_NAME'];
                $result[$i]['organ_code'] = $value['ORGAN_CODE'];
                $result[$i]['business_name'] = $value['BUSINESS_NAME'];
                $result[$i]['busi_insert_date'] = $value['BUSI_INSERT_DATE'];
                $result[$i]['IS_SELECT_POLICY'] = $value['IS_SELECT_POLICY'];
                $result[$i]['IS_CHECK_POLICY'] = $value['IS_CHECK_POLICY'];
                if(empty( $value['TC_ID'])){
                    $result[$i]['TC_ID'] = "-";
                }else{
                    $result[$i]['TC_ID'] = $value['TC_ID'];
                }
                if(empty( $value['RESULT'])){
                    $result[$i]['RESULT'] = "-";
                }else{
                    $result[$i]['RESULT'] = $value['RESULT'];
                }
                $result[$i]['HD_USER_NAME'] = $value['HD_USER_NAME'];
                $result[$i]['SYS_INSERT_DATE'] = $value['SYS_INSERT_DATE'];
                if (empty($value['DESCRIPTION'])) {
                    $result[$i]['DESCRIPTION'] = "-";
                } else {
                    $result[$i]['DESCRIPTION'] = $value['DESCRIPTION'];
                }
                $result[$i]['STATUS'] = $value['STATUS'];
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

    public function getClmChatDefine(){
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
                $where_time_bqsl = " AND A.SYS_INSERT_DATE BETWEEN to_date('" . $queryDateStart . "','yyyy-mm-dd') AND to_date('" . $queryDateEnd . "','yyyy-mm-dd') ";
            } else {
                $where_time_bqsl = " AND A.SYS_INSERT_DATE = to_date('" . $queryDateStart . "','yyyy-mm-dd') ";
            }
        } else {
            $where_time_bqsl = " AND A.SYS_INSERT_DATE = TRUNC(SYSDATE) ";
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
            $where_type_fix =  " AND A.ORGAN_CODE LIKE '".$organCode[$user_name]."%'";
        }else if((int)$userType==3){
            $where_type_fix = " AND A.USER_NAME = '".$user_name."'";
        }
        if(in_array($user_name,$otherUser)){
            $where_type_fix =  " AND A.ORGAN_CODE NOT LIKE '8647%'";
        }
        Log::write($user_name.' 数据库查询条件：'.$where_time_bqsl.$where_type_fix,'INFO');

        $num = 0;
        ################################################################   保全受理   #######################################################################
        //保全室、理赔室、核保室不参与
        if((!in_array($user_name,$fuhe_user)&&!in_array($user_name,$clm_user)&&!in_array($user_name,$uw_user))||(int)$userType==1) {
            #033 个人待确认保全受理查询
            $select_bqsl = "SELECT  DISTINCT 
                                  TO_CHAR(A.INSERT_DATE,'YYYY-MM-DD') AS INSERT_DATE,
                                  TO_CHAR(A.SYS_INSERT_DATE,'YYYY-MM-DD') AS BUSI_INSERT_DATE,
                                  A.BUSINESS_CODE     ,
                                  A.CONTEND_ID,
                                  A.USER_NAME       ,
                                  A.MAIL_TITLE,
                                  DBMS_LOB.SUBSTR(A.contend_info,4000,1) AS CONTEND_INFO,
                                  A.ORGAN_CODE      , 
                                  B.IS_SELECT_POLICY,
                                  B.IS_CHECK_POLICY,
                                  D.BUSINESS_NAME,
                                       (SELECT W.TC_ID FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID,',') WITHIN group(order by N.TC_ID) AS TC_ID FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.CONTEND_ID AND W.FIND_NODE = A.BUSINESS_NODE) AS TC_ID,
                                       --C.TC_ID,
                                       (CASE
                                          WHEN C.TC_ID IS NULL THEN B.RESULT
                                            ELSE '错误'
                                        END) AS RESULT,
                                       (CASE
                                          WHEN C.TC_USER_NAME IS NULL THEN B.HD_USER_NAME
                                            ELSE C.TC_USER_NAME
                                        END) AS HD_USER_NAME,
                                      (CASE
                                         WHEN (SELECT TO_CHAR(W.CREATE_DATE,'YYYY-MM-DD') FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,N.CREATE_DATE FROM TMP_QDSX_TC_BUG N WHERE 1=1 order BY N.CREATE_DATE ASC) W WHERE W.BUSINESS_CODE = A.CONTEND_ID AND W.FIND_NODE = A.BUSINESS_NODE AND ROWNUM = 1) IS NULL THEN TO_CHAR(B.SYS_INSERT_DATE,'YYYY-MM-DD')
                                         ELSE (SELECT TO_CHAR(W.CREATE_DATE,'YYYY-MM-DD') FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,N.CREATE_DATE FROM TMP_QDSX_TC_BUG N WHERE 1=1 order BY N.CREATE_DATE ASC) W WHERE W.BUSINESS_CODE = A.CONTEND_ID AND W.FIND_NODE = A.BUSINESS_NODE AND ROWNUM = 1)
                                      END) AS SYS_INSERT_DATE,
                              --C.TC_ID||'-'||C.DESCRIPTION AS DESCRIPTION,
                                       (SELECT W.DESCRIPTION FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID||'-'||N.DESCRIPTION,',') WITHIN group(order by N.TC_ID) AS DESCRIPTION FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.CONTEND_ID AND W.FIND_NODE = A.BUSINESS_NODE) AS DESCRIPTION,
                                       --C.STATUS,
                                       (SELECT W.STATUS FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID||'-'||N.STATUS_DESC,',') WITHIN group(order by N.TC_ID) AS STATUS FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.CONTEND_ID AND W.FIND_NODE = A.BUSINESS_NODE) AS STATUS
                                    FROM TMP_BX_CLM_DX A 
                                    LEFT JOIN TMP_BX_DAYPOST_DESCRIPTION B 
                                      ON  A.CONTEND_ID = B.BUSINESS_CODE   
                                      AND B.BUSINESS_NODE = A.BUSINESS_NODE
                                      AND B.BUSINESS_DATE = A.SYS_INSERT_DATE
                                    LEFT JOIN TMP_QDSX_TC_BUG C  
                                      ON C.BUSINESS_CODE = A.CONTEND_ID
                                      --AND C.POLICY_CODE = A.POLICY_CODE
                                      AND C.FIND_NODE = A.BUSINESS_NODE
                                    LEFT JOIN TMP_BUSINESS_NODE D
                                      ON D.BUSINESS_NODE = A.BUSINESS_NODE
                                 WHERE 1=1 " . $where_time_bqsl . $where_type_fix;
            Log::write($user_name.' 数据库查询条件：'.$select_bqsl,'INFO');
            $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
            $bqsl_result_time = $method->search_long($result_rows);
            for ($i = $num; $i < sizeof($bqsl_result_time); $i++) {
                $value = $bqsl_result_time[$i];
                $result[$i]['BUSINESS_CODE'] = $value['BUSINESS_CODE'];
                $result[$i]['CONTEND_ID'] = $value['CONTEND_ID'];
                $result[$i]['USER_NAME'] = $value['USER_NAME'];
                $result[$i]['MAIL_TITLE'] = $value['MAIL_TITLE'];
                $result[$i]['CONTEND_INFO'] = $value['CONTEND_INFO'];
                $result[$i]['ORGAN_CODE'] = $value['ORGAN_CODE'];
                $result[$i]['BUSINESS_NAME'] = $value['BUSINESS_NAME'];
                $result[$i]['BUSI_INSERT_DATE'] = $value['BUSI_INSERT_DATE'];
                $result[$i]['IS_SELECT_POLICY'] = $value['IS_SELECT_POLICY'];
                $result[$i]['IS_CHECK_POLICY'] = $value['IS_CHECK_POLICY'];
                if(empty( $value['TC_ID'])){
                    $result[$i]['TC_ID'] = "-";
                }else{
                    $result[$i]['TC_ID'] = $value['TC_ID'];
                }
                if(empty( $value['RESULT'])){
                    $result[$i]['RESULT'] = "-";
                }else{
                    $result[$i]['RESULT'] = $value['RESULT'];
                }
                $result[$i]['HD_USER_NAME'] = $value['HD_USER_NAME'];
                $result[$i]['SYS_INSERT_DATE'] = $value['SYS_INSERT_DATE'];
                if (empty($value['DESCRIPTION'])) {
                    $result[$i]['DESCRIPTION'] = "-";
                } else {
                    $result[$i]['DESCRIPTION'] = $value['DESCRIPTION'];
                }
                $result[$i]['STATUS'] = $value['STATUS'];
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

    public function getDzChatDefine(){
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
                $where_time_bqsl = " AND A.SYS_INSERT_DATE BETWEEN to_date('" . $queryDateStart . "','yyyy-mm-dd') AND to_date('" . $queryDateEnd . "','yyyy-mm-dd') ";
            } else {
                $where_time_bqsl = " AND A.SYS_INSERT_DATE = to_date('" . $queryDateStart . "','yyyy-mm-dd') ";
            }
        } else {
            $where_time_bqsl = " AND A.SYS_INSERT_DATE = TRUNC(SYSDATE) ";
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
//        if((int)$userType==1){
            $where_type_fix = "";
//        }else if((int)$userType==2){
//            $organCode = $method->getUserOrganCode();
////            dump($organCode);
//            $where_type_fix =  " AND A.ORGAN_CODE LIKE '".$organCode[$user_name]."%'";
//        }else if((int)$userType==3){
//            $where_type_fix = " AND A.USER_NAME = '".$user_name."'";
//        }
//        if(in_array($user_name,$otherUser)){
//            $where_type_fix =  " AND A.ORGAN_CODE NOT LIKE '8647%'";
//        }
        Log::write($user_name.' 数据库查询条件：'.$where_time_bqsl.$where_type_fix,'INFO');

        $num = 0;
        ################################################################   保全受理   #######################################################################
        //保全室、理赔室、核保室不参与
        if((!in_array($user_name,$fuhe_user)&&!in_array($user_name,$clm_user)&&!in_array($user_name,$uw_user))||(int)$userType==1) {
            #033 个人待确认保全受理查询
            $select_bqsl = "SELECT  DISTINCT 
                                  TO_CHAR(A.SYS_INSERT_DATE,'YYYY-MM-DD') AS SYS_INSERT_DATE,
                                  A.BUSINESS_CODE,
                                  A.NEW_CHAT_NAME,
                                  A.OLD_CHAT_NAME,
                                  A.NEW_POLICY_NUM AS NEW_POLICY_CODE,
                                  A.OLD_POLICY_NUM AS OLD_POLICY_CODE,
                                  A.NEW_INSURANCE_CODE,
                                  A.OLD_INSURANCE_CODE,
                                  A.NEW_INSURANCE_NAME,
                                  A.OLD_INSURANCE_NAME,
                                  A.OLD_PERSONALITY,
                                  A.NEW_PERSONALITY,
                                  A.NEW_CUSTOMER_ID,
                                  A.OLD_CUSTOMER_ID,
                                  A.NEW_CUSTOMER_NAME,
                                  A.OLD_CUSTOMER_NAME,
                                  REPLACE(A.OLD_CUSTOMER_PHONENUM,SUBSTR(A.OLD_CUSTOMER_PHONENUM,4,4),'****') AS OLD_CUSTOMER_PHONENUM,
                                  REPLACE(A.NEW_CUSTOMER_PHONENUM,SUBSTR(A.NEW_CUSTOMER_PHONENUM,4,4),'****') AS NEW_CUSTOMER_PHONENUM,
                                  A.NEW_AGENT_SAPID,
                                  A.OLD_AGENT_SAPID,
                                  A.IS_ACCORDANCE,
                                  --DBMS_LOB.SUBSTR(A.CONTEND_INFO,4000,1) AS CONTEND_INFO,
                                  B.IS_SELECT_POLICY,
                                  B.IS_CHECK_POLICY,
                                  D.BUSINESS_NAME,
                                       (SELECT W.TC_ID FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID,',') WITHIN GROUP(ORDER BY N.TC_ID) AS TC_ID FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.BUSINESS_CODE AND W.FIND_NODE = A.BUSINESS_NODE) AS TC_ID,
                                       --C.TC_ID,
                                       (CASE
                                          WHEN C.TC_ID IS NULL THEN B.RESULT
                                            ELSE '错误'
                                        END) AS RESULT,
                                       (CASE
                                          WHEN C.TC_USER_NAME IS NULL THEN B.HD_USER_NAME
                                            ELSE C.TC_USER_NAME
                                        END) AS HD_USER_NAME,
                                      (CASE
                                         WHEN (SELECT TO_CHAR(W.CREATE_DATE,'YYYY-MM-DD') FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,N.CREATE_DATE FROM TMP_QDSX_TC_BUG N WHERE 1=1 ORDER BY N.CREATE_DATE ASC) W WHERE W.BUSINESS_CODE = A.BUSINESS_CODE AND W.FIND_NODE = A.BUSINESS_NODE AND ROWNUM = 1) IS NULL THEN TO_CHAR(B.SYS_INSERT_DATE,'YYYY-MM-DD')
                                         ELSE (SELECT TO_CHAR(W.CREATE_DATE,'YYYY-MM-DD') FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,N.CREATE_DATE FROM TMP_QDSX_TC_BUG N WHERE 1=1 ORDER BY N.CREATE_DATE ASC) W WHERE W.BUSINESS_CODE = A.BUSINESS_CODE AND W.FIND_NODE = A.BUSINESS_NODE AND ROWNUM = 1)
                                      END) AS SYS_INSERT_DATE,
                              --C.TC_ID||'-'||C.DESCRIPTION AS DESCRIPTION,
                                       (SELECT W.DESCRIPTION FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID||'-'||N.DESCRIPTION,',') WITHIN GROUP(ORDER BY N.TC_ID) AS DESCRIPTION FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.BUSINESS_CODE AND W.FIND_NODE = A.BUSINESS_NODE) AS DESCRIPTION,
                                       --C.STATUS,
                                       (SELECT W.STATUS FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID||'-'||N.STATUS_DESC,',') WITHIN GROUP(ORDER BY N.TC_ID) AS STATUS FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.BUSINESS_CODE AND W.FIND_NODE = A.BUSINESS_NODE) AS STATUS
                                    FROM TMP_BX_DZDX A 
                                    LEFT JOIN TMP_BX_DAYPOST_DESCRIPTION B 
                                      ON  A.BUSINESS_CODE = B.BUSINESS_CODE   
                                      AND B.BUSINESS_NODE = A.BUSINESS_NODE
                                      AND B.BUSINESS_DATE = A.SYS_INSERT_DATE
                                    LEFT JOIN TMP_QDSX_TC_BUG C  
                                      ON C.BUSINESS_CODE = A.BUSINESS_CODE
                                      AND C.FIND_NODE = A.BUSINESS_NODE
                                    LEFT JOIN TMP_BUSINESS_NODE D
                                      ON D.BUSINESS_NODE = A.BUSINESS_NODE
                                 WHERE 1=1 AND A.IS_ACCORDANCE = '否' " . $where_time_bqsl . $where_type_fix;
            Log::write($user_name.' 数据库查询条件：'.$select_bqsl,'INFO');
            $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
            $bqsl_result_time = $method->search_long($result_rows);
            for ($i = $num; $i < sizeof($bqsl_result_time); $i++) {
                $value = $bqsl_result_time[$i];
                $result[$i]['BUSI_INSERT_DATE'] = $value['SYS_INSERT_DATE'];
                $result[$i]['BUSINESS_CODE'] = $value['BUSINESS_CODE'];
                $result[$i]['NEW_CHAT_NAME'] = $value['NEW_CHAT_NAME'];
                $result[$i]['OLD_CHAT_NAME'] = $value['OLD_CHAT_NAME'];
                $result[$i]['NEW_POLICY_CODE'] = $value['NEW_POLICY_CODE'];
                $result[$i]['OLD_POLICY_CODE'] = $value['OLD_POLICY_CODE'];
                $result[$i]['NEW_INSURANCE_CODE'] = $value['NEW_INSURANCE_CODE'];
                $result[$i]['OLD_INSURANCE_CODE'] = $value['OLD_INSURANCE_CODE'];
                $result[$i]['NEW_INSURANCE_NAME'] = $value['NEW_INSURANCE_NAME'];
                $result[$i]['OLD_INSURANCE_NAME'] = $value['OLD_INSURANCE_NAME'];
                $result[$i]['NEW_CUSTOMER_ID'] = $value['NEW_CUSTOMER_ID'];
                $result[$i]['OLD_CUSTOMER_ID'] = $value['OLD_CUSTOMER_ID'];
                $result[$i]['NEW_CUSTOMER_NAME'] = $value['NEW_CUSTOMER_NAME'];
                $result[$i]['OLD_CUSTOMER_NAME'] = $value['OLD_CUSTOMER_NAME'];
                $result[$i]['NEW_CUSTOMER_PHONENUM'] = $value['NEW_CUSTOMER_PHONENUM'];
                $result[$i]['OLD_CUSTOMER_PHONENUM'] = $value['OLD_CUSTOMER_PHONENUM'];
                $result[$i]['OLD_PERSONALITY'] = $value['OLD_PERSONALITY'];
                $result[$i]['NEW_PERSONALITY'] = $value['NEW_PERSONALITY'];
                $result[$i]['NEW_AGENT_SAPID'] = $value['NEW_AGENT_SAPID'];
                $result[$i]['OLD_AGENT_SAPID'] = $value['OLD_AGENT_SAPID'];
                $result[$i]['IS_SELECT_POLICY'] = $value['IS_SELECT_POLICY'];
                $result[$i]['IS_CHECK_POLICY'] = $value['IS_CHECK_POLICY'];
                $result[$i]['BUSINESS_NAME'] = $value['BUSINESS_NAME'];
                $result[$i]['IS_ACCORDANCE'] = $value['IS_ACCORDANCE'];
                $result[$i]['SYS_INSERT_DATE'] = $value['SYS_INSERT_DATE'];
                if(empty( $value['TC_ID'])){
                    $result[$i]['TC_ID'] = "-";
                }else{
                    $result[$i]['TC_ID'] = $value['TC_ID'];
                }
                if(empty( $value['RESULT'])){
                    $result[$i]['RESULT'] = "-";
                }else{
                    $result[$i]['RESULT'] = $value['RESULT'];
                }
                $result[$i]['HD_USER_NAME'] = $value['HD_USER_NAME'];
                if (empty($value['DESCRIPTION'])) {
                    $result[$i]['DESCRIPTION'] = "-";
                } else {
                    $result[$i]['DESCRIPTION'] = $value['DESCRIPTION'];
                }
                $result[$i]['STATUS'] = $value['STATUS'];
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

    public function getCsChatDefine(){
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
                $where_time_bqsl = " AND A.SYS_INSERT_DATE BETWEEN to_date('" . $queryDateStart . "','yyyy-mm-dd') AND to_date('" . $queryDateEnd . "','yyyy-mm-dd') ";
            } else {
                $where_time_bqsl = " AND A.SYS_INSERT_DATE = to_date('" . $queryDateStart . "','yyyy-mm-dd') ";
            }
        } else {
            $where_time_bqsl = " AND A.SYS_INSERT_DATE = TRUNC(SYSDATE) ";
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
            $where_type_fix =  " AND 1=1 ";
        }else if((int)$userType==3){
            $where_type_fix = " AND A.USER_NAME = '".$user_name."'";
        }
        if(in_array($user_name,$otherUser)){
            $where_type_fix =  " AND 1=1 ";
        }

        $num = 0;
        ################################################################   保全受理   #######################################################################
        //保全室、理赔室、核保室不参与
        if((!in_array($user_name,$fuhe_user)&&!in_array($user_name,$clm_user)&&!in_array($user_name,$uw_user))||(int)$userType==1) {
            #033 个人待确认保全受理查询
            $select_bqsl = "SELECT DISTINCT 
                                   A.CONTENT_ID,
                                   A.CHAT_NAME,
                                   A.ACCEPT_CODE,
                                   A.POLICY_CODE,
                                   TO_CHAR(A.ISSUE_DATE,'YYYY-MM-DD') AS ISSUE_DATE,
                                   TO_CHAR(A.POLICY_VALIDATE_DATE,'YYYY-MM-DD') AS POLICY_VALIDATE_DATE,
                                   A.HOLDER_NAME,
                                   A.POLICY_STATUS,
                                   TO_CHAR(A.DEADLINE_DATE,'YYYY-MM-DD') AS DEADLINE_DATE,
                                   A.SERVICE_NAME,
                                   A.SERVICE_CODE,
                                   A.GET_MONEY,
                                   A.RECEIPTOR_NAME,
                                   --A.PHONE,
                                   --A.CHAT_CONTENT,
                                  B.IS_SELECT_POLICY,
                                  B.IS_CHECK_POLICY,
                                   D.BUSINESS_NAME,
                                   TO_CHAR(A.SYS_INSERT_DATE,'YYYY-MM-DD') AS BUSI_INSERT_DATE,
                                   (SELECT W.TC_ID FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID,',') WITHIN group(order by N.TC_ID) AS TC_ID FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.CONTENT_ID AND W.FIND_NODE = A.BUSINESS_NODE) AS TC_ID,
                                   --C.TC_ID,
                                   (CASE
                                      WHEN C.TC_ID IS NULL THEN B.RESULT
                                        ELSE '错误'
                                    END) AS RESULT,
                                   (CASE
                                      WHEN C.TC_USER_NAME IS NULL THEN B.HD_USER_NAME
                                        ELSE C.TC_USER_NAME
                                    END) AS HD_USER_NAME,
                                  (CASE
                                  WHEN (SELECT TO_CHAR(W.CREATE_DATE,'YYYY-MM-DD') FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,N.CREATE_DATE FROM TMP_QDSX_TC_BUG N WHERE 1=1 order BY N.CREATE_DATE ASC) W WHERE W.BUSINESS_CODE = A.CONTENT_ID AND W.FIND_NODE = A.BUSINESS_NODE AND ROWNUM = 1) IS NULL THEN TO_CHAR(B.SYS_INSERT_DATE,'YYYY-MM-DD')
                                  ELSE (SELECT TO_CHAR(W.CREATE_DATE,'YYYY-MM-DD') FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,N.CREATE_DATE FROM TMP_QDSX_TC_BUG N WHERE 1=1 order BY N.CREATE_DATE ASC) W WHERE W.BUSINESS_CODE = A.CONTENT_ID AND W.FIND_NODE = A.BUSINESS_NODE AND ROWNUM = 1)
                                END) AS SYS_INSERT_DATE,
                               --C.TC_ID||'-'||C.DESCRIPTION AS DESCRIPTION,
                                   (SELECT W.DESCRIPTION FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID||'-'||N.DESCRIPTION,',') WITHIN group(order by N.TC_ID) AS DESCRIPTION FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.CONTENT_ID AND W.FIND_NODE = A.BUSINESS_NODE) AS DESCRIPTION,
                                   --C.STATUS,
                                   (SELECT W.STATUS FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID||'-'||N.STATUS_DESC,',') WITHIN group(order by N.TC_ID) AS STATUS FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.CONTENT_ID AND W.FIND_NODE = A.BUSINESS_NODE) AS STATUS
                                FROM TMP_QDSX_CS A 
                                LEFT JOIN TMP_BX_DAYPOST_DESCRIPTION B 
                                  ON A.CONTENT_ID = B.BUSINESS_CODE
                                  AND B.BUSINESS_NODE = A.BUSINESS_NODE
                                  AND B.BUSINESS_DATE = TRUNC(A.SYS_INSERT_DATE)
                                LEFT JOIN TMP_QDSX_TC_BUG C  
                                  ON C.BUSINESS_CODE = A.CONTENT_ID
                                  --AND C.POLICY_CODE = A.POLICY_CODE
                                  AND C.FIND_NODE = A.BUSINESS_NODE
                                LEFT JOIN TMP_BUSINESS_NODE D
                                  ON D.BUSINESS_NODE = A.BUSINESS_NODE
                                 WHERE 1=1 " . $where_time_bqsl . $where_type_fix;
            $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
            Log::write($user_name.' 保全短信查询：'.$select_bqsl,'INFO');
            $bqsl_result_time = $method->search_long($result_rows);
            for ($i = $num; $i < sizeof($bqsl_result_time); $i++) {
                $value = $bqsl_result_time[$i];
                $result[$i]['send_id'] = $value['CONTENT_ID'];
                $result[$i]['chat_name'] = $value['CHAT_NAME'];
                $result[$i]['accept_code'] = $value['ACCEPT_CODE'];
                $result[$i]['policy_code'] = $value['POLICY_CODE'];
                $result[$i]['issue_date'] = $value['ISSUE_DATE'];
                $result[$i]['validate_date'] = $value['POLICY_VALIDATE_DATE'];
                $result[$i]['holder_name'] = $value['HOLDER_NAME'];
                $result[$i]['status'] = $value['POLICY_STATUS'];
                $result[$i]['deadline_date'] = $value['DEADLINE_DATE'];
                $result[$i]['service_name'] = $value['SERVICE_NAME'];
                $result[$i]['service_type'] = $value['SERVICE_TYPE'];
                $result[$i]['service_code'] = $value['SERVICE_CODE'];
                $result[$i]['get_money'] = $value['GET_MONEY'];
                $result[$i]['receiptor_name'] = $value['RECEIPTOR_NAME'];
//                $result[$i]['phone'] = $value['PHONE'];
//                $result[$i]['chat_content'] = $value['CHAT_CONTENT'];
                $result[$i]['business_name'] = $value['BUSINESS_NAME'];
                $result[$i]['busi_insert_date'] = $value['BUSI_INSERT_DATE'];
                $result[$i]['IS_SELECT_POLICY'] = $value['IS_SELECT_POLICY'];
                $result[$i]['IS_CHECK_POLICY'] = $value['IS_CHECK_POLICY'];
                if(empty( $value['TC_ID'])){
                    $result[$i]['TC_ID'] = "-";
                }else{
                    $result[$i]['TC_ID'] = $value['TC_ID'];
                }
                if(empty( $value['RESULT'])){
                    $result[$i]['RESULT'] = "-";
                }else{
                    $result[$i]['RESULT'] = $value['RESULT'];
                }
                $result[$i]['HD_USER_NAME'] = $value['HD_USER_NAME'];
                $result[$i]['SYS_INSERT_DATE'] = $value['SYS_INSERT_DATE'];
                if (empty($value['DESCRIPTION'])) {
                    $result[$i]['DESCRIPTION'] = "-";
                } else {
                    $result[$i]['DESCRIPTION'] = $value['DESCRIPTION'];
                }
                $result[$i]['STATUS'] = $value['STATUS'];
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

    public function updatePublicDefine(){
        header('Content-type: text/html; charset=utf-8');
        $user_name = $_POST['username'];
        $business_name = $_POST['business_name'];
        Log::write($user_name.' 业务节点：'.$business_name,'INFO');
        $policy_code = $_POST['policy_code'];
        $accept_code = $_POST['business_code'];
        $insert_date = $_POST['insert_date'];
        $is_check_policy = $_POST['is_check_policy'];
        $is_select_policy = $_POST['is_select_policy'];
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
        $select_node = "SELECT BUSINESS_NODE FROM TMP_BUSINESS_NODE WHERE BUSINESS_NAME = '".$business_name."'";
        $result_rows = oci_parse($conn, $select_node); // 配置SQL语句，执行SQL
        $node_result = $method->search_long($result_rows);

        Log::write($user_name.' 业务节点：'.$business_name,'INFO');
        $select = "SELECT RESULT,HD_USER_NAME FROM TMP_BX_DAYPOST_DESCRIPTION WHERE BUSINESS_CODE = '".$accept_code."' AND BUSINESS_NODE = '".$node_result[0]['BUSINESS_NODE']."' AND BUSINESS_DATE = TO_DATE('".$insert_date."','YYYY-MM-DD') ";
        ############################################################################################################################################################
        $result_rows1 = oci_parse($conn, $select); // 配置SQL语句，执行SQL
        $select_result = $method->search_long($result_rows1);
        if(!empty($select_result[0]['RESULT'])){
            $result['status'] = "failed";
            $result['message'] = "用户：".$select_result[0]['HD_USER_NAME']."已进行该业务核对，无需进行再次核对！";
            exit(json_encode($result));
        }
        Log::write($user_name.' 业务节点+关键业务号：'.$node_result[0]['BUSINESS_NODE'].$accept_code,'INFO');

        if(!empty($is_select_policy)){
            $update_cs_define = "UPDATE TMP_BX_DAYPOST_DESCRIPTION SET IS_SELECT_POLICY = '1', RESULT = '正确', HD_USER_NAME = '".$user_name."',BUSINESS_TIME=TO_CHAR(SYSDATE,'HH24:mi:ss') WHERE BUSINESS_CODE = '".$accept_code."' AND POLICY_CODE = '".$policy_code."' AND BUSINESS_NODE = '".$node_result[0]['BUSINESS_NODE']."'";
            Log::write($user_name.' 数据库查询SQL：'.$update_cs_define,'INFO');
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

        #$sysDate = date('yyyy/mm/dd', time());
        if(!empty($is_check_policy)){
            $is_check_policy_before = ",IS_CHECK_POLICY";
            $is_check_policy_after = ",'1'";
        }else if(!empty($is_select_policy)){
            $is_check_policy_before = ",IS_SELECT_POLICY";
            $is_check_policy_after = ",'1'";
        }else{
            $is_check_policy_before = "";
            $is_check_policy_after = "";
        }
        if(empty($policy_code)){
            if(empty($insert_date)){
                $insert_sql = "INSERT INTO TMP_BX_DAYPOST_DESCRIPTION(BUSINESS_CODE,HD_USER_NAME,BUSINESS_NODE,SYS_INSERT_DATE".$is_check_policy_before.") VALUES('".$accept_code."','".$user_name."','".$node_result[0]['BUSINESS_NODE']."',TRUNC(SYSDATE)".$is_check_policy_after.")";
            }else{
                $insert_sql = "INSERT INTO TMP_BX_DAYPOST_DESCRIPTION(BUSINESS_CODE,HD_USER_NAME,BUSINESS_NODE,SYS_INSERT_DATE,BUSINESS_DATE".$is_check_policy_before.") VALUES('".$accept_code."','".$user_name."','".$node_result[0]['BUSINESS_NODE']."',TRUNC(SYSDATE),TO_DATE('".$insert_date."','YYYY-MM-DD')".$is_check_policy_after.")";
            }
        }else{
            if(empty($insert_date)){
                $insert_sql = "INSERT INTO TMP_BX_DAYPOST_DESCRIPTION(BUSINESS_CODE,POLICY_CODE,HD_USER_NAME,BUSINESS_NODE,SYS_INSERT_DATE".$is_check_policy_before.") VALUES('".$accept_code."','".$policy_code."','".$user_name."','".$node_result[0]['BUSINESS_NODE']."',TRUNC(SYSDATE)".$is_check_policy_after.")";
            }else{
                $insert_sql = "INSERT INTO TMP_BX_DAYPOST_DESCRIPTION(BUSINESS_CODE,POLICY_CODE,HD_USER_NAME,BUSINESS_NODE,SYS_INSERT_DATE,BUSINESS_DATE".$is_check_policy_before.") VALUES('".$accept_code."','".$policy_code."','".$user_name."','".$node_result[0]['BUSINESS_NODE']."',TRUNC(SYSDATE),TO_DATE('".$insert_date."','YYYY-MM-DD')".$is_check_policy_after.")";
            }
        }
        #$update_cs_define = "UPDATE TMP_QDSX_DAYPOST_DESCRIPTION SET BUSINESS_CODE = '".$accept_code."', HD_USER_NAME = '".$user_name."', POLICY_CODE = '".$policy_code."', RESULT = '".$result."', BUSINESS_NODE = '".$node_result[0]['BUSINESS_NODE']."'";
        Log::write($user_name.' 并行公共确认结果数据库插入SQL：'.$insert_sql,'INFO');
        $result_rows = oci_parse($conn, $insert_sql); // 配置SQL语句，执行SQL
        if(oci_execute($result_rows, OCI_COMMIT_ON_SUCCESS)){
            $result['status'] = "success";
            $result['message'] = "关键业务号：".$accept_code."-业务号：".$policy_code." 确认抽检成功！";
        }else{
            $result['status'] = "failed";
            $e = oci_error();
            $result['message'] = "确认抽检失败".$e['message'];
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

    public function getNbBdDefine(){
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
                $where_time_bqsl = " AND A.SYS_INSERT_DATE BETWEEN to_date('" . $queryDateStart . "','yyyy-mm-dd') AND to_date('" . $queryDateEnd . "','yyyy-mm-dd') ";
            } else {
                $where_time_bqsl = " AND A.SYS_INSERT_DATE = to_date('" . $queryDateStart . "','yyyy-mm-dd') ";
            }
        } else {
            $where_time_bqsl = " AND A.SYS_INSERT_DATE = TRUNC(SYSDATE) ";
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
            $where_type_fix =  " AND A.ORGAN_CODE LIKE '".$organCode[$user_name]."%'";
        }else if((int)$userType==3){
            $where_type_fix = " AND A.USER_NAME = '".$user_name."'";
        }
        if(in_array($user_name,$otherUser)){
            $where_type_fix =  " AND A.ORGAN_CODE NOT LIKE '8647%'";
        }

        $num = 0;
        ################################################################   保全受理   #######################################################################
        //保全室、理赔室、核保室不参与
        if((!in_array($user_name,$fuhe_user)&&!in_array($user_name,$clm_user)&&!in_array($user_name,$uw_user))||(int)$userType==1) {
            #033 个人待确认保全受理查询
            $select_bqsl = "SELECT DISTINCT 
                               A.POLICY_CODE,
                               A.MEDIA_TYPE,
                               TO_CHAR(A.FTP_DATE,'YYYY-MM-DD') AS FTP_DATE,--FTP路径
                               TO_CHAR(A.ISSUE_DATE,'YYYY-MM-DD') AS ISSUE_DATE,
                               A.BUSI_PROD_NAME,
                               A.CHARGE_PERIOD,
                               A.RELATION_TO_PH,
                               A.LEGAL_BENE,
                               A.USER_NAME,
                               A.ORGAN_CODE,
                               D.BUSINESS_NAME,
                               DZ.PRINT_DZ,
                               ZZ.PRINT_ZZ,
                               B.BUSINESS_TIME,
                               B.IS_CHECK_POLICY,
                               B.IS_SELECT_POLICY,
                               TO_CHAR(TPP.BPO_PRINT_DATE,'YYYY-MM-DD') AS BPO_PRINT_DATE,--外包打印日期
                               TO_CHAR(A.SYS_INSERT_DATE,'YYYY-MM-DD') AS BUSI_INSERT_DATE,
                               (SELECT W.TC_ID FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID,',') WITHIN group(order by N.TC_ID) AS TC_ID FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.POLICY_CODE AND W.FIND_NODE = A.BUSINESS_NODE) AS TC_ID,
                               --C.TC_ID,
                               (CASE
                                  WHEN C.TC_ID IS NULL THEN B.RESULT
                                    ELSE '错误'
                                END) AS RESULT,
                               (CASE
                                  WHEN C.TC_USER_NAME IS NULL THEN B.HD_USER_NAME
                                    ELSE C.TC_USER_NAME
                                END) AS HD_USER_NAME,
                               (CASE
                                  WHEN (SELECT TO_CHAR(W.CREATE_DATE,'YYYY-MM-DD') FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,N.CREATE_DATE FROM TMP_QDSX_TC_BUG N WHERE 1=1 order BY N.CREATE_DATE ASC) W WHERE W.BUSINESS_CODE = A.POLICY_CODE AND W.FIND_NODE = A.BUSINESS_NODE AND ROWNUM = 1) IS NULL THEN TO_CHAR(B.SYS_INSERT_DATE,'YYYY-MM-DD')
                                  ELSE (SELECT TO_CHAR(W.CREATE_DATE,'YYYY-MM-DD') FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,N.CREATE_DATE FROM TMP_QDSX_TC_BUG N WHERE 1=1 order BY N.CREATE_DATE ASC) W WHERE W.BUSINESS_CODE = A.POLICY_CODE AND W.FIND_NODE = A.BUSINESS_NODE AND ROWNUM = 1)
                                END) AS SYS_INSERT_DATE,
                               --C.TC_ID||'-'||C.DESCRIPTION AS DESCRIPTION,
                               (SELECT W.DESCRIPTION FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID||'-'||N.DESCRIPTION,',') WITHIN group(order by N.TC_ID) AS DESCRIPTION FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.POLICY_CODE AND W.FIND_NODE = A.BUSINESS_NODE) AS DESCRIPTION,
                               --C.STATUS,
                               (SELECT W.STATUS FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID||'-'||N.STATUS_DESC,',') WITHIN group(order by N.TC_ID) AS STATUS FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.POLICY_CODE AND W.FIND_NODE = A.BUSINESS_NODE) AS STATUS
                            FROM TMP_BX_NB_BXHT A 
                            LEFT JOIN TMP_BX_DAYPOST_DESCRIPTION B 
                              ON A.POLICY_CODE = B.BUSINESS_CODE
                              --AND A.MEDIA_TYPE = B.MEDIA_TYPE
                              AND B.BUSINESS_NODE = A.BUSINESS_NODE
                              AND B.BUSINESS_DATE = A.SYS_INSERT_DATE
                            LEFT JOIN TMP_QDSX_TC_BUG C  
                              ON C.BUSINESS_CODE = A.POLICY_CODE
                              --AND C.POLICY_CODE = A.POLICY_CODE
                              AND C.FIND_NODE = A.BUSINESS_NODE
                            LEFT JOIN TMP_BUSINESS_NODE D
                              ON D.BUSINESS_NODE = A.BUSINESS_NODE
                            LEFT JOIN TMP_QDSX_NB_PRINT_DZ  DZ
                            ON  A.POLICY_CODE = DZ.POLICY_CODE
                            LEFT JOIN TMP_QDSX_NB_PRINT_ZZ  ZZ
                            ON A.POLICY_CODE = ZZ.POLICY_CODE
                            LEFT JOIN (SELECT TPP.POLICY_CODE,
                                              TPP.BPO_PRINT_DATE
                                         FROM APP___NB__DBUSER.T_POLICY_PRINT@BXNBS     TPP
                                        WHERE TPP.PRINT_TYPE = '1')                       TPP
                            ON TPP.POLICY_CODE = A.POLICY_CODE
                                 WHERE 1=1 " . $where_time_bqsl . $where_type_fix;
            $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
            $bqsl_result_time = $method->search_long($result_rows);
            Log::write($user_name.' 保单合同查询SQL：'.$select_bqsl,'INFO');
            for ($i = $num; $i < sizeof($bqsl_result_time); $i++) {
                $value = $bqsl_result_time[$i];
                $result[$i]['policy_code'] = $value['POLICY_CODE'];
                $result[$i]['media_type'] = $value['MEDIA_TYPE'];
                $result[$i]['ftp_date'] = $value['FTP_DATE'];
                $result[$i]['issue_date'] = $value['ISSUE_DATE'];
                $result[$i]['busi_prod_name'] = $value['BUSI_PROD_NAME'];
                $result[$i]['user_name'] = $value['USER_NAME'];
                $result[$i]['organ_code'] = $value['ORGAN_CODE'];
                $result[$i]['business_name'] = $value['BUSINESS_NAME'];
                $result[$i]['busi_insert_date'] = $value['BUSI_INSERT_DATE'];
                $result[$i]['business_time'] = $value['BUSINESS_TIME'];
                $result[$i]['charge_period'] = $value['CHARGE_PERIOD'];
                $result[$i]['relation_to_ph'] = $value['RELATION_TO_PH'];
                $result[$i]['legal_bene'] = $value['LEGAL_BENE'];
                $result[$i]['print_dz'] = $value['PRINT_DZ'];
                $result[$i]['print_zz'] = $value['PRINT_ZZ'];
                $result[$i]['bpo_print_date'] = $value['BPO_PRINT_DATE'];
                $result[$i]['is_check_policy'] = $value['IS_CHECK_POLICY'];
                $result[$i]['is_select_policy'] = $value['IS_SELECT_POLICY'];
                if(empty( $value['TC_ID'])){
                    $result[$i]['tc_id'] = "-";
                }else{
                    $result[$i]['tc_id'] = $value['TC_ID'];
                }
                if(empty( $value['RESULT'])){
                    $result[$i]['result'] = "-";
                }else{
                    $result[$i]['result'] = $value['RESULT'];
                }
                $result[$i]['hd_user_name'] = $value['HD_USER_NAME'];
                $result[$i]['sys_insert_date'] = $value['SYS_INSERT_DATE'];
                if (empty($value['DESCRIPTION'])) {
                    $result[$i]['description'] = "-";
                } else {
                    $result[$i]['description'] = $value['DESCRIPTION'];
                }
                $result[$i]['status'] = $value['STATUS'];
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

    public function expNbBd()
    {//导出Excel
        $xlsName = "新契约保险合同清单";
        $xlsTitle = "新契约保险合同清单";
        $xlsCell = array( //设置字段名和列名的映射
            array('policy_code', '保单号'),
            array('media_type', '保单方式(纸质/电子)'),
            array('ftp_date', 'FTP路径'),
            array('issue_date', '签单日期'),
            array('busi_prod_name', '险种名称（全部险种）'),
            array('charge_period', '主险交费频率'),
            array('relation_to_ph', '投被保人关系'),
            array('legal_bene', '是否法定受益人'),
            array('user_name', '操作员'),
            array('organ_code', '作业机构'),
            array('business_name', '业务节点'),
            array('print_dz', '电子保单下发状态'),
            array('print_zz', '纸质保单下发状态'),
            array('bpo_print_date', '外包打印日期'),
            array('business_time', '确认时间'),
            array('tc_id', '缺陷号'),
            array('result', '核对结果'),
            array('hd_user_name', '核对人'),
            array('sys_insert_date', '核对日期'),
            array('description', '存在问题'),
            array('status', '解决进度')
        );
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $select_bqsl = "SELECT DISTINCT 
                               A.POLICY_CODE,
                               A.MEDIA_TYPE,
                               TO_CHAR(A.FTP_DATE,'YYYY-MM-DD') AS FTP_DATE,--FTP路径
                               TO_CHAR(A.ISSUE_DATE,'YYYY-MM-DD') AS ISSUE_DATE,
                               A.BUSI_PROD_NAME,
                               A.CHARGE_PERIOD,
                               A.RELATION_TO_PH,
                               A.LEGAL_BENE,
                               A.USER_NAME,
                               A.ORGAN_CODE,
                               D.BUSINESS_NAME,
                               DZ.PRINT_DZ,
                               ZZ.PRINT_ZZ,
                               B.BUSINESS_TIME,
                               TO_CHAR(TPP.BPO_PRINT_DATE,'YYYY-MM-DD') AS BPO_PRINT_DATE,--外包打印日期
                               TO_CHAR(A.SYS_INSERT_DATE,'YYYY-MM-DD') AS BUSI_INSERT_DATE,
                               (SELECT W.TC_ID FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID,',') WITHIN group(order by N.TC_ID) AS TC_ID FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.POLICY_CODE AND W.FIND_NODE = A.BUSINESS_NODE) AS TC_ID,
                               --C.TC_ID,
                               (CASE
                                  WHEN C.TC_ID IS NULL THEN B.RESULT
                                    ELSE '错误'
                                END) AS RESULT,
                               (CASE
                                  WHEN C.TC_USER_NAME IS NULL THEN B.HD_USER_NAME
                                    ELSE C.TC_USER_NAME
                                END) AS HD_USER_NAME,
                               (CASE
                                  WHEN (SELECT TO_CHAR(W.CREATE_DATE,'YYYY-MM-DD') FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,N.CREATE_DATE FROM TMP_QDSX_TC_BUG N WHERE 1=1 order BY N.CREATE_DATE ASC) W WHERE W.BUSINESS_CODE = A.POLICY_CODE AND W.FIND_NODE = A.BUSINESS_NODE AND ROWNUM = 1) IS NULL THEN TO_CHAR(B.SYS_INSERT_DATE,'YYYY-MM-DD')
                                  ELSE (SELECT TO_CHAR(W.CREATE_DATE,'YYYY-MM-DD') FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,N.CREATE_DATE FROM TMP_QDSX_TC_BUG N WHERE 1=1 order BY N.CREATE_DATE ASC) W WHERE W.BUSINESS_CODE = A.POLICY_CODE AND W.FIND_NODE = A.BUSINESS_NODE AND ROWNUM = 1)
                                END) AS SYS_INSERT_DATE,
                               --C.TC_ID||'-'||C.DESCRIPTION AS DESCRIPTION,
                               (SELECT W.DESCRIPTION FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID||'-'||N.DESCRIPTION,',') WITHIN group(order by N.TC_ID) AS DESCRIPTION FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.POLICY_CODE AND W.FIND_NODE = A.BUSINESS_NODE) AS DESCRIPTION,
                               --C.STATUS,
                               (SELECT W.STATUS FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID||'-'||N.STATUS_DESC,',') WITHIN group(order by N.TC_ID) AS STATUS FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.POLICY_CODE AND W.FIND_NODE = A.BUSINESS_NODE) AS STATUS
                            FROM TMP_QDSX_NB_BXHT A 
                            LEFT JOIN TMP_BX_DAYPOST_DESCRIPTION B 
                              ON A.POLICY_CODE = B.BUSINESS_CODE
                              --AND A.MEDIA_TYPE = B.MEDIA_TYPE
                              AND B.BUSINESS_NODE = A.BUSINESS_NODE
                              AND B.BUSINESS_DATE = A.SYS_INSERT_DATE
                            LEFT JOIN TMP_QDSX_TC_BUG C  
                              ON C.BUSINESS_CODE = A.POLICY_CODE
                              --AND C.POLICY_CODE = A.POLICY_CODE
                              AND C.FIND_NODE = A.BUSINESS_NODE
                            LEFT JOIN TMP_BUSINESS_NODE D
                              ON D.BUSINESS_NODE = A.BUSINESS_NODE
                            LEFT JOIN TMP_QDSX_NB_PRINT_DZ  DZ
                            ON  A.POLICY_CODE = DZ.POLICY_CODE
                            LEFT JOIN TMP_QDSX_NB_PRINT_ZZ  ZZ
                            ON A.POLICY_CODE = ZZ.POLICY_CODE
                            LEFT JOIN (SELECT TPP.POLICY_CODE,
                                              TPP.BPO_PRINT_DATE
                                         FROM APP___NB__DBUSER.T_POLICY_PRINT@BXNBS15     TPP
                                        WHERE TPP.PRINT_TYPE = '1')                       TPP
                            ON TPP.POLICY_CODE = A.POLICY_CODE
                          WHERE 1=1 ";
        $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
        $bqsl_result_time = $method->search_long($result_rows);
        for ($i = 0; $i < sizeof($bqsl_result_time); $i++) {
            $value = $bqsl_result_time[$i];
            $result[$i]['policy_code'] = $value['POLICY_CODE'];
            $result[$i]['media_type'] = $value['MEDIA_TYPE'];
            $result[$i]['ftp_date'] = $value['FTP_DATE'];
            $result[$i]['issue_date'] = $value['ISSUE_DATE'];
            $result[$i]['busi_prod_name'] = $value['BUSI_PROD_NAME'];
            $result[$i]['user_name'] = $value['USER_NAME'];
            $result[$i]['organ_code'] = $value['ORGAN_CODE'];
            $result[$i]['business_name'] = $value['BUSINESS_NAME'];
            $result[$i]['busi_insert_date'] = $value['BUSI_INSERT_DATE'];
            $result[$i]['business_time'] = $value['BUSINESS_TIME'];
            $result[$i]['charge_period'] = $value['CHARGE_PERIOD'];
            $result[$i]['relation_to_ph'] = $value['RELATION_TO_PH'];
            $result[$i]['legal_bene'] = $value['LEGAL_BENE'];
            $result[$i]['print_dz'] = $value['PRINT_DZ'];
            $result[$i]['print_zz'] = $value['PRINT_ZZ'];
            $result[$i]['bpo_print_date'] = $value['BPO_PRINT_DATE'];
            if(empty( $value['TC_ID'])){
                $result[$i]['tc_id'] = "-";
            }else{
                $result[$i]['tc_id'] = $value['TC_ID'];
            }
            if(empty( $value['RESULT'])){
                $result[$i]['result'] = "-";
            }else{
                $result[$i]['result'] = $value['RESULT'];
            }
            $result[$i]['hd_user_name'] = $value['HD_USER_NAME'];
            $result[$i]['sys_insert_date'] = $value['SYS_INSERT_DATE'];
            if (empty($value['DESCRIPTION'])) {
                $result[$i]['description'] = "-";
            } else {
                $result[$i]['description'] = $value['DESCRIPTION'];
            }
            $result[$i]['status'] = $value['STATUS'];
        }
        for ($i = 0; $i < sizeof($result); $i++) {
            $res[] = $result[$i];
        }
        $method->exportExcelNbYs($xlsTitle, $xlsCell, $res, $xlsName);
    }

    public function updateNbBdDefine(){
        header('Content-type: text/html; charset=utf-8');
        $user_name = $_POST['username'];
        $business_name = $_POST['business_name'];
        $policy_code = $_POST['policy_code'];
        $accept_code = $_POST['business_code'];
        $media_type = $_POST['media_type'];
        $insert_date = $_POST['insert_date'];
//        $business_time = $_POST['business_time'];
//        $business_time = date("H:i:s",time());
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
        $select_node = "SELECT BUSINESS_NODE FROM TMP_BUSINESS_NODE WHERE BUSINESS_NAME = '".$business_name."'";
        $result_rows = oci_parse($conn, $select_node); // 配置SQL语句，执行SQL
        $node_result = $method->search_long($result_rows);
        #$sysDate = date('yyyy/mm/dd', tim0e());
        $select = "SELECT RESULT,HD_USER_NAME FROM TMP_BX_DAYPOST_DESCRIPTION WHERE BUSINESS_CODE = '".$accept_code."' AND BUSINESS_NODE = '".$node_result[0]['BUSINESS_NODE']."' AND BUSINESS_DATE = TO_DATE('".$insert_date."','YYYY-MM-DD') ";
        ############################################################################################################################################################
        $result_rows1 = oci_parse($conn, $select); // 配置SQL语句，执行SQL
        $select_result = $method->search_long($result_rows1);
        if(!empty($select_result[0]['RESULT'])){
            $result['status'] = "failed";
            $result['message'] = "用户：".$select_result[0]['HD_USER_NAME']."已进行该业务核对，无需进行再次核对！";
            exit(json_encode($result));
        }

//        if(empty($policy_code)){
//            if(empty($insert_date)){
//                $insert_sql = "INSERT INTO TMP_BX_DAYPOST_DESCRIPTION(BUSINESS_CODE,HD_USER_NAME,BUSINESS_NODE,RESULT,SYS_INSERT_DATE,MEDIA_TYPE,BUSINESS_TIME) VALUES('".$accept_code."','".$user_name."','".$node_result[0]['BUSINESS_NODE']."','正确',TRUNC(SYSDATE), '".$media_type."',TO_CHAR(SYSDATE,'HH24:mi:ss'))";
//            }else{
//                $insert_sql = "INSERT INTO TMP_BX_DAYPOST_DESCRIPTION(BUSINESS_CODE,HD_USER_NAME,BUSINESS_NODE,RESULT,SYS_INSERT_DATE,BUSINESS_DATE,MEDIA_TYPE,BUSINESS_TIME) VALUES('".$accept_code."','".$user_name."','".$node_result[0]['BUSINESS_NODE']."','正确',TRUNC(SYSDATE),TO_DATE('".$insert_date."','YYYY-MM-DD'), '".$media_type."',TO_CHAR(SYSDATE,'HH24:mi:ss'))";
//            }
//        }else{
//            if(empty($insert_date)){
//                $insert_sql = "INSERT INTO TMP_BX_DAYPOST_DESCRIPTION(BUSINESS_CODE,POLICY_CODE,HD_USER_NAME,BUSINESS_NODE,RESULT,SYS_INSERT_DATE,MEDIA_TYPE,BUSINESS_TIME) VALUES('".$accept_code."','".$policy_code."','".$user_name."','".$node_result[0]['BUSINESS_NODE']."','正确',TRUNC(SYSDATE), '".$media_type."',TO_CHAR(SYSDATE,'HH24:mi:ss'))";
//            }else{
//                $insert_sql = "INSERT INTO TMP_BX_DAYPOST_DESCRIPTION(BUSINESS_CODE,POLICY_CODE,HD_USER_NAME,BUSINESS_NODE,RESULT,SYS_INSERT_DATE,BUSINESS_DATE,MEDIA_TYPE,BUSINESS_TIME) VALUES('".$accept_code."','".$policy_code."','".$user_name."','".$node_result[0]['BUSINESS_NODE']."','正确',TRUNC(SYSDATE),TO_DATE('".$insert_date."','YYYY-MM-DD'), '".$media_type."',TO_CHAR(SYSDATE,'HH24:mi:ss'))";
//            }
//        }
        $update_cs_define = "UPDATE TMP_BX_DAYPOST_DESCRIPTION SET IS_SELECT_POLICY = '1', RESULT = '正确', HD_USER_NAME = '".$user_name."',BUSINESS_TIME=TO_CHAR(SYSDATE,'HH24:mi:ss') WHERE BUSINESS_CODE = '".$accept_code."' AND POLICY_CODE = '".$policy_code."'";
        Log::write($user_name.' 数据库查询SQL：'.$update_cs_define,'INFO');
        $result_rows = oci_parse($conn, $update_cs_define); // 配置SQL语句，执行SQL
        if(oci_execute($result_rows, OCI_COMMIT_ON_SUCCESS)){
            $result['status'] = "success";
            $result['message'] = "关键业务号：".$accept_code."-业务号：".$policy_code." 确认成功！";
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

    public function updateNbBdDefineCheck(){
        header('Content-type: text/html; charset=utf-8');
        $user_name = $_POST['username'];
        $business_name = $_POST['business_name'];
        $policy_code = $_POST['policy_code'];
        $accept_code = $_POST['business_code'];
        $media_type = $_POST['media_type'];
        $insert_date = $_POST['insert_date'];
//        $business_time = $_POST['business_time'];
//        $business_time = date("H:i:s",time());
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
        $select_node = "SELECT BUSINESS_NODE FROM TMP_BUSINESS_NODE WHERE BUSINESS_NAME = '".$business_name."'";
        $result_rows = oci_parse($conn, $select_node); // 配置SQL语句，执行SQL
        $node_result = $method->search_long($result_rows);
        #$sysDate = date('yyyy/mm/dd', tim0e());
        $select = "SELECT HD_USER_NAME FROM TMP_BX_DAYPOST_DESCRIPTION WHERE BUSINESS_CODE = '".$accept_code."' AND BUSINESS_NODE = '".$node_result[0]['BUSINESS_NODE']."' AND BUSINESS_DATE = TO_DATE('".$insert_date."','YYYY-MM-DD') ";
        ############################################################################################################################################################
        $result_rows1 = oci_parse($conn, $select); // 配置SQL语句，执行SQL
        $select_result = $method->search_long($result_rows1);
        if(!empty($select_result[0]['HD_USER_NAME'])){
            $result['status'] = "failed";
            $result['message'] = "用户：".$select_result[0]['HD_USER_NAME']."已进行该业务核对，无需进行再次核对！";
            exit(json_encode($result));
        }
        if(empty($policy_code)){
            if(empty($insert_date)){
                $insert_sql = "INSERT INTO TMP_BX_DAYPOST_DESCRIPTION(BUSINESS_CODE,HD_USER_NAME,BUSINESS_NODE,RESULT,SYS_INSERT_DATE,MEDIA_TYPE,BUSINESS_TIME,IS_CHECK_POLICY) VALUES('".$accept_code."','".$user_name."','".$node_result[0]['BUSINESS_NODE']."','',TRUNC(SYSDATE), '".$media_type."',TO_CHAR(SYSDATE,'HH24:mi:ss'),'1')";
            }else{
                $insert_sql = "INSERT INTO TMP_BX_DAYPOST_DESCRIPTION(BUSINESS_CODE,HD_USER_NAME,BUSINESS_NODE,RESULT,SYS_INSERT_DATE,BUSINESS_DATE,MEDIA_TYPE,BUSINESS_TIME,IS_CHECK_POLICY) VALUES('".$accept_code."','".$user_name."','".$node_result[0]['BUSINESS_NODE']."','',TRUNC(SYSDATE),TO_DATE('".$insert_date."','YYYY-MM-DD'), '".$media_type."',TO_CHAR(SYSDATE,'HH24:mi:ss'),'1')";
            }
        }else{
            if(empty($insert_date)){
                $insert_sql = "INSERT INTO TMP_BX_DAYPOST_DESCRIPTION(BUSINESS_CODE,POLICY_CODE,HD_USER_NAME,BUSINESS_NODE,RESULT,SYS_INSERT_DATE,MEDIA_TYPE,BUSINESS_TIME,IS_CHECK_POLICY) VALUES('".$accept_code."','".$policy_code."','".$user_name."','".$node_result[0]['BUSINESS_NODE']."','',TRUNC(SYSDATE), '".$media_type."',TO_CHAR(SYSDATE,'HH24:mi:ss'),'1')";
            }else{
                $insert_sql = "INSERT INTO TMP_BX_DAYPOST_DESCRIPTION(BUSINESS_CODE,POLICY_CODE,HD_USER_NAME,BUSINESS_NODE,RESULT,SYS_INSERT_DATE,BUSINESS_DATE,MEDIA_TYPE,BUSINESS_TIME,IS_CHECK_POLICY) VALUES('".$accept_code."','".$policy_code."','".$user_name."','".$node_result[0]['BUSINESS_NODE']."','',TRUNC(SYSDATE),TO_DATE('".$insert_date."','YYYY-MM-DD'), '".$media_type."',TO_CHAR(SYSDATE,'HH24:mi:ss'),'1')";
            }
        }
        Log::write($user_name.' 数据库查询SQL：'.$insert_sql,'INFO');
        $result_rows = oci_parse($conn, $insert_sql); // 配置SQL语句，执行SQL
        if(oci_execute($result_rows, OCI_COMMIT_ON_SUCCESS)){
            $result['status'] = "success";
            $result['message'] = "关键业务号：".$accept_code."-业务号：".$policy_code." 确认抽检成功！";
        }else{
            $result['status'] = "failed";
            $e = oci_error();
            $result['message'] = "确认抽检失败".$e['message'];
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
        $organCode = $method->getUserOrganCode();
        if((int)$userType==1){
            $where_type_fix = "";
        }else if((int)$userType==2){
//            dump($organCode);
            $organ_yd = substr($organCode[$user_name],0,4);
            $where_type_fix =  " AND (A.OLD_ORGAN_CODE LIKE '".$organCode[$user_name]."%' OR (A.OLD_POLICY_ORGAN_CODE  LIKE '".$organCode[$user_name]."%' AND A.OLD_ORGAN_CODE NOT LIKE '".$organ_yd."%')) ";
        }else if((int)$userType==3){
            $where_type_fix = " AND A.NEW_USER_NAME = '".$user_name."'";
        }
        if(in_array($user_name,$otherUser)){
            $where_type_fix =  " AND A.OLD_ORGAN_CODE NOT LIKE '".$organCode[$user_name]."%'";
        }
        Log::write($user_name.' 数据库查询条件：'.$where_time_bqsl.$where_type_fix,'INFO');
        $num = 0;
        ################################################################   保全受理   #######################################################################
        //保全室、理赔室、核保室不参与
        if((!in_array($user_name,$fuhe_user)&&!in_array($user_name,$clm_user)&&!in_array($user_name,$uw_user))||(int)$userType==1) {
            #033 个人待确认保全受理查询
            $select_bqsl = "SELECT DISTINCT A.OLD_ORGAN_CODE,A.OLD_POLICY_ORGAN_CODE,
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
                                       A.NEW_ACCEPT_STATUS,
                                       TO_CHAR(A.INSERT_SYSDATE,'YYYY-MM-DD') AS INSERT_SYSDATE,
                                       B.RESULT AS SYS_RESULT,
                                       B.IS_SUBMIT,
                                       B.IS_REVIEW,
                                       (CASE B.IS_NO_DEAL WHEN '1' THEN '无需操作' ELSE '-' END) AS NO_DEAL,
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
                $result[$i]['old_policy_organ_code'] = $value['OLD_POLICY_ORGAN_CODE'];
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
                $result[$i]['sys_result'] = $value['SYS_RESULT'];
                $result[$i]['no_deal'] = $value['NO_DEAL'];
                $result[$i]['new_accept_status'] = $value['NEW_ACCEPT_STATUS'];
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
            $where_type_fix =  " AND A.OLD_ORGAN_CODE NOT LIKE '8633%'";
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
                                       A.OLD_ACCEPT_STATUS,
                                       A.NEW_ACCEPT_STATUS,
                                       A.OLD_REVIEW_RESULT,
                                       TO_CHAR(A.OLD_INSERT_TIME,'YYYY-MM-DD') AS OLD_INSERT_TIME,
                                       TO_CHAR(A.NEW_INSERT_TIME,'YYYY-MM-DD') AS NEW_INSERT_TIME,
                                       A.IS_ACCORDANCE,
                                       TO_CHAR(A.INSERT_SYSDATE,'YYYY-MM-DD') AS INSERT_SYSDATE,
                                       B.RESULT AS SYS_RESULT,
                                       B.IS_SUBMIT,
                                       B.IS_REVIEW,
                                       (CASE B.IS_NO_DEAL WHEN '1' THEN '无需操作' ELSE '-' END) AS NO_DEAL,
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
                $result[$i]['old_accept_status'] = $value['OLD_ACCEPT_STATUS'];
                $result[$i]['new_accept_status'] = $value['NEW_ACCEPT_STATUS'];
                $result[$i]['old_review_result'] = $value['OLD_REVIEW_RESULT'];
                $result[$i]['busi_insert_date'] = $value['INSERT_SYSDATE'];
                $result[$i]['sys_insert_date'] = $value['SYS_INSERT_DATE'];
                $result[$i]['is_submit'] = $value['IS_SUBMIT'];
                $result[$i]['is_review'] = $value['IS_REVIEW'];
                $result[$i]['no_deal'] = $value['NO_DEAL'];
                $result[$i]['sys_result'] = $value['SYS_RESULT'];
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

    public function getUwDefine(){
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
            $where_type_fix =  " AND A.OLD_ORGAN_CODE NOT LIKE '8633%'";
        }
        Log::write($user_name.' 数据库查询条件：'.$where_time_bqsl.$where_type_fix,'INFO');
        $num = 0;
        ################################################################   保全受理   #######################################################################
        //保全室、理赔室、核保室不参与
        if((!in_array($user_name,$fuhe_user)&&!in_array($user_name,$clm_user)&&!in_array($user_name,$uw_user))||(int)$userType==1) {
            #033 个人待确认保全受理查询
            $select_bqsl = "SELECT TRIM(OLD_ORGAN_CODE) AS OLD_ORGAN_CODE,
                                         A.NEW_USER_NAME,
                                         TRIM(OLD_APPLY_CODE) AS OLD_APPLY_CODE,
                                         NEW_APPLY_CODE,
                                         OLD_POLICY_CODE,
                                         NEW_POLICY_CODE,
                                         IS_ACCORDANCE,
                                         (CASE A.BUSINESS_NODE
                                               WHEN 'QYHB' THEN '新契约核保'
                                               WHEN 'BQHB' THEN '保全核保'
                                               WHEN 'LPHB' THEN '理赔二核'
                                          END) AS BUSINESS_NAME,
                                       A.BUSINESS_NODE,
                                       B.RESULT AS SYS_RESULT,
                                       B.IS_SUBMIT,
                                       B.IS_REVIEW,
                                       B.IS_PASS,
                                       B.NO_REASON,
                                       B.HD_USER_NAME,
                                       TO_CHAR(A.INSERT_SYSDATE,'YYYY-MM-DD') AS INSERT_SYSDATE,
                                       (SELECT W.TC_ID FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID,',') WITHIN group(order by N.TC_ID) AS TC_ID FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = TRIM(A.OLD_APPLY_CODE) AND W.FIND_NODE = A.BUSINESS_NODE) AS TC_ID,
                                       (CASE
                                          WHEN C.TC_USER_NAME IS NULL THEN B.HD_USER_NAME
                                            ELSE C.TC_USER_NAME
                                        END) AS HD_USER_NAME,
                                        (CASE
                                          WHEN (SELECT TO_CHAR(W.CREATE_DATE,'YYYY-MM-DD') FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,N.CREATE_DATE FROM TMP_QDSX_TC_BUG N WHERE 1=1 order BY N.CREATE_DATE ASC) W WHERE W.BUSINESS_CODE = A.OLD_APPLY_CODE AND W.FIND_NODE = A.BUSINESS_NODE AND ROWNUM = 1) IS NULL THEN TO_CHAR(B.SYS_INSERT_DATE,'YYYY-MM-DD')
                                          ELSE (SELECT TO_CHAR(W.CREATE_DATE,'YYYY-MM-DD') FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,N.CREATE_DATE FROM TMP_QDSX_TC_BUG N WHERE 1=1 order BY N.CREATE_DATE ASC) W WHERE W.BUSINESS_CODE = A.OLD_APPLY_CODE AND W.FIND_NODE = A.BUSINESS_NODE AND ROWNUM = 1)
                                        END) AS SYS_INSERT_DATE,
                                        (CASE
                                          WHEN B.DESCRIPTION IS NOT NULL THEN B.DESCRIPTION
                                            ELSE (SELECT W.DESCRIPTION FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID||'-'||N.DESCRIPTION,',') WITHIN group(order by N.TC_ID) AS DESCRIPTION FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.OLD_APPLY_CODE AND W.FIND_NODE = A.BUSINESS_NODE)
                                         END) AS DESCRIPTION,
                                       (SELECT W.STATUS FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID||'-'||N.STATUS_DESC,',') WITHIN group(order by N.TC_ID) AS STATUS FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.OLD_APPLY_CODE AND W.FIND_NODE = A.BUSINESS_NODE) AS STATUS
                                  FROM TMP_UW_LIST_BX A 
                                   LEFT JOIN TMP_BX_DAYPOST_DESCRIPTION B
                                        ON A.OLD_APPLY_CODE = B.BUSINESS_CODE
                                        AND A.OLD_POLICY_CODE = B.POLICY_CODE
                                        AND B.BUSINESS_NODE = A.BUSINESS_NODE
                                        AND TRUNC(B.BUSINESS_DATE) = TRUNC(A.INSERT_SYSDATE)
                                  LEFT JOIN TMP_QDSX_TC_BUG C  
                                    ON C.BUSINESS_CODE = A.OLD_APPLY_CODE
                                    AND C.FIND_NODE = A.BUSINESS_NODE
                                  WHERE 1=1" . $where_time_bqsl . $where_type_fix;
            $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
            $bqsl_result_time = null;
            $bqsl_result_time = $method->search_long($result_rows);
            Log::write($user_name.' 数据库查询SQL：'.$select_bqsl,'INFO');
            Log::write($user_name.' 数据库查询看结果：'.$bqsl_result_time,'INFO');
            for ($i = $num; $i < sizeof($bqsl_result_time); $i++) {
                $value = $bqsl_result_time[$i];
                $result[$i]['old_organ_code'] = $value['OLD_ORGAN_CODE'];
                $result[$i]['new_user_name'] = $value['NEW_USER_NAME'];
                $result[$i]['old_apply_code'] = $value['OLD_APPLY_CODE'];
                $result[$i]['new_apply_code'] = $value['NEW_APPLY_CODE'];
                $result[$i]['old_policy_code'] = $value['OLD_POLICY_CODE'];
                $result[$i]['new_policy_code'] = $value['NEW_POLICY_CODE'];
                $result[$i]['business_node'] = $value['BUSINESS_NODE'];
                $result[$i]['business_name'] = $value['BUSINESS_NAME'];
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

    public function getNbDefine(){
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
            $where_type_fix =  " AND A.OLD_ORGAN_CODE NOT LIKE '8633%'";
        }
        Log::write($user_name.' 数据库查询条件：'.$where_time_bqsl.$where_type_fix,'INFO');
        $num = 0;
        ################################################################   保全受理   #######################################################################
        //保全室、理赔室、核保室不参与
        if((!in_array($user_name,$fuhe_user)&&!in_array($user_name,$clm_user)&&!in_array($user_name,$uw_user))||(int)$userType==1) {
            #033 个人待确认保全受理查询
            $select_bqsl = "SELECT A.OLD_ORGAN_CODE,
                                         A.NEW_ORGAN_CODE,
                                         A.OLD_USER_NAME,
                                         A.NEW_USER_NAME,
                                        TO_CHAR(A.OLD_INSERT_TIME,'YYYY-MM-DD') AS OLD_INSERT_TIME,
                                        TO_CHAR(A.NEW_INSERT_TIME,'YYYY-MM-DD') AS NEW_INSERT_TIME,
                                         A.OLD_POLICY_CODE,
                                         A.NEW_POLICY_CODE,
                                         A.OLD_PREM,
                                         A.NEW_PREM,
                                         A.OLD_GET_MONEY,
                                         A.NEW_GET_MONEY,
                                         A.IS_ACCORDANCE,
                                         (CASE A.BUSINESS_NODE
                                               WHEN 'CDQCB' THEN '出单前撤保'
                                               WHEN 'BDHZ' THEN '保单回执'
                                          END) AS BUSINESS_NAME,
                                       A.BUSINESS_NODE,
                                       B.RESULT AS SYS_RESULT,
                                       B.IS_SUBMIT,
                                       B.IS_REVIEW,
                                       B.IS_PASS,
                                       B.NO_REASON,
                                       B.HD_USER_NAME,
                                       TO_CHAR(A.INSERT_SYSDATE,'YYYY-MM-DD') AS INSERT_SYSDATE,
                                       (SELECT W.TC_ID FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID,',') WITHIN group(order by N.TC_ID) AS TC_ID FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = TRIM(A.OLD_POLICY_CODE) AND W.FIND_NODE = A.BUSINESS_NODE) AS TC_ID,
                                       (CASE
                                          WHEN C.TC_USER_NAME IS NULL THEN B.HD_USER_NAME
                                            ELSE C.TC_USER_NAME
                                        END) AS HD_USER_NAME,
                                        (CASE
                                          WHEN (SELECT TO_CHAR(W.CREATE_DATE,'YYYY-MM-DD') FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,N.CREATE_DATE FROM TMP_QDSX_TC_BUG N WHERE 1=1 order BY N.CREATE_DATE ASC) W WHERE W.BUSINESS_CODE = A.OLD_POLICY_CODE AND W.FIND_NODE = A.BUSINESS_NODE AND ROWNUM = 1) IS NULL THEN TO_CHAR(B.SYS_INSERT_DATE,'YYYY-MM-DD')
                                          ELSE (SELECT TO_CHAR(W.CREATE_DATE,'YYYY-MM-DD') FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,N.CREATE_DATE FROM TMP_QDSX_TC_BUG N WHERE 1=1 order BY N.CREATE_DATE ASC) W WHERE W.BUSINESS_CODE = A.OLD_POLICY_CODE AND W.FIND_NODE = A.BUSINESS_NODE AND ROWNUM = 1)
                                        END) AS SYS_INSERT_DATE,
                                        (CASE
                                          WHEN B.DESCRIPTION IS NOT NULL THEN B.DESCRIPTION
                                            ELSE (SELECT W.DESCRIPTION FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID||'-'||N.DESCRIPTION,',') WITHIN group(order by N.TC_ID) AS DESCRIPTION FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.OLD_POLICY_CODE AND W.FIND_NODE = A.BUSINESS_NODE)
                                         END) AS DESCRIPTION,
                                       (SELECT W.STATUS FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID||'-'||N.STATUS_DESC,',') WITHIN group(order by N.TC_ID) AS STATUS FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.OLD_POLICY_CODE AND W.FIND_NODE = A.BUSINESS_NODE) AS STATUS
                                  FROM TMP_NCS_BX_NB_BD A
                                  LEFT JOIN TMP_BX_DAYPOST_DESCRIPTION B
                                        ON A.OLD_POLICY_CODE = B.BUSINESS_CODE
                                        AND B.BUSINESS_NODE = A.BUSINESS_NODE
                                        AND TRUNC(B.BUSINESS_DATE) = TRUNC(A.INSERT_SYSDATE)
                                  LEFT JOIN TMP_QDSX_TC_BUG C  
                                    ON C.BUSINESS_CODE = A.OLD_POLICY_CODE
                                    AND C.FIND_NODE = A.BUSINESS_NODE
                                 WHERE 1=1" . $where_time_bqsl . $where_type_fix;
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
                $result[$i]['old_insert_time'] = $value['OLD_INSERT_TIME'];
                $result[$i]['new_insert_time'] = $value['NEW_INSERT_TIME'];
                $result[$i]['old_policy_code'] = $value['OLD_POLICY_CODE'];
                $result[$i]['new_policy_code'] = $value['NEW_POLICY_CODE'];
                $result[$i]['old_prem'] = $value['OLD_PREM'];
                $result[$i]['new_prem'] = $value['NEW_PREM'];
                $result[$i]['old_get_money'] = $value['OLD_GET_MONEY'];
                $result[$i]['new_get_money'] = $value['NEW_GET_MONEY'];
                $result[$i]['business_node'] = $value['BUSINESS_NODE'];
                $result[$i]['business_name'] = $value['BUSINESS_NAME'];
                $result[$i]['busi_insert_date'] = $value['INSERT_SYSDATE'];
                $result[$i]['sys_insert_date'] = $value['SYS_INSERT_DATE'];
                $result[$i]['is_submit'] = $value['IS_SUBMIT'];
                $result[$i]['is_review'] = $value['IS_REVIEW'];
                $result[$i]['is_pass'] = $value['IS_PASS'];
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

    public function getClmDefine(){
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
            $where_type_fix =  " AND A.OLD_ORGAN_CODE NOT LIKE '8633%'";
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
                                       A.OLD_GET_MONEY,
                                        A.NEW_GET_MONEY,
                                        TO_CHAR(A.OLD_INSERT_TIME,'YYYY-MM-DD') AS OLD_INSERT_TIME,
                                        TO_CHAR(A.NEW_INSERT_TIME,'YYYY-MM-DD') AS NEW_INSERT_TIME,
                                         A.OLD_CASE_NO,
                                         A.NEW_CASE_NO,
                                         A.IS_ACCORDANCE,
                                         (CASE A.BUSINESS_NODE
                                               WHEN 'LPSL' THEN '理赔受理'
                                               WHEN 'LPSH' THEN '理赔审核'
                                               WHEN 'LPSP' THEN '理赔审批'
                                          END) AS BUSINESS_NAME,
                                       A.BUSINESS_NODE,
                                       B.RESULT AS SYS_RESULT,
                                       B.IS_SUBMIT,
                                       B.IS_REVIEW,
                                       B.IS_PASS,
                                       B.NO_REASON,
                                       B.HD_USER_NAME,
                                       TO_CHAR(A.INSERT_SYSDATE,'YYYY-MM-DD') AS INSERT_SYSDATE,
                                       (SELECT W.TC_ID FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID,',') WITHIN group(order by N.TC_ID) AS TC_ID FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = TRIM(A.OLD_CASE_NO) AND W.FIND_NODE = A.BUSINESS_NODE) AS TC_ID,
                                       (CASE
                                          WHEN (SELECT W.TC_USER_NAME FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_USER_NAME,',') WITHIN group(order by N.TC_ID) AS TC_USER_NAME FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = TRIM(A.OLD_CASE_NO) AND W.FIND_NODE = A.BUSINESS_NODE) IS NULL THEN B.HD_USER_NAME
                                            ELSE (SELECT W.TC_USER_NAME FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_USER_NAME,',') WITHIN group(order by N.TC_ID) AS TC_USER_NAME FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = TRIM(A.OLD_CASE_NO) AND W.FIND_NODE = A.BUSINESS_NODE)
                                        END) AS HD_USER_NAME,
                                        (CASE
                                          WHEN (SELECT TO_CHAR(W.CREATE_DATE,'YYYY-MM-DD') FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,N.CREATE_DATE FROM TMP_QDSX_TC_BUG N WHERE 1=1 order BY N.CREATE_DATE ASC) W WHERE W.BUSINESS_CODE = A.OLD_CASE_NO AND W.FIND_NODE = A.BUSINESS_NODE AND ROWNUM = 1) IS NULL THEN TO_CHAR(B.SYS_INSERT_DATE,'YYYY-MM-DD')
                                          ELSE (SELECT TO_CHAR(W.CREATE_DATE,'YYYY-MM-DD') FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,N.CREATE_DATE FROM TMP_QDSX_TC_BUG N WHERE 1=1 order BY N.CREATE_DATE ASC) W WHERE W.BUSINESS_CODE = A.OLD_CASE_NO AND W.FIND_NODE = A.BUSINESS_NODE AND ROWNUM = 1)
                                        END) AS SYS_INSERT_DATE,
                                        (CASE
                                          WHEN B.DESCRIPTION IS NOT NULL THEN B.DESCRIPTION
                                            ELSE (SELECT W.DESCRIPTION FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID||'-'||N.DESCRIPTION,',') WITHIN group(order by N.TC_ID) AS DESCRIPTION FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.OLD_CASE_NO AND W.FIND_NODE = A.BUSINESS_NODE)
                                         END) AS DESCRIPTION,
                                       (SELECT W.STATUS FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID||'-'||N.STATUS_DESC,',') WITHIN group(order by N.TC_ID) AS STATUS FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.OLD_CASE_NO AND W.FIND_NODE = A.BUSINESS_NODE) AS STATUS
                                  FROM TMP_NCS_BX_LP_BD A
                                  LEFT JOIN TMP_BX_DAYPOST_DESCRIPTION B
                                        ON A.OLD_CASE_NO = B.BUSINESS_CODE
                                        AND B.BUSINESS_NODE = A.BUSINESS_NODE
                                        AND TRUNC(B.BUSINESS_DATE) = TRUNC(A.INSERT_SYSDATE)
                                  LEFT JOIN TMP_QDSX_TC_BUG C  
                                    ON C.BUSINESS_CODE = A.OLD_CASE_NO
                                    AND C.FIND_NODE = A.BUSINESS_NODE
                                 WHERE 1=1" . $where_time_bqsl . $where_type_fix;
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
                $result[$i]['old_get_money'] = $value['OLD_GET_MONEY'];
                $result[$i]['new_get_money'] = $value['NEW_GET_MONEY'];
                $result[$i]['old_organ_name'] = $value['OLD_ORGAN_NAME'];
                $result[$i]['old_insert_time'] = $value['OLD_INSERT_TIME'];
                $result[$i]['new_insert_time'] = $value['NEW_INSERT_TIME'];
                $result[$i]['old_case_no'] = $value['OLD_CASE_NO'];
                $result[$i]['new_case_no'] = $value['NEW_CASE_NO'];
                $result[$i]['business_node'] = $value['BUSINESS_NODE'];
                $result[$i]['business_name'] = $value['BUSINESS_NAME'];
                $result[$i]['busi_insert_date'] = $value['INSERT_SYSDATE'];
                $result[$i]['sys_insert_date'] = $value['SYS_INSERT_DATE'];
                $result[$i]['is_submit'] = $value['IS_SUBMIT'];
                $result[$i]['is_review'] = $value['IS_REVIEW'];
                $result[$i]['is_pass'] = $value['IS_PASS'];
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
        $method = new MethodController();
        $user_name = $method->getUserCNNameBySql($user_name);
        $business_node = $_POST['business_node'];
        $insert_date = $_POST['insert_date'];
        Log::write($user_name.' 业务节点：'.$business_node,'INFO');
        $policy_code = $_POST['policy_code'];
        $business_code = $_POST['business_code'];
        $description = $_POST['description'];
        $result_des = $_POST['result'];
        $is_no_deal = $_POST['is_no_deal'];
        $is_pass = $_POST['is_pass'];
        $no_pass_reason = $_POST['no_pass_reason'];//不通过时才会传值
        $is_no_count = $_POST['is_no_count'];//不计入时才会传值
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        if((int)$is_no_count==1){//不计入流程
            $select = "SELECT IS_NO_COUNT FROM TMP_BX_DAYPOST_DESCRIPTION WHERE BUSINESS_CODE = '".$business_code."' AND POLICY_CODE = '".$policy_code."' AND BUSINESS_NODE = '".$business_node."' AND TO_CHAR(BUSINESS_DATE,'YYYY-MM-DD') ='".$insert_date."'";
            $result_rows1 = oci_parse($conn, $select); // 配置SQL语句，执行SQL
            $select_result = $method->search_long($result_rows1);
            Log::write($user_name.(int)$select_result[0]['IS_NO_COUNT'].' 是否更新不计入结果SQL：'.$select,'INFO');
            $result = null;
            if((int)$select_result[0]['IS_NO_COUNT'] == 1){
                $result['status'] = "failed";
                $result['message'] = $user_name."您好，不计入结果已存在，无法修改。请联系管理员确认！";
                exit(json_encode($result));
            }
            $update_sql = "UPDATE TMP_BX_DAYPOST_DESCRIPTION SET IS_NO_COUNT = '".$is_no_count."',NO_REASON = '".$no_pass_reason."', RESULT = '".$result_des."',IS_SUBMIT = '1', IS_PASS = '1',IS_REVIEW = '1' WHERE BUSINESS_CODE = '".$business_code."' AND POLICY_CODE = '".$policy_code."'AND BUSINESS_NODE = '".$business_node."' AND TO_CHAR(BUSINESS_DATE,'YYYY-MM-DD') ='".$insert_date."'";
            Log::write($user_name.' 更新是否不计入结果SQL：'.$update_sql,'INFO');
            $result_rows = oci_parse($conn, $update_sql); // 配置SQL语句，执行SQL
            if(oci_execute($result_rows,OCI_COMMIT_ON_SUCCESS)) {
                $result['status'] = "success";
                $result['message'] = "关键业务号：".$business_code."-业务号：".$policy_code." 不计入结论更新成功！";
                Log::write($user_name.' 不计入结论更新SQL：'.$update_sql,'INFO');
                exit(json_encode($result));
            } else {
                $result['status'] = "failed";
                $result['message'] = $user_name."您好，不计入结论更新失败，请联系管理员确认！";
                Log::write($user_name.' 不计入结论更新SQL：'.$update_sql,'INFO');
                exit(json_encode($result));
            }
        }
        if((int)$is_pass==0){//审核不通过流程
            $select = "SELECT IS_SUBMIT FROM TMP_BX_DAYPOST_DESCRIPTION WHERE BUSINESS_CODE = '".$business_code."' AND POLICY_CODE = '".$policy_code."' AND BUSINESS_NODE = '".$business_node."' AND TO_CHAR(BUSINESS_DATE,'YYYY-MM-DD') ='".$insert_date."'";
            $result_rows1 = oci_parse($conn, $select); // 配置SQL语句，执行SQL
            $select_result = $method->search_long($result_rows1);
            Log::write($user_name.' 是否更新原因SQL：'.$select,'INFO');
            if((int)($select_result[0]['IS_SUBMIT']) == 1){
                $update_sql = "UPDATE TMP_BX_DAYPOST_DESCRIPTION SET NO_REASON = '".$no_pass_reason."',IS_SUBMIT = '0', IS_PASS = '0',IS_REVIEW = '0' WHERE BUSINESS_CODE = '".$business_code."' AND POLICY_CODE = '".$policy_code."'AND BUSINESS_NODE = '".$business_node."' AND TO_CHAR(BUSINESS_DATE,'YYYY-MM-DD') ='".$insert_date."'";
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
        if((int)$is_pass==1){//审核通过流程
            $select = "SELECT IS_REVIEW FROM TMP_BX_DAYPOST_DESCRIPTION WHERE BUSINESS_CODE = '".$business_code."' AND POLICY_CODE = '".$policy_code."' AND BUSINESS_NODE = '".$business_node."' AND TO_CHAR(BUSINESS_DATE,'YYYY-MM-DD') ='".$insert_date."'";
            $result_rows1 = oci_parse($conn, $select); // 配置SQL语句，执行SQL
            $select_result = $method->search_long($result_rows1);
            Log::write($user_name.(int)$select_result[0]['IS_REVIEW'].' 是否更新审核通过结果SQL：'.$select,'INFO');
            $result = null;
            if((int)$select_result[0]['IS_REVIEW'] == 1){
                $result['status'] = "failed";
                $result['message'] = $user_name."您好，审核通过结果已存在，无法修改。请联系管理员确认！";
                exit(json_encode($result));
            }
            if(empty($is_no_deal)){
                $update_sql = "UPDATE TMP_BX_DAYPOST_DESCRIPTION SET NO_REASON = '".$no_pass_reason."', RESULT = '".$result_des."',IS_SUBMIT = '1', IS_PASS = '1',IS_REVIEW = '1' WHERE BUSINESS_CODE = '".$business_code."' AND POLICY_CODE = '".$policy_code."'AND BUSINESS_NODE = '".$business_node."' AND TO_CHAR(BUSINESS_DATE,'YYYY-MM-DD') ='".$insert_date."'";
            }else {
                $update_sql = "UPDATE TMP_BX_DAYPOST_DESCRIPTION SET NO_REASON = '".$no_pass_reason."',RESULT = '".$result_des."',IS_SUBMIT = '1', IS_PASS = '1',IS_REVIEW = '1',IS_NO_DEAL = '1' WHERE BUSINESS_CODE = '".$business_code."' AND POLICY_CODE = '".$policy_code."'AND BUSINESS_NODE = '".$business_node."' AND TO_CHAR(BUSINESS_DATE,'YYYY-MM-DD') ='".$insert_date."'";
            }
            Log::write($user_name.' 是否更新无需操作结果SQL：'.$update_sql,'INFO');
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
        $select = "SELECT HD_USER_NAME FROM TMP_BX_DAYPOST_DESCRIPTION WHERE BUSINESS_CODE = '".$business_code."' AND POLICY_CODE = '".$policy_code."' AND BUSINESS_NODE = '".$business_node."' AND DESCRIPTION = '".$description."' AND TO_CHAR(BUSINESS_DATE,'YYYY-MM-DD') ='".$insert_date."'";
        $result_rows1 = oci_parse($conn, $select); // 配置SQL语句，执行SQL
        $select_result = $method->search_long($result_rows1);
        if(!empty($select_result[0]['HD_USER_NAME'])){
            $result['status'] = "failed";
            $result['message'] = $user_name."您好，该原因描述已提交，无修改不可重复提交！";
            exit(json_encode($result));
        }
        Log::write($user_name.' 查询是否修改原因描述SQL：'.$select,'INFO');
        $select = "SELECT HD_USER_NAME FROM TMP_BX_DAYPOST_DESCRIPTION WHERE BUSINESS_CODE = '".$business_code."' AND POLICY_CODE = '".$policy_code."' AND BUSINESS_NODE = '".$business_node."' AND TO_CHAR(BUSINESS_DATE,'YYYY-MM-DD') ='".$insert_date."'";
        $result_rows1 = oci_parse($conn, $select); // 配置SQL语句，执行SQL
        $select_result = $method->search_long($result_rows1);
        Log::write($user_name.' 是否更新原因SQL：'.$select,'INFO');
        if(!empty($select_result[0]['HD_USER_NAME'])){
            $update_sql = "UPDATE TMP_BX_DAYPOST_DESCRIPTION SET DESCRIPTION = '".$description."',IS_SUBMIT = '1' WHERE BUSINESS_CODE = '".$business_code."' AND POLICY_CODE = '".$policy_code."'AND BUSINESS_NODE = '".$business_node."' AND TO_CHAR(BUSINESS_DATE,'YYYY-MM-DD') ='".$insert_date."'";
            $result_rows = oci_parse($conn, $update_sql); // 配置SQL语句，执行SQL
            if(oci_execute($result_rows,OCI_COMMIT_ON_SUCCESS)) {
                $result['status'] = "success";
                $result['message'] = "关键业务号：".$business_code."-业务号：".$policy_code." 更新成功！";
                Log::write($user_name.' 更新原因SQL：'.$update_sql,'INFO');
                exit(json_encode($result));
            } else {
                $result['status'] = "failed";
                $result['message'] = $user_name."您好，该原因描述更新失败，请联系管理员确认！";
                Log::write($user_name.' 更新原因SQL：'.$update_sql,'INFO');
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

    public function updateBackReview(){
        header('Content-type: text/html; charset=utf-8');
        $user_name = $_POST['username'];
        $method = new MethodController();
        $user_name = $method->getUserCNNameBySql($user_name);
        $business_node = $_POST['business_node'];
        $insert_date = $_POST['insert_date'];
        Log::write($user_name.' 业务节点：'.$business_node,'INFO');
        $policy_code = $_POST['policy_code'];
        $business_code = $_POST['business_code'];
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $update_sql = "UPDATE TMP_BX_DAYPOST_DESCRIPTION SET RESULT = null, IS_NO_DEAL = '0',IS_PASS = '0',IS_REVIEW = '0' WHERE BUSINESS_CODE = '".$business_code."' AND POLICY_CODE = '".$policy_code."'AND BUSINESS_NODE = '".$business_node."' AND TO_CHAR(BUSINESS_DATE,'YYYY-MM-DD') ='".$insert_date."'";
        Log::write($user_name.' 打回重审SQL：'.$update_sql,'INFO');
        $result_rows = oci_parse($conn, $update_sql); // 配置SQL语句，执行SQL
            if(oci_execute($result_rows,OCI_COMMIT_ON_SUCCESS)) {
                $result['status'] = "success";
                $result['message'] = "关键业务号：".$business_code."-业务号：".$policy_code." 打回重审成功！";
                exit(json_encode($result));
            } else {
                $result['status'] = "failed";
                $result['message'] = $user_name."您好，审核打回失败，请联系管理员确认！";
                exit(json_encode($result));
            }
    }
}