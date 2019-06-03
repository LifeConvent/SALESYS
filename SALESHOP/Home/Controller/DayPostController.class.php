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


class DayPostController extends Controller
{
    public function dataPostTable()
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
            $this->assign('list_type',  $method->getListTypeBySql($username));
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function dayPost()
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
            $this->assign('list_type',  $method->getListTypeBySql($username));
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function dayPostAllBx()
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
            $this->assign('list_type',  $method->getListTypeBySql($username));
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function dayPostKeyThis()
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
            $this->assign('list_type',  $method->getListTypeBySql($username));
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function dayPostKeyElse()
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
            $this->assign('list_type',  $method->getListTypeBySql($username));
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function dayPostKeyChat()
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
            $this->assign('list_type',  $method->getListTypeBySql($username));
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function dayPostUwThis()
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
            $this->assign('list_type',  $method->getListTypeBySql($username));
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function dayPostCsThis()
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
            $this->assign('list_type',  $method->getListTypeBySql($username));
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function dayPostClmThis()
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
            $this->assign('list_type',  $method->getListTypeBySql($username));
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function dayPostTc()
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
            $this->assign('list_type',  $method->getListTypeBySql($username));
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function dayPostAll()
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
            $this->assign('list_type',  $method->getListTypeBySql($username));
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

    public function getDayPostKeyThis(){
        //分子系统查询数据结果且按照标准直接插入
        for($i=0;$i<16;$i++){
            $result[$i]['type'] = '1';
            $result[$i]['old_count'] = '1';
            $result[$i]['new_count'] = '1';
        }
        if ($result) {
            exit(json_encode($result));
        } else {
            exit(json_encode(''));
        }
    }

    //加载日报数据
    public function loadDayPostData(){
        $licang = 1;
        $xiaoji = $licang+9;
        $fenOrganfh = $xiaoji+2;
        $zuoYeZhongXin = $xiaoji+4;
        $uw_fengongsi = $xiaoji+1;
        $clm_fengongsi = $xiaoji+3;
        $heji = $zuoYeZhongXin+1;
        $queryDate = I('get.queryDate');
        //表格区域赋值
        $queryType = I('get.type');
        $method = new MethodController();
        //TC查询条件
        $tc_fix = $method->getTcFix();
        //表格区域赋值
        if(strcmp($queryType,"2")==0){
            $queryDateStart = I('get.queryDateStart');
            $queryDateEnd = I('get.queryDateEnd');
            $where_OLD_time_query = " OLD_INSERT_TIME BETWEEN to_date('".$queryDateStart."','yyyy-mm-dd') AND to_date('".$queryDateEnd."','yyyy-mm-dd') ";
            $where_new_time_query = " NEW_INSERT_TIME BETWEEN to_date('".$queryDateStart."','yyyy-mm-dd') AND to_date('".$queryDateEnd."','yyyy-mm-dd')  AND OLD_INSERT_TIME = NEW_INSERT_TIME ";
            $where_bulu = $where_OLD_time_query;
            $tc_time_where = " AND DATE_FORMAT(bt.last_updated,'%Y-%m-%d') BETWEEN DATE_FORMAT('".$queryDateStart."','%Y-%m-%d') AND DATE_FORMAT('".$queryDateEnd."','%Y-%m-%d')";
        }else{
            $where_OLD_time_query = " OLD_INSERT_TIME = to_date('".$queryDate."','yyyy-mm-dd') ";
            $where_new_time_query = " NEW_INSERT_TIME = to_date('".$queryDate."','yyyy-mm-dd') AND OLD_INSERT_TIME = NEW_INSERT_TIME ";
            $where_bulu = " NEW_INSERT_TIME = to_date('".$queryDate."','yyyy-mm-dd') ";
            $tc_time_where = " AND DATE_FORMAT(bt.last_updated,'%Y-%m-%d') = DATE_FORMAT('".$queryDate."','%Y-%m-%d') ";
        }
        if(empty($queryDate)&&strcmp($queryType,"1")==0){
            $queryDate = date('yyyy-mm-dd',time());
            $where_OLD_time_query = " 1=1 ";
            $where_new_time_query = " 1=1 AND OLD_INSERT_TIME = NEW_INSERT_TIME ";
            $where_bulu = " 1=1 ";
            $tc_time_where = " ";
        }
        $org = $method->getDictArry();
        $userDire =  $method->getUserDictArray();
        for($i = 0;$i<sizeof($org);$i++){
            $result[$i]['org'] = $org[$i];
        }
        //中间数据计算
        $temp[][] = 0;
        $result[$fenOrganfh][] = 0;
        $result[$zuoYeZhongXin][] = 0;
        //连接数据库
        $conn = $method->OracleOldDBCon();
        //保全契约通用数据查询条件
        #################################################################   契约出单前撤保  ######################################################################
        #012 契约出单前撤保老核心当天
        $nb_where_old_time  = "SELECT OLD_USER_NAME,count(*) AS NUM FROM TMP_BX_OLD_CDQCB where ".$where_OLD_time_query." GROUP BY OLD_USER_NAME";
        $result_rows = oci_parse($conn, $nb_where_old_time); // 配置SQL语句，执行SQL
        $nb_result_old_time = $method->search_long($result_rows);

        #013 契约出单前撤保新老核心当天
        $nb_where_new_old_time  = "SELECT OLD_USER_NAME,count(*) AS NUM FROM TMP_BX_OLD_CDQCB where ".$where_OLD_time_query." and ".$where_new_time_query." GROUP BY OLD_USER_NAME";
        $result_rows = oci_parse($conn, $nb_where_new_old_time); // 配置SQL语句，执行SQL
        $nb_result_new_old_time = $method->search_long($result_rows);

        #013+ 契约出单前撤保新老核心当天
        $nb_where_new_old_time  = "SELECT OLD_USER_NAME,count(*) AS NUM FROM TMP_BX_OLD_CDQCB where ".$where_OLD_time_query." and NEW_INSERT_TIME IS NULL GROUP BY OLD_USER_NAME";
        $result_rows = oci_parse($conn, $nb_where_new_old_time); // 配置SQL语句，执行SQL
        $nb_result_old_time_no_new = $method->search_long($result_rows);

        #014 契约出单前撤保老核心当天<>新核心,且新核心不为空
        $nb_where_new_no_old_time  = "SELECT OLD_USER_NAME,count(*) AS NUM FROM TMP_BX_OLD_CDQCB where ".$where_bulu." and NEW_INSERT_TIME <> OLD_INSERT_TIME and NEW_INSERT_TIME IS NOT NULL GROUP BY OLD_USER_NAME";
        $result_rows = oci_parse($conn, $nb_where_new_no_old_time); // 配置SQL语句，执行SQL
        $nb_result_new_no_old_time = $method->search_long($result_rows);

//        #004 保全受理老核心当天且新核心为空
//        $where_new_null  = "SELECT user_name,count(*) AS NUM FROM TMP_NCS_QD_BX_BQSL_BD where ".$where_OLD_time_query." and NEW_INSERT_TIME IS NULL GROUP BY USER_NAME";
//        $result_rows = oci_parse($conn, $where_new_null); // 配置SQL语句，执行SQL
//        $result_new_null = $this->search_long($result_rows);

        #015 契约出单前撤保老核心当天且TC不为空
        $nb_where_tc_no_null  = "SELECT OLD_USER_NAME,count(*) AS NUM FROM TMP_BX_OLD_CDQCB where ".$where_OLD_time_query." and TC_ID IS NOT NULL GROUP BY OLD_USER_NAME";
        $result_rows = oci_parse($conn, $nb_where_tc_no_null); // 配置SQL语句，执行SQL
        $nb_result_tc_no_null = $method->search_long($result_rows);

        #016 契约新老核心保额一致数量
        $nb_where_new_old_amount  = "SELECT OLD_USER_NAME,count(*) AS NUM FROM TMP_BX_OLD_CDQCB where ".$where_OLD_time_query." and ".$where_new_time_query." and abs(OLD_AMNT-NEW_AMNT)<=0.01 GROUP BY OLD_USER_NAME";
        $result_rows = oci_parse($conn, $nb_where_new_old_amount); // 配置SQL语句，执行SQL
        $nb_result_new_old_amount = $method->search_long($result_rows);

        #017 契约新老核心保费一致数量
        $nb_where_new_old_fee  = "SELECT OLD_USER_NAME,count(*) AS NUM FROM TMP_BX_OLD_CDQCB where ".$where_OLD_time_query." and ".$where_new_time_query." and abs(OLD_PREM-NEW_PREM)<=0.01 GROUP BY OLD_USER_NAME";
        $result_rows = oci_parse($conn, $nb_where_new_old_fee); // 配置SQL语句，执行SQL
        $nb_result_new_old_fee = $method->search_long($result_rows);

        #018 契约老核心异地作业分李沧
        $nb_where_old_noqd  = "SELECT OLD_ORGAN_CODE,NEW_ORGAN_CODE,NEW_INSERT_TIME,OLD_INSERT_TIME,TC_ID,OLD_AMNT,NEW_AMNT,OLD_PREM,NEW_PREM FROM TMP_BX_OLD_CDQCB where ".$where_OLD_time_query."and OLD_ORGAN_CODE NOT LIKE '8647%'";
        $result_rows = oci_parse($conn, $nb_where_old_noqd); // 配置SQL语句，执行SQL
        $nb_result_old_noqd = $method->search_long($result_rows);
        //契约数据赋值
        for($i = 0;$i<sizeof($org);$i++){
            $result[$i]['nb_old_count'] =0;
            $result[$i]['nb_new_count'] =0;
            $result[$i]['nb_cannt_count'] =0;
            $result[$i]['nb_fix_count'] =0;//补录
            $result[$i]['nb_pro_count'] =0;
            $result[$i]['nb_profix_count'] =0;
            $result[$i]['nb_besame_count'] =0;//保额
            $result[$i]['nb_bfsame_count'] =0;
            #012
            foreach ($nb_result_old_time as &$value) {
                if(strcmp($userDire[$value['OLD_USER_NAME']],$org[$i])==0&&!empty($userDire[$value['OLD_USER_NAME']])){
                    $result[$i]['nb_old_count'] += (int)($value['NUM']);
                    $temp[$xiaoji]['nb_old_count'] += (int)($value['NUM']);
                }
            }
            #013
            foreach ($nb_result_new_old_time as &$value) {
                if(strcmp($userDire[$value['OLD_USER_NAME']],$org[$i])==0&&!empty($userDire[$value['OLD_USER_NAME']])){
                    $result[$i]['nb_new_count'] += (int)$value['NUM'];
                    $temp[$xiaoji]['nb_new_count'] += (int)$value['NUM'];
                }
            }
            #013+
            foreach ($nb_result_old_time_no_new as &$value) {
                if(strcmp($userDire[$value['OLD_USER_NAME']],$org[$i])==0&&!empty($userDire[$value['OLD_USER_NAME']])){
                    $result[$i]['nb_cannt_count'] += (int)$value['NUM'];
                    $temp[$xiaoji]['nb_cannt_count'] += (int)$value['NUM'];
                }
            }
            #014
            foreach ($nb_result_new_no_old_time as &$value) {
                if(strcmp($userDire[$value['OLD_USER_NAME']],$org[$i])==0&&!empty($userDire[$value['OLD_USER_NAME']])){
                    $result[$i]['nb_fix_count'] += (int)$value['NUM'];
                    $temp[$xiaoji]['nb_fix_count'] += (int)$value['NUM'];
                }
            }
            #015
            foreach ($nb_result_tc_no_null as &$value) {
                if(strcmp($userDire[$value['OLD_USER_NAME']],$org[$i])==0&&!empty($userDire[$value['OLD_USER_NAME']])){
                    $result[$i]['nb_pro_count'] += (int)$value['NUM'];
                    $temp[$xiaoji]['nb_pro_count'] += (int)$value['NUM'];
                }
            }
            #016
            foreach ($nb_result_new_old_amount as &$value) {
                if(strcmp($userDire[$value['OLD_USER_NAME']],$org[$i])==0&&!empty($userDire[$value['OLD_USER_NAME']])){
                    $result[$i]['nb_besame_count'] += (int)$value['NUM'];
                    $temp[$xiaoji]['nb_besame_count'] += (int)$value['NUM'];
                }
            }
            #017
            foreach ($nb_result_new_old_fee as &$value) {
                if(strcmp($userDire[$value['OLD_USER_NAME']],$org[$i])==0&&!empty($userDire[$value['OLD_USER_NAME']])){
                    $result[$i]['nb_bfsame_count'] += (int)$value['NUM'];
                    $temp[$xiaoji]['nb_bfsame_count'] += (int)$value['NUM'];
                }
            }
        }
        #018 异地作业单独处理
        $result[$licang]["nb_old_count"] += sizeof($nb_result_old_noqd);
        $temp[$xiaoji]["nb_old_count"] += sizeof($nb_result_old_noqd);
        $jishu_no_new = 0;
        foreach ($nb_result_old_noqd as &$value) {
//            $result[$licang]["nb_old_count"]++;
//            $temp[$xiaoji]["nb_old_count"]++;
            if(!empty($value["NEW_INSERT_TIME"])){
                $result[$licang]["nb_new_count"] ++;
                $temp[$xiaoji]['nb_new_count'] ++;
                $jishu_no_new++;
            }
            if($value["NEW_INSERT_TIME"]!=$value["OLD_INSERT_TIME"]){
                $result[$licang]["nb_fix_count"] ++;
                $temp[$xiaoji]['nb_fix_count'] ++;
            }
            if(!empty($value["TC_ID"])){
                $result[$licang]["nb_pro_count"] ++;
                $temp[$xiaoji]['nb_pro_count'] ++;
            }
            if(abs((float)$value["OLD_AMNT"]-(float)$value["NEW_AMNT"])<=0.01){
                $result[$licang]["nb_besame_count"] ++;
                $temp[$xiaoji]['nb_besame_count'] ++;
            }
            if(abs((float)$value["OLD_PREM"]-(float)$value["NEW_PREM"])<=0.01){
                $result[$licang]["nb_bfsame_count"] ++;
                $temp[$xiaoji]['nb_bfsame_count'] ++;
            }
        }
        $nb_cannt_count = sizeof($nb_result_old_noqd) - $jishu_no_new;
        $temp[$xiaoji]["nb_cannt_count"] += $nb_cannt_count;
        $result[$licang]["nb_cannt_count"] += $nb_cannt_count;

        #######################################################################################################################################

        #################################################################  核保  ######################################################################
        $temp[$heji][] = 0;
        #019 核保老核心当天
        $uw_where_old_time  = "SELECT OLD_USER_NAME,count(*) AS NUM FROM TMP_UW_LIST where ".$where_OLD_time_query." GROUP BY OLD_USER_NAME";
        $result_rows = oci_parse($conn, $uw_where_old_time); // 配置SQL语句，执行SQL
        $uw_result_old_time = $method->search_long($result_rows);

        #020 核保新老核心当天
        $uw_where_new_old_time  = "SELECT OLD_USER_NAME,count(*) AS NUM FROM TMP_UW_LIST where ".$where_OLD_time_query." and ".$where_new_time_query."  GROUP BY OLD_USER_NAME";
        $result_rows = oci_parse($conn, $uw_where_new_old_time); // 配置SQL语句，执行SQL
        $uw_result_new_old_time = $method->search_long($result_rows);

        #020+ 核保新老核心当天
        $uw_where_new_old_time  = "SELECT OLD_USER_NAME,count(*) AS NUM FROM TMP_UW_LIST where ".$where_OLD_time_query." and NEW_INSERT_TIME IS NULL  GROUP BY OLD_USER_NAME";
        $result_rows = oci_parse($conn, $uw_where_new_old_time); // 配置SQL语句，执行SQL
        $uw_result_old_time_no_new = $method->search_long($result_rows);

        #021 核保老核心当天<>新核心,且新核心不为空
        $uw_where_new_no_old_time  = "SELECT OLD_USER_NAME,count(*) AS NUM FROM TMP_UW_LIST where ".$where_bulu." and NEW_INSERT_TIME <> OLD_INSERT_TIME and NEW_INSERT_TIME IS NOT NULL GROUP BY OLD_USER_NAME";
        $result_rows = oci_parse($conn, $uw_where_new_no_old_time); // 配置SQL语句，执行SQL
        $uw_result_new_no_old_time = $method->search_long($result_rows);

        #022 核保老核心当天且TC不为空
        $uw_where_tc_no_null  = "SELECT OLD_USER_NAME,count(*) AS NUM FROM TMP_UW_LIST where ".$where_OLD_time_query." and TC_ID IS NOT NULL GROUP BY OLD_USER_NAME";
        $result_rows = oci_parse($conn, $uw_where_tc_no_null); // 配置SQL语句，执行SQL
        $uw_result_tc_no_null = $method->search_long($result_rows);

        $zuoyezhongxin_uw = array("gaoyy6","maj","rentw","xielc1","xiangzs","xubo4","zhangchuo1","zhys");
        #019 核保老核心
        foreach ($uw_result_old_time as &$value) {
            if(in_array($value['OLD_USER_NAME'],$zuoyezhongxin_uw)){
                $result[$zuoYeZhongXin]['nb_old_count'] += (int)$value['NUM'];
            }else{
                $result[$uw_fengongsi]['nb_old_count'] += (int)$value['NUM'];
            }
        }
        #020 核保新老核心
        foreach ($uw_result_new_old_time as &$value) {
            //核保与复核审核不一样，以作业中心的人员作为筛选的，不是分公司
            if(in_array($value['OLD_USER_NAME'],$zuoyezhongxin_uw)){
                $result[$zuoYeZhongXin]['nb_new_count'] += (int)$value['NUM'];
            }else{
                $result[$uw_fengongsi]['nb_new_count'] += (int)$value['NUM'];
            }
        }
        #020+ 核保新老核心
        $result[$uw_fengongsi]['nb_cannt_count'] += sizeof($uw_result_old_time_no_new);

        #021 核保补录
        foreach ($uw_result_new_no_old_time as &$value) {
            if(in_array($value['OLD_USER_NAME'],$zuoyezhongxin_uw)){
                $result[$zuoYeZhongXin]['nb_fix_count'] += (int)$value['NUM'];
            }else{
                $result[$uw_fengongsi]['nb_fix_count'] += (int)$value['NUM'];
            }
        }
        #022 核保问题单
        foreach ($uw_result_tc_no_null as &$value) {
            if(in_array($value['OLD_USER_NAME'],$zuoyezhongxin_uw)){
                $result[$zuoYeZhongXin]['nb_pro_count'] += (int)$value['NUM'];
            }else{
                $result[$uw_fengongsi]['nb_pro_count'] += (int)$value['NUM'];
            }
        }
        $temp[$heji]['nb_old_count'] = $temp[$xiaoji]['nb_old_count'] + $result[$uw_fengongsi]['nb_old_count'] + $result[$zuoYeZhongXin]['nb_old_count'];
        $temp[$heji]['nb_new_count'] = $temp[$xiaoji]['nb_new_count'] + $result[$uw_fengongsi]['nb_new_count'] + $result[$zuoYeZhongXin]['nb_new_count'];
        $temp[$heji]['nb_fix_count'] = $temp[$xiaoji]['nb_fix_count'] + $result[$uw_fengongsi]['nb_fix_count'] + $result[$zuoYeZhongXin]['nb_fix_count'];
        $temp[$heji]['nb_pro_count'] = $temp[$xiaoji]['nb_pro_count'] + $result[$uw_fengongsi]['nb_pro_count'] + $result[$zuoYeZhongXin]['nb_pro_count'];
        $result[$uw_fengongsi]['nb_besame_count'] = $result[$uw_fengongsi]['nb_new_count'];
        $result[$uw_fengongsi]['nb_bfsame_count'] = $result[$uw_fengongsi]['nb_new_count'];
        $result[$zuoYeZhongXin]['nb_besame_count'] = $result[$zuoYeZhongXin]['nb_new_count'];
        $result[$zuoYeZhongXin]['nb_bfsame_count'] = $result[$zuoYeZhongXin]['nb_new_count'];
        $temp[$heji]['nb_besame_count'] = $temp[$xiaoji]['nb_besame_count'] + $result[$uw_fengongsi]['nb_besame_count'] + $result[$zuoYeZhongXin]['nb_besame_count'];
        $temp[$heji]['nb_bfsame_count'] = $temp[$xiaoji]['nb_bfsame_count'] + $result[$uw_fengongsi]['nb_bfsame_count'] + $result[$zuoYeZhongXin]['nb_bfsame_count'];
        $temp[$heji]['nb_cannt_count'] = $temp[$xiaoji]['nb_cannt_count'] + $result[$uw_fengongsi]['nb_cannt_count'];

        #######################################################################################################################################


        #################################################################   保全受理  ######################################################################
        //保全数据查询
//        $where_OLD_time_query = "OLD_INSERT_TIME = to_date('".$queryDate."','yyyy-mm-dd')";
//        $where_new_time_query = "NEW_INSERT_TIME = to_date('".$queryDate."','yyyy-mm-dd') ";
        #001 保全受理老核心当天
        $where_old_time  = "SELECT USER_NAME,count(*) AS NUM FROM TMP_NCS_QD_BX_BQSL_BD where ".$where_OLD_time_query." GROUP BY USER_NAME ORDER BY USER_NAME";
        $result_rows = oci_parse($conn, $where_old_time); // 配置SQL语句，执行SQL
        $result_old_time = $method->search_long($result_rows);

        #002 保全受理新老核心当天
        $where_new_old_time  = "SELECT user_name,count(*) AS NUM FROM TMP_NCS_QD_BX_BQSL_BD where ".$where_OLD_time_query." and ".$where_new_time_query."  GROUP BY USER_NAME";
        $result_rows = oci_parse($conn, $where_new_old_time); // 配置SQL语句，执行SQL
        $result_new_old_time = $method->search_long($result_rows);

        #002+ 保全受理新老核心当天
        $where_new_old_time  = "SELECT user_name,count(*) AS NUM FROM TMP_NCS_QD_BX_BQSL_BD where ".$where_OLD_time_query." and NEW_INSERT_TIME IS NULL  GROUP BY USER_NAME";
        $result_rows = oci_parse($conn, $where_new_old_time); // 配置SQL语句，执行SQL
        $result_old_time_no_new = $method->search_long($result_rows);

        #003 保全受理老核心当天<>新核心,且新核心不为空
        $where_new_no_old_time  = "SELECT user_name,count(*) AS NUM FROM TMP_NCS_QD_BX_BQSL_BD where ".$where_bulu." and NEW_INSERT_TIME <> OLD_INSERT_TIME and NEW_INSERT_TIME IS NOT NULL GROUP BY USER_NAME";
        $result_rows = oci_parse($conn, $where_new_no_old_time); // 配置SQL语句，执行SQL
        $result_new_no_old_time = $method->search_long($result_rows);

        #004 保全受理老核心当天且新核心为空
        $where_new_null  = "SELECT user_name,count(*) AS NUM FROM TMP_NCS_QD_BX_BQSL_BD where ".$where_OLD_time_query." and NEW_INSERT_TIME IS NULL GROUP BY USER_NAME";
        $result_rows = oci_parse($conn, $where_new_null); // 配置SQL语句，执行SQL
        $result_new_null = $method->search_long($result_rows);

        #005 保全受理老核心当天且TC不为空
        $where_tc_no_null  = "SELECT user_name,count(*) AS NUM FROM TMP_NCS_QD_BX_BQSL_BD where ".$where_OLD_time_query." and TC_ID IS NOT NULL GROUP BY USER_NAME";
        $result_rows = oci_parse($conn, $where_tc_no_null); // 配置SQL语句，执行SQL
        $result_tc_no_null = $method->search_long($result_rows);

        #006 保全受理新老核心金额一致数量
        $where_new_old_money  = "SELECT user_name,count(*) AS NUM FROM TMP_NCS_QD_BX_BQSL_BD where ".$where_OLD_time_query." and ".$where_new_time_query."and abs(NEW_GET_MONEY-OLD_GET_MONEY)<=0.01 GROUP BY USER_NAME";
        $result_rows = oci_parse($conn, $where_new_old_money); // 配置SQL语句，执行SQL
        $result_new_old_money = $method->search_long($result_rows);

        #011 保全受理老核心异地作业分李沧
        $where_old_noqd  = "SELECT OLD_ORGAN_CODE,NEW_ORGAN_CODE,NEW_INSERT_TIME,OLD_INSERT_TIME,TC_ID,OLD_GET_MONEY,NEW_GET_MONEY FROM TMP_NCS_QD_BX_BQSL_BD where ".$where_OLD_time_query."and OLD_ORGAN_CODE NOT LIKE '8647%'";
        $result_rows = oci_parse($conn, $where_old_noqd); // 配置SQL语句，执行SQL
        //封装函数
        $result_old_noqd = $method->search_long($result_rows);

        //保全数据赋值
        for($i = 0;$i<sizeof($org);$i++){//分支机构
            $result[$i]['cs_old_count'] =0;//老核心当天插入
            $result[$i]['cs_new_count'] =0;//老核心新核心当天插入
            $result[$i]['cs_cannt_count'] =0;//老核心当天插入新核心无插入日期
            $result[$i]['cs_fix_count'] =0;//老核心当天插入，新核心非当天插入
            $result[$i]['cs_pro_count'] =0;//老核心当天插入，TC不为空
            $result[$i]['cs_profix_count'] =0;//当天插入，TC状态为已关闭，分机构TC数据库直接获取
            $result[$i]['cs_fysame_count'] =0;//新老核心均为当天且金额一致
            //除小计之外单个计算，小计通过计数累加
            #001
            foreach ($result_old_time as &$value) {
                if(strcmp($userDire[$value['USER_NAME']],$org[$i])==0&&!empty($userDire[$value['USER_NAME']])){
                    $result[$i]['cs_old_count'] += (int)($value['NUM']);
                    $temp[$xiaoji]['cs_old_count'] += (int)($value['NUM']);
                }
            }
            #002
            foreach ($result_new_old_time as &$value) {
                if(strcmp($userDire[$value['USER_NAME']],$org[$i])==0&&!empty($userDire[$value['USER_NAME']])){
                    $result[$i]['cs_new_count'] += (int)$value['NUM'];
                    $temp[$xiaoji]['cs_new_count'] += (int)$value['NUM'];
                }
            }
            #002+
            foreach ($result_old_time_no_new as &$value) {
                if(strcmp($userDire[$value['USER_NAME']],$org[$i])==0&&!empty($userDire[$value['USER_NAME']])){
                    $result[$i]['cs_cannt_count'] += (int)$value['NUM'];
                    $temp[$xiaoji]['cs_cannt_count'] += (int)$value['NUM'];
                }
            }
            #003
            foreach ($result_new_no_old_time as &$value) {
                if(strcmp($userDire[$value['USER_NAME']],$org[$i])==0&&!empty($userDire[$value['USER_NAME']])){
                    $result[$i]['cs_fix_count'] += (int)$value['NUM'];
                    $temp[$xiaoji]['cs_fix_count'] += (int)$value['NUM'];
                }
            }
            #005
            foreach ($result_tc_no_null as &$value) {
                if(strcmp($userDire[$value['USER_NAME']],$org[$i])==0&&!empty($userDire[$value['USER_NAME']])){
                    $result[$i]['cs_pro_count'] += (int)$value['NUM'];
                    $temp[$xiaoji]['cs_pro_count'] += (int)$value['NUM'];
                }
            }
            #TC数据库待定-问题单解决数量
            #006
            foreach ($result_new_old_money as &$value) {
                if(strcmp($userDire[$value['USER_NAME']],$org[$i])==0&&!empty($userDire[$value['USER_NAME']])){
                    $result[$i]['cs_fysame_count'] += (int)$value['NUM'];
                    $temp[$xiaoji]['cs_fysame_count'] +=(int)$value['NUM'];
                }
            }
        }
        #011 异地作业单独处理
        $result[$licang]["cs_old_count"] += sizeof($result_old_noqd);
        $temp[$xiaoji]["cs_old_count"] += sizeof($result_old_noqd);
        $jishu_no_new = 0;
        foreach ($result_old_noqd as &$value) {
            if(!empty($value["NEW_ORGAN_CODE"])){
                $result[$licang]["cs_new_count"] ++;
                $temp[$xiaoji]['cs_new_count'] ++;
                $jishu_no_new++;
            }
            if($value["NEW_INSERT_TIME"]!=$value["OLD_INSERT_TIME"]){
                $result[$licang]["cs_fix_count"] ++;
                $temp[$xiaoji]['cs_fix_count'] ++;
            }
            if(!empty($value["TC_ID"])){
                $result[$licang]["cs_pro_count"] ++;
                $temp[$xiaoji]['cs_pro_count'] ++;
            }
            if(abs((float)$value["OLD_GET_MONEY"]-(float)$value["NEW_GET_MONEY"])<=0.01){
                $result[$licang]["cs_fysame_count"] ++;
                $temp[$xiaoji]['cs_fysame_count'] ++;
            }
        }
        $cs_cannt_count = sizeof($result_old_noqd)-$jishu_no_new;
        $result[$licang]["cs_cannt_count"] += $cs_cannt_count;
        $temp[$xiaoji]['cs_cannt_count'] += $cs_cannt_count;
        #######################################################################################################################################

        #################################################################   保全复核  ######################################################################
        //保全数据查询
//        $where_OLD_time_query = "OLD_INSERT_TIME = to_date('".$queryDate."','yyyy-mm-dd')";
//        $where_new_time_query = "NEW_INSERT_TIME = to_date('".$queryDate."','yyyy-mm-dd') ";
        $fuhe_user = $method->getFuheUser();

        #007 保全复核老核心当天
        $where_old_time_fh  = "SELECT NEW_USER_NAME,COUNT(*) AS NUM FROM TMP_NCS_QD_BX_BQFH_BD WHERE ".$where_OLD_time_query." GROUP BY NEW_USER_NAME";
        $result_rows_fh = oci_parse($conn, $where_old_time_fh); // 配置SQL语句，执行SQL
        $result_old_time_fh = $method->search_long($result_rows_fh);

        #008 保全复核新老核心当天
        $where_new_old_time_fh  = "SELECT NEW_USER_NAME,COUNT(*) AS NUM FROM TMP_NCS_QD_BX_BQFH_BD WHERE ".$where_OLD_time_query." and ".$where_new_time_query."  GROUP BY NEW_USER_NAME";
        $result_rows_fh = oci_parse($conn, $where_new_old_time_fh); // 配置SQL语句，执行SQL
        $result_new_old_time_fh = $method->search_long($result_rows_fh);

        #008+ 保全复核新老核心当天
        $where_new_old_time_fh  = "SELECT COUNT(*) AS NUM FROM TMP_NCS_QD_BX_BQFH_BD WHERE ".$where_OLD_time_query." and NEW_INSERT_TIME IS NULL  GROUP BY NEW_USER_NAME";
        $result_rows_fh = oci_parse($conn, $where_new_old_time_fh); // 配置SQL语句，执行SQL
        $result_old_time_fh_no_new = $method->search_long($result_rows_fh);

        #009 保全复核老核心当天<>新核心,且新核心不为空
        $where_new_no_old_time_fh  = "SELECT NEW_USER_NAME,COUNT(*) AS NUM FROM TMP_NCS_QD_BX_BQFH_BD WHERE ".$where_bulu." and NEW_INSERT_TIME <> OLD_INSERT_TIME and NEW_INSERT_TIME IS NOT NULL GROUP BY NEW_USER_NAME";
        $result_rows_fh = oci_parse($conn, $where_new_no_old_time_fh); // 配置SQL语句，执行SQL
        $result_new_no_old_time_fh = $method->search_long($result_rows_fh);

        #010 保全受理老核心当天且TC不为空
        $where_tc_no_null_fh  = "SELECT OLD_ORGAN_CODE,COUNT(*) AS NUM FROM TMP_NCS_QD_BX_BQFH_BD WHERE ".$where_OLD_time_query." and TC_ID IS NOT NULL GROUP BY OLD_ORGAN_CODE";
        $result_rows_fh = oci_parse($conn, $where_tc_no_null_fh); // 配置SQL语句，执行SQL
        $result_tc_no_null_fh = $method->search_long($result_rows_fh);

        //保全数据赋值
        #007
        #老核心复核数量一新核心为准进行计算
        foreach ($result_old_time_fh as &$value) {
//                strcmp($value['NEW_USER_NAME'],$userOne)==0||strcmp($value['NEW_USER_NAME'],$userTwo)==0
            if(in_array($value['NEW_USER_NAME'],$fuhe_user)||empty($value['NEW_USER_NAME'])){
                $result[$fenOrganfh]['cs_old_count'] += (int)($value['NUM']);
            }else{
                $result[$zuoYeZhongXin]['cs_old_count'] += (int)($value['NUM']);
            }
        }
        $temp[$heji]['cs_old_count'] += $temp[$xiaoji]['cs_old_count'] + $result[$zuoYeZhongXin]['cs_old_count'] + $result[$fenOrganfh]['cs_old_count'];
        #008
        foreach ($result_new_old_time_fh as &$value) {
            if(in_array($value['NEW_USER_NAME'],$fuhe_user)||empty($value['NEW_USER_NAME'])){
                $result[$fenOrganfh]['cs_new_count'] += (int)($value['NUM']);
                $result[$fenOrganfh]['cs_fysame_count'] += (int)($value['NUM']);
            }else{
                $result[$zuoYeZhongXin]['cs_new_count'] += (int)($value['NUM']);
                $result[$zuoYeZhongXin]['cs_fysame_count'] += (int)($value['NUM']);
            }
        }
        $temp[$heji]['cs_fysame_count'] += $temp[$xiaoji]['cs_fysame_count'] + $result[$zuoYeZhongXin]['cs_fysame_count'] + $result[$fenOrganfh]['cs_fysame_count'];
        $temp[$heji]['cs_new_count'] += $temp[$xiaoji]['cs_new_count'] + $result[$zuoYeZhongXin]['cs_new_count'] + $result[$fenOrganfh]['cs_new_count'];

        #008+
        $result[$fenOrganfh]['cs_cannt_count'] += (int)($result_old_time_fh_no_new[0]['NUM']);
        $temp[$heji]['cs_cannt_count'] = $temp[$xiaoji]['cs_cannt_count'] +  $result[$fenOrganfh]['cs_cannt_count'];

        #009
        foreach ($result_new_no_old_time_fh as &$value) {
            //新核心用户为空时表示无法操作计入分公司
            if(in_array($value['NEW_USER_NAME'],$fuhe_user)||empty($value['NEW_USER_NAME'])){
                $result[$fenOrganfh]['cs_fix_count'] += (int)($value['NUM']);
            }else{
                $result[$zuoYeZhongXin]['cs_fix_count'] += (int)($value['NUM']);
            }
        }
        $temp[$heji]['cs_fix_count'] += $temp[$xiaoji]['cs_fix_count'] + $result[$zuoYeZhongXin]['cs_fix_count'] + $result[$fenOrganfh]['cs_fix_count'];
        #010
        foreach ($result_tc_no_null_fh as &$value) {
            //作业中心不提交BUG
            $result[$fenOrganfh]['cs_pro_count'] += (int)($value['NUM']);
        }
        $temp[$heji]['cs_pro_count'] += $temp[$xiaoji]['cs_pro_count'] + $result[$fenOrganfh]['cs_pro_count'];
        #TC数据库待定-问题单解决数量
        #######################################################################################################################################

        #################################################################   理赔受理  ######################################################################
        //理赔数据查询
        $orgName = $method->getOrgName();
        #023 理赔受理老核心当天
        $clm_where_old_time  = "SELECT OLD_ORGAN_CODE,COUNT(*) AS NUM FROM TMP_NCS_QD_BX_LPBA_BD WHERE ".$where_OLD_time_query." GROUP BY OLD_ORGAN_CODE";
        $result_rows = oci_parse($conn, $clm_where_old_time); // 配置SQL语句，执行SQL
        $clm_result_old_time = $method->search_long($result_rows);

        #024 理赔受理新老核心当天
        $clm_where_new_old_time  = "SELECT OLD_ORGAN_CODE,COUNT(*) AS NUM FROM TMP_NCS_QD_BX_LPBA_BD WHERE ".$where_OLD_time_query." and ".$where_new_time_query."  GROUP BY OLD_ORGAN_CODE";
        $result_rows = oci_parse($conn, $clm_where_new_old_time); // 配置SQL语句，执行SQL
        $clm_result_new_old_time_fh = $method->search_long($result_rows);

        #024+ 理赔受理新老核心当天
        $clm_where_new_old_time  = "SELECT OLD_ORGAN_CODE,COUNT(*) AS NUM FROM TMP_NCS_QD_BX_LPBA_BD WHERE ".$where_OLD_time_query." and NEW_INSERT_TIME IS NULL  GROUP BY OLD_ORGAN_CODE";
        $result_rows = oci_parse($conn, $clm_where_new_old_time); // 配置SQL语句，执行SQL
        $clm_result_old_time_fh_no_time = $method->search_long($result_rows);

        #025 理赔受理老核心当天<>新核心,且新核心不为空
        $clm_where_new_no_old_time  = "SELECT OLD_ORGAN_CODE,COUNT(*) AS NUM FROM TMP_NCS_QD_BX_LPBA_BD WHERE ".$where_bulu." and NEW_INSERT_TIME <> OLD_INSERT_TIME and NEW_INSERT_TIME IS NOT NULL GROUP BY OLD_ORGAN_CODE";
        $result_rows = oci_parse($conn, $clm_where_new_no_old_time); // 配置SQL语句，执行SQL
        $clm_result_new_no_old_time = $method->search_long($result_rows);

        #026 理赔受理老核心当天且TC不为空
        $clm_where_tc_no_null  = "SELECT OLD_ORGAN_CODE,COUNT(*) AS NUM FROM TMP_NCS_QD_BX_LPBA_BD WHERE ".$where_OLD_time_query." and TC_ID IS NOT NULL GROUP BY OLD_ORGAN_CODE";
        $result_rows = oci_parse($conn, $clm_where_tc_no_null); // 配置SQL语句，执行SQL
        $clm_result_tc_no_null = $method->search_long($result_rows);

        #027 理赔受理赔付金额一致
        $clm_where_new_old_money  = "SELECT OLD_ORGAN_CODE,COUNT(*) AS NUM FROM TMP_NCS_QD_BX_LPBA_BD WHERE ".$where_OLD_time_query." and abs(OLD_GET_MONEY-NEW_GET_MONEY)<=0.01 GROUP BY OLD_ORGAN_CODE";
        $result_rows = oci_parse($conn, $clm_where_new_old_money); // 配置SQL语句，执行SQL
        $clm_result_new_old_money = $method->search_long($result_rows);

        #028 异地理赔受理
        $clm_where_old_noqd  = "SELECT OLD_ORGAN_CODE,NEW_ORGAN_CODE,NEW_INSERT_TIME,OLD_INSERT_TIME,TC_ID,OLD_GET_MONEY,NEW_GET_MONEY FROM TMP_NCS_QD_BX_LPBA_BD where ".$where_OLD_time_query."and OLD_ORGAN_CODE NOT LIKE '8647%'";
        $result_rows = oci_parse($conn, $clm_where_old_noqd); // 配置SQL语句，执行SQL
        //封装函数
        $clm_result_old_noqd = $method->search_long($result_rows);

        //理赔数据赋值
        for($i = 0;$i<sizeof($org);$i++){
            $result[$i]['clm_old_count'] =0;
            $result[$i]['clm_new_count'] =0;
            $result[$i]['clm_cannt_count'] =0;
            $result[$i]['clm_fix_count'] =0;
            $result[$i]['clm_pro_count'] =0;
            $result[$i]['clm_profix_count'] =0;
            $result[$i]['clm_fysame_count'] =0;
            #023
            foreach ($clm_result_old_time as &$value) {
                if(strcmp($orgName[$value['OLD_ORGAN_CODE']],$org[$i])==0&&!empty($orgName[$value['OLD_ORGAN_CODE']])){
                    $result[$i]['clm_old_count'] += (int)$value['NUM'];
                    $temp[$xiaoji]['clm_old_count'] += (int)$value['NUM'];
                }
            }
            #024
            foreach ($clm_result_new_old_time_fh as &$value) {
                if(strcmp($orgName[$value['OLD_ORGAN_CODE']],$org[$i])==0&&!empty($orgName[$value['OLD_ORGAN_CODE']])){
                    $result[$i]['clm_new_count'] += (int)$value['NUM'];
                    $temp[$xiaoji]['clm_new_count'] += (int)$value['NUM'];
                }
            }
            #024+
            foreach ($clm_result_old_time_fh_no_time as &$value) {
                if(strcmp($orgName[$value['OLD_ORGAN_CODE']],$org[$i])==0&&!empty($orgName[$value['OLD_ORGAN_CODE']])){
                    $result[$i]['clm_cannt_count'] += (int)$value['NUM'];
                    $temp[$xiaoji]['clm_cannt_count'] += (int)$value['NUM'];
                }
            }
            #025
            foreach ($clm_result_new_no_old_time as &$value) {
                if(strcmp($orgName[$value['OLD_ORGAN_CODE']],$org[$i])==0&&!empty($orgName[$value['OLD_ORGAN_CODE']])){
                    $result[$i]['clm_fix_count'] += (int)$value['NUM'];
                    $temp[$xiaoji]['clm_fix_count'] += (int)$value['NUM'];
                }
            }
            #026
            foreach ($clm_result_tc_no_null as &$value) {
                if(strcmp($orgName[$value['OLD_ORGAN_CODE']],$org[$i])==0&&!empty($orgName[$value['OLD_ORGAN_CODE']])){
                    $result[$i]['clm_pro_count'] += (int)$value['NUM'];
                    $temp[$xiaoji]['clm_pro_count'] += (int)$value['NUM'];
                }
            }
            #027
            foreach ($clm_result_new_old_money as &$value) {
                if(strcmp($orgName[$value['OLD_ORGAN_CODE']],$org[$i])==0&&!empty($orgName[$value['OLD_ORGAN_CODE']])){
                    $result[$i]['clm_fysame_count'] += (int)$value['NUM'];
                    $temp[$xiaoji]['clm_fysame_count'] += (int)$value['NUM'];
                }
            }
        }
        //默认不加载TC数据，通过申请队列加载

        #028 异地作业单独处理
        $result[$licang]["clm_old_count"] += sizeof($clm_result_old_noqd);
        $temp[$xiaoji]["clm_old_count"] += sizeof($clm_result_old_noqd);
        $jishu_no_new = 0;
        foreach ($clm_result_old_noqd as &$value) {
            if(!empty($value["NEW_ORGAN_CODE"])){
                $result[$licang]["clm_new_count"] ++;
                $temp[$xiaoji]['clm_new_count'] ++;
                $jishu_no_new++;
            }
            if($value["NEW_INSERT_TIME"]!=$value["OLD_INSERT_TIME"]){
                $result[$licang]["clm_fix_count"] ++;
                $temp[$xiaoji]['clm_fix_count'] ++;
            }
            if(!empty($value["TC_ID"])){
                $result[$licang]["clm_pro_count"] ++;
                $temp[$xiaoji]['clm_pro_count'] ++;
            }
            if(abs((float)$value["OLD_GET_MONEY"]-(float)$value["NEW_GET_MONEY"])<=0.01){
                $result[$licang]["clm_fysame_count"] ++;
                $temp[$xiaoji]['clm_fysame_count'] ++;
            }
        }
        $nb_cannt_count = sizeof($clm_result_old_noqd) - $jishu_no_new;
        $result[$licang]["clm_cannt_count"] += sizeof($clm_result_old_noqd);
        $temp[$xiaoji]["clm_cannt_count"] += sizeof($clm_result_old_noqd);

        #######################################################################################################################################


        #################################################################   理赔审批审核  ######################################################################
        //理赔数据查询
        $clm_user = $method->getClmUser();
        #029 理赔审批审核老核心当天
        $clm_where_old_time  = "SELECT NEW_USER_NAME,COUNT(*) AS NUM FROM TMP_NCS_QD_BX_LPSHSP_BD WHERE ".$where_OLD_time_query." GROUP BY NEW_USER_NAME";
        $result_rows = oci_parse($conn, $clm_where_old_time); // 配置SQL语句，执行SQL
        $clm_result_old_time = $method->search_long($result_rows);

        #030 理赔审批审核老核心当天
        $clm_where_old_time_num  = "SELECT OLD_ORGAN_CODE,COUNT(*) AS NUM FROM TMP_NCS_QD_BX_LPSHSP_BD WHERE ".$where_OLD_time_query." GROUP BY OLD_ORGAN_CODE";
        $result_rows = oci_parse($conn, $clm_where_old_time_num); // 配置SQL语句，执行SQL
        $clm_result_old_time_num = $method->search_long($result_rows);

        #030+ 理赔审批审核老核心当天
        $clm_where_old_time_num  = "SELECT COUNT(*) AS NUM FROM TMP_NCS_QD_BX_LPSHSP_BD WHERE ".$where_OLD_time_query." and NEW_INSERT_TIME IS NULL GROUP BY OLD_ORGAN_CODE";
        $result_rows = oci_parse($conn, $clm_where_old_time_num); // 配置SQL语句，执行SQL
        $clm_result_old_time_num_no_new = $method->search_long($result_rows);

        #031 理赔审批审核老核心当天<>新核心,且新核心不为空
        $clm_where_new_no_old_time  = "SELECT NEW_USER_NAME,COUNT(*) AS NUM FROM TMP_NCS_QD_BX_LPSHSP_BD WHERE ".$where_bulu." and TO_DATE(NEW_INSERT_TIME,'YYYY-MM-DD') <> TO_DATE(OLD_INSERT_TIME,'YYYY-MM-DD') and NEW_INSERT_TIME IS NOT NULL GROUP BY NEW_USER_NAME";
        $result_rows = oci_parse($conn, $clm_where_new_no_old_time); // 配置SQL语句，执行SQL
        $clm_result_new_no_old_time = $method->search_long($result_rows);

        #032 理赔审批审核老核心当天且TC不为空
        $clm_where_tc_no_null  = "SELECT NEW_USER_NAME,COUNT(*) AS NUM FROM TMP_NCS_QD_BX_LPSHSP_BD WHERE ".$where_OLD_time_query." and TC_ID IS NOT NULL GROUP BY NEW_USER_NAME";
        $result_rows = oci_parse($conn, $clm_where_tc_no_null); // 配置SQL语句，执行SQL
        $clm_result_tc_no_null = $method->search_long($result_rows);

        #029-030 核保新老核心
        foreach ($clm_result_old_time as &$value) {
            if(in_array($value['NEW_USER_NAME'],$clm_user)){
                $result[$fenOrganfh]['clm_new_count'] += (int)$value['NUM'];
            }else{
                $result[$zuoYeZhongXin]['clm_new_count'] += (int)$value['NUM'];
            }
        }
        $result[$zuoYeZhongXin]['clm_old_count'] = $result[$zuoYeZhongXin]['clm_new_count'];
        $clm_num = 0;
        foreach ($clm_result_old_time_num as &$value) {
            $clm_num += (int)$value['NUM'];
        }
        $result[$fenOrganfh]['clm_old_count'] = $clm_num-$result[$zuoYeZhongXin]['clm_old_count'];
        //无法操作
        $result[$fenOrganfh]['clm_cannt_count'] += sizeof($clm_result_old_time_num_no_new);
        $result[$heji]['clm_cannt_count'] = $result[$xiaoji]['clm_cannt_count']+sizeof($clm_result_old_time_num_no_new);

        #031 理赔审核审批补录
        foreach ($clm_result_new_no_old_time as &$value) {
            if(in_array($value['NEW_USER_NAME'],$clm_user)||empty($value['NEW_USER_NAME'])){
                $result[$fenOrganfh]['clm_fix_count'] += (int)$value['NUM'];
            }else{
                $result[$zuoYeZhongXin]['clm_fix_count'] += (int)$value['NUM'];
            }
        }
        #032 理赔审核审批问题单
        foreach ($clm_result_tc_no_null as &$value) {
            $result[$fenOrganfh]['clm_pro_count'] += (int)$value['NUM'];
//            if(in_array($value['NEW_USER_NAME'],$clm_user)){
//                $result[$fenOrganfh]['clm_pro_count'] += (int)$value['NUM'];
//            }else{
//                $result[$zuoYeZhongXin]['clm_pro_count'] += (int)$value['NUM'];
//            }
        }
        $temp[$heji]['clm_old_count'] = $temp[$xiaoji]['clm_old_count'] + $result[$fenOrganfh]['clm_old_count'] + $result[$zuoYeZhongXin]['clm_old_count'];
        $temp[$heji]['clm_new_count'] = $temp[$xiaoji]['clm_new_count'] + $result[$fenOrganfh]['clm_new_count'] + $result[$zuoYeZhongXin]['clm_new_count'];
        $temp[$heji]['clm_fix_count'] = $temp[$xiaoji]['clm_fix_count'] + $result[$fenOrganfh]['clm_fix_count'] + $result[$zuoYeZhongXin]['clm_fix_count'];
        $temp[$heji]['clm_pro_count'] = $temp[$xiaoji]['clm_pro_count'] + $result[$fenOrganfh]['clm_pro_count'] + $result[$zuoYeZhongXin]['clm_pro_count'];
        $result[$zuoYeZhongXin]['clm_fysame_count'] = $result[$zuoYeZhongXin]['clm_new_count'];
        $result[$fenOrganfh]['clm_fysame_count'] = $result[$fenOrganfh]['clm_new_count'];
        $temp[$heji]['clm_fysame_count'] = $temp[$xiaoji]['clm_fysame_count'] + $result[$fenOrganfh]['clm_fysame_count'] + $result[$zuoYeZhongXin]['clm_fysame_count'];
        #######################################################################################################################################

        #################################################################   TC当日问题单解决数量  ######################################################################
        $tc_cursor = M();
        $tcSQl = "select cfvt.value17,cfvt.value16,COUNT(*) AS NUM
                            from bug_table bt ,custom_field_value_table cfvt,`user_table` ut  
                            where ut.id = bt.reporter_id ".$tc_fix."
                            ".$tc_time_where."
                            AND bt.id = cfvt.bug_id
                            AND bt.`status` IN ('8','11')
                            GROUP BY cfvt.value17,cfvt.value16;";
        $objectIndex = $this->getObjectIndex();
        $res = $tc_cursor->query($tcSQl);
        $temp[$heji]['nb_profix_count'] = 0;
        $temp[$heji]['cs_profix_count'] = 0;
        $temp[$heji]['clm_profix_count'] = 0;
        for($i=0;$i<sizeof($res);$i++){
            $col = $objectIndex[$res[$i]['value16']];//取得行索引
            if(strcmp($res[$i]['value17'],'保全')==0){
                $result[$col]['cs_profix_count'] = $res[$i]['num'];
                if(strcmp($res[$i]['value16'],'分公司保全室')==0){
                    $temp[$heji]['cs_profix_count'] += $res[$i]['num'];
                }else{
                    $temp[$xiaoji]['cs_profix_count'] += $res[$i]['num'];
                    $temp[$heji]['cs_profix_count'] += $res[$i]['num'];
                }
            }else if(strcmp($res[$i]['value17'],'契约')==0){
                $result[$col]['nb_profix_count'] = $res[$i]['num'];
                $temp[$xiaoji]['nb_profix_count'] += $res[$i]['num'];
                $temp[$heji]['nb_profix_count'] += $res[$i]['num'];
            }else if(strcmp($res[$i]['value17'],'理赔')==0){
                $result[$col]['clm_profix_count'] = $res[$i]['num'];
                if(strcmp($res[$i]['value16'],'分公司理赔室')==0){
                    $temp[$heji]['clm_profix_count'] += $res[$i]['num'];
                }else{
                    $temp[$xiaoji]['clm_profix_count'] += $res[$i]['num'];
                    $temp[$heji]['clm_profix_count'] += $res[$i]['num'];
                }
            }else if(strcmp($res[$i]['value17'],'核保')==0){
                $result[$col]['nb_profix_count'] = $res[$i]['num'];
                $temp[$heji]['nb_profix_count'] += $res[$i]['num'];
            }
        }
        #######################################################################################################################################

        #################################################################   数据汇总处理  ######################################################################
        //小计
        $dataObject = $method->getDataObject();
        foreach ($dataObject as &$value) {
            if(empty($temp[$xiaoji][$value]))
                $result[$xiaoji][$value] = 0;
            else
                $result[$xiaoji][$value] = $temp[$xiaoji][$value];
            if(empty($temp[$heji][$value]))
                $result[$heji][$value] = 0;
            else
                $result[$heji][$value] = $temp[$heji][$value];
        }
        #######################################################################################################################################
        oci_free_statement($result_rows);
        oci_free_statement($result_rows_fh);
        oci_close($conn);
        if ($result) {
            exit(json_encode($result));
        } else {
            exit(json_encode(''));
        }
    }

    public function getTcCondition(){
        $queryDateStart = $_GET{'queryDateStart'};
        $queryDateEnd = $_GET{'queryDateEnd'};
        $where = "";
        $endStart = "date_format(now(),'%Y-%m-%d')";
        if(!empty($queryDateStart)){
            $where = " AND date_format(bt.date_submitted,'%Y-%m-%d') <= '".$queryDateStart."' ";
            $endStart = "'".$queryDateStart."'";
            if(!empty($queryDateEnd)){
                $where = " AND date_format(bt.date_submitted,'%Y-%m-%d') <= '".$queryDateEnd."' AND date_format(bt.date_submitted,'%Y-%m-%d') >= '".$queryDateStart."'";
                $endStart = "'".$queryDateEnd."'";
            }
        }
        Log::write("BUG查询条件 ：".$where."<br> ");
        Log::write("TC数据更新开始 ：".date("h:i:sa")."<br> ");
        $queryTc = "select  cfvt.value3 as sys,
                                COUNT(bt.bug_new_id) as bug_sum,
                                count(case  when bt.`status` in ('8','11','42') then 1 else null end) as bug_close_sum,
                                count(case  when bt.`status` not in ('8','11','42') then 1 else null end) as bug_no_close_sum,
                                count(case  when date_format(bt.date_submitted,'%Y-%m-%d') = ".$endStart." then 1 else null end) as bug_this_sum,
                                count(case  when date_format(bt.date_submitted,'%Y-%m-%d') = ".$endStart." and bt.`status` in ('8','11','42') then 1 else null end) as bug_this_close_sum
                from bug_table bt,custom_field_value_table cfvt,`user_table` ut,tx_pklistmemo tp   
                where ut.id = bt.reporter_id 
                    and bt.id = cfvt.bug_id 
                    and tp.plname = 'bug_table_status' 
                    and tp.tx_value = bt.status ".$where."
                GROUP BY cfvt.value3";
        Log::write("BUG查询SQL ：".$queryTc."<br> ");
        //查询TC数据
        $method = new MethodController();
        $bugSys = $method->getBugSys();
        $bugSysName = $method->getBugSysName();
        for($i=0;$i<sizeof($bugSys);$i++){
            $result[] = array("sys" => $bugSysName[$i],"bug_sum" => 0,"bug_close_sum" => 0,"bug_no_close_sum" => 0,"bug_this_sum" => 0,"bug_this_close_sum" => 0,);
        }
        $tc_cursor = M();
        $res = $tc_cursor->query($queryTc);
        $bug_sum = 0;
        $bug_close_sum = 0;
        $bug_no_close_sum = 0;
        $bug_this_sum = 0;
        $bug_this_close_sum = 0;
        for($i=0;$i<sizeof($res);$i++){
            $result[$bugSys[$res[$i]['sys']]]['sys'] = $res[$i]['sys'];
            $result[$bugSys[$res[$i]['sys']]]['bug_sum'] = $res[$i]['bug_sum'];
            $bug_sum += $res[$i]['bug_sum'];
            $result[$bugSys[$res[$i]['sys']]]['bug_close_sum'] = $res[$i]['bug_close_sum'];
            $bug_close_sum += $res[$i]['bug_close_sum'];
            $result[$bugSys[$res[$i]['sys']]]['bug_no_close_sum'] = $res[$i]['bug_no_close_sum'];
            $bug_no_close_sum += $res[$i]['bug_no_close_sum'];
            $result[$bugSys[$res[$i]['sys']]]['bug_this_sum'] = $res[$i]['bug_this_sum'];
            $bug_this_sum += $res[$i]['bug_this_sum'];
            $result[$bugSys[$res[$i]['sys']]]['bug_this_close_sum'] = $res[$i]['bug_this_close_sum'];
            $bug_this_close_sum += $res[$i]['bug_this_close_sum'];
        }
        $result[$bugSys["合计"]]['bug_sum'] = $bug_sum;
        $result[$bugSys["合计"]]['bug_close_sum'] = $bug_close_sum;
        $result[$bugSys["合计"]]['bug_no_close_sum'] = $bug_no_close_sum;
        $result[$bugSys["合计"]]['bug_this_sum'] = $bug_this_sum;
        $result[$bugSys["合计"]]['bug_this_close_sum'] = $bug_this_close_sum;
        Log::write("TC数据更新结束 ：".date("h:i:sa")."<br> ");
        if(!empty($queryDateStart)){
            $sum = sizeof($result);
        }else if(!empty($result)){
            $sum = sizeof($result)-1;
        }
        for ($i = 0; $i < $sum; $i++) {
            $res_out[] = $result[$i];
        }
//        dump($res_out);
//        dump($result);
        if ($res_out) {
            exit(json_encode($res_out));
        } else {
            exit(json_encode(''));
        }
    }

    public function getNbDayPostThis(){
        $queryDateStart = I('get.queryDateStart');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        if (!empty($queryDateStart)) {
            $where_time_bqsl = " AND SYS_INSERT_DATE = to_date('" . $queryDateStart . "','yyyy-mm-dd')";
        } else {
            $where_time_bqsl = " AND SYS_INSERT_DATE = TRUNC(SYSDATE) ";
        }
        $dictIndex = $method->getDictIndex();
        $DictArry = $method->getDictArry();
        for ($i = 0; $i < sizeof($DictArry); $i++) {
            $result[] = array("org" => $DictArry[$i],"bxht_sum" => 0,"bxht_bug_sum" => 0,"bxht_rate" => 0,
                "cbdx_sum" => 0,"cbdx_bug_sum" => 0,"cbdx_rate" => 0,
                "tzs_sum" => 0,"tzs_bug_sum" => 0,"tzs_rate" => 0,
                "tbxx_sum" => 0,"tbxx_bug_sum" => 0,"tbxx_rate" => 0,
                "cbyw_sum" => 0,"cbyw_bug_sum" => 0,"cbyw_rate" => 0);
        }
        $select_bqsl = "SELECT * FROM TMP_QDSX_NB_DAYPOST WHERE 1=1 
                            ".$where_time_bqsl."
                            UNION ALL 
                            SELECT SYS_INSERT_DATE,
                                   '' AS ORGAN_CODE,
                                   '合计' AS ORGAN_NAME,
                                   SUM(BXHT_SUM) AS BXHT_SUM,
                                   SUM(BXHT_BUG_SUM) AS BXHT_BUG_SUM,
                                   DECODE(SUM(BXHT_SUM),0,'100.00%', trim(to_char((SUM(BXHT_SUM)-SUM(BXHT_BUG_SUM))/SUM(BXHT_SUM)*100,'999D99')||'%')) BXHT_RATE,
                                   SUM(CBDX_SUM) AS CDDX_SUM,
                                   SUM(CBDX_BUG_SUM) AS CDDX_BUG_SUM,
                                   DECODE(SUM(CBDX_SUM),0,'100.00%', trim(to_char((SUM(CBDX_SUM)-SUM(CBDX_BUG_SUM))/SUM(CBDX_SUM)*100,'999D99')||'%')) CBDX_RATE,
                                   SUM(TZS_SUM) AS TZS_SUM,
                                   SUM(TZS_BUG_SUM) AS TZS_BUG_SUM,
                                   DECODE(SUM(TZS_SUM),0,'100.00%', trim(to_char((SUM(TZS_SUM)-SUM(TZS_BUG_SUM))/SUM(TZS_SUM)*100,'999D99')||'%')) TZS_RATE,
                                   SUM(TBXX_SUM) AS TBXX_SUM,
                                   SUM(TBXX_BUG_SUM) AS TBXX_BUG_SUM,
                                   DECODE(SUM(TBXX_SUM),0,'100.00%', trim(to_char((SUM(TBXX_SUM)-SUM(TBXX_BUG_SUM))/SUM(TBXX_SUM)*100,'999D99')||'%')) TBXX_RATE,
                                   SUM(CBYW_SUM) AS CBYW_SUM,
                                   SUM(CBYW_BUG_SUM) AS CBYW_BUG_SUM,
                                   DECODE(SUM(CBYW_SUM),0,'100.00%', trim(to_char((SUM(CBYW_SUM)-SUM(CBYW_BUG_SUM))/SUM(CBYW_SUM)*100,'999D99')||'%')) CBYW_RATE
                            FROM TMP_QDSX_NB_DAYPOST 
                             WHERE 1=1 ".$where_time_bqsl."
                            GROUP BY SYS_INSERT_DATE
                            UNION ALL
                            SELECT SYS_INSERT_DATE,
                                   '' AS ORGAN_CODE,
                                   '小计' AS ORGAN_NAME,
                                   SUM(BXHT_SUM) AS BXHT_SUM,
                                   SUM(BXHT_BUG_SUM) AS BXHT_BUG_SUM,
                                   DECODE(SUM(BXHT_SUM),0,'100.00%', trim(to_char((SUM(BXHT_SUM)-SUM(BXHT_BUG_SUM))/SUM(BXHT_SUM)*100,'999D99')||'%')) BXHT_RATE,
                                   SUM(CBDX_SUM) AS CDDX_SUM,
                                   SUM(CBDX_BUG_SUM) AS CDDX_BUG_SUM,
                                   DECODE(SUM(CBDX_SUM),0,'100.00%', trim(to_char((SUM(CBDX_SUM)-SUM(CBDX_BUG_SUM))/SUM(CBDX_SUM)*100,'999D99')||'%')) CBDX_RATE,
                                   SUM(TZS_SUM) AS TZS_SUM,
                                   SUM(TZS_BUG_SUM) AS TZS_BUG_SUM,
                                   DECODE(SUM(TZS_SUM),0,'100.00%', trim(to_char((SUM(TZS_SUM)-SUM(TZS_BUG_SUM))/SUM(TZS_SUM)*100,'999D99')||'%')) TZS_RATE,
                                   SUM(TBXX_SUM) AS TBXX_SUM,
                                   SUM(TBXX_BUG_SUM) AS TBXX_BUG_SUM,
                                   DECODE(SUM(TBXX_SUM),0,'100.00%', trim(to_char((SUM(TBXX_SUM)-SUM(TBXX_BUG_SUM))/SUM(TBXX_SUM)*100,'999D99')||'%')) TBXX_RATE,
                                   SUM(CBYW_SUM) AS CBYW_SUM,
                                   SUM(CBYW_BUG_SUM) AS CBYW_BUG_SUM,
                                   DECODE(SUM(CBYW_SUM),0,'100.00%', trim(to_char((SUM(CBYW_SUM)-SUM(CBYW_BUG_SUM))/SUM(CBYW_SUM)*100,'999D99')||'%')) CBYW_RATE
                            FROM TMP_QDSX_NB_DAYPOST 
                             WHERE 1=1 AND ORGAN_CODE NOT IN ('8647','8600') ".$where_time_bqsl."
                            GROUP BY SYS_INSERT_DATE";
        $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
        $bqsl_result_time = $method->search_long($result_rows);
        for ($i = 0; $i < sizeof($bqsl_result_time); $i++) {
            $value = $bqsl_result_time[$i];
            $result[$dictIndex[$value['ORGAN_NAME']]]['bxht_sum'] = $value['BXHT_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['bxht_bug_sum'] = $value['BXHT_BUG_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['bxht_rate'] = $value['BXHT_RATE'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['cbdx_sum'] = $value['CBDX_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['cbdx_bug_sum'] = $value['CBDX_BUG_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['cbdx_rate'] = $value['CBDX_RATE'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['tzs_sum'] = $value['TZS_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['tzs_bug_sum'] = $value['TZS_BUG_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['tzs_rate'] = $value['TZS_RATE'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['tbxx_sum'] = $value['TBXX_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['tbxx_bug_sum'] = $value['TBXX_BUG_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['tbxx_rate'] = $value['TBXX_RATE'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['cbyw_sum'] = $value['CBYW_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['cbyw_bug_sum'] = $value['CBYW_BUG_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['cbyw_rate'] = $value['CBYW_RATE'];
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

    public function getClmDayPostThis(){
        $queryDateStart = I('get.queryDateStart');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        if (!empty($queryDateStart)) {
            $where_time_bqsl = " AND SYS_INSERT_DATE = to_date('" . $queryDateStart . "','yyyy-mm-dd')";
        } else {
            $where_time_bqsl = " AND SYS_INSERT_DATE = TRUNC(SYSDATE) ";
        }
        $dictIndex = $method->getDictIndex();
        $DictArry = $method->getDictArry();
        for ($i = 0; $i < sizeof($DictArry); $i++) {
            $result[] = array("org" => $DictArry[$i],"lpsh_sum" => 0,"lpsh_bug_sum" => 0,"lpsh_rate" => 0,
                "lpzh_sum" => 0,"lpzh_bug_sum" => 0,"lpzh_rate" => 0,
                "lpdx_sum" => 0,"lpdx_bug_sum" => 0,"lpdx_rate" => 0);
        }
        $select_bqsl = "SELECT * 
                              FROM TMP_QDSX_CLM_DAYPOST WHERE 1=1 
                               ".$where_time_bqsl."
                             UNION ALL 
                            SELECT SYS_INSERT_DATE,
                                   '' AS ORGAN_CODE,
                                   '合计' AS ORGAN_NAME,
                                   SUM(CLM_SUM) AS CLM_SUM,
                                   SUM(CLM_BUG_SUM) AS CLM_BUG_SUM,
                                   DECODE(SUM(CLM_SUM),0,'100.00%', TRIM(TO_CHAR((SUM(CLM_SUM)-SUM(CLM_BUG_SUM))/SUM(CLM_SUM)*100,'999D99')||'%')) CLM_RATE,
                                   SUM(CLM_SUM_1) AS CLM_SUM_1,
                                   SUM(CLM_BUG_SUM_1) AS CLM_BUG_SUM_1,
                                   DECODE(SUM(CLM_SUM_1),0,'100.00%', TRIM(TO_CHAR((SUM(CLM_SUM_1)-SUM(CLM_BUG_SUM_1))/SUM(CLM_SUM_1)*100,'999D99')||'%')) CLM_RATE_1,
                                   SUM(TQCD_SUM) AS TQCD_SUM,
                                   SUM(TQCD_BUG_SUM) AS TQCD_BUG_SUM,
                                   DECODE(SUM(TQCD_SUM),0,'100.00%', TRIM(TO_CHAR((SUM(TQCD_SUM)-SUM(TQCD_BUG_SUM))/SUM(TQCD_SUM)*100,'999D99')||'%')) TQCD_RATE
                              FROM TMP_QDSX_CLM_DAYPOST 
                             WHERE 1=1 ".$where_time_bqsl."
                             GROUP BY SYS_INSERT_DATE
                             UNION ALL
                            SELECT SYS_INSERT_DATE,
                                   '' AS ORGAN_CODE,
                                   '小计' AS ORGAN_NAME,
                                   SUM(CLM_SUM) AS CLM_SUM,
                                   SUM(CLM_BUG_SUM) AS CLM_BUG_SUM,
                                   DECODE(SUM(CLM_SUM),0,'100.00%', TRIM(TO_CHAR((SUM(CLM_SUM)-SUM(CLM_BUG_SUM))/SUM(CLM_SUM)*100,'999D99')||'%')) CLM_RATE,
                                   SUM(CLM_SUM_1) AS CLM_SUM_1,
                                   SUM(CLM_BUG_SUM_1) AS CLM_BUG_SUM_1,
                                   DECODE(SUM(CLM_SUM_1),0,'100.00%', TRIM(TO_CHAR((SUM(CLM_SUM_1)-SUM(CLM_BUG_SUM_1))/SUM(CLM_SUM_1)*100,'999D99')||'%')) CLM_RATE_1,
                                   SUM(TQCD_SUM) AS TQCD_SUM,
                                   SUM(TQCD_BUG_SUM) AS TQCD_BUG_SUM,
                                   DECODE(SUM(TQCD_SUM),0,'100.00%', TRIM(TO_CHAR((SUM(TQCD_SUM)-SUM(TQCD_BUG_SUM))/SUM(TQCD_SUM)*100,'999D99')||'%')) TQCD_RATE
                              FROM TMP_QDSX_CLM_DAYPOST 
                             WHERE 1=1 AND ORGAN_CODE NOT IN ('8647','864700') 
                               ".$where_time_bqsl."
                             GROUP BY SYS_INSERT_DATE";
        $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
        $bqsl_result_time = $method->search_long($result_rows);
        for ($i = 0; $i < sizeof($bqsl_result_time); $i++) {
            $value = $bqsl_result_time[$i];
            $result[$dictIndex[$value['ORGAN_NAME']]]['lpsh_sum'] = $value['CLM_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['lpsh_bug_sum'] = $value['CLM_BUG_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['lpsh_rate'] = $value['CLM_RATE'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['lpzh_sum'] = $value['CLM_SUM_1'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['lpzh_bug_sum'] = $value['CLM_BUG_SUM_1'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['lpzh_rate'] = $value['CLM_RATE_1'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['lpdx_sum'] = $value['TQCD_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['lpdx_bug_sum'] = $value['TQCD_BUG_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['lpdx_rate'] = $value['TQCD_RATE'];
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

    public function getCsDayPostThis(){
        $queryDateStart = I('get.queryDateStart');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        if (!empty($queryDateStart)) {
            $where_time_bqsl = " AND SYS_INSERT_DATE = to_date('" . $queryDateStart . "','yyyy-mm-dd')";
        } else {
            $where_time_bqsl = " AND SYS_INSERT_DATE = TRUNC(SYSDATE) ";
        }
        $dictIndex = $method->getDictIndex();
        $DictArry = $method->getDictArry();
        for ($i = 0; $i < sizeof($DictArry); $i++) {
            $result[] = array("org" => $DictArry[$i],"slfh_gm_sum" => 0,"slfh_gm_bug_sum" => 0,"slfh_gm_rate" => 0,
                "slfh_ww_sum" => 0,"slfh_ww_bug_sum" => 0,"slfh_ww_rate" => 0,
                "bqdx_sum" => 0,"bqdx_bug_sum" => 0,"bqdx_rate" => 0);
        }
        $select_bqsl = "SELECT * 
                              FROM TMP_QDSX_CS_DAYPOST WHERE 1=1 
                               ".$where_time_bqsl."
                             UNION ALL 
                            SELECT SYS_INSERT_DATE,
                                   '' AS ORGAN_CODE,
                                   '合计' AS ORGAN_NAME,
                                   SUM(SLFH_GM_SUM) AS SLFH_GM_SUM,
                                   SUM(SLFH_GM_BUG_SUM) AS SLFH_GM_BUG_SUM,
                                   DECODE(SUM(SLFH_GM_SUM),0,'100.00%', trim(to_char((SUM(SLFH_GM_SUM)-SUM(SLFH_GM_BUG_SUM))/SUM(SLFH_GM_SUM)*100,'999D99')||'%')) SLFH_GM_RATE,
                                   SUM(SLFH_WW_SUM) AS SLFH_WW_SUM,
                                   SUM(SLFH_WW_BUG_SUM) AS SLFH_WW_BUG_SUM,
                                   DECODE(SUM(SLFH_WW_SUM),0,'100.00%', trim(to_char((SUM(SLFH_WW_SUM)-SUM(SLFH_WW_BUG_SUM))/SUM(SLFH_WW_SUM)*100,'999D99')||'%')) SLFH_WW_RATE,
                                   SUM(BQDX_SUM) AS BQDX_SUM,
                                   SUM(BQDX_BUG_SUM) AS BQDX_BUG_SUM,
                                   DECODE(SUM(BQDX_SUM),0,'100.00%', trim(to_char((SUM(BQDX_SUM)-SUM(BQDX_BUG_SUM))/SUM(BQDX_SUM)*100,'999D99')||'%')) BQDX_RATE
                              FROM TMP_QDSX_CS_DAYPOST 
                             WHERE 1=1 ".$where_time_bqsl."
                             GROUP BY SYS_INSERT_DATE
                             UNION ALL
                            SELECT SYS_INSERT_DATE,
                                   '' AS ORGAN_CODE,
                                   '小计' AS ORGAN_NAME,
                                   SUM(SLFH_GM_SUM) AS SLFH_GM_SUM,
                                   SUM(SLFH_GM_BUG_SUM) AS SLFH_GM_BUG_SUM,
                                   DECODE(SUM(SLFH_GM_SUM),0,'100.00%', trim(to_char((SUM(SLFH_GM_SUM)-SUM(SLFH_GM_BUG_SUM))/SUM(SLFH_GM_SUM)*100,'999D99')||'%')) SLFH_GM_RATE,
                                   SUM(SLFH_WW_SUM) AS SLFH_WW_SUM,
                                   SUM(SLFH_WW_BUG_SUM) AS SLFH_WW_BUG_SUM,
                                   DECODE(SUM(SLFH_WW_SUM),0,'100.00%', trim(to_char((SUM(SLFH_WW_SUM)-SUM(SLFH_WW_BUG_SUM))/SUM(SLFH_WW_SUM)*100,'999D99')||'%')) SLFH_WW_RATE,
                                   SUM(BQDX_SUM) AS BQDX_SUM,
                                   SUM(BQDX_BUG_SUM) AS BQDX_BUG_SUM,
                                   DECODE(SUM(BQDX_SUM),0,'100.00%', trim(to_char((SUM(BQDX_SUM)-SUM(BQDX_BUG_SUM))/SUM(BQDX_SUM)*100,'999D99')||'%')) BQDX_RATE
                              FROM TMP_QDSX_CS_DAYPOST 
                             WHERE 1=1 AND ORGAN_CODE NOT IN ('8647','864700') 
                              ".$where_time_bqsl."
                             GROUP BY SYS_INSERT_DATE";
        $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
        $bqsl_result_time = $method->search_long($result_rows);
//        dump($bqsl_result_time);
        for ($i = 0; $i < sizeof($bqsl_result_time); $i++) {
            $value = $bqsl_result_time[$i];
            $result[$dictIndex[$value['ORGAN_NAME']]]['slfh_gm_sum'] = $value['SLFH_GM_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['slfh_gm_bug_sum'] = $value['SLFH_GM_BUG_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['slfh_gm_rate'] = $value['SLFH_GM_RATE'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['slfh_ww_sum'] = $value['SLFH_WW_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['slfh_ww_bug_sum'] = $value['SLFH_WW_BUG_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['slfh_ww_rate'] = $value['SLFH_WW_RATE'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['bqdx_sum'] = $value['BQDX_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['bqdx_bug_sum'] = $value['BQDX_BUG_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['bqdx_rate'] = $value['BQDX_RATE'];
        }
        #######################################################################################################################################
        oci_free_statement($result_rows);
        oci_close($conn);
        for ($i = 0; $i < sizeof($result); $i++) {
            $res[] = $result[$i];
        }
//        dump($res);
        if ($res) {
            exit(json_encode($res));
        } else {
            exit(json_encode(''));
        }
    }

    public function getUwDayPostThis(){
        $queryDateStart = I('get.queryDateStart');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        if (!empty($queryDateStart)) {
            $where_time_bqsl = " AND SYS_INSERT_DATE = to_date('" . $queryDateStart . "','yyyy-mm-dd')";
        } else {
            $where_time_bqsl = " AND SYS_INSERT_DATE = TRUNC(SYSDATE) ";
        }
        $dictIndex = $method->getDictIndex();
        $DictArry = $method->getDictArry();
        for ($i = 0; $i < sizeof($DictArry); $i++) {
            $result[] = array("org" => $DictArry[$i],"qyhb_sum" => 0,"qyhb_bug_sum" => 0,"qyhb_rate" => 0,
                "bqhb_sum" => 0,"bqhb_bug_sum" => 0,"bqhb_rate" => 0,
                "lphb_sum" => 0,"lphb_bug_sum" => 0,"lphb_rate" => 0,
                "xbhb_sum" => 0,"xbhb_bug_sum" => 0,"xbhb_rate" => 0,
                "hbssdx_sum" => 0,"hbssdx_bug_sum" => 0,"hbssdx_rate" => 0);
        }
        $select_bqsl = "SELECT * FROM TMP_QDSX_UW_DAYPOST WHERE 1=1 
                                ".$where_time_bqsl."
                                UNION ALL 
                                SELECT SYS_INSERT_DATE,
                                       '' AS ORGAN_CODE,
                                       '合计' AS ORGAN_NAME,
                                       SUM(QYHB_SUM) AS QYHB_SUM,
                                       SUM(QYHB_BUG_SUM) AS QYHB_BUG_SUM,
                                       DECODE(SUM(QYHB_SUM),0,'100.00%', trim(to_char((SUM(QYHB_SUM)-SUM(QYHB_BUG_SUM))/SUM(QYHB_SUM)*100,'999D99')||'%')) QYHB_RATE,
                                       SUM(BQHB_SUM) AS BQHB_SUM,
                                       SUM(BQHB_BUG_SUM) AS BQHB_BUG_SUM,
                                       DECODE(SUM(BQHB_SUM),0,'100.00%', trim(to_char((SUM(BQHB_SUM)-SUM(BQHB_BUG_SUM))/SUM(BQHB_SUM)*100,'999D99')||'%')) BQHB_RATE,
                                       SUM(LPHB_SUM) AS LPHB_SUM,
                                       SUM(LPHB_BUG_SUM) AS LPHB_BUG_SUM,
                                       DECODE(SUM(LPHB_SUM),0,'100.00%', trim(to_char((SUM(LPHB_SUM)-SUM(LPHB_BUG_SUM))/SUM(LPHB_SUM)*100,'999D99')||'%')) LPHB_RATE,
                                       SUM(XBHB_SUM) AS XBHB_SUM,
                                       SUM(XBHB_BUG_SUM) AS XBHB_BUG_SUM,
                                       DECODE(SUM(XBHB_SUM),0,'100.00%', trim(to_char((SUM(XBHB_SUM)-SUM(XBHB_BUG_SUM))/SUM(XBHB_SUM)*100,'999D99')||'%')) XBHB_RATE,
                                       SUM(HBSSDX_SUM) AS HBSSDX_SUM,
                                       SUM(HBSSDX_BUG_SUM) AS HBSSDX_BUG_SUM,
                                       DECODE(SUM(HBSSDX_SUM),0,'100.00%', trim(to_char((SUM(HBSSDX_SUM)-SUM(HBSSDX_BUG_SUM))/SUM(HBSSDX_SUM)*100,'999D99')||'%')) HBSSDX_RATE
                                FROM TMP_QDSX_UW_DAYPOST 
                                 WHERE 1=1 ".$where_time_bqsl."
                                GROUP BY SYS_INSERT_DATE
                                UNION ALL
                                SELECT SYS_INSERT_DATE,
                                       '' AS ORGAN_CODE,
                                       '小计' AS ORGAN_NAME,
                                       SUM(QYHB_SUM) AS QYHB_SUM,
                                       SUM(QYHB_BUG_SUM) AS QYHB_BUG_SUM,
                                       DECODE(SUM(QYHB_SUM),0,'100.00%', trim(to_char((SUM(QYHB_SUM)-SUM(QYHB_BUG_SUM))/SUM(QYHB_SUM)*100,'999D99')||'%')) QYHB_RATE,
                                       SUM(BQHB_SUM) AS BQHB_SUM,
                                       SUM(BQHB_BUG_SUM) AS BQHB_BUG_SUM,
                                       DECODE(SUM(BQHB_SUM),0,'100.00%', trim(to_char((SUM(BQHB_SUM)-SUM(BQHB_BUG_SUM))/SUM(BQHB_SUM)*100,'999D99')||'%')) BQHB_RATE,
                                       SUM(LPHB_SUM) AS LPHB_SUM,
                                       SUM(LPHB_BUG_SUM) AS LPHB_BUG_SUM,
                                       DECODE(SUM(LPHB_SUM),0,'100.00%', trim(to_char((SUM(LPHB_SUM)-SUM(LPHB_BUG_SUM))/SUM(LPHB_SUM)*100,'999D99')||'%')) LPHB_RATE,
                                       SUM(XBHB_SUM) AS XBHB_SUM,
                                       SUM(XBHB_BUG_SUM) AS XBHB_BUG_SUM,
                                       DECODE(SUM(XBHB_SUM),0,'100.00%', trim(to_char((SUM(XBHB_SUM)-SUM(XBHB_BUG_SUM))/SUM(XBHB_SUM)*100,'999D99')||'%')) XBHB_RATE,
                                       SUM(HBSSDX_SUM) AS HBSSDX_SUM,
                                       SUM(HBSSDX_BUG_SUM) AS HBSSDX_BUG_SUM,
                                       DECODE(SUM(HBSSDX_SUM),0,'100.00%', trim(to_char((SUM(HBSSDX_SUM)-SUM(HBSSDX_BUG_SUM))/SUM(HBSSDX_SUM)*100,'999D99')||'%')) HBSSDX_RATE
                                FROM TMP_QDSX_UW_DAYPOST 
                                 WHERE 1=1 AND ORGAN_CODE NOT IN ('8647','8600') ".$where_time_bqsl."
                                GROUP BY SYS_INSERT_DATE";
        $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
        $bqsl_result_time = $method->search_long($result_rows);
        for ($i = 0; $i < sizeof($bqsl_result_time); $i++) {
            $value = $bqsl_result_time[$i];
            $result[$dictIndex[$value['ORGAN_NAME']]]['qyhb_sum'] = $value['QYHB_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['qyhb_bug_sum'] = $value['QYHB_BUG_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['qyhb_rate'] = $value['QYHB_RATE'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['bqhb_sum'] = $value['BQHB_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['bqhb_bug_sum'] = $value['BQHB_BUG_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['bqhb_rate'] = $value['BQHB_RATE'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['lphb_sum'] = $value['LPHB_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['lphb_bug_sum'] = $value['LPHB_BUG_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['lphb_rate'] = $value['LPHB_RATE'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['xbhb_sum'] = $value['XBHB_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['xbhb_bug_sum'] = $value['XBHB_BUG_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['xbhb_rate'] = $value['XBHB_RATE'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['hbssdx_sum'] = $value['HBSSDX_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['hbssdx_bug_sum'] = $value['HBSSDX_BUG_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['hbssdx_rate'] = $value['HBSSDX_RATE'];
        }
        #######################################################################################################################################
        oci_free_statement($result_rows);
        oci_close($conn);
        for ($i = 0; $i < sizeof($result); $i++) {
            $res[] = $result[$i];
        }
//        dump($res);
        if ($res) {
            exit(json_encode($res));
        } else {
            exit(json_encode(''));
        }
    }

    public function getDayPostAll(){
        $queryDateStart = I('get.queryDateStart');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        if (!empty($queryDateStart)) {
            $where_time_bqsl = " AND SYS_INSERT_DATE = to_date('" . $queryDateStart . "','yyyy-mm-dd')";
        } else {
            $where_time_bqsl = " AND SYS_INSERT_DATE = TRUNC(SYSDATE) ";
        }
        $dictIndex = $method->getDictIndex();
        $DictArry = $method->getDictArry();
        for ($i = 0; $i < sizeof($DictArry); $i++) {
            $result[] = array("org" => $DictArry[$i],"nb_sum" => 0,"nb_bug_sum" => 0,"nb_solved_sum" => 0,"nb_rate" => 0,
                "uw_sum" => 0,"uw_bug_sum" => 0,"uw_solved_sum" => 0,"uw_rate" => 0,
                "cs_sum" => 0,"cs_bug_sum" => 0,"cs_solved_sum" => 0,"cs_rate" => 0,
                "clm_sum" => 0,"clm_bug_sum" => 0,"clm_solved_sum" => 0,"clm_rate" => 0);
        }
        $select_bqsl = "SELECT * FROM TMP_QDSX_LJ_DAYPOST WHERE 1=1 
                                ".$where_time_bqsl."
                                UNION ALL 
                                SELECT SYS_INSERT_DATE,
                                       '' AS ORGAN_CODE,
                                       '合计' AS ORGAN_NAME,
                                       SUM(NB_SUM) AS NB_SUM,
                                       SUM(NB_BUG_SUM) AS NB_BUG_SUM,
                                       SUM(NB_SOLVED_SUM)  AS NB_SOLVED_SUM,
                                       --DECODE(SUM(NB_SUM),0,'-', trim(to_char((SUM(NB_SUM)-SUM(NB_BUG_SUM)+SUM(NB_SOLVED_SUM))/SUM(NB_SUM)*100,'999D99')||'%')) NB_RATE,
                                       (case
                                           when SUM(NB_SUM) = '0' then
                                            '-'
                                           else
                                            CONCAT(CAST(((SUM(NB_SUM) - SUM(NB_BUG_SUM) + SUM(NB_SOLVED_SUM)) * 100 /
                                                        (SUM(NB_SUM))) AS DEC(18, 2)),
                                                   '%')
                                         end) AS NB_ACCURACY,
                                       
                                       SUM(UW_SUM) AS UW_SUM,
                                       SUM(UW_BUG_SUM) AS UW_BUG_SUM,
                                       SUM(UW_SOLVED_SUM) AS UW_SOLVED_SUM,
                                       --DECODE(SUM(UW_SUM),0,'-', trim(to_char((SUM(UW_SUM)-SUM(UW_BUG_SUM)+SUM(UW_SOLVED_SUM))/SUM(UW_SUM)*100,'999D99')||'%')) UW_RATE,
                                       (case
                                           when SUM(UW_SUM) = '0' then
                                            '-'
                                           else
                                            CONCAT(CAST(((SUM(UW_SUM) - SUM(UW_BUG_SUM) + SUM(UW_SOLVED_SUM)) * 100 /
                                                        (SUM(UW_SUM))) AS DEC(18, 2)),
                                                   '%')
                                         end) AS UW_ACCURACY,
                                       
                                       SUM(CS_SUM) AS CS_SUM,
                                       SUM(CS_BUG_SUM) AS CS_BUG_SUM,
                                       SUM(CS_SOLVED_SUM) AS CS_SOLVED_SUM,
                                       --DECODE(SUM(CS_SUM),0,'-', trim(to_char((SUM(CS_SUM)-SUM(CS_BUG_SUM)+SUM(CS_SOLVED_SUM))/SUM(CS_SUM)*100,'999D99')||'%')) CS_RATE,     
                                       (case
                                           when SUM(CS_SUM) = '0' then
                                            '-'
                                           else
                                            CONCAT(CAST(((SUM(CS_SUM) - SUM(CS_BUG_SUM) + SUM(CS_SOLVED_SUM)) * 100 /
                                                        (SUM(CS_SUM))) AS DEC(18, 2)),
                                                   '%')
                                         end) AS CS_ACCURACY,
                                       
                                       SUM(CLM_SUM) AS CLM_SUM,
                                       SUM(CLM_BUG_SUM) AS CLM_BUG_SUM,
                                       SUM(CLM_SOLVED_SUM) AS CLM_SOLVED_SUM,
                                       --DECODE(SUM(CLM_SUM),0,'-', trim(to_char((SUM(CLM_SUM)-SUM(CLM_BUG_SUM)+SUM(CLM_SOLVED_SUM))/SUM(CLM_SUM)*100,'999D99')||'%')) CLM_RATE
                                       (case
                                           when SUM(CLM_SUM) = '0' then
                                            '-'
                                           else
                                            CONCAT(CAST(((SUM(CLM_SUM) - SUM(CLM_BUG_SUM) + SUM(CLM_SOLVED_SUM)) * 100 /
                                                        (SUM(CLM_SUM))) AS DEC(18, 2)),
                                                   '%')
                                         end) AS CLM_ACCURACY
                                FROM TMP_QDSX_LJ_DAYPOST 
                                 WHERE 1=1 ".$where_time_bqsl."
                                GROUP BY SYS_INSERT_DATE
                                UNION ALL
                                SELECT SYS_INSERT_DATE,
                                       '' AS ORGAN_CODE,
                                       '小计' AS ORGAN_NAME,
                                       SUM(NB_SUM) AS NB_SUM,
                                       SUM(NB_BUG_SUM) AS NB_BUG_SUM,
                                       SUM(NB_SOLVED_SUM)  AS NB_SOLVED_SUM,
                                       --DECODE(SUM(NB_SUM),0,'-', trim(to_char((SUM(NB_SUM)-SUM(NB_BUG_SUM)+SUM(NB_SOLVED_SUM))/SUM(NB_SUM)*100,'999D99')||'%')) NB_RATE, 
                                       (case
                                           when SUM(NB_SUM) = '0' then
                                            '-'
                                           else
                                            CONCAT(CAST(((SUM(NB_SUM) - SUM(NB_BUG_SUM) + SUM(NB_SOLVED_SUM)) * 100 /
                                                        (SUM(NB_SUM))) AS DEC(18, 2)),
                                                   '%')
                                         end) AS NB_ACCURACY,
                                       
                                       SUM(UW_SUM) AS UW_SUM,
                                       SUM(UW_BUG_SUM) AS UW_BUG_SUM,
                                       SUM(UW_SOLVED_SUM) AS UW_SOLVED_SUM,
                                       --DECODE(SUM(UW_SUM),0,'-', trim(to_char((SUM(UW_SUM)-SUM(UW_BUG_SUM)+SUM(UW_SOLVED_SUM))/SUM(UW_SUM)*100,'999D99')||'%')) UW_RATE,
                                       (case
                                           when SUM(UW_SUM) = '0' then
                                            '-'
                                           else
                                            CONCAT(CAST(((SUM(UW_SUM) - SUM(UW_BUG_SUM) + SUM(UW_SOLVED_SUM)) * 100 /
                                                        (SUM(UW_SUM))) AS DEC(18, 2)),
                                                   '%')
                                         end) AS UW_ACCURACY,
                                       
                                       SUM(CS_SUM) AS CS_SUM,
                                       SUM(CS_BUG_SUM) AS CS_BUG_SUM,
                                       SUM(CS_SOLVED_SUM) AS CS_SOLVED_SUM,
                                       --DECODE(SUM(CS_SUM),0,'-', trim(to_char((SUM(CS_SUM)-SUM(CS_BUG_SUM)+SUM(CS_SOLVED_SUM))/SUM(CS_SUM)*100,'999D99')||'%')) CS_RATE,
                                       (case
                                           when SUM(CS_SUM) = '0' then
                                            '-'
                                           else
                                            CONCAT(CAST(((SUM(CS_SUM) - SUM(CS_BUG_SUM) + SUM(CS_SOLVED_SUM)) * 100 /
                                                        (SUM(CS_SUM))) AS DEC(18, 2)),
                                                   '%')
                                         end) AS CS_ACCURACY,
                                       
                                       SUM(CLM_SUM) AS CLM_SUM,
                                       SUM(CLM_BUG_SUM) AS CLM_BUG_SUM,
                                       SUM(CLM_SOLVED_SUM) AS CLM_SOLVED_SUM,
                                       --DECODE(SUM(CLM_SUM),0,'-', trim(to_char((SUM(CLM_SUM)-SUM(CLM_BUG_SUM)+SUM(CLM_SOLVED_SUM))/SUM(CLM_SUM)*100,'999D99')||'%')) CLM_RATE
                                       (case
                                           when SUM(CLM_SUM) = '0' then
                                            '-'
                                           else
                                            CONCAT(CAST(((SUM(CLM_SUM) - SUM(CLM_BUG_SUM) + SUM(CLM_SOLVED_SUM)) * 100 /
                                                        (SUM(CLM_SUM))) AS DEC(18, 2)),
                                                   '%')
                                         end) AS CLM_ACCURACY
                                FROM TMP_QDSX_LJ_DAYPOST 
                                WHERE 1=1 AND ORGAN_CODE NOT IN ('8647','8600') ".$where_time_bqsl."
                                GROUP BY SYS_INSERT_DATE";
        $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
        $bqsl_result_time = $method->search_long($result_rows);
        for ($i = 0; $i < sizeof($bqsl_result_time); $i++) {
            $value = $bqsl_result_time[$i];
            $result[$dictIndex[$value['ORGAN_NAME']]]['nb_sum'] = $value['NB_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['nb_bug_sum'] = $value['NB_BUG_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['nb_solved_sum'] = $value['NB_SOLVED_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['nb_rate'] = $value['NB_RATE'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['uw_sum'] = $value['UW_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['uw_bug_sum'] = $value['UW_BUG_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['uw_solved_sum'] = $value['UW_SOLVED_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['uw_rate'] = $value['UW_RATE'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['cs_sum'] = $value['CS_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['cs_bug_sum'] = $value['CS_BUG_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['cs_solved_sum'] = $value['CS_SOLVED_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['cs_rate'] = $value['CS_RATE'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['clm_sum'] = $value['CLM_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['clm_bug_sum'] = $value['CLM_BUG_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['clm_solved_sum'] = $value['CLM_SOLVED_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['clm_rate'] = $value['CLM_RATE'];
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