<?php
/**
 * Created by PhpStorm.
 * User: gaobiao
 * Date: 2018/10/30
 * Time: 9:06
 */

namespace Home\Controller;
use Think\Controller;


class PersonDefineFinishWorkController extends Controller
{
    public function perDefine(){

        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
//        $token = $_SESSION['token'];
//dump($token);
        if ($result) {
            $this->assign('username', $username);
            $this->assign('TITLE', TITLE);
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function updateDefPerson(){
        header('Content-type: text/html; charset=utf-8');
        $new_user_name = $_POST['new_user_name'];
        $business_code = $_POST['business_code'];
        $policy_code = $_POST['policy_code'];
        $description = $_POST['description'];
        $link_business = $_POST['link_business'];
        $business_type = $_POST['business_type'];
        if(empty($policy_code)||strcmp($policy_code,"-")==0){
            $policy_code = $business_code;
        }
//        $new_user_name = I('post.new_user_name');
//        $business_code = I('post.business_code');
//        $policy_code = I('post.policy_code');
//        $description = I('post.description');
//        $link_business = I('post.link_business');
        $method = new MethodController();
        ##############################################################  公共JS处理部分  ############################################################################
        //JS请求公共处理部分 TRUE锁定
        if($method->publicCheck()==1){
            $result['status'] = "failed";
            $result['lock'] = "true";
            $result['message'] = "您的用户已被锁定，已无法使用本系统，如有疑问请联系管理员确认！";
            exit(json_encode($result));
        }else if($method->publicCheck()==2){
            $result['status'] = "failed";
            $result['lock'] = "false";
            $result['message'] = "管理员正在后台进行灌数，暂时无法刷新系统，如有疑问请联系管理员确认！";
            exit(json_encode($result));
        }
        ############################################################################################################################################################
        $conn = $method->OracleOldDBCon();
        $select_des = "SELECT DESCRIPTION,LINK_BUSINESS_CODE FROM TMP_DAYPOST_DESCRIPTION WHERE BUSINESS_CODE = '".$business_code."' AND POLICY_CODE = '".$policy_code."' AND NODE = '".$business_type."'";
//        $select_des = "SELECT DESCRIPTION,LINK_BUSINESS_CODE FROM TMP_DAYPOST_DESCRIPTION WHERE BUSINESS_CODE = '6120180830053347' AND POLICY_CODE = '886570816406' AND NODE = '保全受理'";
        $result_rows = oci_parse($conn, $select_des); // 配置SQL语句，执行SQL
        $des_result = $method->search_long($result_rows);
//        dump($des_result);
        if(!empty($des_result[0]['DESCRIPTION'])){
            if(strcmp($des_result[0]['DESCRIPTION'],$description)==0&&(strcmp($des_result[0]['LINK_BUSINESS_CODE'],$link_business)==0||empty($des_result[0]['LINK_BUSINESS_CODE']))){
                $result['status'] = "failed";
                $result['message'] = "关键业务号：".$business_code." 下内容未发生修改时请勿提交！";
            }else{
                //更新
                $update_sql = "UPDATE TMP_DAYPOST_DESCRIPTION SET DESCRIPTION = '".$description."',LINK_BUSINESS_CODE ='".$link_business."' WHERE USER_NAME = '".$new_user_name."' AND BUSINESS_CODE = '".$business_code."' AND POLICY_CODE = '".$policy_code."' AND NODE = '".$business_type."'";
                $result_rows = oci_parse($conn, $update_sql); // 配置SQL语句，执行SQL
                if(oci_execute($result_rows, OCI_COMMIT_ON_SUCCESS)){
                    $result['status'] = "success";
                    $result['message'] = "关键业务号：".$business_code." 更新成功！";
                }else{
                    $result['status'] = "failed";
                    $e = oci_error();
                    $result['message'] = "更新失败".$e['message'];
                }
            }
        }else{
            //插入数据
            $insert_sql = "INSERT INTO TMP_DAYPOST_DESCRIPTION(BUSINESS_CODE,POLICY_CODE,USER_NAME,DESCRIPTION,LINK_BUSINESS_CODE,NODE) VALUES('".$business_code."','".$policy_code."','".$new_user_name."','".$description."','".$link_business."','".$business_type."')";
            $result_rows = oci_parse($conn, $insert_sql); // 配置SQL语句，执行SQL
            if(oci_execute($result_rows, OCI_COMMIT_ON_SUCCESS)){
                $result['status'] = "success";
                $result['message'] = "关键业务号：".$business_code." 添加成功！";
            }else{
                $result['status'] = "failed";
                $e = oci_error();
                $result['message'] = $insert_sql."插入失败".$e['message'];
            }
        }
        oci_free_statement($result_rows);
        oci_close($conn);
//        dump($result);
        exit(json_encode($result));
    }

    public function getDefPerson()
    {
        $queryDateStart = I('get.queryDateStart');
        $queryDateEnd = I('get.queryDateEnd');
        $method = new MethodController();
        ##############################################################  公共JS处理部分  ############################################################################
        //JS请求公共处理部分 TRUE锁定
//        if($method->publicCheck()==1){
//            $result['status'] = "failed";
//            $result['lock'] = "true";
//            $result['message'] = "您的用户已被锁定，已无法使用本系统，如有疑问请联系管理员确认！";
//            exit(json_encode($result));
//        }else if($method->publicCheck()==2){
//            $result['status'] = "failed";
//            $result['lock'] = "false";
//            $result['message'] = "管理员正在后台进行灌数，暂时无法刷新系统，如有疑问请联系管理员确认！";
//            exit(json_encode($result));
//        }
        ############################################################################################################################################################
        $conn = $method->OracleOldDBCon();
        //获取用户权限类型-1-管理员2-机构组长3-个人
        $userType = $method->getUserType();
        $otherUser = $method->getOtherUser();
//        测试用代码
//        echo $userType;
//        $queryDate = "2018-08-30";
//        $where_old_time_bqsl = " OLD_INSERT_TIME = to_date('".$queryDate."','yyyy-mm-dd') ";
        if (!empty($queryDateStart)) {
            if (!empty($queryDateEnd)) {
                $where_old_time_bqsl = " OLD_INSERT_TIME BETWEEN to_date('" . $queryDateStart . "','yyyy-mm-dd') AND to_date('" . $queryDateEnd . "','yyyy-mm-dd') ";
            } else {
                $where_old_time_bqsl = " OLD_INSERT_TIME = to_date('" . $queryDateStart . "','yyyy-mm-dd') ";
            }
        } else {
            $queryDate = date('yyyy-mm-dd', time());
            $where_old_time_bqsl = " OLD_INSERT_TIME = to_date('" . $queryDate . "','yyyy-mm-dd') ";
        }
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
            $where_type_fix =  " AND OLD_ORGAN_CODE LIKE '".$organCode[$user_name]."%'";
       }else if((int)$userType==3){
            $where_type_fix = " AND NEW_USER_NAME = '".$user_name."'";
       }
       if(in_array($user_name,$otherUser)){
           $where_type_fix =  " AND OLD_ORGAN_CODE NOT LIKE '8647%'";
       }
        $num = 0;
        ################################################################   保全受理   #######################################################################
        //保全室、理赔室、核保室不参与
        if((!in_array($user_name,$fuhe_user)&&!in_array($user_name,$clm_user)&&!in_array($user_name,$uw_user))||(int)$userType==1) {
            #033 个人待确认保全受理查询
            $select_bqsl = "SELECT B.DESCRIPTION,B.LINK_BUSINESS_CODE,TC_ID,TRIM(OLD_ORGAN_CODE) AS OLD_ORGAN_CODE,NEW_USER_NAME,TRIM(OLD_ACCEPT_CODE) AS OLD_ACCEPT_CODE,NEW_ACCEPT_CODE,TRIM(OLD_POLICY_CODE) AS OLD_POLICY_CODE,OLD_SERVICE_CODE,NEW_SERVICE_CODE,IS_ACCORDANCE,OLD_GET_MONEY,NEW_GET_MONEY 
                        FROM TMP_NCS_QD_BX_BQSL_BD A LEFT JOIN TMP_DAYPOST_DESCRIPTION B ON A.OLD_ACCEPT_CODE = B.BUSINESS_CODE AND TRIM(A.OLD_POLICY_CODE) = B.POLICY_CODE AND (A.NEW_USER_NAME = B.USER_NAME OR A.NEW_USER_NAME IS NULL) AND B.NODE = '保全受理'  WHERE " . $where_old_time_bqsl . $where_type_fix;
            $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
            $bqsl_result_old_time = $method->search_long($result_rows);
            for ($i = $num; $i < sizeof($bqsl_result_old_time); $i++) {
                $value = $bqsl_result_old_time[$i];
                $result[$i]['business_type'] = "保全受理";
                if(in_array($user_name,$otherUser)){
                    $result[$i]['organ_code'] = $value['OLD_ORGAN_CODE'];
                }else{
                    $result[$i]['organ_code'] = $orgName[$value['OLD_ORGAN_CODE']];
                }
                $result[$i]['new_user_name'] = $value['NEW_USER_NAME'];
                $result[$i]['business_code'] = $value['OLD_ACCEPT_CODE'];
                $result[$i]['policy_code'] = $value['OLD_POLICY_CODE'];
                $result[$i]['old_money'] = $value['OLD_GET_MONEY'];
                $result[$i]['new_money'] = $value['NEW_GET_MONEY'];
                $result[$i]['tc_id'] = $value['TC_ID'];
                //特殊处理
                if (abs((int)$value['OLD_GET_MONEY'] - (int)$value['NEW_GET_MONEY']) <= 0.01 && strcmp($value['IS_ACCORDANCE'], "是") == 0) {
                    $result[$i]['is_same'] = "是";
                } else {
                    $result[$i]['is_same'] = "否";
                }
                $result[$i]['other1'] = $value['OLD_SERVICE_CODE'];
                $result[$i]['other2'] = $value['NEW_SERVICE_CODE'];
                $result[$i]['other3'] = $value['NEW_ACCEPT_CODE'];
                $result[$i]['other4'] = "-";
                if (empty($value[DESCRIPTION])) {
                    $result[$i]['description'] = "无";
                } else {
                    $result[$i]['description'] = $value['DESCRIPTION'];
                }
                if (empty($value[LINK_BUSINESS_CODE])) {
                    $result[$i]['link_business'] = "无";
                } else {
                    $result[$i]['link_business'] = $value['LINK_BUSINESS_CODE'];
                }
                $result[$i]['other3'] = $value['NEW_ACCEPT_CODE'];
            }
            $num += sizeof($bqsl_result_old_time);
        }
        #######################################################################################################################################

        ################################################################   保全复核   #######################################################################
        if(in_array($user_name,$fuhe_user)||(int)$userType==1){
            $where_type_fix = "";
            #034 个人待确认保全复核查询
            $select_bqfh = "SELECT B.DESCRIPTION,B.LINK_BUSINESS_CODE,TC_ID,TRIM(OLD_ORGAN_CODE) AS OLD_ORGAN_CODE,NEW_USER_NAME,TRIM(OLD_ACCEPT_CODE) AS OLD_ACCEPT_CODE,NEW_ACCEPT_CODE,TRIM(OLD_POLICY_CODE) AS OLD_POLICY_CODE,OLD_SERVICE_CODE,NEW_SERVICE_CODE,IS_ACCORDANCE,OLD_ACCEPT_STATUS,NEW_ACCEPT_STATUS 
                            FROM TMP_NCS_QD_BX_BQFH_BD A LEFT JOIN TMP_DAYPOST_DESCRIPTION B ON A.OLD_ACCEPT_CODE = B.BUSINESS_CODE AND TRIM(A.OLD_POLICY_CODE) = B.POLICY_CODE AND (A.NEW_USER_NAME = B.USER_NAME OR A.NEW_USER_NAME IS NULL) AND B.NODE = '保全复核' WHERE ".$where_old_time_bqsl.$where_type_fix;
            $result_rows = oci_parse($conn, $select_bqfh); // 配置SQL语句，执行SQL
            $bqfh_result_old_time = $method->search_long($result_rows);
            $sum_all = sizeof($bqfh_result_old_time)+ $num;
            for($i=$num,$j=0;$i<$sum_all;$i++){
                $value = $bqfh_result_old_time[$j++];
                $result[$i]['business_type'] = "保全复核";
                if(in_array($value['NEW_USER_NAME'],$fuhe_user)){
                    $result[$i]['organ_code'] = "分公司保全室";
                }else if(!empty($value['NEW_USER_NAME'])){
                    $result[$i]['organ_code'] = "总公司作业中心";
                }else{
                    $result[$i]['organ_code'] = "分公司保全室";
                }
                if(in_array($user_name,$otherUser)){
                    $result[$i]['organ_code'] = $value['OLD_ORGAN_CODE'];
                }
                $result[$i]['new_user_name'] = $value['NEW_USER_NAME'];
                $result[$i]['business_code'] = $value['OLD_ACCEPT_CODE'];
                $result[$i]['policy_code'] = $value['OLD_POLICY_CODE'];
                $result[$i]['old_money'] = $value['OLD_ACCEPT_STATUS'];
                $result[$i]['new_money'] = $value['NEW_ACCEPT_STATUS'];
                $result[$i]['tc_id'] = $value['TC_ID'];
                $result[$i]['is_same'] = $value['IS_ACCORDANCE'];
                $result[$i]['other1'] = $value['OLD_SERVICE_CODE'];
                $result[$i]['other2'] = $value['NEW_SERVICE_CODE'];
                $result[$i]['other3'] = $value['NEW_ACCEPT_CODE'];
                $result[$i]['other4'] = "-";
                if(empty($value[DESCRIPTION])){
                    $result[$i]['description'] = "无";
                }else{
                    $result[$i]['description'] = $value['DESCRIPTION'];
                }
                if(empty($value[LINK_BUSINESS_CODE])){
                    $result[$i]['link_business'] = "无";
                }else{
                    $result[$i]['link_business'] = $value['LINK_BUSINESS_CODE'];
                }
            }
            $num += sizeof($bqfh_result_old_time);
        }
        #######################################################################################################################################

        ################################################################   契约   #######################################################################
        //保全室、理赔室、核保室不参与
        if((!in_array($user_name,$fuhe_user)&&!in_array($user_name,$clm_user)&&!in_array($user_name,$uw_user))||(int)$userType==1) {
                #035 个人待确认契约查询
                $select_qycd = "SELECT B.DESCRIPTION,B.LINK_BUSINESS_CODE,TC_ID,TRIM(OLD_ORGAN_CODE) AS OLD_ORGAN_CODE,NEW_USER_NAME,TRIM(OLD_APPLE_CODE) AS OLD_APPLE_CODE,NEW_APPLE_CODE,IS_ACCORDANCE,A.NODE,OLD_PREM,OLD_AMNT,NEW_PREM,NEW_AMNT
                                FROM TMP_BX_OLD_CDQCB A LEFT JOIN TMP_DAYPOST_DESCRIPTION B ON A.OLD_APPLE_CODE = B.BUSINESS_CODE AND (A.NEW_USER_NAME = B.USER_NAME OR A.NEW_USER_NAME IS NULL) AND A.NODE = B.NODE WHERE ".$where_old_time_bqsl.$where_type_fix;
                $result_rows = oci_parse($conn, $select_qycd); // 配置SQL语句，执行SQL
                $qycd_result_old_time = $method->search_long($result_rows);
                $sum_all = sizeof($qycd_result_old_time)+ $num;
                for($i=$num,$j=0;$i<$sum_all;$i++){
                    $value = $qycd_result_old_time[$j++];
                    $result[$i]['business_type'] = $value['NODE'];
                    if(in_array($user_name,$otherUser)){
                        $result[$i]['organ_code'] = $value['OLD_ORGAN_CODE'];
                    }else{
                        $result[$i]['organ_code'] = $orgName[$value['OLD_ORGAN_CODE']];
                    }
                    $result[$i]['new_user_name'] = $value['NEW_USER_NAME'];
                    $result[$i]['business_code'] = $value['OLD_APPLE_CODE'];
                    $result[$i]['policy_code'] = $value['NEW_APPLE_CODE'];
                    $result[$i]['old_money'] = $value['OLD_PREM'];
                    $result[$i]['new_money'] = $value['NEW_PREM'];
                    $result[$i]['tc_id'] = $value['TC_ID'];
                    $result[$i]['other1'] = $value['OLD_AMNT'];
                    $result[$i]['other2'] = $value['NEW_AMNT'];
                    $result[$i]['other3'] = $value['NEW_ACCEPT_CODE'];
                    $result[$i]['other4'] = "-";
                    if(abs((int)$value['OLD_PREM']-(int)$value['NEW_PREM'])<=0.01&&strcmp($value['IS_ACCORDANCE'],"是")){
                        $result[$i]['is_same'] = "是";
                    }else{
                        $result[$i]['is_same'] = "否";
                    }
                    if(empty($value[DESCRIPTION])){
                        $result[$i]['description'] = "无";
                    }else{
                        $result[$i]['description'] = $value['DESCRIPTION'];
                    }
                    if(empty($value[LINK_BUSINESS_CODE])){
                        $result[$i]['link_business'] = "无";
                    }else{
                        $result[$i]['link_business'] = $value['LINK_BUSINESS_CODE'];
                    }
                }
                $num += sizeof($bqfh_result_old_time);
        }
        #######################################################################################################################################

        ################################################################   核保  #######################################################################
//        APPLE_CODE  关键业务号
        if(in_array($user_name,$uw_user)||(int)$userType==1) {
            #036 个人待确认核保查询
            $select_hb = "SELECT B.DESCRIPTION,B.LINK_BUSINESS_CODE,TC_ID,TRIM(OLD_ORGAN_CODE) AS OLD_ORGAN_CODE,A.NEW_USER_NAME,TRIM(OLD_APPLE_CODE) AS OLD_APPLE_CODE,NEW_APPLE_CODE,OLD_POLICY_CODE,NEW_POLICY_CODE,IS_ACCORDANCE,A.SOURCE_TAB||'核保' AS NODE
                              FROM TMP_UW_LIST A LEFT JOIN TMP_DAYPOST_DESCRIPTION B ON A.OLD_APPLE_CODE = B.BUSINESS_CODE AND (A.NEW_USER_NAME = B.USER_NAME OR A.NEW_USER_NAME IS NULL) AND B.NODE = A.SOURCE_TAB||'核保' WHERE ".$where_old_time_bqsl.$where_type_fix;
            $result_rows = oci_parse($conn, $select_hb); // 配置SQL语句，执行SQL
            $hb_result_old_time = $method->search_long($result_rows);
            $sum_all = sizeof($hb_result_old_time)+ $num;
            for($i=$num,$j=0;$i<$sum_all;$i++){
                $value = $hb_result_old_time[$j++];
                $result[$i]['business_type'] = $value['NODE'];
                if(in_array($user_name,$otherUser)){
                    $result[$i]['organ_code'] = $value['OLD_ORGAN_CODE'];
                }else{
                    $result[$i]['organ_code'] = $orgName[$value['OLD_ORGAN_CODE']];
                }
                $result[$i]['new_user_name'] = $value['NEW_USER_NAME'];
                $result[$i]['business_code'] = $value['OLD_APPLE_CODE'];
                $result[$i]['policy_code'] = $value['OLD_POLICY_CODE'];
                $result[$i]['old_money'] = $value['NEW_APPLE_CODE'];
                $result[$i]['new_money'] = $value['NEW_POLICY_CODE'];
                $result[$i]['tc_id'] = $value['TC_ID'];
                $result[$i]['is_same'] = $value['IS_ACCORDANCE'];
                $result[$i]['other1'] = "-";
                $result[$i]['other2'] = "-";
                $result[$i]['other3'] = "-";
                $result[$i]['other3'] = "-";
                if(empty($value[DESCRIPTION])){
                    $result[$i]['description'] = "无";
                }else{
                    $result[$i]['description'] = $value['DESCRIPTION'];
                }
                if(empty($value[LINK_BUSINESS_CODE])){
                    $result[$i]['link_business'] = "无";
                }else{
                    $result[$i]['link_business'] = $value['LINK_BUSINESS_CODE'];
                }
            }
            $num += sizeof($hb_result_old_time);
        }
        #######################################################################################################################################

        ################################################################   理赔受理  #######################################################################
//        APPLE_CODE  关键业务号
        //保全室、理赔室、核保室不参与
        if((!in_array($user_name,$fuhe_user)&&!in_array($user_name,$clm_user)&&!in_array($user_name,$uw_user))||(int)$userType==1) {
//            $where_type_fix = "";
            #037 个人待确认理赔查询
            $select_hb = "SELECT B.DESCRIPTION,B.LINK_BUSINESS_CODE,TC_ID,TRIM(OLD_ORGAN_CODE) AS OLD_ORGAN_CODE,A.NEW_USER_NAME,OLD_CASE_CODE,NEW_CASE_CODE,IS_ACCORDANCE,'理赔受理' AS NODE,OLD_GET_MONEY,NEW_GET_MONEY
                            FROM TMP_NCS_QD_BX_LPBA_BD A LEFT JOIN TMP_DAYPOST_DESCRIPTION B ON A.OLD_CASE_CODE = B.BUSINESS_CODE AND (A.NEW_USER_NAME = B.USER_NAME OR A.NEW_USER_NAME IS NULL) WHERE ".$where_old_time_bqsl.$where_type_fix;
            $result_rows = oci_parse($conn, $select_hb); // 配置SQL语句，执行SQL
            $hb_result_old_time = $method->search_long($result_rows);
            $sum_all = sizeof($hb_result_old_time)+ $num;
            for($i=$num,$j=0;$i<$sum_all;$i++){
                $value = $hb_result_old_time[$j++];
                $result[$i]['business_type'] = $value['NODE'];
                if(in_array($user_name,$otherUser)){
                    $result[$i]['organ_code'] = $value['OLD_ORGAN_CODE'];
                }else{
                    $result[$i]['organ_code'] = $orgName[$value['OLD_ORGAN_CODE']];
                }
                $result[$i]['new_user_name'] = $value['NEW_USER_NAME'];
                $result[$i]['business_code'] = $value['OLD_CASE_CODE'];
                $result[$i]['policy_code'] = "-";
                $result[$i]['old_money'] = $value['OLD_GET_MONEY'];
                $result[$i]['new_money'] = $value['NEW_GET_MONEY'];
                $result[$i]['tc_id'] = $value['TC_ID'];
                if(abs((int)$value['OLD_GET_MONEY']-(int)$value['NEW_GET_MONEY'])<=0.01&&strcmp($value['IS_ACCORDANCE'],"是")){
                    $result[$i]['is_same'] = "是";
                }else{
                    $result[$i]['is_same'] = "否";
                }
                $result[$i]['other1'] = "-";
                $result[$i]['other2'] = "-";
                $result[$i]['other3'] = "-";
                $result[$i]['other3'] = "-";
                if(empty($value[DESCRIPTION])){
                    $result[$i]['description'] = "无";
                }else{
                    $result[$i]['description'] = $value['DESCRIPTION'];
                }
                if(empty($value[LINK_BUSINESS_CODE])){
                    $result[$i]['link_business'] = "无";
                }else{
                    $result[$i]['link_business'] = $value['LINK_BUSINESS_CODE'];
                }
            }
            $num += sizeof($hb_result_old_time);
        }
        #######################################################################################################################################

        ################################################################   理赔审批审核  #######################################################################
//        APPLE_CODE  关键业务号
        //保全室、理赔室、核保室不参与
        if(in_array($user_name,$clm_user)||(int)$userType==1) {
//            $where_type_fix = "";
            #038 个人待确认理赔审批审核查询
            $select_hb = "SELECT B.DESCRIPTION,B.LINK_BUSINESS_CODE,TC_ID,TRIM(OLD_ORGAN_CODE) AS OLD_ORGAN_CODE,A.NEW_USER_NAME,OLD_CASE_CODE,NEW_CASE_CODE,TRIM(IS_ACCORDANCE) AS IS_ACCORDANCE,A.BUSINESS_TYPE AS NODE
                          FROM TMP_NCS_QD_BX_LPSHSP_BD A LEFT JOIN TMP_DAYPOST_DESCRIPTION B ON A.OLD_CASE_CODE = B.BUSINESS_CODE AND (A.NEW_USER_NAME = B.USER_NAME OR A.NEW_USER_NAME IS NULL) WHERE ".$where_old_time_bqsl.$where_type_fix;
            $result_rows = oci_parse($conn, $select_hb); // 配置SQL语句，执行SQL
            $hb_result_old_time = $method->search_long($result_rows);
            $sum_all = sizeof($hb_result_old_time)+ $num;
            for($i=$num,$j=0;$i<$sum_all;$i++){
                $value = $hb_result_old_time[$j++];
                $result[$i]['business_type'] = $value['NODE'];;
                if(in_array($user_name,$otherUser)){
                    $result[$i]['organ_code'] = $value['OLD_ORGAN_CODE'];
                }else{
                    $result[$i]['organ_code'] = $orgName[$value['OLD_ORGAN_CODE']];
                }
                $result[$i]['new_user_name'] = $value['NEW_USER_NAME'];
                $result[$i]['business_code'] = $value['OLD_CASE_CODE'];
                $result[$i]['policy_code'] = "-";
                $result[$i]['old_money'] = "-";
                $result[$i]['new_money'] = "-";
                $result[$i]['tc_id'] = $value['TC_ID'];
                $result[$i]['is_same'] = $value['IS_ACCORDANCE'];
                $result[$i]['other1'] = "-";
                $result[$i]['other2'] = "-";
                $result[$i]['other3'] = "-";
                $result[$i]['other3'] = "-";
                if(empty($value[DESCRIPTION])){
                    $result[$i]['description'] = "无";
                }else{
                    $result[$i]['description'] = $value['DESCRIPTION'];
                }
                if(empty($value[LINK_BUSINESS_CODE])){
                    $result[$i]['link_business'] = "无";
                }else{
                    $result[$i]['link_business'] = $value['LINK_BUSINESS_CODE'];
                }
            }
            $num += sizeof($hb_result_old_time);
        }
        #######################################################################################################################################
        oci_free_statement($result_rows);
        oci_close($conn);
//        $token = $_SESSION['token'];
//        $token = $this->decode($token);
//        $info = explode('-', $token);
//        dump($info);
        if ($result) {
            exit(json_encode($result));
        } else {
            exit(json_encode(''));
        }
    }
}