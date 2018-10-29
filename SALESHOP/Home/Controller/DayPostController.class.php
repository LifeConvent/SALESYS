<?php
/**
 * Created by PhpStorm.
 * User: gaobiao
 * Date: 2018/10/25
 * Time: 14:09
 */

namespace Home\Controller;
use Think\Controller;


class DayPostController extends Controller
{
    public function dataPostTable()
    {
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);

        if ($result) {
            $time = time() - 60 * 60 * 24;
            $t_s = date("Y-m-d", $time);
            $time = time() - 60 * 60 * 24 * 6;
            $t_e = date("Y-m-d", $time);
            $this->assign('username', $username);
            $this->assign('TITLE', TITLE);
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

}