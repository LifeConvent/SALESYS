<?php
/**
 * Created by PhpStorm.
 * User: lawrance
 * Date: 2018/4/24
 * Time: 下午6:36
 */

namespace Home\Controller;

use Think\Controller;

class SaleController extends Controller
{

    public function sale()
    {
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        if ($result) {
            //拼凑显示下拉列表登记
            $proType = M('pro_type');
            $select = $proType->where('TYPE_LEVEL = \'1\'')->select();
            $content = '';
            $content_in = '';
            for ($i = 0; $i < sizeof($select); $i++) {
                $content .= '<li><a style="text-align: center" onclick="choice_select_level_one(\'' . $select[$i]['type_id'] . '_' . $select[$i]['type_name'] . '\')">' . $select[$i]['type_name'] . '</a></li>';
                $content_in .= '<li><a style="text-align: center" onclick="choice_select_level_one_in(\'' . $select[$i]['type_id'] . '_' . $select[$i]['type_name'] . '\')">' . $select[$i]['type_name'] . '</a></li>';
            }
            $this->assign('username', $username);
            $this->assign('pro_select_one', $content);
            $this->assign('in_pro_select_one', $content_in);
            $this->assign('TITLE', TITLE);
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function addNewProType()
    {
        $method = new MethodController();
        $method->getUserID($user_id);
        $super_type = I('post.super_type');
        $type_level = I('post.type_level');
        $type_name = I('post.type_name');
        $shelf_code = I('post.shelf_code');
        $hint = I('post.hint');
        $pro_type = M('pro_type');
        $condition['SUPER_TYPE'] = "$super_type";
        $condition['TYPE_LEVEL'] = "$type_level";
        $condition['TYPE_NAME'] = "$type_name";
        $condition['INSERT_BY'] = $user_id;
        $condition['UPDATE_BY'] = $user_id;
        if ($shelf_code != null && $shelf_code != "") {
            $condition['SHELF_CODE'] = $shelf_code;
        }
        if ($hint != null && $hint != "") {
            $condition['HINT'] = $hint;
        }
        $res = $pro_type->add($condition);
        if ($res) {
            //插入成功判断待确定
            $result['status'] = 'success';
        } else {
            $result['status'] = 'failed';
        }
        exit(json_encode($result));
    }

    public function getLevelTwo()
    {
        $super_type = I('post.super');
        $level = I('post.level');
        $status = I('post.status');
        if ($super_type == "" || $super_type == null) {
            $result['status'] = 'failed';
            $result['message'] = '后台暂时无法获取二级类型数据!';
            exit(json_encode($result));
        }
        //拼凑显示下拉列表登记
        $proType = M('pro_type');
        //需要查询上级ID
        $sign = '';
        if ($status == 'in') {
            $content = '<ul role="menu" id="in_level_two_list_show" class="dropdown-menu col-sm-11" style="margin-left: 12pt">';
        } else if ($status == 'in_three') {
            $content =  '<ul role="menu" id="in_level_three_list_show" class="dropdown-menu col-sm-11" style="margin-left: 12pt">';
        } else {
            $content = '<ul role="menu" id="level_two_list_show" class="dropdown-menu col-sm-11" style="margin-left: 12pt">';
        }
        if ($level == '3' && $status == 'in_three') {
            $select = $proType->where('TYPE_LEVEL = \'3\' AND SUPER_TYPE = ' . $super_type)->select();
            for ($i = 0; $i < sizeof($select); $i++) {
                $content .= '<li><a style="text-align: center" onclick="choice_select_level_three_in(\'' . $select[$i]['type_id'] . '_' . $select[$i]['type_name'] . '\')">' . $select[$i]['type_name'] . '</a></li>';
                $sign .= '1';
            }
        } else {
            $select = $proType->where('TYPE_LEVEL = \'2\' AND SUPER_TYPE = ' . $super_type)->select();
            for ($i = 0; $i < sizeof($select); $i++) {
                if ($status == 'in')
                    $content .= '<li><a style="text-align: center" onclick="choice_select_level_two_in(\'' . $select[$i]['type_id'] . '_' . $select[$i]['type_name'] . '\')">' . $select[$i]['type_name'] . '</a></li>';
                else
                    $content .= '<li><a style="text-align: center" onclick="choice_select_level_two(\'' . $select[$i]['type_id'] . '_' . $select[$i]['type_name'] . '\')">' . $select[$i]['type_name'] . '</a></li>';
                $sign .= '1';
            }
        }
        $content .= '</ul>';
        if ($sign != "") {
            //插入成功判断待确定
            $result['status'] = 'success';
            $result['data'] = $content;
        } else {
            $result['status'] = 'failed';
            $result['message'] = '该商品类型下不具有子类型!';
            $result['level'] = $level;
        }
        exit(json_encode($result));
    }

    public function submitProductInfo(){
        $date_in= I('post.date_in');//进货日期
        $date_sale_start = I('post.date_sale_start');//开始销售日期
        $type_id = I('post.type_id');//商品类型ID
        $pro_name = I('post.pro_name');//商品名称
        $pro_code = I('post.pro_code');//商品条形码
        $pro_sum = I('post.pro_sum');//进货商品数量
        $pro_price = I('post.pro_price');//商品售价
        $pro_sale_sum = I('post.pro_sale_sum');//批次商品总价
        //非必填
        $pro_shelf_code = I('post.pro_shelf_code');//商品货架编码
        $shelf_in_num = I('post.shelf_in_num');//货架补货数量
        $can_dis = I('post.can_dis');//可折扣金额
        $pro_hint = I('post.pro_hint');//备注
        //获取当前操作用户
        $method = new MethodController();
        $method->getUserID($user_id);

    }

    public function test()
    {
        $super_type = I('post.super');
        $proType = M('pro_type');
        $select = $proType->where('TYPE_LEVEL = \'1\'')->select();
        $content = '<option value="-1">|---- 无</option>';
        for ($i = 0; $i < sizeof($select); $i++) {
            $content .= '<option value="' . $select[$i]['TYPE_ID'] . '">' . '|----' . $select[$i]['TYPE_NAME'] . '</option>';
        }
        dump($select);
        dump($content);
    }
}