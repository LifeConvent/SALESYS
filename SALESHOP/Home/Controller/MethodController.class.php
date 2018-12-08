<?php
/**
 * Created by PhpStorm.
 * User: lawrance
 * Date: 2016/11/24
 * Time: 下午1:32
 */

namespace Home\Controller;
use Think\Controller;
use Think\Log;

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

    public function getUserTypeBySql($username){
        $conn = $this->OracleOldDBCon();
        $select_des = "SELECT A.TYPE FROM TMP_DAYPOST_USER A WHERE ACCOUNT = '".$username."'";
        Log::write($username.'用户查询SQL：'.$select_des,'INFO');
        $result_rows = oci_parse($conn, $select_des); // 配置SQL语句，执行SQL
        $result = $this->search_long($result_rows);
        oci_free_statement($result_rows);
        oci_close($conn);
        if((int)$result[0]['TYPE']!=1){
            Log::write($username.'用户类型：'.$result[0]['TYPE'],'INFO');
            return '3';
        }else{
            Log::write($username.'用户类型：'.$result[0]['TYPE'],'INFO');
            return '1';
        }
    }

    public function getCanDayPostBySql($username){
        $conn = $this->OracleOldDBCon();
        $select_des = "SELECT A.CAN_DAYPOST FROM TMP_DAYPOST_USER A WHERE ACCOUNT = '".$username."'";
        Log::write($username.'用户查询SQL：'.$select_des,'INFO');
        $result_rows = oci_parse($conn, $select_des); // 配置SQL语句，执行SQL
        $result = $this->search_long($result_rows);
        oci_free_statement($result_rows);
        oci_close($conn);
        if((int)$result[0]['CAN_DAYPOST']!=1){
            Log::write($username.'用户日报权限：'.$result[0]['CAN_DAYPOST'],'INFO');
            return '0';
        }else{
            Log::write($username.'用户日报权限：'.$result[0]['CAN_DAYPOST'],'INFO');
            return '1';
        }
    }

    public function checkIn(&$admin)
    {
        $token = $_SESSION['token'];
        $token = $this->decode($token);
        $info = explode('-', $token);
        if (strcmp($info[2],"success") == 0) {
            $admin = $info[0];
            Log::write($admin.'用户登录，登录时间：'.date("h:i:sa")."<br>",'INFO');
            if($this->publicCheck($admin)==1){
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
        putenv("NLS_LANG=AMERICAN_AMERICA.AL32UTF8");
        //取数据库参数 querybx/querybx@10.1.95.43:1521/DMGTSTdb3
        $db_host_name='10.1.95.43:1521/DMGTSTdb3';
        $db_user_name='querybx';
        $db_pwd='querybx';
        //连接Oracle
        $conn = oci_connect($db_user_name,$db_pwd,$db_host_name);
        $user_name = $this->getUserName();
        Log::write($user_name.' 获取数据库链接时间：'.date("h:i:sa")."<br>",'INFO');
        if (!$conn) {
            $e = oci_error();
            return false;
        }
        else {
            return $conn;
        }
    }

    public function getStartDateString(){
        return '2018/8/1';
    }
    public function getStartDateStringWith(){
        return '2018-08-01';
    }
    public function getQianYiTime(){
        return '20180726';
    }
    public function getQianYiTimeWith(){
        return '2018-07-26';
    }

    public function getDictArry(){
        $org = array("本部","李沧","平度","胶南","即墨","胶州","城阳","莱西","开发区","市南","小计","分公司","作业中心","合计");
        return $org;
    }

    public function getDictIndex(){
        $org = array("本部" => 0,"李沧" => 1,"平度" => 2,"胶南" => 3,"即墨" => 4,"胶州" => 5,"城阳" => 6,
            "莱西" => 7,"开发区" => 8,"市南" => 9,"小计" => 10,"分公司" => 11,"作业中心" => 12,"合计" => 13);
        return $org;
    }

    public function getBugSys(){
        $org = array(
            "CSS-柜面系统" => 0,
            "NBS-新契约子系统" => 1,
            "CUS-保全子系统" => 2,
            "CLM-理赔子系统" => 3,
            "UWS-核保子系统" => 4,
            "CAP-收付费系统" => 5,
            "QRY-综合查询系统" => 6,
            "PAS-保单管理子系统" => 7,
            "PDS-产品工厂子系统" => 8,
            "BRM-规则管理平台" => 9,
            "PRS-打印系统" => 10,
            "ECS-影像采集系统与内容管理平台" => 11,
            "CIP-接入渠道整合平台" => 12,
            "DM-数据迁移项目" => 13,
            "SI-集成" => 14,
            "业务公共" => 15,
            "UDMP-统一开发管理平台" => 16,
            "ODS-数据集成平台" => 17,
            "BPM-工作流管理平台" => 18,
            "ESB-应用集成平台" => 19,
            "MDM" => 20,
            "合计" => 21
        );
        return $org;
    }

    public function getBugSysName(){
        $org = array(
            "CSS-柜面系统","NBS-新契约子系统","CUS-保全子系统","CLM-理赔子系统",
            "UWS-核保子系统",
            "CAP-收付费系统",
            "QRY-综合查询系统",
            "PAS-保单管理子系统",
            "PDS-产品工厂子系统",
            "BRM-规则管理平台",
            "PRS-打印系统",
            "ECS-影像采集系统与内容管理平台",
            "CIP-接入渠道整合平台",
            "DM-数据迁移项目",
            "SI-集成",
            "业务公共",
            "UDMP-统一开发管理平台",
            "ODS-数据集成平台",
            "BPM-工作流管理平台",
            "ESB-应用集成平台",
            "MDM","合计"
        );
        return $org;
    }

    //契约回执出单数据更新
    public function execLoadDataNBCD(){
        //解除30s限制
        set_time_limit(0);
        echo "契约数据更新开始：".date("h:i:sa")."<br> ";
//        $user_type = $this->getUserType();
//        if((int)$user_type!=1){
//            echo "请使用管理员账户登录后进行刷新数据！！！";
//            return;
//        }
        $conn = $this->OracleOldDBCon();
        echo "契约回执出单数据更新开始 <br>";
        $newDay = "INSERT INTO TMP_OLD_CDQCB 
                SELECT B.COMCODE AS ORGAN_CODE,
                       A.TAKEBACKMAKEDATE AS MODIFYDATE,
                       TRIM(A.CERTIFYNO)  AS PRTNO,
                       TRIM(A.CERTIFYNO)  AS PRTNO1,
                       TRIM(A.OPERATOR)   AS OPERATOR,
                       '保单回执 ' AS NODE,
                       TP.PREM AS PREM,
                       TP.AMNT AS AMNT
                  FROM LIS.LZSYSCERTIFY A
                  LEFT JOIN LIS.LDUSER B
                    ON TRIM(A.OPERATOR) = TRIM(B.USERCODE)
                     LEFT JOIN (SELECT T.CONTNO    CONTNO, 
                       SUM(T.PREM)      PREM,
                       SUM(T.AMNT)      AMNT
                  FROM LIS.LCPOL T GROUP BY T.CONTNO) TP
                    ON TP.CONTNO = CONCAT(A.CERTIFYNO,'        ') OR TP.CONTNO = CONCAT(A.CERTIFYNO,'      ')
                 WHERE EXISTS (SELECT 1
                          FROM LIS.LCCONT T
                         WHERE A.CERTIFYNO = TRIM(T.CONTNO)
                           AND T.CONTTYPE = '1'
                           AND SUBSTR(T.MANAGECOM, 1, 4) = '8647'
                           AND (T.POLAPPLYDATE >= TO_DATE('".$this->getQianYiTime()."', 'YYYYMMDD') OR
                                (T.POLAPPLYDATE < TO_DATE('".$this->getQianYiTime()."', 'YYYYMMDD'))))
                           AND (TO_DATE(A.TAKEBACKMAKEDATE,'YYYY/MM/DD') BETWEEN TO_DATE('".$this->getStartDateString()."', 'YYYY/MM/DD') AND TO_DATE(SYSDATE,'YYYY/MM/DD'))";
        $statement = oci_parse($conn,$newDay);
        echo "老核心回执录入插入 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "DELETE FROM TMP_OLD_CDQCB T1 WHERE T1.PRTNO IN (SELECT PRTNO FROM TMP_OLD_CDQCB GROUP BY PRTNO HAVING COUNT(*)>1) AND ROWID NOT IN (SELECT MAX(ROWID) FROM TMP_OLD_CDQCB GROUP BY PRTNO HAVING COUNT(*)>1)";
        $statement = oci_parse($conn,$newDay);
        echo "老核心回执录入删除 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "INSERT INTO TMP_BX_CDQCB 
                SELECT C.ORGAN_CODE       AS ORGAN_CODE, 
                       A.BRANCH_RECEIVE_DATE AS OPERATE_TIME, 
                       B.POLICY_CODE      AS APPLY_CODE, 
                       B.POLICY_CODE     AS APPLY_CODE1,
                       C.USER_NAME        AS USER_NAME,
                       '保单回执 '      AS NODE,
                       PRO.PREM           AS PREM,
                       PRO.AMOUNT         AS AMNT 
                  FROM DEV_PAS.T_POLICY_ACKNOWLEDGEMENT@BINGXING_168_15 A
                  LEFT JOIN DEV_PAS.T_CONTRACT_MASTER@BINGXING_168_15 B
                    ON A.POLICY_ID = B.POLICY_ID
                  LEFT JOIN DEV_PAS.T_UDMP_USER@BINGXING_168_15 C
                    ON A.OPERATOR_ID = C.USER_ID
                     LEFT JOIN (SELECT SUM(TCP.TOTAL_PREM_AF) AS PREM , SUM(TCP.AMOUNT) AS AMOUNT,TCP.APPLY_CODE  FROM DEV_NB.T_NB_CONTRACT_PRODUCT@BINGXING_168_15_NBS TCP  GROUP BY TCP.APPLY_CODE
                )PRO  ON PRO.APPLY_CODE = B.APPLY_CODE
                 WHERE 1=1
                   AND (TO_DATE(A.BRANCH_RECEIVE_DATE,'YYYY/MM/DD') BETWEEN TO_DATE('".$this->getStartDateString()."','YYYY/MM/DD') AND TO_DATE(SYSDATE,'YYYY/MM/DD'))";
        $statement = oci_parse($conn,$newDay);
        echo "新核心回执录入插入 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "DELETE FROM TMP_BX_CDQCB T1 WHERE T1.APPLY_CODE IN (SELECT APPLY_CODE FROM TMP_BX_CDQCB GROUP BY APPLY_CODE HAVING COUNT(*)>1) 
                    AND ROWID NOT IN (SELECT MAX(ROWID) FROM TMP_BX_CDQCB GROUP BY APPLY_CODE HAVING COUNT(*)>1)";
        $statement = oci_parse($conn,$newDay);
        echo "新核心回执录入删除 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "INSERT INTO TMP_OLD_CDQCB 
                    SELECT DISTINCT 
                            T.MANAGECOM AS ORGAN_CODE,
                           T.MODIFYDATE   AS MODIFYDATE,
                           TRIM(T.PRTNO)     AS PRTNO,
                           TRIM(T.PRTNO)    AS PRTNO1,
                           TRIM(T.OPERATOR)  AS OPERATOR,
                           '出单前撤保 ' NODE,
                           TP.PREM         AS PREM,
                           TP.AMNT         AS AMNT      
                      FROM LIS.LCAPPLYRECALLPOL T
                      LEFT JOIN LIS.LDUSER N
                        ON TRIM(T.OPERATOR) = TRIM(N.USERCODE)
                         LEFT JOIN (SELECT  T.PRTNO    PRTNO, 
                          SUM(T.PREM)      PREM,
                          SUM(T.AMNT)      AMNT
                      FROM LIS.LCPOL T GROUP BY T.PRTNO) TP
                      ON TP.PRTNO=T.PRTNO
                     WHERE EXISTS (SELECT 1
                              FROM LIS.LCPOL M
                             WHERE T.PROPOSALNO = M.PROPOSALNO
                               AND SUBSTR(M.MANAGECOM, 1, 4) = '8647'
                               AND M.CONTTYPE = '1'
                               AND (M.POLAPPLYDATE >= TO_DATE('".$this->getQianYiTime()."', 'YYYYMMDD') OR
                                   (M.POLAPPLYDATE < TO_DATE('".$this->getQianYiTime()."', 'YYYYMMDD') 
                                 )))
                         AND (TO_DATE(T.MODIFYDATE,'YYYY/MM/DD') BETWEEN TO_DATE('".$this->getStartDateString()."', 'YYYY/MM/DD') AND SYSDATE)";
        $statement = oci_parse($conn,$newDay);
        echo "老核心出单前撤保插入 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "DELETE FROM TMP_OLD_CDQCB T1 WHERE T1.PRTNO IN (SELECT PRTNO FROM TMP_OLD_CDQCB GROUP BY PRTNO HAVING COUNT(*)>1) 
                  AND ROWID NOT IN (SELECT MAX(ROWID) FROM TMP_OLD_CDQCB GROUP BY PRTNO HAVING COUNT(*)>1)";
        $statement = oci_parse($conn,$newDay);
        echo "新核心回执录入删除 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "INSERT INTO TMP_BX_CDQCB
                    SELECT TUU.ORGAN_CODE AS ORGAN_CODE,
                          TPC.OPERATE_TIME AS OPERATE_TIME, 
                          TPC.APPLY_CODE AS APPLY_CODE,
                          TPC.APPLY_CODE AS APPLY_CODE1,
                          TUU.USER_NAME AS USER_NAME,
                          '出单前撤保 ' NODE, 
                           PRO.PREM     AS PREM,
                          PRO.AMOUNT    AS AMNT    
                      FROM DEV_NB.T_POLICY_CANCEL@BINGXING_168_15_NBS TPC
                      LEFT JOIN DEV_NB.T_NB_CONTRACT_MASTER@BINGXING_168_15_NBS TCM
                        ON (TPC.APPLY_CODE = TCM.APPLY_CODE)
                      LEFT JOIN DEV_NB.T_UDMP_USER@BINGXING_168_15_NBS TUU
                        ON (TPC.OPERATER_ID = TUU.USER_ID)
                      LEFT JOIN DEV_NB.T_PRE_AUDIT_MASTER@BINGXING_168_15_NBS TAM
                        ON (TAM.APPLY_CODE = TPC.APPLY_CODE)
                        LEFT JOIN (SELECT SUM(TCP.TOTAL_PREM_AF) AS PREM , SUM(TCP.AMOUNT) AS AMOUNT,TCP.APPLY_CODE  FROM DEV_NB.T_NB_CONTRACT_PRODUCT@BINGXING_168_15_NBS TCP  GROUP BY TCP.APPLY_CODE
                    )PRO  ON (PRO.APPLY_CODE = TCM.APPLY_CODE) 
                     WHERE 1 = 1
                       AND TCM.PROPOSAL_STATUS = '12'
                       AND (TO_DATE(TPC.INSERT_TIME,'YYYY/MM/DD') BETWEEN TO_DATE('".$this->getStartDateString()."','YYYY/MM/DD') AND TO_DATE(SYSDATE,'YYYY/MM/DD'))";
        $statement = oci_parse($conn,$newDay);
        echo "新核心出单前撤保插入 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "DELETE FROM TMP_BX_CDQCB T2 WHERE T2.APPLY_CODE IN (SELECT APPLY_CODE FROM TMP_BX_CDQCB GROUP BY APPLY_CODE HAVING COUNT(*)>1) 
                    AND ROWID NOT IN (SELECT MAX(ROWID) FROM TMP_BX_CDQCB GROUP BY APPLY_CODE HAVING COUNT(*)>1)";
        $statement = oci_parse($conn,$newDay);
        echo "新核心出单前撤保删除 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "EXECUTE IMMEDIATE 'TRUNCATE TABLE TMP_BX_OLD_CDQCB'";
        $statement = oci_parse($conn,$newDay);
        echo "脚本执行 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "INSERT INTO TMP_BX_OLD_CDQCB 
                      SELECT OT.ORGAN_CODE AS OLD_ORGAN_CODE ,NT.ORGAN_CODE AS NEW_ORGAN_CODE,OT.OPERATOR AS OLD_USER_NAME,NT.USER_NAME AS NEW_USER_NAME ,OT.MODIFYDATE AS OLD_INSERT_TIME,NT.OPERATE_TIME AS NEW_INSERT_TIME,OT.PRTNO AS OLD_APPLE_CODE,NT.APPLY_CODE AS NEW_APPLE_CODE,
                      (CASE WHEN TRIM(OT.PRTNO) = TRIM(NT.APPLY_CODE) THEN '是 '
                       ELSE '否 ' END)AS IS_ACCORDANCE,'' AS TC_ID,' ' AS PRO_NUMBER, OT.NODE AS NODE,SYSDATE AS INSERT_TIME,OT.PREM AS OLD_PREM,OT.AMNT AS OLD_AMNT,NT.PREM AS NEW_PREM,NT.AMNT AS NEW_AMNT
                       FROM TMP_OLD_CDQCB OT LEFT JOIN TMP_BX_CDQCB NT ON TRIM(OT.PRTNO) = TRIM(NT.APPLY_CODE)";
        $statement = oci_parse($conn,$newDay);
        echo "比对新核心出单前撤保插入 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "DELETE FROM TMP_BX_OLD_CDQCB T2 WHERE T2.OLD_APPLE_CODE IN (SELECT OLD_APPLE_CODE FROM TMP_BX_OLD_CDQCB GROUP BY OLD_APPLE_CODE HAVING COUNT(*)>1) 
                    AND ROWID NOT IN (SELECT MAX(ROWID) FROM TMP_BX_OLD_CDQCB GROUP BY OLD_APPLE_CODE HAVING COUNT(*)>1)";
        $statement = oci_parse($conn,$newDay);
        echo "比对新核心出单前撤保删除 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "DELETE FROM TMP_BX_OLD_CDQCB T2 WHERE TRIM(T2.OLD_USER_NAME)='MOBILE'";
        $statement = oci_parse($conn,$newDay);
        echo "比对NOBILE删除 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";

        oci_free_statement($statement);
        oci_close($conn);
        echo "契约数据更新结束 ：".date("h:i:sa")."<br> ";
    }

    //理赔受理数据更新
    public function execLoadDataCLMSL(){
        //解除30s限制
        set_time_limit(0);
        echo "理赔受理数据更新开始：".date("h:i:sa")."<br> ";
//        $user_type = $this->getUserType();
//        if((int)$user_type!=1){
//            echo "请使用管理员账户登录后进行刷新数据！！！";
//            return;
//        }
        $conn = $this->OracleOldDBCon();
        $newDay = "delete from  TMP_OLD_QD_BX_LPBA ba where trunc(ba.insert_time) = trunc(sysdate)";
        $statement = oci_parse($conn,$newDay);
        echo "清空老核心当日临时表 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "insert into TMP_OLD_QD_BX_LPBA 
                    select distinct trim(t1.mngcom)   as  ORGAN_CODE,
                                    TRUNC(t1.makedate)  as  INSERT_TIME,
                                    '' as POLICY_CODE,
                                    trim(t1.rgtno)   as CASE_CODE,                
                                    t4.USERname   as USER_NAME,               
                                    '理赔受理 '  as  BUSINESS_TYPE,
                                    sysdate as  INSERT_SYSDATE,
                                    '0' as GET_MONEY    
                       From  lis.Llregister t1 
                        inner join lis.Llclaimdetail t2
                        on t1.rgtno = t2.clmno
                        inner join lis.lcpol t3
                        on t2.polno = t3.polno
                         left join lis.lduser t4
                        on t1.operator = t4.usercode
                    Where  t1.rgtobj='1'
                       And trunc(t1.makedate) = trunc(sysdate)
                    and t1.Rgtdate >= date '".$this->getQianYiTimeWith()."'
                    and t3.managecom like '8647%'
                    union
                    Select distinct trim(t1.mngcom)   as  ORGAN_CODE,
                                    TRUNC(t1.makedate)  as  INSERT_TIME,
                                    '' as POLICY_CODE,
                                    trim(t1.rgtno)   as CASE_CODE,                
                                    t4.USERname   as USER_NAME,               
                                    '理赔受理 '  as  BUSINESS_TYPE,
                                    sysdate as  INSERT_SYSDATE,
                                    '0' as GET_MONEY    
                     From  lis.Llregister t1
                     left join  lis.lduser t4
                        on t1.operator = t4.usercode
                     Where  t1.Mngcom Like '8647%' and t1.rgtobj='1'
                        And trunc(t1.makedate) = trunc(sysdate)
                    and t1.Rgtdate >= date '".$this->getQianYiTimeWith()."'
                    AND CLMSTATE >= '20'   AND CLMSTATE < '30'";
        $statement = oci_parse($conn,$newDay);
        echo "老核心当日临时表插入 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "delete from  TMP_NCS_QD_BX_LPBA ba where trunc(ba.insert_time) = trunc(sysdate)";
        $statement = oci_parse($conn,$newDay);
        echo "清空新核心当日临时表 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "insert into TMP_NCS_QD_BX_LPBA 
                    select distinct trim(A.ORGAN_CODE) as  ORGAN_CODE,
                                    TRUNC(A.SIGN_TIME)  as  INSERT_TIME,
                                    trim(A.CASE_NO) as CASE_CODE,                
                                    D.USER_name as USER_NAME,      
                                    sysdate as  INSERT_SYSDATE,      
                                    '理赔受理 ' as  BUSINESS_TYPE,
                                    '0' as GET_MONEY               
                        from DEV_CLM.T_CLAIM_CASE@Bingxing_168_15_Clm A
                      left join DEV_PAS.T_UDMP_USER@Bingxing_168_15_Pas D
                        on A.ACCEPTOR_ID = D.USER_ID
                    where 1=1   
                      and a.case_status in ('30', '31','32','40','41','50','51','52','53',
                                             '54','60','61','70','71','80','90','99')
                      and TRUNC(a.sign_time) = TRUNC(sysdate)
                      and a.case_no not in (
                      select distinct    trim(t1.rgtno) rgtno                            
                      from lis.llregister t1  
                      left join lis.lduser t4
                        on t1.operator = t4.usercode
                    where 1=1
                       and t1.rgtobj='1'
                       and (Clmstate <> '10' or Clmstate <> '15') 
                       --迁移时点 至统计开始时间  排除统计范围
                       and TRUNC(t1.makedate) >= DATE'".$this->getQianYiTimeWith()."' AND TRUNC(t1.makedate) <= DATE'".$this->getStartDateStringWith()."')";
        $statement = oci_parse($conn,$newDay);
        echo "插入新核心当日临时表排除迁移至开始统计数据 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "delete from TMP_NCS_QD_BX_LPBA_BD bd ";
        $statement = oci_parse($conn,$newDay);
        echo "清空比对表 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "insert into TMP_NCS_QD_BX_LPBA_BD  
                    SELECT T1.ORGAN_CODE as OLD_ORGAN_CODE,
                           T2.Organ_Code as NEW_ORGAN_CODE,
                           T1.Case_CODE as OLD_CASE_CODE,
                           T2.Case_CODE as NEW_CASE_CODE,
                           t1.user_name as OLD_USER_NAME,
                           t2.USER_name as NEW_USER_NAME,
                           T1.INSERT_TIME as OLD_INSERT_TIME,
                           T2.INSERT_TIME  as NEW_INSERT_TIME,
                           (CASE
                             WHEN TRIM(T1.Case_CODE) = TRIM(T2.Case_CODE) THEN
                              '是 '
                             ELSE
                              '否 '
                           END) AS IS_ACCORDANCE, 
                           sysdate as INSERT_SYSDATE,
                           '理赔受理 ' as BUSINESS_TYPE,
                           0.00 as OLD_GET_MONEY,
                           0.00 as NEW_GET_MONEY,
                           ' ' as TC_ID,
                           ' ' as PRO_NUMBER       
                      FROM TMP_OLD_QD_BX_LPBA T1
                      LEFT JOIN TMP_NCS_QD_BX_LPBA T2   
                       on TRIM(T1.Case_CODE) = TRIM(T2.Case_CODE)";
        $statement = oci_parse($conn,$newDay);
        echo "比对表插入 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "delete from TMP_NCS_QD_BX_LPBA_BD  T2 where T2.OLD_CASE_CODE in (select OLD_CASE_CODE from TMP_NCS_QD_BX_LPBA_BD group by OLD_CASE_CODE having count(*)>1) 
                  and rowid not in (select max(rowid) from TMP_NCS_QD_BX_LPBA_BD group by OLD_CASE_CODE having count(*)>1)";
        $statement = oci_parse($conn,$newDay);
        echo "清空数据 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "update TMP_NCS_QD_BX_LPBA_BD t set (OLD_GET_MONEY) = 
                      nvl((select DECODE(TRIM(C.CLMSTATE), '50', TRIM(C.REALPAY), '60', TRIM(C.REALPAY), '0') from  lis.LLCLAIM c
                      where concat(t.old_case_code,'         ') = c.clmno  ),'0')";
        $statement = oci_parse($conn,$newDay);
        echo "数据更新 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "update TMP_NCS_QD_BX_LPBA_BD t set (NEW_GET_MONEY) = 
                      (select DECODE(CLM.CASE_STATUS, '80', CLM.ACTUAL_PAY, '0') from  DEV_CLM.T_CLAIM_CASE@BINGXING_168_15_CLM clm
                      where t.old_case_code = clm.case_no)";
        $statement = oci_parse($conn,$newDay);
        echo "数据更新 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";

        oci_free_statement($statement);
        oci_close($conn);
        echo "理赔受理数据更新结束 ：".date("h:i:sa")."<br> ";
    }

    //理赔审核数据更新
    public function execLoadDataCLMSHSP(){
        //解除30s限制
        set_time_limit(0);
        echo "理赔审核数据更新开始：".date("h:i:sa")."<br> ";
//        $user_type = $this->getUserType();
//        if((int)$user_type!=1){
//            echo "请使用管理员账户登录后进行刷新数据！！！";
//            return;
//        }
        $conn = $this->OracleOldDBCon();
        $newDay = "delete from TMP_LIS_QD_BX_LPSH sh where TRUNC(sh.AUDITDATE) = TRUNC(SYSDATE)";
        $statement = oci_parse($conn,$newDay);
        echo "清空老核心当日临时表 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "INSERT INTO TMP_LIS_QD_BX_LPSH              
                    Select distinct a.mngcom mngcom, d.auditdate auditdate, a.Rgtno Rgtno,d.auditper auditper
                    From (Select * From lis.Llregister Where Clmstate In ('40', '50', '60', '70') and Mngcom Like '8647%' and rgtobj='1') a, 
                     lis.Llclaimdetail b,  lis.Llclaimuwmain d, lis.lcpol e, lis.lduser f
                       Where a.Rgtno = b.Clmno 
                       And a.Rgtno = d.Clmno  
                       and b.polno = e.polno
                       and d.auditper = f.usercode
                       And TRUNC(d.auditdate) = TRUNC(SYSDATE)
                    and TRUNC(a.Rgtdate) >= date '".$this->getQianYiTimeWith()."'
                    and e.managecom like  '8647%'";
        $statement = oci_parse($conn,$newDay);
        echo "插入老核心当日临时表 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "delete from TMP_LIS_QD_BX_LPSP sp where TRUNC(sp.EXAMDATE) = TRUNC(sysdate)";
        $statement = oci_parse($conn,$newDay);
        echo "清空理赔审批老核心当日临时表 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "INSERT INTO TMP_LIS_QD_BX_LPSP
                    Select  distinct a.mngcom mngcom, d.Examdate Examdate, TRIM(a.Rgtno) Rgtno,d.Examper Examper
                    From (Select * From lis.Llregister Where Clmstate In ('40', '50', '60', '70') And Mngcom Like '8647%' and rgtobj='1') a, 
                     lis.Llclaimdetail b,  lis.Llclaimuwmain d, lis.lcpol e, lis.lduser g
                       Where a.Rgtno = b.Clmno 
                       And a.Rgtno = d.Clmno  
                       and b.polno = e.polno
                       and d.Examper = g.usercode
                       And TRUNC(d.Examdate) = TRUNC(SYSDATE)
                    and a.Rgtdate >= date '".$this->getQianYiTimeWith()."'
                    and e.managecom like  '8647%'
                    and d.Examper <> 'BPO_CLM'
                    and d.auditper <> 'AUTO'
                    and d.Examper <> d.auditper";
        $statement = oci_parse($conn,$newDay);
        echo "理赔审批插入老核心当日临时表 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "delete from TMP_NCS_QD_BX_LPSH sh where TRUNC(sh.AUDIT_TIME) = TRUNC(sysdate)";
        $statement = oci_parse($conn,$newDay);
        echo "清空理赔审核老核心当日临时表 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "INSERT INTO TMP_NCS_QD_BX_LPSH
                    SELECT DISTINCT a.AUDIT_ORGAN  AS Organ_Code,
                                    A.AUDIT_TIME as AUDIT_TIME,
                                    trim(a.Case_No) AS Case_No,                
                                    a.case_Status AS case_Status,
                                    D.USER_NAME as USER_NAME
                      FROM Dev_Clm.t_Claim_Case@Bingxing_168_15_Clm      a
                      left join dev_pas.t_udmp_user@bingxing_168_15_Pas d
                      on a.AUDITOR_ID = d.USER_ID
                     WHERE 1 = 1
                        AND a.CASE_STATUS >='60'
                         AND trunc(a.sign_TIME) >= DATE'".$this->getQianYiTimeWith()."'    
                       AND a.AUDITOR_ID is not null 
                       AND TRUNC(A.AUDIT_TIME) = TRUNC(sysdate)";
        $statement = oci_parse($conn,$newDay);
        echo "理赔审核插入老核心当日临时表 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "INSERT INTO TMP_NCS_QD_BX_LPSH
                    SELECT DISTINCT t1.Organ_Code  AS Organ_Code,
                                    t1.registe_TIME as AUDIT_TIME,
                                    trim(t1.Case_No) AS Case_No,                
                                    t1.case_Status AS case_Status,
                                    'SYSADMIN' as USER_NAME
                      FROM DEV_CLM.T_CLAIM_CASE@BINGXING_168_15_CLM T1
                    WHERE  T1.CASE_STATUS = '80'
                      and TRUNC(t1.sign_time) = TRUNC(sysdate)";
        $statement = oci_parse($conn,$newDay);
        echo "理赔审核插入老核心 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "delete from TMP_NCS_QD_BX_LPSP sp where TRUNC(sp.APPROVE_TIME) = TRUNC(sysdate)";
        $statement = oci_parse($conn,$newDay);
        echo "清空理赔审批新核心当日临时表 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "INSERT INTO TMP_NCS_QD_BX_LPSP
                    SELECT DISTINCT A.Audit_Organ AS Audit_Organ,
                                    a.Approve_Time AS Approve_Time,
                                    TRIM(a.CASE_NO) AS CASE_NO,
                                    d.USER_NAME as USER_NAME       
                      FROM Dev_Clm.t_Claim_Case@Bingxing_168_15_Clm      a
                      left join Dev_Clm.t_Contract_Master@Bingxing_168_15_Clm c
                      on A.CASE_Id = c.CASE_Id
                      left join dev_pas.t_udmp_user@bingxing_168_15_Pas d
                      on a.APPROVER_ID = d.USER_ID
                     WHERE 1 =1 
                      AND trunc(a.sign_TIME) >= DATE'".$this->getQianYiTimeWith()."'
                     AND a.CASE_STATUS >='60'
                      and a.APPROVE_DECISION = '1'
                     And trunc(a.Approve_Time) = TRUNC(sysdate)
                    AND a.APPROVER_ID is not null";
        $statement = oci_parse($conn,$newDay);
        echo "插入审批新核心当日临时表 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "INSERT INTO TMP_NCS_QD_BX_LPSP
                    SELECT DISTINCT t1.Organ_Code  AS AUDIT_ORGAN,
                                    t1.registe_TIME as APPROVE_TIME,
                                    trim(t1.Case_No) AS Case_No,       
                                    'SYSADMIN' as USER_NAME
                      FROM DEV_CLM.T_CLAIM_CASE@BINGXING_168_15_CLM T1
                    WHERE  T1.CASE_STATUS = '80'
                      and TRUNC(t1.end_case_time) = TRUNC(sysdate)";
        $statement = oci_parse($conn,$newDay);
        echo "理赔审批插入 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "delete from TMP_NCS_QD_BX_LPSH T1 where T1.case_no in (select case_no from TMP_NCS_QD_BX_LPSH group by case_no having count(*)>1) 
                    and rowid not in (select max(rowid) from TMP_NCS_QD_BX_LPSH group by case_no having count(*)>1)";
        $statement = oci_parse($conn,$newDay);
        echo "理赔审核删除 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "delete from TMP_NCS_QD_BX_LPSP T1 where T1.case_no in (select case_no from TMP_NCS_QD_BX_LPSP group by case_no having count(*)>1) 
                  and rowid not in (select max(rowid) from TMP_NCS_QD_BX_LPSP group by case_no having count(*)>1)";
        $statement = oci_parse($conn,$newDay);
        echo "理赔审批删除 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "delete from TMP_NCS_QD_BX_LPSHSP_BD";
        $statement = oci_parse($conn,$newDay);
        echo "理赔比对表删除 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "insert into TMP_NCS_QD_BX_LPSHSP_BD 
                    SELECT distinct trim(T1.mngcom) as  OLD_ORGAN_CODE,
                           T2.Organ_Code as NEW_ORGAN_CODE,
                           T1.AUDITPER as OLD_USER_NAME,
                           T2.USER_NAME as NEW_USER_NAME,
                           T1.rgtno as OLD_CASE_CODE,
                           T2.Case_No as NEW_CASE_CODE,
                           T1.AUDITDATE as OLD_INSERT_TIME,
                           T2.AUDIT_TIME as NEW_INSERT_TIME,
                           sysdate as INSERT_SYSDATE,
                           '0' as TC_ID,
                           '理赔审核 ' as BUSINESS_TYPE,
                           (CASE
                             WHEN TRIM(T1.rgtno) = T2.Case_No THEN
                              '是'
                             ELSE
                              '否'
                           END) AS IS_ACCORDANCE
                      FROM Tmp_Lis_Qd_Bx_Lpsh T1
                      LEFT JOIN Tmp_Ncs_Qd_Bx_Lpsh T2
                       on TRIM(T1.rgtno) = TRIM(T2.Case_No)";
        $statement = oci_parse($conn,$newDay);
        echo "理赔审核比对表插入 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "insert into TMP_NCS_QD_BX_LPSHSP_BD t 
                    SELECT distinct 
                           trim(T1.mngcom) as  OLD_ORGAN_CODE,
                           trim(T2.AUDIT_ORGAN) as new_ORGAN_CODE,
                           T1.EXAMPER as OLD_USER_NAME,
                           T2.USER_NAME as NEW_USER_NAME,
                           T1.rgtno as OLD_CASE_CODE,
                           T2.CASE_NO as NEW_CASE_CODE,
                           T1.EXAMDATE as OLD_INSERT_TIME,
                           T2.APPROVE_TIME as NEW_INSERT_TIME,
                           sysdate as INSERT_SYSDATE,
                           '' as TC_ID,
                           '理赔审批 ' as BUSINESS_TYPE,
                           (CASE
                             WHEN TRIM(T1.rgtno) = T2.CASE_NO THEN
                              '是'
                             ELSE
                              '否'
                           END) AS IS_ACCORDANCE
                      FROM Tmp_Lis_Qd_Bx_Lpsp T1
                      LEFT JOIN Tmp_Ncs_Qd_Bx_Lpsp T2
                       on TRIM(T1.rgtno) = TRIM(T2.CASE_NO)";
        $statement = oci_parse($conn,$newDay);
        echo "理赔审批比对表插入 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";

        oci_free_statement($statement);
        oci_close($conn);
        echo "理赔审核数据更新结束 ：".date("h:i:sa")."<br> ";
    }

    //核保数据更新
    public function execLoadDataUW(){
        //解除30s限制
        set_time_limit(0);
        echo "核保数据更新开始 ：".date("h:i:sa")."<br> ";
//        $user_type = $this->getUserType();
//        if((int)$user_type!=1){
//            echo "请使用管理员账户登录后进行刷新数据！！！";
//            return;
//        }
        $conn = $this->OracleOldDBCon();
        echo "核保数据更新开始 ：".date("h:i:sa")."<br> ";
        $newDay = "DELETE FROM UW_SUB_NCL_TMP";
        $statement = oci_parse($conn,$newDay);
        echo "清空新核心当日临时表 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "INSERT INTO UW_SUB_NCL_TMP
                  (ORGAN_CODE, -- 机构  
                   POLICY_CODE, -- 保单号 
                   BIZ_CODE, -- 业务号(投保单号/受理号/赔案号) 
                   USER_NAME, -- 操作员 
                   UW_FINISH_DATE, -- 操作日期  
                   UW_FINISH_TIME, -- 操作时间  
                   SOURCE_TAB, -- 业务类别  
                   INSERT_SYSDATE --  系统插入日期  
                   )
                  SELECT B.ORGAN_CODE,
                         T.POLICY_CODE,
                         T.APPLY_CODE,
                         B.USER_NAME,
                         TRUNC(X.UW_FINISH_TIME),
                         X.UW_FINISH_TIME,
                         '契约',
                         TRUNC(SYSDATE)
                    FROM DEV_UW.T_UW_POLICY@BINGXING_168_15_UW T
                    LEFT JOIN DEV_UW.T_UW_AUTO@BINGXING_168_15_UW A
                      ON A.UW_ID = T.UW_ID
                    LEFT JOIN DEV_UW.T_UW_MASTER@BINGXING_168_15_UW X
                      ON X.UW_ID = T.UW_ID
                    LEFT JOIN DEV_UW.T_UDMP_USER@BINGXING_168_15_UW B
                      ON X.UW_USER_ID = B.USER_ID
                   WHERE 1 = 1
                     AND T.UW_SOURCE_TYPE = '1' -- 新契约人核的
                        -- AND A.RULE_RUN_STATUS = 'V02' -- 进入人核的
                     AND T.ORGAN_CODE LIKE '86%' -- 青岛分公司的
                     AND X.UW_STATUS_DETAIL = '0401' -- 人工核保完成的 
                     AND B.ORGAN_CODE IS NOT NULL
                     AND B.USER_NAME IS NOT NULL
                     AND TRUNC(X.UW_FINISH_TIME) >= TO_DATE('".$this->getStartDateString()."', 'YYYY/MM/DD')
                     AND TRUNC(X.UW_FINISH_TIME) <= TRUNC(SYSDATE)";
        $statement = oci_parse($conn,$newDay);
        echo "契约核保新核心当日临时表插入 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "INSERT INTO UW_SUB_NCL_TMP
                  (ORGAN_CODE, -- 机构  
                   POLICY_CODE, -- 保单号 
                   BIZ_CODE, -- 业务号(投保单号/受理号/赔案号) 
                   USER_NAME, -- 操作员 
                   UW_FINISH_DATE, -- 操作日期  
                   UW_FINISH_TIME, -- 操作时间  
                   SOURCE_TAB, -- 业务类别  
                   INSERT_SYSDATE --  系统插入日期  
                   )
                  SELECT B.ORGAN_CODE,
                         T.POLICY_CODE,
                         X.BIZ_CODE,
                         B.USER_NAME,
                         TRUNC(X.UW_FINISH_TIME),
                         X.UW_FINISH_TIME,
                         '保全',
                         TRUNC(SYSDATE)
                    FROM DEV_UW.T_UW_POLICY@BINGXING_168_15_UW T
                    LEFT JOIN DEV_UW.T_UW_MASTER@BINGXING_168_15_UW X
                      ON X.UW_ID = T.UW_ID
                    LEFT JOIN DEV_UW.T_UDMP_USER@BINGXING_168_15_UW B
                      ON X.UW_USER_ID = B.USER_ID
                   WHERE 1 = 1
                     AND T.UW_SOURCE_TYPE = '2' -- 保全人核的
                     AND T.ORGAN_CODE LIKE '8647%' -- 青岛分公司的
                     AND X.UW_STATUS_DETAIL = '0401' -- 人工核保完成的
                     AND B.User_Name IS NOT NULL
                     AND TRUNC(X.UW_FINISH_TIME) >= TO_DATE('".$this->getStartDateString()."', 'YYYY/MM/DD')
                     AND TRUNC(X.UW_FINISH_TIME) <= TRUNC(SYSDATE)";
        $statement = oci_parse($conn,$newDay);
        echo "保全核保新核心当日临时表插入 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "INSERT INTO UW_SUB_NCL_TMP
                  (ORGAN_CODE, -- 机构  
                   POLICY_CODE, -- 保单号 
                   BIZ_CODE, -- 业务号(投保单号/受理号/赔案号) 
                   USER_NAME, -- 操作员 
                   UW_FINISH_DATE, -- 操作日期  
                   UW_FINISH_TIME, -- 操作时间  
                   SOURCE_TAB, -- 业务类别  
                   INSERT_SYSDATE --  系统插入日期  
                   )
                  SELECT B.ORGAN_CODE,
                         B.POLICY_CODE,
                         B.CASE_NO,
                         B.USER_NAME,
                         TRUNC(B.FINISH_DATE),
                         B.FINISH_DATE,
                         '理赔',
                         TRUNC(SYSDATE)
                    FROM (SELECT A.*, ROWNUM RN
                            FROM (SELECT DISTINCT (SELECT LISTAGG(M.POLICY_CODE, ',') WITHIN GROUP(ORDER BY M.POLICY_CODE)
                                                     FROM APP___CLM__DBUSER.T_UW_POLICY@BINGXING_168_15_CLM M
                                                    WHERE M.UW_ID = L.UW_ID) POLICY_CODE,
                                                  A.CASE_NO,
                                                  E.USER_NAME,
                                                  E.ORGAN_CODE,
                                                  G.ORGAN_NAME,
                                                  TO_CHAR(H.APPLY_DATE, 'YYYY-MM-DD') AS START_DATE,
                                                  TO_CHAR(H.INSERT_TIMESTAMP, 'HH24:MI:SS') AS START_DATE_TIME,
                                                  CASE
                                                    WHEN H.UW_STATUS = 1 THEN
                                                     H.UW_CONCLUSION_TIME
                                                  END FINISH_DATE
                                    FROM APP___CLM__DBUSER.T_CLAIM_CASE@BINGXING_168_15_CLM      A,
                                         APP___CLM__DBUSER.T_CONTRACT_MASTER@BINGXING_168_15_CLM B,
                                         APP___CLM__DBUSER.T_UW_POLICY@BINGXING_168_15_CLM       M,
                                         APP___CLM__DBUSER.T_UDMP_USER@BINGXING_168_15_CLM       E,
                                         APP___CLM__DBUSER.T_UDMP_ORG@BINGXING_168_15_CLM        G,
                                         APP___CLM__DBUSER.T_CLAIM_UW@BINGXING_168_15_CLM        H,
                                         APP___CLM__DBUSER.T_UW_MASTER@BINGXING_168_15_CLM       L
                                   WHERE A.CASE_ID = B.CASE_ID(+)
                                     AND L.UW_USER_ID = E.USER_ID(+)
                                     AND E.ORGAN_CODE = G.ORGAN_CODE(+)
                                     AND A.CASE_ID = H.CASE_ID
                                     AND H.CASE_NO = L.BIZ_CODE(+)
                                     AND M.UW_ID = L.UW_ID
                                     AND L.UW_STATUS = 04
                                     AND E.ORGAN_CODE LIKE '8647%'
                                   ORDER BY CASE_NO) A) B
                   WHERE 1 = 1
                     AND TRUNC(B.FINISH_DATE) >= TO_DATE('".$this->getStartDateString()."', 'YYYY/MM/DD')
                     AND TRUNC(B.FINISH_DATE) <= TRUNC(SYSDATE)";
        $statement = oci_parse($conn,$newDay);
        echo "理赔核保新核心当日临时表插入 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";

        $newDay = "INSERT INTO UW_SUB_NCL
                  (ORGAN_CODE, -- 机构  
                   POLICY_CODE, -- 保单号 
                   BIZ_CODE, -- 业务号(投保单号/受理号/赔案号) 
                   USER_NAME, -- 操作员 
                   UW_FINISH_DATE, -- 操作日期  
                   UW_FINISH_TIME, -- 操作时间  
                   SOURCE_TAB, -- 业务类别  
                   INSERT_SYSDATE --  系统插入日期  
                   )
                  SELECT T.ORGAN_CODE,
                         T.POLICY_CODE,
                         T.BIZ_CODE,
                         T.USER_NAME,
                         T.UW_FINISH_DATE,
                         T.UW_FINISH_TIME,
                         T.SOURCE_TAB,
                         T.INSERT_SYSDATE
                    FROM UW_SUB_NCL_TMP T
                   WHERE T.SOURCE_TAB NOT LIKE '%保全%'
                     AND NOT EXISTS
                   (SELECT 1 FROM UW_SUB_NCL M WHERE T.BIZ_CODE = M.BIZ_CODE)";
        $statement = oci_parse($conn,$newDay);
        echo "UW_SUB_NCL 临时表插入 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "INSERT INTO UW_SUB_NCL
                  (ORGAN_CODE, -- 机构  
                   POLICY_CODE, -- 保单号 
                   BIZ_CODE, -- 业务号(投保单号/受理号/赔案号) 
                   USER_NAME, -- 操作员 
                   UW_FINISH_DATE, -- 操作日期  
                   UW_FINISH_TIME, -- 操作时间  
                   SOURCE_TAB, -- 业务类别  
                   INSERT_SYSDATE --  系统插入日期  
                   )
                  SELECT T.ORGAN_CODE,
                         T.POLICY_CODE,
                         T.BIZ_CODE,
                         T.USER_NAME,
                         T.UW_FINISH_DATE,
                         T.UW_FINISH_TIME,
                         T.SOURCE_TAB,
                         T.INSERT_SYSDATE
                    FROM UW_SUB_NCL_TMP T
                   WHERE T.SOURCE_TAB LIKE '%保全%'
                     AND NOT EXISTS (SELECT 1
                            FROM UW_SUB_NCL M
                           WHERE T.BIZ_CODE = M.BIZ_CODE
                             AND T.POLICY_CODE = M.POLICY_CODE)";
        $statement = oci_parse($conn,$newDay);
        echo "UW_SUB_NCL 临时表插入 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";

        $newDay = "DELETE FROM TMP_UWSUB_NEW";
        $statement = oci_parse($conn,$newDay);
        echo "清空老核心当日临时表 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "INSERT INTO TMP_UWSUB_NEW
                  SELECT DISTINCT A.MANAGECOM,
                                  A.OPERATOR, --操作员
                                  B.PRTNO, --投保单号
                                  B.CONTNO, --合同号
                                  A.OPERATOR, --核保员
                                  '新契约' SOURCE_TAB,
                                  A.MAKEDATE,
                                  TO_DATE(TO_CHAR(A.MAKEDATE, 'YYYYMMDD') || ' ' ||
                                          A.MAKETIME,
                                          'YYYYMMDD HH24:MI:SS') AS MAKETIME,
                                  A.UWNO,
                                  A.PASSFLAG
                    FROM LIS.LCCUWSUB A
                   INNER JOIN LIS.LCCONT B
                      ON A.CONTNO = B.CONTNO
                   WHERE A.UWNO > 1
                     AND B.MANAGECOM LIKE '8647%'
                     AND B.CONTTYPE = '1'
                     AND B.UWDATE IS NOT NULL
                     AND A.PASSFLAG IN ('1', '2', '3', '4', '9', 'A')
                     AND A.MAKEDATE >= TO_DATE('".$this->getStartDateString()."', 'YYYY/MM/DD')
                     AND A.MAKEDATE <= TRUNC(SYSDATE)";
        $statement = oci_parse($conn,$newDay);
        echo "个人核保最近结果表(新契约) 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "INSERT INTO TMP_UWSUB_NEW
                      SELECT DISTINCT A.MANAGECOM,
                                      A.OPERATOR,
                                      B.PRTNO, --投保单号
                                      B.CONTNO, --保单号
                                      A.OPERATOR,
                                      '新契约险种' SOURCE_TAB,
                                      A.MAKEDATE,
                                      TO_DATE(TO_CHAR(A.MAKEDATE, 'YYYYMMDD') || ' ' ||
                                              A.MAKETIME,
                                              'YYYYMMDD HH24:MI:SS') AS MAKETIME,
                                      A.UWNO,
                                      A.PASSFLAG
                        FROM LIS.LCUWSUB A
                       INNER JOIN LIS.LCCONT B
                          ON A.CONTNO = B.CONTNO
                       WHERE A.UWNO > 1
                         AND B.MANAGECOM LIKE '8647%'
                         AND B.CONTTYPE = '1'
                         AND B.UWDATE IS NOT NULL
                         AND A.PASSFLAG IN ('1', '2', '3', '4', '9', 'A')
                         AND A.MAKEDATE >= TO_DATE('".$this->getStartDateString()."', 'YYYY/MM/DD')
                         AND A.MAKEDATE <= TRUNC(SYSDATE)
                         AND NOT EXISTS (SELECT 1
                                FROM LIS.LCCUWSUB C
                               WHERE A.CONTNO = C.CONTNO
                                 AND C.UWNO = '2')";
        $statement = oci_parse($conn,$newDay);
        echo "将险种层LCUWSUB中有的保单号，在保单层LCCUWSUB中不存在的保单号，补充 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "INSERT INTO TMP_UWSUB_NEW
                      SELECT DISTINCT A.MANAGECOM,
                                      A.OPERATOR,
                                      A.CASENO, --赔案号
                                      B.CONTNO, --合同号
                                      A.OPERATOR,
                                      '理赔' SOURCE_TAB,
                                      A.MAKEDATE,
                                      TO_DATE(TO_CHAR(A.MAKEDATE, 'YYYYMMDD') || ' ' ||
                                              A.MAKETIME,
                                              'YYYYMMDD HH24:MI:SS') AS MAKETIME,
                                      A.UWNO,
                                      A.PASSFLAG
                        FROM LIS.LLCUWSUB A
                       INNER JOIN LIS.LCCONT B
                          ON A.CONTNO = B.CONTNO
                       WHERE A.UWNO > 1
                         AND B.MANAGECOM LIKE '8647%'
                         AND B.CONTTYPE = '1'
                         AND B.UWDATE IS NOT NULL
                         AND A.PASSFLAG IN ('1', '2', '3', '4', '9', 'A')
                         AND A.MAKEDATE >= TO_DATE('".$this->getStartDateString()."', 'YYYY/MM/DD')
                         AND A.MAKEDATE <= TRUNC(SYSDATE)";
        $statement = oci_parse($conn,$newDay);
        echo "个人合同理陪核保最近结果表(理赔) 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "INSERT INTO TMP_UWSUB_NEW
                  SELECT DISTINCT A.MANAGECOM,
                                  A.OPERATOR,
                                  A.CASENO, --赔案号
                                  B.CONTNO, --合同号
                                  A.OPERATOR,
                                  '理赔' SOURCE_TAB,
                                  A.MAKEDATE,
                                  TO_DATE(TO_CHAR(A.MAKEDATE, 'YYYYMMDD') || ' ' ||
                                          A.MAKETIME,
                                          'YYYYMMDD HH24:MI:SS') AS MAKETIME,
                                  A.UWNO,
                                  A.PASSFLAG
                    FROM (SELECT T.*
                            FROM LIS.LLCUWSUB T,
                                 (SELECT B.CASENO, B.BATNO, B.CONTNO, MAX(B.UWNO) AS UWNO
                                    FROM LIS.LLCUWSUB B
                                   GROUP BY B.CASENO, B.BATNO, B.CONTNO) C
                           WHERE T.CASENO = C.CASENO
                             AND T.BATNO = C.BATNO
                             AND T.CONTNO = C.CONTNO
                             AND T.UWNO = C.UWNO
                             AND EXISTS (SELECT 1
                                    FROM LIS.LLUWSUB A
                                   WHERE T.CASENO = A.CASENO
                                     AND T.BATNO = A.BATNO
                                     AND T.CONTNO = A.CONTNO
                                     AND A.UWNO > 1)
                             AND C.UWNO = '1') A
                   INNER JOIN LIS.LCCONT B
                      ON A.CONTNO = B.CONTNO
                   WHERE A.UWNO > 1
                     AND B.MANAGECOM LIKE '8647%'
                     AND B.CONTTYPE = '1'
                     AND B.UWDATE IS NOT NULL
                     AND A.PASSFLAG IN ('1', '2', '3', '4', '9', 'A')
                     AND A.MAKEDATE >= TO_DATE('".$this->getStartDateString()."', 'YYYY/MM/DD')
                     AND A.MAKEDATE <= TRUNC(SYSDATE)";
        $statement = oci_parse($conn,$newDay);
        echo "险种层UWNO='2'的数据而保单层只有UWNO='1'的数据 也属于人核数据需要迁移进来 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "INSERT INTO TMP_UWSUB_NEW
                      SELECT DISTINCT A.MANAGECOM,
                                      A.OPERATOR,
                                      A.CASENO, --赔案号
                                      B.CONTNO, --合同号
                                      A.OPERATOR,
                                      '理赔批次' SOURCE_TAB,
                                      A.MAKEDATE,
                                      TO_DATE(TO_CHAR(A.MAKEDATE, 'YYYYMMDD') || ' ' ||
                                              A.MAKETIME,
                                              'YYYYMMDD HH24:MI:SS') AS MAKETIME,
                                      A.UWNO,
                                      A.PASSFLAG
                        FROM LIS.LLCUWBATCH A
                       INNER JOIN LIS.LCCONT B
                          ON A.CONTNO = B.CONTNO
                       WHERE A.UWNO > 1
                         AND B.MANAGECOM LIKE '8647%'
                         AND B.CONTTYPE = '1'
                         AND B.UWDATE IS NOT NULL
                         AND A.PASSFLAG IN ('1', '2', '3', '4', '9', 'A')
                         AND A.MAKEDATE >= TO_DATE('".$this->getStartDateString()."', 'YYYY/MM/DD')
                         AND A.MAKEDATE <= TRUNC(SYSDATE)
                         AND NOT EXISTS (SELECT 1
                                FROM LIS.LLCUWSUB D
                               WHERE A.CASENO = D.CASENO
                                 AND A.BATNO = D.BATNO
                                 AND A.CONTNO = D.CONTNO
                                 AND A.UWNO = D.UWNO)";
        $statement = oci_parse($conn,$newDay);
        echo "将LLCUWBATCH的数据补全 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "INSERT INTO TMP_UWSUB_NEW
                  SELECT DISTINCT A.MANAGECOM,
                                  A.OPERATOR,
                                  A.CASENO, --赔案号
                                  B.CONTNO, --合同号
                                  A.OPERATOR,
                                  '理赔险种' SOURCE_TAB,
                                  A.MAKEDATE,
                                  TO_DATE(TO_CHAR(A.MAKEDATE, 'YYYYMMDD') || ' ' ||
                                          A.MAKETIME,
                                          'YYYYMMDD HH24:MI:SS') AS MAKETIME,
                                  A.UWNO,
                                  A.PASSFLAG
                    FROM LIS.LLUWSUB A
                   INNER JOIN LIS.LCCONT B
                      ON A.CONTNO = B.CONTNO
                   WHERE A.UWNO > 1
                     AND B.MANAGECOM LIKE '8647%'
                     AND B.CONTTYPE = '1'
                     AND B.UWDATE IS NOT NULL
                     AND A.PASSFLAG IN ('1', '2', '3', '4', '9', 'A')
                     AND A.MAKEDATE >= TO_DATE('".$this->getStartDateString()."', 'YYYY/MM/DD')
                     AND A.MAKEDATE <= TRUNC(SYSDATE)
                     AND NOT EXISTS (SELECT 1
                            FROM LIS.LLCUWSUB C
                           WHERE A.CASENO = C.CASENO
                             AND A.BATNO = C.BATNO
                             AND A.CONTNO = C.CONTNO)";
        $statement = oci_parse($conn,$newDay);
        echo "将险种层LLUWSUB中有的保单号，在保单层LLCUWSUB中不存在的保单号，补充进来 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "INSERT INTO TMP_UWSUB_NEW
                  SELECT DISTINCT A.MANAGECOM,
                                  A.OPERATOR,
                                  C.EDORACCEPTNO, --保全受理号
                                  B.CONTNO, --合同号
                                  A.OPERATOR,
                                  '保全' SOURCE_TAB,
                                  A.MAKEDATE,
                                  TO_DATE(TO_CHAR(A.MAKEDATE, 'YYYYMMDD') || ' ' ||
                                          A.MAKETIME,
                                          'YYYYMMDD HH24:MI:SS') AS MAKETIME,
                                  A.UWNO,
                                  A.PASSFLAG
                    FROM LIS.LPCUWSUB A
                   INNER JOIN LIS.LCCONT B
                      ON A.CONTNO = B.CONTNO
                   INNER JOIN LIS.LPEDORITEM C
                      ON A.EDORNO = C.EDORNO
                     AND A.EDORTYPE = C.EDORTYPE
                     AND A.CONTNO = C.CONTNO
                   WHERE A.UWNO > 1
                     AND B.MANAGECOM LIKE '8647%'
                     AND B.CONTTYPE = '1'
                     AND B.UWDATE IS NOT NULL
                     AND A.PASSFLAG IN ('1', '2', '3', '4', '9', 'A')
                     AND A.MAKEDATE >= TO_DATE('".$this->getStartDateString()."', 'YYYY/MM/DD')
                     AND A.MAKEDATE <= TRUNC(SYSDATE)";
        $statement = oci_parse($conn,$newDay);
        echo "个人核保最近结果表(保全)  LPCUWSUB 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "INSERT INTO TMP_UWSUB_NEW
                  SELECT DISTINCT A.MANAGECOM,
                                  A.OPERATOR,
                                  C.EDORACCEPTNO, --保全受理号
                                  B.CONTNO, --合同号
                                  A.OPERATOR,
                                  '保全' SOURCE_TAB,
                                  A.MAKEDATE,
                                  TO_DATE(TO_CHAR(A.MAKEDATE, 'YYYYMMDD') || ' ' ||
                                          A.MAKETIME,
                                          'YYYYMMDD HH24:MI:SS') AS MAKETIME,
                                  A.UWNO,
                                  A.PASSFLAG
                    FROM (SELECT T.*
                            FROM LIS.LPCUWSUB T,
                                 (SELECT B.EDORNO, B.EDORTYPE, B.CONTNO, MAX(B.UWNO) AS UWNO
                                    FROM LIS.LPCUWSUB B
                                   GROUP BY B.EDORNO, B.EDORTYPE, B.CONTNO) C
                           WHERE T.EDORNO = C.EDORNO
                             AND T.EDORTYPE = C.EDORTYPE
                             AND T.CONTNO = C.CONTNO
                             AND T.UWNO = C.UWNO
                             AND EXISTS (SELECT 1
                                    FROM LIS.LPUWSUB A
                                   WHERE T.EDORNO = A.EDORNO
                                     AND T.EDORTYPE = A.EDORTYPE
                                     AND T.CONTNO = A.CONTNO
                                     AND A.UWNO > 1)
                             AND C.UWNO = '1') A
                   INNER JOIN LIS.LCCONT B
                      ON A.CONTNO = B.CONTNO
                   INNER JOIN LIS.LPEDORITEM C
                      ON A.EDORNO = C.EDORNO
                     AND A.EDORTYPE = C.EDORTYPE
                     AND A.CONTNO = C.CONTNO
                   WHERE A.UWNO > 1
                     AND B.MANAGECOM LIKE '8647%'
                     AND B.CONTTYPE = '1'
                     AND B.UWDATE IS NOT NULL
                     AND A.PASSFLAG IN ('1', '2', '3', '4', '9', 'A')
                     AND A.MAKEDATE >= TO_DATE('".$this->getStartDateString()."', 'YYYY/MM/DD')
                     AND A.MAKEDATE <= TRUNC(SYSDATE)";
        $statement = oci_parse($conn,$newDay);
        echo "险种层UWNO='2'的数据而保单层只有UWNO='1'的数据 也属于人核数据需要迁移进来 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "INSERT INTO TMP_UWSUB_NEW
                  SELECT DISTINCT A.MANAGECOM,
                                  A.OPERATOR,
                                  C.EDORACCEPTNO,
                                  B.CONTNO,
                                  A.OPERATOR,
                                  '保全险种' AS SOURCE_TAB,
                                  A.MAKEDATE,
                                  TO_DATE(TO_CHAR(A.MAKEDATE, 'YYYYMMDD')||' '||A.MAKETIME,'YYYYMMDD HH24:MI:SS') AS MAKETIME,
                                  A.UWNO,
                                  A.PASSFLAG
                    FROM LIS.LPUWSUB A
                   INNER JOIN LIS.LCCONT B
                      ON A.CONTNO = B.CONTNO
                   INNER JOIN LIS.LPEDORITEM C
                      ON A.EDORNO = C.EDORNO
                     AND A.EDORTYPE = C.EDORTYPE
                     AND A.CONTNO = C.CONTNO
                   WHERE A.UWNO > 1
                     AND B.MANAGECOM LIKE '8647%'
                     AND B.CONTTYPE = '1'
                     AND B.UWDATE IS NOT NULL
                     AND A.PASSFLAG IN ('1', '2', '3', '4', '9', 'A')
                     AND A.MAKEDATE >= TO_DATE('".$this->getStartDateString()."', 'YYYY/MM/DD')
                     AND A.MAKEDATE <= TRUNC(SYSDATE)
                     AND NOT EXISTS (SELECT 1
                            FROM LIS.LPCUWSUB C
                           WHERE A.EDORNO = C.EDORNO
                             AND A.EDORTYPE = C.EDORTYPE
                             AND A.CONTNO = C.CONTNO)";
        $statement = oci_parse($conn,$newDay);
        echo "将险种层LLUWSUB中有的保单号，在保单层LLCUWSUB中不存在的保单号，补充进来 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "DELETE FROM TMP_UWSUB_1_NEW";
        $statement = oci_parse($conn,$newDay);
        echo "TMP_UWSUB_1_NEW清空 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "INSERT INTO TMP_UWSUB_1_NEW
                      SELECT TRIM(MANAGECOM) AS MANAGECOM, -- \"机构号\",
                             TRIM(OPERATOR) AS OPERATOR, -- \"操作员\",
                             TRIM(PRTNO) AS BIZ_CODE, -- \"业务号：投保单号/保全受理号/赔案号\",
                             TRIM(CONTNO) AS CONTNO, -- \"保单号\",
                             TRIM(UWOPERATOR) AS UWOPERATOR, --\"核保人员\",
                             SOURCE_TAB, --\"来源\",
                             MAKEDATE, --\"入机日期\",
                             MAKETIME, --\"入机时间\",
                             UWNO, --\"核保顺序号\",
                             PASSFLAG, -- \"核保结论\",
                             (CASE PASSFLAG
                               WHEN '1' THEN
                                '拒保'
                               WHEN '2' THEN
                                '延期'
                               WHEN '3' THEN
                                '条件承保'
                               WHEN '4' THEN
                                '通融'
                               WHEN '9' THEN
                                '正常'
                               WHEN 'A' THEN
                                '撤单'
                             END) AS PASSFLAG1 --\"核保结论解释\"
                        FROM (SELECT A.*,
                                     (ROW_NUMBER()
                                      OVER(PARTITION BY CONTNO,
                                           PRTNO,
                                           SOURCE_TAB ORDER BY UWNO DESC)) AS ORDER_ID
                                FROM TMP_UWSUB_NEW A)
                       WHERE ORDER_ID = 1
                         AND TRIM(OPERATOR) NOT IN ('MOBILE', '001', 'DEFAULTUSR')
                       ORDER BY 7, 6 DESC";
        $statement = oci_parse($conn,$newDay);
        echo "TMP_UWSUB_1_NEW插入 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "DELETE FROM UW_SUB_LIS_TMP";
        $statement = oci_parse($conn,$newDay);
        echo "UW_SUB_LIS_TMP清空 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "INSERT INTO UW_SUB_LIS_TMP
                  (MANAGECOM,
                   CONTNO,
                   BIZCODE,
                   OPERATOR,
                   PASSFLAG,
                   PASSFLAG1,
                   MAKEDATE,
                   MAKETIME,
                   SOURCE_TAB,
                   INSERT_SYSDATE)
                  SELECT TRIM(B.COMCODE),
                         A.CONTNO,
                         A.BIZ_CODE,
                         A.OPERATOR,
                         A.PASSFLAG,
                         A.PASSFLAG1,
                         A.MAKEDATE,
                         A.MAKETIME,
                         CASE
                           WHEN A.SOURCE_TAB LIKE '%契约%' THEN
                            '契约'
                           WHEN A.SOURCE_TAB LIKE '%理赔%' THEN
                            '理赔二核'
                           ELSE
                            A.SOURCE_TAB
                         END,
                         TRUNC(SYSDATE)
                    FROM TMP_UWSUB_1_NEW A
                    LEFT JOIN LIS.LDUSER B
                      ON A.OPERATOR = TRIM(B.USERCODE)
                   WHERE A.PASSFLAG <> 'A'
                     AND TRIM(B.COMCODE) IN ('86', '8647')
                     AND A.SOURCE_TAB NOT LIKE '%保全%'";
        $statement = oci_parse($conn,$newDay);
        echo "UW_SUB_LIS_TMP插入 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "INSERT INTO UW_SUB_LIS_TMP
                      (MANAGECOM,
                       CONTNO,
                       BIZCODE,
                       OPERATOR,
                       PASSFLAG,
                       PASSFLAG1,
                       MAKEDATE,
                       MAKETIME,
                       SOURCE_TAB,
                       INSERT_SYSDATE)
                      SELECT TRIM(B.COMCODE),
                             A.CONTNO,
                             A.BIZ_CODE,
                             A.OPERATOR,
                             A.PASSFLAG,
                             A.PASSFLAG1,
                             A.MAKEDATE,
                             A.MAKETIME,
                             CASE
                               WHEN A.SOURCE_TAB LIKE '%契约%' THEN
                                '契约'
                               WHEN A.SOURCE_TAB LIKE '%保全%' THEN
                                '保全'
                               WHEN A.SOURCE_TAB LIKE '%理赔%' THEN
                                '理赔二核'
                               ELSE
                                A.SOURCE_TAB
                             END,
                             TRUNC(SYSDATE)
                        FROM TMP_UWSUB_1_NEW A
                        LEFT JOIN LIS.LDUSER B
                          ON A.OPERATOR = TRIM(B.USERCODE)
                       WHERE A.PASSFLAG <> 'A'
                         AND TRIM(B.COMCODE) IN ('86', '8647')
                         AND A.SOURCE_TAB LIKE '%保全%'
                         AND EXISTS (SELECT 1
                                FROM LIS.LPEDORAPP C
                               WHERE A.BIZ_CODE = TRIM(C.EDORACCEPTNO)
                                 AND TRIM(A.OPERATOR) = TRIM(C.UWOPERATOR))";
        $statement = oci_parse($conn,$newDay);
        echo "插入保全 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "INSERT INTO UW_SUB_LIS
                      (MANAGECOM,
                       CONTNO,
                       BIZCODE,
                       OPERATOR,
                       PASSFLAG,
                       PASSFLAG1,
                       MAKEDATE,
                       MAKETIME,
                       SOURCE_TAB,
                       INSERT_SYSDATE)
                      SELECT T.MANAGECOM,
                             T.CONTNO,
                             T.BIZCODE,
                             T.OPERATOR,
                             T.PASSFLAG,
                             T.PASSFLAG1,
                             T.MAKEDATE,
                             T.MAKETIME,
                             T.SOURCE_TAB,
                             T.INSERT_SYSDATE
                        FROM UW_SUB_LIS_TMP T
                       WHERE NOT EXISTS
                       (SELECT 1 FROM UW_SUB_LIS M WHERE T.BIZCODE = M.BIZCODE)";
        $statement = oci_parse($conn,$newDay);
        echo "更新表 UW_SUB_LIS 的数据，插入新数据 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "DELETE FROM TMP_UW_LIST";
        $statement = oci_parse($conn,$newDay);
        echo "TMP_UW_LIST清空 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "INSERT INTO TMP_UW_LIST
                      (OLD_ORGAN_CODE,
                       NEW_ORGAN_CODE,
                       -- OLD_ORGAN_NAME,
                       OLD_USER_NAME,
                       NEW_USER_NAME,
                       OLD_POLICY_CODE,
                       NEW_POLICY_CODE,
                       OLD_APPLE_CODE,
                       NEW_APPLE_CODE,
                       OLD_INSERT_TIME,
                       NEW_INSERT_TIME,
                       SOURCE_TAB,
                       IS_ACCORDANCE,
                       -- TC_ID,
                       INSERT_SYSDATE)
                      SELECT A.MANAGECOM,
                             B.ORGAN_CODE,
                             --NULL,
                             A.OPERATOR,
                             B.USER_NAME,
                             A.CONTNO,
                             B.POLICY_CODE,
                             A.BIZCODE,
                             B.BIZ_CODE,
                             TRUNC(A.MAKETIME),
                             TRUNC(B.UW_FINISH_TIME),
                             A.SOURCE_TAB,
                             CASE
                               WHEN TRIM(A.BIZCODE) = TRIM(B.BIZ_CODE) THEN
                                '是'
                               ELSE
                                '否'
                             END,
                             --NULL,
                             TRUNC(SYSDATE)
                        FROM UW_SUB_LIS A
                        LEFT JOIN UW_SUB_NCL B
                          ON TRIM(A.BIZCODE) = TRIM(B.BIZ_CODE)
                       WHERE A.SOURCE_TAB NOT LIKE '%保全%'";
        $statement = oci_parse($conn,$newDay);
        echo "对比表插入新数据 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "INSERT INTO TMP_UW_LIST
                      (OLD_ORGAN_CODE,
                       NEW_ORGAN_CODE,
                       -- OLD_ORGAN_NAME,
                       OLD_USER_NAME,
                       NEW_USER_NAME,
                       OLD_POLICY_CODE,
                       NEW_POLICY_CODE,
                       OLD_APPLE_CODE,
                       NEW_APPLE_CODE,
                       OLD_INSERT_TIME,
                       NEW_INSERT_TIME,
                       SOURCE_TAB,
                       IS_ACCORDANCE,
                       -- TC_ID,
                       INSERT_SYSDATE)
                      SELECT A.MANAGECOM,
                             B.ORGAN_CODE,
                             A.OPERATOR,
                             B.USER_NAME,
                             A.CONTNO,
                             B.POLICY_CODE,
                             A.BIZCODE,
                             B.BIZ_CODE,
                             TRUNC(A.MAKETIME),
                             TRUNC(B.UW_FINISH_TIME),
                             A.SOURCE_TAB,
                             CASE
                               WHEN TRIM(A.BIZCODE) = TRIM(B.BIZ_CODE) AND
                                    TRIM(A.CONTNO) = TRIM(B.POLICY_CODE) THEN
                                '是'
                               ELSE
                                '否'
                             END,
                             --NULL,
                             TRUNC(SYSDATE)
                        FROM UW_SUB_LIS A
                        LEFT JOIN UW_SUB_NCL B
                          ON TRIM(A.BIZCODE) = TRIM(B.BIZ_CODE)
                         AND TRIM(A.CONTNO) = TRIM(B.POLICY_CODE)
                       WHERE A.SOURCE_TAB LIKE '%保全%'";
        $statement = oci_parse($conn,$newDay);
        echo "对比表插入新数据 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        oci_free_statement($statement);
        oci_close($conn);
        echo "核保数据更新结束 ：".date("h:i:sa")."<br> ";
    }

    //保全受理数据更新
    public function execLoadDataCS(){
        //解除30s限制
        set_time_limit(0);
        echo "保全数据更新开始 ：".date("h:i:sa")."<br> ";
//        $user_type = $this->getUserType();
//        if((int)$user_type!=1){
//            echo "请使用管理员账户登录后进行刷新数据！！！";
//            return;
//        }
        echo "保全受理数据更新开始 <br>";
        $conn = $this->OracleOldDBCon();
        $newDay = "DELETE FROM TMP_NCS_QD_BX_BQSL_TJ";
        $statement = oci_parse($conn,$newDay);
        echo "清空新核心当日临时表 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "INSERT INTO TMP_NCS_QD_BX_BQSL_TJ
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
                                ORDER BY TCAC.ORGAN_CODE";
        $statement = oci_parse($conn,$newDay);
        echo "新核心当日临时表插入 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "DELETE FROM TMP_LIS_QD_BX_BQSL_TJ";
        $statement = oci_parse($conn,$newDay);
        echo "清空老核心当日临时表 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "
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
                where 1=1 
                   AND t.apptype IN ('1','2','3','6','7')
                   AND TRUNC(m.MakeDate) = TRUNC(SYSDATE)
                   AND m.edoracceptno NOT LIKE '64%'
                   and exists (select 1
                          from lis.lccont t
                         where t.conttype = '1'
                           and t.appflag in ('1', '4')
                           and t.managecom like '8647%'
                           and t.contno = m.contno)
                   GROUP BY m.managecom,m.operator,m.MakeDate,m.contno,m.edoracceptno,m.EdorType,t.apptype
                 ORDER BY m.managecom";
        $statement = oci_parse($conn,$newDay);
        echo "老核心当日临时表插入 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";

        $newDay = "DELETE FROM TMP_NCS_QD_BX_BQSL_BD WHERE TRUNC(OLD_INSERT_TIME) = TRUNC(SYSDATE)";
        $statement = oci_parse($conn,$newDay);
        echo "清空新老核心差异当日数据 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "INSERT INTO TMP_NCS_QD_BX_BQSL_BD
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
                        NULL AS is_same_sff,
                        T2.USER_NAME AS NEW_USER_NAME
                  FROM TMP_LIS_QD_BX_BQSL_TJ T1
                  LEFT JOIN TMP_NCS_QD_BX_BQSL_TJ T2
                   ON TRIM(T2.POLICY_CODE) = TRIM(T1.POLICY_CODE)
                   AND TRIM(T2.ACCEPT_CODE) = TRIM(T1.ACCEPT_CODE)
                ORDER BY T2.ORGAN_CODE";
        $statement = oci_parse($conn,$newDay);
        echo "新老核心差异当日数据插入 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";

        ###############################################################################################################################################################################################################
        ###############################################################################################################################################################################################################
        ####################################################################                        此处需要维护老核心开始日期                      ###################################################################
        ###############################################################################################################################################################################################################
        ###############################################################################################################################################################################################################
        $newDay = "DELETE FROM TMP_NCS_QD_BX_BQSL_BD WHERE TRIM(OLD_POLICY_CODE) IN (SELECT TRIM(m.contno) FROM lis.lpedoritem m WHERE m.EdorType='PR' AND m.MakeDate >= TO_DATE('".$this->getStartDateString()."','YYYY/MM/DD'))";
        $statement = oci_parse($conn,$newDay);
        echo "保单迁移数据删除 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";

        ###############################################################################################################################################################################################################
        ###############################################################################################################################################################################################################
        ####################################################################                        此处需要维护老核心开始日期                      ###################################################################
        ###############################################################################################################################################################################################################
        ###############################################################################################################################################################################################################
        $newDay = "DELETE FROM TMP_NCS_QD_BX_BQSL_BD_UP";
        $statement = oci_parse($conn,$newDay);
        echo "清空新核心全量更新数据准备表 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "INSERT INTO TMP_NCS_QD_BX_BQSL_BD_UP
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
                            AND TRUNC(TCAC.INSERT_TIME) >= TO_DATE('".$this->getStartDateString()."','YYYY/MM/DD')
                            AND TRUNC(TCAC.INSERT_TIME) <= TRUNC(SYSDATE)
                            AND TCPC.ORGAN_CODE LIKE '8647%'
                            AND (TCPC.POLICY_CODE,TCAC.ACCEPT_CODE) IN (SELECT TRIM(OLD_POLICY_CODE),OLD_ACCEPT_CODE FROM TMP_NCS_QD_BX_BQSL_BD WHERE IS_ACCORDANCE = '否')";
        $statement = oci_parse($conn,$newDay);
        echo "新核心全量更新数据准备表插入 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";

        $newDay = "UPDATE TMP_NCS_QD_BX_BQSL_BD BD
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
                    WHERE EXISTS( SELECT 1 FROM TMP_NCS_QD_BX_BQSL_BD_UP UP WHERE BD.OLD_ACCEPT_CODE = UP.ACCEPT_CODE AND TRIM(BD.OLD_POLICY_CODE) = UP.POLICY_CODE)";
        $statement = oci_parse($conn,$newDay);
        echo "新核心全量数据更新 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";

        $newDay = "DELETE FROM TMP_NCS_QDBX_BQ_SFF";
        $statement = oci_parse($conn,$newDay);
        echo "清空新核心金额数据更新准备表 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "INSERT INTO TMP_NCS_QDBX_BQ_SFF
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
                            AND TCPA.BUSI_APPLY_DATE >= TO_DATE('".$this->getStartDateString()."','YYYY/MM/DD')
                            AND TCPA.BUSI_APPLY_DATE <= TRUNC(SYSDATE)        --业务申请时间
                            AND TCA.SERVICE_TYPE IN ('1','2','3','6','7')
                            AND TCPA.FEE_STATUS <> '16'
                            AND TCAC.SERVICE_CODE <> 'RE'
                       UNION ALL
                       SELECT B.USER_NAME,TCPC.POLICY_CODE,TCAC.ACCEPT_CODE AS BUSINESS_CODE,0.00 AS GETMONEY-- 按0处理
                            FROM DEV_PAS.T_CS_ACCEPT_CHANGE@BINGXING_168_15 TCAC
                            LEFT JOIN DEV_PAS.T_CS_POLICY_CHANGE@BINGXING_168_15 TCPC
                            ON TCPC.ACCEPT_ID = TCAC.ACCEPT_ID
                            LEFT JOIN DEV_PAS.T_CS_APPLICATION@BINGXING_168_15 TCA
                            ON TCA.CHANGE_ID = TCAC.CHANGE_ID
                            JOIN DEV_PAS.T_UDMP_USER@BINGXING_168_15 B
                            ON TCA.INSERT_BY = B.USER_ID
                                WHERE 1=1
                                AND TCPC.ORGAN_CODE LIKE '8647%'
                                AND TRUNC(TCAC.INSERT_TIME) >= TO_DATE('".$this->getStartDateString()."','YYYY/MM/DD')
                                AND TRUNC(TCAC.INSERT_TIME) = TRUNC(SYSDATE)
                                AND TCA.SERVICE_TYPE IN ('1','2','3','6','7')
                                AND TCAC.SERVICE_CODE <> 'RE'
                       ) B WHERE 1=1
                       --AND B.BUSINESS_CODE = '6120180822046835'
                    GROUP BY B.POLICY_CODE,B.BUSINESS_CODE
                    ORDER BY B.POLICY_CODE";
        $statement = oci_parse($conn,$newDay);
        echo "新核心金额数据更新数据插入不等于复效 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "UPDATE TMP_NCS_QD_BX_BQSL_BD BD
                    SET (NEW_GET_MONEY) = 
                    (SELECT GETMONEY FROM TMP_NCS_QDBX_BQ_SFF UP
                    WHERE BD.OLD_ACCEPT_CODE = UP.ACCEPT_CODE AND TRIM(BD.OLD_POLICY_CODE) = UP.POLICY_CODE)
                    WHERE EXISTS( SELECT 1 FROM TMP_NCS_QDBX_BQ_SFF UP WHERE BD.OLD_ACCEPT_CODE = UP.ACCEPT_CODE AND TRIM(BD.OLD_POLICY_CODE) = UP.POLICY_CODE)";
        $statement = oci_parse($conn,$newDay);
        echo "新核心金额数据更新不等于复效 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";

        $newDay = "DELETE FROM TMP_NCS_QDBX_BQ_SFF";
        $statement = oci_parse($conn,$newDay);
        echo "清空新核心金额数据更新准备表 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "INSERT INTO TMP_NCS_QDBX_BQ_SFF
                --CREATE TABLE TMP_NCS_QDBX_BQ_SFF AS
                SELECT B.POLICY_CODE,B.BUSINESS_CODE AS ACCEPT_CODE,SUM(GETMONEY) AS GETMONEY FROM 
                (SELECT B.USER_NAME,TCPA.POLICY_CODE,TCPA.BUSINESS_CODE,CASE 
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
                        AND TCPA.BUSI_APPLY_DATE >= TO_DATE('".$this->getStartDateString()."','YYYY/MM/DD')
                        AND TCPA.BUSI_APPLY_DATE <= TRUNC(SYSDATE)         --业务申请时间
                        AND TCA.SERVICE_TYPE IN ('1','2','3','6','7')
                        AND TCPA.FEE_STATUS <> '16'
                        AND TCAC.SERVICE_CODE = 'RE'
                   UNION ALL
                   SELECT B.USER_NAME,TCPC.POLICY_CODE,TCAC.ACCEPT_CODE AS BUSINESS_CODE,0.00 AS GETMONEY-- 按0处理
                        FROM DEV_PAS.T_CS_ACCEPT_CHANGE@BINGXING_168_15 TCAC
                        LEFT JOIN DEV_PAS.T_CS_POLICY_CHANGE@BINGXING_168_15 TCPC
                        ON TCPC.ACCEPT_ID = TCAC.ACCEPT_ID
                        LEFT JOIN DEV_PAS.T_CS_APPLICATION@BINGXING_168_15 TCA
                        ON TCA.CHANGE_ID = TCAC.CHANGE_ID
                        JOIN DEV_PAS.T_UDMP_USER@BINGXING_168_15 B
                        ON TCA.INSERT_BY = B.USER_ID
                            WHERE 1=1
                            AND TCPC.ORGAN_CODE LIKE '8647%'
                            AND TRUNC(TCAC.INSERT_TIME) >= TO_DATE('".$this->getStartDateString()."','YYYY/MM/DD')
                            AND TRUNC(TCAC.INSERT_TIME) = TRUNC(SYSDATE)
                            AND TCA.SERVICE_TYPE IN ('1','2','3','6','7')
                            AND TCAC.SERVICE_CODE = 'RE'
                   ) B WHERE 1=1
                   --AND B.BUSINESS_CODE = '6120180822046835'
                GROUP BY B.POLICY_CODE,B.BUSINESS_CODE
                ORDER BY B.POLICY_CODE";
        $statement = oci_parse($conn,$newDay);
        echo "新核心金额数据更新数据插入等于复效 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "UPDATE TMP_NCS_QD_BX_BQSL_BD BD
                    SET (NEW_GET_MONEY) = (SELECT GETMONEY FROM TMP_NCS_QDBX_BQ_SFF UP
                    WHERE BD.OLD_ACCEPT_CODE = UP.ACCEPT_CODE AND TRIM(BD.OLD_POLICY_CODE) = UP.POLICY_CODE)
                    WHERE EXISTS( SELECT 1 FROM TMP_NCS_QDBX_BQ_SFF UP WHERE BD.OLD_ACCEPT_CODE = UP.ACCEPT_CODE AND TRIM(BD.OLD_POLICY_CODE) = UP.POLICY_CODE)";
        $statement = oci_parse($conn,$newDay);
        echo "新核心金额数据更新等于复效 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";

        $newDay = "DELETE FROM TMP_NCS_QD_BX_BQSL_BD_SFF";
        $statement = oci_parse($conn,$newDay);
        echo "清空新核心金额双倍数据更新准备表 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";

        $newDay = "INSERT INTO TMP_NCS_QD_BX_BQSL_BD_SFF
                    --CREATE TABLE TMP_NCS_QD_BX_BQSL_BD_SFF  AS
                    SELECT OLD_POLICY_CODE,OLD_ACCEPT_CODE,OLD_GET_MONEY FROM TMP_NCS_QD_BX_BQSL_BD WHERE OLD_GET_MONEY = (NEW_GET_MONEY - OLD_GET_MONEY) AND OLD_GET_MONEY!=0.00";
        $statement = oci_parse($conn,$newDay);
        echo "新核心金额双倍数据更新准备表数据插入 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";

        $newDay = "UPDATE TMP_NCS_QD_BX_BQSL_BD BD
                SET (NEW_GET_MONEY) = 
                (SELECT OLD_GET_MONEY FROM TMP_NCS_QD_BX_BQSL_BD_SFF UP
                WHERE UP.OLD_POLICY_CODE = BD.OLD_POLICY_CODE AND UP.OLD_ACCEPT_CODE = BD.OLD_ACCEPT_CODE)
                WHERE EXISTS (SELECT 1 FROM TMP_NCS_QD_BX_BQSL_BD_SFF UP WHERE UP.OLD_POLICY_CODE = BD.OLD_POLICY_CODE AND UP.OLD_ACCEPT_CODE = BD.OLD_ACCEPT_CODE)";
        $statement = oci_parse($conn,$newDay);
        echo "新核心金额双倍数据更新  执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";

        $newDay = "UPDATE TMP_NCS_QD_BX_BQSL_BD BD
                SET IS_SAME_SFF = (CASE 
                WHEN OLD_GET_MONEY = NEW_GET_MONEY OR (OLD_GET_MONEY-NEW_GET_MONEY=-0.01 OR OLD_GET_MONEY-NEW_GET_MONEY=0.01) THEN '是'
                ELSE '否'
                END)";
        $statement = oci_parse($conn,$newDay);
        echo "金额是否一致数据更新  执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";

        oci_free_statement($statement);
        oci_close($conn);
        echo "保全数据更新结束 ：".date("h:i:sa")."<br> ";
    }

    //保全复核数据更新
    public function execLoadDataCSFH(){
        //解除30s限制
        set_time_limit(0);
        echo "保全数据更新开始 ：".date("h:i:sa")."<br> ";
//        $user_type = $this->getUserType();
//        if((int)$user_type!=1){
//            echo "请使用管理员账户登录后进行刷新数据！！！";
//            return;
//        }
        $conn = $this->OracleOldDBCon();
        echo "保全复核数据更新开始 <br>";
        $newDay = "DELETE FROM TMP_NCS_QD_BX_BQFH_TJ";
        $statement = oci_parse($conn,$newDay);
        echo "清空新核心当日临时表 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "INSERT INTO TMP_NCS_QD_BX_BQFH_TJ
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
                            AND B.USER_NAME NOT IN ('SYSADMIN')";
        $statement = oci_parse($conn,$newDay);
        echo "新核心当日临时表插入 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "DELETE FROM TMP_LIS_QD_BX_BQFH_TJ";
        $statement = oci_parse($conn,$newDay);
        echo "清空老核心当日临时表 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "INSERT INTO TMP_LIS_QD_BX_BQFH_TJ
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
                           and t.contno = m.contno)";
        $statement = oci_parse($conn,$newDay);
        echo "老核心当日临时表插入 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";

        $newDay = "DELETE FROM TMP_NCS_QD_BX_BQFH_BD WHERE TRUNC(OLD_INSERT_TIME) = TRUNC(SYSDATE)";
        $statement = oci_parse($conn,$newDay);
        echo "清空新老核心差异当日数据 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "INSERT INTO TMP_NCS_QD_BX_BQFH_BD
                    --CREATE TABLE TMP_NCS_QD_BX_BQFH_BD  AS         
                    select T1.ORGAN_CODE OLD_ORGAN_CODE,
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
                    ORDER BY T2.ORGAN_CODE";
        $statement = oci_parse($conn,$newDay);
        echo "新老核心差异当日数据插入 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";

        $newDay = "DELETE FROM TMP_NCS_QD_BX_BQFH_BD_UP";
        $statement = oci_parse($conn,$newDay);
        echo "清空既往数据更新临时表 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";

        ###############################################################################################################################################################################################################
        ###############################################################################################################################################################################################################
        ####################################################################                        此处需要维护老核心开始日期                      ###################################################################
        ###############################################################################################################################################################################################################
        ###############################################################################################################################################################################################################
        $newDay = "INSERT INTO TMP_NCS_QD_BX_BQFH_BD_UP
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
                            AND TRUNC(TCAC.REVIEW_TIME) >= TO_DATE('".$this->getStartDateString()."','YYYY/MM/DD')
                            AND TRUNC(TCAC.REVIEW_TIME) <= TRUNC(SYSDATE)
                            AND TCPC.ORGAN_CODE LIKE '8647%'
                            AND B.USER_NAME NOT IN ('SYSADMIN')
                            AND B.USER_NAME IS NOT NULL
                            AND (TCPC.POLICY_CODE,TCAC.ACCEPT_CODE) IN 
                            (SELECT TRIM(OLD_POLICY_CODE),OLD_ACCEPT_CODE FROM TMP_NCS_QD_BX_BQFH_BD WHERE IS_ACCORDANCE = '否' AND NEW_ACCEPT_STATUS<>'生效')";
        $statement = oci_parse($conn,$newDay);
        echo "新核心既往数据临时表插入 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        $newDay = "UPDATE TMP_NCS_QD_BX_BQFH_BD BD
                SET (NEW_ORGAN_CODE,NEW_USER_NAME,NEW_ACCEPT_CODE,NEW_SERVICE_CODE,NEW_INSERT_TIME,NEW_POLICY_CODE,NEW_ACCEPT_STATUS,IS_ACCORDANCE) = 
                (SELECT UP.ORGAN_CODE,UP.USER_NAME,UP.ACCEPT_CODE,UP.SERVICE_CODE,UP.INSERT_TIME,UP.POLICY_CODE,
                TAS.STATUS_DESC,'是' FROM TMP_NCS_QD_BX_BQFH_BD_UP UP LEFT JOIN DEV_PAS.T_ACCEPT_STATUS@BINGXING_168_15 TAS ON TAS.ACCEPT_STATUS = UP.ACCEPT_STATUS
                WHERE BD.OLD_ACCEPT_CODE = UP.ACCEPT_CODE AND TRIM(BD.OLD_POLICY_CODE) = UP.POLICY_CODE)
                WHERE EXISTS( SELECT 1 FROM TMP_NCS_QD_BX_BQFH_BD_UP UP WHERE BD.OLD_ACCEPT_CODE = UP.ACCEPT_CODE AND TRIM(BD.OLD_POLICY_CODE) = UP.POLICY_CODE)";
        $statement = oci_parse($conn,$newDay);
        echo "新核心既往数据更新 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        oci_free_statement($statement);
        oci_close($conn);
        echo "保全数据更新结束 ：".date("h:i:sa")."<br> ";

    }

    //TC加载
    public function reloadTc(){
        //解除30s限制
        set_time_limit(0);
        echo "TC数据更新开始 ：".date("h:i:sa")."<br> ";
//        $user_type = $this->getUserType();
//        if((int)$user_type!=1){
//            echo "请使用管理员账户登录后进行刷新数据！！！";
//            return;
//        }
        //重加载TC数据
//        $tc_fix = $this->getTcFix();
        $queryTc = "select bt.bug_new_id as tc_id,ut.username as tc_user_name,cfvt.value18 AS business_code,bt.date_submitted as create_date,bt.summary as description,bt.status as status,tp.tx_desc as status_desc,cfvt.value17 as find_node,cfvt.value16 as local,bt.severity,cfvt.value3 as sys
                    from bug_table bt,custom_field_value_table cfvt,`user_table` ut,tx_pklistmemo tp   
                    where ut.id = bt.reporter_id and bt.id = cfvt.bug_id 
										and tp.plname = 'bug_table_status' and tp.tx_value = bt.status";
        //查询TC数据
        $tc_cursor = M();
        $res = $tc_cursor->query($queryTc);
        for($i=0;$i<sizeof($res);$i++){
            $result[$i]['TC_ID'] = $res[$i]['tc_id'];
            $result[$i]['TC_USER_NAME'] = $res[$i]['tc_user_name'];
            $result[$i]['CREATE_DATE'] = $res[$i]['create_date'];
            $result[$i]['BUSINESS_CODE'] = $res[$i]['business_code'];
            $result[$i]['DESCRIPTION'] = $res[$i]['description'];
            $result[$i]['STATUS'] = $res[$i]['status'];
            $result[$i]['FIND_NODE'] = $res[$i]['find_node'];
            $result[$i]['LOCAL'] = $res[$i]['local'];
            $result[$i]['PONDERANCE'] = $res[$i]['severity'];
            $result[$i]['STATUS_DESC'] = $res[$i]['status_desc'];
            $result[$i]['SYS'] = $res[$i]['sys'];
        }
        //连接数据库
        $conn = $this->OracleOldDBCon();
        $result_rows = oci_parse($conn,"SELECT * from TMP_BUSINESS_NODE");
        $business_node = $this->search_long($result_rows);
        foreach ($business_node as &$value) {
            $TC_ID = $value['TC_ID'];
            $BUSINESS_NODE = $value['BUSINESS_NODE'];
            $BUSINESS_NAME = $value['BUSINESS_NAME'];
            $business[$BUSINESS_NAME] = $BUSINESS_NODE;
        }
        $statement = oci_parse($conn,"delete from TMP_QDSX_TC_BUG");
        echo "清空现有TC数据 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        foreach ($result as &$value) {
            $TC_ID = $value['TC_ID'];
            $TC_USER_NAME = $value['TC_USER_NAME'];
            $CREATE_DATE = $value['CREATE_DATE'];
            $BUSINESS_CODE = $value['BUSINESS_CODE'];
            $DESCRIPTION = $value['DESCRIPTION'];
            $STATUS = $value['STATUS'];
            $FIND_NODE = $business[$value['FIND_NODE']];
            $LOCAL = $value['LOCAL'];
            $PONDERANCE = $value['PONDERANCE'];
            $STATUS_DESC = $value['STATUS_DESC'];
            $SYS = $value['SYS'];
            $query_insert = "INSERT INTO TMP_QDSX_TC_BUG(TC_ID,CREATE_DATE,TC_USER_NAME,BUSINESS_CODE,DESCRIPTION,STATUS,FIND_NODE,LOCAL,PONDERANCE,STATUS_DESC,SYS) VALUES('".$TC_ID."',to_date('".$CREATE_DATE."','YYYY/MM/DD hh24:mi:ss'),'".$TC_USER_NAME."','".$BUSINESS_CODE."','".$DESCRIPTION."','".$STATUS."','".$FIND_NODE."','".$LOCAL."','".$PONDERANCE."','".$STATUS_DESC."','".$SYS."')";
//          echo $query_insert;
            $statement = oci_parse($conn,$query_insert);
            echo $TC_ID."单条插入 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        }
        oci_free_statement($statement);
        oci_close($conn);
        //加载TC数据
//        $this->getImpTc();
        echo "TC数据更新结束 ：".date("h:i:sa")."<br> ";
    }

    //TC回写数据加载
    public function backloadTc(){
        //解除30s限制
        set_time_limit(0);
        echo "TC回写数据加载开始 ：".date("h:i:sa")."<br> ";
//        $user_type = $this->getUserType();
//        if((int)$user_type!=1){
//            echo "请使用管理员账户登录后进行刷新数据！！！";
//            return;
//        }
        //重加载TC数据
        $tc_fix = $this->getTcFix();
        $queryTc = "select cfvt.value17 AS TC_MODE,cfvt.value18 AS BUSINESS_CODE
                    from bug_table bt ,custom_field_value_table cfvt,`user_table` ut
                    where ut.id = bt.reporter_id 
                    ".$tc_fix."
                    AND cfvt.value24 IN ('2-需求差异','3-操作差异')
                    #AND DATE_FORMAT(bt.last_updated,'%Y-%m-%d') BETWEEN DATE_FORMAT('2018-08-30','%Y-%m-%d') AND DATE_FORMAT('2018-08-31','%Y-%m-%d')
                    AND bt.id = cfvt.bug_id
                    AND cfvt.value18 <> ''
                    AND bt.`status` IN ('8','11')";
        //查询TC数据
        $tc_cursor = M();
        $res = $tc_cursor->query($queryTc);
        dump($res);
        //连接数据库
        $conn = $this->OracleOldDBCon();
        $statement = oci_parse($conn,"delete from tmp_tc_backload");
        echo "清空现有TC数据 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
        foreach ($res as &$value) {
            $query_insert = "INSERT INTO tmp_tc_backload(BUSINESS_CODE,TC_MODE) VALUES('".$value['business_code']."','".$value['tc_mode']."')";
            $statement = oci_parse($conn,$query_insert);
            oci_execute($statement,OCI_COMMIT_ON_SUCCESS);
        }
        foreach ($res as &$value) {
            if(strcmp($value['tc_mode'],'契约')){
                $query_insert = "UPDATE TMP_BX_OLD_CDQCB SET IS_ACCORDANCE= '是' WHERE OLD_APPLE_CODE = '".$value['business_code']."'";
                $statement = oci_parse($conn,$query_insert);
                echo $value['tc_mode'].": ".$value['business_code']."单条更新 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
            }else if(strcmp($value['tc_mode'],'保全')){
                $query_insert = "UPDATE TMP_NCS_QD_BX_BQSL_BD SET IS_ACCORDANCE= '是' WHERE OLD_ACCEPT_CODE = '".$value['business_code']."'";
                $statement = oci_parse($conn,$query_insert);
                echo $value['tc_mode'].": ".$value['business_code']."单条更新 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
                $query_insert = "UPDATE TMP_NCS_QD_BX_BQFH_BD SET IS_ACCORDANCE= '是' WHERE OLD_ACCEPT_CODE = '".$value['business_code']."'";
                $statement = oci_parse($conn,$query_insert);
                echo $value['tc_mode'].": ".$value['business_code']."单条更新 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
            }else if(strcmp($value['tc_mode'],'理赔')){
                $query_insert = "UPDATE TMP_NCS_QD_BX_LPBA_BD SET IS_ACCORDANCE= '是' WHERE OLD_CASE_CODE = '".$value['business_code']."'";
                $statement = oci_parse($conn,$query_insert);
                echo $value['tc_mode'].": ".$value['business_code']."单条更新 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
                $query_insert = "UPDATE TMP_NCS_QD_BX_LPSHSP_BD SET IS_ACCORDANCE= '是' WHERE OLD_CASE_CODE = '".$value['business_code']."'";
                $statement = oci_parse($conn,$query_insert);
                echo $value['tc_mode'].": ".$value['business_code']."单条更新 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
            }else if(strcmp($value['tc_mode'],'核保')){
                $query_insert = "UPDATE TMP_UW_LIST SET IS_ACCORDANCE= '是' WHERE OLD_APPLE_CODE = '".$value['business_code']."'";
                $statement = oci_parse($conn,$query_insert);
                echo $value['tc_mode'].": ".$value['business_code']."单条更新 执行结果：".oci_execute($statement,OCI_COMMIT_ON_SUCCESS)." <br>";
            }
        }
        oci_free_statement($statement);
        oci_close($conn);
        echo "TC回写数据更新结束 ：".date("h:i:sa")."<br> ";
    }

    //TC更新
    public function getImpTc(){
        $conn = $this->OracleOldDBCon();
        //回写TC数据
        $update_nb_sql = "update tmp_bx_old_cdqcb  tt set tt.tc_id  = (select id from (select trim(policy_code) policy_code, (LISTAGG(id, ',') WITHIN group(order by id)) as id  from tmp_tc_cdqcb t  where t.policy_code is not null  group by trim(t.policy_code)) tc where trim(tc.policy_code) = trim(tt.OLD_APPLE_CODE))";
        $update_uw_sql = "update TMP_UW_LIST  tt set tt.tc_id  = (select id from (select trim(policy_code) policy_code, (LISTAGG(id, ',') WITHIN group(order by id)) as id  from tmp_tc_cdqcb t  where t.policy_code is not null group by trim(t.policy_code)) tc where trim(tc.policy_code) = trim(tt.OLD_APPLE_CODE))";
        $update_clm_sl_sql = "update TMP_NCS_QD_BX_LPBA_BD  tt set tt.tc_id  = (select id from (select trim(policy_code) policy_code, (LISTAGG(id, ',') WITHIN group(order by id)) as id  from tmp_tc_cdqcb t  where t.policy_code is not null  group by trim(t.policy_code)) tc where trim(tc.policy_code) = trim(tt.OLD_CASE_CODE))";
        $update_clm_sp_sql = "update TMP_NCS_QD_BX_LPSHSP_BD  tt set tt.tc_id  = (select id from (select trim(policy_code) policy_code, (LISTAGG(id, ',') WITHIN group(order by id)) as id  from tmp_tc_cdqcb t  where t.policy_code is not null  group by trim(t.policy_code)) tc where trim(tc.policy_code) = trim(tt.OLD_CASE_CODE))";
        $update_cs_sl_sql = "update TMP_NCS_QD_BX_BQSL_BD  tt set tt.tc_id  = (select id from (select trim(policy_code) policy_code, (LISTAGG(id, ',') WITHIN group(order by id)) as id  from tmp_tc_cdqcb t  where t.policy_code is not null  group by trim(t.policy_code)) tc where trim(tc.policy_code) = trim(tt.OLD_ACCEPT_CODE))";
        $update_cs_sp_sql = "update TMP_NCS_QD_BX_BQFH_BD  tt set tt.tc_id  = (select id from (select trim(policy_code) policy_code, (LISTAGG(id, ',') WITHIN group(order by id)) as id  from tmp_tc_cdqcb t  where t.policy_code is not null  group by trim(t.policy_code)) tc where trim(tc.policy_code) = trim(tt.OLD_ACCEPT_CODE))";
        $statement = oci_parse($conn,$update_nb_sql);
        //增加日志记录节点（所有无输出的数据库查询）
        echo "执行更新开始 <br>";
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

    public function getTcFix(){
//        $tc_fix = " AND cfvt.value3 IN ('11-第二次青岛并行','12-第二次技术并行','13-第二次数据并行') ";
//        $tc_fix = " AND cfvt.value3 IN ('8-青岛并行','9-技术并行','10-数据并行') ";
        $tc_fix = " ";
        return $tc_fix;
    }

    public function getTcSql(){
#                            AND DATE_FORMAT(bt.last_updated,'%Y-%m-%d') = DATE_FORMAT(current_date,'%Y-%m-%d')
        $tc_fix = $this->getTcFix();
        $res = array(
            "home_sum"=>"SELECT DATE_FORMAT(bt.date_submitted,'%Y-%m-%d') AS TIME,COUNT(*) AS NUM FROM bug_table bt LEFT JOIN custom_field_value_table cfvt ON bt.id = cfvt.bug_id 
                              WHERE 1=1 ".$tc_fix." GROUP BY DATE_FORMAT(bt.date_submitted,'%Y-%m-%d') ORDER BY bt.date_submitted ASC LIMIT 7;",
            "sum" => "SELECT COUNT(*) AS NUM FROM bug_table bt LEFT JOIN custom_field_value_table cfvt ON bt.id = cfvt.bug_id WHERE 1=1 ".$tc_fix.";",
            "pro_fix" => "select cfvt.value17,cfvt.value16,COUNT(*) AS NUM
                            from bug_table bt ,custom_field_value_table cfvt,`user_table` ut  
                            where ut.id = bt.reporter_id ".$tc_fix."
                            AND DATE_FORMAT(bt.last_updated,'%Y-%m-%d') = DATE_FORMAT('2018-08-31','%Y-%m-%d')
                            AND bt.id = cfvt.bug_id
                            AND bt.`status` IN ('8','11')
                            GROUP BY cfvt.value17,cfvt.value16;"
        );
        return $res;
    }

    //开始灌输
    public function startLoadData(){
        $username = I('post.username');
        if(empty($username)){
            $result['status'] = 'failed';
            $result['message'] = '登录状态已失效，请重新登录后进行操作！';
            exit(json_encode($result));
        }
        $update_sql = "UPDATE TMP_DAYPOST_USER SET IS_ADD_DATA = '1' WHERE ACCOUNT =  '".$username."'";
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $result_rows = oci_parse($conn, $update_sql); // 配置SQL语句，执行SQL
        if(oci_execute($result_rows,OCI_COMMIT_ON_SUCCESS)){
            $result['status'] = 'success';
            $result['message'] = '用户已成功设置开始灌输！';
        }else{
            $result['status'] = 'failed';
            $result['message'] = "系统设置灌数开始失败，请联系管理员！";
        }
        oci_free_statement($result_rows);
        oci_close($conn);
        exit(json_encode($result));
    }

    //灌输结束
    public function endLoadData(){
        $username = I('post.username');
        if(empty($username)){
            $result['status'] = 'failed';
            $result['message'] = '登录状态已失效，请重新登录后进行操作！';
            exit(json_encode($result));
        }
        $update_sql = "UPDATE TMP_DAYPOST_USER SET IS_ADD_DATA = '0' WHERE ACCOUNT =  '".$username."'";
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $result_rows = oci_parse($conn, $update_sql); // 配置SQL语句，执行SQL
        if(oci_execute($result_rows,OCI_COMMIT_ON_SUCCESS)){
            $result['status'] = 'success';
            $result['message'] = '用户已成功设置结束灌输！';
        }else{
            $result['status'] = 'failed';
            $result['message'] = "系统设置灌数结束失败，请联系管理员！";
        }
        oci_free_statement($result_rows);
        oci_close($conn);
        exit(json_encode($result));
    }

    //获取用户锁
    public function getUserLock($user_account){
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $user_select  = "SELECT IS_LOCK,IS_ADD_DATA FROM TMP_DAYPOST_USER WHERE ACCOUNT = '".$user_account."'";
        $result_rows = oci_parse($conn, $user_select); // 配置SQL语句，执行SQL
        $user_result =  $method->search_long($result_rows);
        oci_free_statement($result_rows);
        oci_close($conn);
//        dump($user_result);
        if((int)$user_result[0]['IS_LOCK'] == 1){
            return 1;
        }else if((int)$user_result[0]['IS_ADD_DATA'] == 1){
            return 2;
        }else{
            return 0;
        }
    }

    //日报系统公共校验
    public function publicCheck($user){
        //公共用户锁定校验部分
//        $token = $_SESSION['token'];
//        $token = $this->decode($token);
////        dump($token);
//        $info = explode('-', $token);
//        if (strcmp($info[2],"success") == 0) {
//            $admin = $info[0];
//        }
        Log::write('用户登录串码：'.$user,'INFO');
        Log::write('用户锁定结果：'.$this->getUserLock($user),'INFO');
        return $this->getUserLock($user);
    }

    public function publicCheckNoParam(){
        //公共用户锁定校验部分
        $token = $_SESSION['token'];
        $token = $this->decode($token);
//        dump($token);
        $info = explode('-', $token);
        if (strcmp($info[2],"success") == 0) {
            $admin = $info[0];
        }
        Log::write('用户登录串码：'.$user,'INFO');
        Log::write('用户锁定结果：'.$this->getUserLock($user),'INFO');
        return $this->getUserLock($user);
    }

    //获取用户机构码
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

    //获取保全复核用户
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

    //获取理赔室用户
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

    //获取异地作业用户
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

    //获取核保室用户
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
//        dump($result_rows);
        return $org;
    }

    //获取机构名称
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

    //老核心用户作业机构
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
                                "nb_old_count",
                                "nb_new_count",
                                "nb_cannt_count",
                                "nb_fix_count",
                                "nb_pro_count",
                                "nb_profix_count",
                                "nb_besame_count",
                                "nb_bfsame_count",
                                "cs_old_count",
                                "cs_new_count",
                                "cs_cannt_count",
                                "cs_fix_count",
                                "cs_pro_count",
                                "cs_profix_count",
                                "cs_fysame_count",
                                "clm_old_count",
                                "clm_new_count",
                                "clm_cannt_count",
                                "clm_fix_count",
                                "clm_pro_count",
                                "clm_profix_count",
                                "clm_fysame_count");
        return $data_object;
    }

    public function getObjectIndex(){

        $index = array(
            "本部" => 0,
            "李沧" => 1,
            "平度" => 2,
            "胶南" => 3,
            "即墨" => 4,
            "胶州" => 5,
            "城阳" => 6,
            "莱西" => 7,
            "开发区" => 8,
            "市南" => 9,
            "小计" => 10,
            "分公司核保室" => 11,
            "分公司保全室" => 12,
            "分公司理赔室" => 13,
            "总公司作业中心" => 14,
            "合计" => 15);
        return $index;
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

    //通知函数暂不使用
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
//        $xiaoji = 10 ;
//        $heji = 15;
//        $temp[$xiaoji][] = 0;
//        $temp[$heji][] = 0;
//        $tc_cursor = M();
//        $tcSQl = $this->getTcSql();
//        $objectIndex = $this->getObjectIndex();
//        $res = $tc_cursor->query($tcSQl['pro_fix']);
//        for($i=0;$i<sizeof($res);$i++){
//            $col = $objectIndex[$res[$i]['value16']];//取得行索引
//            if(strcmp($res[$i]['value17'],'保全')==0){
//                $result[$col]['cs_profix_count'] = $res[$i]['num'];
//                $temp[$xiaoji]['cs_profix_count'] += $res[$i]['num'];
//            }else if(strcmp($res[$i]['value17'],'契约')==0){
//                $result[$col]['nb_profix_count'] = $res[$i]['num'];
//                $temp[$xiaoji]['nb_profix_count'] += $res[$i]['num'];
//            }else if(strcmp($res[$i]['value17'],'理赔')==0){
//                $result[$col]['clm_profix_count'] = $res[$i]['num'];
//                $temp[$xiaoji]['clm_profix_count'] += $res[$i]['num'];
//            }else if(strcmp($res[$i]['value17'],'核保')==0){
//                $result[$col]['nb_profix_count'] = $res[$i]['num'];
//                $temp[$heji]['nb_profix_count'] += $res[$i]['num'];
//            }
//            $temp[$heji]['nb_profix_count'] += $temp[$xiaoji]['clm_profix_count'];
//        }
//        dump($res);
//        dump($result);
//        dump($temp);
    }

    //数据库Orcale短查询
    public function search_short($sql){
        $conn = $this->OracleOldDBCon();
        $result_rows = oci_parse($conn, $sql); // 配置SQL语句，执行SQL
        oci_execute($result_rows, OCI_DEFAULT); // 行数  OCI_DEFAULT表示不要自动commit
        //封装函数
        while($row = oci_fetch_array($result_rows, OCI_RETURN_NULLS))
            $result[] = $row;
        //关闭释放
        oci_free_statement($result_rows);
        oci_close($conn);
        return $result;
    }

    //数据库长查询
    public function search_long($result_rows){
        oci_execute($result_rows, OCI_DEFAULT); // 行数  OCI_DEFAULT表示不要自动commit
        //封装函数
        while($row = oci_fetch_array($result_rows, OCI_RETURN_NULLS)){
            $result[] = $row;
        }
        if(empty($result)){
            return null;
        }
        return $result;
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
        $tc_fix = $this->getTcFix();
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

        #013+ 契约出单前撤保新老核心当天
        $nb_where_new_old_time  = "SELECT OLD_USER_NAME,count(*) AS NUM FROM TMP_BX_OLD_CDQCB where ".$where_OLD_time_query." and NEW_INSERT_TIME IS NULL GROUP BY OLD_USER_NAME";
        $result_rows = oci_parse($conn, $nb_where_new_old_time); // 配置SQL语句，执行SQL
        $nb_result_old_time_no_new = $this->search_long($result_rows);

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
        $uw_result_old_time = $this->search_long($result_rows);

        #020 核保新老核心当天
        $uw_where_new_old_time  = "SELECT OLD_USER_NAME,count(*) AS NUM FROM TMP_UW_LIST where ".$where_OLD_time_query." and ".$where_new_time_query."  GROUP BY OLD_USER_NAME";
        $result_rows = oci_parse($conn, $uw_where_new_old_time); // 配置SQL语句，执行SQL
        $uw_result_new_old_time = $this->search_long($result_rows);

        #020+ 核保新老核心当天
        $uw_where_new_old_time  = "SELECT OLD_USER_NAME,count(*) AS NUM FROM TMP_UW_LIST where ".$where_OLD_time_query." and NEW_INSERT_TIME IS NULL  GROUP BY OLD_USER_NAME";
        $result_rows = oci_parse($conn, $uw_where_new_old_time); // 配置SQL语句，执行SQL
        $uw_result_old_time_no_new = $this->search_long($result_rows);

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
        $result_old_time = $this->search_long($result_rows);

        #002 保全受理新老核心当天
        $where_new_old_time  = "SELECT user_name,count(*) AS NUM FROM TMP_NCS_QD_BX_BQSL_BD where ".$where_OLD_time_query." and ".$where_new_time_query."  GROUP BY USER_NAME";
        $result_rows = oci_parse($conn, $where_new_old_time); // 配置SQL语句，执行SQL
        $result_new_old_time = $this->search_long($result_rows);

        #002+ 保全受理新老核心当天
        $where_new_old_time  = "SELECT user_name,count(*) AS NUM FROM TMP_NCS_QD_BX_BQSL_BD where ".$where_OLD_time_query." and NEW_INSERT_TIME IS NULL  GROUP BY USER_NAME";
        $result_rows = oci_parse($conn, $where_new_old_time); // 配置SQL语句，执行SQL
        $result_old_time_no_new = $this->search_long($result_rows);

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
        $fuhe_user = $this->getFuheUser();

        #007 保全复核老核心当天
        $where_old_time_fh  = "SELECT NEW_USER_NAME,COUNT(*) AS NUM FROM TMP_NCS_QD_BX_BQFH_BD WHERE ".$where_OLD_time_query." GROUP BY NEW_USER_NAME";
        $result_rows_fh = oci_parse($conn, $where_old_time_fh); // 配置SQL语句，执行SQL
        $result_old_time_fh = $this->search_long($result_rows_fh);

        #008 保全复核新老核心当天
        $where_new_old_time_fh  = "SELECT NEW_USER_NAME,COUNT(*) AS NUM FROM TMP_NCS_QD_BX_BQFH_BD WHERE ".$where_OLD_time_query." and ".$where_new_time_query."  GROUP BY NEW_USER_NAME";
        $result_rows_fh = oci_parse($conn, $where_new_old_time_fh); // 配置SQL语句，执行SQL
        $result_new_old_time_fh = $this->search_long($result_rows_fh);

        #008+ 保全复核新老核心当天
        $where_new_old_time_fh  = "SELECT COUNT(*) AS NUM FROM TMP_NCS_QD_BX_BQFH_BD WHERE ".$where_OLD_time_query." and NEW_INSERT_TIME IS NULL  GROUP BY NEW_USER_NAME";
        $result_rows_fh = oci_parse($conn, $where_new_old_time_fh); // 配置SQL语句，执行SQL
        $result_old_time_fh_no_new = $this->search_long($result_rows_fh);

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
        $orgName = $this->getOrgName();
        #023 理赔受理老核心当天
        $clm_where_old_time  = "SELECT OLD_ORGAN_CODE,COUNT(*) AS NUM FROM TMP_NCS_QD_BX_LPBA_BD WHERE ".$where_OLD_time_query." GROUP BY OLD_ORGAN_CODE";
        $result_rows = oci_parse($conn, $clm_where_old_time); // 配置SQL语句，执行SQL
        $clm_result_old_time = $this->search_long($result_rows);

        #024 理赔受理新老核心当天
        $clm_where_new_old_time  = "SELECT OLD_ORGAN_CODE,COUNT(*) AS NUM FROM TMP_NCS_QD_BX_LPBA_BD WHERE ".$where_OLD_time_query." and ".$where_new_time_query."  GROUP BY OLD_ORGAN_CODE";
        $result_rows = oci_parse($conn, $clm_where_new_old_time); // 配置SQL语句，执行SQL
        $clm_result_new_old_time_fh = $this->search_long($result_rows);

        #024+ 理赔受理新老核心当天
        $clm_where_new_old_time  = "SELECT OLD_ORGAN_CODE,COUNT(*) AS NUM FROM TMP_NCS_QD_BX_LPBA_BD WHERE ".$where_OLD_time_query." and NEW_INSERT_TIME IS NULL  GROUP BY OLD_ORGAN_CODE";
        $result_rows = oci_parse($conn, $clm_where_new_old_time); // 配置SQL语句，执行SQL
        $clm_result_old_time_fh_no_time = $this->search_long($result_rows);

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
        $clm_user = $this->getClmUser();
        #029 理赔审批审核老核心当天
        $clm_where_old_time  = "SELECT NEW_USER_NAME,COUNT(*) AS NUM FROM TMP_NCS_QD_BX_LPSHSP_BD WHERE ".$where_OLD_time_query." GROUP BY NEW_USER_NAME";
        $result_rows = oci_parse($conn, $clm_where_old_time); // 配置SQL语句，执行SQL
        $clm_result_old_time = $this->search_long($result_rows);

        #030 理赔审批审核老核心当天
        $clm_where_old_time_num  = "SELECT OLD_ORGAN_CODE,COUNT(*) AS NUM FROM TMP_NCS_QD_BX_LPSHSP_BD WHERE ".$where_OLD_time_query." GROUP BY OLD_ORGAN_CODE";
        $result_rows = oci_parse($conn, $clm_where_old_time_num); // 配置SQL语句，执行SQL
        $clm_result_old_time_num = $this->search_long($result_rows);

        #030+ 理赔审批审核老核心当天
        $clm_where_old_time_num  = "SELECT COUNT(*) AS NUM FROM TMP_NCS_QD_BX_LPSHSP_BD WHERE ".$where_OLD_time_query." and NEW_INSERT_TIME IS NULL GROUP BY OLD_ORGAN_CODE";
        $result_rows = oci_parse($conn, $clm_where_old_time_num); // 配置SQL语句，执行SQL
        $clm_result_old_time_num_no_new = $this->search_long($result_rows);

        #031 理赔审批审核老核心当天<>新核心,且新核心不为空
        $clm_where_new_no_old_time  = "SELECT NEW_USER_NAME,COUNT(*) AS NUM FROM TMP_NCS_QD_BX_LPSHSP_BD WHERE ".$where_bulu." and TO_DATE(NEW_INSERT_TIME,'YYYY-MM-DD') <> TO_DATE(OLD_INSERT_TIME,'YYYY-MM-DD') and NEW_INSERT_TIME IS NOT NULL GROUP BY NEW_USER_NAME";
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

}