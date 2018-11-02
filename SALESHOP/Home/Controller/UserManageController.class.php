<?php
/**
 * Created by PhpStorm.
 * User: lawrance
 * Date: 2016/11/30
 * Time: 上午9:50
 */

namespace Home\Controller;

use Think\Controller;

class UserManageController extends Controller
{
    public function userManage()
    {
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        if ($result) {
            $this->assign('username', $username);
            $this->assign('TITLE', TITLE);
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function getUser()
    {
        $user = M('user');
        $result = $user->field('stu_num,stu_name,stu_sex,stu_graclass,stu_pro,stu_class,stu_phone,stu_qq')->select();
        $pro = '';
        //替换字段
        foreach ($result as $k => $v) {
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
            $result[$k]['stu_pro'] = $v['stu_pro'] = $pro;
        }
        if ($result) {
            exit(json_encode($result));
        } else {
            exit('');
        }
    }

    public function deleteUser()
    {
        $stu_num = I('post.num');
        $condition['stu_num'] = "$stu_num";
        $user = M('user');
        $res = $user->where($condition)->delete();
        if ($res) {
            $result['status'] = 'success';
            $result['message'] = '删除成功！';
        } else {
            $result['status'] = 'failed';
            $result['message'] = '删除失败！';
        }
        exit(json_encode($result));
    }

    public function searchUser()
    {
        $stu_pro = I('get.pro');
        $stu_class = I('get.class');
        $stu_graclass = I('get.gra');
        $stu_name = I('get.name');
        $condition = Array();
        if ($stu_pro != null) {
            $condition['stu_pro'] = "$stu_pro";
        }
        if ($stu_class != null) {
            $condition['stu_class'] = "$stu_class";
        }
        if ($stu_graclass != null) {
            $condition['stu_graclass'] = "$stu_graclass";
        }
        $user = M();
        if ($stu_name != null) {
            if ($stu_pro == null && $stu_class == null && $stu_graclass == null) {
                $result = $user->field('stu_num,stu_name,stu_sex,stu_graclass,stu_pro,stu_class,stu_phone,stu_qq,is_match,openid')
                    ->where($condition)
                    ->query("SELECT %FIELD% FROM tb_user WHERE stu_name LIKE '" . "$stu_name" . "%'", true);
            } else {
                $result = $user->field('stu_num,stu_name,stu_sex,stu_graclass,stu_pro,stu_class,stu_phone,stu_qq,is_match,openid')
                    ->where($condition)
                    ->query("SELECT %FIELD% FROM tb_user %WHERE% AND stu_name LIKE '" . $stu_name . "%'", true);
            }
        } else {
            $result = $user->field('stu_num,stu_name,stu_sex,stu_graclass,stu_pro,stu_class,stu_phone,stu_qq,is_match,openid')
                ->where($condition)
                ->query("SELECT %FIELD% FROM tb_user %WHERE%", true);
        }

        if ($result) {
            $pro = '';
            $is_match = '';
            //替换字段
            foreach ($result as $k => $v) {
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
                $result[$k]['stu_pro'] = $v['stu_pro'] = $pro;
            }
            exit(json_encode($result));
        } else {
            exit('');
        }
    }

    public function modifyUser()
    {
        $stu_num = I('post.num');
        $stu_pro = I('post.pro');
        $stu_class = I('post.class');
        $stu_name = I('post.name');
        $stu_graclass = I('post.gra');
        $stu_sex = I('post.sex');
        $stu_phone = I('post.phone');
        $stu_qq = I('post.qq');

        $condition['stu_num'] = "$stu_num";
        $temp['stu_pro'] = "$stu_pro";
        $temp['stu_class'] = "$stu_class";
        $temp['stu_graclass'] = "$stu_graclass";
        $temp['stu_sex'] = "$stu_sex";
        $temp['stu_name'] = "$stu_name";
        if ($stu_phone != null) {
            $temp['stu_phone'] = "$stu_phone";
        }
        if ($stu_qq != null) {
            $temp['stu_qq'] = "$stu_qq";
        }
        $user = M('user');
        $res = $user->where($condition)->save($temp);
        if ($res) {
            $result['status'] = 'success';
            $result['message'] = '修改成功！';
        } else {
            $result['status'] = 'failed';
            $result['message'] = '修改失败！';
        }
        exit(json_encode($result));
    }

    public function getPostUserList(){
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $userType = $method->getUserType();
        $userName = $method->getUserName();
        $userCS = $method->getFuheUser();
        $userUW = $method->getUwUser();
        $userCLM = $method->getClmUser();
        $organ_code = $method->getUserOrganCode();
        $where = "";
        if((int)$userType==2){
            if(in_array($userName,$userCS)){
                $where = " WHERE USER_ORGAN_CODE LIKE '".$organ_code[$userName]."%' AND BUSS_AREA = '保全复核' ";
            }else if(in_array($userName,$userUW)){
                $where = " WHERE USER_ORGAN_CODE LIKE '".$organ_code[$userName]."%' AND BUSS_AREA = '核保'  ";
            }else if(in_array($userName,$userCLM)){
                $where = " WHERE USER_ORGAN_CODE LIKE '".$organ_code[$userName]."%' AND BUSS_AREA = '理赔审核'  ";
            }else{
                $where = " WHERE USER_ORGAN_CODE LIKE '".$organ_code[$userName]."%' ";
            }
        }else if((int)$userType==3){
            return;
        }
        $user_select  = "SELECT * FROM TMP_DAYPOST_USER".$where;
        $result_rows = oci_parse($conn, $user_select); // 配置SQL语句，执行SQL
        $user_result =  $method->search_long($result_rows);
        $num = sizeof($user_result);
        for($i=0;$i<$num;$i++){
            $result[$i]['account'] = $user_result[$i]['ACCOUNT'];
            $result[$i]['type'] = $user_result[$i]['TYPE'];
            $result[$i]['user_name'] = $user_result[$i]['USER_NAME'];
            $result[$i]['user_organ_code'] = $user_result[$i]['USER_ORGAN_CODE'];
            $result[$i]['user_organ_name'] = $user_result[$i]['USER_ORGAN_NAME'];
            $result[$i]['user_sex'] = $user_result[$i]['USER_SEX'];
            $result[$i]['user_company'] = $user_result[$i]['USER_COMPANY'];
            $result[$i]['buss_area'] = $user_result[$i]['BUSS_AREA'];
            if((int)$user_result[$i]['IS_LOCK']==0){
                $result[$i]['is_lock'] = "否";
            }else{
                $result[$i]['is_lock'] = "是";
            }
            if((int)$user_result[$i]['IS_ADD_DATA']==0){
                $result[$i]['is_add_data'] = "否";
            }else{
                $result[$i]['is_add_data'] = "是";
            }
        }
//        dump($result);
        oci_free_statement($result_rows);
        oci_close($conn);
        if ($result) {
            exit(json_encode($result));
        } else {
            exit(json_encode(''));
        }
    }

    public function postAddUser(){
        $user_account = I('post.user_account');
        $user_pass = I('post.user_pass');
        $user_type = I('post.user_type');
        $user_name = I('post.user_name');
        $user_organ_code = I('post.user_organ_code');
        $user_organ_name = I('post.user_organ_name');
        $user_sex = I('post.user_sex');
        $user_company = I('post.user_company');
        $buss_area = I('post.buss_area');

        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $user_add  = "INSERT INTO TMP_DAYPOST_USER(ACCOUNT,PASS,TYPE,USER_NAME,USER_ORGAN_CODE,USER_ORGAN_NAME,USER_SEX,USER_COMPANY,BUSS_AREA) VALUES('".$user_account."','".$user_pass."','".$user_type."','".$user_name."','".$user_organ_code."','".$user_organ_name."','".$user_sex."','".$user_company."','".$buss_area."')";
        $result_rows = oci_parse($conn, $user_add); // 配置SQL语句，执行SQL
        if (oci_execute($result_rows, OCI_COMMIT_ON_SUCCESS)) {
            $result['status'] = "success";
            $result['message'] = "用户新建成功！";
        } else {
            $result['status'] = "failed";
            $result['message'] = "用户新建失败！";
        }
        oci_free_statement($result_rows);
        oci_close($conn);
        exit(json_encode($result));
    }

    public function postModifyUser(){
//        $user_account = I('post.user_account');
//        $user_type = I('post.user_type');
//        $user_name = I('post.user_name');
//        $user_organ_code = I('post.user_organ_code');
//        $user_organ_name = I('post.user_organ_name');
//        $user_sex = I('post.user_sex');
//        $buss_area = I('post.buss_area');
//        $is_lock = I('post.is_lock');
//        $is_add_data = I('post.is_add_data');
//        $user_company = I('post.user_company');

        $user_account = "gaobiao_bx";
        $user_type = "1";
        $user_name = "高彪";
        $user_organ_code = "86";
        $user_organ_name = "总公司";
        $user_sex = "男";
        $buss_area = "技术支持";
        $is_lock = 0;
        $is_add_data = 1;
        $user_company = "总公司PMO";

        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $user_modify  = "UPDATE TMP_DAYPOST_USER SET TYPE = '".$user_type."' , USER_NAME = '".$user_name."' , USER_ORGAN_CODE = '".$user_organ_code."' , USER_ORGAN_NAME = '".$user_organ_name."' , USER_SEX = '".$user_sex."' , BUSS_AREA = '".$buss_area."' , IS_LOCK = '".$is_lock."' , IS_ADD_DATA = '".$is_add_data."' , USER_COMPANY = '".$user_company."'WHERE ACCOUNT = '".$user_account."'";
        $result_rows = oci_parse($conn, $user_modify); // 配置SQL语句，执行SQL
//        dump($user_modify);
        if (oci_execute($result_rows, OCI_COMMIT_ON_SUCCESS)) {
            $result['status'] = "success";
            $result['message'] = "用户更新成功！";
        } else {
            $result['status'] = "failed";
            $result['message'] = "用户更新失败！";
        }
        oci_free_statement($result_rows);
        oci_close($conn);
        exit(json_encode($result));
    }
}