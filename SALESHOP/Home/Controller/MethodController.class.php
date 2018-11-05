<?php
/**
 * Created by PhpStorm.
 * User: lawrance
 * Date: 2016/11/24
 * Time: 下午1:32
 */

namespace Home\Controller;
use Think\Controller;

class MethodController extends Controller
{

    public function getUserID(&$ID){
        $token = $_SESSION['token'];
        $token = $this->decode($token);
        $info = explode('-', $token);
        if ($info[2] == 'success') {
            $ID = $info[3];
        }
    }
    /**
     * 简单对称加密算法之加密
     * @param String $string 需要加密的字串
     * @param String $skey 加密EKY
     * @return String
     */
    public function encode($string = '', $skey = 'SALESYStem-^@%$*#&^!(*')
    {
        $strArr = str_split(base64_encode($string));
        $strCount = count($strArr);
        foreach (str_split($skey) as $key => $value)
            $key < $strCount && $strArr[$key] .= $value;
        return str_replace(array('=', '+', '/'), array('O0O0O', 'o000o', 'oo00o'), join('', $strArr));
    }

    /**
     * 简单对称加密算法之解密
     * @param String $string 需要解密的字串
     * @param String $skey 解密KEY
     * @return String
     */
    public function decode($string = '', $skey = 'SALESYStem-^@%$*#&^!(*')
    {
        $strArr = str_split(str_replace(array('O0O0O', 'o000o', 'oo00o'), array('=', '+', '/'), $string), 2);
        $strCount = count($strArr);
        foreach (str_split($skey) as $key => $value)
            $key <= $strCount && isset($strArr[$key]) && $strArr[$key][1] === $value && $strArr[$key] = $strArr[$key][0];
        return base64_decode(join('', $strArr));
    }

    public function checkIn(&$admin)
    {
        $token = $_SESSION['token'];
        $token = $this->decode($token);
        $info = explode('-', $token);
        if (strcmp($info[2],"success") == 0) {
            $admin = $info[0];
            if($this->publicCheck()){
                return false;
            }
            if ($info[1] - time() <= 7) {
                return true;
            } else {
                return false;
            }
        }

    }

    public function getUserType()
    {
        $token = $_SESSION['token'];
        $token = $this->decode($token);
        $info = explode('-', $token);
        if ($info[2] == 'success') {
            return $info[3];
        }
    }

    public function getUserTypeJson()
    {
        $result['status'] = 'success';
        $result['type'] = $this->getUserType();
        exit(json_encode($result));
    }

    public function getUserName()
    {
        $token = $_SESSION['token'];
        $token = $this->decode($token);
        $info = explode('-', $token);
        if ($info[2] == 'success') {
            return $info[0];
        }
    }

    public function back()
    {
        $_SESSION['token'] = '';
        $this->redirect('Index/index');
    }

    public function getSysResponse()
    {
        $sysResponse = M('auto_response');
        $result = $sysResponse->select();
        exit(json_encode($result));
    }

    public function searchUserInput()
    {
        $user_input = I('get.u_i');
        $sysResponse = M();
        $result = $sysResponse->where('user_input LIKE \'' . $user_input . '%\'')
            ->table('tb_auto_response')
            ->query('SELECT * FROM %TABLE% %WHERE%', true);
        if ($result) {
            exit(json_encode($result));
        } else {
            exit('');
        }
    }

    public function deleteRes()
    {
        $id = I('post.id');
        $condition['id'] = "$id";
        $sysResponse = M('auto_response');
        $res = $sysResponse->where($condition)->delete();
        if ($res) {
            $result['status'] = 'success';
            $result['message'] = '删除成功！';
        } else {
            $result['status'] = 'failed';
            $result['message'] = '删除失败！';
        }
        exit(json_encode($result));
    }

    public function modifyRes()
    {
        $id = I('post.id');
        $user_input = I('post.user_input');
        $sys_response = I('post.sys_response');
        $sys_response_type = I('post.sys_response_type');
        $temp['id'] = "$id";
        $condition['user_input'] = "$user_input";
        $condition['sys_response'] = "$sys_response";
        $condition['sys_response_type'] = "$sys_response_type";
        $sysResponse = M('auto_response');
        $res = $sysResponse->where($temp)->save($condition);
        if ($res) {
            $result['status'] = 'success';
            $result['message'] = '修改成功！';
        } else {
            $result['status'] = 'failed';
            $result['message'] = '修改失败！';
        }
        exit(json_encode($result));
    }

    public function getSurvey()
    {
        $survey = M('survey');
        $result = $survey->field('g.group_name,name,survey_id,level,owner')
            ->table('tb_survey_group')
            ->where('g.group_id=s.survey_group')
            ->query("SELECT %FIELD% FROM tb_survey AS s, %TABLE% AS g %WHERE% ", true);
        for ($i = 0; $i < sizeof($result); $i++) {
            switch ($result[$i]['level']) {
                case '1':
                    $result[$i]['level'] = '系级';
                    break;
                case '2':
                    $result[$i]['level'] = '院级';
                    break;
                case '3':
                    $result[$i]['level'] = '校级';
                    break;
            }
        }
        if ($result) {
            exit(json_encode($result));
        } else {
            exit(json_encode(''));
        }
    }

    public function OracleOldDBCon()
    {
        //取数据库参数
        $db_host_name='10.1.168.5/DMGdb';
        $db_user_name='ncl_1';
        $db_pwd='ncl_1';
        //连接Oracle
        $conn = oci_connect($db_user_name,$db_pwd,$db_host_name);
        if (!$conn) {
            $e = oci_error();
            return false;
        }
        else {
            return $conn;
        }
    }

    public function getDictArry(){
        $org = array("本部","李沧","平度","胶南","即墨","胶州","城阳","莱西","开发区","市南","小计","分公司核保室","分公司保全室","分公司理赔室","总公司作业中心","合计");
        return $org;
    }

    public function reloadTc(){
        //解除30s限制
        set_time_limit(0);
        //重加载TC数据
        $queryTc = "select b.bug_new_id,b.date_submitted, u.id,b.severity,b.`status`,c.value15,c.value16,c.value17,c.value18 from bug_table b ,custom_field_value_table c,`user_table` u  where u.id = b.reporter_id and b.id = c.bug_id";
        //查询TC数据
        $tc_cursor = M();
        $res = $tc_cursor->query($queryTc);
        for($i=0;$i<=sizeof($res);$i++){
            $result[$i]['ID'] = $res[$i]['bug_new_id'];
            $result[$i]['CREATE_TIME'] = $res[$i]['date_submitted'];
            $result[$i]['PONDERANCE'] = $res[$i]['severity'];
            $result[$i]['STATE'] = $res[$i]['status'];
            $result[$i]['LOCAL'] = $res[$i]['value16'];
            $result[$i]['FIND_NODE'] = $res[$i]['value17'];
            $result[$i]['POLICY_CODE'] = $res[$i]['value18'];
        }
        //连接数据库
        $conn = $this->OracleOldDBCon();
        $statement = oci_parse($conn,"delete from tmp_tc_cdqcb");
        echo "清空现有TC数据 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        foreach ($result as &$value) {
            $ID = $value['ID'];
            $CREAT_TIME = $value['CREATE_TIME'];
            $PONDERANCE = $value['PONDERANCE'];
            $STATE = $value['STATE'];
            $LOCAL = $value['LOCAL'];
            $FIND_NODE = $value['FIND_NODE'];
            $POLICY_CODE = $value['POLICY_CODE'];
            $query_insert = "INSERT INTO TMP_TC_CDQCB(ID,CREAT_TIME,PONDERANCE,STATE,LOCAL,FIND_NODE,POLICY_CODE) VALUES('".$ID."',to_date('".$CREAT_TIME."','YYYY/MM/DD hh24:mi:ss'),'".$PONDERANCE."','".$STATE."','".$LOCAL."','".$FIND_NODE."','".$POLICY_CODE."')";
//          echo $query_insert;
            $statement = oci_parse($conn,$query_insert);
            echo $ID."单条插入 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        }
        oci_free_statement($statement);
        oci_close($conn);
        //加载TC数据
        $this->getImpTc();
    }

    public function getImpTc(){
        $conn = $this->OracleOldDBCon();
        //回写TC数据
        $update_nb_sql = "update tmp_bx_old_cdqcb  tt set tt.tc_id  = (select id from (select trim(policy_code) policy_code, (LISTAGG(id, ',') WITHIN group(order by id)) as id  from tmp_tc_cdqcb t  where t.policy_code is not null  group by trim(t.policy_code)) tc where trim(tc.policy_code) = trim(tt.OLD_APPL_CODE))";
        $update_uw_sql = "update TMP_UW_LIST  tt set tt.tc_id  = (select id from (select trim(policy_code) policy_code, (LISTAGG(id, ',') WITHIN group(order by id)) as id  from tmp_tc_cdqcb t  where t.policy_code is not null group by trim(t.policy_code)) tc where trim(tc.policy_code) = trim(tt.OLD_APPLE_CODE))";
        $update_clm_sl_sql = "update TMP_NCS_QD_BX_LPBA_BD  tt set tt.tc_id  = (select id from (select trim(policy_code) policy_code, (LISTAGG(id, ',') WITHIN group(order by id)) as id  from tmp_tc_cdqcb t  where t.policy_code is not null  group by trim(t.policy_code)) tc where trim(tc.policy_code) = trim(tt.OLD_CASE_CODE))";
        $update_clm_sp_sql = "update TMP_NCS_QD_BX_LPSHSP_BD  tt set tt.tc_id  = (select id from (select trim(policy_code) policy_code, (LISTAGG(id, ',') WITHIN group(order by id)) as id  from tmp_tc_cdqcb t  where t.policy_code is not null  group by trim(t.policy_code)) tc where trim(tc.policy_code) = trim(tt.OLD_CASE_CODE))";
        $update_cs_sl_sql = "update TMP_NCS_QD_BX_BQSL_BD  tt set tt.tc_id  = (select id from (select trim(policy_code) policy_code, (LISTAGG(id, ',') WITHIN group(order by id)) as id  from tmp_tc_cdqcb t  where t.policy_code is not null  group by trim(t.policy_code)) tc where trim(tc.policy_code) = trim(tt.OLD_ACCEPT_CODE))";
        $update_cs_sp_sql = "update TMP_NCS_QD_BX_BQFH_BD  tt set tt.tc_id  = (select id from (select trim(policy_code) policy_code, (LISTAGG(id, ',') WITHIN group(order by id)) as id  from tmp_tc_cdqcb t  where t.policy_code is not null  group by trim(t.policy_code)) tc where trim(tc.policy_code) = trim(tt.OLD_ACCEPT_CODE))";
        $statement = oci_parse($conn,$update_nb_sql);
        //增加日志记录节点（所有无输出的数据库查询）
        echo "执行更新结果 <br>";
        echo "契约部分-TC刷新-刷新结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)."<br>";
        $statement = oci_parse($conn,$update_uw_sql);
        echo "核保-TC刷新-刷新结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)."<br>";
        $statement = oci_parse($conn,$update_clm_sl_sql);
        echo "理赔受理-TC刷新-刷新结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)."<br>";
        $statement = oci_parse($conn,$update_clm_sp_sql);
        echo "理赔审核审批-TC刷新-刷新结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)."<br>";
        $statement = oci_parse($conn,$update_cs_sl_sql);
        echo "保全受理-TC刷新-刷新结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)."<br>";
        $statement = oci_parse($conn,$update_cs_sp_sql);
        echo "保全复核-TC刷新-刷新结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)."<br>";
        //释放资源
        oci_free_statement($statement);
        oci_close($conn);
    }

    public function loadDate(){
        $conn = $this->OracleOldDBCon();
        //灌数脚本--存储过程调用
        $update_data = '';
        $statement = oci_parse($conn,$update_data);
        oci_free_statement($statement);
        oci_close($conn);

    }

    public function getUserLock($user_account){
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $user_select  = "SELECT IS_LOCK FROM TMP_DAYPOST_USER WHERE ACCOUNT = '".$user_account."'";
        $result_rows = oci_parse($conn, $user_select); // 配置SQL语句，执行SQL
        $user_result =  $method->search_long($result_rows);
        oci_free_statement($result_rows);
        oci_close($conn);
//        dump($user_result);
        if((int)$user_result[0]['IS_LOCK'] == 1){
            return true;
        }else{
            return false;
        }
    }

    public function publicCheck(){
        //公共用户锁定校验部分
        $token = $_SESSION['token'];
        $token = $this->decode($token);
//        dump($token);
        $info = explode('-', $token);
        if (strcmp($info[2],"success") == 0) {
            $admin = $info[0];
        }
        return $this->getUserLock($admin);
    }

    public function getUserOrganCode(){
//        $org_code = array(
//            "gaobiao_bx" => "8647",
//            "tangjia_bx" => "86470005",
//            "zhaoran_bx" => "86470005");
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $user_select  = "SELECT ACCOUNT,USER_ORGAN_CODE FROM TMP_DAYPOST_USER";
        $result_rows = oci_parse($conn, $user_select); // 配置SQL语句，执行SQL
        $user_result =  $method->search_long($result_rows);
        for($i=0;$i<sizeof($user_result);$i++){
            $org_code[$user_result[$i]['ACCOUNT']] = $user_result[$i]['USER_ORGAN_CODE'];
        }
//        数据处理
        oci_free_statement($result_rows);
        oci_close($conn);
//        dump($org_code);
        return $org_code;
    }

    public function getFuheUser(){
//        $org = array("tangjia_bx","tangjia2_bx");
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $user_select  = "SELECT ACCOUNT FROM TMP_DAYPOST_USER WHERE BUSS_AREA = '保全复核'";
        $result_rows = oci_parse($conn, $user_select); // 配置SQL语句，执行SQL
        $user_result =  $method->search_long($result_rows);
        for($i=0;$i<sizeof($user_result);$i++){
            $org[$i] = $user_result[$i]['ACCOUNT'];
        }
//        数据处理
        oci_free_statement($result_rows);
        oci_close($conn);
//        dump($org);
//        $token = $_SESSION['token'];
//        $token = $this->decode($token);
//        $info = explode('-', $token);
//        dump($token);
        return $org;
    }

    public function getClmUser(){
//        $org = array("","");
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $user_select  = "SELECT ACCOUNT FROM TMP_DAYPOST_USER WHERE BUSS_AREA = '理赔审核'";
        $result_rows = oci_parse($conn, $user_select); // 配置SQL语句，执行SQL
        $user_result =  $method->search_long($result_rows);
        for($i=0;$i<sizeof($user_result);$i++){
            $org[$i] = $user_result[$i]['ACCOUNT'];
        }
//        数据处理
        oci_free_statement($result_rows);
        oci_close($conn);
//        dump($org);
        return $org;
    }

    public function getOtherUser(){
//        $org = array("","");
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $user_select  = "SELECT ACCOUNT FROM TMP_DAYPOST_USER WHERE BUSS_AREA = '异地作业'";
        $result_rows = oci_parse($conn, $user_select); // 配置SQL语句，执行SQL
        $user_result =  $method->search_long($result_rows);
        for($i=0;$i<sizeof($user_result);$i++){
            $org[$i] = $user_result[$i]['ACCOUNT'];
        }
//        数据处理
        oci_free_statement($result_rows);
        oci_close($conn);
//        dump($org);
        return $org;
    }

    public function getUwUser(){
//        $org = array("yangyixuan_bx","");
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $user_select  = "SELECT ACCOUNT FROM TMP_DAYPOST_USER WHERE BUSS_AREA = '核保'";
        $result_rows = oci_parse($conn, $user_select); // 配置SQL语句，执行SQL
        $user_result =  $method->search_long($result_rows);
        for($i=0;$i<sizeof($user_result);$i++){
            $org[$i] = $user_result[$i]['ACCOUNT'];
        }
//        数据处理
        oci_free_statement($result_rows);
        oci_close($conn);
//        dump($org);
        return $org;
    }

    public function getOrgName()
    {
        $org_name = array(
            "8647" => "本部",
            "864700" => "本部",
            "86470000" => "市南",
            "86470003" => "李沧",//李沧
            "86470004" => "平度",
            "86470005" => "胶南",
            "86470006" => "即墨",
            "86470007" => "胶州",
            "86470008" => "城阳",
            "86470009" => "莱西",
            "86470010" => "开发区",
            "86470013" => "市南");
        return $org_name;
    }

    public function getUserDictArray(){
        $user_dict = array("yangyxit"=>"分公司核保室",
            "tangjia"=>"分公司保全室",
            "tjpmoqd"=>"分公司保全室",
            "heyuanhp"=>"分公司理赔室",
            "hypmoqd"=>"分公司理赔室",
            "lizr_qd"=>"本部",
            "liujie_qd"=>"本部",
            "wangxh_qd"=>"本部",
            "wangxh1_qd"=>"本部",
            "zhangnn_qd"=>"本部",
            "zhuxj_qd"=>"本部",
            "zhuxj_qd00"=>"本部",
            "zhangjieqd"=>"李沧",//李沧
            "wangyingqd"=>"平度",
            "wangyqd00"=>"平度",
            "weils_qd"=>"平度",
            "weilsqd00"=>"平度",
            "zongxz_qd"=>"平度",
            "zongxzqd00"=>"平度",
            "wqpmoqd"=>"平度",
            "xypmoqd"=>"平度",
            "muxy_qd"=>"胶南",
            "muxyqd00"=>"胶南",
            "liuyy_qd"=>"胶南",
            "liuyyqd00"=>"胶南",
            "zxpmoqd"=>"胶南",
            "zhangxuan9"=>"胶南",
            "ningxy_qd"=>"即墨",
            "nxyqd00"=>"即墨",
            "wangjuan2"=>"即墨",
            "wjpmoqd"=>"即墨",
            "lishan_qd"=>"即墨",
            "lishanqd00"=>"即墨",
            "yucx_qd"=>"即墨",
            "yucxqd00"=>"即墨",
            "wangx_qd"=>"胶州",
            "wangxqd00"=>"胶州",
            "yangt_qd"=>"胶州",
            "yangtqd00"=>"胶州",
            "songdan_qd"=>"胶州",
            "songdanqd00"=>"胶州",
            "guoyx2"=>"胶州",
            "gyxpmoqd"=>"胶州",
            "zhaojiasc"=>"胶州",
            "zjpmoqd"=>"胶州",
            "wangyf_qd"=>"城阳",
            "wangyfqd00"=>"城阳",
            "wangmx_qd"=>"城阳",
            "zhanyh_qd"=>"莱西",
            "zhanyhqd00"=>"莱西",
            "xusy_qd"=>"莱西",
            "xusyqd00"=>"莱西",
            "gcpmoqd"=>"莱西",
            "gengkl_qd"=>"开发区",
            "gkl_qd00"=>"开发区",
            "likn_qd"=>"开发区",
            "liknqd00"=>"开发区",
            "wangkk_qd"=>"开发区",
            "wangkkqd00"=>"开发区",
            "jiangzm_qd"=>"开发区",
            "xinwei_qd"=>"开发区",
            "liyansd"=>"开发区",
            "lypmoqd"=>"开发区",
            "wanghx9"=>"开发区",
            "whxpmoqd"=>"开发区",
            "lhxpmoqd"=>"市南",
            "liulu_qd"=>"市南",
            "liuluqd00"=>"市南",
            "liuxn_qd"=>"市南",
            "liuxn_qd12"=>"市南",
            "yuyang_qd"=>"市南");
        return $user_dict;
    }

    public function getDataObject(){
        $data_object = array(
//            "org"=>"o",
                                "nb_old_count",
                                "nb_new_count",
//                                "nb_cannt_count",
                                "nb_fix_count",
                                "nb_pro_count",
                                "nb_profix_count",
                                "nb_besame_count",
                                "nb_bfsame_count",
                                "cs_old_count",
                                "cs_new_count",
//                                "cs_cannt_count",
                                "cs_fix_count",
                                "cs_pro_count",
                                "cs_profix_count",
                                "cs_fysame_count",
                                "clm_old_count",
                                "clm_new_count",
//                                "clm_cannt_count",
                                "clm_fix_count",
                                "clm_pro_count",
                                "clm_profix_count",
                                "clm_fysame_count");
        return $data_object;
    }

    //仅管理员可见
    public function getWaitDealNotice(){
        $user_name = $_POST['username'];
        $user_type = $_POST['usertype'];
        $conn = $this->OracleOldDBCon();
        if((int)$user_type==1){
            $notice_select  = "SELECT COUNT(IS_NOTICE) AS NUM FROM TMP_DATALOAD_REQUEST WHERE REQUEST_ACCOUNT = '".$user_name."'  AND IF_FINISH = '0'";
        }else{
            $notice_select  = "SELECT COUNT(IS_NOTICE) AS NUM FROM TMP_DATALOAD_REQUEST WHERE REQUEST_ACCOUNT = '".$user_name."'  AND IS_NOTICE = '0' AND IF_FINISH = '1' ";
        }
        $result_rows = oci_parse($conn, $notice_select); // 配置SQL语句，执行SQL
        $user_result =  $this->search_long($result_rows);
        if((int)$user_result[0]['NUM']>0){
            $result['status'] = 'success';
            if((int)$user_type==1){
                $message = '您有 '.$user_result[0]['NUM'].' 条待处理数据刷新申请，请及时处理！！！';
            }else{
                $message = '您有 '.$user_result[0]['NUM'].' 条数据刷新申请已处理完成，请及时查看！！！';
            }
            $where = "UPDATE TMP_DATALOAD_REQUEST SET IS_NOTICE = '1' WHERE REQUEST_ACCOUNT = '".$user_name."'  AND IS_NOTICE = '0' ";
            $result_rows = oci_parse($conn, $where); // 配置SQL语句，执行SQL
            if(oci_execute($result_rows,OCI_COMMIT_ON_SUCCESS)){
                $result['message'] = $message;
            }else{
                $result['status'] = 'success_failed';
                $result['message'] = $message + " 您的消息通知数据未正常处理，请联系管理员！";
            }
        }else{
            $result['status'] = 'failed';
        }
        oci_free_statement($result_rows);
        oci_close($conn);
        exit(json_encode($result));
    }

    public function finishNotice(){
        $user_name = $_POST['username'];
        $user_type = $_POST['usertype'];
        if((int)$user_type==1){
            $result['status'] = 'success';
            exit(json_encode($result));
        }
        $conn = $this->OracleOldDBCon();
        $where = "UPDATE TMP_DATALOAD_REQUEST SET IS_NOTICE = '1' WHERE REQUEST_ACCOUNT = '".$user_name."'  AND IS_NOTICE = '0' ";
        $result_rows = oci_parse($conn, $where); // 配置SQL语句，执行SQL
        if(oci_execute($result_rows,OCI_COMMIT_ON_SUCCESS)){
            $result['status'] = 'success';
        }else{
            $result['status'] = 'failed';
            $result['message'] = '数据更新失败，请刷新或联系管理员解决！';
        }
        oci_free_statement($result_rows);
        oci_close($conn);
        exit(json_encode($result));
    }

    public function test(){
        $user_type = $this->getUserType();
        $user_name = $this->getUserName();
        dump($user_type);
        dump($user_name);
    }

    //所有用户可见
//    public function getWaitDefineNotice(){
//        $conn = $this->OracleOldDBCon();
//        $user_name = $this->getUserName();
////        dump($user_name);
//        $notice_select  = "SELECT COUNT(IS_NOTICE) AS NUM FROM TMP_DATALOAD_REQUEST WHERE REQUEST_ACCOUNT = '".$user_name."'  AND IS_NOTICE = '0' AND IF_FINISH = '1' ";
//        $result_rows = oci_parse($conn, $notice_select); // 配置SQL语句，执行SQL
//        $user_result =  $this->search_long($result_rows);
//        if((int)$user_result[0]['NUM']>0){
//            $result['status'] = 'success';
//            $result['message'] = '您有 '.$user_result[0]['NUM'].' 条数据刷新申请已处理完成，请及时查看！！！';
//        }else{
//            $result['status'] = 'failed';
//        }
//        oci_free_statement($result_rows);
//        oci_close($conn);
//        exit(json_encode($result));
//    }

    public function search_short($sql){
        $conn = $this->OracleOldDBCon();
        $result_rows = oci_parse($conn, $sql); // 配置SQL语句，执行SQL
        oci_execute($result_rows, OCI_DEFAULT); // 行数  OCI_DEFAULT表示不要自动commit
        oci_fetch_array($result_rows,OCI_RETURN_NULLS);
        //封装函数
        while($row = oci_fetch_array($result_rows, OCI_RETURN_NULLS))
            $result[] = $row;
        //关闭释放
        oci_free_statement($result_rows);
        oci_close($conn);
        return $result;
    }

    public function search_long($result_rows){
        oci_execute($result_rows, OCI_DEFAULT); // 行数  OCI_DEFAULT表示不要自动commit
        //封装函数
        while($row = oci_fetch_array($result_rows, OCI_RETURN_NULLS)){
            $result[] = $row;
        }
        return $result;
    }

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
        //表格区域赋值
        if(strcmp($queryType,"2")==0){
            $queryDateStart = I('get.queryDateStart');
            $queryDateEnd = I('get.queryDateEnd');
            $where_OLD_time_query = " OLD_INSERT_TIME BETWEEN to_date('".$queryDateStart."','yyyy-mm-dd') AND to_date('".$queryDateEnd."','yyyy-mm-dd') ";
            $where_new_time_query = " NEW_INSERT_TIME BETWEEN to_date('".$queryDateStart."','yyyy-mm-dd') AND to_date('".$queryDateEnd."','yyyy-mm-dd') ";
            $where_bulu = $where_new_time_query;
        }else{
            $where_OLD_time_query = " OLD_INSERT_TIME = to_date('".$queryDate."','yyyy-mm-dd') ";
            $where_new_time_query = " NEW_INSERT_TIME = to_date('".$queryDate."','yyyy-mm-dd') AND OLD_INSERT_TIME = NEW_INSERT_TIME ";
            $where_bulu = " NEW_INSERT_TIME = to_date('".$queryDate."','yyyy-mm-dd') ";
        }
        if(empty($queryDate)&&strcmp($queryType,"1")==0){
            $queryDate = date(‘yyyy-mm-dd’,time());
            $where_OLD_time_query = " 1=1 ";
            $where_new_time_query = " 1=1 AND OLD_INSERT_TIME = NEW_INSERT_TIME ";
            $where_bulu = " 1=1 ";
        }
        $org = $this->getDictArry();
        $userDire =  $this->getUserDictArray();
        for($i = 0;$i<sizeof($org);$i++){
            $result[$i]['org'] = $org[$i];
        }
        //中间数据计算
        $temp[][] = 0;
        $result[$fenOrganfh][] = 0;
        $result[$zuoYeZhongXin][] = 0;
        //连接数据库
        $conn = $this->OracleOldDBCon();
        //保全契约通用数据查询条件
        #################################################################   契约出单前撤保  ######################################################################
        #012 契约出单前撤保老核心当天
        $nb_where_old_time  = "SELECT OLD_USER_NAME,count(*) AS NUM FROM TMP_BX_OLD_CDQCB where ".$where_OLD_time_query." GROUP BY OLD_USER_NAME";
        $result_rows = oci_parse($conn, $nb_where_old_time); // 配置SQL语句，执行SQL
        $nb_result_old_time = $this->search_long($result_rows);

        #013 契约出单前撤保新老核心当天
        $nb_where_new_old_time  = "SELECT OLD_USER_NAME,count(*) AS NUM FROM TMP_BX_OLD_CDQCB where ".$where_OLD_time_query." and ".$where_new_time_query." GROUP BY OLD_USER_NAME";
        $result_rows = oci_parse($conn, $nb_where_new_old_time); // 配置SQL语句，执行SQL
        $nb_result_new_old_time = $this->search_long($result_rows);

        #014 契约出单前撤保老核心当天<>新核心,且新核心不为空
        $nb_where_new_no_old_time  = "SELECT OLD_USER_NAME,count(*) AS NUM FROM TMP_BX_OLD_CDQCB where ".$where_bulu." and NEW_INSERT_TIME <> OLD_INSERT_TIME and NEW_INSERT_TIME IS NOT NULL GROUP BY OLD_USER_NAME";
        $result_rows = oci_parse($conn, $nb_where_new_no_old_time); // 配置SQL语句，执行SQL
        $nb_result_new_no_old_time = $this->search_long($result_rows);

//        #004 保全受理老核心当天且新核心为空
//        $where_new_null  = "SELECT user_name,count(*) AS NUM FROM TMP_NCS_QD_BX_BQSL_BD where ".$where_OLD_time_query." and NEW_INSERT_TIME IS NULL GROUP BY USER_NAME";
//        $result_rows = oci_parse($conn, $where_new_null); // 配置SQL语句，执行SQL
//        $result_new_null = $this->search_long($result_rows);

        #015 契约出单前撤保老核心当天且TC不为空
        $nb_where_tc_no_null  = "SELECT OLD_USER_NAME,count(*) AS NUM FROM TMP_BX_OLD_CDQCB where ".$where_OLD_time_query." and TC_ID IS NOT NULL GROUP BY OLD_USER_NAME";
        $result_rows = oci_parse($conn, $nb_where_tc_no_null); // 配置SQL语句，执行SQL
        $nb_result_tc_no_null = $this->search_long($result_rows);

        #016 契约新老核心保额一致数量
        $nb_where_new_old_amount  = "SELECT OLD_USER_NAME,count(*) AS NUM FROM TMP_BX_OLD_CDQCB where ".$where_OLD_time_query." and ".$where_new_time_query." and abs(OLD_AMNT-NEW_AMNT)<=0.01 GROUP BY OLD_USER_NAME";
        $result_rows = oci_parse($conn, $nb_where_new_old_amount); // 配置SQL语句，执行SQL
        $nb_result_new_old_amount = $this->search_long($result_rows);

        #017 契约新老核心保费一致数量
        $nb_where_new_old_fee  = "SELECT OLD_USER_NAME,count(*) AS NUM FROM TMP_BX_OLD_CDQCB where ".$where_OLD_time_query." and ".$where_new_time_query." and abs(OLD_PREM-NEW_PREM)<=0.01 GROUP BY OLD_USER_NAME";
        $result_rows = oci_parse($conn, $nb_where_new_old_fee); // 配置SQL语句，执行SQL
        $nb_result_new_old_fee = $this->search_long($result_rows);

        #018 契约老核心异地作业分李沧
        $nb_where_old_noqd  = "SELECT OLD_ORGAN_CODE,NEW_ORGAN_CODE,NEW_INSERT_TIME,OLD_INSERT_TIME,TC_ID,OLD_AMNT,NEW_AMNT,OLD_PREM,NEW_PREM FROM TMP_BX_OLD_CDQCB where ".$where_OLD_time_query."and OLD_ORGAN_CODE NOT LIKE '8647%'";
        $result_rows = oci_parse($conn, $nb_where_old_noqd); // 配置SQL语句，执行SQL
        $nb_result_old_noqd = $this->search_long($result_rows);
        //契约数据赋值
        for($i = 0;$i<sizeof($org);$i++){
            $result[$i]['nb_old_count'] =0;
            $result[$i]['nb_new_count'] =0;
//            $result[$i]['nb_cannt_count'] =0;
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
        $temp[$xiaoji]["nb_new_count"] += sizeof($nb_result_old_noqd);
        foreach ($nb_result_old_noqd as &$value) {
            if(!empty($value["NEW_INSERT_TIME"])){
                $result[$licang]["nb_new_count"] ++;
                $temp[$xiaoji]['nb_new_count'] ++;
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

        #######################################################################################################################################

        #################################################################  核保  ######################################################################
        $temp[$heji][] = 0;
        #019 核保老核心当天
        $uw_where_old_time  = "SELECT OLD_USER_NAME,count(*) AS NUM FROM TMP_UW_LIST where ".$where_OLD_time_query." GROUP BY OLD_USER_NAME";
        $result_rows = oci_parse($conn, $uw_where_old_time); // 配置SQL语句，执行SQL
        $uw_result_old_time = $this->search_long($result_rows);

        #020 核保新老核心当天
        $uw_where_new_old_time  = "SELECT OLD_USER_NAME,count(*) AS NUM FROM TMP_UW_LIST where ".$where_OLD_time_query." and ".$where_new_time_query."  GROUP BY OLD_USER_NAME";
        $result_rows = oci_parse($conn, $uw_where_new_old_time); // 配置SQL语句，执行SQL
        $uw_result_new_old_time = $this->search_long($result_rows);

        #021 核保老核心当天<>新核心,且新核心不为空
        $uw_where_new_no_old_time  = "SELECT OLD_USER_NAME,count(*) AS NUM FROM TMP_UW_LIST where ".$where_bulu." and NEW_INSERT_TIME <> OLD_INSERT_TIME and NEW_INSERT_TIME IS NOT NULL GROUP BY OLD_USER_NAME";
        $result_rows = oci_parse($conn, $uw_where_new_no_old_time); // 配置SQL语句，执行SQL
        $uw_result_new_no_old_time = $this->search_long($result_rows);

        #022 核保老核心当天且TC不为空
        $uw_where_tc_no_null  = "SELECT OLD_USER_NAME,count(*) AS NUM FROM TMP_UW_LIST where ".$where_OLD_time_query." and TC_ID IS NOT NULL GROUP BY OLD_USER_NAME";
        $result_rows = oci_parse($conn, $uw_where_tc_no_null); // 配置SQL语句，执行SQL
        $uw_result_tc_no_null = $this->search_long($result_rows);

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

        #######################################################################################################################################


        #################################################################   保全受理  ######################################################################
        //保全数据查询
//        $where_OLD_time_query = "OLD_INSERT_TIME = to_date('".$queryDate."','yyyy-mm-dd')";
//        $where_new_time_query = "NEW_INSERT_TIME = to_date('".$queryDate."','yyyy-mm-dd') ";
        #001 保全受理老核心当天
        $where_old_time  = "SELECT USER_NAME,count(*) AS NUM FROM TMP_NCS_QD_BX_BQSL_BD where ".$where_OLD_time_query." GROUP BY USER_NAME ORDER BY USER_NAME";
        $result_rows = oci_parse($conn, $where_old_time); // 配置SQL语句，执行SQL
        $result_old_time = $this->search_long($result_rows);

        #002 保全受理新老核心当天
        $where_new_old_time  = "SELECT user_name,count(*) AS NUM FROM TMP_NCS_QD_BX_BQSL_BD where ".$where_OLD_time_query." and ".$where_new_time_query."  GROUP BY USER_NAME";
        $result_rows = oci_parse($conn, $where_new_old_time); // 配置SQL语句，执行SQL
        $result_new_old_time = $this->search_long($result_rows);

        #003 保全受理老核心当天<>新核心,且新核心不为空
        $where_new_no_old_time  = "SELECT user_name,count(*) AS NUM FROM TMP_NCS_QD_BX_BQSL_BD where ".$where_bulu." and NEW_INSERT_TIME <> OLD_INSERT_TIME and NEW_INSERT_TIME IS NOT NULL GROUP BY USER_NAME";
        $result_rows = oci_parse($conn, $where_new_no_old_time); // 配置SQL语句，执行SQL
        $result_new_no_old_time = $this->search_long($result_rows);

        #004 保全受理老核心当天且新核心为空
        $where_new_null  = "SELECT user_name,count(*) AS NUM FROM TMP_NCS_QD_BX_BQSL_BD where ".$where_OLD_time_query." and NEW_INSERT_TIME IS NULL GROUP BY USER_NAME";
        $result_rows = oci_parse($conn, $where_new_null); // 配置SQL语句，执行SQL
        $result_new_null = $this->search_long($result_rows);

        #005 保全受理老核心当天且TC不为空
        $where_tc_no_null  = "SELECT user_name,count(*) AS NUM FROM TMP_NCS_QD_BX_BQSL_BD where ".$where_OLD_time_query." and TC_ID IS NOT NULL GROUP BY USER_NAME";
        $result_rows = oci_parse($conn, $where_tc_no_null); // 配置SQL语句，执行SQL
        $result_tc_no_null = $this->search_long($result_rows);

        #006 保全受理新老核心金额一致数量
        $where_new_old_money  = "SELECT user_name,count(*) AS NUM FROM TMP_NCS_QD_BX_BQSL_BD where ".$where_OLD_time_query." and ".$where_new_time_query."and abs(NEW_GET_MONEY-OLD_GET_MONEY)<=0.01 GROUP BY USER_NAME";
        $result_rows = oci_parse($conn, $where_new_old_money); // 配置SQL语句，执行SQL
        $result_new_old_money = $this->search_long($result_rows);

        #011 保全受理老核心异地作业分李沧
        $where_old_noqd  = "SELECT OLD_ORGAN_CODE,NEW_ORGAN_CODE,NEW_INSERT_TIME,OLD_INSERT_TIME,TC_ID,OLD_GET_MONEY,NEW_GET_MONEY FROM TMP_NCS_QD_BX_BQSL_BD where ".$where_OLD_time_query."and OLD_ORGAN_CODE NOT LIKE '8647%'";
        $result_rows = oci_parse($conn, $where_old_noqd); // 配置SQL语句，执行SQL
        //封装函数
        $result_old_noqd = $this->search_long($result_rows);

        //保全数据赋值
        for($i = 0;$i<sizeof($org);$i++){//分支机构
            $result[$i]['cs_old_count'] =0;//老核心当天插入
            $result[$i]['cs_new_count'] =0;//老核心新核心当天插入
//            $result[$i]['cs_cannt_count'] =0;//老核心当天插入新核心无插入日期
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
            #004
//            foreach ($result_new_null as &$value) {
//                if($userDire[$value['USER_NAME']]==$org[$i]&&$org[$i]!='小计'){
//                    $result[$i]['cs_cannt_count'] += (int)$value['NUM'];
//                    $temp['cs_cannt_count'] += (int)$value['NUM'];
//                }
//            }
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
        foreach ($result_old_noqd as &$value) {
            if(!empty($value["NEW_ORGAN_CODE"])){
                $result[$licang]["cs_new_count"] ++;
                $temp[$xiaoji]['cs_new_count'] ++;
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
        #######################################################################################################################################

        #################################################################   保全复核  ######################################################################
        //保全数据查询
//        $where_OLD_time_query = "OLD_INSERT_TIME = to_date('".$queryDate."','yyyy-mm-dd')";
//        $where_new_time_query = "NEW_INSERT_TIME = to_date('".$queryDate."','yyyy-mm-dd') ";
        $userOne = "tangjia_bx";
        $userTwo = "tangjia2_bx";
        $fuhe_user = $this->getFuheUser();

        #007 保全复核老核心当天
        $where_old_time_fh  = "SELECT NEW_USER_NAME,COUNT(*) AS NUM FROM TMP_NCS_QD_BX_BQFH_BD WHERE ".$where_OLD_time_query." GROUP BY NEW_USER_NAME";
        $result_rows_fh = oci_parse($conn, $where_old_time_fh); // 配置SQL语句，执行SQL
        $result_old_time_fh = $this->search_long($result_rows_fh);

        #008 保全复核新老核心当天
        $where_new_old_time_fh  = "SELECT NEW_USER_NAME,COUNT(*) AS NUM FROM TMP_NCS_QD_BX_BQFH_BD WHERE ".$where_OLD_time_query." and ".$where_new_time_query."  GROUP BY NEW_USER_NAME";
        $result_rows_fh = oci_parse($conn, $where_new_old_time_fh); // 配置SQL语句，执行SQL
        $result_new_old_time_fh = $this->search_long($result_rows_fh);

        #009 保全复核老核心当天<>新核心,且新核心不为空
        $where_new_no_old_time_fh  = "SELECT NEW_USER_NAME,COUNT(*) AS NUM FROM TMP_NCS_QD_BX_BQFH_BD WHERE ".$where_bulu." and NEW_INSERT_TIME <> OLD_INSERT_TIME and NEW_INSERT_TIME IS NOT NULL GROUP BY NEW_USER_NAME";
        $result_rows_fh = oci_parse($conn, $where_new_no_old_time_fh); // 配置SQL语句，执行SQL
        $result_new_no_old_time_fh = $this->search_long($result_rows_fh);

        #010 保全受理老核心当天且TC不为空
        $where_tc_no_null_fh  = "SELECT OLD_ORGAN_CODE,COUNT(*) AS NUM FROM TMP_NCS_QD_BX_BQFH_BD WHERE ".$where_OLD_time_query." and TC_ID IS NOT NULL GROUP BY OLD_ORGAN_CODE";
        $result_rows_fh = oci_parse($conn, $where_tc_no_null_fh); // 配置SQL语句，执行SQL
        $result_tc_no_null_fh = $this->search_long($result_rows_fh);

        //保全数据赋值
        #007
        #老核心复核数量一新核心为准进行计算
            foreach ($result_old_time_fh as &$value) {
//                strcmp($value['NEW_USER_NAME'],$userOne)==0||strcmp($value['NEW_USER_NAME'],$userTwo)==0
                if(in_array($value['NEW_USER_NAME'],$fuhe_user)){
                    $result[$fenOrganfh]['cs_old_count'] += (int)($value['NUM']);
                }else{
                    $result[$zuoYeZhongXin]['cs_old_count'] += (int)($value['NUM']);
                }
            }
        $temp[$heji]['cs_old_count'] += $temp[$xiaoji]['cs_old_count'] + $result[$zuoYeZhongXin]['cs_old_count'] + $result[$fenOrganfh]['cs_old_count'];
            #008
            foreach ($result_new_old_time_fh as &$value) {
                if(in_array($value['NEW_USER_NAME'],$fuhe_user)){
                    $result[$fenOrganfh]['cs_new_count'] += (int)($value['NUM']);
                    $result[$fenOrganfh]['cs_fysame_count'] += (int)($value['NUM']);
                }else{
                    $result[$zuoYeZhongXin]['cs_new_count'] += (int)($value['NUM']);
                    $result[$zuoYeZhongXin]['cs_fysame_count'] += (int)($value['NUM']);
                }
            }
        $temp[$heji]['cs_fysame_count'] += $temp[$xiaoji]['cs_fysame_count'] + $result[$zuoYeZhongXin]['cs_fysame_count'] + $result[$fenOrganfh]['cs_fysame_count'];
        $temp[$heji]['cs_new_count'] += $temp[$xiaoji]['cs_new_count'] + $result[$zuoYeZhongXin]['cs_new_count'] + $result[$fenOrganfh]['cs_new_count'];
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
        $orgName = $this->getOrgName();
        #023 理赔受理老核心当天
        $clm_where_old_time  = "SELECT OLD_ORGAN_CODE,COUNT(*) AS NUM FROM TMP_NCS_QD_BX_LPBA_BD WHERE ".$where_OLD_time_query." GROUP BY OLD_ORGAN_CODE";
        $result_rows = oci_parse($conn, $clm_where_old_time); // 配置SQL语句，执行SQL
        $clm_result_old_time = $this->search_long($result_rows);

        #024 理赔受理新老核心当天
        $clm_where_new_old_time  = "SELECT OLD_ORGAN_CODE,COUNT(*) AS NUM FROM TMP_NCS_QD_BX_LPBA_BD WHERE ".$where_OLD_time_query." and ".$where_new_time_query."  GROUP BY OLD_ORGAN_CODE";
        $result_rows = oci_parse($conn, $clm_where_new_old_time); // 配置SQL语句，执行SQL
        $clm_result_new_old_time_fh = $this->search_long($result_rows);

        #025 理赔受理老核心当天<>新核心,且新核心不为空
        $clm_where_new_no_old_time  = "SELECT OLD_ORGAN_CODE,COUNT(*) AS NUM FROM TMP_NCS_QD_BX_LPBA_BD WHERE ".$where_bulu." and NEW_INSERT_TIME <> OLD_INSERT_TIME and NEW_INSERT_TIME IS NOT NULL GROUP BY OLD_ORGAN_CODE";
        $result_rows = oci_parse($conn, $clm_where_new_no_old_time); // 配置SQL语句，执行SQL
        $clm_result_new_no_old_time = $this->search_long($result_rows);

        #026 理赔受理老核心当天且TC不为空
        $clm_where_tc_no_null  = "SELECT OLD_ORGAN_CODE,COUNT(*) AS NUM FROM TMP_NCS_QD_BX_LPBA_BD WHERE ".$where_OLD_time_query." and TC_ID IS NOT NULL GROUP BY OLD_ORGAN_CODE";
        $result_rows = oci_parse($conn, $clm_where_tc_no_null); // 配置SQL语句，执行SQL
        $clm_result_tc_no_null = $this->search_long($result_rows);

        #027 理赔受理赔付金额一致
        $clm_where_new_old_money  = "SELECT OLD_ORGAN_CODE,COUNT(*) AS NUM FROM TMP_NCS_QD_BX_LPBA_BD WHERE ".$where_OLD_time_query." and abs(OLD_GET_MONEY-NEW_GET_MONEY)<=0.01 GROUP BY OLD_ORGAN_CODE";
        $result_rows = oci_parse($conn, $clm_where_new_old_money); // 配置SQL语句，执行SQL
        $clm_result_new_old_money = $this->search_long($result_rows);

        #028 异地理赔受理
        $clm_where_old_noqd  = "SELECT OLD_ORGAN_CODE,NEW_ORGAN_CODE,NEW_INSERT_TIME,OLD_INSERT_TIME,TC_ID,OLD_GET_MONEY,NEW_GET_MONEY FROM TMP_NCS_QD_BX_LPBA_BD where ".$where_OLD_time_query."and OLD_ORGAN_CODE NOT LIKE '8647%'";
        $result_rows = oci_parse($conn, $clm_where_old_noqd); // 配置SQL语句，执行SQL
        //封装函数
        $clm_result_old_noqd = $this->search_long($result_rows);

        //理赔数据赋值
        for($i = 0;$i<sizeof($org);$i++){
            $result[$i]['clm_old_count'] =0;
            $result[$i]['clm_new_count'] =0;
//            $result[$i]['clm_cannt_count'] =0;
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
        foreach ($clm_result_old_noqd as &$value) {
            if(!empty($value["NEW_ORGAN_CODE"])){
                $result[$licang]["clm_new_count"] ++;
                $temp[$xiaoji]['clm_new_count'] ++;
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
        #######################################################################################################################################


        #################################################################   理赔审批审核  ######################################################################
        //理赔数据查询
        $clm_user = array("heyuan","heyuan_bx","SYSADMIN");
        #029 理赔审批审核老核心当天
        $clm_where_old_time  = "SELECT NEW_USER_NAME,COUNT(*) AS NUM FROM TMP_NCS_QD_BX_LPSHSP_BD WHERE ".$where_OLD_time_query." GROUP BY NEW_USER_NAME";
        $result_rows = oci_parse($conn, $clm_where_old_time); // 配置SQL语句，执行SQL
        $clm_result_old_time = $this->search_long($result_rows);

        #030 理赔审批审核老核心当天
        $clm_where_old_time_num  = "SELECT OLD_ORGAN_CODE,COUNT(*) AS NUM FROM TMP_NCS_QD_BX_LPSHSP_BD WHERE ".$where_OLD_time_query." GROUP BY OLD_ORGAN_CODE";
        $result_rows = oci_parse($conn, $clm_where_old_time_num); // 配置SQL语句，执行SQL
        $clm_result_old_time_num = $this->search_long($result_rows);

        #031 理赔审批审核老核心当天<>新核心,且新核心不为空
        $clm_where_new_no_old_time  = "SELECT NEW_USER_NAME,COUNT(*) AS NUM FROM TMP_NCS_QD_BX_LPSHSP_BD WHERE ".$where_bulu." and TO_DATE(NEW_INSERT_TIME,'YYYY_MM_DD') <> TO_DATE(OLD_INSERT_TIME,'YYYY_MM_DD') and NEW_INSERT_TIME IS NOT NULL GROUP BY NEW_USER_NAME";
        $result_rows = oci_parse($conn, $clm_where_new_no_old_time); // 配置SQL语句，执行SQL
        $clm_result_new_no_old_time = $this->search_long($result_rows);

        #032 理赔审批审核老核心当天且TC不为空
        $clm_where_tc_no_null  = "SELECT NEW_USER_NAME,COUNT(*) AS NUM FROM TMP_NCS_QD_BX_LPSHSP_BD WHERE ".$where_OLD_time_query." and TC_ID IS NOT NULL GROUP BY NEW_USER_NAME";
        $result_rows = oci_parse($conn, $clm_where_tc_no_null); // 配置SQL语句，执行SQL
        $clm_result_tc_no_null = $this->search_long($result_rows);

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

        #################################################################   数据汇总处理  ######################################################################
        //小计
        $dataObject = $this->getDataObject();
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

    public function getSurveyDemo()
    {
        $survey = M('survey');
        $result = $survey->field('g.group_name,name,survey_id,level,owner')
            ->table('tb_survey_group')
            ->where('g.group_id=s.survey_group AND is_demo=1')
            ->query("SELECT %FIELD% FROM tb_survey AS s, %TABLE% AS g %WHERE% ", true);
        for ($i = 0; $i < sizeof($result); $i++) {
            switch ($result[$i]['level']) {
                case '1':
                    $result[$i]['level'] = '系级';
                    break;
                case '2':
                    $result[$i]['level'] = '院级';
                    break;
                case '3':
                    $result[$i]['level'] = '校级';
                    break;
            }
        }
        if ($result) {
            exit(json_encode($result));
        } else {
            exit(json_encode(''));
        }
    }

    public function searchSurvey()
    {
        $name = I('get.name');
        $survey = M();
        //模糊查询
        $result = $survey->field('g.group_name,name,level,owner')
            ->where("name LIKE '" . $name . "%' AND g.group_id=s.survey_group")
            ->table('tb_survey')
            ->query("SELECT %FIELD% FROM %TABLE% AS s,tb_survey_group AS g %WHERE%", true);
        if ($result) {
            for ($i = 0; $i < sizeof($result); $i++) {
                switch ($result[$i]['level']) {
                    case '1':
                        $result[$i]['level'] = '系级';
                        break;
                    case '2':
                        $result[$i]['level'] = '院级';
                        break;
                    case '3':
                        $result[$i]['level'] = '校级';
                        break;
                }
            }
            exit(json_encode($result));
        } else {
            exit(json_encode(''));
        }
    }

//    Excel导出函数
    public function exportExcel($expTitle, $expCellName, $expTableData, $expName)
    {
        $xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        $fileName = $username . date('_YmdHis');//文件输出的文件名
        $cellNum = count($expCellName);
        $dataNum = count($expTableData);

        vendor("PHPExcel.PHPExcel");
//        $objPHPExcel = new PHPExcel();//ThinkPHP3.1的写法

        $objPHPExcel = new \PHPExcel();//ThinkPHP3.2的写法，有命名空间的概念
        $cellName = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ');
        $objPHPExcel->getActiveSheet(0)->setTitle(iconv('utf-8', 'utf-8', $expName));
        $objPHPExcel->getActiveSheet(0)->mergeCells('A1:' . $cellName[$cellNum - 1] . '1');//合并单元格
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $expTitle . '  导出时间:' . date('Y-m-d H:i:s'));
        for ($i = 0; $i < $cellNum; $i++) {
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i] . '2', $expCellName[$i][1]);
        }
        // Miscellaneous glyphs, UTF-8
        for ($i = 0; $i < $dataNum; $i++) {
            for ($j = 0; $j < $cellNum; $j++) {
                $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j] . ($i + 3), $expTableData[$i][$expCellName[$j][0]]);
            }
        }


        header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="' . $xlsTitle . ' . xls"');
        header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
//        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');//ThinkPHP3.1的写法

        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');//ThinkPHP3.2的写法，有命名空间的概念
        $objWriter->save('php://output');
        exit;
    }

    //导出用户表
    public function expUser()
    {//导出Excel
        $xlsName = "用户信息";
        $xlsTitle = "User";
        $xlsCell = array( //设置字段名和列名的映射
            array('stu_name', '姓名'),
            array('stu_num', '学号'),
            array('stu_sex', '性别'),
            array('stu_pro', '专业'),
            array('stu_graclass', '年级'),
            array('stu_class', '班级'),
            array('is_base', '是否在校'),
            array('is_onset', '是否在读'),
            array('stu_type', '学生类型'),
            array('stu_phone', '手机号'),
            array('stu_qq', 'QQ'),
            array('is_match', '是否匹配')
        );
        $xlsModel = M('user');

        $xlsData = $xlsModel->field('stu_name,stu_num,stu_sex,stu_pro,stu_graclass,stu_class,is_base,is_onset,stu_type,stu_phone,stu_qq,is_match')->select();
        $pro = '';
        //替换字段
        foreach ($xlsData as $k => $v) {
            switch ($v['stu_pro']) {
                case '1':
                    $pro = '计算机科学与技术';
                    break;
                case '2':
                    $pro = '信息安全';
                    break;
                case '3':
                    $pro = '信息与计算科学';
                    break;
                case '4':
                    $pro = '计算机科学与技术（中加方向）';
                    break;
                case '5':
                    $pro = '网络工程';
                    break;
                case '6':
                    $pro = '物联网工程';
                    break;
                case '7':
                    $pro = '通信工程';
                    break;
            }
            $xlsData[$k]['stu_pro'] = $v['stu_pro'] = $pro;

            $is_base = '';
            switch ($v['is_base']) {
                case '1':
                    $is_base = '在校';
                    break;
                case '0':
                    $is_base = '不在校';
                    break;
            }
            $xlsData[$k]['is_base'] = $v['is_base'] = $is_base;

            $is_onset = '';
            switch ($v['is_onset']) {
                case '1':
                    $is_onset = '在读';
                    break;
                case '0':
                    $is_onset = '不在读';
                    break;
            }
            $xlsData[$k]['is_onset'] = $v['is_onset'] = $is_onset;

            $type = '';
            switch ($v['stu_type']) {
                case '1':
                    $type = '本科生';
                    break;
                case '2':
                    $type = '研究生';
                    break;
                case '3':
                    $type = '博士生';
                    break;
            }
            $xlsData[$k]['stu_type'] = $v['stu_type'] = $type;
        }
        $this->exportExcel($xlsTitle, $xlsCell, $xlsData, $xlsName);

    }

    function array2object($array)
    {
        if (is_array($array)) {
            $obj = new StdClass();
            foreach ($array as $key => $val) {
                $obj->$key = $val;
            }
        } else {
            $obj = $array;
        }
        return $obj;
    }

    function object2array($object)
    {
        if (is_object($object)) {
            foreach ($object as $key => $value) {
                $array[$key] = $value;
            }
        } else {
            $array = $object;
        }
        return $array;
    }

    //导出用户表
    public function expSurveyCondition()
    {//导出Excel
        $method = new MethodController();
        $res = $method->checkIn($username);
        if ($res) {
            $data = I('get.content');
            $data = htmlspecialchars_decode($data);
            $xlsData = json_decode($data);
            $last = json_last_error();
            foreach ($xlsData as $k => $v) {
                $xlsData[$k] = $this->object2array($v);
                $user = M('user');
                $condition['stu_num'] = $xlsData[$k]['stu_num'];
                $student = $user->where($condition)->select();
                $xlsData[$k]['stu_name'] = $student[0]['stu_name'];
                $xlsData[$k]['stu_sex'] = $student[0]['stu_sex'];
                $xlsData[$k]['stu_graclass'] = $student[0]['stu_graclass'];
                $xlsData[$k]['stu_pro'] = $student[0]['stu_pro'];
                switch ($xlsData[$k]['stu_pro']) {
                    case '1':
                        $pro = '计算机科学与技术';
                        break;
                    case '2':
                        $pro = '信息安全';
                        break;
                    case '3':
                        $pro = '信息与计算科学';
                        break;
                    case '4':
                        $pro = '计算机科学与技术（中加方向）';
                        break;
                    case '5':
                        $pro = '网络工程';
                        break;
                    case '6':
                        $pro = '物联网工程';
                        break;
                    case '7':
                        $pro = '通信工程';
                        break;
                }
                $xlsData[$k]['stu_pro'] = $pro;
                $xlsData[$k]['stu_class'] = $student[0]['stu_class'];
            }
            $xlsName = "问卷完成情况";
            $xlsTitle = '问卷完成情况统计';
            $xlsCell = array( //设置字段名和列名的映射
                array('stu_name', '姓名'),
                array('stu_num', '学号'),
                array('stu_sex', '性别'),
                array('stu_pro', '专业'),
                array('stu_graclass', '年级'),
                array('stu_class', '班级'),
                array('is_match', '微信是否匹配'),
                array('is_finish', '是否完成问卷'),
                array('survey_id', '问卷ID'),
                array('name', '问卷名称'),
            );
            $this->exportExcel($xlsTitle, $xlsCell, $xlsData, $xlsName);
        }
    }

    /**
     * 导入excel文件
     * @param  string $file excel文件路径
     * @return array        excel文件内容数组
     */
    public function import_excel($file)
    {
        // 判断文件是什么格式
        $type = pathinfo($file);
        $type = strtolower($type["extension"]);
        $type = $type === 'csv' ? $type : 'Excel5';
        ini_set('max_execution_time', '0');
        Vendor('PHPExcel.PHPExcel');
        // 判断使用哪种格式
        $objReader = \PHPExcel_IOFactory::createReader($type);
        $objPHPExcel = $objReader->load($file);
        $sheet = $objPHPExcel->getSheet(0);
        // 取得总行数
        $highestRow = $sheet->getHighestRow();
        // 取得总列数
        $highestColumn = $sheet->getHighestColumn();
        //循环读取excel文件,读取一条,插入一条
        $data = array();
        //从第一行开始读取数据
        for ($j = 1; $j <= $highestRow; $j++) {
            //从A列读取数据
            for ($k = 'A'; $k <= $highestColumn; $k++) {
                // 读取单元格
                $data[$j][] = $objPHPExcel->getActiveSheet()->getCell("$k$j")->getValue();
            }
            //读取完美一行数据即可进行该行数据的插入
        }
        return $data;
    }

    public function importExecl($file)
    {
        if (!file_exists($file)) {
            return array("error" => 0, 'message' => 'file not found!');
        }
        Vendor("PHPExcel.PHPExcel.IOFactory");
        Vendor("PHPExcel.PHPExcel");
        $objReader = \PHPExcel_IOFactory::createReader('Excel5');
        try {
            $PHPReader = $objReader->load($file);
        } catch (\Exception $e) {
        }
        if (!isset($PHPReader)) return array("error" => 0, 'message' => 'read error!');
        $allWorksheets = $PHPReader->getAllSheets();
        $i = 0;
        foreach ($allWorksheets as $objWorksheet) {
            $sheetname = $objWorksheet->getTitle();
            $allRow = $objWorksheet->getHighestRow();//how many rows
            $highestColumn = $objWorksheet->getHighestColumn();//how many columns
            $allColumn = \PHPExcel_Cell::columnIndexFromString($highestColumn);
            $array[$i]["Title"] = $sheetname;
            $array[$i]["Cols"] = $allColumn;
            $array[$i]["Rows"] = $allRow;
            $arr = array();
            $isMergeCell = array();
            foreach ($objWorksheet->getMergeCells() as $cells) {//merge cells
                foreach (\PHPExcel_Cell::extractAllCellReferencesInRange($cells) as $cellReference) {
                    $isMergeCell[$cellReference] = true;
                }
            }
            for ($currentRow = 1; $currentRow <= $allRow; $currentRow++) {
                $row = array();
                for ($currentColumn = 0; $currentColumn < $allColumn; $currentColumn++) {
                    ;
                    $cell = $objWorksheet->getCellByColumnAndRow($currentColumn, $currentRow);
                    $afCol = \PHPExcel_Cell::stringFromColumnIndex($currentColumn + 1);
                    $bfCol = \PHPExcel_Cell::stringFromColumnIndex($currentColumn - 1);
                    $col = \PHPExcel_Cell::stringFromColumnIndex($currentColumn);
                    $address = $col . $currentRow;
                    $value = $objWorksheet->getCell($address)->getValue();
                    if (substr($value, 0, 1) == '=') {
                        return array("error" => 0, 'message' => 'can not use the formula!');
                        exit;
                    }
                    if ($cell->getDataType() == \PHPExcel_Cell_DataType::TYPE_NUMERIC) {
                        $cellstyleformat = $cell->getParent()->getStyle($cell->getCoordinate())->getNumberFormat();
                        $formatcode = $cellstyleformat->getFormatCode();
                        if (preg_match('/^([$[A-Z]*-[0-9A-F]*])*[hmsdy]/i', $formatcode)) {
                            $value = gmdate("Y-m-d", \PHPExcel_Shared_Date::ExcelToPHP($value));
                        } else {
                            $value = \PHPExcel_Style_NumberFormat::toFormattedString($value, $formatcode);
                        }
                    }
                    if ($isMergeCell[$col . $currentRow] && $isMergeCell[$afCol . $currentRow] && !empty($value)) {
                        $temp = $value;
                    } elseif ($isMergeCell[$col . $currentRow] && $isMergeCell[$col . ($currentRow - 1)] && empty($value)) {
                        $value = $arr[$currentRow - 1][$currentColumn];
                    } elseif ($isMergeCell[$col . $currentRow] && $isMergeCell[$bfCol . $currentRow] && empty($value)) {
//                        $value = $temp;
                    }
                    $row[$currentColumn] = $value;
                }
                $arr[$currentRow] = $row;
            }
            $array[$i]["Content"] = $arr;
            $i++;
        }
        spl_autoload_register(array('Think', 'autoload'));//must, resolve ThinkPHP and PHPExcel conflicts
        unset($objWorksheet);
        unset($PHPReader);
        unset($PHPExcel);
        unlink($file);
        return array("error" => 1, "data" => $array);
    }

    //导入excel内容转换成数组
    public function import($filePath)
    {
        $this->__construct();
        Vendor("PHPExcel.PHPExcel");
        $PHPExcel = new \PHPExcel();
        /**默认用excel2007读取excel，若格式不对，则用之前的版本进行读取*/
        $PHPReader = new \PHPExcel_Reader_Excel2007();
        if (!$PHPReader->canRead($filePath)) {
            $PHPReader = new \PHPExcel_Reader_Excel5();
            if (!$PHPReader->canRead($filePath)) {
                echo 'no Excel';
                return;
            }
        }

        $PHPExcel = $PHPReader->load($filePath);
        $currentSheet = $PHPExcel->getSheet(0);  //读取excel文件中的第一个工作表
        $allColumn = $currentSheet->getHighestColumn(); //取得最大的列号
        $allRow = $currentSheet->getHighestRow(); //取得一共有多少行
        $erp_orders_id = array();  //声明数组

        /**从第二行开始输出，因为excel表中第一行为列名*/
        for ($currentRow = 1; $currentRow <= $allRow; $currentRow++) {

            /**从第A列开始输出*/
            for ($currentColumn = 'A'; $currentColumn <= $allColumn; $currentColumn++) {

                $val = $currentSheet->getCellByColumnAndRow(ord($currentColumn) - 65, $currentRow)->getValue();
                /**ord()将字符转为十进制数*/
                if ($val != '') {
                    $erp_orders_id[] = $val;
                }
                /**如果输出汉字有乱码，则需将输出内容用iconv函数进行编码转换，如下将gb2312编码转为utf-8编码输出*/
                //echo iconv('utf-8','gb2312', $val)."\t";
            }
        }
        return $erp_orders_id;
    }

    public function upload()
    {
        if (!empty($_FILES)) {
            $tempFile = $_FILES['file']['tmp_name'];
            $targetFile = "Public/uploads/" . $_FILES['file']['name'];
            if (move_uploaded_file($tempFile, $targetFile)) {
                //上传成功后直接输出新页面进行数据库导入
//                $this->redirect('DataManage/sysCourse');
//                ----------
            }
        }
    }

    //第一种方案
//    public function startUploads()
//    {
//        $match_relation = I('post.m_r');
//        $file_name = I('post.f_n');
//        $table_name = I('post.t_n');
//
////        $match_relation = 'tag_id-学号,tag_name-姓名';
////        $file_name = 'test.XLS';
////        $table_name = 'user_tag';
//        //解析匹配关系
//        $match_relation = explode(',', $match_relation);
//        $data = $this->import_excel('Public/uploads/' . $file_name);
////        dump($data);
//        $match = $field = $count = null;
//        foreach ($match_relation AS $key => $val) {
//            $match[$key] = explode('-', $val);
//        }
//        $num = 0;
//        foreach ($data[1] AS $key => $val) {
//            foreach ($match AS $k => $v) {
//                if ($v[1] == $val) {
//                    $data[1][$key] = $val[0];
//                    $field[$num] = $v[0];
//                    $count[$num++] = $key;
//                }
//            }
//        }
//        $table = M($table_name);
//
////        $result['status'] = 'success';
////        echo json_encode($result);
//        for ($j = 2; $j < sizeof($data); $j++) {
//            $condition = null;
//            for ($i = 0; $i < sizeof($field); $i++) {
//                $condition[$field[$i]] = $data[$j][$count[$i]];
//            }
//            $res = $table->where($condition)->select();
//            if (!$res) {
////                dump($condition);
//                $res = $table->add($condition);
//                if ($res) {
//                    $result['status'] = 'success';
//                } else {
//                    $result['status'] = 'failed';
//                    $result['message'] = $res;
//                }
//            }
//        }
//        if ($result['status'] == null) {
//            $result['status'] = 'failed';
//            $result['message'] = '无数据更新!';
//        }
//        exit(json_encode($result));
//    }

    //第二种方案.发过来数据(新增临时文件夹名称-时间戳)后断开连接,之后开始轮询请求查询取得文件中的数据解析,JOSN包含处理进度
    public function startUploads()
    {

//        $match_relation = 'tag_id-学号,tag_name-姓名';
//        $file_name = 'test.XLS';
//        $table_name = 'user_tag';
//        $time = 'user_tag';

        $time = I('post.time');
        $file_name = I('post.f_n');
        $table_name = I('post.t_n');
        $match_relation = I('post.m_r');

        $result['status'] = 'success';
        $result['percent'] = '0%';
        $this->write($time, json_encode($result));

        //解析匹配关系
        $match_relation = explode(',', $match_relation);
        $data = $this->import_excel('Public/uploads/' . $file_name);
//        dump($data);
        $match = $field = $count = null;
        foreach ($match_relation AS $key => $val) {
            $match[$key] = explode('-', $val);
        }
        $num = 0;
        foreach ($data[1] AS $key => $val) {
            foreach ($match AS $k => $v) {
                if ($v[1] == $val) {
                    $data[1][$key] = $val[0];
                    $field[$num] = $v[0];
                    $count[$num++] = $key;
                }
            }
        }
        $table = M($table_name);

//        $result['status'] = 'success';
//        echo json_encode($result);
        $result = null;
        for ($j = 2; $j < sizeof($data); $j++) {
            $condition = null;
            for ($i = 0; $i < sizeof($field); $i++) {
                $condition[$field[$i]] = $data[$j][$count[$i]];
            }
            $percent = (float)$j / (sizeof($data) - 1);
            $res = $table->where($condition)->select();
            if (!$res) {
//                dump($condition);
                $res = $table->add($condition);
                if ($res) {
                    $result['status'] = 'success';
                    $result['percent'] = ($percent * 100) . '%';
                } else {
                    $result['status'] = 'failed';
                    $result['message'] = $res;
                }
                $this->write($time, json_encode($result));
            }
        }
        if ($result == null) {
            $result['status'] = 'success';
            $result['message'] = '无数据更新!';
            $result['percent'] = '100%';
            $this->write($time, json_encode($result));
        }
        exit(json_encode($result));
    }

    public function deleteFile()
    {
        $time = I('post.time');
        $file_name = I('post.f_n');
        unlink("Public/file/" . $time . ".txt");
        unlink("Public/uploads/" . $file_name);
    }

    public function getFile()
    {
        $time = I('post.time');
        exit($this->read($time));
    }

    public function importTest()
    {
        $data = $this->import_excel('Public/uploads/13级成绩.xls');
        dump($data);
    }

    //获取数据库数据表结构
    public function getTableStruct()
    {
        $db = M();
        $res = $db->query($sql = 'show tables');
        $col = null;
        foreach ($res AS $key => $val) {
            $field = $val['tables_in_ces'];
            $field = substr($field, 3, strlen($field) - 3);
            $col[$key] = $field;
        }
        return $col;
    }

    //获取数据库数据表字段
    public function getTableFiled()
    {
        $field = I('post.table_name');
        $file_name = I('post.file_name');
        $data = $this->import_excel('Public/uploads/' . $file_name);
        $result['status'] = 'success';
        $result['file_field'] = $data[1];
        $result['data'] = M($field)->getDbFields();
        exit(json_encode($result));
    }

    public function outTest()
    {
        $test = null;
        $title = null;
        $title[0] = '0';
        $title[1] = '1';
        $title[2] = "2";
        $title[3] = '3';
        $test[0][0] = 'asdf';
        $test[0][1] = 'asdf';
        $test[0][2] = 'asdf';
        $test[0][3] = 'asdf';
        $this->exportExcel('test', $title, $test, 'test');
    }

    public function replace($content)
    {
        $content = str_replace("&gt;", ">", $content);
        $content = str_replace("&lt;", "<", $content);
        $content = str_replace("&nbsp;", " ", $content);
        $content = str_replace("&quot;", "\"", $content);
        $content = str_replace("&#39;", "'", $content);
        $content = str_replace("\\\\", "\\", $content);
        $content = str_replace("\\n", "\n", $content);
        $content = str_replace("\\r", "\r", $content);
        return $content;
    }

    public function write($userid = null, $content = null)
    {
        $myfile = fopen("Public/file/" . $userid . ".txt", "wb") or die("Unable to open file!");
        file_put_contents("Public/file/" . $userid . ".txt", $content);
        fclose($myfile);
    }

    public function read($userid = null)
    {
//        $userid = 'test';
        $result = file_get_contents("Public/file/" . $userid . ".txt");
        return $result;
    }


    public function getBQFH_SQL(){
        $BQFH_SQL = "/******************************************************************************************************************************************** 
                                                               新核心SQL   
                 ********************************************************************************************************************************************/
                --DROP TABLE TMP_NCS_QD_BX_BQFH_TJ;
                --COMMIT;
                /*create table TMP_NCS_QD_BX_BQFH_TJ
                (
                  organ_code     VARCHAR2(16),
                  user_name      VARCHAR2(60) not null,
                  insert_time    DATE not null,
                  policy_code    VARCHAR2(40),
                  accept_code    VARCHAR2(60) not null,
                  service_code   CHAR(4) not null,
                  business_type  CHAR(8),
                  review_result  VARCHAR2(6),
                  insert_sysdate DATE not null
                )*/
                --DELETE FROM TMP_NCS_QD_BX_BQFH_TJ
                DELETE FROM TMP_NCS_QD_BX_BQFH_TJ;
                COMMIT;
                INSERT INTO TMP_NCS_QD_BX_BQFH_TJ
                --CREATE TABLE TMP_NCS_QD_BX_BQFH_TJ  AS
                SELECT B.ORGAN_CODE AS ORGAN_CODE,
                        B.USER_NAME AS USER_NAME,
                        TRUNC(TCAC.REVIEW_TIME) AS INSERT_TIME,
                        TCPC.POLICY_CODE AS POLICY_CODE,
                        TCAC.ACCEPT_CODE AS ACCEPT_CODE,
                        TCAC.SERVICE_CODE AS SERVICE_CODE,
                        '保全复核' AS BUSINESS_TYPE,
                        TCAC.REVIEW_RESULT AS REVIEW_RESULT,
                        SYSDATE AS INSERT_SYSDATE
                       FROM DEV_PAS.T_CS_ACCEPT_CHANGE@BINGXING_168_15 TCAC
                        LEFT JOIN DEV_PAS.T_CS_POLICY_CHANGE@BINGXING_168_15 TCPC
                        ON TCPC.ACCEPT_ID = TCAC.ACCEPT_ID
                        LEFT JOIN DEV_PAS.T_CS_APPLICATION@BINGXING_168_15 TCA
                        ON TCA.CHANGE_ID = TCAC.CHANGE_ID
                        JOIN DEV_PAS.T_UDMP_USER@BINGXING_168_15 B
                        ON TCAC.REVIEW_ID = B.USER_ID
                       WHERE 1=1                                                                                     
                            AND TCA.SERVICE_TYPE IN ('1','2','3','6','7') 
                            --ND TRUNC(TCAC.REVIEW_TIME) >= TO_DATE('2018/8/10','YYYY/MM/DD')
                            AND TRUNC(TCAC.REVIEW_TIME) = TRUNC(SYSDATE)
                            AND TCPC.ORGAN_CODE LIKE '8647%'
                            AND B.USER_NAME NOT IN ('SYSADMIN')
                            ;
                COMMIT;
                
                /******************************************************************************************************************************************** 
                                                                               老核心SQL   
                 ********************************************************************************************************************************************/      
                --DROP TABLE TMP_LIS_QD_BX_BQFH_TJ;
                --COMMIT;
                /*create table TMP_LIS_QD_BX_BQFH_TJ
                (
                  organ_code     CHAR(20),
                  user_name      VARCHAR2(10),
                  insert_time    DATE,
                  policy_code    CHAR(20) not null,
                  accept_code    CHAR(20) not null,
                  service_code   CHAR(2) not null,
                  review_result  VARCHAR2(1),
                  accept_status  VARCHAR2(1),
                  business_type  CHAR(8),
                  insert_sysdate DATE
                )*/
                DELETE FROM TMP_LIS_QD_BX_BQFH_TJ;
                COMMIT;
                INSERT INTO TMP_LIS_QD_BX_BQFH_TJ
                --CREATE TABLE TMP_LIS_QD_BX_BQFH_TJ  AS      
                select p.COMCODE AS ORGAN_CODE,
                    m.ApproveOperator AS USER_NAME,
                    m.ApproveDate AS INSERT_TIME,
                    m.contno AS POLICY_CODE,
                    m.edoracceptno AS ACCEPT_CODE,
                    m.EdorType AS SERVICE_CODE,
                    m.ApproveFlag AS REVIEW_RESULT,
                    m.EdorState AS ACCEPT_STATUS,
                    '保全复核' AS BUSINESS_TYPE,
                    SYSDATE AS INSERT_SYSDATE
                  from lis.lpedoritem m
                  LEFT JOIN LIS.LPEdorApp t
                  ON t.edoracceptno = m.edoracceptno
                  LEFT JOIN LIS.LDUSER p
                  ON TRIM(m.ApproveOperator) = TRIM(p.usercode)
                where 1=1 
                   AND t.apptype IN ('1','2','3','6','7')
                   AND m.ApproveOperator NOT IN ('System','sys-auto','NSPCL')
                   --AND TRUNC(m.ApproveDate) >= TO_DATE('2018/8/10','YYYY/MM/DD')
                   AND TRUNC(m.ApproveDate) = TRUNC(SYSDATE)
                   and exists (select 1
                          from lis.lccont t
                         where t.conttype = '1'
                           and t.appflag in ('1', '4')
                           and t.managecom like '8647%'
                           and t.contno = m.contno);
                           COMMIT;
                           
                /******************************************************************************************************************************************** 
                                                                               差异明细SQL   
                 ********************************************************************************************************************************************/       
                
                --DROP TABLE TMP_NCS_QD_BX_BQFH_BD;
                --COMMIT;
                /*create table TMP_NCS_QD_BX_BQFH_BD
                (
                  old_organ_code    CHAR(20),
                  new_organ_code    VARCHAR2(16),
                  old_user_name     VARCHAR2(12),
                  new_user_name     VARCHAR2(12),
                  old_service_code  CHAR(2) not null,
                  new_service_code  CHAR(4),
                  old_policy_code   CHAR(20) not null,
                  new_policy_code   VARCHAR2(40),
                  old_insert_time   DATE,
                  new_insert_time   DATE,
                  old_accept_code   VARCHAR2(20),
                  new_accept_code   VARCHAR2(60),
                  old_accept_status VARCHAR2(140),
                  new_accept_status VARCHAR2(80),
                  insert_sysdate    DATE,
                  is_accordance     CHAR(3),
                  tc_id             VARCHAR2(30)
                )*/
                --DELETE FROM TMP_NCS_QD_BX_BQFH_BD;
                DELETE FROM TMP_NCS_QD_BX_BQFH_BD WHERE TRUNC(OLD_INSERT_TIME) = TRUNC(SYSDATE);
                COMMIT;
                INSERT INTO TMP_NCS_QD_BX_BQFH_BD
                --CREATE TABLE TMP_NCS_QD_BX_BQFH_BD  AS         
                SELECT  T1.ORGAN_CODE OLD_ORGAN_CODE,
                        T2.ORGAN_CODE NEW_ORGAN_CODE,
                        T1.USER_NAME AS OLD_USER_NAME,
                        T2.USER_NAME AS NEW_USER_NAME,
                        T1.SERVICE_CODE AS OLD_SERVICE_CODE,
                        T2.SERVICE_CODE AS NEW_SERVICE_CODE,
                        T1.POLICY_CODE AS OLD_POLICY_CODE,
                        T2.POLICY_CODE AS NEW_POLICY_CODE,
                        T1.INSERT_TIME AS OLD_INSERT_TIME,
                        T2.INSERT_TIME AS NEW_INSERT_TIME,
                       TRIM(T1.ACCEPT_CODE) AS OLD_ACCEPT_CODE,
                       T2.ACCEPT_CODE AS NEW_ACCEPT_CODE,
                       L.CODENAME AS OLD_ACCEPT_STATUS,
                       TAS.STATUS_DESC AS NEW_ACCEPT_STATUS,
                       SYSDATE AS INSERT_SYSDATE,
                       (CASE 
                          WHEN  TRIM(T1.ACCEPT_CODE) =  T2.ACCEPT_CODE THEN '是' 
                          ELSE '否'             
                        END) AS IS_ACCORDANCE,
                        ' ' AS tc_id
                  FROM TMP_LIS_QD_BX_BQFH_TJ T1
                  LEFT JOIN TMP_NCS_QD_BX_BQFH_TJ T2
                   ON T2.POLICY_CODE = TRIM(T1.POLICY_CODE)
                      AND TRIM(T1.ACCEPT_CODE) = TRIM(T2.ACCEPT_CODE)
                  LEFT JOIN DEV_PAS.T_CS_ACCEPT_CHANGE@BINGXING_168_15 TCAC
                   ON TCAC.ACCEPT_CODE = TRIM(T1.ACCEPT_CODE)
                  LEFT JOIN DEV_PAS.T_ACCEPT_STATUS@BINGXING_168_15 TAS
                   ON TAS.ACCEPT_STATUS = TCAC.ACCEPT_STATUS 
                  LEFT JOIN LIS.LDCode L
                   ON L.CodeType = 'edorstate'
                   AND TRIM(L.CODE)= T1.ACCEPT_STATUS
                ORDER BY T2.ORGAN_CODE;
                COMMIT;
                
                /*  更新比对表数据  */
                DELETE FROM TMP_NCS_QD_BX_BQFH_BD_UP;
                COMMIT;
                
                INSERT INTO TMP_NCS_QD_BX_BQFH_BD_UP
                --CREATE TABLE TMP_NCS_QD_BX_BQFH_BD_UP  AS    
                SELECT B.ORGAN_CODE AS ORGAN_CODE,
                        B.USER_NAME AS USER_NAME,
                        TRUNC(TCAC.REVIEW_TIME) AS INSERT_TIME,
                        TCPC.POLICY_CODE AS POLICY_CODE,
                        TCAC.ACCEPT_CODE AS ACCEPT_CODE,
                        TCAC.ACCEPT_STATUS AS ACCEPT_STATUS,
                        TCAC.SERVICE_CODE AS SERVICE_CODE
                       FROM DEV_PAS.T_CS_ACCEPT_CHANGE@BINGXING_168_15 TCAC
                        LEFT JOIN DEV_PAS.T_CS_POLICY_CHANGE@BINGXING_168_15 TCPC
                        ON TCPC.ACCEPT_ID = TCAC.ACCEPT_ID
                        LEFT JOIN DEV_PAS.T_CS_APPLICATION@BINGXING_168_15 TCA
                        ON TCA.CHANGE_ID = TCAC.CHANGE_ID
                        JOIN DEV_PAS.T_UDMP_USER@BINGXING_168_15 B
                        ON TCAC.REVIEW_ID = B.USER_ID
                       WHERE 1=1                                                                                     
                            AND TCA.SERVICE_TYPE IN ('1','2','3','6','7') 
                            AND TRUNC(TCAC.REVIEW_TIME) >= TO_DATE('2018/8/1','YYYY/MM/DD')
                            AND TRUNC(TCAC.REVIEW_TIME) <= TRUNC(SYSDATE)
                            AND TCPC.ORGAN_CODE LIKE '8647%'
                            AND B.USER_NAME NOT IN ('SYSADMIN')
                            AND B.USER_NAME IS NOT NULL
                            AND (TCPC.POLICY_CODE,TCAC.ACCEPT_CODE) IN 
                            (SELECT TRIM(OLD_POLICY_CODE),OLD_ACCEPT_CODE FROM TMP_NCS_QD_BX_BQFH_BD WHERE IS_ACCORDANCE = '否' AND NEW_ACCEPT_STATUS<>'生效')
                            ;
                            COMMIT;
                /******************************************************************************************************************************************** 
                                                                               更新既往数据SQL   
                 ********************************************************************************************************************************************/       
                
                UPDATE TMP_NCS_QD_BX_BQFH_BD BD
                SET (NEW_ORGAN_CODE,NEW_USER_NAME,NEW_ACCEPT_CODE,NEW_SERVICE_CODE,NEW_INSERT_TIME,NEW_POLICY_CODE,NEW_ACCEPT_STATUS,IS_ACCORDANCE) = 
                (SELECT UP.ORGAN_CODE,UP.USER_NAME,UP.ACCEPT_CODE,UP.SERVICE_CODE,UP.INSERT_TIME,UP.POLICY_CODE,
                TAS.STATUS_DESC,'是' FROM TMP_NCS_QD_BX_BQFH_BD_UP UP LEFT JOIN DEV_PAS.T_ACCEPT_STATUS@BINGXING_168_15 TAS ON TAS.ACCEPT_STATUS = UP.ACCEPT_STATUS
                WHERE BD.OLD_ACCEPT_CODE = UP.ACCEPT_CODE AND TRIM(BD.OLD_POLICY_CODE) = UP.POLICY_CODE)
                WHERE EXISTS( SELECT 1 FROM TMP_NCS_QD_BX_BQFH_BD_UP UP WHERE BD.OLD_ACCEPT_CODE = UP.ACCEPT_CODE AND TRIM(BD.OLD_POLICY_CODE) = UP.POLICY_CODE);
                COMMIT;
                /*
                SELECT * FROM TMP_NCS_QD_BX_BQFH_TJ;
                SELECT * FROM TMP_LIS_QD_BX_BQFH_TJ;
                SELECT * FROM TMP_NCS_QD_BX_BQFH_BD_UP;
                SELECT * FROM TMP_NCS_QD_BX_BQFH_BD WHERE OLD_INSERT_TIME = TRUNC(SYSDATE) FOR UPDATE
                --AND IS_ACCORDANCE = '否' AND TC_ID IS NULL FOR UPDATE; 
                OLD_ACCEPT_CODE = '6120180814010458' FOR UPDATE
                NEW_USER_NAME IN ('sxb333','lyl') FOR UPDATE;-- WHERE OLD_INSERT_TIME = TRUNC(SYSDATE); */
                
                --DELETE FROM TMP_NCS_QD_BX_BQFH_BD WHERE TRUNC(OLD_INSERT_TIME) = TO_DATE('2018/8/10','YYYY/MM/DD');";

    }

    public function getBQSL_SQL(){
        $BQSL_SQL = "/******************************************************************************************************************************************** 
                                                               新核心SQL   
                 ********************************************************************************************************************************************/
                --DROP TABLE TMP_NCS_QD_BX_BQSL_TJ;
                --COMMIT;
                /*create table TMP_NCS_QD_BX_BQSL_TJ
                (
                  organ_code     VARCHAR2(16) not null,
                  user_name      VARCHAR2(60),
                  insert_time    DATE not null,
                  policy_code    VARCHAR2(40),
                  accept_code    VARCHAR2(60) not null,
                  service_code   CHAR(4) not null,
                  service_type   VARCHAR2(6),
                  get_money      NUMBER(18,2),
                  business_type  CHAR(8),
                  insert_sysdate DATE
                )*/
                DELETE FROM TMP_NCS_QD_BX_BQSL_TJ;
                COMMIT;
                INSERT INTO TMP_NCS_QD_BX_BQSL_TJ
                --CREATE TABLE TMP_NCS_QD_BX_BQSL_TJ  AS
                SELECT DISTINCT TCAC.ORGAN_CODE AS ORGAN_CODE,
                      B.USER_NAME AS USER_NAME,
                      TRUNC(TCAC.INSERT_TIME) AS INSERT_TIME,
                      TCPC.POLICY_CODE AS POLICY_CODE,
                      TCAC.ACCEPT_CODE AS ACCEPT_CODE,
                      TCAC.SERVICE_CODE AS SERVICE_CODE,
                      TCA.SERVICE_TYPE AS SERVICE_TYPE,
                      NULL AS GET_MONEY,
                      '保全受理' AS BUSINESS_TYPE,
                      SYSDATE AS INSERT_SYSDATE
                       FROM DEV_PAS.T_CS_ACCEPT_CHANGE@BINGXING_168_15 TCAC
                        LEFT JOIN DEV_PAS.T_CS_POLICY_CHANGE@BINGXING_168_15 TCPC
                        ON TCPC.ACCEPT_ID = TCAC.ACCEPT_ID
                        LEFT JOIN DEV_PAS.T_CS_APPLICATION@BINGXING_168_15 TCA
                        ON TCA.CHANGE_ID = TCAC.CHANGE_ID
                        LEFT JOIN DEV_PAS.T_UDMP_USER@BINGXING_168_15 B
                        ON TCAC.INSERT_BY = B.USER_ID
                       WHERE 1=1
                            AND TCA.SERVICE_TYPE IN ('1','2','3','6','7')
                            --AND TRUNC(TCAC.INSERT_TIME) >= TO_DATE('2018/8/10','YYYY/MM/DD')
                            AND TRUNC(TCAC.INSERT_TIME) = TRUNC(SYSDATE)
                            AND TCPC.ORGAN_CODE LIKE '8647%'
                            ORDER BY TCAC.ORGAN_CODE;
                            COMMIT;
                
                /******************************************************************************************************************************************** 
                                                                               老核心SQL   
                 ********************************************************************************************************************************************/      
                --DROP TABLE TMP_LIS_QD_BX_BQSL_TJ;
                --COMMIT;
                /*create table TMP_LIS_QD_BX_BQSL_TJ
                (
                  organ_code     CHAR(10),
                  user_name      VARCHAR2(10) not null,
                  insert_time    DATE not null,
                  policy_code    CHAR(20) not null,
                  accept_code    CHAR(20) not null,
                  service_code   CHAR(2) not null,
                  service_type   CHAR(2),
                  get_money      NUMBER(18,2),
                  business_type  CHAR(8),
                  insert_sysdate DATE
                )*/
                DELETE FROM TMP_LIS_QD_BX_BQSL_TJ;
                COMMIT;
                INSERT INTO TMP_LIS_QD_BX_BQSL_TJ
                --CREATE TABLE TMP_LIS_QD_BX_BQSL_TJ  AS
                select m.managecom AS ORGAN_CODE,
                      m.operator AS USER_NAME,
                      m.MakeDate AS INSERT_TIME,
                      m.contno AS POLICY_CODE,
                      m.edoracceptno AS ACCEPT_CODE,
                      m.EdorType AS SERVICE_CODE,
                      t.apptype AS SERVICE_TYPE,
                      '保全受理' AS BUSINESS_TYPE,
                      SYSDATE AS INSERT_SYSDATE,
                      SUM(m.getmoney) AS GET_MONEY
                   from lis.lpedoritem m
                  LEFT JOIN LIS.LPEdorApp t
                  ON t.edoracceptno = m.edoracceptno
                  /*LEFT JOIN lis.lccont n
                  ON m.contno = n.contno
                  LEFT JOIN LIS.LDUSER p
                  ON m.ApproveOperator = p.usercode*/
                where 1=1 
                   AND t.apptype IN ('1','2','3','6','7')
                   --AND TRUNC(m.MakeDate) >= TO_DATE('2018/8/10','YYYY/MM/DD')
                   AND TRUNC(m.MakeDate) = TRUNC(SYSDATE)
                   AND m.edoracceptno NOT LIKE '64%'
                   and exists (select 1
                          from lis.lccont t
                         where t.conttype = '1'
                           and t.appflag in ('1', '4')
                           and t.managecom like '8647%'
                           and t.contno = m.contno)
                   --and ((m.EdorType<>'PR') OR (m.EdorType='PR' and m.MakeDate < TO_DATE('2018/8/1','YYYY/MM/DD')))
                   GROUP BY m.managecom,m.operator,m.MakeDate,m.contno,m.edoracceptno,m.EdorType,t.apptype
                 ORDER BY m.managecom;
                 COMMIT;
                 
                /******************************************************************************************************************************************** 
                                                                               差异明细SQL   
                 ********************************************************************************************************************************************/       
                --DROP TABLE TMP_NCS_QD_BX_BQSL_BD;
                --COMMIT;
                /*create table TMP_NCS_QD_BX_BQSL_BD
                (
                  old_organ_code      VARCHAR2(20),
                  new_organ_code      VARCHAR2(20),
                  user_name           VARCHAR2(20) not null,
                  old_organ_name      VARCHAR2(20),
                  old_service_code    VARCHAR2(8) not null,
                  new_service_code    VARCHAR2(8),
                  old_service_type    VARCHAR2(15),
                  new_service_type    VARCHAR2(15),
                  old_policy_code     VARCHAR2(20) not null,
                  new_policy_code     VARCHAR2(20),
                  old_accept_code     VARCHAR2(20),
                  new_accept_code     VARCHAR2(20),
                  old_get_money       NUMBER(18,2),
                  new_get_money       NUMBER(18,2),
                  old_insert_time     DATE not null,
                  new_insert_time     DATE,
                  insert_sysdate      DATE,
                  is_accordance       VARCHAR2(10),
                  tc_id               VARCHAR2(30),
                  no_same_description VARCHAR2(50),
                  is_ncs_advantage    CHAR(2),
                  link_buss_code      VARCHAR2(20),
                  is_same_sff         CHAR(2)
                )*/
                DELETE FROM TMP_NCS_QD_BX_BQSL_BD WHERE TRUNC(OLD_INSERT_TIME) = TRUNC(SYSDATE);
                COMMIT;
                INSERT INTO TMP_NCS_QD_BX_BQSL_BD
                --CREATE TABLE TMP_NCS_QD_BX_BQSL_BD  AS
                SELECT  T1.ORGAN_CODE AS OLD_ORGAN_CODE,
                        T2.ORGAN_CODE AS NEW_ORGAN_CODE,
                        T1.USER_NAME AS USER_NAME,
                        (CASE 
                           WHEN T1.USER_NAME IN ('wangyf_qd','wangyfqd00','wangmx_qd') THEN '城阳 '
                           WHEN T1.USER_NAME IN ('ningxy_qd','nxyqd00','wangjuan2','wjpmoqd','lishan_qd','lishanqd00','yucx_qd','yucxqd00') THEN '即墨 '
                           WHEN T1.USER_NAME IN ('muxy_qd','muxyqd00','liuyy_qd','liuyyqd00','zxpmoqd','zhangxuan9') THEN '胶南 '
                           WHEN T1.USER_NAME IN ('wangx_qd','wangxqd00','yangt_qd','yangtqd00','songdan_qd','songdanqd00','guoyx2','gyxpmoqd','zhaojiasc','zjpmoqd') THEN '胶州 '
                           WHEN T1.USER_NAME IN ('gengkl_qd','gkl_qd00','likn_qd','liknqd00','wangkk_qd','wangkkqd00','jiangzm_qd','xinwei_qd','liyansd','lypmoqd','wanghx9','whxpmoqd') THEN '开发区 '
                           WHEN T1.USER_NAME IN ('zhanyh_qd','zhanyhqd00','xusy_qd','xusyqd00','gcpmoqd') THEN '莱西 '
                           WHEN T1.USER_NAME IN ('lhxpmoqd','liulu_qd','liuluqd00','liuxn_qd','liuxn_qd12','yuyang_qd','jiangzm_qd','xinwei_qd','liyansd','lypmoqd','wanghx9','whxpmoqd') THEN '市南 '
                           WHEN T1.USER_NAME IN ('lizr_qd','liujie_qd','wangxh1_qd','zhangnn_qd','zhuxj_qd','zhuxj_qd00') THEN '大荣 '
                           WHEN T1.USER_NAME IN ('zhangjieqd') THEN '李沧 '
                           WHEN T1.USER_NAME IN ('wangyingqd','wangyqd00','weils_qd','weilsqd00','zongxz_qd','zongxzqd00','wqpmoqd','xypmoqd') THEN '平度 '
                        END) AS OLD_ORGAN_NAME, 
                        T1.SERVICE_CODE AS OLD_SERVICE_CODE,
                        T2.SERVICE_CODE AS NEW_SERVICE_CODE,
                       (CASE T1.SERVICE_TYPE
                          WHEN  '1' THEN '客户上门办理 ' 
                          WHEN  '2' THEN '业务员代办 ' 
                          WHEN  '3' THEN '其他人代办 ' 
                          WHEN  '6' THEN '新契约内部转办 ' 
                          WHEN  '7' THEN '其他内部转办 '          
                        END) AS OLD_SERVICE_TYPE,
                       (CASE T2.SERVICE_TYPE
                          WHEN  '1' THEN '客户上门办理 ' 
                          WHEN  '2' THEN '业务员代办 ' 
                          WHEN  '3' THEN '其他人代办 ' 
                          WHEN  '6' THEN '新契约内部转办 ' 
                          WHEN  '7' THEN '其他内部转办 '          
                        END) AS NEW_SERVICE_TYPE,
                        T1.POLICY_CODE AS OLD_POLICY_CODE,
                        T2.POLICY_CODE AS NEW_POLICY_CODE,
                       TRIM(T1.ACCEPT_CODE) AS OLD_ACCEPT_CODE,
                       T2.ACCEPT_CODE AS NEW_ACCEPT_CODE,
                       (CASE
                         WHEN T1.GET_MONEY IS NOT NULL THEN T1.GET_MONEY
                         ELSE 0.00
                        END) AS OLD_GET_MONEY,
                      NULL AS NEW_GET_MONEY,
                      T1.INSERT_TIME AS OLD_INSERT_TIME,
                      T2.INSERT_TIME AS NEW_INSERT_TIME,
                      SYSDATE AS insert_sysdate,
                       (CASE 
                          WHEN  TRIM(T1.ACCEPT_CODE) =  T2.ACCEPT_CODE THEN '是' 
                          ELSE '否'             
                        END) AS IS_ACCORDANCE,
                        '' AS tc_id,
                        '' AS no_same_description,
                        '' AS is_ncs_advantage,
                        '' AS link_buss_code,
                        NULL AS is_same_sff
                  FROM TMP_LIS_QD_BX_BQSL_TJ T1
                  LEFT JOIN TMP_NCS_QD_BX_BQSL_TJ T2
                   ON TRIM(T2.POLICY_CODE) = TRIM(T1.POLICY_CODE)
                   AND TRIM(T2.ACCEPT_CODE) = TRIM(T1.ACCEPT_CODE)
                ORDER BY T2.ORGAN_CODE;
                COMMIT;
                /******************************************************************************************************************************************** 
                                                                               删除单保单迁移SQL   
                 ********************************************************************************************************************************************/       
                DELETE FROM TMP_NCS_QD_BX_BQSL_BD WHERE TRIM(OLD_POLICY_CODE) IN 
                (SELECT TRIM(m.contno) FROM lis.lpedoritem m WHERE m.EdorType='PR' AND m.MakeDate >= TO_DATE('2018/8/1','YYYY/MM/DD'));
                COMMIT;
                
                /**********************************  全量更新新核心数据开始  *******************************/
                DELETE FROM TMP_NCS_QD_BX_BQSL_BD_UP;
                COMMIT;
                INSERT INTO TMP_NCS_QD_BX_BQSL_BD_UP
                --CREATE TABLE TMP_NCS_QD_BX_BQSL_BD_UP  AS
                SELECT DISTINCT TCAC.ORGAN_CODE AS ORGAN_CODE,
                      B.USER_NAME AS USER_NAME,
                      TRUNC(TCAC.INSERT_TIME) AS INSERT_TIME,
                      TCPC.POLICY_CODE AS POLICY_CODE,
                      TCAC.ACCEPT_CODE AS ACCEPT_CODE,
                      TCAC.SERVICE_CODE AS SERVICE_CODE,
                      TCA.SERVICE_TYPE AS SERVICE_TYPE,
                      NULL AS GET_MONEY,
                      '保全受理' AS BUSINESS_TYPE,
                      SYSDATE AS INSERT_SYSDATE
                       FROM DEV_PAS.T_CS_ACCEPT_CHANGE@BINGXING_168_15 TCAC
                        LEFT JOIN DEV_PAS.T_CS_POLICY_CHANGE@BINGXING_168_15 TCPC
                        ON TCPC.ACCEPT_ID = TCAC.ACCEPT_ID
                        LEFT JOIN DEV_PAS.T_CS_APPLICATION@BINGXING_168_15 TCA
                        ON TCA.CHANGE_ID = TCAC.CHANGE_ID
                        LEFT JOIN DEV_PAS.T_UDMP_USER@BINGXING_168_15 B
                        ON TCAC.INSERT_BY = B.USER_ID
                       WHERE 1=1
                            AND TCA.SERVICE_TYPE IN ('1','2','3','6','7')
                            AND TRUNC(TCAC.INSERT_TIME) >= TO_DATE('2018/8/1','YYYY/MM/DD')
                            AND TRUNC(TCAC.INSERT_TIME) <= TRUNC(SYSDATE)
                            AND TCPC.ORGAN_CODE LIKE '8647%'
                            AND (TCPC.POLICY_CODE,TCAC.ACCEPT_CODE) IN (SELECT TRIM(OLD_POLICY_CODE),OLD_ACCEPT_CODE FROM TMP_NCS_QD_BX_BQSL_BD WHERE IS_ACCORDANCE = '否')
                            ;
                            COMMIT;
                                 
                UPDATE TMP_NCS_QD_BX_BQSL_BD BD
                SET (NEW_ORGAN_CODE,NEW_SERVICE_TYPE,NEW_ACCEPT_CODE,NEW_SERVICE_CODE,NEW_INSERT_TIME,NEW_POLICY_CODE,IS_ACCORDANCE) = 
                (SELECT ORGAN_CODE,
                       (CASE SERVICE_TYPE
                          WHEN  '1' THEN '客户上门办理' 
                          WHEN  '2' THEN '业务员代办' 
                          WHEN  '3' THEN '其他人代办' 
                          WHEN  '6' THEN '新契约内部转办' 
                          WHEN  '7' THEN '其他内部转办'          
                        END) AS SERVICE_TYPE,ACCEPT_CODE,SERVICE_CODE,INSERT_TIME,POLICY_CODE,'是' FROM TMP_NCS_QD_BX_BQSL_BD_UP UP
                WHERE BD.OLD_ACCEPT_CODE = UP.ACCEPT_CODE AND TRIM(BD.OLD_POLICY_CODE) = UP.POLICY_CODE)
                WHERE EXISTS( SELECT 1 FROM TMP_NCS_QD_BX_BQSL_BD_UP UP WHERE BD.OLD_ACCEPT_CODE = UP.ACCEPT_CODE AND TRIM(BD.OLD_POLICY_CODE) = UP.POLICY_CODE);
                COMMIT;
                /**********************************  全量更新新核心数据开始  *******************************/
                
                /**********************************  当日更新金额开始  *******************************/
                --drop table TMP_NCS_QDBX_BQ_SFF;
                DELETE FROM TMP_NCS_QDBX_BQ_SFF;
                COMMIT;
                INSERT INTO TMP_NCS_QDBX_BQ_SFF
                --CREATE TABLE TMP_NCS_QDBX_BQ_SFF AS
                SELECT B.POLICY_CODE,B.BUSINESS_CODE AS ACCEPT_CODE,SUM(GETMONEY) AS GETMONEY FROM 
                (SELECT DISTINCT B.USER_NAME,TCPA.POLICY_CODE,TCPA.BUSINESS_CODE,CASE 
                   WHEN TCPA.ARAP_FLAG='2' THEN -TCPA.FEE_AMOUNT ELSE TCPA.FEE_AMOUNT END AS GETMONEY
                    FROM DEV_PAS.T_CS_PREM_ARAP@BINGXING_168_15 TCPA
                    LEFT JOIN DEV_PAS.T_CS_ACCEPT_CHANGE@BINGXING_168_15 TCAC
                    ON TCAC.ACCEPT_CODE = TCPA.BUSINESS_CODE
                    --ARAP_FLAG 1-收费 2-付费
                        LEFT JOIN DEV_PAS.T_CS_APPLICATION@BINGXING_168_15 TCA
                        ON TCA.CHANGE_ID = TCAC.CHANGE_ID
                        JOIN DEV_PAS.T_UDMP_USER@BINGXING_168_15 B
                        ON TCA.INSERT_BY = B.USER_ID
                    WHERE 1=1
                        AND TCPA.DERIV_TYPE = '004'
                        AND TCPA.ORGAN_CODE LIKE '8647%'
                        AND TRUNC(TCPA.INSERT_TIME) = TRUNC(SYSDATE)
                        AND TCA.SERVICE_TYPE IN ('1','2','3','6','7')
                   UNION ALL
                   SELECT DISTINCT B.USER_NAME,TCPC.POLICY_CODE,TCAC.ACCEPT_CODE AS BUSINESS_CODE,0.00 AS GETMONEY-- 按0处理
                        FROM DEV_PAS.T_CS_ACCEPT_CHANGE@BINGXING_168_15 TCAC
                        LEFT JOIN DEV_PAS.T_CS_POLICY_CHANGE@BINGXING_168_15 TCPC
                        ON TCPC.ACCEPT_ID = TCAC.ACCEPT_ID
                        LEFT JOIN DEV_PAS.T_CS_APPLICATION@BINGXING_168_15 TCA
                        ON TCA.CHANGE_ID = TCAC.CHANGE_ID
                        JOIN DEV_PAS.T_UDMP_USER@BINGXING_168_15 B
                        ON TCA.INSERT_BY = B.USER_ID
                            WHERE 1=1
                            AND TCPC.ORGAN_CODE LIKE '8647%'
                            AND TRUNC(TCAC.INSERT_TIME) = TRUNC(SYSDATE)
                            AND TCA.SERVICE_TYPE IN ('1','2','3','6','7')
                   ) B WHERE 1=1
                GROUP BY B.POLICY_CODE,B.BUSINESS_CODE
                ORDER BY B.POLICY_CODE;
                COMMIT;
                            
                UPDATE TMP_NCS_QD_BX_BQSL_BD BD
                SET (NEW_GET_MONEY) = 
                (SELECT GETMONEY FROM TMP_NCS_QDBX_BQ_SFF UP
                WHERE BD.OLD_ACCEPT_CODE = UP.ACCEPT_CODE AND TRIM(BD.OLD_POLICY_CODE) = UP.POLICY_CODE)
                WHERE EXISTS( SELECT 1 FROM TMP_NCS_QDBX_BQ_SFF UP WHERE BD.OLD_ACCEPT_CODE = UP.ACCEPT_CODE AND TRIM(BD.OLD_POLICY_CODE) = UP.POLICY_CODE);
                COMMIT;
                /**********************************  当日更新金额结束  *******************************/
                
                
                /**********************************  全量更新金额开始-定期更新  *******************************
                DELETE FROM TMP_NCS_QDBX_BQ_SFF_ALL;
                COMMIT;
                INSERT INTO TMP_NCS_QDBX_BQ_SFF_ALL
                --CREATE TABLE TMP_NCS_QDBX_BQ_SFF_ALL AS
                SELECT B.POLICY_CODE,B.ACCEPT_CODE,SUM(B.GETMONEY) AS GETMONEY FROM 
                (SELECT DISTINCT B.USER_NAME,TCPA.POLICY_CODE,TCPA.BUSINESS_CODE AS ACCEPT_CODE,CASE 
                   WHEN TCPA.ARAP_FLAG='2' THEN -TCPA.FEE_AMOUNT ELSE TCPA.FEE_AMOUNT END AS GETMONEY
                    FROM DEV_PAS.T_CS_PREM_ARAP@BINGXING_168_15 TCPA
                    LEFT JOIN DEV_PAS.T_CS_ACCEPT_CHANGE@BINGXING_168_15 TCAC
                    ON TCAC.ACCEPT_CODE = TCPA.BUSINESS_CODE
                        LEFT JOIN DEV_PAS.T_CS_APPLICATION@BINGXING_168_15 TCA
                        ON TCA.CHANGE_ID = TCAC.CHANGE_ID
                        JOIN DEV_PAS.T_UDMP_USER@BINGXING_168_15 B
                        ON TCA.INSERT_BY = B.USER_ID
                    WHERE 1=1
                        AND TCPA.DERIV_TYPE = '004'
                        AND TCPA.ORGAN_CODE LIKE '8647%'
                        AND TCPA.INSERT_TIME >= TO_DATE('2018/8/1','YYYY/MM/DD')
                        AND TCPA.INSERT_TIME <= TRUNC(SYSDATE)
                        AND TCA.SERVICE_TYPE IN ('1','2','3','6','7')
                        --AND TCPA.BUSINESS_CODE = '6120180815002335'
                        )B
                GROUP BY B.POLICY_CODE,B.ACCEPT_CODE;
                COMMIT;
                
                UPDATE TMP_NCS_QD_BX_BQSL_BD BD
                SET (NEW_GET_MONEY) = 
                (SELECT GETMONEY FROM TMP_NCS_QDBX_BQ_SFF_ALL UP
                WHERE BD.OLD_ACCEPT_CODE = UP.ACCEPT_CODE AND TRIM(BD.OLD_POLICY_CODE) = UP.POLICY_CODE)
                WHERE EXISTS( SELECT 1 FROM TMP_NCS_QDBX_BQ_SFF_ALL UP WHERE BD.OLD_ACCEPT_CODE = UP.ACCEPT_CODE AND TRIM(BD.OLD_POLICY_CODE) = UP.POLICY_CODE);
                COMMIT;  
                **********************************  全量更新金额结束  *******************************/
                
                /**********************************  更新双倍开始  *******************************/
                --DROP TABLE TMP_NCS_QD_BX_BQSL_BD_SFF;
                DELETE FROM TMP_NCS_QD_BX_BQSL_BD_SFF;
                COMMIT;
                INSERT INTO TMP_NCS_QD_BX_BQSL_BD_SFF
                --CREATE TABLE TMP_NCS_QD_BX_BQSL_BD_SFF  AS
                SELECT OLD_POLICY_CODE,OLD_ACCEPT_CODE,OLD_GET_MONEY FROM TMP_NCS_QD_BX_BQSL_BD WHERE OLD_GET_MONEY = (NEW_GET_MONEY - OLD_GET_MONEY) AND OLD_GET_MONEY!=0.00;
                COMMIT;
                
                UPDATE TMP_NCS_QD_BX_BQSL_BD BD
                SET (NEW_GET_MONEY) = 
                (SELECT OLD_GET_MONEY FROM TMP_NCS_QD_BX_BQSL_BD_SFF UP
                WHERE UP.OLD_POLICY_CODE = BD.OLD_POLICY_CODE AND UP.OLD_ACCEPT_CODE = BD.OLD_ACCEPT_CODE)
                WHERE EXISTS (SELECT 1 FROM TMP_NCS_QD_BX_BQSL_BD_SFF UP WHERE UP.OLD_POLICY_CODE = BD.OLD_POLICY_CODE AND UP.OLD_ACCEPT_CODE = BD.OLD_ACCEPT_CODE);
                COMMIT;
                /**********************************  更新双倍结束  *******************************/
                
                UPDATE TMP_NCS_QD_BX_BQSL_BD BD
                SET IS_SAME_SFF = (CASE 
                WHEN OLD_GET_MONEY = NEW_GET_MONEY OR (OLD_GET_MONEY-NEW_GET_MONEY=-0.01 OR OLD_GET_MONEY-NEW_GET_MONEY=0.01) THEN '是'
                ELSE '否'
                END);
                COMMIT;
                /*
                UPDATE TMP_LIS_QD_BX_BQSL_TJ BD
                SET GET_MONEY = NULL WHERE GET_MONEY = 0
                
                SELECT * FROM TMP_NCS_QD_BX_BQSL_TJ;
                SELECT * FROM TMP_LIS_QD_BX_BQSL_TJ;
                SELECT * FROM TMP_NCS_QD_BX_BQSL_BD_UP;
                SELECT * FROM TMP_NCS_QD_BX_BQSL_BD WHERE --IS_NCS_ADVANTAGE = '是' FOR UPDATE--(OLD_GET_MONEY = NEW_GET_MONEY OR (OLD_GET_MONEY-NEW_GET_MONEY=-0.01 OR OLD_GET_MONEY-NEW_GET_MONEY=0.01)) AND OLD_INSERT_TIME = TRUNC(SYSDATE)
                --IS_SAME_SFF='是' AND OLD_INSERT_TIME = TRUNC(SYSDATE)
                --IS_ACCORDANCE = '是' AND NEW_GET_MONEY IS NULL FOR UPDATE
                --OLD_SERVICE_CODE = 'PC' AND (NEW_GET_MONEY IS NULL OR OLD_GET_MONEY IS NULL) FOR UPDATE 
                --NEW_GET_MONEY IS NOT NULL AND OLD_GET_MONEY IS NULL FOR UPDATE 
                --IS_ACCORDANCE = '否' AND NO_SAME_DESCRIPTION IS NULL AND TC_ID IS NULL FOR UPDATE
                OLD_ACCEPT_CODE = '6120180818004788' FOR UPDATE  
                IN ('6120180816014123',
                '6120180816014707',
                '6120180816022319',
                '6120180816012510',
                '6120180816022820',
                '6120180816011644')
                 FOR UPDATE ;
                
                SELECT * FROM TMP_NCS_QD_BX_BQSL_BD WHERE IS_ACCORDANCE = '否' AND TC_ID IS NULL AND NO_SAME_DESCRIPTION IS NULL ORDER BY OLD_ORGAN_NAME FOR UPDATE;
                
                
                SELECT * FROM TMP_NCS_QD_BX_BQSL_BD WHERE IS_NCS_ADVANTAGE = '是' AND IS_ACCORDANCE = '是' FOR UPDATE
                
                WHERE OLD_ACCEPT_CODE = '6120180807026371';
                -----------------------
                UPDATE TMP_NCS_QD_BX_BQSL_BD 
                SET NEW_ORGAN_CODE = '86470008',NEW_ACCEPT_CODE = '6120180807026371',NEW_SERVICE_CODE = 'AC',NEW_SERVICE_TYPE = '业务员代办',
                NEW_POLICY_CODE = '887576774292',NEW_INSERT_TIME = TO_DATE('2018/8/7','YYYY/MM/DD')
                WHERE OLD_ACCEPT_CODE = '6120180807026371'
                
                SELECT OLD_POLICY_CODE,OLD_ACCEPT_CODE FROM TMP_NCS_QD_BX_BQSL_BD WHERE OLD_GET_MONEY = (NEW_GET_MONEY - OLD_GET_MONEY) AND OLD_GET_MONEY!=0.00
                
                DELETE FROM TMP_NCS_QD_BX_BQSL_BD WHERE TRUNC(OLD_INSERT_TIME) = TO_DATE('2018/8/10','YYYY/MM/DD');
                SELECT * FROM TMP_NCS_QD_BX_BQSL_BD WHERE OLD_GET_MONEY != NEW_GET_MONEY AND OLD_GET_MONEY-NEW_GET_MONEY!=-0.01 AND OLD_GET_MONEY-NEW_GET_MONEY!=0.01;
                */
                /*
                UPDATE TMP_NCS_QD_BX_BQSL_BD BD
                SET (NEW_GET_MONEY) = 
                (SELECT GETMONEY FROM TMP_NCS_QDBX_BQ_SFF UP
                WHERE BD.OLD_ACCEPT_CODE = UP.ACCEPT_CODE AND TRIM(BD.OLD_POLICY_CODE) = UP.POLICY_CODE)
                WHERE EXISTS( SELECT 1 FROM TMP_NCS_QDBX_BQ_SFF UP WHERE BD.OLD_ACCEPT_CODE = UP.ACCEPT_CODE AND TRIM(BD.OLD_POLICY_CODE) = UP.POLICY_CODE);
                
                COMMIT;*/";

    }

}