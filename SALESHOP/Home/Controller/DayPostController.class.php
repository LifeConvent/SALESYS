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

    public function dayPost()
    {
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
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

    public function dayPostUwThis()
    {
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
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

    public function dayPostAllThis()
    {
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
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

    public function dayPostCsThis()
    {
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
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

    public function dayPostClmThis()
    {
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
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

    public function dayPostTc()
    {
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
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

    public function dayPostAll()
    {
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
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

    public function test(){
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        $type =  $method->getUserTypeBySql($username);
        echo $username;
        echo $type;
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
//        $queryTc = "select  cfvt.value3 as sys,
//                                COUNT(bt.bug_new_id) as bug_sum,
//                                count(case  when bt.`status` in ('8','11','42') then 1 else null end) as bug_close_sum,
//                                count(case  when bt.`status` not in ('8','11','42') then 1 else null end) as bug_no_close_sum,
//                                count(case  when date_format(bt.date_submitted,'%Y-%m-%d') = ".$endStart." then 1 else null end) as bug_this_sum,
//                                count(case  when date_format(bt.date_submitted,'%Y-%m-%d') = ".$endStart." and bt.`status` in ('8','11','42') then 1 else null end) as bug_this_close_sum
//                from bug_table bt,custom_field_value_table cfvt,`user_table` ut,tx_pklistmemo tp
//                where ut.id = bt.reporter_id
//                    and bt.id = cfvt.bug_id
//                    and tp.plname = 'bug_table_status'
//                    and tp.tx_value = bt.status ".$where."
//                GROUP BY cfvt.value3";

//        $queryTc = "select  cfvt.value3 as sys,
//                                    SUM(case when cfvt.value2 = '江西上线生产问题' then 1 else 0 end) AS BUG_SUM,
//                                    count(case  when bt.`status` in ('8','11','42') and cfvt.value2 = '江西上线生产问题' then 1 else null end) as bug_close_sum,
//                                    count(case  when bt.`status` not in ('8','11','42') and cfvt.value2 = '江西上线生产问题' then 1 else null end) as bug_no_close_sum,
//                                    count(case  when date_format(bt.date_submitted,'%Y-%m-%d') = ".$endStart." and cfvt.value2 = '江西上线生产问题' then 1 else null end) as bug_this_sum,
//                                    count(case  when date_format(bt.date_submitted,'%Y-%m-%d') = ".$endStart." and bt.`status` in ('8','11','42') and cfvt.value2 = '江西上线生产问题' then 1 else null end) as bug_this_close_sum
//                    from bug_table bt,custom_field_value_table cfvt,`user_table` ut,tx_pklistmemo tp
//                    where ut.id = bt.reporter_id
//                        and bt.id = cfvt.bug_id
//                        and tp.plname = 'bug_table_status'
//                        #and cfvt.value2 = '江西上线生产问题'
//                        #and cfvt.value2 = '青岛上线生产问题'
//                        and tp.tx_value = bt.status ".$where."
//                    GROUP BY cfvt.value3";

//        $queryTc = "select  cfvt.value3 as sys,
//                                    SUM(case when cfvt.value2 = '江西上线生产问题' then 1 else 0 end) AS BUG_SUM,
//                                    count(case  when bt.`status` in ('8','11','42') and cfvt.value2 = '江西上线生产问题' then 1 else null end) as bug_close_sum,
//                                    count(case  when bt.`status` not in ('8','11','42') and cfvt.value2 = '江西上线生产问题' then 1 else null end) as bug_no_close_sum,
//                                    count(case  when date_format(bt.date_submitted,'%Y-%m-%d') = ".$endStart." and cfvt.value2 = '江西上线生产问题' then 1 else null end) as bug_this_sum,
//                                    count(case  when #date_format(bt.date_submitted,'%Y-%m-%d') = '2019-08-08' and
//                                    (select date_format(MIN(bhr.date_modified),'%Y-%m-%d') from bug_history_remark bhr
//                                                            where 1=1 AND (bhr.newStatus LIKE '%关闭%' OR bhr.newStatus = '已取消') AND bhr.bug_id = cfvt.bug_id) = ".$endStart." 				#关闭最早日期是当日
//                                    and bt.`status` in ('8','11','42') #状态是关闭
//                                    and cfvt.value2 = '江西上线生产问题'
//                                    then 1 else null end) as bug_this_close_sum
//                    from bug_table bt,custom_field_value_table cfvt,`user_table` ut,tx_pklistmemo tp
//                    where ut.id = bt.reporter_id
//                        and bt.id = cfvt.bug_id
//                        and tp.plname = 'bug_table_status'
//                        #and cfvt.value2 = '江西上线生产问题'
//                        #and cfvt.value2 = '青岛上线生产问题'
//                        and tp.tx_value = bt.status ".$where."
//                    GROUP BY cfvt.value3";

        $queryTc = "select  cfvt.value3 as sys,
                                SUM(case when cfvt.value2 = '江西上线生产问题' and date_format(bt.date_submitted,'%Y-%m-%d') <= ".$endStart." then 1 else 0 end) AS BUG_SUM,
                                count(case  when bt.`status` in ('8','11','42') 
                                and (select date_format(MIN(bhr.date_modified),'%Y-%m-%d') from bug_history_remark bhr 
                                                                            where 1=1 AND (bhr.newStatus LIKE '%关闭%' OR bhr.newStatus = '已取消') AND bhr.bug_id = cfvt.bug_id) <= ".$endStart."
                                and date_format(bt.date_submitted,'%Y-%m-%d') <= ".$endStart."  and cfvt.value2 = '江西上线生产问题' then 1 else null end) as bug_close_sum,
                                count(case  when bt.`status` not in ('8','11','42') and date_format(bt.date_submitted,'%Y-%m-%d') <= ".$endStart."  and cfvt.value2 = '江西上线生产问题' then 1 else null end) as bug_no_close_sum,
                                count(case  when date_format(bt.date_submitted,'%Y-%m-%d') = ".$endStart." and cfvt.value2 = '江西上线生产问题' then 1 else null end) as bug_this_sum,
                                count(case  when #date_format(bt.date_submitted,'%Y-%m-%d') = '2019-08-08' and
                                (select date_format(MIN(bhr.date_modified),'%Y-%m-%d') from bug_history_remark bhr 
                                                        where 1=1 AND (bhr.newStatus LIKE '%关闭%' OR bhr.newStatus = '已取消') AND bhr.bug_id = cfvt.bug_id) = ".$endStart." 				#关闭最早日期是当日
                                and bt.`status` in ('8','11','42') #状态是关闭
                                and cfvt.value2 = '江西上线生产问题' 
                                then 1 else null end) as bug_this_close_sum
                from bug_table bt,custom_field_value_table cfvt,`user_table` ut,tx_pklistmemo tp   
                where ut.id = bt.reporter_id 
                    and bt.id = cfvt.bug_id 
                    and tp.plname = 'bug_table_status' 
                    #and cfvt.value2 = '江西上线生产问题'
                    #and cfvt.value2 = '青岛上线生产问题'
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
        $user_name = "";
        $method->checkIn($user_name);
        $organCode = $method->getUserOrganCode();
        $day_post_organ = $method->getSxDaypostOrgan($user_name);
        if (!empty($queryDateStart)) {
            $where_time_bqsl = " AND (ORGAN_CODE = '8600' OR ORGAN_CODE LIKE '".$day_post_organ."%') AND SYS_INSERT_DATE = to_date('" . $queryDateStart . "','yyyy-mm-dd')";
        } else {
            $where_time_bqsl = " AND (ORGAN_CODE = '8600' OR ORGAN_CODE LIKE '".$day_post_organ."%')  AND SYS_INSERT_DATE = TRUNC(SYSDATE) ";
        }
        $dictIndex = $method->getDictIndex($day_post_organ);
        $DictArry = $method->getDictArry($day_post_organ);
//        dump($dictIndex);
//        dump($DictArry);
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
                             WHERE 1=1 AND ORGAN_CODE NOT IN ('8633','8600') ".$where_time_bqsl."
                            GROUP BY SYS_INSERT_DATE";
        $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
        Log::write($user_name.' 契约日报数据库查询条件：'.$select_bqsl,'INFO');
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
//        dump($res);
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
        $user_name = "";
        $method->checkIn($user_name);
        $organCode = $method->getUserOrganCode();
        $day_post_organ = $method->getSxDaypostOrgan($user_name);
        if (!empty($queryDateStart)) {
            $where_time_bqsl = " AND (ORGAN_CODE = '8600' OR ORGAN_CODE LIKE '".$day_post_organ."%') AND SYS_INSERT_DATE = to_date('" . $queryDateStart . "','yyyy-mm-dd')";
        } else {
            $where_time_bqsl = " AND (ORGAN_CODE = '8600' OR ORGAN_CODE LIKE '".$day_post_organ."%')  AND SYS_INSERT_DATE = TRUNC(SYSDATE) ";
        }
        $dictIndex = $method->getDictIndex($day_post_organ);
        $DictArry = $method->getDictArry($day_post_organ);
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
                             WHERE 1=1 AND ORGAN_CODE NOT IN ('8633','863300')
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
        $user_name = "";
        $method->checkIn($user_name);
        $organCode = $method->getUserOrganCode();
        $day_post_organ = $method->getSxDaypostOrgan($user_name);
        if (!empty($queryDateStart)) {
            $where_time_bqsl = " AND (ORGAN_CODE = '8600' OR ORGAN_CODE LIKE '".$day_post_organ."%') AND SYS_INSERT_DATE = to_date('" . $queryDateStart . "','yyyy-mm-dd')";
        } else {
            $where_time_bqsl = " AND (ORGAN_CODE = '8600' OR ORGAN_CODE LIKE '".$day_post_organ."%')  AND SYS_INSERT_DATE = TRUNC(SYSDATE) ";
        }
        $dictIndex = $method->getDictIndex($day_post_organ);
        $DictArry = $method->getDictArry($day_post_organ);
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
                             WHERE 1=1 AND ORGAN_CODE NOT IN ('8633','863300') 
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

    public function getCsDayPostThisByTime(){
        $queryDateStart = I('get.queryDateStart');
        $queryDateEnd = I('get.queryDateEnd');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $user_name = "";
        $method->checkIn($user_name);
        $organCode = $method->getUserOrganCode();
        $day_post_organ = $method->getSxDaypostOrgan($user_name);
        if (!empty($queryDateStart)) {
            $where_time_bqsl = " AND (ORGAN_CODE = '8600' OR ORGAN_CODE LIKE '".$day_post_organ."%') AND SYS_INSERT_DATE = to_date('" . $queryDateStart . "','yyyy-mm-dd')";
        } else {
            $where_time_bqsl = " AND (ORGAN_CODE = '8600' OR ORGAN_CODE LIKE '".$day_post_organ."%')  AND SYS_INSERT_DATE = TRUNC(SYSDATE) ";
        }
        $where_time_bqsl = " AND T.SYS_INSERT_DATE BETWEEN to_date('" . $queryDateStart . "','yyyy-mm-dd') AND to_date('" . $queryDateEnd . "','yyyy-mm-dd')";
        $dictIndex = $method->getDictIndex($day_post_organ);
        $DictArry = $method->getDictArry($day_post_organ);
        for ($i = 0; $i < sizeof($DictArry); $i++) {
            $result[] = array("org" => $DictArry[$i],"slfh_gm_sum" => 0,"slfh_gm_bug_sum" => 0,"slfh_gm_rate" => 0,
                "slfh_ww_sum" => 0,"slfh_ww_bug_sum" => 0,"slfh_ww_rate" => 0,
                "bqdx_sum" => 0,"bqdx_bug_sum" => 0,"bqdx_rate" => 0);
        }
        $select_bqsl = "SELECT A.ORGAN_CODE,
                               A.ORGAN_NAME,
                               A.SLFH_GM_SUM,
                               A.BUG_NUM AS SLFH_GM_BUG_SUM,
                               A.RATE AS SLFH_GM_RATE,
                               B.SLFH_WW_SUM AS SLFH_WW_SUM,
                               B.BUG_NUM AS SLFH_WW_BUG_SUM,
                               B.RATE AS SLFH_WW_RATE,
                               C.BQDX_SUM AS BQDX_SUM,
                               C.BUG_NUM AS BQDX_BUG_SUM,
                               C.RATE AS BQDX_RATE
                          FROM (SELECT  ORG.ORGAN_CODE,
                                        ORG.ORGAN_NAME,
                                        COUNT(N.BUSINESS_CODE) AS SLFH_GM_SUM,
                                        COUNT(CASE WHEN N.RESULT <> '正确' THEN 1 ELSE NULL END) AS BUG_NUM,
                                        DECODE(COUNT(N.BUSINESS_CODE),0,'100.00%', TRIM(TO_CHAR((COUNT(N.BUSINESS_CODE)-COUNT(CASE WHEN N.RESULT <> '正确' THEN 1 ELSE NULL END))/COUNT(N.BUSINESS_CODE)*100,'999D99')||'%')) RATE
                                   FROM ORGAN_CODE_NAME ORG
                              LEFT JOIN (SELECT DISTINCT T.ACCEPT_CODE AS BUSINESS_CODE,
                                     (CASE
                                         WHEN T.TC_ID IS NULL THEN T.RESULT
                                         ELSE '错误'
                                     END) AS RESULT,/*T.POLICY_CODE,*/T.BUSINESS_NODE,
                                                SUBSTR(T.ORGAN_CODE,0,6) AS ORGAN_CODE
                                           FROM (SELECT SLFH.ACCEPT_CODE,/*SLFH.POLICY_CODE,*/SLFH.BUSINESS_NODE,
                                                  --(CASE WHEN BUG.TC_ID IS NOT NULL THEN '错误' ELSE DESCRIP.RESULT END) AS RESULT,
                                                  (SELECT W.TC_ID FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID,',') WITHIN GROUP(ORDER BY N.TC_ID) AS TC_ID FROM TMP_SX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = SLFH.ACCEPT_CODE AND W.FIND_NODE = SLFH.BUSINESS_NODE) AS TC_ID,
                                                  --BUG.TC_ID,
                                                  DESCRIP.RESULT AS RESULT,
                                                  (CASE WHEN BUG.CREATE_DATE IS NULL THEN TRUNC(DESCRIP.SYS_INSERT_DATE) ELSE TRUNC(BUG.CREATE_DATE) END) AS SYS_INSERT_DATE,
                                                  (CASE WHEN D_U_TC.HD_USER_CODE IS NULL THEN D_U_DESC.HD_USER_CODE ELSE D_U_TC.HD_USER_CODE END) AS ORGAN_CODE
                                                  FROM TMP_QDSX_CS_SLFH_GM SLFH
                                              LEFT JOIN TMP_SX_TC_BUG BUG
                                                     ON BUG.BUSINESS_CODE = SLFH.ACCEPT_CODE
                                                     AND BUG.FIND_NODE = SLFH.BUSINESS_NODE
                                                     AND TRUNC(BUG.CREATE_DATE) = TRUNC(SLFH.SYS_INSERT_DATE)                            --AND BUG.POLICY_CODE = SLFH.POLICY_CODE
                                              LEFT JOIN TMP_QDSX_DAYPOST_DESCRIPTION DESCRIP
                                                     ON DESCRIP.BUSINESS_CODE = SLFH.ACCEPT_CODE
                                                    AND DESCRIP.POLICY_CODE = SLFH.POLICY_CODE
                                                    AND DESCRIP.BUSINESS_NODE = SLFH.BUSINESS_NODE
                                                    AND DESCRIP.BUSINESS_DATE = SLFH.SYS_INSERT_DATE
                                                    --AND TRUNC(DESCRIP.SYS_INSERT_DATE) = TRUNC(SYSDATE-2)
                                              LEFT JOIN TMP_DAYPOST_USER D_U_TC
                                                     ON D_U_TC.ACCOUNT = BUG.TC_USER_NAME
                                              LEFT JOIN TMP_DAYPOST_USER D_U_DESC
                                                     ON D_U_DESC.ACCOUNT = DESCRIP.HD_USER_NAME
                                                   /* WHERE ((TRUNC(BQDX.SYS_INSERT_DATE) BETWEEN TO_DATE('2019-08-19','YYYY-MM-DD') AND TRUNC(SYSDATE-2)) OR 
                        (TRUNC(DESCRIP.SYS_INSERT_DATE) BETWEEN TO_DATE('2019-08-19','YYYY-MM-DD') AND  TRUNC(SYSDATE-2)))*/
                                                    )  T  ---------------------------------------------------------
                                              WHERE T.ORGAN_CODE IS NOT NULL ".$where_time_bqsl."
                                            )  N  ------------------------------------------------------------------
                                     ON N.ORGAN_CODE = ORG.ORGAN_CODE
                              WHERE ORG.IS_VALID = '1'
                               GROUP BY ORG.ORGAN_CODE,ORG.ORGAN_NAME
                               ) A    -----------------------------------------------------保全受理复核柜面清单结束
                          LEFT JOIN (SELECT ORG.ORGAN_CODE,
                                            COUNT(N.BUSINESS_CODE) AS SLFH_WW_SUM,
                                            COUNT(CASE WHEN N.RESULT <> '正确' THEN 1 ELSE NULL END) AS BUG_NUM,
                                            DECODE(COUNT(N.BUSINESS_CODE),0,'100.00%', TRIM(TO_CHAR((COUNT(N.BUSINESS_CODE)-COUNT(CASE WHEN N.RESULT <> '正确' THEN 1 ELSE NULL END))/COUNT(N.BUSINESS_CODE)*100,'999D99')||'%')) RATE
                                       FROM ORGAN_CODE_NAME ORG
                                  LEFT JOIN (SELECT DISTINCT  T.ACCEPT_CODE AS BUSINESS_CODE,
                                     (CASE
                                         WHEN T.TC_ID IS NULL THEN T.RESULT
                                         ELSE '错误'
                                     END) AS RESULT,/*T.POLICY_CODE,*/T.BUSINESS_NODE,
                                                    SUBSTR(T.ORGAN_CODE,0,6) AS ORGAN_CODE
                                               FROM (SELECT SLWW.ACCEPT_CODE,/*SLWW.POLICY_CODE,*/SLWW.BUSINESS_NODE,
                                                  --(CASE WHEN BUG.TC_ID IS NOT NULL THEN '错误' ELSE DESCRIP.RESULT END) AS RESULT,
                                                  (SELECT W.TC_ID FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID,',') WITHIN GROUP(ORDER BY N.TC_ID) AS TC_ID FROM TMP_SX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = SLWW.ACCEPT_CODE AND W.FIND_NODE = SLWW.BUSINESS_NODE) AS TC_ID,
                                                  --BUG.TC_ID,
                                                  DESCRIP.RESULT AS RESULT,
                                                  (CASE WHEN BUG.CREATE_DATE IS NULL THEN TRUNC(DESCRIP.SYS_INSERT_DATE) ELSE TRUNC(BUG.CREATE_DATE) END) AS SYS_INSERT_DATE,
                                                  (CASE WHEN D_U_TC.HD_USER_CODE IS NULL THEN D_U_DESC.HD_USER_CODE ELSE D_U_TC.HD_USER_CODE END) AS ORGAN_CODE
                                                  FROM TMP_QDSX_CS_SLFH_WW SLWW
                                                  LEFT JOIN TMP_SX_TC_BUG BUG
                                                         ON BUG.BUSINESS_CODE = SLWW.ACCEPT_CODE
                                                        --AND BUG.POLICY_CODE = SLWW.POLICY_CODE
                                                         AND BUG.FIND_NODE = SLWW.BUSINESS_NODE
                                                         AND TRUNC(BUG.CREATE_DATE) = TRUNC(SLWW.SYS_INSERT_DATE)
                                                  LEFT JOIN TMP_QDSX_DAYPOST_DESCRIPTION DESCRIP
                                                         ON DESCRIP.BUSINESS_CODE = SLWW.ACCEPT_CODE
                                                        AND DESCRIP.POLICY_CODE = SLWW.POLICY_CODE
                                                        AND DESCRIP.BUSINESS_NODE = SLWW.BUSINESS_NODE
                                                        AND DESCRIP.BUSINESS_DATE = SLWW.SYS_INSERT_DATE
                                                    --AND TRUNC(DESCRIP.SYS_INSERT_DATE) = TRUNC(SYSDATE-2)
                                                  LEFT JOIN TMP_DAYPOST_USER D_U_TC
                                                         ON D_U_TC.ACCOUNT = BUG.TC_USER_NAME
                                                  LEFT JOIN TMP_DAYPOST_USER D_U_DESC
                                                         ON D_U_DESC.ACCOUNT = DESCRIP.HD_USER_NAME
                                                   /* WHERE ((TRUNC(BQDX.SYS_INSERT_DATE) BETWEEN TO_DATE('2019-08-19','YYYY-MM-DD') AND TRUNC(SYSDATE-2)) OR 
                        (TRUNC(DESCRIP.SYS_INSERT_DATE) BETWEEN TO_DATE('2019-08-19','YYYY-MM-DD') AND  TRUNC(SYSDATE-2)))*/
                                                    )  T  ---------------------------------------------------------
                                              WHERE T.ORGAN_CODE IS NOT NULL ".$where_time_bqsl."
                                            )  N  ------------------------------------------------------------------                         LEFT JOIN TMP_DAYPOST_USER D_U_DESC
                        
                                         ON N.ORGAN_CODE = ORG.ORGAN_CODE
                              WHERE ORG.IS_VALID = '1'
                                      GROUP BY ORG.ORGAN_CODE
                                    ) B  -----------------------------------------------------------------------------
                                 ON A.ORGAN_CODE = B.ORGAN_CODE
                          LEFT JOIN (SELECT ORG.ORGAN_CODE,
                                            COUNT(N.BUSINESS_CODE) AS BQDX_SUM,
                                            COUNT(CASE WHEN N.RESULT <> '正确' THEN 1 ELSE NULL END) AS BUG_NUM,
                                            DECODE(COUNT(N.BUSINESS_CODE),0,'100.00%', TRIM(TO_CHAR((COUNT(N.BUSINESS_CODE)-COUNT(CASE WHEN N.RESULT <> '正确' THEN 1 ELSE NULL END))/COUNT(N.BUSINESS_CODE)*100,'999D99')||'%')) RATE
                                       FROM ORGAN_CODE_NAME ORG
                                  LEFT JOIN (SELECT DISTINCT  T.CONTENT_ID AS BUSINESS_CODE,
                                     (CASE
                                         WHEN T.TC_ID IS NULL THEN T.RESULT
                                         ELSE '错误'
                                     END) AS RESULT,
                                                    SUBSTR(T.ORGAN_CODE,0,6) AS ORGAN_CODE
                                               FROM (SELECT BQDX.CONTENT_ID,
                                                  --(CASE WHEN BUG.TC_ID IS NOT NULL THEN '错误' ELSE DESCRIP.RESULT END) AS RESULT,
                                                  (SELECT W.TC_ID FROM (SELECT N.BUSINESS_CODE,N.FIND_NODE,LISTAGG(N.TC_ID,',') WITHIN GROUP(ORDER BY N.TC_ID) AS TC_ID FROM TMP_SX_TC_BUG N WHERE 1=1 GROUP BY N.BUSINESS_CODE,N.FIND_NODE) W WHERE W.BUSINESS_CODE = BQDX.CONTENT_ID AND W.FIND_NODE = BQDX.BUSINESS_NODE) AS TC_ID,
                                                  --BUG.TC_ID,
                                                  DESCRIP.RESULT AS RESULT,
                                                  (CASE WHEN BUG.CREATE_DATE IS NULL THEN TRUNC(DESCRIP.SYS_INSERT_DATE) ELSE TRUNC(BUG.CREATE_DATE) END) AS SYS_INSERT_DATE,
                                                  (CASE WHEN D_U_TC.HD_USER_CODE IS NULL THEN D_U_DESC.HD_USER_CODE ELSE D_U_TC.HD_USER_CODE END) AS ORGAN_CODE
                                                  FROM TMP_QDSX_CS_BQDX BQDX
                                                  LEFT JOIN TMP_SX_TC_BUG BUG
                                                         ON BUG.BUSINESS_CODE = BQDX.CONTENT_ID
                                                         AND BUG.FIND_NODE = BQDX.BUSINESS_NODE
                                                        AND TRUNC(BUG.CREATE_DATE) = TRUNC(BQDX.SYS_INSERT_DATE)
                                                  LEFT JOIN TMP_QDSX_DAYPOST_DESCRIPTION DESCRIP
                                                         ON DESCRIP.BUSINESS_CODE = BQDX.CONTENT_ID
                                                        AND DESCRIP.BUSINESS_NODE = BQDX.BUSINESS_NODE
                                                        AND DESCRIP.BUSINESS_DATE = BQDX.SYS_INSERT_DATE
                                                    --AND TRUNC(DESCRIP.SYS_INSERT_DATE) = TRUNC(SYSDATE-2)
                                                  LEFT JOIN TMP_DAYPOST_USER D_U_TC
                                                         ON D_U_TC.ACCOUNT = BUG.TC_USER_NAME
                                                  LEFT JOIN TMP_DAYPOST_USER D_U_DESC
                                                         ON D_U_DESC.ACCOUNT = DESCRIP.HD_USER_NAME
                                                   /* WHERE ((TRUNC(BQDX.SYS_INSERT_DATE) BETWEEN TO_DATE('2019-08-19','YYYY-MM-DD') AND TRUNC(SYSDATE-2)) OR 
                        (TRUNC(DESCRIP.SYS_INSERT_DATE) BETWEEN TO_DATE('2019-08-19','YYYY-MM-DD') AND  TRUNC(SYSDATE-2)))*/
                                                    )  T  ---------------------------------------------------------
                                              WHERE T.ORGAN_CODE IS NOT NULL ".$where_time_bqsl."
                                            )  N  ------------------------------------------------------------------
                                         ON N.ORGAN_CODE = ORG.ORGAN_CODE
                              WHERE ORG.IS_VALID = '1'
                                      GROUP BY ORG.ORGAN_CODE
                                    ) C  ---------------------------------------------------------------------------
                                 ON A.ORGAN_CODE = C.ORGAN_CODE";
        $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
        $bqsl_result_time = $method->search_long($result_rows);
        Log::write($user_name . ' 保全日报区间查询SQL：' . $select_bqsl, 'INFO');
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
        $user_name = "";
        $method->checkIn($user_name);
        $organCode = $method->getUserOrganCode();
        $day_post_organ = $method->getSxDaypostOrgan($user_name);
        if (!empty($queryDateStart)) {
            $where_time_bqsl = " AND (ORGAN_CODE = '8600' OR ORGAN_CODE LIKE '".$day_post_organ."%') AND SYS_INSERT_DATE = to_date('" . $queryDateStart . "','yyyy-mm-dd')";
        } else {
            $where_time_bqsl = " AND (ORGAN_CODE = '8600' OR ORGAN_CODE LIKE '".$day_post_organ."%')  AND SYS_INSERT_DATE = TRUNC(SYSDATE) ";
        }
        $dictIndex = $method->getDictIndex($day_post_organ);
        $DictArry = $method->getDictArry($day_post_organ);
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
                                 WHERE 1=1 AND ORGAN_CODE NOT IN ('8633','8600') ".$where_time_bqsl."
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

    public function getDayPostAllThis(){
        $queryDateStart = I('get.queryDateStart');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $user_name = "";
        $method->checkIn($user_name);
        $organCode = $method->getUserOrganCode();
        $day_post_organ = $method->getSxDaypostOrgan($user_name);
        if (!empty($queryDateStart)) {
            $where_time_bqsl = " AND ORGAN_CODE LIKE '".$day_post_organ."%' AND INSERT_DATE = to_date('" . $queryDateStart . "','yyyy-mm-dd')";
        } else {
            $where_time_bqsl = " AND ORGAN_CODE LIKE '".$day_post_organ."%' AND INSERT_DATE = TRUNC(SYSDATE) ";
        }
        $dictIndex = $method->getDictIndex($day_post_organ);
        $DictArry = $method->getDictArry($day_post_organ);
        for ($i = 0; $i < sizeof($DictArry); $i++) {
            $result[] = array("org" => $DictArry[$i],"NB_CHECK_SUM" => 0,"NB_BUG_SUM" => 0,"NB_ACCURACY" => 0,
                "UW_CHECK_SUM" => 0,"UW_BUG_SUM" => 0,"UW_ACCURACY" => 0,
                "CS_CHECK_SUM" => 0,"CS_BUG_SUM" => 0,"CS_ACCURACY" => 0,
                "CLM_CHECK_SUM" => 0,"CLM_BUG_SUM" => 0,"CLM_ACCURACY" => 0);
        }
        $select_bqsl = "SELECT * FROM TMP_SX_ALL_DAYPOST 
                                 WHERE 1=1 ".$where_time_bqsl;
        $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
        Log::write($user_name . ' 数据库查询SQL：' . $select_bqsl, 'INFO');
        $bqsl_result_time = $method->search_long($result_rows);
        for ($i = 0; $i < sizeof($bqsl_result_time); $i++) {
            $value = $bqsl_result_time[$i];
            $result[$dictIndex[$value['ORGAN_NAME']]]['NB_CHECK_SUM'] = $value['NB_CHECK_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['NB_BUG_SUM'] = $value['NB_BUG_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['NB_ACCURACY'] = $value['NB_ACCURACY'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['UW_CHECK_SUM'] = $value['UW_CHECK_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['UW_BUG_SUM'] = $value['UW_BUG_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['UW_ACCURACY'] = $value['UW_ACCURACY'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['CS_CHECK_SUM'] = $value['CS_CHECK_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['CS_BUG_SUM'] = $value['CS_BUG_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['CS_ACCURACY'] = $value['CS_ACCURACY'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['CLM_CHECK_SUM'] = $value['CLM_CHECK_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['CLM_BUG_SUM'] = $value['CLM_BUG_SUM'];
            $result[$dictIndex[$value['ORGAN_NAME']]]['CLM_ACCURACY'] = $value['CLM_ACCURACY'];
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
        $user_name = "";
        $method->checkIn($user_name);
        $organCode = $method->getUserOrganCode();
        $day_post_organ = $method->getSxDaypostOrgan($user_name);
        if (!empty($queryDateStart)) {
            $where_time_bqsl = " AND (ORGAN_CODE = '8600' OR ORGAN_CODE LIKE '".$day_post_organ."%') AND SYS_INSERT_DATE = to_date('" . $queryDateStart . "','yyyy-mm-dd')";
        } else {
            $where_time_bqsl = " AND (ORGAN_CODE = '8600' OR ORGAN_CODE LIKE '".$day_post_organ."%')  AND SYS_INSERT_DATE = TRUNC(SYSDATE) ";
        }
        $dictIndex = $method->getDictIndex($day_post_organ);
        $DictArry = $method->getDictArry($day_post_organ);
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
                                WHERE 1=1 AND ORGAN_CODE NOT IN ('8633','8600') ".$where_time_bqsl."
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