<?php
/**
 * Created by PhpStorm.
 * User: gaobiao
 * Date: 2019/1/3
 * Time: 18:46
 */

namespace Home\Controller;
use Think\Controller;
use Think\Log;

class PostTableController extends Controller
{

    public function nbPostStream()
    {
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
    public function ydPostTb()
    {
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

    public function expNbPostStream()
    {
        //导出Excel
        $xlsName = "新契约流程清单";
        $xlsTitle = "新契约流程清单";
        $xlsCell = array( //设置字段名和列名的映射
            array('organ_code', '管理机构'),
            array('apply_code', '投保单号'),
            array('policy_code', '保单号'),
            array('apply_date', '投保日期'),
            array('insert_time', '入库时间'),
            array('busi_apply_date', '预收申请日期'),
            array('finish_time', '到账日期'),
            array('issue_date', '承保日期'),
            array('sign_time', '签单时间'),
            array('validate_date', '保单生效日'),
            array('insert_time_zz', '纸质保单核心推送打印日期'),
            array('print_time_zz', '纸质保单打印推送外包商日期'),
            array('bpo_print_date_zz', '纸质保单外包商制单日期'),
            array('insert_time_dz', '电子保单核心推送打印日期'),
            array('print_time_dz', '电子保单打印日期'),
            array('acknowledge_date', '回执签收日期'),
            array('branch_receive_date', '回执核销日期'),
            array('expiry_date', '保单终止日期'),
            array('pay_mode', '缴费方式'),
            array('pay_mode2', '制返盘状态'),
            array('charge_year', '缴费年期'),
            array('winning_start_flag', '是否预承保'),
            array('sales_channel_name', '投保渠道'),
            array('channel_name', '投保方式'),
            array('status_desc', '投保单状态'),
            array('status_name', '保单效力状态'),
            array('cause_name', '终止原因'),
            array('cancel_date', '撤单日期'),
            array('customer_name', '投保人姓名'),
            array('customer_birthday', '投保人生日'),
            array('billcard_status', '单证UA031扫描状态'),
            array('ua031_scan_time', '单证UA031扫描时间'),
            array('billcard_status_ua008', '单证UA008扫描状态'),
            array('ua008_scan_time', '单证UA008扫描时间'),
            array('bank_name', '银行'),
            array('account_bank', '银行代码'),
            array('account', '银行账户'),
            array('service_bank_branch', '银代银行网点代码'),
            array('bank_branch_name', '银代银行网点名称'),
            array('agent_code', '业务员代码'),
            array('agent_name', '业务员姓名'),
            array('agent_area', '营业区'),
            array('agent_part', '营业部'),
            array('agent_group', '营业组'),
            array('unit', '主险份数'),
            array('product_code_sys', '主险种代码'),
            array('product_name_sys', '主险种名称'),
            array('amount', '主险保额'),
            array('total_prem_af', '总保费'),
            array('fee_status', '保费是否到账'),
            array('dz_sign', '是否电子签名'),
            array('dz_sign_type', '电子签名质检类型及质检结论'),
            #array('dz_sign_status', '电子签名质检结论'),
            array('drq_flag', '是否双录保单'),
            array('sl_send_date', '双录影音接收时间'),
            array('sl_check_date', '双录发送外包商质检时间'),
            array('sl_check_status', '双录外包商质检状态')
        );
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $user_name = "";
        $method->checkIn($user_name);
        $userType = $method->getUserType();
        if((int)$userType==1){
            $where_type_fix = "";
        }else if((int)$userType==2){
            $organCode = $method->getUserOrganCode();
            $where_type_fix =  " AND ORGAN_CODE LIKE '".$organCode[$user_name]."%'";
        }else if((int)$userType==3){
            $where_type_fix = " AND USER_NAME = '".$user_name."'";
        }
        $select_bqsl = "SELECT ORGAN_CODE,--管理机构,
                               APPLY_CODE,--投保单号,
                               POLICY_CODE,--保单号,
                               TO_CHAR(APPLY_DATE,'YYYY-MM-DD') AS APPLY_DATE, --投保日期,
                               TO_CHAR(INSERT_TIME,'YYYY-MM-DD HH24:MI:SS') AS INSERT_TIME, --入库时间,
                               TO_CHAR(BUSI_APPLY_DATE,'YYYY-MM-DD') AS BUSI_APPLY_DATE,--预收申请日期,
                               --TO_CHAR(INITIAL_PREM_DATE,'YYYY-MM-DD HH24:MI:SS') AS INITIAL_PREM_DATE,--首期缴费日,
                               TO_CHAR(FINISH_TIME,'YYYY-MM-DD') AS FINISH_TIME,--到账日期,
                               TO_CHAR(ISSUE_DATE,'YYYY-MM-DD HH24:MI:SS') AS ISSUE_DATE,--承保日期,
                               TO_CHAR(SIGN_TIME,'YYYY-MM-DD HH24:MI:SS') AS SIGN_TIME,--签单时间,
                               TO_CHAR(VALIDATE_DATE,'YYYY-MM-DD') AS VALIDATE_DATE,--保单生效日,
                               TO_CHAR(INSERT_TIME_ZZ,'YYYY-MM-DD HH24:MI:SS') AS INSERT_TIME_ZZ,--纸质保单核心推送打印日期, 
                               TO_CHAR(PRINT_TIME_ZZ,'YYYY-MM-DD HH24:MI:SS')  AS PRINT_TIME_ZZ,--纸质保单打印推送外包商日期,
                               TO_CHAR(BPO_PRINT_DATE_ZZ,'YYYY-MM-DD')  AS BPO_PRINT_DATE_ZZ,--纸质保单外包商制单日期,
                               TO_CHAR(INSERT_TIME_DZ,'YYYY-MM-DD HH24:MI:SS') AS INSERT_TIME_DZ,--电子保单核心推送打印日期, 
                               TO_CHAR(PRINT_TIME_DZ,'YYYY-MM-DD HH24:MI:SS') AS PRINT_TIME_DZ,--电子保单打印日期,
                               TO_CHAR(ACKNOWLEDGE_DATE,'YYYY-MM-DD') AS ACKNOWLEDGE_DATE,--回执签收日期,
                               TO_CHAR(BRANCH_RECEIVE_DATE,'YYYY-MM-DD') AS BRANCH_RECEIVE_DATE,--回执核销日期,
                               TO_CHAR(EXPIRY_DATE,'YYYY-MM-DD') AS EXPIRY_DATE,--保单终止日期,
                               PAY_MODE,  --缴费方式
                               PAY_MODE2, --制返盘状态,
                               CHARGE_YEAR,--缴费年期,
                               WINNING_START_FLAG, -- 是否预承保
                               SALES_CHANNEL_NAME,--投保渠道
                               CHANNEL_NAME, --投保方式
                               STATUS_DESC,--投保单状态
                               STATUS_NAME,--保单效力状态
                               CAUSE_NAME,--终止原因
                               TO_CHAR(CANCEL_DATE,'YYYY-MM-DD') AS CANCEL_DATE,--撤单日期
                               CUSTOMER_NAME,--投保人姓名
                               TO_CHAR(CUSTOMER_BIRTHDAY,'YYYY-MM-DD') AS CUSTOMER_BIRTHDAY,--投保人生日
                               BILLCARD_STATUS,--单证UA031扫描状态
                               TO_CHAR(UA031_SCAN_TIME,'YYYY-MM-DD') AS UA031_SCAN_TIME,--单证UA031扫描时间,
                               BILLCARD_STATUS_UA008,--单证UA008扫描状态
                               TO_CHAR(UA008_SCAN_TIME,'YYYY-MM-DD') AS UA008_SCAN_TIME,--单证UA008扫描时间,
                               BANK_NAME,--银行
                               ACCOUNT_BANK,--银行代码
                               ACCOUNT,--银行账户
                               SERVICE_BANK_BRANCH,--银代银行网点代码
                               BANK_BRANCH_NAME,--银代银行网点名称
                               AGENT_CODE,--业务员代码
                               AGENT_NAME,--业务员姓名
                               AGENT_AREA,--业务员营业区
                               AGENT_PART,--业务员营业部
                               AGENT_GROUP,--业务员营业组
                               UNIT,--份数
                               PRODUCT_CODE_SYS,--险种代码
                               PRODUCT_NAME_SYS,--险种名称
                               AMOUNT,--保额
                               TOTAL_PREM_AF,--保费
                               FEE_STATUS,--保费是否到账
                               DZ_SIGN,--是否电子签名
                               DZ_SIGN_TYPE,   --电子签名质检类型
                               --DZ_SIGN_STATUS,   --电子签名质检结论
                               DRQ_FLAG,
                               TO_CHAR(SL_SEND_DATE,'YYYY-MM-DD HH24:MI:SS') AS SL_SEND_DATE,--双录影音接收时间
                               TO_CHAR(SL_CHECK_DATE,'YYYY-MM-DD HH24:MI:SS') AS SL_CHECK_DATE,--双录发送外包商质检时间
                               SL_CHECK_STATUS--双录外包商质检状态
                          FROM TMP_QDSX_NB_QD_LC
                          WHERE 1=1 ".$where_type_fix;
        $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
        $bqsl_result_time = $method->search_long($result_rows);
        for ($i = 0; $i < sizeof($bqsl_result_time); $i++) {
            $value = $bqsl_result_time[$i];
            $result[$i]['organ_code'] = $value['ORGAN_CODE'];
            $result[$i]['apply_code'] = "'".$value['APPLY_CODE'];
            $result[$i]['policy_code'] = "'".$value['POLICY_CODE'];
            $result[$i]['apply_date'] = $value['APPLY_DATE'];
            $result[$i]['insert_time'] = $value['INSERT_TIME'];
            $result[$i]['busi_apply_date'] = $value['BUSI_APPLY_DATE'];
            #$result[$i]['initial_prem_date'] = $value['INITIAL_PREM_DATE'];
            $result[$i]['finish_time'] = $value['FINISH_TIME'];
            $result[$i]['issue_date'] = $value['ISSUE_DATE'];
            $result[$i]['sign_time'] = $value['SIGN_TIME'];
            $result[$i]['validate_date'] = $value['VALIDATE_DATE'];
            $result[$i]['insert_time_zz'] = $value['INSERT_TIME_ZZ'];
            $result[$i]['print_time_zz'] = $value['PRINT_TIME_ZZ'];
            $result[$i]['bpo_print_date_zz'] = $value['BPO_PRINT_DATE_ZZ'];
            $result[$i]['insert_time_dz'] = $value['INSERT_TIME_DZ'];
            $result[$i]['print_time_dz'] = $value['PRINT_TIME_DZ'];
            $result[$i]['acknowledge_date'] = $value['ACKNOWLEDGE_DATE'];
            $result[$i]['branch_receive_date'] = $value['BRANCH_RECEIVE_DATE'];
            $result[$i]['expiry_date'] = $value['EXPIRY_DATE'];
            $result[$i]['charge_year'] = $value['CHARGE_YEAR'];
            $result[$i]['winning_start_flag'] = $value['WINNING_START_FLAG'];
            $result[$i]['sales_channel_name'] = $value['SALES_CHANNEL_NAME'];
            $result[$i]['channel_name'] = $value['CHANNEL_NAME'];
            $result[$i]['status_desc'] = $value['STATUS_DESC'];
            $result[$i]['status_name'] = $value['STATUS_NAME'];
            $result[$i]['cause_name'] = $value['CAUSE_NAME'];
            $result[$i]['cancel_date'] = $value['CANCEL_DATE'];
            $result[$i]['customer_name'] = $value['CUSTOMER_NAME'];
            $result[$i]['billcard_status'] = $value['BILLCARD_STATUS'];
            $result[$i]['ua031_scan_time'] = $value['UA031_SCAN_TIME'];
            $result[$i]['billcard_status_ua008'] = $value['BILLCARD_STATUS_UA008'];
            $result[$i]['ua008_scan_time'] = $value['UA008_SCAN_TIME'];
            $result[$i]['bank_name'] = $value['BANK_NAME'];
            $result[$i]['account_bank'] = $value['ACCOUNT_BANK'];
            $result[$i]['account'] = "'".$value['ACCOUNT'];
            $result[$i]['service_bank_branch'] = $value['SERVICE_BANK_BRANCH'];
            $result[$i]['bank_branch_name'] = $value['BANK_BRANCH_NAME'];
            $result[$i]['agent_code'] = $value['AGENT_CODE'];
            $result[$i]['agent_name'] = $value['AGENT_NAME'];
            $result[$i]['agent_area'] = $value['AGENT_AREA'];
            $result[$i]['agent_part'] = $value['AGENT_PART'];
            $result[$i]['agent_group'] = $value['AGENT_GROUP'];
            $result[$i]['unit'] = $value['UNIT'];
            $result[$i]['product_code_sys'] = $value['PRODUCT_CODE_SYS'];
            $result[$i]['product_name_sys'] = $value['PRODUCT_NAME_SYS'];
            $result[$i]['amount'] = $value['AMOUNT'];
            $result[$i]['total_prem_af'] = $value['TOTAL_PREM_AF'];
            $result[$i]['fee_status'] = $value['FEE_STATUS'];
            $result[$i]['pay_mode'] = $value['PAY_MODE'];
            $result[$i]['pay_mode2'] = $value['PAY_MODE2'];
            $result[$i]['customer_birthday'] = $value['CUSTOMER_BIRTHDAY'];
            $result[$i]['dz_sign'] = $value['DZ_SIGN'];
            $result[$i]['dz_sign_type'] = $value['DZ_SIGN_TYPE'];
            #$result[$i]['dz_sign_status'] = $value['DZ_SIGN_STATUS'];
            $result[$i]['drq_flag'] = $value['DRQ_FLAG'];
            $result[$i]['sl_send_date'] = $value['SL_SEND_DATE'];
            $result[$i]['sl_check_date'] = $value['SL_CHECK_DATE'];
            $result[$i]['sl_check_status'] = $value['SL_CHECK_STATUS'];
        }
        for ($i = 0; $i < sizeof($result); $i++) {
            $res[] = $result[$i];
        }
        $method->exportExcelNbPostStream($xlsTitle, $xlsCell, $res, $xlsName);
    }

    public function getYdPostTb(){
        $queryDateStart = I('get.queryDateStart');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        if (!empty($queryDateStart)) {
            $where_time_bqsl = " AND TRUNC(APPLY_DATE) = to_date('" . $queryDateStart . "','yyyy-mm-dd')";
        } else {
            $where_time_bqsl = " AND TRUNC(APPLY_DATE) = TRUNC(SYSDATE) ";
        }
        $user_name = "";
        $method->checkIn($user_name);
        $userType = $method->getUserType();
        if((int)$userType==1){
            $where_type_fix = "";
        }else if((int)$userType==2){
            $organCode = $method->getUserOrganCode();
            $where_type_fix =  " AND ORGAN_CODE LIKE '".$organCode[$user_name]."%'";
        }else if((int)$userType==3){
            $where_type_fix = " AND USER_NAME = '".$user_name."'";
        }
        $select_bqsl = "SELECT DISTINCT
                           TO_CHAR(APPLY_DATE,'YYYY-MM-DD HH24:MI:SS') AS APPLY_DATE,--            AS 投保日期,
                           ORGAN_CODE,--            AS 管理机构,
                           APPLY_CODE,--            AS 投保单号,
                           POLICY_CODE,--           AS 保单号,
                           TO_CHAR(ISSUE_DATE,'YYYY-MM-DD HH24:MI:SS') AS ISSUE_DATE,--            AS 承保日期,
                           TO_CHAR(VALIDATE_DATE,'YYYY-MM-DD') AS VALIDATE_DATE,--         AS 保单生效日,
                           TO_CHAR(INITIAL_PREM_DATE,'YYYY-MM-DD') AS INITIAL_PREM_DATE,--     AS 首期缴费日,
                           CHARGE_YEAR,--           AS 缴费年期,
                           WINNING_START_FLAG,--是否预承保,
                           SALES_CHANNEL_NAME,--     AS 投保渠道,
                           CHANNEL_NAME,--          AS 投保方式,
                           STATUS_DESC,--            AS 投保单状态,
                           STATUS_NAME,--           AS 保单效力状态,
                           CAUSE_NAME,--            AS 终止原因,
                           TO_CHAR(CANCEL_DATE,'YYYY-MM-DD') AS CANCEL_DATE,--     AS 撤单日期,
                           CUSTOMER_NAME,--         AS 投保人姓名,
                           BANK_NAME,--              AS 银行,
                           ACCOUNT_BANK,--         AS 银行代码,
                           ACCOUNT,--              AS 银行账户,
                           SERVICE_BANK_BRANCH,--   AS 银代银行网点代码,
                           BANK_BRANCH_NAME,--      AS 银代银行网点名称,
                           AGENT_CODE,--             AS 业务员代码,
                           AGENT_NAME,--             AS 业务员姓名,
                           UNIT,--                  AS 份数,
                           PRODUCT_CODE_SYS,--      AS 险种代码,
                           PRODUCT_NAME_SYS,--      AS 险种名称,
                           AMOUNT, --                             AS 保额,
                           TOTAL_PREM_AF,  --                   AS 保费,
                           FEE_STATUS   -- AS 保费是否到账
                     FROM TMP_QDSX_NB_QD_TB_YD
                     WHERE 1=1 ".$where_time_bqsl.$where_type_fix."
                     ORDER BY APPLY_DATE,ORGAN_CODE,APPLY_CODE";
        $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
        $bqsl_result_time = $method->search_long($result_rows);
        for ($i = 0; $i < sizeof($bqsl_result_time); $i++) {
            $value = $bqsl_result_time[$i];
            $result[$i]['apply_date'] = $value['APPLY_DATE'];
            $result[$i]['organ_code'] = $value['ORGAN_CODE'];
            $result[$i]['apply_code'] = "'".$value['APPLY_CODE'];
            $result[$i]['policy_code'] = $value['POLICY_CODE'];
            $result[$i]['issue_date'] = $value['ISSUE_DATE'];
            $result[$i]['validate_date'] = $value['VALIDATE_DATE'];
            $result[$i]['initial_prem_date'] = $value['INITIAL_PREM_DATE'];
            $result[$i]['charge_year'] = $value['CHARGE_YEAR'];
            $result[$i]['winning_start_flag'] = $value['WINNING_START_FLAG'];
            $result[$i]['sales_channel_name'] = $value['SALES_CHANNEL_NAME'];
            $result[$i]['channel_name'] = $value['CHANNEL_NAME'];
            $result[$i]['status_desc'] = $value['STATUS_DESC'];
            $result[$i]['status_name'] = $value['STATUS_NAME'];
            $result[$i]['cause_name'] = $value['CAUSE_NAME'];
            $result[$i]['cancel_date'] = $value['CANCEL_DATE'];
            $result[$i]['customer_name'] = $value['CUSTOMER_NAME'];
            $result[$i]['bank_name'] = $value['BANK_NAME'];
            $result[$i]['account_bank'] = $value['ACCOUNT_BANK'];
            $result[$i]['account'] = $value['ACCOUNT'];
            $result[$i]['service_bank_branch'] = $value['SERVICE_BANK_BRANCH'];
            $result[$i]['bank_branch_name'] = $value['BANK_BRANCH_NAME'];
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

    public function expYsPostTb()
    {
        //导出Excel
        $xlsName = "新契约银代财富投保清单";
        $xlsTitle = "新契约银代财富投保清单";
        $xlsCell = array( //设置字段名和列名的映射
            array('apply_date', '投保日期'),
            array('organ_code', '管理机构'),
            array('apply_code', '投保单号'),
            array('policy_code', '保单号'),
            array('issue_date', '承保日期'),
            array('validate_date', '保单生效日'),
            array('initial_prem_date', '首期缴费日'),
            array('charge_year', '缴费年期'),
            array('winning_start_flag', '是否预承保'),
            array('sales_channel_name', '投保渠道'),
            array('channel_name', '投保方式'),
            array('status_desc', '投保单状态'),
            array('status_name', '保单效力状态'),
            array('cause_name', '终止原因'),
            array('cancel_date', '撤单日期'),
            array('customer_name', '投保人姓名'),
            array('bank_name', '银行'),
            array('account_bank', '银行代码'),
            array('account', '银行账户'),
            array('service_bank_branch', '银代银行网点代码'),
            array('bank_branch_name', '银代银行网点名称'),
            array('agent_code', '业务员代码'),
            array('agent_name', '业务员姓名'),
            array('unit', '份数'),
            array('product_code_sys', '险种代码'),
            array('product_name_sys', '险种名称'),
            array('amount', '保额'),
            array('total_prem_af', '保费'),
            array('fee_status', '保费是否到账')
        );
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $user_name = "";
        $method->checkIn($user_name);
        $userType = $method->getUserType();
        if((int)$userType==1){
            $where_type_fix = "";
        }else if((int)$userType==2){
            $organCode = $method->getUserOrganCode();
            $where_type_fix =  " AND ORGAN_CODE LIKE '".$organCode[$user_name]."%'";
        }else if((int)$userType==3){
            $where_type_fix = " AND USER_NAME = '".$user_name."'";
        }
        $select_bqsl = "SELECT DISTINCT
                           TO_CHAR(APPLY_DATE,'YYYY-MM-DD HH24:MI:SS') AS APPLY_DATE,--            AS 投保日期,
                           ORGAN_CODE,--            AS 管理机构,
                           APPLY_CODE,--            AS 投保单号,
                           POLICY_CODE,--           AS 保单号,
                           TO_CHAR(ISSUE_DATE,'YYYY-MM-DD HH24:MI:SS') AS ISSUE_DATE,--            AS 承保日期,
                           TO_CHAR(VALIDATE_DATE,'YYYY-MM-DD') AS VALIDATE_DATE,--         AS 保单生效日,
                           TO_CHAR(INITIAL_PREM_DATE,'YYYY-MM-DD') AS INITIAL_PREM_DATE,--     AS 首期缴费日,
                           CHARGE_YEAR,--           AS 缴费年期,
                           WINNING_START_FLAG,--是否预承保,
                           SALES_CHANNEL_NAME,--     AS 投保渠道,
                           CHANNEL_NAME,--          AS 投保方式,
                           STATUS_DESC,--            AS 投保单状态,
                           STATUS_NAME,--           AS 保单效力状态,
                           CAUSE_NAME,--            AS 终止原因,
                           TO_CHAR(CANCEL_DATE,'YYYY-MM-DD') AS CANCEL_DATE,--     AS 撤单日期,
                           CUSTOMER_NAME,--         AS 投保人姓名,
                           BANK_NAME,--              AS 银行,
                           ACCOUNT_BANK,--         AS 银行代码,
                           ACCOUNT,--              AS 银行账户,
                           SERVICE_BANK_BRANCH,--   AS 银代银行网点代码,
                           BANK_BRANCH_NAME,--      AS 银代银行网点名称,
                           AGENT_CODE,--             AS 业务员代码,
                           AGENT_NAME,--             AS 业务员姓名,
                           UNIT,--                  AS 份数,
                           PRODUCT_CODE_SYS,--      AS 险种代码,
                           PRODUCT_NAME_SYS,--      AS 险种名称,
                           AMOUNT, --                             AS 保额,
                           TOTAL_PREM_AF,  --                   AS 保费,
                           FEE_STATUS   -- AS 保费是否到账
                     FROM TMP_QDSX_NB_QD_TB_YD
                     WHERE 1=1 ".$where_type_fix."
                     ORDER BY APPLY_DATE,ORGAN_CODE,APPLY_CODE";
        $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
        $bqsl_result_time = $method->search_long($result_rows);
        for ($i = 0; $i < sizeof($bqsl_result_time); $i++) {
            $value = $bqsl_result_time[$i];
            $result[$i]['apply_date'] = $value['APPLY_DATE'];
            $result[$i]['organ_code'] = $value['ORGAN_CODE'];
            $result[$i]['apply_code'] = "'".$value['APPLY_CODE'];
            $result[$i]['policy_code'] = "'".$value['POLICY_CODE'];
            $result[$i]['issue_date'] = $value['ISSUE_DATE'];
            $result[$i]['validate_date'] = $value['VALIDATE_DATE'];
            $result[$i]['initial_prem_date'] = $value['INITIAL_PREM_DATE'];
            $result[$i]['charge_year'] = $value['CHARGE_YEAR'];
            $result[$i]['winning_start_flag'] = $value['WINNING_START_FLAG'];
            $result[$i]['sales_channel_name'] = $value['SALES_CHANNEL_NAME'];
            $result[$i]['channel_name'] = $value['CHANNEL_NAME'];
            $result[$i]['status_desc'] = $value['STATUS_DESC'];
            $result[$i]['status_name'] = $value['STATUS_NAME'];
            $result[$i]['cause_name'] = $value['CAUSE_NAME'];
            $result[$i]['cancel_date'] = $value['CANCEL_DATE'];
            $result[$i]['customer_name'] = $value['CUSTOMER_NAME'];
            $result[$i]['bank_name'] = $value['BANK_NAME'];
            $result[$i]['account_bank'] = $value['ACCOUNT_BANK'];
            $result[$i]['account'] = $value['ACCOUNT'];
            $result[$i]['service_bank_branch'] = $value['SERVICE_BANK_BRANCH'];
            $result[$i]['bank_branch_name'] = $value['BANK_BRANCH_NAME'];
            $result[$i]['agent_code'] = $value['AGENT_CODE'];
            $result[$i]['agent_name'] = $value['AGENT_NAME'];
            $result[$i]['unit'] = $value['UNIT'];
            $result[$i]['product_code_sys'] = $value['PRODUCT_CODE_SYS'];
            $result[$i]['product_name_sys'] = $value['PRODUCT_NAME_SYS'];
            $result[$i]['amount'] = $value['AMOUNT'];
            $result[$i]['total_prem_af'] = $value['TOTAL_PREM_AF'];
            $result[$i]['fee_status'] = $value['FEE_STATUS'];
        }
        for ($i = 0; $i < sizeof($result); $i++) {
            $res[] = $result[$i];
        }
        $method->exportExcelNbPostStream($xlsTitle, $xlsCell, $res, $xlsName);
    }

    public function expNbScan()
    {
        //导出Excel
        $xlsName = "新契约签单扫描及回单清单";
        $xlsTitle = "新契约签单扫描及回单清单";
        $xlsCell = array( //设置字段名和列名的映射
            array('apply_code', '投保单号'),
            array('policy_code', '保单号'),
            array('issue_date', '承保日期'),
            array('sales_channel_name', '投保渠道'),
            array('organ_code', '管理机构'),
            array('agent_code', '业务员代码'),
            array('agent_name', '业务员姓名'),
            array('agent_area', '营业区'),
            array('agent_part', '营业部'),
            array('agent_group', '营业组'),
            array('status_desc', '投保单状态'),
            array('billcard_code', '单证UA031扫描状态')
        );
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $user_name = "";
        $method->checkIn($user_name);
        $userType = $method->getUserType();
        if((int)$userType==1){
            $where_type_fix = "";
        }else if((int)$userType==2){
            $organCode = $method->getUserOrganCode();
            $where_type_fix =  " AND ORGAN_CODE LIKE '".$organCode[$user_name]."%'";
        }else if((int)$userType==3){
            $where_type_fix = " AND USER_NAME = '".$user_name."'";
        }
        $select_bqsl = "SELECT DISTINCT
                               APPLY_CODE,--           AS 投保单号,
                               POLICY_CODE,--          AS 保单号,
                               TO_CHAR(ISSUE_DATE,'YYYY-MM-DD HH24:MI:SS') AS ISSUE_DATE,--           AS 承保日期, 
                               --TIO.OPERATION_TIME        AS 签单日期,
                               SALES_CHANNEL_NAME,--    AS 投保渠道,
                               ORGAN_CODE,--           AS 管理机构,
                               AGENT_CODE,--             AS 业务员代码,
                               AGENT_NAME,--             AS 业务员姓名,
                               AGENT_AREA,--业务员营业区
                               AGENT_PART,--业务员营业部
                               AGENT_GROUP,--业务员营业组
                               STATUS_DESC,--            AS 投保单状态,
                               BILLCARD_CODE  -- 单证UA031扫描状态
                          FROM TMP_QDSX_NB_QD_SMHD 
                          WHERE 1=1 ".$where_type_fix;
        $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
        $bqsl_result_time = $method->search_long($result_rows);
        for ($i = 0; $i < sizeof($bqsl_result_time); $i++) {
            $value = $bqsl_result_time[$i];
            $result[$i]['organ_code'] = $value['ORGAN_CODE'];
            $result[$i]['apply_code'] = "'".$value['APPLY_CODE'];
            $result[$i]['policy_code'] = "'".$value['POLICY_CODE'];
            $result[$i]['issue_date'] = $value['ISSUE_DATE'];
            $result[$i]['sales_channel_name'] = $value['SALES_CHANNEL_NAME'];
            $result[$i]['status_desc'] = $value['STATUS_DESC'];
            $result[$i]['billcard_code'] = $value['BILLCARD_CODE'];
            $result[$i]['agent_code'] = $value['AGENT_CODE'];
            $result[$i]['agent_name'] = $value['AGENT_NAME'];
            $result[$i]['agent_area'] = $value['AGENT_AREA'];
            $result[$i]['agent_part'] = $value['AGENT_PART'];
            $result[$i]['agent_group'] = $value['AGENT_GROUP'];
        }
        for ($i = 0; $i < sizeof($result); $i++) {
            $res[] = $result[$i];
        }
        $method->exportExcelNbPostStream($xlsTitle, $xlsCell, $res, $xlsName);
    }
}