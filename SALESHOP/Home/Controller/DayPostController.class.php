<?php
/**
 * Created by PhpStorm.
 * User: gaobiao
 * Date: 2018/10/25
 * Time: 14:09
 */

namespace Home\Controller;
use Think\Controller;
use Think\Log;


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

    public function dayPostUwThis()
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

    public function dayPostCsThis()
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

    public function dayPostClmThis()
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

    public function dayPostNbAll()
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

    public function dayPostUwAll()
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

    public function dayPostCsAll()
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

    public function dayPostClmAll()
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

    public function getTcCondition(){
        Log::write("TC数据更新开始 ：".date("h:i:sa")."<br> ");
        $queryTc = "select  cfvt.value3 as sys,
                            COUNT(bt.bug_new_id) as bug_sum,
                            count(case  when bt.`status` in ('8','11') then 1 else null end) as bug_close_sum,
                            count(case  when bt.`status` not in ('8','11') then 1 else null end) as bug_no_close_sum,
                            count(case  when bt.date_submitted = NOW() then 1 else null end) as bug_this_sum,
                            count(case  when bt.date_submitted = NOW() and bt.`status` in ('8','11') then 1 else null end) as bug_this_close_sum
                    from bug_table bt,custom_field_value_table cfvt,`user_table` ut,tx_pklistmemo tp   
                    where ut.id = bt.reporter_id 
                        and bt.id = cfvt.bug_id 
                        and tp.plname = 'bug_table_status' 
                        and tp.tx_value = bt.status
                    GROUP BY cfvt.value3";
        //查询TC数据
        $method = new MethodController();
        $bugSys = $method->getBugSys();
        $bugSysName = $method->getBugSysName();
        for($i=0;$i<sizeof($bugSys);$i++){
            $result[] = array("sys" => $bugSysName[$i],"bug_sum" => 0,"bug_close_sum" => 0,"bug_no_close_sum" => 0,"bug_this_sum" => 0,"bug_this_close_sum" => 0,);
        }
        $tc_cursor = M();
        $res = $tc_cursor->query($queryTc);
        $bug_sum = 0;
        $bug_close_sum = 0;
        $bug_no_close_sum = 0;
        $bug_this_sum = 0;
        $bug_this_close_sum = 0;
        for($i=0;$i<sizeof($res);$i++){
            $result[$bugSys[$res[$i]['sys']]]['sys'] = $res[$i]['sys'];
            $result[$bugSys[$res[$i]['sys']]]['bug_sum'] = $res[$i]['bug_sum'];
            $bug_sum += $res[$i]['bug_sum'];
            $result[$bugSys[$res[$i]['sys']]]['bug_close_sum'] = $res[$i]['bug_close_sum'];
            $bug_close_sum += $res[$i]['bug_close_sum'];
            $result[$bugSys[$res[$i]['sys']]]['bug_no_close_sum'] = $res[$i]['bug_no_close_sum'];
            $bug_no_close_sum += $res[$i]['bug_no_close_sum'];
            $result[$bugSys[$res[$i]['sys']]]['bug_this_sum'] = $res[$i]['bug_this_sum'];
            $bug_this_sum += $res[$i]['bug_this_sum'];
            $result[$bugSys[$res[$i]['sys']]]['bug_this_close_sum'] = $res[$i]['bug_this_close_sum'];
            $bug_this_close_sum += $res[$i]['bug_this_close_sum'];
        }
        $result[$bugSys["合计"]]['bug_sum'] = $bug_sum;
        $result[$bugSys["合计"]]['bug_close_sum'] = $bug_close_sum;
        $result[$bugSys["合计"]]['bug_no_close_sum'] = $bug_no_close_sum;
        $result[$bugSys["合计"]]['bug_this_sum'] = $bug_this_sum;
        $result[$bugSys["合计"]]['bug_this_close_sum'] = $bug_this_close_sum;
        Log::write("TC数据更新结束 ：".date("h:i:sa")."<br> ");
//        dump($result);
        if ($result) {
            exit(json_encode($result));
        } else {
            exit(json_encode(''));
        }
    }



}