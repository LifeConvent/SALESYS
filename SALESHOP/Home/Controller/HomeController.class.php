<?php
/**
 * Created by PhpStorm.
 * User: lawrance
 * Date: 2016/11/6
 * Time: 下午11:04
 */

namespace Home\Controller;

use Think\Controller;
use Think\Log;

class HomeController extends Controller
{
    public function home()
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

    public function postHome()
    {
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        $type =  $method->getUserTypeBySql($username);
        $can =  $method->getCanDayPostBySql($username);
        if ($result) {
            $res = $this->dealHomeCount();
            $j=0;
            for ($i = 6; $i >= 0; $i--) {
                $new[$j] = (int)$res[$i]['new'];//new
                $tc_time[$j] = $res[$i]['time_tc'];//time_tc
                $all_user[$j] = (int)$res[$i]['all_user'];
                $nb_time[$j] = $res[$i]['time_nb'];
                $survey[$j] = (int)$res[$i]['survey'];
                $clm_time[$j] = $res[$i]['time_clm'];
                $is_match[$j] = (int)$res[$i]['is_match'];
                $cs_time[$j] = $res[$i]['time_cs'];
                $j++;
            }
                $new_ = (int)$res['tc_sum'];//tc_sum
                $all_user_ = (int)$res['nb_sum'];
                $survey_ = (int)$res['clm_sum'];
                $is_match_ = (int)$res['cs_sum'];
            Log::write('TC总数：'.$new_,'INFO');
            //发出微信端数据统计请求，访问数据库获取近来评价数据四数组大小为7，过7不与
            $this->assign('count', $is_match_);
            $this->assign('count1', $survey_);
            $this->assign('count2', $all_user_);
            $this->assign('count3', $new_);

            $this->assign('weChatMatch', json_encode($is_match));
            $this->assign('weChatSub', json_encode($new));
            $this->assign('weChatNum', json_encode($all_user));
            $this->assign('weCESNum', json_encode($survey));

            $this->assign('cs_time', json_encode($cs_time));
            $this->assign('tc_time', json_encode($tc_time));
            $this->assign('nb_time', json_encode($nb_time));
            $this->assign('clm_time', json_encode($clm_time));

//            dump($is_match);
//            dump($new);
//            dump($all_user);
//            dump($survey);
//            dump($is_match_);
//            dump($new_);
//            dump($all_user_);
//            dump($survey_);
//            dump($is_match_time);
//            dump($new_time);
//            dump($all_user_time);
//            dump($survey_time);
            $this->assign('TITLE', TITLE);
            $this->assign('username', $username);
            $this->assign('user_name', $username);
            $this->assign('user_type', $type);
            $this->assign('user_day_post', $can);
            $this->assign('list_type',  $method->getListTypeBySql($username));
            $this->assign('username_chinese', $method->getUserCNNameBySql($username));
            if(!$method->getSystype($username)){
                $this->redirect('Index/errorSys');
            }
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function login($user, $pass)
    {
        if ($user == null || $pass == null) {
            return false;
        } else {
            $index = new IndexController();
            $res = $index->searchUser($user, $pass);
            if ($res) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function dealHomeCount()
    {
        /**
         * 在部署到服务器之前都是用模拟数据
         */
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $select_cs = "DELETE FROM TMP_QDSX_TIME";
        $result_rows = oci_parse($conn, $select_cs); // 配置SQL语句，执行SQL
        oci_execute($result_rows,OCI_COMMIT_ON_SUCCESS);
        $select_cs = "INSERT INTO TMP_QDSX_TIME (NEW_INSERT_TIME,NUM) VALUES(TRUNC(SYSDATE),0)";
        $result_rows = oci_parse($conn, $select_cs); // 配置SQL语句，执行SQL
        oci_execute($result_rows,OCI_COMMIT_ON_SUCCESS);
        $select_cs = "INSERT INTO TMP_QDSX_TIME (NEW_INSERT_TIME,NUM) VALUES(TRUNC(SYSDATE-1),0)";
        $result_rows = oci_parse($conn, $select_cs); // 配置SQL语句，执行SQL
        oci_execute($result_rows,OCI_COMMIT_ON_SUCCESS);
        $select_cs = "INSERT INTO TMP_QDSX_TIME (NEW_INSERT_TIME,NUM) VALUES(TRUNC(SYSDATE-2),0)";
        $result_rows = oci_parse($conn, $select_cs); // 配置SQL语句，执行SQL
        oci_execute($result_rows,OCI_COMMIT_ON_SUCCESS);
        $select_cs = "INSERT INTO TMP_QDSX_TIME (NEW_INSERT_TIME,NUM) VALUES(TRUNC(SYSDATE-3),0)";
        $result_rows = oci_parse($conn, $select_cs); // 配置SQL语句，执行SQL
        oci_execute($result_rows,OCI_COMMIT_ON_SUCCESS);
        $select_cs = "INSERT INTO TMP_QDSX_TIME (NEW_INSERT_TIME,NUM) VALUES(TRUNC(SYSDATE-4),0)";
        $result_rows = oci_parse($conn, $select_cs); // 配置SQL语句，执行SQL
        oci_execute($result_rows,OCI_COMMIT_ON_SUCCESS);
        $select_cs = "INSERT INTO TMP_QDSX_TIME (NEW_INSERT_TIME,NUM) VALUES(TRUNC(SYSDATE-5),0)";
        $result_rows = oci_parse($conn, $select_cs); // 配置SQL语句，执行SQL
        oci_execute($result_rows,OCI_COMMIT_ON_SUCCESS);
        $select_cs = "INSERT INTO TMP_QDSX_TIME (NEW_INSERT_TIME,NUM) VALUES(TRUNC(SYSDATE-6),0)";
        $result_rows = oci_parse($conn, $select_cs); // 配置SQL语句，执行SQL
        oci_execute($result_rows,OCI_COMMIT_ON_SUCCESS);
        # 时间-time-YYYY-MM-DD
        # TC缺陷总量-new
        # 契约作业量-allUser
        # 理赔作业量-survey
        # 保全作业量-is_match
        #####################################################################  保全数据查询  #####################################################################
        #039
        $select_cs = "SELECT SUM(NUM) AS NUM FROM (SELECT COUNT(*) AS NUM FROM TMP_QDSX_CS_SLFH_GM WHERE SYS_INSERT_DATE IS NOT NULL GROUP BY SYS_INSERT_DATE)";
        $result_rows = oci_parse($conn, $select_cs); // 配置SQL语句，执行SQL
        $cs_result = $method->search_long($result_rows);
        $result['cs_sum'] =$cs_result[0]['NUM'];
        $select_cs = "SELECT TO_CHAR(A.NEW_INSERT_TIME,'YYYY-MM-DD') AS NEW_INSERT_TIME,
                              (CASE 
                                 WHEN B.NUM IS NULL THEN A.NUM ELSE B.NUM
                              END) AS NUM
                        FROM TMP_QDSX_TIME A LEFT JOIN
                        (SELECT * FROM (SELECT TO_CHAR(SYS_INSERT_DATE,'YYYY-MM-DD') AS NEW_INSERT_TIME,COUNT(*) AS NUM FROM TMP_QDSX_CS_SLFH_GM WHERE SYS_INSERT_DATE IS NOT NULL GROUP BY SYS_INSERT_DATE ORDER BY SYS_INSERT_DATE DESC) WHERE ROWNUM<8) B
                        ON TO_CHAR(A.NEW_INSERT_TIME,'YYYY-MM-DD') = B.NEW_INSERT_TIME  ORDER BY TO_CHAR(A.NEW_INSERT_TIME,'YYYY-MM-DD') ";
        $result_rows = oci_parse($conn, $select_cs); // 配置SQL语句，执行SQL
        $cs_result_new_time = $method->search_long($result_rows);
        for($i=0;$i<7;$i++){
            $result[$i]['time_cs'] = $cs_result_new_time[$i]['NEW_INSERT_TIME'];
            $result[$i]['is_match'] = $cs_result_new_time[$i]['NUM'];
        }
        #####################################################################  契约数据查询  #####################################################################
        #039
        $select_cs = "SELECT SUM(NUM) AS NUM FROM (SELECT COUNT(*) AS NUM FROM TMP_QDSX_NB_BXHT WHERE SYS_INSERT_DATE IS NOT NULL GROUP BY TO_CHAR(SYS_INSERT_DATE,'YYYY-MM-DD'))";
        $result_rows = oci_parse($conn, $select_cs); // 配置SQL语句，执行SQL
        $cs_result = $method->search_long($result_rows);
        $result['nb_sum'] =$cs_result[0]['NUM'];
        $select_nb = "SELECT TO_CHAR(A.NEW_INSERT_TIME,'YYYY-MM-DD') AS NEW_INSERT_TIME,
                              (CASE 
                                 WHEN B.NUM IS NULL THEN A.NUM ELSE B.NUM
                              END) AS NUM
                        FROM TMP_QDSX_TIME A LEFT JOIN
                        (SELECT * FROM (SELECT TO_CHAR(SYS_INSERT_DATE,'YYYY-MM-DD') AS NEW_INSERT_TIME,COUNT(*) AS NUM FROM TMP_QDSX_NB_BXHT WHERE SYS_INSERT_DATE IS NOT NULL GROUP BY SYS_INSERT_DATE ORDER BY SYS_INSERT_DATE DESC) WHERE ROWNUM<8) B
                        ON TO_CHAR(A.NEW_INSERT_TIME,'YYYY-MM-DD') = B.NEW_INSERT_TIME  ORDER BY TO_CHAR(A.NEW_INSERT_TIME,'YYYY-MM-DD') ";
        $result_rows = oci_parse($conn, $select_nb); // 配置SQL语句，执行SQL
        $nb_result_new_time = $method->search_long($result_rows);
        for($i=0;$i<7;$i++){
            $result[$i]['time_nb'] = $nb_result_new_time[$i]['NEW_INSERT_TIME'];
            $result[$i]['all_user'] = $nb_result_new_time[$i]['NUM'];
        }
        #####################################################################  理赔数据查询  #####################################################################
        #039
        $select_cs = "SELECT SUM(NUM) AS NUM FROM (SELECT COUNT(*) AS NUM FROM TMP_QDSX_CLM WHERE SYS_INSERT_DATE IS NOT NULL GROUP BY SYS_INSERT_DATE)";
        $result_rows = oci_parse($conn, $select_cs); // 配置SQL语句，执行SQL
        $cs_result = $method->search_long($result_rows);
        $result['clm_sum'] =$cs_result[0]['NUM'];
        $select_clm = "SELECT TO_CHAR(A.NEW_INSERT_TIME,'YYYY-MM-DD') AS NEW_INSERT_TIME,
                              (CASE 
                                 WHEN B.NUM IS NULL THEN A.NUM ELSE B.NUM
                              END) AS NUM
                        FROM TMP_QDSX_TIME A LEFT JOIN
                        (SELECT * FROM (SELECT TO_CHAR(SYS_INSERT_DATE,'YYYY-MM-DD') AS NEW_INSERT_TIME,COUNT(*) AS NUM FROM TMP_QDSX_CLM WHERE SYS_INSERT_DATE IS NOT NULL GROUP BY SYS_INSERT_DATE ORDER BY SYS_INSERT_DATE DESC) WHERE ROWNUM<8) B
                        ON TO_CHAR(A.NEW_INSERT_TIME,'YYYY-MM-DD') = B.NEW_INSERT_TIME  ORDER BY TO_CHAR(A.NEW_INSERT_TIME,'YYYY-MM-DD') ";
        $result_rows = oci_parse($conn, $select_clm); // 配置SQL语句，执行SQL
        $clm_result_new_time = $method->search_long($result_rows);
        for($i=0;$i<7;$i++){
            $result[$i]['time_clm'] = $clm_result_new_time[$i]['NEW_INSERT_TIME'];
            $result[$i]['survey'] = $clm_result_new_time[$i]['NUM'];
        }
        #####################################################################  TC数据查询  #####################################################################
        $tc_cursor = M();
        $tcSQl = $method->getTcSql();
        $res = $tc_cursor->query($tcSQl['home_sum']);
        $select_cs = "SELECT TO_CHAR(NEW_INSERT_TIME,'YYYY-MM-DD') AS NEW_INSERT_TIME FROM TMP_QDSX_TIME";
        $result_rows = oci_parse($conn, $select_cs); // 配置SQL语句，执行SQL
        $cs_result = $method->search_long($result_rows);
        for($i=0;$i<7;$i++){
            $result[$i]['time_tc'] = $cs_result[$i]['NEW_INSERT_TIME'];
            $result[$i]['new'] = 0;
            for($j=0;$j<7;$j++){
                if(strcmp($cs_result[$i]['NEW_INSERT_TIME'],$res[$j]['time'])==0){
                    $result[$i]['new'] = $res[$j]['num'];
                }
            }
        }
        Log::write('Oracle插入时间：'.$cs_result[$i]['NEW_INSERT_TIME'].'TC查询时间：'.$res[$j]['time'],'INFO');
        $res_tc = $tc_cursor->query("SELECT COUNT(*) AS num FROM bug_table ");
        $result['tc_sum'] = $res_tc[0]['num'];
        Log::write('TC总数：'.$res_tc[0]['num'],'INFO');
        oci_free_statement($result_rows);
        oci_close($conn);
//        dump($result);
        return $result;
    }

    public function getTotalUser()
    {
        $user = M();
        $result = $user->where('openid!=\'NULL\'')
            ->table('tb_user')
            ->field('count(*)')
            ->query('SELECT %FIELD% AS total FROM %TABLE% %WHERE%', true);
        if ($result) {
            return $result[0]['total'];
        } else {
            return 0;
        }
    }

    public function getTotalSurvey()
    {
        $user = M();
        $result = $user->table('tb_survey_plan')
            ->field('count(*)')
            ->query('SELECT %FIELD% AS total FROM %TABLE%', true);
        if ($result) {
            return $result[0]['total'];
        } else {
            return 0;
        }
    }

    public function getWeChatSee()
    {
        return $this->https_request('http://localhost/CES/index.php/Home/Data/getTotalUser');
    }

    public function https_request($url, $data = null)
    {
        $curl = curl_init();
        if (class_exists('/CURLFile')) {//php5.5跟php5.6中的CURLOPT_SAFE_UPLOAD的默认值不同
            curl_setopt($curl, CURLOPT_SAFE_UPLOAD, true);
        } else {
            if (defined('CURLOPT_SAFE_UPLOAD')) {
                curl_setopt($curl, CURLOPT_SAFE_UPLOAD, false);
            }
        }
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        if (!empty($data)) {
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }
}