<?php
/**
 * Created by PhpStorm.
 * User: lawrance
 * Date: 2016/11/30
 * Time: 上午9:50
 */

namespace Home\Controller;

use Think\Controller;
use Think\Log;

class SysMaintainController extends Controller
{
    public function userManage()
    {
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        if ($result) {
            $method->assignPublic($username, $this);
            if (!$method->getSystype($username)) {
                $this->redirect('Index/errorSys');
            }
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function showInvoice()
    {
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        if ($result) {
            $method->assignPublic($username, $this);
            if (!$method->getSystype($username)) {
                $this->redirect('Index/errorSys');
            }
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function menuManage()
    {
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        if ($result) {
            $method->assignPublic($username, $this);
            if (!$method->getSystype($username)) {
                $this->redirect('Index/errorSys');
            }
            $this->getMenuArrayList();
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function userLimitsManage()
    {
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        if ($result) {
            $method->assignPublic($username, $this);
            if (!$method->getSystype($username)) {
                $this->redirect('Index/errorSys');
            }
            $this->assignLimitProceed($username);
            $this->getMenuArrayList();
            $this->getUsedOrganArrayList($username);
            $this->getSysNotice();
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function checkPass()
    {
        $user_pass = I('post.user_pass');
        $user_name = I('post.user_name');
        $user_select = "SELECT * FROM TMP_USER_PASS WHERE IS_VAILD = '1' AND END_TIME >= SYSDATE AND USER_ACCOUNT = '" . $user_name . "'";
        Log::write('用户： ' . $user_name . ' 执行SQL：' . $user_select, 'INFO');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $result_rows = oci_parse($conn, $user_select); // 配置SQL语句，执行SQL
        $pass_result = $method->search_long($result_rows);
        //取初始化机构
        $result_rows = "SELECT A.SET_ORGAN_CODE,B.ORGAN_NAME FROM TMP_DAYPOST_USER A,TMP_USED_ORGAN B WHERE A.SET_ORGAN_CODE = B.ORGAN_CODE AND A.ACCOUNT = '" . $user_name . "'";
        $result_set_organ = oci_parse($conn, $result_rows); // 配置SQL语句，执行SQL
        $set_organ = $method->search_long($result_set_organ);
        $user_check = "SELECT SET_ORGAN_CODE FROM TMP_DAYPOST_USER WHERE ACCOUNT = '" . $user_name . "'";
        Log::write('用户修改权限校验： ' . $user_name . ' 执行SQL：' . $user_check, 'INFO');
        $result_rows = oci_parse($conn, $user_check); // 配置SQL语句，执行SQL
        $user_check = $method->search_long($result_rows);
        if (empty($user_check[0]['SET_ORGAN_CODE'])) {
            $result['status'] = "failed";
            $result['message'] = "用户校验失败，该用户不存在请确认后再试!";
            exit(json_encode($result));
        }
        oci_free_statement($result_rows);
        oci_close($conn);
        for ($i = 0; $i < sizeof($pass_result); $i++) {
            if (strcmp($pass_result[$i]['PASS'], $user_pass) == 0) {
                $result['status'] = "success";
                $result['set_organ'] = $set_organ[0]['SET_ORGAN_CODE'];
                $result['message'] = "密钥校验成功！";
                exit(json_encode($result));
            }
        }
        $result['status'] = "failed";
        $result['message'] = "密钥校验失败，无法操作!";
        exit(json_encode($result));
    }

    public function getUserLimitsData()
    {
        $user_account = I('post.user_account');
//        $user_account = 'wangxf';
        $userLimits = $this->getUserLimitsBySql($user_account);
//        $menuLists = $this->getMenuArrayListResult();
        $organResult = $this->getUsedOrganArrayListResult($user_account);
        $result['userLimits'] = $userLimits[0];
//        $result['menuLists'] = $menuLists;
        $result['organResult'] = $organResult;
        $result['sys_type'] = $userLimits[0]['SYS_TYPE'];
        $result['status'] = 'success';
        exit(json_encode($result));
//        dump(json_decode(json_encode($result)));
    }

    public function getUserLimitsBySql($username)
    {
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $select_des = "SELECT * FROM TMP_DAYPOST_USER A WHERE ACCOUNT = '" . $username . "'";
        Log::write($username . '用户查询SQL：' . $select_des, 'INFO');
        $result_rows = oci_parse($conn, $select_des); // 配置SQL语句，执行SQL
        $result = $method->search_long($result_rows);
        oci_free_statement($result_rows);
        oci_close($conn);
        Log::write($username . '用户清单权限：' . $result[0]['LIST_TYPE'], 'INFO');
        return $result;
    }

    public function assignLimitProceed($username)
    {
        $method = new MethodController();
        $type = $method->getUserTypeBySql($username);
        $can = $method->getCanDayPostBySql($username);
        $is_reviewer = $method->getReviewer($username);
        $this->assign('is_lock', $method->getIsLock($username));
        $this->assign('hd_user_code', $method->getHdUserCode($username));
        $this->assign('sys_type', $method->getSysTypeNum($username));
        $this->assign('bx_daypost_organ', $method->getBxDayPostOrgan($username));
        $this->assign('bx_daypost_organ_list', $method->getBxDayPostOrganList($username));
        $this->assign('sx_daypost_organ', $method->getSxDayPostOrganCode($username));
        $this->assign('sx_daypost_organ_list', $method->getSxDayPostOrganList($username));
        $this->assign('channel_type', $method->getChannelTypeBySql($username));
        $this->assign('bx_list_type', $method->getSxListTypeBySql($username));
        $this->assign('user_organ_code', $method->getUserOrganCodeStr($username));
        $this->assign('set_organ_code', $method->getSetOrganCode($username));
        $this->getUserLists();
    }

    public function getUserLists()
    {
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $user_select = "SELECT ACCOUNT,USER_NAME FROM TMP_DAYPOST_USER ORDER BY ACCOUNT";
        $result_rows = oci_parse($conn, $user_select); // 配置SQL语句，执行SQL
        $user_result = $method->search_long($result_rows);
        oci_free_statement($result_rows);
        oci_close($conn);
        for ($i = 0; $i < sizeof($user_result); $i++) {
            $select[] = $user_result[$i];
        }
        $content = null;
        for ($i = 0; $i < sizeof($select); $i++) {
            $content .= '<option value="' . $select[$i]['ACCOUNT'] . '">' .'用户账号：'. $select[$i]['ACCOUNT'] . '   -    姓名：' . $select[$i]['USER_NAME'] . '</option>';
        }
        $this->assign('user_lists', $content);
    }

    public function getUsedOrganArrayListResult($username)
    {
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $set_organ_select = "SELECT A.SET_ORGAN_CODE,B.ORGAN_NAME FROM TMP_DAYPOST_USER A,TMP_USED_ORGAN B WHERE A.SET_ORGAN_CODE = B.ORGAN_CODE AND A.ACCOUNT = '" . $username . "'";
        $result_rows = oci_parse($conn, $set_organ_select); // 配置SQL语句，执行SQL
        $set_organ = $method->search_long($result_rows);
        $this->assign('set_organ_code', $set_organ[0]['SET_ORGAN_CODE']);
        if (strlen($set_organ[0]['SET_ORGAN_CODE']) == 2) {
            //一级机构可修改全部
            $set_organ_select = "SELECT ORGAN_CODE,ORGAN_NAME FROM TMP_USED_ORGAN WHERE 
                                  LENGTH(ORGAN_CODE) <=4 AND ORGAN_CODE LIKE 
                                  (SELECT SET_ORGAN_CODE||'%' FROM TMP_DAYPOST_USER WHERE ACCOUNT = '" . $username . "') ORDER BY ORGAN_CODE";
            $result_rows = oci_parse($conn, $set_organ_select); // 配置SQL语句，执行SQL
            $set_organ_result = $method->search_long($result_rows);
            $content = null;
            for ($i = 0; $i < sizeof($set_organ_result); $i++) {
                $content .= "<option value='" . $set_organ_result[$i]['ORGAN_CODE'] . "'>" . $set_organ_result[$i]['ORGAN_CODE'] . "  --  " . $set_organ_result[$i]['ORGAN_NAME'] . "</option>";
            }
            $res['organCodeList1'] = htmlspecialchars($content);
            $res['set_organ_level'] = '1';
        } else if (strlen($set_organ[0]['SET_ORGAN_CODE']) == 4) {
            //二级机构输出二级机构选项及可调控的三级机构选项
            $set_organ_select = "SELECT ORGAN_CODE,ORGAN_NAME FROM TMP_USED_ORGAN WHERE 
                                  LENGTH(ORGAN_CODE) =6 AND ORGAN_CODE LIKE 
                                  (SELECT SET_ORGAN_CODE||'%' FROM TMP_DAYPOST_USER WHERE ACCOUNT = '" . $username . "') ORDER BY ORGAN_CODE";
            $result_rows = oci_parse($conn, $set_organ_select); // 配置SQL语句，执行SQL
            $set_organ_result = $method->search_long($result_rows);
            $content = '<option value="-1">==选择==</option>';
            for ($i = 0; $i < sizeof($set_organ_result); $i++) {
                $content .= '<option value="' . $set_organ_result[$i]['ORGAN_CODE'] . '">' . $set_organ_result[$i]['ORGAN_CODE'] . '  --  ' . $set_organ_result[$i]['ORGAN_NAME'] . '</option>';
            }
            $res['organCodeList1'] = htmlspecialchars('<option selected = "selected" value="' . $set_organ[0]['SET_ORGAN_CODE'] . '">' . $set_organ[0]['SET_ORGAN_CODE'] . '  --  ' . $set_organ[0]['ORGAN_NAME'] . '</option>');
            $res['organCodeList2'] = htmlspecialchars($content);
            $res['set_organ_level'] = '2';
        } else if (strlen($set_organ[0]['SET_ORGAN_CODE']) == 6) {
            //3级机构输出3级机构选项及可调控的4级机构选项
            $set_organ_select = "SELECT ORGAN_CODE,ORGAN_NAME FROM TMP_USED_ORGAN WHERE 
                                  LENGTH(ORGAN_CODE) =8 AND ORGAN_CODE LIKE 
                                  (SELECT SET_ORGAN_CODE||'%' FROM TMP_DAYPOST_USER WHERE ACCOUNT = '" . $username . "') ORDER BY ORGAN_CODE";
            $result_rows = oci_parse($conn, $set_organ_select); // 配置SQL语句，执行SQL
            $set_organ_result = $method->search_long($result_rows);
            $content = '<option value="-1">==选择==</option>';
            for ($i = 0; $i < sizeof($set_organ_result); $i++) {
                $content .= '<option value="' . $set_organ_result[$i]['ORGAN_CODE'] . '">' . $set_organ_result[$i]['ORGAN_CODE'] . '  --  ' . $set_organ_result[$i]['ORGAN_NAME'] . '</option>';
            }
            $res['organCodeList2'] = htmlspecialchars('<option selected = "selected" value="' . $set_organ[0]['SET_ORGAN_CODE'] . '">' . $set_organ[0]['SET_ORGAN_CODE'] . '  --  ' . $set_organ[0]['ORGAN_NAME'] . '</option>');
            $res['organCodeList3'] = htmlspecialchars($content);
            $res['set_organ_level'] = '3';
        } else if (strlen($set_organ[0]['SET_ORGAN_CODE']) == 8) {
            //四级机构仅输出到四级不可修改
            $this->assign('set_organ_level', '4');
            $set_organ_select = "SELECT ORGAN_CODE,ORGAN_NAME FROM TMP_USED_ORGAN WHERE 
                                  LENGTH(ORGAN_CODE) =8 AND ORGAN_CODE LIKE 
                                  (SELECT SET_ORGAN_CODE||'%' FROM TMP_DAYPOST_USER WHERE ACCOUNT = '" . $username . "') ORDER BY ORGAN_CODE";
            $result_rows = oci_parse($conn, $set_organ_select); // 配置SQL语句，执行SQL
            $set_organ_result = $method->search_long($result_rows);
            $content = null;
            for ($i = 0; $i < sizeof($set_organ_result); $i++) {
                $content .= '<option selected = "selected" value="' . $set_organ_result[$i]['ORGAN_CODE'] . '">' . $set_organ_result[$i]['ORGAN_CODE'] . '  --  ' . $set_organ_result[$i]['ORGAN_NAME'] . '</option>';
            }
            $res['organCodeList3'] = htmlspecialchars($content);
        }
        oci_free_statement($result_rows);
        oci_close($conn);
        return $res;
    }

    public function getUsedOrganArrayList($username)
    {
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $set_organ_select = "SELECT A.SET_ORGAN_CODE,B.ORGAN_NAME FROM TMP_DAYPOST_USER A,TMP_USED_ORGAN B WHERE A.SET_ORGAN_CODE = B.ORGAN_CODE AND A.ACCOUNT = '" . $username . "'";
        $result_rows = oci_parse($conn, $set_organ_select); // 配置SQL语句，执行SQL
        $set_organ = $method->search_long($result_rows);
        $this->assign('set_organ_code', $set_organ[0]['SET_ORGAN_CODE']);
        if (strlen($set_organ[0]['SET_ORGAN_CODE']) == 2) {
            //一级机构可修改全部
            $set_organ_select = "SELECT ORGAN_CODE,ORGAN_NAME FROM TMP_USED_ORGAN WHERE 
                                  LENGTH(ORGAN_CODE) <=4 AND ORGAN_CODE LIKE 
                                  (SELECT SET_ORGAN_CODE||'%' FROM TMP_DAYPOST_USER WHERE ACCOUNT = '" . $username . "') ORDER BY ORGAN_CODE";
            $result_rows = oci_parse($conn, $set_organ_select); // 配置SQL语句，执行SQL
            $set_organ_result = $method->search_long($result_rows);
            $content = null;
            for ($i = 0; $i < sizeof($set_organ_result); $i++) {
                $content .= '<option value="' . $set_organ_result[$i]['ORGAN_CODE'] . '">' . $set_organ_result[$i]['ORGAN_CODE'] . '  --  ' . $set_organ_result[$i]['ORGAN_NAME'] . '</option>';
            }
            $this->assign('organCodeList1', $content);
            $this->assign('set_organ_level', '1');
        } else if (strlen($set_organ[0]['SET_ORGAN_CODE']) == 4) {
            //二级机构输出二级机构选项及可调控的三级机构选项
            $set_organ_select = "SELECT ORGAN_CODE,ORGAN_NAME FROM TMP_USED_ORGAN WHERE 
                                  LENGTH(ORGAN_CODE) =6 AND ORGAN_CODE LIKE 
                                  (SELECT SET_ORGAN_CODE||'%' FROM TMP_DAYPOST_USER WHERE ACCOUNT = '" . $username . "') ORDER BY ORGAN_CODE";
            $result_rows = oci_parse($conn, $set_organ_select); // 配置SQL语句，执行SQL
            $set_organ_result = $method->search_long($result_rows);
            $content = null;
            for ($i = 0; $i < sizeof($set_organ_result); $i++) {
                $content .= '<option value="' . $set_organ_result[$i]['ORGAN_CODE'] . '">' . $set_organ_result[$i]['ORGAN_CODE'] . '  --  ' . $set_organ_result[$i]['ORGAN_NAME'] . '</option>';
            }
            $this->assign('organCodeList1', '<option value="' . $set_organ[0]['SET_ORGAN_CODE'] . '">' . $set_organ[0]['SET_ORGAN_CODE'] . '  --  ' . $set_organ[0]['ORGAN_NAME'] . '</option>');
            $this->assign('organCodeList2', $content);
            $this->assign('set_organ_level', '2');
        } else if (strlen($set_organ[0]['SET_ORGAN_CODE']) == 6) {
            //3级机构输出3级机构选项及可调控的4级机构选项
            $set_organ_select = "SELECT ORGAN_CODE,ORGAN_NAME FROM TMP_USED_ORGAN WHERE 
                                  LENGTH(ORGAN_CODE) =8 AND ORGAN_CODE LIKE 
                                  (SELECT SET_ORGAN_CODE||'%' FROM TMP_DAYPOST_USER WHERE ACCOUNT = '" . $username . "') ORDER BY ORGAN_CODE";
            $result_rows = oci_parse($conn, $set_organ_select); // 配置SQL语句，执行SQL
            $set_organ_result = $method->search_long($result_rows);
            $content = null;
            for ($i = 0; $i < sizeof($set_organ_result); $i++) {
                $content .= '<option value="' . $set_organ_result[$i]['ORGAN_CODE'] . '">' . $set_organ_result[$i]['ORGAN_CODE'] . '  --  ' . $set_organ_result[$i]['ORGAN_NAME'] . '</option>';
            }
            $this->assign('organCodeList2', '<option value="' . $set_organ[0]['SET_ORGAN_CODE'] . '">' . $set_organ[0]['SET_ORGAN_CODE'] . '  --  ' . $set_organ[0]['ORGAN_NAME'] . '</option>');
            $this->assign('organCodeList3', '<option value="' . $set_organ[0]['SET_ORGAN_CODE'] . '">' . $set_organ[0]['SET_ORGAN_CODE'] . '  --  ' . $set_organ[0]['ORGAN_NAME'] . '</option>');
            $this->assign('set_organ_level', '3');
        } else if (strlen($set_organ[0]['SET_ORGAN_CODE']) == 8) {
            //四级机构仅输出到四级不可修改
            $this->assign('set_organ_level', '4');
            $set_organ_select = "SELECT ORGAN_CODE,ORGAN_NAME FROM TMP_USED_ORGAN WHERE 
                                  LENGTH(ORGAN_CODE) =8 AND ORGAN_CODE LIKE 
                                  (SELECT SET_ORGAN_CODE||'%' FROM TMP_DAYPOST_USER WHERE ACCOUNT = '" . $username . "') ORDER BY ORGAN_CODE";
            $result_rows = oci_parse($conn, $set_organ_select); // 配置SQL语句，执行SQL
            $set_organ_result = $method->search_long($result_rows);
            $content = null;
            for ($i = 0; $i < sizeof($set_organ_result); $i++) {
                $content .= '<option value="' . $set_organ_result[$i]['ORGAN_CODE'] . '">' . $set_organ_result[$i]['ORGAN_CODE'] . '  --  ' . $set_organ_result[$i]['ORGAN_NAME'] . '</option>';
            }
            $this->assign('organCodeList3', $content);
        }
        $result_rows = oci_parse($conn, $set_organ_select); // 配置SQL语句，执行SQL
        $set_organ_result = $method->search_long($result_rows);
        $content = null;
        for ($i = 0; $i < sizeof($set_organ_result); $i++) {
            $content .= '<option value="' . $set_organ_result[$i]['ORGAN_CODE'] . '">' . $set_organ_result[$i]['ORGAN_CODE'] . '  --  ' . $set_organ_result[$i]['ORGAN_NAME'] . '</option>';
        }
        $this->assign('organCodeList1', $content);
        oci_free_statement($result_rows);
        oci_close($conn);
    }

    public function getSysNotice(){
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $user_select = "SELECT * FROM SYS_NOTICE_RECORD";
        $result_rows = oci_parse($conn, $user_select); // 配置SQL语句，执行SQL
        $user_result = $method->search_long($result_rows);
        oci_free_statement($result_rows);
        oci_close($conn);
        for ($i = 0; $i < sizeof($user_result); $i++) {
            if((int)$user_result[$i]['IS_VAILD']==1){
                $user_result[$i]['IS_VAILD'] = '是';
            }else{
                $user_result[$i]['IS_VAILD'] = '否';
            }
            $select[] = $user_result[$i];
        }
        $content = null;
        for ($i = 0; $i < sizeof($select); $i++) {
            $content .= '<option value="' . $select[$i]['NOTICE_ID'] . '">' .$select[$i]['NOTICE_ID'].': 通知内容：'. $select[$i]['NOTICE'] . '   -    是否有效：' . $select[$i]['IS_VAILD'] . '</option>';
        }
        $this->assign('notice_lists', $content);
    }

    public function getOrganFourLevel()
    {
        $upOrganCode = I('post.upOrganCode');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $set_organ_select = "SELECT ORGAN_CODE,ORGAN_NAME FROM TMP_USED_ORGAN WHERE 
                                  LENGTH(ORGAN_CODE) =6 AND ORGAN_CODE LIKE '" . $upOrganCode . "'||'%' ORDER BY ORGAN_CODE";
        $result_rows = oci_parse($conn, $set_organ_select); // 配置SQL语句，执行SQL
        $set_organ = $method->search_long($result_rows);
        $content = '<option value="-1">==选择==</option>';
        oci_free_statement($result_rows);
        oci_close($conn);
        if (!empty($set_organ)) {
            for ($i = 0; $i < sizeof($set_organ); $i++) {
                $content .= '<option value="' . $set_organ[$i]['ORGAN_CODE'] . '">' . $set_organ[$i]['ORGAN_CODE'] . '  --  ' . $set_organ[$i]['ORGAN_NAME'] . '</option>';
            }
            $result['status'] = "success";
            $result['message'] = $content;
        } else {
            $result['status'] = "failed";
            $result['message'] = "机构加载错误，请联系管理员确认！";
        }
        exit(json_encode($result));
    }

    public function unbindUserLog(){
        $user_name = I('post.user_name');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $update = "UPDATE USER_LOGIN_INFO SET IS_VAILD = '0' WHERE USER_ACCOUNT = '".$user_name."'";
        Log::write($user_name.'登录更新 SQL：'.$update,'INFO');
        $result_rows = oci_parse($conn, $update); // 配置SQL语句，执行SQL
        if(oci_execute($result_rows,OCI_COMMIT_ON_SUCCESS)){
            $result['status'] = "success";
        }else{
            $result['status'] = "failed";
            $result['message'] = "更新登录信息失败，请联系管理员确认！";
        }
//        exit(json_encode($result));
    }

    public function getOrganSixLevel()
    {
        $upOrganCode = I('post.upOrganCode');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $set_organ_select = "SELECT ORGAN_CODE,ORGAN_NAME FROM TMP_USED_ORGAN WHERE 
                                  LENGTH(ORGAN_CODE) =8 AND ORGAN_CODE LIKE '" . $upOrganCode . "'||'%' ORDER BY ORGAN_CODE";
        $result_rows = oci_parse($conn, $set_organ_select); // 配置SQL语句，执行SQL
        $set_organ = $method->search_long($result_rows);
        $content = '<option value="-1">==选择==</option>';
        oci_free_statement($result_rows);
        oci_close($conn);
        if (!empty($set_organ)) {
            for ($i = 0; $i < sizeof($set_organ); $i++) {
                $content .= '<option value="' . $set_organ[$i]['ORGAN_CODE'] . '">' . $set_organ[$i]['ORGAN_CODE'] . '  --  ' . $set_organ[$i]['ORGAN_NAME'] . '</option>';
            }
            $result['status'] = "success";
            $result['message'] = $content;
        } else {
            $result['status'] = "failed";
            $result['message'] = "机构加载错误，请联系管理员确认！";
        }
        exit(json_encode($result));
    }

    public function getMenuArrayListResult()
    {
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $user_select = "SELECT * FROM TMP_SX_MENU_LIST ORDER BY MENU_INDEX";
        $result_rows = oci_parse($conn, $user_select); // 配置SQL语句，执行SQL
        $menu_result = $method->search_long($result_rows);
        oci_free_statement($result_rows);
        oci_close($conn);
        for ($i = 0; $i < sizeof($menu_result); $i++) {
            $select[] = $menu_result[$i];
        }
        $content = null;
        for ($i = 0; $i < sizeof($select); $i++) {
            if ((int)$select[$i]['MENU_GRADE'] == 1) {
                $content .= '<option value="' . $select[$i]['MENU_INDEX'] . '">' . $select[$i]['MENU_INDEX'] . '  ' . $select[$i]['MENU_NAME'] . '</option>';
            } else {
                $content .= '<option value="' . $select[$i]['MENU_INDEX'] . '">' . ' |----  ' . $select[$i]['MENU_INDEX'] . '  ' . $select[$i]['MENU_NAME'] . '</option>';
            }
        }
        return $content;
    }

    public function getMenuArrayList()
    {
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $user_select = "SELECT * FROM TMP_SX_MENU_LIST ORDER BY MENU_INDEX";
        $result_rows = oci_parse($conn, $user_select); // 配置SQL语句，执行SQL
        $menu_result = $method->search_long($result_rows);
        oci_free_statement($result_rows);
        oci_close($conn);
        for ($i = 0; $i < sizeof($menu_result); $i++) {
            $select[] = $menu_result[$i];
        }
        $content = null;
        for ($i = 0; $i < sizeof($select); $i++) {
            if ((int)$select[$i]['MENU_GRADE'] == 1) {
                $content .= '<option value="' . $select[$i]['MENU_INDEX'] . '">' . $select[$i]['MENU_INDEX'] . '  ' . $select[$i]['MENU_NAME'] . '</option>';
            } else {
                $content .= '<option value="' . $select[$i]['MENU_INDEX'] . '">' . ' |----  ' . $select[$i]['MENU_INDEX'] . '  ' . $select[$i]['MENU_NAME'] . '</option>';
            }
        }
        $this->assign('menuList', $content);
    }

    public function checkUserKey(){
        $key_user_account = I('post.key_user_account');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $key_select = "SELECT IS_VAILD,TO_CHAR(END_TIME,'YYYY-MM-DD HH24:MI:SS') AS END_TIME,TEXT,KEY_ID FROM TMP_USER_PASS WHERE USER_ACCOUNT = '".$key_user_account."'";
        Log::write($key_user_account.'用户校验密钥查询：'.$key_select,'INFO');
        $result_rows = oci_parse($conn, $key_select); // 配置SQL语句，执行SQL
        $key_result = $method->search_long($result_rows);
        oci_free_statement($result_rows);
        oci_close($conn);
        for ($i = 0; $i < sizeof($key_result); $i++) {
            $select[] = $key_result[$i];
        }
        $content = '<option value="-1" selected>==选择==</option>';
        for ($i = 0; $i < sizeof($select); $i++) {
            $content .= '<option value="' . $select[$i]['KEY_ID'] . '"> /$  密钥文本 ---' . $select[$i]['TEXT'] . ' /$  是否有效 --- ' . $select[$i]['IS_VAILD'] . ' /$  截止时间 ---' . $select[$i]['END_TIME'] . ' $/ </option>';
        }
        if(empty($key_result[0]['KEY_ID'])){
            $result['status'] = "failed";
            $result['message'] = "该用户下无有效密钥！只能新增，无法进行修改/删除操作！";
        }else{
            $result['status'] = "success";
            $result['message'] = "$content";
        }
        exit(json_encode($result));
    }

    public function checkUserTable(){
        $key_user_account = I('post.key_user_account');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $key_select = "SELECT RECORD_ID,TABLE_NAME,TABLE_CODE,DEAL_TYPE FROM TMP_USER_CONTROL_TABLE WHERE USER_ACCOUNT = '".$key_user_account."'";
        Log::write($key_user_account.'用户数据表权限查询：'.$key_select,'INFO');
        $result_rows = oci_parse($conn, $key_select); // 配置SQL语句，执行SQL
        $key_result = $method->search_long($result_rows);
        oci_free_statement($result_rows);
        oci_close($conn);
        for ($i = 0; $i < sizeof($key_result); $i++) {
            if((int)$key_result[$i]['DEAL_TYPE']==1){
                $key_result[$i]['DEAL_TYPE'] = '仅支持删除后新增';
            }else if((int)$key_result[$i]['DEAL_TYPE']==2){
                $key_result[$i]['DEAL_TYPE'] = '仅支持直接新增';
            }else{
                $key_result[$i]['DEAL_TYPE'] = '支持全部类型操作';
            }
            $select[] = $key_result[$i];
        }
        $content = '<option value="-1" selected>==选择==</option>';
        for ($i = 0; $i < sizeof($select); $i++) {
            $content .= '<option value="' . $select[$i]['RECORD_ID'] . '">  ' . $select[$i]['TABLE_NAME'] . '   --- ' . $select[$i]['TABLE_CODE'] .'   --- ' . $select[$i]['DEAL_TYPE'] .' </option>';
        }
        if(empty($key_result[0]['RECORD_ID'])){
            $result['status'] = "failed";
            $result['message'] = "该用户下无有效数据表！只能新增，无法进行修改/删除操作！";
        }else{
            $result['status'] = "success";
            $result['message'] = "$content";
        }
        exit(json_encode($result));
    }

    public function getUserTable(){
        $user_key_id = I('post.user_key_id');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $key_select = "SELECT TABLE_NAME,TABLE_CODE,DEAL_TYPE FROM TMP_USER_CONTROL_TABLE WHERE RECORD_ID = ".$user_key_id;
        Log::write($user_key_id.'用户数据表查询：'.$key_select,'INFO');
        $result_rows = oci_parse($conn, $key_select); // 配置SQL语句，执行SQL
        $key_result = $method->search_long($result_rows);
        oci_free_statement($result_rows);
        oci_close($conn);
        if(empty($key_result[0]['DEAL_TYPE'])){
            $result['status'] = "failed";
            Log::write($user_key_id.'用户数据表查询发生错误：'.$key_select,'ERROR');
            $result['message'] = "系统查询时出现错误，请联系管理员重试！";
        }else{
            $result['status'] = "success";
            $result['TABLE_NAME'] = $key_result[0]['TABLE_NAME'];
            $result['TABLE_CODE'] = $key_result[0]['TABLE_CODE'];
            $result['DEAL_TYPE'] = $key_result[0]['DEAL_TYPE'];
        }
        exit(json_encode($result));
    }

    public function getUserKey(){
        $user_key_id = I('post.user_key_id');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $key_select = "SELECT IS_VAILD,TO_CHAR(END_TIME,'YYYY-MM-DD HH24:MI:SS') AS END_TIME,TEXT,KEY_ID FROM TMP_USER_PASS WHERE KEY_ID = '".$user_key_id."'";
        Log::write($user_key_id.'用户密钥查询：'.$key_select,'INFO');
        $result_rows = oci_parse($conn, $key_select); // 配置SQL语句，执行SQL
        $key_result = $method->search_long($result_rows);
        oci_free_statement($result_rows);
        oci_close($conn);
        if(empty($key_result[0]['IS_VAILD'])){
            $result['status'] = "failed";
            Log::write($user_key_id.'用户密钥查询发生错误：'.$key_select,'ERROR');
            $result['message'] = "系统查询时出现错误，请联系管理员重试！";
        }else{
            $result['status'] = "success";
            $result['IS_VAILD'] = $key_result[0]['IS_VAILD'];
            $result['END_TIME'] = $key_result[0]['END_TIME'];
            $result['TEXT'] = $key_result[0]['TEXT'];
        }
        exit(json_encode($result));
    }

    public function getNoticeContent(){
        $notice_id = I('post.notice_id');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $key_select = "SELECT * FROM SYS_NOTICE_RECORD WHERE NOTICE_ID = ".$notice_id."";
        Log::write($notice_id.'系统通知查询：'.$key_select,'INFO');
        $result_rows = oci_parse($conn, $key_select); // 配置SQL语句，执行SQL
        $key_result = $method->search_long($result_rows);
        oci_free_statement($result_rows);
        oci_close($conn);
        if(empty($key_result[0]['NOTICE'])){
            $result['status'] = "failed";
            Log::write($notice_id.'系统通知查询发生错误：'.$key_select,'ERROR');
            $result['message'] = "系统查询时出现错误，请联系管理员重试！";
        }else{
            $result['status'] = "success";
            $result['IS_VAILD'] = $key_result[0]['IS_VAILD'];
            $result['TIMES'] = $key_result[0]['TIMES'];
            $result['TEXT'] = $key_result[0]['NOTICE'];
        }
        exit(json_encode($result));
    }

    public function modifyUserLimits(){
        $user_account = I('post.user_account');
        $is_lock = I('post.is_lock');
        $set_organ_code = I('post.set_organ_code');
        $user_organ_code = I('post.user_organ_code');
        $hd_user_code = I('post.hd_user_code');
        $sx_list_type = I('post.sx_list_type');
        $sx_list_type = htmlspecialchars_decode($sx_list_type);
        $sys_type = I('post.sys_type');
        $channel_type = I('post.channel_type');
        $sx_daypost_organ = I('post.sx_daypost_organ');
        $sx_daypost_organ_list = I('post.sx_daypost_organ_list');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $set_organ_select = "SELECT ORGAN_NAME FROM TMP_USED_ORGAN WHERE ORGAN_CODE = '" . $user_organ_code . "'";
        $result_rows = oci_parse($conn, $set_organ_select); // 配置SQL语句，执行SQL
        $set_organ = $method->search_long($result_rows);
        $user_modify = "UPDATE TMP_DAYPOST_USER SET IS_LOCK = '" . $is_lock . "' , SET_ORGAN_CODE = '" . $set_organ_code . "' , USER_ORGAN_CODE = '" . $user_organ_code . "' , USER_ORGAN_NAME = '" . $set_organ[0]['ORGAN_NAME'] . "'
        , HD_USER_CODE = '" . $hd_user_code . "' , SX_LIST_TYPE = '" . $sx_list_type . "' , SYS_TYPE = '" . $sys_type . "' , CHANNEL_TYPE = '" . $channel_type . "' , SX_DAYPOST_ORGAN = '" . $sx_daypost_organ . "' ,
         SX_DAYPOST_ORGAN_LIST = '" . $sx_daypost_organ_list . "' WHERE ACCOUNT = '" . $user_account . "'";
        Log::write('更新'.$user_account.'用户权限执行SQL：' . $user_modify . "<br>", 'INFO');
        $result_rows = oci_parse($conn, $user_modify); // 配置SQL语句，执行SQL
        if (oci_execute($result_rows, OCI_COMMIT_ON_SUCCESS)) {
            $result['status'] = "success";
            $result['message'] = "用户权限更新成功！";
        } else {
            $result['status'] = "failed";
            $result['message'] = "用户权限更新失败！";
        }
        oci_free_statement($result_rows);
        oci_close($conn);
        exit(json_encode($result));
    }

    public function modifyUserLimitsBx(){
        $user_account = I('post.user_account');
        $is_lock = I('post.is_lock');
        $set_organ_code = I('post.set_organ_code');
        $user_organ_code = I('post.user_organ_code');
        $hd_user_code = I('post.hd_user_code');
//        $bx_list_type = I('post.bx_list_type');
        $sys_type = I('post.sys_type');
        $bx_daypost_organ = I('post.bx_daypost_organ');
        $bx_daypost_organ_list = I('post.bx_daypost_organ_list');
        $is_bx_define_user = I('post.is_bx_define_user');
        $is_back_user = I('post.is_back_user');
        $is_reviewer = I('post.is_reviewer');
        $is_delete_apply = I('post.is_delete_apply');
        $is_delete_reviewer = I('post.is_delete_reviewer');
        $is_sys_delete = I('post.is_sys_delete');
        $is_work_delete = I('post.is_work_delete');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $set_organ_select = "SELECT ORGAN_NAME FROM TMP_USED_ORGAN WHERE ORGAN_CODE = '" . $user_organ_code . "'";
        $result_rows = oci_parse($conn, $set_organ_select); // 配置SQL语句，执行SQL
        $set_organ = $method->search_long($result_rows);
        //缺少并行清单权限配置更新
        $user_modify = "UPDATE TMP_DAYPOST_USER SET IS_LOCK = '" . $is_lock . "' , SET_ORGAN_CODE = '" . $set_organ_code . "' , USER_ORGAN_CODE = '" . $user_organ_code . "' , USER_ORGAN_NAME = '" . $set_organ[0]['ORGAN_NAME'] . "'
        , HD_USER_CODE = '" . $hd_user_code . "', SYS_TYPE = '". $sys_type . "' , IS_BX_DEFINE_USER = '" . $is_bx_define_user . "' , BX_DAYPOST_ORGAN = '" . $bx_daypost_organ . "' ,
         BX_DAYPOST_ORGAN_LIST = '" . $bx_daypost_organ_list . "',IS_BACK_USER = '" . $is_back_user . "', IS_REVIEWER = '" . $is_reviewer . "', IS_DELETE_APPLY = '" . $is_delete_apply . "'
          , IS_DELETE_REVIEWER = '" . $is_delete_reviewer . "', IS_SYS_DELETE = '" . $is_sys_delete . "', IS_WORK_DELETE = '" . $is_work_delete . "'WHERE ACCOUNT = '" . $user_account . "'";
        Log::write('更新'.$user_account.'用户并行权限执行SQL：' . $user_modify . "<br>", 'INFO');
        $result_rows = oci_parse($conn, $user_modify); // 配置SQL语句，执行SQL
        if (oci_execute($result_rows, OCI_COMMIT_ON_SUCCESS)) {
            $result['status'] = "success";
            $result['message'] = "用户权限更新成功！";
        } else {
            $result['status'] = "failed";
            $result['message'] = "用户权限更新失败！";
        }
        oci_free_statement($result_rows);
        oci_close($conn);
        exit(json_encode($result));
    }

    public function postModifyMenu()
    {
        $menu_name = I('post.menu_name');
        $menu_index = I('post.menu_index');
        $is_lock = I('post.is_lock');
        $menu_code = I('post.menu_code');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $user_modify = "UPDATE TMP_SX_MENU_LIST SET MENU_NAME = '" . $menu_name . "' , IS_LOCK = '" . $is_lock . "'WHERE MENU_INDEX = '" . $menu_index . "'";
        Log::write('更新菜单执行SQL：' . $user_modify . "<br>", 'INFO');
        $result_rows = oci_parse($conn, $user_modify); // 配置SQL语句，执行SQL
//        dump($user_modify);
        if (oci_execute($result_rows, OCI_COMMIT_ON_SUCCESS)) {
            $result['status'] = "success";
            $result['message'] = "菜单更新成功！";
        } else {
            $result['status'] = "failed";
            $result['message'] = "菜单更新失败！";
        }
        oci_free_statement($result_rows);
        oci_close($conn);
        exit(json_encode($result));
    }

    public function dealUserKey(){
        $is_valid  = I('post.is_valid');
        $key_user_pass  = I('post.key_user_pass');
        $pass = md5($key_user_pass);
        $end_time  = I('post.end_time');
        $is_new  = I('post.is_new');
        $key_id  = I('post.key_id');
        $key_user_account  = I('post.key_user_account');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();

        switch ((int)$is_new){
            case 0:
                $select_key_id = "SELECT MAX(KEY_ID)+1 AS KEY_ID FROM TMP_USER_PASS";
                $result_rows = oci_parse($conn, $select_key_id); // 配置SQL语句，执行SQL
                $key_id = $method->search_long($result_rows);
                //新增
                $modify_sql = "INSERT INTO TMP_USER_PASS(USER_ACCOUNT,PASS,IS_VAILD,END_TIME,APPLY_TIME,TEXT,KEY_ID) 
                              VALUES('" . $key_user_account . "','" . $pass . "','" . $is_valid . "',TO_DATE('" . $end_time . "','YYYY-MM-DD HH24:Mi:SS'),SYSDATE,'" . $key_user_pass . "'," . $key_id[0]['KEY_ID'] . ")";
                Log::write($key_user_account.'新增密钥执行SQL：' . $modify_sql . "<br>", 'INFO');
                break;
            case 1:
                //修改
                $modify_sql = "UPDATE TMP_USER_PASS SET IS_VAILD = '" . $is_valid . "' , PASS = '" . $pass . "' , END_TIME = TO_DATE('" . $end_time . "','YYYY-MM-DD HH24:Mi:SS') , TEXT = '" . $key_user_pass . "'
                        , APPLY_TIME = SYSDATE WHERE KEY_ID = " . $key_id;
                Log::write($key_user_account.'修改密钥执行SQL：' . $modify_sql . "<br>", 'INFO');
                break;
            case 2:
                //删除
                $modify_sql = "DELETE FROM TMP_USER_PASS WHERE KEY_ID = ".$key_id;
                Log::write($key_user_account.'删除密钥执行SQL：' . $modify_sql . "<br>", 'INFO');
                break;
        }
        $result_rows = oci_parse($conn, $modify_sql); // 配置SQL语句，执行SQL
        if (oci_execute($result_rows, OCI_COMMIT_ON_SUCCESS)) {
            $result['status'] = "success";
            switch ((int)$is_new){
                case 0:
                    $result['message'] = "用户密钥新增成功！";
                    break;
                case 1:
                    $result['message'] = "用户密钥修改成功！";
                    break;
                case 2:
                    $result['message'] = "用户密钥删除成功！";
                    break;
            }
        } else {
            $result['status'] = "failed";
            switch ((int)$is_new){
                case 0:
                    $result['message'] = "用户密钥新增失败！";
                    break;
                case 1:
                    $result['message'] = "用户密钥修改失败！";
                    break;
                case 2:
                    $result['message'] = "用户密钥删除失败！";
                    break;
            }
        }
        oci_free_statement($result_rows);
        oci_close($conn);
        exit(json_encode($result));
    }

    public function dealSysNotice(){
        $is_valid  = I('post.is_valid');
        $is_new  = I('post.is_new_notice');
        $notice_id = I('post.notice_id');
        $notice_content  = I('post.notice_content');
        $notice_times  = I('post.notice_times');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        switch ((int)$is_new){
            case 0:
                $select_key_id = "SELECT MAX(NOTICE_ID)+1 AS NOTICE_ID FROM SYS_NOTICE_RECORD";
                $result_rows = oci_parse($conn, $select_key_id); // 配置SQL语句，执行SQL
                $key_id = $method->search_long($result_rows);
                //新增
                $modify_sql = "INSERT INTO SYS_NOTICE_RECORD(NOTICE_ID,NOTICE,TIMES,IS_VAILD) 
                              VALUES(" . $key_id[0]['NOTICE_ID'] . ",'" . $notice_content . "'," . $notice_times .",'". $is_valid . "')";
                Log::write('新增系统通知SQL：' . $modify_sql . "<br>", 'INFO');
                break;
            case 1:
                //修改
                $modify_sql = "UPDATE SYS_NOTICE_RECORD SET IS_VAILD = '" . $is_valid . "' , NOTICE = '" . $notice_content . "' , TIMES = " . $notice_times . " WHERE NOTICE_ID = " . $notice_id;
                Log::write('修改系统通知SQL：' . $modify_sql . "<br>", 'INFO');
                break;
        }
        $result_rows = oci_parse($conn, $modify_sql); // 配置SQL语句，执行SQL
        if (oci_execute($result_rows, OCI_COMMIT_ON_SUCCESS)) {
            $result['status'] = "success";
            switch ((int)$is_new){
                case 0:
                    $result['message'] = "系统通知新增成功！";
                    break;
                case 1:
                    $result['message'] = "系统通知修改成功！";
                    break;
            }
        } else {
            $result['status'] = "failed";
            switch ((int)$is_new){
                case 0:
                    $result['message'] = "系统通知新增失败！";
                    break;
                case 1:
                    $result['message'] = "系统通知修改失败！";
                    break;
            }
        }
        oci_free_statement($result_rows);
        oci_close($conn);
        exit(json_encode($result));
    }

    public function expInvoice(){
        $queryDateStart = I('get.queryDateStart');
        $queryDateEnd = I('get.queryDateEnd');
        $invoice_code  = I('get.invoice_code');
        $invoice_num  = I('get.invoice_num');
        $xlsName = "发票清单";
        $xlsTitle = "发票清单";
        $xlsCell = array( //设置字段名和列名的映射
            array('department', '部门'),
            array('name', '姓名'),
            array('invoice_code', '发票代码'),
            array('invoice_num', '发票号码')
        );
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        if (!empty($queryDateStart)) {
            $where_time_bqsl = " AND TRUNC(INSERT_DATE) = to_date('" . $queryDateStart . "','yyyy-mm-dd')";
            if (!empty($queryDateEnd)) {
                $where_time_bqsl = " AND TRUNC(INSERT_DATE) BETWEEN to_date('" . $queryDateStart . "','yyyy-mm-dd') AND to_date('" . $queryDateEnd . "','yyyy-mm-dd') ";
            }
        } else if (empty($invoice_code) && empty($invoice_num)) {
//            $where_time_bqsl = " AND TRUNC(INSERT_DATE) = TRUNC(SYSDATE) ";
        }
        $user_name = "";
        $method->checkIn($user_name);
        $userType = $method->getUserType();
        $type = $method->getInvoiceTypeBySql($user_name);
        $office = $method->getOfficeBySql($user_name);
        if ((int)$userType == 1||strcmp($type,'99') == 0) {
            $where_type_fix = "";
        } else if((int)$type == 1){
            //$where_type_fix = " AND OFFICE = '" . $office . "'";
        }else{
            $where_type_fix = " AND A.USER_NAME = '" . $user_name . "'";
        }
        if (!empty($invoice_code)) {
            $where_type_fix .= " AND INVOICE_CODE LIKE '%" . $invoice_code . "%'";
        }
        if (!empty($invoice_num)) {
            $where_type_fix .= " AND INVOICE_NUM LIKE '%" . $invoice_num . "%'";
        }
        $select_bqsl = "SELECT A.INVOICE_CODE,  
                               A.INVOICE_NUM,
                               TO_CHAR(A.INSERT_DATE,'YYYY-MM-DD HH24:mi:ss') AS INSERT_DATE, 
                               A.IS_DEAL, 
                               A.USER_NAME, 
                               B.USER_NAME AS NAME, 
                               B.IS_INVOICE,
                               B.OFFICE
                           FROM TMP_INVOICE_RECORD A
                           LEFT JOIN TMP_DAYPOST_USER B
                           ON A.USER_NAME = B.ACCOUNT
                          WHERE 1=1 " . $where_type_fix . $where_time_bqsl;
        $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
        Log::write($user_name . ' 发票清单 数据库查询条件：' . $select_bqsl, 'INFO');
        $bqsl_result_time = $method->search_long($result_rows);
        $res = null;
        for ($i = 0; $i < sizeof($bqsl_result_time); $i++) {
            $value = $bqsl_result_time[$i];
            $res[$i]['invoice_code'] = $value['INVOICE_CODE'];
            $res[$i]['department'] = 'PMO';
            $res[$i]['invoice_num'] = $value['INVOICE_NUM'];
            $res[$i]['insert_time'] = $value['INSERT_DATE'];
            $res[$i]['is_deal'] = $value['IS_DEAL'];
            $res[$i]['user_name'] = $value['USER_NAME'];
            $res[$i]['name'] = $value['NAME'];
            $res[$i]['is_invoice'] = $value['IS_INVOICE'];
            $res[$i]['office'] = $value['OFFICE'];
        }
        for ($i = 0; $i < sizeof($res); $i++) {
            $result[] = $res[$i];
        }
        oci_free_statement($result_rows);
        oci_close($conn);
        $method->exportExcel($xlsTitle, $xlsCell, $result, $xlsName);
    }

    public function getInvoice(){
        $queryDateStart = I('get.queryDateStart');
        $queryDateEnd = I('get.queryDateEnd');
        $invoice_code  = I('get.invoice_code');
        $invoice_num  = I('get.invoice_num');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        if (!empty($queryDateStart)) {
            $where_time_bqsl = " AND TRUNC(INSERT_DATE) = to_date('" . $queryDateStart . "','yyyy-mm-dd')";
            if (!empty($queryDateEnd)) {
                $where_time_bqsl = " AND TRUNC(INSERT_DATE) BETWEEN to_date('" . $queryDateStart . "','yyyy-mm-dd') AND to_date('" . $queryDateEnd . "','yyyy-mm-dd') ";
            }
        } else if (empty($invoice_code) && empty($invoice_num)) {
//            $where_time_bqsl = " AND TRUNC(INSERT_DATE) = TRUNC(SYSDATE) ";
        }
        $user_name = "";
        $method->checkIn($user_name);
        $userType = $method->getUserType();
        $type = $method->getInvoiceTypeBySql($user_name);
        $office = $method->getOfficeBySql($user_name);
        if ((int)$userType == 1||strcmp($type,'99') == 0) {
            $where_type_fix = "";
        } else if((int)$type == 1){
            //$where_type_fix = " AND OFFICE = '" . $office . "'";
        }else{
            $where_type_fix = " AND A.USER_NAME = '" . $user_name . "'";
        }
        if (!empty($invoice_code)) {
            $where_type_fix .= " AND INVOICE_CODE LIKE '%" . $invoice_code . "%'";
        }
        if (!empty($invoice_num)) {
            $where_type_fix .= " AND INVOICE_NUM LIKE '%" . $invoice_num . "%'";
        }
        $select_bqsl = "SELECT A.INVOICE_CODE,  
                               A.INVOICE_NUM,
                               TO_CHAR(A.INSERT_DATE,'YYYY-MM-DD HH24:mi:ss') AS INSERT_DATE, 
                               A.IS_DEAL, 
                               A.USER_NAME, 
                               B.USER_NAME AS NAME, 
                               B.IS_INVOICE,
                               B.OFFICE
                           FROM TMP_INVOICE_RECORD A
                           LEFT JOIN TMP_DAYPOST_USER B
                           ON A.USER_NAME = B.ACCOUNT
                          WHERE 1=1 " . $where_type_fix . $where_time_bqsl;
        $result_rows = oci_parse($conn, $select_bqsl); // 配置SQL语句，执行SQL
        Log::write($user_name . ' 发票清单 数据库查询条件：' . $select_bqsl, 'INFO');
        $bqsl_result_time = $method->search_long($result_rows);
        for ($i = 0; $i < sizeof($bqsl_result_time); $i++) {
            $value = $bqsl_result_time[$i];
            $res[$i]['invoice_code'] = $value['INVOICE_CODE'];
            $res[$i]['department'] = 'PMO';
            $res[$i]['invoice_num'] = $value['INVOICE_NUM'];
            $res[$i]['insert_time'] = $value['INSERT_DATE'];
            $res[$i]['is_deal'] = $value['IS_DEAL'];
            $res[$i]['user_name'] = $value['USER_NAME'];
            $res[$i]['name'] = $value['NAME'];
            $res[$i]['is_invoice'] = $value['IS_INVOICE'];
            $res[$i]['office'] = $value['OFFICE'];
        }
        oci_free_statement($result_rows);
        oci_close($conn);
        if ($res) {
            exit(json_encode($res));
        } else {
            exit(json_encode(''));
        }
    }

    public function newInvoice(){
        $invoice_code  = I('post.invoice_code');
        $invoice_num  = I('post.invoice_num');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $user_name = "";
        $method->checkIn($user_name);
        $select_invoice = "SELECT * FROM TMP_INVOICE_RECORD WHERE INVOICE_CODE = '".$invoice_code."' AND INVOICE_NUM = '".$invoice_num."'";
        Log::write($user_name . ' 发票查询条件：' . $select_invoice, 'INFO');
        $result_rows = oci_parse($conn, $select_invoice); // 配置SQL语句，执行SQL
        $invoice_res = $method->search_long($result_rows);
        if(empty($invoice_res[0]['INVOICE_CODE'])){
            $select_invoice = "INSERT INTO TMP_INVOICE_RECORD(INVOICE_CODE,INVOICE_NUM,USER_NAME) VALUES('" . $invoice_code . "','" . $invoice_num . "','".$user_name."')";
            $result_rows = oci_parse($conn, $select_invoice); // 配置SQL语句，执行SQL
            if(oci_execute($result_rows, OCI_COMMIT_ON_SUCCESS)){
                $result['status'] = "success";
                $result['message'] = "发票新增成功！";
            }else{
                $result['status'] = "failed";
                $result['message'] = "发票新增失败！";
            }
        }else{
            $result['status'] = "failed";
            $result['message'] = "发票".$invoice_num."已经存在提交记录，请确认是否正确！";
        }
        oci_free_statement($result_rows);
        oci_close($conn);
        exit(json_encode($result));
    }
    
    public function updateInvoice(){
        $invoice_code  = I('post.invoice_code');
        $invoice_num  = I('post.invoice_num');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $select_invoice = "UPDATE TMP_INVOICE_RECORD SET IS_DEAL = '1' WHERE INVOICE_CODE = '".$invoice_code."' AND INVOICE_NUM = '".$invoice_num."'";
        $result_rows = oci_parse($conn, $select_invoice); // 配置SQL语句，执行SQL
        if(oci_execute($result_rows, OCI_COMMIT_ON_SUCCESS)){
            $result['status'] = "success";
            $result['message'] = "发票核销成功！";
        }else{
            $result['status'] = "failed";
            $result['message'] = "发票核销失败，请联系管理员！";
        }
        oci_free_statement($result_rows);
        oci_close($conn);
        exit(json_encode($result));
    }
    
    public function deleteInvoice(){
        $invoice_code  = I('post.invoice_code');
        $invoice_num  = I('post.invoice_num');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $select_invoice = "DELETE FROM TMP_INVOICE_RECORD WHERE INVOICE_CODE = '".$invoice_code."' AND INVOICE_NUM = '".$invoice_num."'";
        $result_rows = oci_parse($conn, $select_invoice); // 配置SQL语句，执行SQL
        if(oci_execute($result_rows, OCI_COMMIT_ON_SUCCESS)){
            $result['status'] = "success";
            $result['message'] = "发票删除成功！";
        }else{
            $result['status'] = "failed";
            $result['message'] = "发票删除失败，请联系管理员！";
        }
        oci_free_statement($result_rows);
        oci_close($conn);
        exit(json_encode($result));
    }

    public function dealUserTable(){
        $user_account  = I('post.user_account');
        $data_table  = I('post.data_table');
        $data_type  = I('post.data_type');
        $table_name  = I('post.table_name');
        $record_id  = I('post.key_user_select');
        $is_new  = I('post.is_new');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        switch ((int)$is_new){
            case 0:
                $select_record_id = "SELECT MAX(RECORD_ID)+1 AS RECORD_ID FROM TMP_USER_CONTROL_TABLE";
                $result_rows = oci_parse($conn, $select_record_id); // 配置SQL语句，执行SQL
                $record_id = $method->search_long($result_rows);
                //新增
                $modify_sql = "INSERT INTO TMP_USER_CONTROL_TABLE(USER_ACCOUNT,TABLE_CODE,TABLE_NAME,DEAL_TYPE,RECORD_ID) 
                              VALUES('" . $user_account . "','" . $data_table . "','" . $table_name . "','". $data_type . "',". $record_id[0]['RECORD_ID'] . ")";
                Log::write($modify_sql.'新增数据表权限执行SQL：' . $modify_sql . "<br>", 'INFO');
                break;
            case 1:
                //修改
                $modify_sql = "UPDATE TMP_USER_CONTROL_TABLE SET TABLE_CODE = '" . $data_table . "' , TABLE_NAME = '" . $table_name . "' , DEAL_TYPE = '" . $data_type . "' WHERE RECORD_ID = " . $record_id;
                Log::write($modify_sql.'修改数据表权限执行SQL：' . $modify_sql . "<br>", 'INFO');
                break;
            case 2:
                //删除
                $modify_sql = "DELETE FROM TMP_USER_CONTROL_TABLE WHERE RECORD_ID = ".$record_id;
                Log::write($modify_sql.'删除数据表权限执行SQL：' . $modify_sql . "<br>", 'INFO');
                break;
        }
        $result_rows = oci_parse($conn, $modify_sql); // 配置SQL语句，执行SQL
        if (oci_execute($result_rows, OCI_COMMIT_ON_SUCCESS)) {
            $result['status'] = "success";
            switch ((int)$is_new){
                case 0:
                    $result['message'] = "用户数据表权限新增成功！";
                    break;
                case 1:
                    $result['message'] = "用户数据表权限修改成功！";
                    break;
                case 2:
                    $result['message'] = "用户数据表权限删除成功！";
                    break;
            }
        } else {
            $result['status'] = "failed";
            switch ((int)$is_new){
                case 0:
                    $result['message'] = "用户数据表权限新增失败！";
                    break;
                case 1:
                    $result['message'] = "用户数据表权限修改失败！";
                    break;
                case 2:
                    $result['message'] = "用户数据表权限删除失败！";
                    break;
            }
        }
        oci_free_statement($result_rows);
        oci_close($conn);
        exit(json_encode($result));
    }

    public function postAddMenu()
    {
        $MENU_NAME = I('post.menu_name');
        $MENU_INDEX = I('post.menu_index');
        $MENU_GRADE = I('post.menu_grade');
        $MENU_CODE = I('post.menu_code');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $menu_add = "INSERT INTO TMP_SX_MENU_LIST(MENU_NAME,MENU_INDEX,IS_LOCK,MENU_GRADE,MENU_CODE) 
            VALUES('" . $MENU_NAME . "','" . $MENU_INDEX . "','0','" . $MENU_GRADE . "','" . $MENU_CODE . "')";
        Log::write('菜单新增 数据库条件：' . $menu_add, 'INFO');
        $result_rows = oci_parse($conn, $menu_add); // 配置SQL语句，执行SQL
        if (oci_execute($result_rows, OCI_COMMIT_ON_SUCCESS)) {
            $result['status'] = "success";
            $result['message'] = "菜单新建成功！";
        } else {
            $result['status'] = "failed";
            $result['message'] = "菜单新建失败！";
        }
        oci_free_statement($result_rows);
        oci_close($conn);
        exit(json_encode($result));
    }

    public function exeSql(){
        $sql_text = I('post.sql_text');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        Log::write('菜单新增 数据库条件：' . $sql_text, 'INFO');
        $result_rows = oci_parse($conn, $sql_text); // 配置SQL语句，执行SQL
        if (oci_execute($result_rows, OCI_COMMIT_ON_SUCCESS)) {
            $result['status'] = "success";
            $result['message'] = "脚本执行成功！";
        } else {
            $result['status'] = "failed";
            $result['message'] = "脚本执行失败！";
        }
        oci_free_statement($result_rows);
        oci_close($conn);
        exit(json_encode($result));
    }

    public function getMenuList()
    {
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $user_select = "SELECT * FROM TMP_SX_MENU_LIST ORDER BY MENU_INDEX";
        $result_rows = oci_parse($conn, $user_select); // 配置SQL语句，执行SQL
        $menu_result = $method->search_long($result_rows);
        oci_free_statement($result_rows);
        oci_close($conn);
        for ($i = 0; $i < sizeof($menu_result); $i++) {
            if ((int)$menu_result[$i]['IS_LOCK'] == 0) {
                $menu_result[$i]['IS_LOCK'] = "否";
            } else {
                $menu_result[$i]['IS_LOCK'] = "是";
            }
            $res[] = $menu_result[$i];
        }
        if ($res) {
            exit(json_encode($res));
        } else {
            exit(json_encode(''));
        }
    }

    public function getMenu(){
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $user_select = "SELECT * FROM TMP_SX_MENU_LIST ORDER BY MENU_INDEX";
        $result_rows = oci_parse($conn, $user_select); // 配置SQL语句，执行SQL
        $menu_result = $method->search_long($result_rows);
        oci_free_statement($result_rows);
        oci_close($conn);
        for ($i = 0; $i < sizeof($menu_result); $i++) {
            if ((int)$menu_result[$i]['IS_LOCK'] == 0) {
                $res[$menu_result[$i]['MENU_INDEX']] = $menu_result[$i]['MENU_CODE'];
                $res['MENUCODE'][] = $menu_result[$i]['MENU_CODE'];
            }
        }
        $res['status'] = 'success';
        if ($res) {
            exit(json_encode($res));
        } else {
            exit(json_encode(''));
        }
    }

    public function getTableKLimits(){
        $db_table = I('post.db_table');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $user_select = "SELECT DISTINCT DEAL_TYPE FROM TMP_USER_CONTROL_TABLE WHERE TABLE_CODE = '".$db_table."'";
        Log::write('数据表权限执行SQL：' . $user_select . "<br>", 'INFO');
        $result_rows = oci_parse($conn, $user_select); // 配置SQL语句，执行SQL
        $menu_result = $method->search_long($result_rows);
        oci_free_statement($result_rows);
        oci_close($conn);
        $res = "<option value='-1'>==选择==</option>";
        for ($i = 0; $i < sizeof($menu_result); $i++) {
            if ((int)$menu_result[$i]['DEAL_TYPE'] == 1) {
                $res .= "<option value='0'>清空后新增</option>";
            } else if ((int)$menu_result[$i]['DEAL_TYPE'] == 2){
                $res .= "<option value='1'>直接新增</option>";
            } else if ((int)$menu_result[$i]['DEAL_TYPE'] == 99){
                $res = '';
                $res .= "<option value='0'>清空后新增</option>";
                $res .= "<option value='1'>直接新增</option>";
                break;
            }
        }
        $res .= "<option value='2'>主键更新（暂不支持）</option>";
        $result['status'] = "success";
        $result['message'] = $res;
        if ($result) {
            exit(json_encode($result));
        } else {
            exit(json_encode(''));
        }
    }

}