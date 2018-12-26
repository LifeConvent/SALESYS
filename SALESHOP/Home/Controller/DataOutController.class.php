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

    public function capCsBack()
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

    public function capNbNoArrive()
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

    public function capNb()
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

    public function capCs()
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

    public function getCapCsBack(){
        $queryDateStart = I('get.queryDateStart');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        if (!empty($queryDateStart)) {
            $where_time_bqsl = " AND TRUNC(DUE_TIME) = to_date('" . $queryDateStart . "','yyyy-mm-dd')";
        } else {
            $where_time_bqsl = " AND TRUNC(DUE_TIME) = TRUNC(SYSDATE-1) ";
        }
        $select_bqsl = "select c.*,TUU.USER_NAME,TUU.REAL_NAME,TCAC.INSERT_OPERATOR_ID from 
                            (select t.unit_number UNIT_NUMBER,max(bs.biz_source_name) BIZ_SOURCE_NAME,max(t.business_code) BUSINESS_CODE,max(t.organ_code) ORGAN_CODE,sum(case when t.arap_flag='1' then t.fee_amount else -t.fee_amount end) FEE_AMOUNT,max(to_char(t.due_time,'YYYY-MM-DD')) DUE_TIME,
                            max(p.name) NAME,max(s.status_name) STATUS_NAME,max(t.bank_code) BANK_CODE,max(d.business_type_name) BUSINESS_TYPE_NAME,max(brc.bank_ret_name) BANK_RET_NAME
                             from dev_cap.t_prem_arap@bxpas16 t 
                             left join dev_cap.t_bank_text_detail@bxpas16 btd on t.seq_no = btd.seq_no 
                             left join dev_cap.T_BANK_RET_CONF@bxpas16 brc on btd.rtn_code=brc.bank_ret_code 
                             left join dev_cap.t_pay_mode@bxpas16 p on t.pay_mode = p.code 
                             left join dev_cap.t_fee_status@bxpas16 s on t.fee_status = s.status_code
                             left join dev_cap.t_business_type_def@bxpas16 d on t.business_type = d.business_type
                             left join dev_cap.t_biz_source@bxpas16 bs on bs.biz_source_code = t.deriv_type 
                             where 1=1 ".$where_time_bqsl." and t.fee_status in ('00','03','04','01')
                            and t.deriv_type IN ('001','005','004') --and t.pay_mode = '32'
                            group by t.unit_number)c 
                            LEFT JOIN APP___PAS__DBUSER.T_CS_ACCEPT_CHANGE@bxpas16 TCAC
                            ON c.BUSINESS_CODE = TCAC.ACCEPT_CODE
                            LEFT JOIN APP___PAS__DBUSER.T_UDMP_USER@bxpas16 TUU
                            ON TCAC.INSERT_BY = TUU.USER_ID
                            where c.FEE_AMOUNT <> 0";
        $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
        $bqsl_result_time = $method->search_long($result_rows);
        for ($i = 0; $i < sizeof($bqsl_result_time); $i++) {
            $value = $bqsl_result_time[$i];
            $result[$i]['unit_number'] = $value['UNIT_NUMBER'];
            $result[$i]['biz_source_name'] = $value['BIZ_SOURCE_NAME'];
            $result[$i]['business_code'] = $value['BUSINESS_CODE'];
            $result[$i]['organ_code'] = $value['ORGAN_CODE'];
            $result[$i]['fee_amount'] = $value['FEE_AMOUNT'];
            $result[$i]['due_time'] = $value['DUE_TIME'];
            $result[$i]['name'] = $value['NAME'];
            $result[$i]['status_name'] = $value['STATUS_NAME'];
            $result[$i]['bank_code'] = $value['BANK_CODE'];
            $result[$i]['business_type_name'] = $value['BUSINESS_TYPE_NAME'];
            $result[$i]['bank_ret_name'] = $value['BANK_RET_NAME'];
            $result[$i]['user_name'] = $value['USER_NAME'];
            $result[$i]['real_name'] = $value['REAL_NAME'];
            $result[$i]['insert_operator_id'] = $value['INSERT_OPERATOR_ID'];
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

    public function getCapCs(){
        $queryDateStart = I('get.queryDateStart');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        if (!empty($queryDateStart)) {
            $where_time_bqsl = " AND TRUNC(APPLY_DATE) = to_date('" . $queryDateStart . "','yyyy-mm-dd')";
        } else {
            $where_time_bqsl = " AND TRUNC(APPLY_DATE) = TRUNC(SYSDATE) ";
        }
        $where_time_bqsl = "";
        $select_bqsl = "SELECT A.*,B.FEE_AMOUNT AS CS_FEE_AMOUNT,
                            (CASE 
                                WHEN B.FEE_AMOUNT = A.fee_amount THEN '是'
                                WHEN -B.FEE_AMOUNT = A.fee_amount THEN '是'
                                 ELSE '否'
                             END) AS IS_SAME
                             FROM(select tpa.unit_number unit_number,
                                   max(t.group_num) group_num,
                                   max(tpa.business_code) business_code,
                                   max(tpa.policy_code) policy_code,
                                   max(dt.bank_account) bank_account,
                                   max(dt.bank_code) bank_code,
                                   max(dt.acco_name) acco_name,
                                   max(tpa.due_time) due_time,
                                   max(bs.biz_source_name) biz_source_name,
                                   case when max(dt.arap_flag) =1 then '收费' else '付费' end arap_flag,
                                   max(dt.fee_amount) fee_amount,
                                   max(to_char(dt.insert_time,'YYYY-MM-DD')) insert_time,
                                   max(sc.sales_channel_name) sales_channel_name
                              from dev_cap.t_bank_text@bxpas16 t
                              left join dev_cap.t_bank_text_detail@bxpas16 dt
                                on dt.send_id = t.send_id
                              left join dev_cap.t_prem_arap@bxpas16 tpa
                                on tpa.seq_no = dt.seq_no
                                left join dev_cap.T_SALES_CHANNEL@bxpas16 sc on tpa.channel_type =sc.sales_channel_code
                                left join dev_cap.t_biz_source@bxpas16 bs on dt.deriv_type = bs.biz_source_code
                             where t.bank_text_status = '2' 
                               and t.disc_no = '000000'
                               and t.send_id <1000000 and t.deriv_type='004'
                             group by tpa.unit_number order by max(t.bank_code),max(t.deriv_type),max(tpa.due_time))A
                             LEFT JOIN 
                             (SELECT A.ACCEPT_CODE,A.POLICY_CODE,SUM(A.FEE_AMOUNT) AS FEE_AMOUNT FROM (
                            SELECT TCPA.BUSINESS_CODE AS ACCEPT_CODE,
                                   TS.SERVICE_NAME AS SERVICE_NAME,
                                   TO_CHAR(TCAC.UPDATE_TIME,'YYYY-MM-DD') AS UPDATE_TIME,
                                   TCPA.POLICY_CODE AS POLICY_CODE,
                                   TCPA.BUSI_PROD_CODE,
                                   TFS.STATUS_NAME AS STATUS_NAME,
                                   (CASE 
                                      WHEN TCPA.ARAP_FLAG = '2' THEN '付费'
                                      ELSE '收费'
                                    END) AS ARAP_FLAG,
                                    tft.TYPE_NAME,
                                   CASE WHEN TCPA.ARAP_FLAG='2' THEN -TCPA.FEE_AMOUNT ELSE TCPA.FEE_AMOUNT END AS FEE_AMOUNT
                                FROM APP___PAS__DBUSER.T_CS_PREM_ARAP@bxpas16 TCPA
                                LEFT JOIN APP___PAS__DBUSER.T_CS_ACCEPT_CHANGE@bxpas16 TCAC
                                ON TCAC.ACCEPT_CODE = TCPA.BUSINESS_CODE
                                    LEFT JOIN APP___PAS__DBUSER.T_SERVICE@bxpas16 TS
                                    ON TCAC.SERVICE_CODE = TS.SERVICE_CODE
                                    LEFT JOIN APP___PAS__DBUSER.T_UDMP_USER@bxpas16 TUU
                                    ON TCAC.INSERT_BY = TUU.USER_ID
                                    LEFT JOIN APP___PAS__DBUSER.T_FEE_STATUS@bxpas16 TFS
                                    ON TFS.STATUS_CODE = TCPA.FEE_STATUS
                                    LEFT JOIN APP___PAS__DBUSER.t_fee_type@bxpas16 tft 
                                    ON TCPA.fee_type=tft.code 
                                WHERE 1=1
                                    AND TCPA.DERIV_TYPE = '004'
                                    AND TCPA.ORGAN_CODE LIKE '8647%' 
                                    AND TCPA.FEE_STATUS NOT IN ('16','02')
                                    --AND TCAC.ACCEPT_STATUS = '18'  --受理状态生效
                                    --AND TRUNC(TCAC.UPDATE_TIME) >= TRUNC(SYSDATE-13) --生效时间
                                ORDER BY TCPA.BUSINESS_CODE,TCPA.POLICY_CODE)A
                              GROUP BY A.ACCEPT_CODE,A.POLICY_CODE)B
                              ON B.ACCEPT_CODE = A.business_code AND B.POLICY_CODE = A.policy_code 
                         WHERE 1=1 ".$where_time_bqsl;
        $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
        $bqsl_result_time = $method->search_long($result_rows);
        for ($i = 0; $i < sizeof($bqsl_result_time); $i++) {
            $value = $bqsl_result_time[$i];
            $result[$i]['unit_number'] = $value['UNIT_NUMBER'];
            $result[$i]['group_num'] = $value['GROUP_NUM'];
            $result[$i]['business_code'] = $value['BUSINESS_CODE'];
            $result[$i]['policy_code'] = $value['POLICY_CODE'];
            $result[$i]['bank_account'] = $value['BANK_ACCOUNT'];
            $result[$i]['bank_code'] = $value['BANK_CODE'];
            $result[$i]['acco_name'] = $value['ACCO_NAME'];
            $result[$i]['due_time'] = $value['DUE_TIME'];
            $result[$i]['biz_source_name'] = $value['BIZ_SOURCE_NAME'];
            $result[$i]['arap_flag'] = $value['ARAP_FLAG'];
            $result[$i]['fee_amount'] = $value['FEE_AMOUNT'];
            $result[$i]['insert_time'] = $value['INSERT_TIME'];
            $result[$i]['sales_channel_name'] = $value['SALES_CHANNEL_NAME'];
            $result[$i]['fee_amount'] = $value['FEE_AMOUNT'];
            $result[$i]['cs_fee_amount'] = $value['CS_FEE_AMOUNT'];
            $result[$i]['is_same'] = $value['IS_SAME'];
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

    public function getCapNb(){
        $queryDateStart = I('get.queryDateStart');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        if (!empty($queryDateStart)) {
            $where_time_bqsl = " AND TRUNC(APPLY_DATE) = to_date('" . $queryDateStart . "','yyyy-mm-dd')";
        } else {
            $where_time_bqsl = " AND TRUNC(APPLY_DATE) = TRUNC(SYSDATE) ";
        }
        $select_bqsl = "SELECT TPA.UNIT_NUMBER UNIT_NUMBER,
                               MAX(T.GROUP_NUM) GROUP_NUM,
                               MAX(TPA.BUSINESS_CODE) BUSINESS_CODE,
                               MAX(DT.BANK_ACCOUNT) BANK_ACCOUNT,
                               MAX(DT.BANK_CODE) BANK_CODE,
                               MAX(DT.ACCO_NAME) ACCO_NAME,
                               MAX(TO_CHAR(TPA.DUE_TIME,'YYYY-MM-DD')) DUE_TIME,
                               MAX(BS.BIZ_SOURCE_NAME) BIZ_SOURCE_NAME,
                               CASE WHEN MAX(DT.ARAP_FLAG) =1 THEN '收费' ELSE '付费' END ARAP_FLAG,
                               MAX(DT.FEE_AMOUNT) FEE_AMOUNT,
                               MAX(TO_CHAR(DT.INSERT_TIME,'YYYY-MM-DD')) INSERT_TIME,
                               MAX(SC.SALES_CHANNEL_NAME) SALES_CHANNEL_NAME,
                               MAX(NBPREMSUM.SUM_TOTAL_PREM_AF)  AS SUM_TOTAL_PREM_AF,
                               (CASE 
                                  WHEN MAX(DT.FEE_AMOUNT) = MAX(NBPREMSUM.SUM_TOTAL_PREM_AF) THEN '是'
                                    ELSE '否'
                                END) AS IS_SAME
                          FROM DEV_CAP.T_BANK_TEXT@BXPAS16                    T
                          LEFT JOIN DEV_CAP.T_BANK_TEXT_DETAIL@BXPAS16        DT
                            ON DT.SEND_ID = T.SEND_ID
                          LEFT JOIN DEV_CAP.T_PREM_ARAP@BXPAS16               TPA
                            ON TPA.SEQ_NO = DT.SEQ_NO
                          LEFT JOIN DEV_CAP.T_SALES_CHANNEL@BXPAS16           SC 
                            ON TPA.CHANNEL_TYPE =SC.SALES_CHANNEL_CODE
                          LEFT JOIN DEV_CAP.T_BIZ_SOURCE@BXPAS16              BS 
                            ON DT.DERIV_TYPE = BS.BIZ_SOURCE_CODE
                          LEFT JOIN (SELECT TNCP.APPLY_CODE,
                                            SUM(TNCP.TOTAL_PREM_AF) AS SUM_TOTAL_PREM_AF 
                                       FROM APP___NB__DBUSER.T_NB_CONTRACT_PRODUCT@BXNBS15 TNCP 
                                       GROUP BY TNCP.APPLY_CODE HAVING COUNT(TNCP.APPLY_CODE) > 0 ) NBPREMSUM --新契约保费
                            ON TPA.BUSINESS_CODE = NBPREMSUM.APPLY_CODE
                         WHERE T.BANK_TEXT_STATUS = '2' and t.deriv_type='001'
                           AND T.DISC_NO = '000000'
                           AND T.SEND_ID <1000000
                         GROUP BY TPA.UNIT_NUMBER ORDER BY MAX(T.BANK_CODE),MAX(T.DERIV_TYPE),MAX(TPA.DUE_TIME)";
//                         WHERE 1=1 ".$where_time_bqsl;
        $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
        $bqsl_result_time = $method->search_long($result_rows);
        for ($i = 0; $i < sizeof($bqsl_result_time); $i++) {
            $value = $bqsl_result_time[$i];
            $result[$i]['unit_number'] = $value['UNIT_NUMBER'];
            $result[$i]['group_num'] = $value['GROUP_NUM'];
            $result[$i]['business_code'] = $value['BUSINESS_CODE'];
            $result[$i]['bank_account'] = $value['BANK_ACCOUNT'];
            $result[$i]['bank_code'] = $value['BANK_CODE'];
            $result[$i]['acco_name'] = $value['ACCO_NAME'];
            $result[$i]['due_time'] = $value['DUE_TIME'];
            $result[$i]['biz_source_name'] = $value['BIZ_SOURCE_NAME'];
            $result[$i]['arap_flag'] = $value['ARAP_FLAG'];
            $result[$i]['fee_amount'] = $value['FEE_AMOUNT'];
            $result[$i]['insert_time'] = $value['INSERT_TIME'];
            $result[$i]['sales_channel_name'] = $value['SALES_CHANNEL_NAME'];
            $result[$i]['sum_total_prem_af'] = $value['SUM_TOTAL_PREM_AF'];
            $result[$i]['is_same'] = $value['IS_SAME'];
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

    public function getNbNoArrive(){
        $queryDateStart = I('get.queryDateStart');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        if (!empty($queryDateStart)) {
            $where_time_bqsl = " AND TRUNC(APPLY_DATE) = to_date('" . $queryDateStart . "','yyyy-mm-dd')";
        } else {
            $where_time_bqsl = " AND TRUNC(APPLY_DATE) = TRUNC(SYSDATE) ";
        }
        $where_time_bqsl = " ";
        $select_bqsl = "SELECT UNIT_NUMBER,--唯一号,
                               BUSINESS_CODE,--业务号,
                               ORGAN_CODE,--机构代码,
                               FEE_AMOUNT,--金额,
                               TO_CHAR(DUE_TIME,'YYYY-MM-DD') AS DUE_TIME,--应缴日期,
                               PAY_NAME,--收付方式,
                               STATUS_NAME,--收付状态,
                               BANK_CODE,--银行代码,
                               BUSINESS_TYPE_NAME,--业务类型,
                               BANK_RET_NAME--失败原因
                          FROM TMP_QDSX_NB_QD_WDZ
                         WHERE 1=1 ".$where_time_bqsl;
        $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
        $bqsl_result_time = $method->search_long($result_rows);
        for ($i = 0; $i < sizeof($bqsl_result_time); $i++) {
            $value = $bqsl_result_time[$i];
            $result[$i]['unit_number'] = $value['UNIT_NUMBER'];
            $result[$i]['business_code'] = $value['BUSINESS_CODE'];
            $result[$i]['organ_code'] = $value['ORGAN_CODE'];
            $result[$i]['fee_amount'] = $value['FEE_AMOUNT'];
            $result[$i]['due_time'] = $value['DUE_TIME'];
            $result[$i]['pay_name'] = $value['PAY_NAME'];
            $result[$i]['status_name'] = $value['STATUS_NAME'];
            $result[$i]['bank_code'] = $value['BANK_CODE'];
            $result[$i]['business_type_name'] = $value['BUSINESS_TYPE_NAME'];
            $result[$i]['bank_ret_name'] = $value['BANK_RET_NAME'];
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
                               WINNING_START_FLAG,--是否预承保
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
            $result[$i]['winning_start_flag'] = $value['WINNING_START_FLAG'];
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
            $result[$i]['apply_code'] = "'".$value['APPLY_CODE'];
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
        $method->exportExcelNbYs($xlsTitle, $xlsCell, $res, $xlsName);
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