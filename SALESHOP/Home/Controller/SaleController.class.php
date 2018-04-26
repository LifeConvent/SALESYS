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

    public function sale(){
        $this->assign('TITLE', TITLE);
        $this->display();
    }

}