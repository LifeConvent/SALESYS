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
}