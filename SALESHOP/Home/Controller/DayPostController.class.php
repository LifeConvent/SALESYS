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
            $this->assign('username', $username);
            $this->assign('TITLE', TITLE);
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }

    public function dayPost()
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

}