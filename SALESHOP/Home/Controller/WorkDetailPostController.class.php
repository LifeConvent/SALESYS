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
        if ($result) {
            $method->assignPublic($username,$this);
            if(!$method->getSystype($username)){
                $this->redirect('Index/errorSys');
            }
            $this->display();
        } else {
            $this->redirect('Index/index');
        }
    }
}