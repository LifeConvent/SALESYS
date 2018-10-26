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
        if ($info[2] == 'success') {
            $admin = $info[0];
            if ($info[1] - time() <= 7) {
                return true;
            } else {
                return false;
            }
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
        oci_fetch_array($result_rows,OCI_RETURN_NULLS);
        //封装函数
        while($row = oci_fetch_array($result_rows, OCI_RETURN_NULLS))
            $result[] = $row;
        return $result;
    }

    public function loadDayPostData(){
        $licang = 1;
        $xiaoji = 10;
        $fenOrganfh = 12;
        $zuoYeZhongXin = 14;
        $heji = 15;
        $queryDate = I('get.queryDate');
        //表格区域赋值
        if(empty($queryDate)){
            $queryDate = date(‘yyyy-mm-dd’,time());
        }
//        $queryDate = "2018-09-05";
        $org = $this->getDictArry();
        $userDire =  $this->getUserDictArray();
        for($i = 0;$i<=sizeof($org);$i++){
            $result[$i]['org'] = $org[$i];
        }
        //连接数据库
        $conn = $this->OracleOldDBCon();
        //契约数据赋值
        for($i = 0;$i<=sizeof($org);$i++){
            $result[$i]['nb_old_count'] =0;
            $result[$i]['nb_new_count'] =0;
//            $result[$i]['nb_cannt_count'] =0;
            $result[$i]['nb_fix_count'] =0;
            $result[$i]['nb_pro_count'] =0;
            $result[$i]['nb_profix_count'] =0;
            $result[$i]['nb_besame_count'] =0;
            $result[$i]['nb_bfsame_count'] =0;
        }

        #################################################################   保全受理  ######################################################################
        //保全数据查询
        $where_OLD_time_query = "OLD_INSERT_TIME = to_date('".$queryDate."','yyyy-mm-dd')";
        $where_new_time_query = "NEW_INSERT_TIME = to_date('".$queryDate."','yyyy-mm-dd') ";
        //#001 保全受理老核心当天
        $where_old_time  = "SELECT USER_NAME,count(*) AS NUM FROM TMP_NCS_QD_BX_BQSL_BD where ".$where_OLD_time_query." GROUP BY USER_NAME ORDER BY USER_NAME";
        $result_rows = oci_parse($conn, $where_old_time); // 配置SQL语句，执行SQL
        $result_old_time = $this->search_long($result_rows);

        #002 保全受理新老核心当天
        $where_new_old_time  = "SELECT user_name,count(*) AS NUM FROM TMP_NCS_QD_BX_BQSL_BD where ".$where_OLD_time_query." and ".$where_new_time_query."  GROUP BY USER_NAME";
        $result_rows = oci_parse($conn, $where_new_old_time); // 配置SQL语句，执行SQL
        $result_new_old_time = $this->search_long($result_rows);

        #003 保全受理老核心当天<>新核心,且新核心不为空
        $where_new_no_old_time  = "SELECT user_name,count(*) AS NUM FROM TMP_NCS_QD_BX_BQSL_BD where ".$where_OLD_time_query." and NEW_INSERT_TIME <> OLD_INSERT_TIME and NEW_INSERT_TIME IS NOT NULL GROUP BY USER_NAME";
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
        $where_old_noqd  = "SELECT * FROM TMP_NCS_QD_BX_BQSL_BD where ".$where_OLD_time_query."and OLD_ORGAN_CODE NOT LIKE '8647%'";
        $result_rows = oci_parse($conn, $where_old_noqd); // 配置SQL语句，执行SQL
        $result_old_noqd = $this->search_long($result_rows);

        $temp[][] = 0;
        //保全数据赋值
        for($i = 0;$i<=sizeof($org);$i++){//分支机构
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
                if($userDire[$value['USER_NAME']]===$org[$i]&&$org[$i]!='小计'){
                    $result[$i]['cs_old_count'] += (int)($value['NUM']);
                    $temp[$xiaoji]['cs_old_count'] += (int)($value['NUM']);
                }
            }
            #002
            foreach ($result_new_old_time as &$value) {
                if($userDire[$value['USER_NAME']]==$org[$i]&&$org[$i]!='小计'){
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
                if($userDire[$value['USER_NAME']]==$org[$i]&&$org[$i]!='小计'){
                    $result[$i]['cs_fix_count'] += (int)$value['NUM'];
                    $temp[$xiaoji]['cs_fix_count'] += (int)$value['NUM'];
                }
            }
            #005
            foreach ($result_tc_no_null as &$value) {
                if($userDire[$value['USER_NAME']]==$org[$i]&&$org[$i]!='小计'){
                    $result[$i]['cs_pro_count'] += (int)$value['NUM'];
                    $temp[$xiaoji]['cs_pro_count'] += (int)$value['NUM'];
                }
            }
            #TC数据库待定-问题单解决数量
            #006
            foreach ($result_new_old_money as &$value) {
                if($userDire[$value['USER_NAME']]==$org[$i]&&$org[$i]!='小计'){
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
            if($value["NEW_INSERI_TIME"]!=$value["OLD_INSERI_TIME"]){
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
        $where_OLD_time_query = "OLD_INSERT_TIME = to_date('".$queryDate."','yyyy-mm-dd')";
        $where_new_time_query = "NEW_INSERT_TIME = to_date('".$queryDate."','yyyy-mm-dd') ";
        $userOne = "tangjia_bx";
        $userTwo = "tangjia2_bx";

        #007 保全复核老核心当天
        $where_old_time_fh  = "SELECT NEW_USER_NAME,COUNT(*) AS NUM FROM TMP_NCS_QD_BX_BQFH_BD WHERE ".$where_OLD_time_query." GROUP BY NEW_USER_NAME";
        $result_rows_fh = oci_parse($conn, $where_old_time_fh); // 配置SQL语句，执行SQL
        $result_old_time_fh = $this->search_long($result_rows_fh);

        #008 保全复核新老核心当天
        $where_new_old_time_fh  = "SELECT NEW_USER_NAME,COUNT(*) AS NUM FROM TMP_NCS_QD_BX_BQFH_BD WHERE ".$where_OLD_time_query." and ".$where_new_time_query."  GROUP BY NEW_USER_NAME";
        $result_rows_fh = oci_parse($conn, $where_new_old_time_fh); // 配置SQL语句，执行SQL
        $result_new_old_time_fh = $this->search_long($result_rows_fh);

        #009 保全复核老核心当天<>新核心,且新核心不为空
        $where_new_no_old_time_fh  = "SELECT NEW_USER_NAME,COUNT(*) AS NUM FROM TMP_NCS_QD_BX_BQFH_BD WHERE ".$where_OLD_time_query." and NEW_INSERT_TIME <> OLD_INSERT_TIME and NEW_INSERT_TIME IS NOT NULL GROUP BY NEW_USER_NAME";
        $result_rows_fh = oci_parse($conn, $where_new_no_old_time_fh); // 配置SQL语句，执行SQL
        $result_new_no_old_time_fh = $this->search_long($result_rows_fh);

        #010 保全受理老核心当天且TC不为空
        $where_tc_no_null_fh  = "SELECT OLD_ORGAN_CODE,COUNT(*) AS NUM FROM TMP_NCS_QD_BX_BQFH_BD WHERE ".$where_OLD_time_query." and TC_ID IS NOT NULL GROUP BY OLD_ORGAN_CODE";
        $result_rows_fh = oci_parse($conn, $where_tc_no_null_fh); // 配置SQL语句，执行SQL
        $result_tc_no_null_fh = $this->search_long($result_rows_fh);

        //保全数据赋值
            #007
        $result[$fenOrganfh][] = 0;
        $result[$zuoYeZhongXin][] = 0;
            foreach ($result_old_time_fh as &$value) {
                if($value['NEW_USER_NAME']==$userOne||$value['NEW_USER_NAME']==$userTwo){
                    $result[$fenOrganfh]['cs_old_count'] += (int)($value['NUM']);
                }else{
                    $result[$zuoYeZhongXin]['cs_old_count'] += (int)($value['NUM']);
                }
            }
        $temp[$heji]['cs_old_count'] = $temp[$xiaoji]['cs_old_count'] + $result[$zuoYeZhongXin]['cs_old_count'] + $result[$fenOrganfh]['cs_old_count'];
            #008
            foreach ($result_new_old_time_fh as &$value) {
                if($value['NEW_USER_NAME']==$userOne||$value['NEW_USER_NAME']==$userTwo){
                    $result[$fenOrganfh]['cs_new_count'] += (int)($value['NUM']);
                    $result[$fenOrganfh]['cs_fysame_count'] += (int)($value['NUM']);
                }else{
                    $result[$zuoYeZhongXin]['cs_new_count'] += (int)($value['NUM']);
                    $result[$zuoYeZhongXin]['cs_fysame_count'] += (int)($value['NUM']);
                }
            }
        $temp[$heji]['cs_fysame_count'] = $temp[$xiaoji]['cs_fysame_count'] + $result[$zuoYeZhongXin]['cs_fysame_count'] + $result[$fenOrganfh]['cs_fysame_count'];
        $temp[$heji]['cs_new_count'] = $temp[$xiaoji]['cs_new_count'] + $result[$zuoYeZhongXin]['cs_new_count'] + $result[$fenOrganfh]['cs_new_count'];
        #009
        foreach ($result_new_no_old_time_fh as &$value) {
            if($value['NEW_USER_NAME']==$userOne||$value['NEW_USER_NAME']==$userTwo){
                $result[$fenOrganfh]['cs_fix_count'] += (int)($value['NUM']);
            }else{
                $result[$zuoYeZhongXin]['cs_fix_count'] += (int)($value['NUM']);
            }
        }
        $temp[$heji]['cs_fix_count'] = $temp[$xiaoji]['cs_fix_count'] + $result[$zuoYeZhongXin]['cs_fix_count'] + $result[$fenOrganfh]['cs_fix_count'];
        #010
        foreach ($result_tc_no_null_fh as &$value) {
            //作业中心不提交BUG
            $result[$fenOrganfh]['cs_pro_count'] += (int)($value['NUM']);
        }
        $temp[$heji]['cs_pro_count'] = $temp[$xiaoji]['cs_pro_count'] + $result[$fenOrganfh]['cs_pro_count'];
        #TC数据库待定-问题单解决数量
        #######################################################################################################################################

        //理赔数据赋值
        for($i = 0;$i<=sizeof($org);$i++){
            $result[$i]['clm_old_count'] =0;
            $result[$i]['clm_new_count'] =0;
//            $result[$i]['clm_cannt_count'] =0;
            $result[$i]['clm_fix_count'] =0;
            $result[$i]['clm_pro_count'] =0;
            $result[$i]['clm_profix_count'] =0;
            $result[$i]['clm_fysame_count'] =0;
        }
        //默认不加载TC数据，通过申请队列加载
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

        if ($result) {
            exit(json_encode($result));
        } else {
            exit(json_encode(''));
        }
    }
//
//    print("查询数据"+bx_sql)
//    bx_cursor.execute(bx_sql)
//    # 输出信息
//    ro = bx_cursor.fetchall()
//    print(str(len(ro)))
//    for v in ro:
//
//        currentorg = '本部'
//        if v[0] in user_dict:
//            currentorg = user_dict[v[0]]
//        currentResult = result[currentorg]
//        currentResult['cs_old_count'] = currentResult['cs_old_count'] + 1
//        if  v[6] =='是':
//            currentResult['cs_fysame_count'] = currentResult['cs_fysame_count'] + 1
//        if  v[1] =='是':
//            if queryDate is None and v[4]!=v[5]:
//                currentResult['cs_fix_count'] = currentResult['cs_fix_count'] + 1
//            else:
//                currentResult['cs_new_count'] = currentResult['cs_new_count'] + 1
//        else:
//            currentResult['cs_cannt_count'] = currentResult['cs_cannt_count'] + 1
//        if  not v[3] is None :
//            for id in v[3].split(','):
//                #因总公司不提bug，故不统计总公司，只统计分公司
//                if tc_status[id]['id']!='787':
//                    currentResult['cs_pro_count'] = currentResult['cs_pro_count'] + 1
//                    if(tc_status[id]['state']=='8' or tc_status[id]['state']=='11'):
//                        currentResult['cs_profix_count'] = currentResult['cs_profix_count'] + 1
//    if not queryDate is None:
//        print("查询新核心处理既往数据"+bxfix_sql)
//        bx_cursor.execute(bxfix_sql)
//        # 输出信息
//        ro = bx_cursor.fetchall()
//        for v in ro:
//            if v[0] in user_dict:
//                currentorg = user_dict[v[0]]
//                currentResult = result[currentorg]
//                currentResult['cs_fix_count'] = currentResult['cs_fix_count'] + 1
//
//
//
//
//
//
//    '''
//    新契约
//    '''
//    where = ""
//    wherefix = ""
//    if not queryDate is None:
//        where  = "where OLD_INSERT_TIME = to_date('"+queryDate+"','yyyy-mm-dd')"
//        wherefix  = "where NEW_INSERT_TIME = to_date('"+queryDate+"','yyyy-mm-dd') and OLD_INSERT_TIME <> to_date('"+queryDate+"','yyyy-mm-dd')"
//    else:
//        wherefix = "where NEW_INSERT_TIME <> OLD_INSERT_TIME"
//    bx_sql = "select TRIM(OLD_USER_NAME),TRIM(IS_ACCORDANCE),TRIM(OLD_APPLE_CODE),TRIM(TC_ID),to_char(OLD_INSERT_TIME,'yyyymmdd'),to_char(NEW_INSERT_TIME,'yyyymmdd'),case when abs(OLD_PREM-NEW_PREM)<0.02 then '是' else '否' end, case when abs(OLD_AMNT-NEW_AMNT)<0.02 then '是' else '否' end  from tmp_bx_old_cdqcb " + where
//    bxfix_sql = "select TRIM(OLD_USER_NAME),TRIM(IS_ACCORDANCE),TRIM(OLD_APPLE_CODE),TRIM(TC_ID),to_char(OLD_INSERT_TIME,'yyyymmdd'),to_char(NEW_INSERT_TIME,'yyyymmdd'),case when abs(OLD_PREM-NEW_PREM)<0.02 then '是' else '否' end,case when abs(OLD_AMNT-NEW_AMNT)<0.02 then '是' else '否' end  from tmp_bx_old_cdqcb " + wherefix
//
//    print("查询数据"+bx_sql)
//    bx_cursor.execute(bx_sql)
//    # 输出信息
//    ro = bx_cursor.fetchall()
//    for v in ro:
//        if v[0] in user_dict:
//            currentorg = user_dict[v[0]]
//            currentResult = result[currentorg]
//            currentResult['nb_old_count'] = currentResult['nb_old_count'] + 1
//            if v[6] =='是':
//                currentResult['nb_bfsame_count'] = currentResult['nb_bfsame_count'] + 1
//            if v[7] =='是':
//                currentResult['nb_besame_count'] = currentResult['nb_besame_count'] + 1
//            if v[1] =='是':
//                if queryDate is None and v[4]!=v[5]:
//                    currentResult['nb_fix_count'] = currentResult['nb_fix_count'] + 1
//                else:
//                    currentResult['nb_new_count'] = currentResult['nb_new_count'] + 1
//            else:
//                currentResult['nb_cannt_count'] = currentResult['nb_cannt_count'] + 1
//            if  not v[3] is None :
//                for id in v[3].split(','):
//                    if not tc_status[id]['id'] in ['462','1201','1504','844']:
//                        currentResult['nb_pro_count'] = currentResult['nb_pro_count'] + 1
//                        if(tc_status[id]['state']=='8' or tc_status[id]['state']=='11'):
//                            currentResult['nb_profix_count'] = currentResult['nb_profix_count'] + 1
//    if not queryDate is None:
//        print("查询新核心处理既往数据"+bxfix_sql)
//        bx_cursor.execute(bxfix_sql)
//        # 输出信息
//        ro = bx_cursor.fetchall()
//        for v in ro:
//            if v[0] in user_dict:
//                currentorg = user_dict[v[0]]
//                currentResult = result[currentorg]
//                currentResult['nb_fix_count'] = currentResult['nb_fix_count'] + 1
//
//
//    '''
//    核保
//    '''
//    where = ""
//    wherefix = ""
//    if not queryDate is None:
//        where  = "where OLD_INSERT_TIME = to_date('"+queryDate+"','yyyy-mm-dd')"
//        wherefix  = "where NEW_INSERT_TIME = to_date('"+queryDate+"','yyyy-mm-dd') and OLD_INSERT_TIME <> to_date('"+queryDate+"','yyyy-mm-dd')"
//    else:
//        wherefix = "where NEW_INSERT_TIME <> OLD_INSERT_TIME"
//    bx_sql = "select TRIM(new_user_name),TRIM(IS_ACCORDANCE),TRIM(OLD_APPLE_CODE),TRIM(TC_ID),to_char(OLD_INSERT_TIME,'yyyymmdd'),to_char(NEW_INSERT_TIME,'yyyymmdd') from TMP_UW_LIST " + where
//    bxfix_sql = "select TRIM(new_user_name),TRIM(IS_ACCORDANCE),TRIM(OLD_APPLE_CODE),TRIM(TC_ID),to_char(OLD_INSERT_TIME,'yyyymmdd'),to_char(NEW_INSERT_TIME,'yyyymmdd')  from TMP_UW_LIST " + wherefix
//
//    print("查询数据"+bx_sql)
//    bx_cursor.execute(bx_sql)
//    # 输出信息
//    ro = bx_cursor.fetchall()
//    for v in ro:
//        currentorg = '分公司核保室'
//        if (v[1] =='是'
//            and v[0] in ['wu123','zhangxi_bx','wanglz_bx','taoli_bx','zhangys_bx','xielc_bx']):
//            currentorg = '总公司作业中心'
//        currentResult = result[currentorg]
//
//        currentResult['nb_old_count'] = currentResult['nb_old_count'] + 1
//        if  v[1] =='是':
//            if queryDate is None and v[4]!=v[5]:
//                currentResult['nb_fix_count'] = currentResult['nb_fix_count'] + 1
//                currentResult['nb_bfsame_count'] = currentResult['nb_bfsame_count'] + 1
//                currentResult['nb_besame_count'] = currentResult['nb_besame_count'] + 1
//            else:
//                currentResult['nb_new_count'] = currentResult['nb_new_count'] + 1
//                currentResult['nb_bfsame_count'] = currentResult['nb_bfsame_count'] + 1
//                currentResult['nb_besame_count'] = currentResult['nb_besame_count'] + 1
//
//        else:
//            currentResult['nb_cannt_count'] = currentResult['nb_cannt_count'] + 1
//        if  not v[3] is None :
//            for id in v[3].split(','):
//                if tc_status[id]['id'] in ['462','1201','1504']:
//                    currentResult['nb_pro_count'] = currentResult['nb_pro_count'] + 1
//                    if(tc_status[id]['state']=='8' or tc_status[id]['state']=='11'):
//                        currentResult['nb_profix_count'] = currentResult['nb_profix_count'] + 1
//    if not queryDate is None:
//        print("查询新核心处理既往数据"+bxfix_sql)
//        bx_cursor.execute(bxfix_sql)
//        # 输出信息
//        ro = bx_cursor.fetchall()
//        for v in ro:
//            currentorg = '分公司核保室'
//            if ( v[1] =='是'
//                and  v[0] in ['wu123','zhangxi_bx','wanglz_bx','taoli_bx','zhangys_bx','xielc_bx']):
//                currentorg = '总公司作业中心'
//            currentResult = result[currentorg]
//            currentResult['nb_fix_count'] = currentResult['nb_fix_count'] + 1
//
//
//    '''
//    理赔受理
//    '''
//    where = ""
//    wherefix = ""
//    if not queryDate is None:
//        where  = "where OLD_INSERT_TIME = to_date('"+queryDate+"','yyyy-mm-dd')"
//        wherefix  = "where NEW_INSERT_TIME = to_date('"+queryDate+"','yyyy-mm-dd') and OLD_INSERT_TIME <> to_date('"+queryDate+"','yyyy-mm-dd')"
//    else:
//        wherefix = "where NEW_INSERT_TIME <> OLD_INSERT_TIME"
//    bx_sql = "select TRIM(OLD_ORGAN_CODE),TRIM(IS_ACCORDANCE),TRIM(OLD_CASE_CODE),TRIM(TC_ID),to_char(OLD_INSERT_TIME,'yyyymmdd'),to_char(NEW_INSERT_TIME,'yyyymmdd'),case when abs(OLD_GET_MONEY-NEW_GET_MONEY)<0.02 then '是' else '否' end from TMP_NCS_QD_BX_LPBA_BD " + where
//    bxfix_sql = "select TRIM(OLD_ORGAN_CODE),TRIM(IS_ACCORDANCE),TRIM(OLD_CASE_CODE),TRIM(TC_ID),to_char(OLD_INSERT_TIME,'yyyymmdd'),to_char(NEW_INSERT_TIME,'yyyymmdd'),case when abs(OLD_GET_MONEY-NEW_GET_MONEY)<0.02 then '是' else '否' end from TMP_NCS_QD_BX_LPBA_BD " + wherefix
//
//    print("查询数据"+bx_sql)
//    bx_cursor.execute(bx_sql)
//    # 输出信息
//    ro = bx_cursor.fetchall()
//    for v in ro:
//        if v[0] in org_name:
//            currentorg = org_name[v[0]]
//        else:
//            currentorg = '本部'
//        currentResult = result[currentorg]
//        currentResult['clm_old_count'] = currentResult['clm_old_count'] + 1
//        if  v[1] =='是':
//            if queryDate is None and v[4]!=v[5]:
//                currentResult['clm_fix_count'] = currentResult['clm_fix_count'] + 1
//            else:
//                currentResult['clm_new_count'] = currentResult['clm_new_count'] + 1
//        else:
//            currentResult['clm_cannt_count'] = currentResult['clm_cannt_count'] + 1
//        if  v[6] =='是':
//            currentResult['clm_fysame_count'] = currentResult['clm_fysame_count'] + 1
//        if  not v[3] is None :
//            for id in v[3].split(','):
//                #因总公司不提bug，故不统计总公司，只统计分公司
//                if tc_status[id]['id']!='1617':
//                    currentResult['clm_pro_count'] = currentResult['clm_pro_count'] + 1
//                    if(tc_status[id]['state']=='8' or tc_status[id]['state']=='11'):
//                        currentResult['clm_profix_count'] = currentResult['clm_profix_count'] + 1
//    if not queryDate is None:
//        print("查询新核心处理既往数据"+bxfix_sql)
//        bx_cursor.execute(bxfix_sql)
//        # 输出信息
//        ro = bx_cursor.fetchall()
//        for v in ro:
//            currentorg = org_name[v[0]]
//            currentResult = result[currentorg]
//            currentResult['clm_fix_count'] = currentResult['clm_fix_count'] + 1
//
//    '''
//    理赔审批
//    '''
//    where = ""
//    wherefix = ""
//    if not queryDate is None:
//        where  = "where OLD_INSERT_TIME = to_date('"+queryDate+"','yyyy-mm-dd')"
//        wherefix  = "where NEW_INSERT_TIME = to_date('"+queryDate+"','yyyy-mm-dd') and OLD_INSERT_TIME <> to_date('"+queryDate+"','yyyy-mm-dd')"
//    else:
//        wherefix = "where NEW_INSERT_TIME <> OLD_INSERT_TIME"
//    bx_sql = "select trim(NEW_ORGAN_CODE),TRIM(IS_ACCORDANCE),TRIM(OLD_CASE_CODE),TRIM(TC_ID),TRIM(NEW_USER_NAME),to_char(OLD_INSERT_TIME,'yyyymmdd'),to_char(NEW_INSERT_TIME,'yyyymmdd')  from TMP_NCS_QD_BX_LPSHSP_BD " + where
//    bxfix_sql = "select TRIM(NEW_ORGAN_CODE ),TRIM(IS_ACCORDANCE),TRIM(OLD_CASE_CODE),TRIM(TC_ID),TRIM(NEW_USER_NAME),to_char(OLD_INSERT_TIME,'yyyymmdd'),to_char(NEW_INSERT_TIME,'yyyymmdd')  from TMP_NCS_QD_BX_LPSHSP_BD " + wherefix
//
//    print("查询数据"+bx_sql)
//    bx_cursor.execute(bx_sql)
//    # 输出信息
//    ro = bx_cursor.fetchall()
//
//    for v in ro:
//        currentorg = '分公司理赔室'
//        if v[1] =='是' and not v[4] in ['heyuan','heyuan_bx','SYSADMIN'] and not v[4] is None :
//            currentorg = '总公司作业中心'
//        currentResult = result[currentorg]
//        currentResult['clm_old_count'] = currentResult['clm_old_count'] + 1
//        if v[1] =='是':
//            if queryDate is None and v[5]!=v[6]:
//                currentResult['clm_fix_count'] = currentResult['clm_fix_count'] + 1
//                currentResult['clm_fysame_count'] = currentResult['clm_fysame_count'] + 1
//            else:
//                currentResult['clm_fysame_count'] = currentResult['clm_fysame_count'] + 1
//                currentResult['clm_new_count'] = currentResult['clm_new_count'] + 1
//        else:
//            currentResult['clm_cannt_count'] = currentResult['clm_cannt_count'] + 1
//        if  not v[3] is None :
//            for id in v[3].split(','):
//                #因总公司不提bug，故不统计总公司，只统计分公司
//                if not id in tc_status:
//                    continue
//                if tc_status[id]['id']=='1617':
//                    currentResult['clm_pro_count'] = currentResult['clm_pro_count'] + 1
//                    if(id!='0' and (tc_status[id]['state']=='8' or tc_status[id]['state']=='11')):
//                        currentResult['clm_profix_count'] = currentResult['clm_profix_count'] + 1
//    if not queryDate is None:
//        print("查询新核心处理既往数据"+bxfix_sql)
//        bx_cursor.execute(bxfix_sql)
//        # 输出信息
//        ro = bx_cursor.fetchall()
//        for v in ro:
//            currentorg = '分公司理赔室'
//            if v[1] =='是' and not v[4] in ['heyuan','heyuan_bx','SYSADMIN'] and not v[4] is None :
//                currentorg = '总公司作业中心'
//            currentResult = result[currentorg]
//            currentResult['clm_fix_count'] = currentResult['clm_fix_count'] + 1
//            #currentResult['clm_fysame_count'] = currentResult['clm_fysame_count'] + 1
//
//
//    '''
//    保全复合
//   '''
//    where = ""
//    wherefix = ""
//    if not queryDate is None:
//        where  = "where OLD_INSERT_TIME = to_date('"+queryDate+"','yyyy-mm-dd')"
//        wherefix  = "where NEW_INSERT_TIME = to_date('"+queryDate+"','yyyy-mm-dd') and OLD_INSERT_TIME <> to_date('"+queryDate+"','yyyy-mm-dd')"
//    else:
//        wherefix = "where NEW_INSERT_TIME <> OLD_INSERT_TIME"
//    bx_sql = "select TRIM(NEW_USER_NAME),TRIM(IS_ACCORDANCE),TRIM(OLD_ACCEPT_CODE),TRIM(TC_ID),to_char(OLD_INSERT_TIME,'yyyymmdd'),to_char(NEW_INSERT_TIME,'yyyymmdd'),OLD_ORGAN_CODE from TMP_NCS_QD_BX_BQFH_BD " + where
//    bxfix_sql = "select TRIM(NEW_USER_NAME),TRIM(IS_ACCORDANCE),TRIM(OLD_ACCEPT_CODE),TRIM(TC_ID),to_char(OLD_INSERT_TIME,'yyyymmdd'),to_char(NEW_INSERT_TIME,'yyyymmdd'),OLD_ORGAN_CODE  from TMP_NCS_QD_BX_BQFH_BD " + wherefix
//
//    print("查询数据"+bx_sql)
//    bx_cursor.execute(bx_sql)
//    # 输出信息
//    ro = bx_cursor.fetchall()
//    print(str(len(ro)))
//    for v in ro:
//        currentorg = '分公司保全室'
//        if v[1] =='是' and not v[0] in ['tangjia2_bx','tangjia_bx']:
//            currentorg = '总公司作业中心'
//        currentResult = result[currentorg]
//        currentResult['cs_old_count'] = currentResult['cs_old_count'] + 1
//        if  v[1] =='是':
//            #没有日期代表全部统计，此时需要统计既往数据处理，否则不统计处理既往
//            if queryDate is None and v[4]!=v[5]:
//                currentResult['cs_fix_count'] = currentResult['cs_fix_count'] + 1
//                currentResult['cs_fysame_count'] = currentResult['cs_fysame_count'] + 1
//            else:
//                currentResult['cs_new_count'] = currentResult['cs_new_count'] + 1
//                currentResult['cs_fysame_count'] = currentResult['cs_fysame_count'] + 1
//        else:
//            currentResult['cs_cannt_count'] = currentResult['cs_cannt_count'] + 1
//        if  not v[3] is None :
//            for id in v[3].split(','):
//                #因总公司不提bug，故不统计总公司，只统计分公司
//                if tc_status[id]['id']=='787':
//                    currentResult['cs_pro_count'] = currentResult['cs_pro_count'] + 1
//                    if(tc_status[id]['state']=='8' or tc_status[id]['state']=='11'):
//                        currentResult['cs_profix_count'] = currentResult['cs_profix_count'] + 1
//    if not queryDate is None:
//        print("查询新核心处理既往数据"+bxfix_sql)
//        bx_cursor.execute(bxfix_sql)
//        # 输出信息
//        ro = bx_cursor.fetchall()
//        for v in ro:
//            currentorg = '分公司保全室'
//            if v[1] =='是' and not v[0] in ['tangjia2_bx','tangjia_bx']:
//                currentorg = '总公司作业中心'
//                currentResult = result[currentorg]
//                currentResult['cs_fix_count'] = currentResult['cs_fix_count'] + 1
//                #currentResult['cs_fysame_count'] = currentResult['cs_fysame_count'] + 1
//
//
//    bx_cursor.close()
//    bx_conn.close()
//    arr_result = []
//    for key in result:
//        arr_result.append(result[key])
//        if(not key in ['小计','分公司核保室','分公司保全室','分公司理赔室','总公司作业中心','合计']):
//            for col in result[key]:
//                if col =='org':
//                    continue
//                    result['小计'][col] = result['小计'][col] +result[key][col]
//        if(not key in ['小计','合计']):
//            for col in result[key]:
//                if col =='org':
//                    continue
//                    result['合计'][col] = result['合计'][col] +result[key][col]
//    #arr_result.append(result['小计'])
//    return arr_result
//    }

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

}