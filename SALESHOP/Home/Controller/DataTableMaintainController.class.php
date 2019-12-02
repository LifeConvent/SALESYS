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

class DataTableMaintainController extends Controller
{

    public function tableManage()
    {
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        if ($result) {
            $method->assignPublic($username, $this);
            if (!$method->getSystype($username)) {
                $this->redirect('Index/errorSys');
            }
            $sys = new SysMaintainController();
            $sys->getUserLists();
            $this->assignDataTable();
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function sqlManage()
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

    public function assignDataTable(){
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $user_select = "SELECT TABLE_NAME FROM dba_tables WHERE owner like 'QUERYBX'";
        $result_rows = oci_parse($conn, $user_select); // 配置SQL语句，执行SQL
        $user_result = $method->search_long($result_rows);
        oci_free_statement($result_rows);
        oci_close($conn);
        for ($i = 0; $i < sizeof($user_result); $i++) {
            $select[] = $user_result[$i];
        }
        $content = null;
        for ($i = 0; $i < sizeof($select); $i++) {
            $content .= '<option value="' . $select[$i]['TABLE_NAME'] . '">' . $select[$i]['TABLE_NAME'] . '</option>';
        }
        $this->assign('data_table', $content);
    }

    public function checkPass()
    {
        $user_pass = I('post.user_pass');
        $user_name = I('post.user_name');
        $user_account = I('post.user_account');
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
        $user_check = "SELECT SET_ORGAN_CODE FROM TMP_DAYPOST_USER WHERE ACCOUNT = '" . $user_account . "'";
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

    public function modifyUserLimits(){
        $user_account = I('post.user_account');
        $is_lock = I('post.is_lock');
        $set_organ_code = I('post.set_organ_code');
        $user_organ_code = I('post.user_organ_code');
        $hd_user_code = I('post.hd_user_code');
        $sx_list_type = I('post.sx_list_type');
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

}