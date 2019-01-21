<?php
/**
 * Created by PhpStorm.
 * User: gaobiao
 * Date: 2019/1/18
 * Time: 15:12
 */

namespace Home\Controller;
use Think\Controller;
use Think\Log;

class WorkDetailPostController extends Controller
{
    public function workDetail()
    {
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        $type =  $method->getUserTypeBySql($username);
        $can =  $method->getCanDayPostBySql($username);
        if ($result) {
            $this->assign('username', $username);
            $this->assign('user_name', $username);
            $this->assign('user_type', $type);
            $this->assign('user_day_post', $can);
            $this->assign('TITLE', TITLE);
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }
}