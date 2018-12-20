<?php
/**
 * Created by PhpStorm.
 * User: gaobiao
 * Date: 2018/10/25
 * Time: 14:09
 */

namespace Home\Controller;
use Think\Controller;
use Think\Log;


class DataOutController extends Controller
{

    public function nbOutYs()
    {
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
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function nbOutHz()
    {
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
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function nbOutTb()
    {
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
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function nbOutCb()
    {
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
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function csOutCt()
    {
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
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function csCtAll()
    {
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
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function test(){
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        $type =  $method->getUserTypeBySql($username);
        echo $username;
        echo $type;
    }

    public function getNbYs(){
        $queryDateStart = I('get.queryDateStart');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        if (!empty($queryDateStart)) {
            $where_time_bqsl = " AND BUSI_APPLY_DATE = to_date('" . $queryDateStart . "','yyyy-mm-dd')";
        } else {
//            $where_time_bqsl = " AND SYS_INSERT_DATE = TRUNC(SYSDATE) ";
            $where_time_bqsl = "";
        }
        $select_bqsl = "SELECT POLICY_CODE,
                               PRODUCT_CODE,
                               APPLY_CODE,
                               STATUS_DESC,
                               AGENT_CODE,
                               AGENT_NAME,
                               TOTAL_PREM_AF,
                               FYC,
                               STATUS_NAME,
                               --CHANNEL_TYPE, 
                               --PREM_FREQ,
                               CHARGE_YEAR,
                               TO_CHAR(VALIDATE_DATE,'YYYY-MM-DD') AS VALIDATE_DATE,       
                               AMOUNT,
                               MASTER_BUSI_ITEM_ID,
                               TO_CHAR(BUSI_APPLY_DATE,'YYYY-MM-DD') AS BUSI_APPLY_DATE,
                               TO_CHAR(DUE_TIME,'YYYY-MM-DD') AS DUE_TIME,
                               TO_CHAR(APPLY_DATE,'YYYY-MM-DD') AS APPLY_DATE,
                               TO_CHAR(ISSUE_DATE,'YYYY-MM-DD HH24:MI:SS') AS ISSUE_DATE
                          FROM TMP_QDSX_NB_QD_YS
                          WHERE 1=1 ".$where_time_bqsl;
        $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
        $bqsl_result_time = $method->search_long($result_rows);
        for ($i = 0; $i < sizeof($bqsl_result_time); $i++) {
            $value = $bqsl_result_time[$i];
            $result[$i]['policy_code'] = $value['POLICY_CODE'];
            $result[$i]['product_code'] = $value['PRODUCT_CODE'];
            $result[$i]['apply_code'] = $value['APPLY_CODE'];
            $result[$i]['status_desc'] = $value['STATUS_DESC'];
            $result[$i]['agent_code'] = $value['AGENT_CODE'];
            $result[$i]['agent_name'] = $value['AGENT_NAME'];
            $result[$i]['total_prem_af'] = $value['TOTAL_PREM_AF'];
            $result[$i]['fyc'] = $value['FYC'];
            $result[$i]['status_name'] = $value['STATUS_NAME'];
            $result[$i]['charge_year'] = $value['CHARGE_YEAR'];
            $result[$i]['validate_date'] = $value['VALIDATE_DATE'];
            $result[$i]['amount'] = $value['AMOUNT'];
            $result[$i]['master_busi_item_id'] = $value['MASTER_BUSI_ITEM_ID'];
            $result[$i]['busi_apply_date'] = $value['BUSI_APPLY_DATE'];
            $result[$i]['due_time'] = $value['DUE_TIME'];
            $result[$i]['apply_date'] = $value['APPLY_DATE'];
            $result[$i]['issue_date'] = $value['ISSUE_DATE'];
        }
        #######################################################################################################################################
        oci_free_statement($result_rows);
        oci_close($conn);
        for ($i = 0; $i < sizeof($result); $i++) {
            $res[] = $result[$i];
        }
        if ($res) {
            exit(json_encode($res));
        } else {
            exit(json_encode(''));
        }
    }


    public function expNbYs()
    {//导出Excel
        $xlsName = "新契约预收清单";
        $xlsTitle = "新契约预收清单";
        $xlsCell = array( //设置字段名和列名的映射
            array('policy_code', '保单号'),
            array('product_code', '险种代码'),
            array('apply_code', '投保单号'),
            array('status_desc', '投保单状态'),
            array('agent_code', '业务员号码'),
            array('agent_name', '业务员姓名'),
            array('total_prem_af', '规模保费'),
            array('fyc', 'FYC'),
            array('status_name', '收付状态'),
            array('charge_year', '缴费年期'),
            array('validate_date', '险种生效日'),
            array('amount', '保额'),
            array('master_busi_item_id', '主附险标记'),
            array('busi_apply_date', '预收日期'),
            array('due_time', '实际预收日期'),
            array('apply_date', '保单投保日'),
            array('issue_date', '承保日期')
        );
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $select_bqsl = "SELECT POLICY_CODE,
                               PRODUCT_CODE,
                               APPLY_CODE,
                               STATUS_DESC,
                               AGENT_CODE,
                               AGENT_NAME,
                               TOTAL_PREM_AF,
                               FYC,
                               STATUS_NAME,
                               --CHANNEL_TYPE, 
                               --PREM_FREQ,
                               CHARGE_YEAR,
                               TO_CHAR(VALIDATE_DATE,'YYYY-MM-DD') AS VALIDATE_DATE,       
                               AMOUNT,
                               MASTER_BUSI_ITEM_ID,
                               TO_CHAR(BUSI_APPLY_DATE,'YYYY-MM-DD') AS BUSI_APPLY_DATE,
                               TO_CHAR(DUE_TIME,'YYYY-MM-DD') AS DUE_TIME,
                               TO_CHAR(APPLY_DATE,'YYYY-MM-DD') AS APPLY_DATE,
                               TO_CHAR(ISSUE_DATE,'YYYY-MM-DD HH24:MI:SS') AS ISSUE_DATE
                          FROM TMP_QDSX_NB_QD_YS
                          WHERE 1=1 ";
        $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
        $bqsl_result_time = $method->search_long($result_rows);
        for ($i = 0; $i < sizeof($bqsl_result_time); $i++) {
            $value = $bqsl_result_time[$i];
            $result[$i]['policy_code'] = $value['POLICY_CODE'];
            $result[$i]['product_code'] = $value['PRODUCT_CODE'];
            $result[$i]['apply_code'] = $value['APPLY_CODE'];
            $result[$i]['status_desc'] = $value['STATUS_DESC'];
            $result[$i]['agent_code'] = $value['AGENT_CODE'];
            $result[$i]['agent_name'] = $value['AGENT_NAME'];
            $result[$i]['total_prem_af'] = $value['TOTAL_PREM_AF'];
            $result[$i]['fyc'] = $value['FYC'];
            $result[$i]['status_name'] = $value['STATUS_NAME'];
            $result[$i]['charge_year'] = $value['CHARGE_YEAR'];
            $result[$i]['validate_date'] = $value['VALIDATE_DATE'];
            $result[$i]['amount'] = $value['AMOUNT'];
            $result[$i]['master_busi_item_id'] = $value['MASTER_BUSI_ITEM_ID'];
            $result[$i]['busi_apply_date'] = $value['BUSI_APPLY_DATE'];
            $result[$i]['due_time'] = $value['DUE_TIME'];
            $result[$i]['apply_date'] = $value['APPLY_DATE'];
            $result[$i]['issue_date'] = $value['ISSUE_DATE'];
        }
        for ($i = 0; $i < sizeof($result); $i++) {
            $res[] = $result[$i];
        }
        $method->exportExcel($xlsTitle, $xlsCell, $res, $xlsName);
    }

    public function getNbHz(){
        $queryDateStart = I('get.queryDateStart');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        if (!empty($queryDateStart)) {
            $where_time_bqsl = " AND TRUNC(BRANCH_RECEIVE_DATE) = to_date('" . $queryDateStart . "','yyyy-mm-dd')";
        } else {
            $where_time_bqsl = " AND TRUNC(BRANCH_RECEIVE_DATE) = TRUNC(SYSDATE) ";
        }
        $select_bqsl = "SELECT POLICY_CODE,
                               CUSTOMER_NAME,
                               TO_CHAR(ISSUE_DATE,'YYYY-MM-DD HH24:MI:SS') AS ISSUE_DATE,
                               TO_CHAR(ACKNOWLEDGE_DATE,'YYYY-MM-DD') AS ACKNOWLEDGE_DATE,
                               TO_CHAR(BRANCH_RECEIVE_DATE,'YYYY-MM-DD') AS BRANCH_RECEIVE_DATE,
                               ORGAN_CODE,
                               SALES_CHANNEL_NAME,
                               AGENT_CODE,
                               AGENT_NAME
                          FROM TMP_QDSX_NB_QD_HZ 
                        WHERE 1=1 ".$where_time_bqsl;
        $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
        $bqsl_result_time = $method->search_long($result_rows);
        for ($i = 0; $i < sizeof($bqsl_result_time); $i++) {
            $value = $bqsl_result_time[$i];
            $result[$i]['policy_code'] = $value['POLICY_CODE'];
            $result[$i]['customer_name'] = $value['CUSTOMER_NAME'];
            $result[$i]['issue_date'] = $value['ISSUE_DATE'];
            $result[$i]['acknowledge_date'] = $value['ACKNOWLEDGE_DATE'];
            $result[$i]['branch_receive_date'] = $value['BRANCH_RECEIVE_DATE'];
            $result[$i]['organ_code'] = $value['ORGAN_CODE'];
            $result[$i]['sales_channel_name'] = $value['SALES_CHANNEL_NAME'];
            $result[$i]['agent_code'] = $value['AGENT_CODE'];
            $result[$i]['agent_name'] = $value['AGENT_NAME'];
        }
        #######################################################################################################################################
        oci_free_statement($result_rows);
        oci_close($conn);
        for ($i = 0; $i < sizeof($result); $i++) {
            $res[] = $result[$i];
        }
        if ($res) {
            exit(json_encode($res));
        } else {
            exit(json_encode(''));
        }
    }

    public function getNbTb(){
        $queryDateStart = I('get.queryDateStart');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        if (!empty($queryDateStart)) {
            $where_time_bqsl = " AND TRUNC(APPLY_DATE) = to_date('" . $queryDateStart . "','yyyy-mm-dd')";
        } else {
            $where_time_bqsl = " AND TRUNC(APPLY_DATE) = TRUNC(SYSDATE) ";
        }
        $select_bqsl = "SELECT TO_CHAR(APPLY_DATE,'YYYY-MM-DD') AS APPLY_DATE,
                               ORGAN_CODE,
                               APPLY_CODE,
                               POLICY_CODE,
                               TO_CHAR(ISSUE_DATE,'YYYY-MM-DD HH24:MI:SS') AS ISSUE_DATE,
                               TO_CHAR(VALIDATE_DATE,'YYYY-MM-DD') AS VALIDATE_DATE,
                               TO_CHAR(INITIAL_PREM_DATE,'YYYY-MM-DD') AS INITIAL_PREM_DATE,
                               CHARGE_YEAR,
                               WINNING_START_FLAG,
                               SALES_CHANNEL_NAME,
                               CHANNEL_NAME,
                               STATUS_DESC,
                               CUSTOMER_NAME,
                               BANK_NAME,
                               ACCOUNT_BANK,
                               ACCOUNT,
                               AGENT_CODE,
                               AGENT_NAME,
                               UNIT,
                               PRODUCT_CODE_SYS,
                               PRODUCT_NAME_SYS,
                               AMOUNT,
                               TOTAL_PREM_AF,
                               FEE_STATUS
                          FROM TMP_QDSX_NB_QD_CB
                         WHERE 1=1 ".$where_time_bqsl."
                         ORDER BY APPLY_DATE";
        $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
        $bqsl_result_time = $method->search_long($result_rows);
        for ($i = 0; $i < sizeof($bqsl_result_time); $i++) {
            $value = $bqsl_result_time[$i];
            $result[$i]['apply_date'] = $value['APPLY_DATE'];
            $result[$i]['organ_code'] = $value['ORGAN_CODE'];
            $result[$i]['apply_code'] = $value['APPLY_CODE'];
            $result[$i]['policy_code'] = $value['POLICY_CODE'];
            $result[$i]['issue_date'] = $value['ISSUE_DATE'];
            $result[$i]['validate_date'] = $value['VALIDATE_DATE'];
            $result[$i]['initial_prem_date'] = $value['INITIAL_PREM_DATE'];
            $result[$i]['charge_year'] = $value['CHARGE_YEAR'];
            $result[$i]['winning_start_flag'] = $value['WINNING_START_FLAG'];
            $result[$i]['sales_channel_name'] = $value['SALES_CHANNEL_NAME'];
            $result[$i]['channel_name'] = $value['CHANNEL_NAME'];
            $result[$i]['status_desc'] = $value['STATUS_DESC'];
            $result[$i]['customer_name'] = $value['CUSTOMER_NAME'];
            $result[$i]['bank_name'] = $value['BANK_NAME'];
            $result[$i]['account_bank'] = $value['ACCOUNT_BANK'];
            $result[$i]['account'] = $value['ACCOUNT'];
            $result[$i]['agent_code'] = $value['AGENT_CODE'];
            $result[$i]['agent_name'] = $value['AGENT_NAME'];
            $result[$i]['unit'] = $value['UNIT'];
            $result[$i]['product_code_sys'] = $value['PRODUCT_CODE_SYS'];
            $result[$i]['product_name_sys'] = $value['PRODUCT_NAME_SYS'];
            $result[$i]['amount'] = $value['AMOUNT'];
            $result[$i]['total_prem_af'] = $value['TOTAL_PREM_AF'];
            $result[$i]['fee_status'] = $value['FEE_STATUS'];
        }
        #######################################################################################################################################
        oci_free_statement($result_rows);
        oci_close($conn);
        for ($i = 0; $i < sizeof($result); $i++) {
            $res[] = $result[$i];
        }
        if ($res) {
            exit(json_encode($res));
        } else {
            exit(json_encode(''));
        }
    }

    public function getNbCb(){
        $queryDateStart = I('get.queryDateStart');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        if (!empty($queryDateStart)) {
            $where_time_bqsl = " AND TRUNC(ISSUE_DATE) = to_date('" . $queryDateStart . "','yyyy-mm-dd')";
        } else {
            $where_time_bqsl = " AND TRUNC(ISSUE_DATE) = TRUNC(SYSDATE) ";
        }
        $select_bqsl = "SELECT TO_CHAR(APPLY_DATE,'YYYY-MM-DD') AS APPLY_DATE,
                               ORGAN_CODE,
                               APPLY_CODE,
                               POLICY_CODE,
                               TO_CHAR(ISSUE_DATE,'YYYY-MM-DD HH24:MI:SS') AS ISSUE_DATE,
                               TO_CHAR(VALIDATE_DATE,'YYYY-MM-DD') AS VALIDATE_DATE,
                               TO_CHAR(INITIAL_PREM_DATE,'YYYY-MM-DD') AS INITIAL_PREM_DATE,
                               CHARGE_YEAR,
                               WINNING_START_FLAG,
                               SALES_CHANNEL_NAME,
                               CHANNEL_NAME,
                               STATUS_DESC,
                               CUSTOMER_NAME,
                               BANK_NAME,
                               ACCOUNT_BANK,
                               ACCOUNT,
                               AGENT_CODE,
                               AGENT_NAME,
                               UNIT,
                               PRODUCT_CODE_SYS,
                               PRODUCT_NAME_SYS,
                               AMOUNT,
                               TOTAL_PREM_AF,
                               FEE_STATUS
                          FROM TMP_QDSX_NB_QD_CB
                         WHERE 1=1 ".$where_time_bqsl."
                         ORDER BY ISSUE_DATE";
        $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
        $bqsl_result_time = $method->search_long($result_rows);
        for ($i = 0; $i < sizeof($bqsl_result_time); $i++) {
            $value = $bqsl_result_time[$i];
            $result[$i]['apply_date'] = $value['APPLY_DATE'];
            $result[$i]['organ_code'] = $value['ORGAN_CODE'];
            $result[$i]['apply_code'] = $value['APPLY_CODE'];
            $result[$i]['policy_code'] = $value['POLICY_CODE'];
            $result[$i]['issue_date'] = $value['ISSUE_DATE'];
            $result[$i]['validate_date'] = $value['VALIDATE_DATE'];
            $result[$i]['initial_prem_date'] = $value['INITIAL_PREM_DATE'];
            $result[$i]['charge_year'] = $value['CHARGE_YEAR'];
            $result[$i]['winning_start_flag'] = $value['WINNING_START_FLAG'];
            $result[$i]['sales_channel_name'] = $value['SALES_CHANNEL_NAME'];
            $result[$i]['channel_name'] = $value['CHANNEL_NAME'];
            $result[$i]['status_desc'] = $value['STATUS_DESC'];
            $result[$i]['customer_name'] = $value['CUSTOMER_NAME'];
            $result[$i]['bank_name'] = $value['BANK_NAME'];
            $result[$i]['account_bank'] = $value['ACCOUNT_BANK'];
            $result[$i]['account'] = $value['ACCOUNT'];
            $result[$i]['agent_code'] = $value['AGENT_CODE'];
            $result[$i]['agent_name'] = $value['AGENT_NAME'];
            $result[$i]['unit'] = $value['UNIT'];
            $result[$i]['product_code_sys'] = $value['PRODUCT_CODE_SYS'];
            $result[$i]['product_name_sys'] = $value['PRODUCT_NAME_SYS'];
            $result[$i]['amount'] = $value['AMOUNT'];
            $result[$i]['total_prem_af'] = $value['TOTAL_PREM_AF'];
            $result[$i]['fee_status'] = $value['FEE_STATUS'];
        }
        #######################################################################################################################################
        oci_free_statement($result_rows);
        oci_close($conn);
        for ($i = 0; $i < sizeof($result); $i++) {
            $res[] = $result[$i];
        }
        if ($res) {
            exit(json_encode($res));
        } else {
            exit(json_encode(''));
        }
    }

    public function getCsOutCt(){
        $queryDateStart = I('get.queryDateStart');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        if (!empty($queryDateStart)) {
            $where_time_bqsl = " AND SYS_INSERT_DATE = to_date('" . $queryDateStart . "','yyyy-mm-dd')";
        } else {
            $where_time_bqsl = " AND SYS_INSERT_DATE = TRUNC(SYSDATE) ";
        }
        $select_bqsl = "SELECT * FROM  TMP_QDSX_CS_OUT_CT_DETAIL WHERE 1=1 ".$where_time_bqsl;
        $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
        $bqsl_result_time = $method->search_long($result_rows);
        for ($i = 0; $i < sizeof($bqsl_result_time); $i++) {
            $value = $bqsl_result_time[$i];
            $result[$i]['accept_code'] = $value['ACCEPT_CODE'];
            $result[$i]['service_name'] = $value['SERVICE_NAME'];
            $result[$i]['update_time'] = $value['UPDATE_TIME'];
            $result[$i]['policy_code'] = $value['POLICY_CODE'];
            $result[$i]['busi_prod_code'] = $value['BUSI_PROD_CODE'];
            $result[$i]['product_name_sys'] = $value['PRODUCT_NAME_SYS'];
            $result[$i]['status_name'] = $value['STATUS_NAME'];
            $result[$i]['arap_flag'] = $value['ARAP_FLAG'];
            $result[$i]['type_name'] = $value['TYPE_NAME'];
            $result[$i]['fee_amount'] = $value['FEE_AMOUNT'];
            $result[$i]['channel'] = $value['CHANNEL'];
        }
        #######################################################################################################################################
        oci_free_statement($result_rows);
        oci_close($conn);
        for ($i = 0; $i < sizeof($result); $i++) {
            $res[] = $result[$i];
        }
        if ($res) {
            exit(json_encode($res));
        } else {
            exit(json_encode(''));
        }
    }

    public function getCsCtAll(){
        $queryDateStart = I('get.queryDateStart');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        if (!empty($queryDateStart)) {
            $where_time_bqsl = " AND SYS_INSERT_DATE = to_date('" . $queryDateStart . "','yyyy-mm-dd')";
        } else {
            $where_time_bqsl = " AND SYS_INSERT_DATE = TRUNC(SYSDATE) ";
        }
        $select_bqsl = "SELECT * FROM  TMP_QDSX_CS_CT_DETAIL WHERE 1=1 ".$where_time_bqsl;
        $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
        $bqsl_result_time = $method->search_long($result_rows);
        for ($i = 0; $i < sizeof($bqsl_result_time); $i++) {
            $value = $bqsl_result_time[$i];
            $result[$i]['accept_code'] = $value['ACCEPT_CODE'];
            $result[$i]['service_name'] = $value['SERVICE_NAME'];
            $result[$i]['update_time'] = $value['UPDATE_TIME'];
            $result[$i]['policy_code'] = $value['POLICY_CODE'];
            $result[$i]['busi_prod_code'] = $value['BUSI_PROD_CODE'];
            $result[$i]['product_name_sys'] = $value['PRODUCT_NAME_SYS'];
            $result[$i]['status_name'] = $value['STATUS_NAME'];
            $result[$i]['arap_flag'] = $value['ARAP_FLAG'];
            $result[$i]['type_name'] = $value['TYPE_NAME'];
            $result[$i]['fee_amount'] = $value['FEE_AMOUNT'];
            $result[$i]['hesitate_flag'] = $value['HESITATE_FLAG'];
            $result[$i]['channel'] = $value['CHANNEL'];
        }
        #######################################################################################################################################
        oci_free_statement($result_rows);
        oci_close($conn);
        for ($i = 0; $i < sizeof($result); $i++) {
            $res[] = $result[$i];
        }
        if ($res) {
            exit(json_encode($res));
        } else {
            exit(json_encode(''));
        }
    }

}