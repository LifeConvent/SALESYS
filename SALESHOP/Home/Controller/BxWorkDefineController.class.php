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
            $this->assign('username_chinese', $method->getUserCNNameBySql($username));
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
        $this->assign('username_chinese', $method->getUserCNNameBySql($username));
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

    public function uwDefine(){
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        $type =  $method->getUserTypeBySql($username);
        $this->assign('username_chinese', $method->getUserCNNameBySql($username));
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

    public function nbDefine(){
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        $type =  $method->getUserTypeBySql($username);
        $this->assign('username_chinese', $method->getUserCNNameBySql($username));
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

    public function clmDefine(){
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        $type =  $method->getUserTypeBySql($username);
        $this->assign('username_chinese', $method->getUserCNNameBySql($username));
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

    public function nbBdDefine(){
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        $type =  $method->getUserTypeBySql($username);
        $can =  $method->getCanDayPostBySql($username);
        if ($result) {
            $this->assign('username', $username);
            $this->assign('user_name', $username);
            $this->assign('username_chinese', $method->getUserCNNameBySql($username));
            $this->assign('user_type', $type);
            $this->assign('user_day_post', $can);
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
            $where_type_fix =  " AND A.OLD_ORGAN_CODE NOT LIKE '8647%'";
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
                $where_time_bqsl = " AND TRUNC(A.OLD_INSERT_TIME) BETWEEN to_date('" . $queryDateStart . "','yyyy/mm/dd') AND to_date('" . $queryDateEnd . "','yyyy/mm/dd') ";
            } else {
                $where_time_bqsl = " AND TRUNC(A.OLD_INSERT_TIME) = to_date('" . $queryDateStart . "','yyyy/mm/dd') ";
            }
        } else {
            $where_time_bqsl = " AND TRUNC(A.OLD_INSERT_TIME) = TRUNC(SYSDATE) ";
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
            $where_type_fix =  " AND A.OLD_ORGAN_CODE NOT LIKE '8647%'";
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
                                          WHEN C.TC_USER_NAME IS NULL THEN B.HD_USER_NAME
                                            ELSE C.TC_USER_NAME
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
        $no_pass_reason = $_POST['no_pass_reason'];//不通过时才会传值
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        if(!empty($no_pass_reason)){//审核不通过流程
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
        if(!empty($result_des)){//审核通过流程
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
            $update_sql = "UPDATE TMP_BX_DAYPOST_DESCRIPTION SET RESULT = '".$result_des."',IS_SUBMIT = '1', IS_PASS = '1',IS_REVIEW = '1' WHERE BUSINESS_CODE = '".$business_code."' AND POLICY_CODE = '".$policy_code."'AND BUSINESS_NODE = '".$business_node."' AND TO_CHAR(BUSINESS_DATE,'YYYY-MM-DD') ='".$insert_date."'";
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
}