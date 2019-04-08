<?php
/**
 * Created by PhpStorm.
 * User: gaobiao
 * Date: 2018/10/30
 * Time: 9:06
 */

namespace Home\Controller;
use Think\Controller;
use Think\Log;


class PersonDefineFinishWorkController extends Controller
{

    public function capDefineCs(){
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        $type =  $method->getUserTypeBySql($username);
        $can =  $method->getCanDayPostBySql($username);
        if ($result) {
            $this->assign('username', $username);
            $this->assign('user_name', $username);
            $this->assign('user_type', $type);
            $this->assign('user_day_post', $can);
            $this->assign('TITLE', TITLE);
            $this->assign('list_type',  $method->getListTypeBySql($username));
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function capDefineNb(){
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        $type =  $method->getUserTypeBySql($username);
        $can =  $method->getCanDayPostBySql($username);
        if ($result) {
            $this->assign('username', $username);
            $this->assign('user_name', $username);
            $this->assign('user_type', $type);
            $this->assign('user_day_post', $can);
            $this->assign('TITLE', TITLE);
            $this->assign('list_type',  $method->getListTypeBySql($username));
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }


    public function capDefineClm(){
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        $type =  $method->getUserTypeBySql($username);
        $can =  $method->getCanDayPostBySql($username);
        if ($result) {
            $this->assign('username', $username);
            $this->assign('user_name', $username);
            $this->assign('user_type', $type);
            $this->assign('user_day_post', $can);
            $this->assign('TITLE', TITLE);
            $this->assign('list_type',  $method->getListTypeBySql($username));
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function capDefinePa(){
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        $type =  $method->getUserTypeBySql($username);
        $can =  $method->getCanDayPostBySql($username);
        if ($result) {
            $this->assign('username', $username);
            $this->assign('user_name', $username);
            $this->assign('user_type', $type);
            $this->assign('user_day_post', $can);
            $this->assign('TITLE', TITLE);
            $this->assign('list_type',  $method->getListTypeBySql($username));
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function perDefine(){
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        $type =  $method->getUserTypeBySql($username);
        $can =  $method->getCanDayPostBySql($username);
        if ($result) {
            $this->assign('username', $username);
            $this->assign('user_name', $username);
            $this->assign('user_type', $type);
            $this->assign('user_day_post', $can);
            $this->assign('TITLE', TITLE);
            $this->assign('list_type',  $method->getListTypeBySql($username));
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function csDefine(){
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        $type =  $method->getUserTypeBySql($username);
        $can =  $method->getCanDayPostBySql($username);
        if ($result) {
            $this->assign('username', $username);
            $this->assign('user_name', $username);
            $this->assign('user_type', $type);
            $this->assign('user_day_post', $can);
            $this->assign('TITLE', TITLE);
            $this->assign('list_type',  $method->getListTypeBySql($username));
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function csOutDefine(){
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        $type =  $method->getUserTypeBySql($username);
        $can =  $method->getCanDayPostBySql($username);
        if ($result) {
            $this->assign('username', $username);
            $this->assign('user_name', $username);
            $this->assign('user_type', $type);
            $this->assign('user_day_post', $can);
            $this->assign('TITLE', TITLE);
            $this->assign('list_type',  $method->getListTypeBySql($username));
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function nbTbDefine(){
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        $type =  $method->getUserTypeBySql($username);
        $can =  $method->getCanDayPostBySql($username);
        if ($result) {
            $this->assign('username', $username);
            $this->assign('user_name', $username);
            $this->assign('user_type', $type);
            $this->assign('user_day_post', $can);
            $this->assign('TITLE', TITLE);
            $this->assign('list_type',  $method->getListTypeBySql($username));
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
            $this->assign('username', $username);
            $this->assign('user_name', $username);
            $this->assign('user_type', $type);
            $this->assign('user_day_post', $can);
            $this->assign('TITLE', TITLE);
            $this->assign('list_type',  $method->getListTypeBySql($username));
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function nbNoticeDefine(){
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        $type =  $method->getUserTypeBySql($username);
        $can =  $method->getCanDayPostBySql($username);
        if ($result) {
            $this->assign('username', $username);
            $this->assign('user_name', $username);
            $this->assign('user_type', $type);
            $this->assign('user_day_post', $can);
            $this->assign('TITLE', TITLE);
            $this->assign('list_type',  $method->getListTypeBySql($username));
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function nbCbywDefine(){
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        $type =  $method->getUserTypeBySql($username);
        $can =  $method->getCanDayPostBySql($username);
        if ($result) {
            $this->assign('username', $username);
            $this->assign('user_name', $username);
            $this->assign('user_type', $type);
            $this->assign('user_day_post', $can);
            $this->assign('TITLE', TITLE);
            $this->assign('list_type',  $method->getListTypeBySql($username));
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
        $can =  $method->getCanDayPostBySql($username);
        if ($result) {
            $this->assign('username', $username);
            $this->assign('user_name', $username);
            $this->assign('user_type', $type);
            $this->assign('user_day_post', $can);
            $this->assign('user_type', $type);
            $this->assign('TITLE', TITLE);
            $this->assign('list_type',  $method->getListTypeBySql($username));
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function clmChatDefine(){
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        $type =  $method->getUserTypeBySql($username);
        $can =  $method->getCanDayPostBySql($username);
        if ($result) {
            $this->assign('username', $username);
            $this->assign('user_name', $username);
            $this->assign('user_type', $type);
            $this->assign('user_day_post', $can);
            $this->assign('TITLE', TITLE);
            $this->assign('list_type',  $method->getListTypeBySql($username));
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function nbChatDefine(){
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        $type =  $method->getUserTypeBySql($username);
        $can =  $method->getCanDayPostBySql($username);
        if ($result) {
            $this->assign('username', $username);
            $this->assign('user_name', $username);
            $this->assign('user_type', $type);
            $this->assign('user_day_post', $can);
            $this->assign('TITLE', TITLE);
            $this->assign('list_type',  $method->getListTypeBySql($username));
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function csChatDefine(){
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        $type =  $method->getUserTypeBySql($username);
        $can =  $method->getCanDayPostBySql($username);
        if ($result) {
            $this->assign('username', $username);
            $this->assign('user_name', $username);
            $this->assign('user_type', $type);
            $this->assign('user_day_post', $can);
            $this->assign('TITLE', TITLE);
            $this->assign('list_type',  $method->getListTypeBySql($username));
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
        $can =  $method->getCanDayPostBySql($username);
        if ($result) {
            $this->assign('username', $username);
            $this->assign('user_name', $username);
            $this->assign('user_type', $type);
            $this->assign('user_day_post', $can);
            $this->assign('TITLE', TITLE);
            $this->assign('list_type',  $method->getListTypeBySql($username));
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
//        if($method->publicCheckNoParam()==1){
//            $result['status'] = "failed";
//            $result['lock'] = "true";
//            $result['message'] = "您的用户已被锁定，已无法使用本系统，如有疑问请联系管理员确认！";
//            exit(json_encode($result));
//        }else if($method->publicCheckNoParam()==2){
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
            $select_bqsl = "SELECT DISTINCT  A.ACCEPT_CODE,
                                   A.POLICY_CODE,
                                   TO_CHAR(A.INSERT_DATE,'YYYY-MM-DD') AS INSERT_DATE,
                                   TO_CHAR(A.SYS_INSERT_DATE,'YYYY-MM-DD') AS BUSI_INSERT_DATE,
                                   A.SERVICE_CODE,
                                   A.SERVICE_NAME,
                                   A.USER_NAME,
                                   A.GET_MONEY,
                                   TO_CHAR(A.APPLY_DATE,'YYYY-MM-DD') AS APPLY_DATE,
                                   A.SERVICE_TYPE,
                                   A.ACCEPT_STATUS,
                                   A.ORGAN_CODE,
                                   D.BUSINESS_NAME,
                                   (SELECT W.TC_ID FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID,',') WITHIN group(order by N.TC_ID) AS TC_ID FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.ACCEPT_CODE AND W.FIND_NODE = A.BUSINESS_NODE) AS TC_ID,
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
                                  WHEN (SELECT TO_CHAR(W.CREATE_DATE,'YYYY-MM-DD') FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,N.CREATE_DATE FROM TMP_QDSX_TC_BUG N WHERE 1=1 order BY N.CREATE_DATE ASC) W WHERE W.BUSINESS_CODE = A.ACCEPT_CODE AND W.FIND_NODE = A.BUSINESS_NODE AND ROWNUM = 1) IS NULL THEN TO_CHAR(B.SYS_INSERT_DATE,'YYYY-MM-DD')
                                  ELSE (SELECT TO_CHAR(W.CREATE_DATE,'YYYY-MM-DD') FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,N.CREATE_DATE FROM TMP_QDSX_TC_BUG N WHERE 1=1 order BY N.CREATE_DATE ASC) W WHERE W.BUSINESS_CODE = A.ACCEPT_CODE AND W.FIND_NODE = A.BUSINESS_NODE AND ROWNUM = 1)
                                END) AS SYS_INSERT_DATE,
                              --C.TC_ID||'-'||C.DESCRIPTION AS DESCRIPTION,
                                   (SELECT W.DESCRIPTION FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID||'-'||N.DESCRIPTION,',') WITHIN group(order by N.TC_ID) AS DESCRIPTION FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.ACCEPT_CODE AND W.FIND_NODE = A.BUSINESS_NODE) AS DESCRIPTION,
                                   --C.STATUS,
                                   (SELECT W.STATUS FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID||'-'||N.STATUS_DESC,',') WITHIN group(order by N.TC_ID) AS STATUS FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.ACCEPT_CODE AND W.FIND_NODE = A.BUSINESS_NODE) AS STATUS,
                                   A.BUSINESS_NODE,
                                   C.FIND_NODE
                                FROM TMP_QDSX_CS_SLFH_GM A 
                                LEFT JOIN TMP_QDSX_DAYPOST_DESCRIPTION B 
                                  ON A.ACCEPT_CODE = B.BUSINESS_CODE
                                  AND A.POLICY_CODE = B.POLICY_CODE
                                  AND B.BUSINESS_NODE = A.BUSINESS_NODE
                                  AND B.BUSINESS_DATE = A.SYS_INSERT_DATE
                                LEFT JOIN TMP_QDSX_TC_BUG C  
                                  ON C.BUSINESS_CODE = A.ACCEPT_CODE
                                  --AND C.POLICY_CODE = A.POLICY_CODE
                                  AND C.FIND_NODE = A.BUSINESS_NODE
                                LEFT JOIN TMP_BUSINESS_NODE D
                                  ON D.BUSINESS_NODE = A.BUSINESS_NODE
                                 WHERE 1=1 " . $where_time_bqsl . $where_type_fix;
            $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
            $bqsl_result_time = null;
            $bqsl_result_time = $method->search_long($result_rows);
            Log::write($user_name.' 数据库查询SQL：'.$select_bqsl,'INFO');
            Log::write($user_name.' 数据库查询看结果：'.$bqsl_result_time,'INFO');
            for ($i = $num; $i < sizeof($bqsl_result_time); $i++) {
                $value = $bqsl_result_time[$i];
                $result[$i]['accept_code'] = $value['ACCEPT_CODE'];
                $result[$i]['policy_code'] = $value['POLICY_CODE'];
                $result[$i]['insert_date'] = $value['INSERT_DATE'];
                $result[$i]['service_code'] = $value['SERVICE_CODE'];
                $result[$i]['service_name'] = $value['SERVICE_NAME'];
                $result[$i]['user_name'] = $value['USER_NAME'];
                $result[$i]['get_money'] = $value['GET_MONEY'];
                $result[$i]['apply_date'] = $value['APPLY_DATE'];
                $result[$i]['service_type'] = $value['SERVICE_TYPE'];
                $result[$i]['accept_status'] = $value['ACCEPT_STATUS'];
                $result[$i]['organ_code'] = $value['ORGAN_CODE'];
                $result[$i]['business_name'] = $value['BUSINESS_NAME'];
                $result[$i]['busi_insert_date'] = $value['BUSI_INSERT_DATE'];
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
            $select_bqsl = "SELECT A.CONTENT_ID,
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
                                   A.PHONE,
                                   A.CHAT_CONTENT,
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
                                FROM TMP_QDSX_CS_BQDX A 
                                LEFT JOIN TMP_QDSX_DAYPOST_DESCRIPTION B 
                                  ON A.CONTENT_ID = B.BUSINESS_CODE
                                  AND B.BUSINESS_NODE = A.BUSINESS_NODE
                                  AND B.BUSINESS_DATE = A.SYS_INSERT_DATE
                                LEFT JOIN TMP_QDSX_TC_BUG C  
                                  ON C.BUSINESS_CODE = A.CONTENT_ID
                                  --AND C.POLICY_CODE = A.POLICY_CODE
                                  AND C.FIND_NODE = A.BUSINESS_NODE
                                LEFT JOIN TMP_BUSINESS_NODE D
                                  ON D.BUSINESS_NODE = A.BUSINESS_NODE
                                 WHERE 1=1 " . $where_time_bqsl . $where_type_fix;
            $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
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
                $result[$i]['phone'] = $value['PHONE'];
                $result[$i]['chat_content'] = $value['CHAT_CONTENT'];
                $result[$i]['business_name'] = $value['BUSINESS_NAME'];
                $result[$i]['busi_insert_date'] = $value['BUSI_INSERT_DATE'];
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

    public function getCsOutDefine(){
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
            $select_bqsl = "SELECT DISTINCT  A.ACCEPT_CODE,
                                   A.POLICY_CODE,
                                   TO_CHAR(A.ISSUE_DATE,'YYYY-MM-DD') AS ISSUE_DATE,
                                   A.SERVICE_CODE,
                                   A.SERVICE_NAME,
                                   A.USER_NAME,
                                   A.GET_MONEY,
                                   TO_CHAR(A.CS_VALIDATE_DATE,'YYYY-MM-DD') AS CS_VALIDATE_DATE,
                                   TO_CHAR(A.APPLY_DATE,'YYYY-MM-DD') AS APPLY_DATE,
                                   A.SERVICE_TYPE,
                                   A.ACCEPT_STATUS,
                                   A.ORGAN_CODE,
                                   D.BUSINESS_NAME,
                                   TO_CHAR(A.POLICY_VALIDATE_DATE,'YYYY-MM-DD') AS POLICY_VALIDATE_DATE,
                                   A.PRODUCT_NAME,
                                   A.AMOUNT,
                                   A.TOTAL_PREM_AF,
                                   (SELECT W.TC_ID FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID,',') WITHIN group(order by N.TC_ID) AS TC_ID FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.ACCEPT_CODE AND W.FIND_NODE = A.BUSINESS_NODE) AS TC_ID,
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
                                  WHEN (SELECT TO_CHAR(W.CREATE_DATE,'YYYY-MM-DD') FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,N.CREATE_DATE FROM TMP_QDSX_TC_BUG N WHERE 1=1 order BY N.CREATE_DATE ASC) W WHERE W.BUSINESS_CODE = A.ACCEPT_CODE AND W.FIND_NODE = A.BUSINESS_NODE AND ROWNUM = 1) IS NULL THEN TO_CHAR(B.SYS_INSERT_DATE,'YYYY-MM-DD')
                                  ELSE (SELECT TO_CHAR(W.CREATE_DATE,'YYYY-MM-DD') FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,N.CREATE_DATE FROM TMP_QDSX_TC_BUG N WHERE 1=1 order BY N.CREATE_DATE ASC) W WHERE W.BUSINESS_CODE = A.ACCEPT_CODE AND W.FIND_NODE = A.BUSINESS_NODE AND ROWNUM = 1)
                                END) AS SYS_INSERT_DATE,
                              --C.TC_ID||'-'||C.DESCRIPTION AS DESCRIPTION,
                                   (SELECT W.DESCRIPTION FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID||'-'||N.DESCRIPTION,',') WITHIN group(order by N.TC_ID) AS DESCRIPTION FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.ACCEPT_CODE AND W.FIND_NODE = A.BUSINESS_NODE) AS DESCRIPTION,
                                   --C.STATUS,
                                   (SELECT W.STATUS FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID||'-'||N.STATUS_DESC,',') WITHIN group(order by N.TC_ID) AS STATUS FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.ACCEPT_CODE AND W.FIND_NODE = A.BUSINESS_NODE) AS STATUS
                                FROM TMP_QDSX_CS_SLFH_WW A 
                                LEFT JOIN TMP_QDSX_DAYPOST_DESCRIPTION B 
                                  ON A.ACCEPT_CODE = B.BUSINESS_CODE
                                  AND A.POLICY_CODE = B.POLICY_CODE
                                  AND B.BUSINESS_NODE = A.BUSINESS_NODE
                                  AND B.SYS_INSERT_DATE = A.SYS_INSERT_DATE
                                LEFT JOIN TMP_QDSX_TC_BUG C  
                                  ON C.BUSINESS_CODE = A.ACCEPT_CODE
                                  --AND C.POLICY_CODE = A.POLICY_CODE
                                  AND C.FIND_NODE = A.BUSINESS_NODE
                                LEFT JOIN TMP_BUSINESS_NODE D
                                  ON D.BUSINESS_NODE = A.BUSINESS_NODE
                                 WHERE 1=1 " . $where_time_bqsl . $where_type_fix;
            $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
            $bqsl_result_time = $method->search_long($result_rows);
            for ($i = $num; $i < sizeof($bqsl_result_time); $i++) {
                $value = $bqsl_result_time[$i];
                $result[$i]['accept_code'] = $value['ACCEPT_CODE'];
                $result[$i]['policy_code'] = $value['POLICY_CODE'];
                $result[$i]['issue_date'] = $value['ISSUE_DATE'];
                $result[$i]['service_code'] = $value['SERVICE_CODE'];
                $result[$i]['service_name'] = $value['SERVICE_NAME'];
                $result[$i]['user_name'] = $value['USER_NAME'];
                $result[$i]['get_money'] = $value['GET_MONEY'];
                $result[$i]['cs_validate_date'] = $value['CS_VALIDATE_DATE'];
                $result[$i]['apply_date'] = $value['APPLY_DATE'];
                $result[$i]['service_type'] = $value['SERVICE_TYPE'];
                $result[$i]['accept_status'] = $value['ACCEPT_STATUS'];
                $result[$i]['organ_code'] = $value['ORGAN_CODE'];
                $result[$i]['business_name'] = $value['BUSINESS_NAME'];
                $result[$i]['policy_validate_date'] = $value['POLICY_VALIDATE_DATE'];
                $result[$i]['product_name'] = $value['PRODUCT_NAME'];
                $result[$i]['amount'] = $value['AMOUNT'];
                $result[$i]['total_prem_af'] = $value['TOTAL_PREM_AF'];
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

    public function getNbTbDefine(){
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
            $select_bqsl = "SELECT DISTINCT A.ORGAN_CODE2,
                                               A.ORGAN_CODE3,
                                               A.ORGAN_CODE4,
                                               A.CHANNEL_TYPE,
                                               A.SUBMIT_CHANNEL,
                                               A.APPLY_CODE,
                                               A.WINNING_START_FLAG,
                                               A.POLICY_CODE,
                                               TO_CHAR(A.APPLY_DATE,'YYYY-MM-DD') AS APPLY_DATE,
                                               TO_CHAR(A.ISSUE_DATE,'YYYY-MM-DD') AS ISSUE_DATE,
                                               TO_CHAR(A.VALIDATE_DATE,'YYYY-MM-DD') AS VALIDATE_DATE,
                                               TO_CHAR(A.SYS_INSERT_DATE,'YYYY-MM-DD') AS BUSI_INSERT_DATE,
                                               A.PROPOSAL_STATUS,
                                               A.AGENT_NAME,
                                               A.AGENT_CODE,
                                               A.SERVICE_BANK,
                                               A.SERVICE_BANK_BRANCH,
                                               A.USER_NAME,
                                               A.ORGAN_CODE,
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
                                            FROM TMP_QDSX_NB_TBXX A 
                                            LEFT JOIN TMP_QDSX_DAYPOST_DESCRIPTION B 
                                            ON A.APPLY_CODE = B.BUSINESS_CODE
                                            --AND A.POLICY_CODE = B.POLICY_CODE
                                            AND B.BUSINESS_NODE = A.BUSINESS_NODE
                                            AND B.BUSINESS_DATE = A.SYS_INSERT_DATE
                                            LEFT JOIN TMP_QDSX_TC_BUG C  
                                              ON C.BUSINESS_CODE = A.APPLY_CODE
                                              AND C.FIND_NODE = A.BUSINESS_NODE
                                              LEFT JOIN TMP_BUSINESS_NODE D
                                              ON D.BUSINESS_NODE = A.BUSINESS_NODE
                                 WHERE 1=1 " . $where_time_bqsl . $where_type_fix;
            $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
            $bqsl_result_time = $method->search_long($result_rows);
            for ($i = $num; $i < sizeof($bqsl_result_time); $i++) {
                $value = $bqsl_result_time[$i];
                $result[$i]['organ_code2'] = $value['ORGAN_CODE2'];
                $result[$i]['organ_code3'] = $value['ORGAN_CODE3'];
                $result[$i]['organ_code4'] = $value['ORGAN_CODE4'];
                $result[$i]['channel_type'] = $value['CHANNEL_TYPE'];
                $result[$i]['submit_channel'] = $value['SUBMIT_CHANNEL'];
                $result[$i]['apply_code'] = $value['APPLY_CODE'];
                $result[$i]['winning_start_flag'] = $value['WINNING_START_FLAG'];
                $result[$i]['policy_code'] = $value['POLICY_CODE'];
                $result[$i]['apply_date'] = $value['APPLY_DATE'];
                $result[$i]['issue_date'] = $value['ISSUE_DATE'];
                $result[$i]['validate_date'] = $value['VALIDATE_DATE'];
                $result[$i]['proposal_status'] = $value['PROPOSAL_STATUS'];
                $result[$i]['agent_name'] = $value['AGENT_NAME'];
                $result[$i]['agent_code'] = $value['AGENT_CODE'];
                $result[$i]['service_bank'] = $value['SERVICE_BANK'];
                $result[$i]['service_bank_branch'] = $value['SERVICE_BANK_BRANCH'];
                $result[$i]['user_name'] = $value['USER_NAME'];
                $result[$i]['organ_code'] = $value['ORGAN_CODE'];
                $result[$i]['business_name'] = $value['BUSINESS_NAME'];
                $result[$i]['busi_insert_date'] = $value['BUSI_INSERT_DATE'];
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

    public function getCapDefineCs(){
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
            $select_bqsl = "SELECT A.UNIT_NUMBER,
                                A.GROUP_NUM,
                                A.BUSINESS_CODE,
                                A.POLICY_CODE,
                                A.BANK_ACCOUNT,
                                A.BANK_CODE,
                                A.ACCO_NAME,
                                TO_CHAR(A.DUE_TIME,'YYYY-MM-DD') AS DUE_TIME,
                                A.BIZ_SOURCE_NAME,
                                A.ARAP_FLAG,
                                A.FEE_AMOUNT,
                                TO_CHAR(A.BUSINESS_DATE,'YYYY-MM-DD') AS BUSINESS_DATE,
                                A.SALES_CHANNEL_NAME,
                                A.BUSI_FEE_AMOUNT,
                                A.IS_SAME,
                                D.BUSINESS_NAME,
                                TO_CHAR(A.SYS_INSERT_DATE,'YYYY-MM-DD') AS SYS_INSERT_DATE,
                                B.HD_USER_NAME,
                                B.DESCRIPTION,
                            B.LINK_BUSINESS_CODE TC_ID,
                            B.RESULT
                         FROM TMP_SX_CAP_PRE_DETAIL A
                          LEFT JOIN TMP_QDSX_DAYPOST_DESCRIPTION B 
                                  ON A.UNIT_NUMBER = B.BUSINESS_CODE
                                  AND B.BUSINESS_NODE = A.BUSINESS_NODE
                                  AND B.BUSINESS_DATE = A.SYS_INSERT_DATE
                                LEFT JOIN TMP_BUSINESS_NODE D
                                  ON D.BUSINESS_NODE = A.BUSINESS_NODE
                                 WHERE 1=1 " . $where_time_bqsl . $where_type_fix;
            $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
            $bqsl_result_time = null;
            $bqsl_result_time = $method->search_long($result_rows);
            Log::write($user_name.' 数据库查询SQL：'.$select_bqsl,'INFO');
            Log::write($user_name.' 数据库查询看结果：'.$bqsl_result_time,'INFO');
            for ($i = $num; $i < sizeof($bqsl_result_time); $i++) {
                $value = $bqsl_result_time[$i];
                $result[$i]['unit_number'] = $value['UNIT_NUMBER'];
                $result[$i]['business_code'] = $value['BUSINESS_CODE'];
                $result[$i]['policy_code'] = $value['POLICY_CODE'];
                $result[$i]['bank_account'] = $value['BANK_ACCOUNT'];
                $result[$i]['bank_code'] = $value['BANK_CODE'];
                $result[$i]['acco_name'] = $value['ACCO_NAME'];
                $result[$i]['due_time'] = $value['DUE_TIME'];
                $result[$i]['biz_source_name'] = $value['BIZ_SOURCE_NAME'];
                $result[$i]['arap_flag'] = $value['ARAP_FLAG'];
                $result[$i]['fee_amount'] = $value['FEE_AMOUNT'];
                $result[$i]['business_date'] = $value['BUSINESS_DATE'];
                $result[$i]['sales_channel_name'] = $value['SALES_CHANNEL_NAME'];
                $result[$i]['busi_fee_amount'] = $value['BUSI_FEE_AMOUNT'];
                $result[$i]['is_same'] = $value['IS_SAME'];
                $result[$i]['business_name'] = $value['SYS_INSERT_DATE'];
                $result[$i]['result'] = $value['RESULT'];
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
                if(empty( $value['TC_ID'])){
                    $result[$i]['tc_id'] = "-";
                }else{
                    $result[$i]['tc_id'] = $value['TC_ID'];
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

    public function updateCsOutDefine(){
        header('Content-type: text/html; charset=utf-8');
        $user_name = $_POST['username'];
        $business_name = $_POST['business_name'];
        $policy_code = $_POST['policy_code'];
        $accept_code = $_POST['accept_code'];
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
        #$sysDate = date('yyyy/mm/dd', time());
        $insert_sql = "INSERT INTO TMP_QDSX_DAYPOST_DESCRIPTION(BUSINESS_CODE,POLICY_CODE,HD_USER_NAME,BUSINESS_NODE,RESULT,SYS_INSERT_DATE) VALUES('".$accept_code."','".$policy_code."','".$user_name."','".$node_result[0]['BUSINESS_NODE']."','正确',TRUNC(SYSDATE))";
        #$update_cs_define = "UPDATE TMP_QDSX_DAYPOST_DESCRIPTION SET BUSINESS_CODE = '".$accept_code."', HD_USER_NAME = '".$user_name."', POLICY_CODE = '".$policy_code."', RESULT = '".$result."', BUSINESS_NODE = '".$node_result[0]['BUSINESS_NODE']."'";
        Log::write($user_name.' 数据库查询SQL：'.$insert_sql,'INFO');
        $result_rows = oci_parse($conn, $insert_sql); // 配置SQL语句，执行SQL
        if(oci_execute($result_rows, OCI_COMMIT_ON_SUCCESS)){
            $result['status'] = "success";
            $result['message'] = "受理号：".$accept_code."-保单号：".$policy_code." 确认成功！";
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

    public function updateCsDefine(){
        header('Content-type: text/html; charset=utf-8');
        $user_name = $_POST['username'];
        $result_des = $_POST['result'];
        $business_name = $_POST['business_name'];
        $policy_code = $_POST['policy_code'];
        $insert_date = $_POST['insert_date'];
        $accept_code = $_POST['accept_code'];
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
        $conn = $method->OracleOldDBCon();
        $select_node = "SELECT BUSINESS_NODE FROM TMP_BUSINESS_NODE WHERE BUSINESS_NAME = '".$business_name."'";
        $result_rows = oci_parse($conn, $select_node); // 配置SQL语句，执行SQL
        $node_result = $method->search_long($result_rows);
        $select = "SELECT HD_USER_NAME FROM TMP_QDSX_DAYPOST_DESCRIPTION WHERE BUSINESS_CODE = '".$accept_code."' AND BUSINESS_NODE = '".$node_result[0]['BUSINESS_NODE']."' AND POLICY_CODE = '".$policy_code."' AND BUSINESS_DATE = TO_DATE('".$insert_date."','YYYY-MM-DD') ";
        ############################################################################################################################################################
        $result_rows1 = oci_parse($conn, $select); // 配置SQL语句，执行SQL
        $select_result = $method->search_long($result_rows1);
        if(!empty($select_result[0]['HD_USER_NAME'])){
            $result['status'] = "failed";
            $result['message'] = "用户：".$select_result[0]['HD_USER_NAME']."已进行该业务核对，无需进行再次核对！";
            exit(json_encode($result));
        }
        #$sysDate = date('yyyy/mm/dd', time());
        $insert_sql = "INSERT INTO TMP_QDSX_DAYPOST_DESCRIPTION(BUSINESS_CODE,POLICY_CODE,HD_USER_NAME,BUSINESS_NODE,RESULT,SYS_INSERT_DATE,BUSINESS_DATE) VALUES('".$accept_code."','".$policy_code."','".$user_name."','".$node_result[0]['BUSINESS_NODE']."','正确',TRUNC(SYSDATE),TO_DATE('".$insert_date."','YYYY-MM-DD'))";
        #$update_cs_define = "UPDATE TMP_QDSX_DAYPOST_DESCRIPTION SET BUSINESS_CODE = '".$accept_code."', HD_USER_NAME = '".$user_name."', POLICY_CODE = '".$policy_code."', RESULT = '".$result."', BUSINESS_NODE = '".$node_result[0]['BUSINESS_NODE']."'";
        Log::write($user_name.' 数据库查询SQL：'.$insert_sql,'INFO');
        $result_rows = oci_parse($conn, $insert_sql); // 配置SQL语句，执行SQL
        if(oci_execute($result_rows, OCI_COMMIT_ON_SUCCESS)){
            $result['status'] = "success";
            $result['message'] = "受理号：".$accept_code."-保单号：".$policy_code." 确认成功！";
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

    public function updatePublicDefine(){
        header('Content-type: text/html; charset=utf-8');
        $user_name = $_POST['username'];
        $business_name = $_POST['business_name'];
        Log::write($user_name.' 业务节点：'.$business_name,'INFO');
        $policy_code = $_POST['policy_code'];
        $accept_code = $_POST['business_code'];
        $insert_date = $_POST['insert_date'];
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
        $select = "SELECT HD_USER_NAME FROM TMP_QDSX_DAYPOST_DESCRIPTION WHERE BUSINESS_CODE = '".$accept_code."' AND BUSINESS_NODE = '".$node_result[0]['BUSINESS_NODE']."' AND BUSINESS_DATE = TO_DATE('".$insert_date."','YYYY-MM-DD') ";
        ############################################################################################################################################################
        $result_rows1 = oci_parse($conn, $select); // 配置SQL语句，执行SQL
        $select_result = $method->search_long($result_rows1);
        if(!empty($select_result[0]['HD_USER_NAME'])){
            $result['status'] = "failed";
            $result['message'] = "用户：".$select_result[0]['HD_USER_NAME']."已进行该业务核对，无需进行再次核对！";
            exit(json_encode($result));
        }
        Log::write($user_name.' 业务节点+关键业务号：'.$node_result[0]['BUSINESS_NODE'].$accept_code,'INFO');
        #$sysDate = date('yyyy/mm/dd', time());
        if(empty($policy_code)){
            if(empty($insert_date)){
                $insert_sql = "INSERT INTO TMP_QDSX_DAYPOST_DESCRIPTION(BUSINESS_CODE,HD_USER_NAME,BUSINESS_NODE,RESULT,SYS_INSERT_DATE) VALUES('".$accept_code."','".$user_name."','".$node_result[0]['BUSINESS_NODE']."','正确',TRUNC(SYSDATE))";
            }else{
                $insert_sql = "INSERT INTO TMP_QDSX_DAYPOST_DESCRIPTION(BUSINESS_CODE,HD_USER_NAME,BUSINESS_NODE,RESULT,SYS_INSERT_DATE,BUSINESS_DATE) VALUES('".$accept_code."','".$user_name."','".$node_result[0]['BUSINESS_NODE']."','正确',TRUNC(SYSDATE),TO_DATE('".$insert_date."','YYYY-MM-DD'))";
            }
        }else{
            if(empty($insert_date)){
                $insert_sql = "INSERT INTO TMP_QDSX_DAYPOST_DESCRIPTION(BUSINESS_CODE,POLICY_CODE,HD_USER_NAME,BUSINESS_NODE,RESULT,SYS_INSERT_DATE) VALUES('".$accept_code."','".$policy_code."','".$user_name."','".$node_result[0]['BUSINESS_NODE']."','正确',TRUNC(SYSDATE))";
            }else{
                $insert_sql = "INSERT INTO TMP_QDSX_DAYPOST_DESCRIPTION(BUSINESS_CODE,POLICY_CODE,HD_USER_NAME,BUSINESS_NODE,RESULT,SYS_INSERT_DATE,BUSINESS_DATE) VALUES('".$accept_code."','".$policy_code."','".$user_name."','".$node_result[0]['BUSINESS_NODE']."','正确',TRUNC(SYSDATE),TO_DATE('".$insert_date."','YYYY-MM-DD'))";
            }
        }
        #$update_cs_define = "UPDATE TMP_QDSX_DAYPOST_DESCRIPTION SET BUSINESS_CODE = '".$accept_code."', HD_USER_NAME = '".$user_name."', POLICY_CODE = '".$policy_code."', RESULT = '".$result."', BUSINESS_NODE = '".$node_result[0]['BUSINESS_NODE']."'";
        Log::write($user_name.' 确认结果数据库插入SQL：'.$insert_sql,'INFO');
        $result_rows = oci_parse($conn, $insert_sql); // 配置SQL语句，执行SQL
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

    public function updateCapDefineCs(){
        header('Content-type: text/html; charset=utf-8');
        $user_name = $_POST['username'];
        $result_des = $_POST['result'];
        $business_name = $_POST['business_name'];
        $insert_date = $_POST['insert_date'];
        Log::write($user_name.' 业务节点：'.$business_name,'INFO');
        $policy_code = $_POST['policy_code'];
        $accept_code = $_POST['business_code'];
        $description = $_POST['description'];
        $link_business = $_POST['link_business'];
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
        $select = "SELECT HD_USER_NAME FROM TMP_QDSX_DAYPOST_DESCRIPTION WHERE BUSINESS_CODE = '".$accept_code."' AND BUSINESS_NODE = '".$node_result[0]['BUSINESS_NODE']."' AND BUSINESS_DATE = TO_DATE('".$insert_date."','YYYY-MM-DD') ";
        ############################################################################################################################################################
        $result_rows1 = oci_parse($conn, $select); // 配置SQL语句，执行SQL
        $select_result = $method->search_long($result_rows1);
        if(!empty($select_result[0]['HD_USER_NAME'])){
            $result['status'] = "failed";
            $result['message'] = "用户：".$select_result[0]['HD_USER_NAME']."已进行该业务核对，无需进行再次核对！";
            exit(json_encode($result));
        }
        Log::write($user_name.' 业务节点+关键业务号：'.$node_result[0]['BUSINESS_NODE'].$accept_code,'INFO');
        #$sysDate = date('yyyy/mm/dd', time());
        if(empty($policy_code)){
            if(empty($insert_date)){
                $insert_sql = "INSERT INTO TMP_QDSX_DAYPOST_DESCRIPTION(BUSINESS_CODE,HD_USER_NAME,BUSINESS_NODE,RESULT,SYS_INSERT_DATE,DESCRIPTION,LINK_BUSINESS_CODE) VALUES('".$accept_code."','".$user_name."','".$node_result[0]['BUSINESS_NODE']."','".$result_des."',TRUNC(SYSDATE),'".$description."','".$link_business."')";
            }else{
                $insert_sql = "INSERT INTO TMP_QDSX_DAYPOST_DESCRIPTION(BUSINESS_CODE,HD_USER_NAME,BUSINESS_NODE,RESULT,SYS_INSERT_DATE,BUSINESS_DATE,DESCRIPTION,LINK_BUSINESS_CODE) VALUES('".$accept_code."','".$user_name."','".$node_result[0]['BUSINESS_NODE']."','".$result_des."',TRUNC(SYSDATE),TO_DATE('".$insert_date."','YYYY-MM-DD'),'".$description."','".$link_business."')";
            }
        }else{
            if(empty($insert_date)){
                $insert_sql = "INSERT INTO TMP_QDSX_DAYPOST_DESCRIPTION(BUSINESS_CODE,POLICY_CODE,HD_USER_NAME,BUSINESS_NODE,RESULT,SYS_INSERT_DATE,DESCRIPTION,LINK_BUSINESS_CODE) VALUES('".$accept_code."','".$policy_code."','".$user_name."','".$node_result[0]['BUSINESS_NODE']."','".$result_des."',TRUNC(SYSDATE),'".$description."','".$link_business."')";
            }else{
                $insert_sql = "INSERT INTO TMP_QDSX_DAYPOST_DESCRIPTION(BUSINESS_CODE,POLICY_CODE,HD_USER_NAME,BUSINESS_NODE,RESULT,SYS_INSERT_DATE,BUSINESS_DATE,DESCRIPTION,LINK_BUSINESS_CODE) VALUES('".$accept_code."','".$policy_code."','".$user_name."','".$node_result[0]['BUSINESS_NODE']."','".$result_des."',TRUNC(SYSDATE),TO_DATE('".$insert_date."','YYYY-MM-DD'),'".$description."','".$link_business."')";
            }
        }
        #$update_cs_define = "UPDATE TMP_QDSX_DAYPOST_DESCRIPTION SET BUSINESS_CODE = '".$accept_code."', HD_USER_NAME = '".$user_name."', POLICY_CODE = '".$policy_code."', RESULT = '".$result."', BUSINESS_NODE = '".$node_result[0]['BUSINESS_NODE']."'";
        Log::write($user_name.' 确认结果数据库插入SQL：'.$insert_sql,'INFO');
        $result_rows = oci_parse($conn, $insert_sql); // 配置SQL语句，执行SQL
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
        $select = "SELECT HD_USER_NAME FROM TMP_QDSX_DAYPOST_DESCRIPTION WHERE BUSINESS_CODE = '".$accept_code."' AND BUSINESS_NODE = '".$node_result[0]['BUSINESS_NODE']."' AND BUSINESS_DATE = TO_DATE('".$insert_date."','YYYY-MM-DD') ";
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
                $insert_sql = "INSERT INTO TMP_QDSX_DAYPOST_DESCRIPTION(BUSINESS_CODE,HD_USER_NAME,BUSINESS_NODE,RESULT,SYS_INSERT_DATE,MEDIA_TYPE,BUSINESS_TIME) VALUES('".$accept_code."','".$user_name."','".$node_result[0]['BUSINESS_NODE']."','正确',TRUNC(SYSDATE), '".$media_type."',TO_CHAR(SYSDATE,'HH24:mi:ss'))";
            }else{
                $insert_sql = "INSERT INTO TMP_QDSX_DAYPOST_DESCRIPTION(BUSINESS_CODE,HD_USER_NAME,BUSINESS_NODE,RESULT,SYS_INSERT_DATE,BUSINESS_DATE,MEDIA_TYPE,BUSINESS_TIME) VALUES('".$accept_code."','".$user_name."','".$node_result[0]['BUSINESS_NODE']."','正确',TRUNC(SYSDATE),TO_DATE('".$insert_date."','YYYY-MM-DD'), '".$media_type."',TO_CHAR(SYSDATE,'HH24:mi:ss'))";
            }
        }else{
            if(empty($insert_date)){
                $insert_sql = "INSERT INTO TMP_QDSX_DAYPOST_DESCRIPTION(BUSINESS_CODE,POLICY_CODE,HD_USER_NAME,BUSINESS_NODE,RESULT,SYS_INSERT_DATE,MEDIA_TYPE,BUSINESS_TIME) VALUES('".$accept_code."','".$policy_code."','".$user_name."','".$node_result[0]['BUSINESS_NODE']."','正确',TRUNC(SYSDATE), '".$media_type."',TO_CHAR(SYSDATE,'HH24:mi:ss'))";
            }else{
                $insert_sql = "INSERT INTO TMP_QDSX_DAYPOST_DESCRIPTION(BUSINESS_CODE,POLICY_CODE,HD_USER_NAME,BUSINESS_NODE,RESULT,SYS_INSERT_DATE,BUSINESS_DATE,MEDIA_TYPE,BUSINESS_TIME) VALUES('".$accept_code."','".$policy_code."','".$user_name."','".$node_result[0]['BUSINESS_NODE']."','正确',TRUNC(SYSDATE),TO_DATE('".$insert_date."','YYYY-MM-DD'), '".$media_type."',TO_CHAR(SYSDATE,'HH24:mi:ss'))";
            }
        }
//        if(empty($policy_code)){
//            $insert_sql = "INSERT INTO TMP_QDSX_DAYPOST_DESCRIPTION(BUSINESS_CODE,HD_USER_NAME,BUSINESS_NODE,RESULT,SYS_INSERT_DATE) VALUES('".$accept_code."','".$user_name."','".$node_result[0]['BUSINESS_NODE']."','正确',TRUNC(SYSDATE))";
//        }else{
//            $insert_sql = "INSERT INTO TMP_QDSX_DAYPOST_DESCRIPTION(BUSINESS_CODE,POLICY_CODE,HD_USER_NAME,BUSINESS_NODE,RESULT,SYS_INSERT_DATE,MEDIA_TYPE) VALUES('".$accept_code."','".$policy_code."','".$user_name."','".$node_result[0]['BUSINESS_NODE']."','正确',TRUNC(SYSDATE), '".$media_type."')";
//        }
        #$update_cs_define = "UPDATE TMP_QDSX_DAYPOST_DESCRIPTION SET BUSINESS_CODE = '".$accept_code."', HD_USER_NAME = '".$user_name."', POLICY_CODE = '".$policy_code."', RESULT = '".$result."', BUSINESS_NODE = '".$node_result[0]['BUSINESS_NODE']."'";
        Log::write($user_name.' 数据库查询SQL：'.$insert_sql,'INFO');
        $result_rows = oci_parse($conn, $insert_sql); // 配置SQL语句，执行SQL
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
                            LEFT JOIN TMP_QDSX_DAYPOST_DESCRIPTION B 
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
                                 WHERE 1=1 " . $where_time_bqsl . $where_type_fix;
            $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
            $bqsl_result_time = $method->search_long($result_rows);
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
                            LEFT JOIN TMP_QDSX_DAYPOST_DESCRIPTION B 
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

    public function getNbNoticeDefine(){
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
                               A.APPLY_CODE,
                               A.DOCUMENT_NO,
                               A.DOCUMENT_NAME,
                               A.USER_NAME,
                               A.ORGAN_CODE,
                               D.BUSINESS_NAME,
                               TO_CHAR(A.SYS_INSERT_DATE,'YYYY-MM-DD') AS BUSI_INSERT_DATE,
                               (SELECT W.TC_ID FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID,',') WITHIN group(order by N.TC_ID) AS TC_ID FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.DOCUMENT_NO AND W.FIND_NODE = A.BUSINESS_NODE) AS TC_ID,
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
                                  WHEN (SELECT TO_CHAR(W.CREATE_DATE,'YYYY-MM-DD') FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,N.CREATE_DATE FROM TMP_QDSX_TC_BUG N WHERE 1=1 order BY N.CREATE_DATE ASC) W WHERE W.BUSINESS_CODE = A.DOCUMENT_NO AND W.FIND_NODE = A.BUSINESS_NODE AND ROWNUM = 1) IS NULL THEN TO_CHAR(B.SYS_INSERT_DATE,'YYYY-MM-DD')
                                  ELSE (SELECT TO_CHAR(W.CREATE_DATE,'YYYY-MM-DD') FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,N.CREATE_DATE FROM TMP_QDSX_TC_BUG N WHERE 1=1 order BY N.CREATE_DATE ASC) W WHERE W.BUSINESS_CODE = A.DOCUMENT_NO AND W.FIND_NODE = A.BUSINESS_NODE AND ROWNUM = 1)
                                END) AS SYS_INSERT_DATE,
                              --C.TC_ID||'-'||C.DESCRIPTION AS DESCRIPTION,
                               (SELECT W.DESCRIPTION FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID||'-'||N.DESCRIPTION,',') WITHIN group(order by N.TC_ID) AS DESCRIPTION FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.DOCUMENT_NO AND W.FIND_NODE = A.BUSINESS_NODE) AS DESCRIPTION,
                               --C.STATUS,
                               (SELECT W.STATUS FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID||'-'||N.STATUS_DESC,',') WITHIN group(order by N.TC_ID) AS STATUS FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.DOCUMENT_NO AND W.FIND_NODE = A.BUSINESS_NODE) AS STATUS
                            FROM TMP_QDSX_NB_TZS A 
                            LEFT JOIN TMP_QDSX_DAYPOST_DESCRIPTION B 
                              ON A.DOCUMENT_NO = B.BUSINESS_CODE
                              AND B.BUSINESS_NODE = A.BUSINESS_NODE
                              AND B.BUSINESS_DATE = A.SYS_INSERT_DATE
                            LEFT JOIN TMP_QDSX_TC_BUG C  
                              ON C.BUSINESS_CODE = A.DOCUMENT_NO
                              --AND C.POLICY_CODE = A.POLICY_CODE
                              AND C.FIND_NODE = A.BUSINESS_NODE
                            LEFT JOIN TMP_BUSINESS_NODE D
                              ON D.BUSINESS_NODE = A.BUSINESS_NODE
                                 WHERE 1=1 " . $where_time_bqsl . $where_type_fix;
            $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
            $bqsl_result_time = $method->search_long($result_rows);
            for ($i = $num; $i < sizeof($bqsl_result_time); $i++) {
                $value = $bqsl_result_time[$i];
                $result[$i]['apply_code'] = $value['APPLY_CODE'];
                $result[$i]['document_no'] = $value['DOCUMENT_NO'];
                $result[$i]['document_name'] = $value['DOCUMENT_NAME'];
                $result[$i]['user_name'] = $value['USER_NAME'];
                $result[$i]['organ_code'] = $value['ORGAN_CODE'];
                $result[$i]['business_name'] = $value['BUSINESS_NAME'];
                $result[$i]['busi_insert_date'] = $value['BUSI_INSERT_DATE'];
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

    public function getNbCbywDefine(){
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
        $where_type_fix  = "";
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
                                A.APPLY_CODE,
                                A.POLICY_CODE,
                               A.CHECK_CON,
                                A.USER_NAME,
                                A.ORGAN_CODE,
                                TO_CHAR(A.SYS_INSERT_DATE,'YYYY-MM-DD') AS BUSINESS_DATE,
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
                           FROM TMP_QDSX_NB_CBYW A 
                            LEFT JOIN TMP_QDSX_DAYPOST_DESCRIPTION B 
                            ON A.APPLY_CODE = B.BUSINESS_CODE
                               AND B.BUSINESS_NODE = A.BUSINESS_NODE
                            AND B.SYS_INSERT_DATE = A.SYS_INSERT_DATE
                            LEFT JOIN TMP_QDSX_TC_BUG C  
                              ON C.BUSINESS_CODE = A.APPLY_CODE
                              AND C.FIND_NODE = A.BUSINESS_NODE
                              LEFT JOIN TMP_BUSINESS_NODE D
                              ON D.BUSINESS_NODE = A.BUSINESS_NODE
                                 WHERE 1=1 " . $where_time_bqsl . $where_type_fix;
            $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
            $bqsl_result_time = $method->search_long($result_rows);
            for ($i = $num; $i < sizeof($bqsl_result_time); $i++) {
                $value = $bqsl_result_time[$i];
                $result[$i]['apply_code'] = $value['APPLY_CODE'];
                $result[$i]['policy_code'] = $value['POLICY_CODE'];
                $result[$i]['check_con'] = $value['CHECK_CON'];
                $result[$i]['user_name'] = $value['USER_NAME'];
                $result[$i]['organ_code'] = $value['ORGAN_CODE'];
                $result[$i]['business_name'] = $value['BUSINESS_NAME'];
                $result[$i]['busi_insert_date'] = $value['BUSINESS_DATE'];
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
//        dump($result);
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
//            $where_type_fix =  " AND A.ORGAN_CODE LIKE '".$organCode[$user_name]."%'";
            $where_type_fix =  " AND 1=1 ";
        }else if((int)$userType==3){
//            $where_type_fix = " AND A.USER_NAME = '".$user_name."'";
            $where_type_fix = " AND 1=1 ";
        }
        if(in_array($user_name,$otherUser)){
//            $where_type_fix =  " AND A.ORGAN_CODE NOT LIKE '8647%'";
            $where_type_fix =  " AND 1=1 ";
        }

        $num = 0;
        ################################################################   保全受理   #######################################################################
        //保全室、理赔室、核保室不参与
        if((!in_array($user_name,$fuhe_user)&&!in_array($user_name,$clm_user)&&!in_array($user_name,$uw_user))||(int)$userType==1) {
            #033 个人待确认保全受理查询
            $select_bqsl = "SELECT  DISTINCT 
                                TO_CHAR(A.INSERT_DATE,'YYYY-MM-DD') AS INSERT_DATE,
                                A.CASE_NO,
                                A.POLICY_CODE,
                                TO_CHAR(A.RPTR_TIME,'YYYY-MM-DD') AS RPTR_TIME,
                                A.INSURED_NAME,
                                A.CLAIM_TYPE,
                                A.IS_FEE,
                                A.CASE_STATUS,
                                TO_CHAR(A.SIGN_TIME,'YYYY-MM-DD') AS SIGN_TIME,       
                                A.CALC_PAY,
                                A.FEE_AMOUNT,
                                TO_CHAR(A.SYS_INSERT_DATE,'YYYY-MM-DD') AS BUSI_INSERT_DATE,   
                                TO_CHAR(A.END_CASE_TIME,'YYYY-MM-DD') AS END_CASE_TIME,   
                                TO_CHAR(A.FINISH_TIME,'YYYY-MM-DD') AS FINISH_TIME,
                                A.USER_NAME,
                                A.ORGAN_CODE,
                                D.BUSINESS_NAME,
                               (SELECT W.TC_ID FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID,',') WITHIN group(order by N.TC_ID) AS TC_ID FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.case_no AND W.FIND_NODE = A.BUSINESS_NODE) AS TC_ID,
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
                                  WHEN (SELECT TO_CHAR(W.CREATE_DATE,'YYYY-MM-DD') FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,N.CREATE_DATE FROM TMP_QDSX_TC_BUG N WHERE 1=1 order BY N.CREATE_DATE ASC) W WHERE W.BUSINESS_CODE = A.case_no AND W.FIND_NODE = A.BUSINESS_NODE AND ROWNUM = 1) IS NULL THEN TO_CHAR(B.SYS_INSERT_DATE,'YYYY-MM-DD')
                                  ELSE (SELECT TO_CHAR(W.CREATE_DATE,'YYYY-MM-DD') FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,N.CREATE_DATE FROM TMP_QDSX_TC_BUG N WHERE 1=1 order BY N.CREATE_DATE ASC) W WHERE W.BUSINESS_CODE = A.case_no AND W.FIND_NODE = A.BUSINESS_NODE AND ROWNUM = 1)
                                END) AS SYS_INSERT_DATE,
                              --C.TC_ID||'-'||C.DESCRIPTION AS DESCRIPTION,
                               (SELECT W.DESCRIPTION FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID||'-'||N.DESCRIPTION,',') WITHIN group(order by N.TC_ID) AS DESCRIPTION FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.case_no AND W.FIND_NODE = A.BUSINESS_NODE) AS DESCRIPTION,
                               --C.STATUS,
                               (SELECT W.STATUS FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID||'-'||N.STATUS_DESC,',') WITHIN group(order by N.TC_ID) AS STATUS FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.case_no AND W.FIND_NODE = A.BUSINESS_NODE) AS STATUS
                            FROM TMP_QDSX_CLM A 
                            LEFT JOIN TMP_QDSX_DAYPOST_DESCRIPTION B 
                              ON A.case_no = B.BUSINESS_CODE
                              AND A.POLICY_CODE = B.POLICY_CODE
                              AND B.BUSINESS_NODE = A.BUSINESS_NODE
                              AND B.BUSINESS_DATE = A.SYS_INSERT_DATE
                            LEFT JOIN TMP_QDSX_TC_BUG C  
                              ON C.BUSINESS_CODE = A.case_no
                              --AND C.POLICY_CODE = A.POLICY_CODE
                              AND C.FIND_NODE = A.BUSINESS_NODE
                            LEFT JOIN TMP_BUSINESS_NODE D
                              ON D.BUSINESS_NODE = A.BUSINESS_NODE
                                 WHERE 1=1 " . $where_time_bqsl . $where_type_fix;
            $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
            $bqsl_result_time = $method->search_long($result_rows);
            Log::write($user_name.' 数据库查询SQL：'.$select_bqsl,'INFO');
            Log::write($user_name.' 数据库查询看结果：'.$bqsl_result_time,'INFO');
            for ($i = $num; $i < sizeof($bqsl_result_time); $i++) {
                $value = $bqsl_result_time[$i];
                $result[$i]['case_no'] = $value['CASE_NO'];
                $result[$i]['policy_code'] = $value['POLICY_CODE'];
                $result[$i]['rptr_time'] = $value['RPTR_TIME'];
                $result[$i]['insured_name'] = $value['INSURED_NAME'];
                $result[$i]['claim_type'] = $value['CLAIM_TYPE'];
                $result[$i]['is_fee'] = $value['IS_FEE'];
                $result[$i]['case_status'] = $value['CASE_STATUS'];
                $result[$i]['sign_time'] = $value['SIGN_TIME'];
                $result[$i]['calc_pay'] = $value['CALC_PAY'];
                $result[$i]['fee_amount'] = $value['FEE_AMOUNT'];
                $result[$i]['end_case_time'] = $value['END_CASE_TIME'];
                $result[$i]['finish_time'] = $value['FINISH_TIME'];
                $result[$i]['user_name'] = $value['USER_NAME'];
                $result[$i]['organ_code'] = $value['ORGAN_CODE'];
                $result[$i]['business_name'] = $value['BUSINESS_NAME'];
                $result[$i]['busi_insert_date'] = $value['BUSI_INSERT_DATE'];
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
            $select_bqsl = "SELECT  DISTINCT 
                              TO_CHAR(A.INSERT_DATE,'YYYY-MM-DD') AS INSERT_DATE,
                              A.BUSINESS_CODE     ,
                              --A.POLICY_CODE,
                              A.USER_NAME       ,
                              A.ORGAN_CODE      ,
                              D.BUSINESS_NAME,
                              TO_CHAR(A.SYS_INSERT_DATE,'YYYY-MM-DD') AS BUSI_INSERT_DATE,
                                   (SELECT W.TC_ID FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID,',') WITHIN group(order by N.TC_ID) AS TC_ID FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.BUSINESS_CODE AND W.FIND_NODE = A.BUSINESS_NODE) AS TC_ID,
                                   --C.TC_ID,
                                   (CASE
                                      WHEN (SELECT W.TC_ID FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID,',') WITHIN group(order by N.TC_ID) AS TC_ID FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.BUSINESS_CODE AND W.FIND_NODE = A.BUSINESS_NODE) IS NOT NULL THEN '错误'
                                        ELSE B.RESULT
                                    END) AS RESULT,
                                   (CASE
                                      WHEN C.TC_USER_NAME IS NULL THEN B.HD_USER_NAME
                                        ELSE C.TC_USER_NAME
                                    END) AS HD_USER_NAME,
                                  (CASE
                                  WHEN (SELECT TO_CHAR(W.CREATE_DATE,'YYYY-MM-DD') FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,N.CREATE_DATE FROM TMP_QDSX_TC_BUG N WHERE 1=1 order BY N.CREATE_DATE ASC) W WHERE W.BUSINESS_CODE = A.BUSINESS_CODE AND W.FIND_NODE = A.BUSINESS_NODE AND ROWNUM = 1) IS NULL THEN TO_CHAR(B.SYS_INSERT_DATE,'YYYY-MM-DD')
                                  ELSE (SELECT TO_CHAR(W.CREATE_DATE,'YYYY-MM-DD') FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,N.CREATE_DATE FROM TMP_QDSX_TC_BUG N WHERE 1=1 order BY N.CREATE_DATE ASC) W WHERE W.BUSINESS_CODE = A.BUSINESS_CODE AND W.FIND_NODE = A.BUSINESS_NODE AND ROWNUM = 1)
                                END) AS SYS_INSERT_DATE,
                               --C.TC_ID||'-'||C.DESCRIPTION AS DESCRIPTION,
                                   (SELECT W.DESCRIPTION FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID||'-'||N.DESCRIPTION,',') WITHIN group(order by N.TC_ID) AS DESCRIPTION FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.BUSINESS_CODE AND W.FIND_NODE = A.BUSINESS_NODE) AS DESCRIPTION,
                                   --C.STATUS,
                                   (SELECT W.STATUS FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID||'-'||N.STATUS_DESC,',') WITHIN group(order by N.TC_ID) AS STATUS FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.BUSINESS_CODE AND W.FIND_NODE = A.BUSINESS_NODE) AS STATUS
                                FROM TMP_QDSX_UW A 
                                LEFT JOIN TMP_QDSX_DAYPOST_DESCRIPTION B 
                                  ON  A.BUSINESS_CODE = B.BUSINESS_CODE
                                  --AND A.POLICY_CODE = B.POLICY_CODE
                                  AND B.BUSINESS_NODE = A.BUSINESS_NODE
                                  AND B.BUSINESS_DATE = A.SYS_INSERT_DATE
                                LEFT JOIN TMP_QDSX_TC_BUG C  
                                  ON C.BUSINESS_CODE = A.BUSINESS_CODE
                                  AND C.POLICY_CODE = A.POLICY_CODE
                                  AND C.FIND_NODE = A.BUSINESS_NODE
                                LEFT JOIN TMP_BUSINESS_NODE D
                                  ON D.BUSINESS_NODE = A.BUSINESS_NODE
                                 WHERE 1=1 " . $where_time_bqsl . $where_type_fix;
            $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
            $bqsl_result_time = $method->search_long($result_rows);
            Log::write($user_name.' 数据库查询SQL：'.$select_bqsl,'INFO');
            Log::write($user_name.' 数据库查询看结果：'.$bqsl_result_time,'INFO');
            for ($i = $num; $i < sizeof($bqsl_result_time); $i++) {
                $value = $bqsl_result_time[$i];
                $result[$i]['insert_date'] = $value['INSERT_DATE'];
                $result[$i]['business_code'] = $value['BUSINESS_CODE'];
                $result[$i]['policy_code'] = $value['POLICY_CODE'];
                $result[$i]['user_name'] = $value['USER_NAME'];
                $result[$i]['organ_code'] = $value['ORGAN_CODE'];
                $result[$i]['business_name'] = $value['BUSINESS_NAME'];
                $result[$i]['busi_insert_date'] = $value['BUSI_INSERT_DATE'];
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
                                  A.SEND_ID,
                                  A.RECEIVE_OBJ,
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
                                  A.SEND_MOBILE,
                                  TO_CHAR(A.SEND_CONTENT) AS SEND_CONTENT,
                                  A.USER_NAME,
                                  A.ORGAN_CODE,
                                  D.BUSINESS_NAME,
                                  (SELECT W.TC_ID FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID,',') WITHIN group(order by N.TC_ID) AS TC_ID FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.SEND_ID AND W.FIND_NODE = A.BUSINESS_NODE) AS TC_ID,
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
                                  WHEN (SELECT TO_CHAR(W.CREATE_DATE,'YYYY-MM-DD') FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,N.CREATE_DATE FROM TMP_QDSX_TC_BUG N WHERE 1=1 order BY N.CREATE_DATE ASC) W WHERE W.BUSINESS_CODE = A.SEND_ID AND W.FIND_NODE = A.BUSINESS_NODE AND ROWNUM = 1) IS NULL THEN TO_CHAR(B.SYS_INSERT_DATE,'YYYY-MM-DD')
                                  ELSE (SELECT TO_CHAR(W.CREATE_DATE,'YYYY-MM-DD') FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,N.CREATE_DATE FROM TMP_QDSX_TC_BUG N WHERE 1=1 order BY N.CREATE_DATE ASC) W WHERE W.BUSINESS_CODE = A.SEND_ID AND W.FIND_NODE = A.BUSINESS_NODE AND ROWNUM = 1)
                                END) AS SYS_INSERT_DATE,
                              --C.TC_ID||'-'||C.DESCRIPTION AS DESCRIPTION,
                                   (SELECT W.DESCRIPTION FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID||'-'||N.DESCRIPTION,',') WITHIN group(order by N.TC_ID) AS DESCRIPTION FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.SEND_ID AND W.FIND_NODE = A.BUSINESS_NODE) AS DESCRIPTION,
                                   --C.STATUS,
                                   (SELECT W.STATUS FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID||'-'||N.STATUS_DESC,',') WITHIN group(order by N.TC_ID) AS STATUS FROM TMP_QDSX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = A.SEND_ID AND W.FIND_NODE = A.BUSINESS_NODE) AS STATUS
                                  FROM TMP_QDSX_NB_CBDX A
                                  LEFT JOIN TMP_QDSX_DAYPOST_DESCRIPTION B 
                                     ON A.SEND_ID = B.BUSINESS_CODE
                                     AND B.BUSINESS_NODE = A.BUSINESS_NODE
                                     AND B.BUSINESS_DATE = A.SYS_INSERT_DATE
                                     LEFT JOIN TMP_QDSX_TC_BUG C  
                                     ON C.BUSINESS_CODE = A.SEND_ID
                                     AND C.FIND_NODE = A.BUSINESS_NODE
                                     LEFT JOIN TMP_BUSINESS_NODE D
                                     ON D.BUSINESS_NODE = A.BUSINESS_NODE
                                 WHERE 1=1 " . $where_time_bqsl . $where_type_fix;
            Log::write('承保短信查询条件：'.$where_time_bqsl . $where_type_fix,'INFO');
            $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
            $bqsl_result_time = $method->search_long($result_rows);
            for ($i = $num; $i < sizeof($bqsl_result_time); $i++) {
                $value = $bqsl_result_time[$i];
                $result[$i]['send_id'] = $value['SEND_ID'];
                $result[$i]['receive_obj'] = $value['RECEIVE_OBJ'];
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
                $result[$i]['send_mobile'] = $value['SEND_MOBILE'];
                $result[$i]['send_content'] = $value['SEND_CONTENT'];
                $result[$i]['user_name'] = $value['USER_NAME'];
                $result[$i]['organ_code'] = $value['ORGAN_CODE'];
                $result[$i]['business_name'] = $value['BUSINESS_NAME'];
                $result[$i]['busi_insert_date'] = $value['BUSI_INSERT_DATE'];
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
                                    FROM TMP_QDSX_CLM_DX A 
                                    LEFT JOIN TMP_QDSX_DAYPOST_DESCRIPTION B 
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
            $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
            $bqsl_result_time = $method->search_long($result_rows);
            for ($i = $num; $i < sizeof($bqsl_result_time); $i++) {
                $value = $bqsl_result_time[$i];
                $result[$i]['business_code'] = $value['BUSINESS_CODE'];
                $result[$i]['contend_id'] = $value['CONTEND_ID'];
                $result[$i]['user_name'] = $value['USER_NAME'];
                $result[$i]['mail_title'] = $value['MAIL_TITLE'];
                $result[$i]['contend_info'] = $value['CONTEND_INFO'];
                $result[$i]['organ_code'] = $value['ORGAN_CODE'];
                $result[$i]['business_name'] = $value['BUSINESS_NAME'];
                $result[$i]['busi_insert_date'] = $value['BUSI_INSERT_DATE'];
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

}