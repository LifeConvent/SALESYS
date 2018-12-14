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