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

class SysNoticeController extends Controller
{
    public function noticeManage()
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

    public function getNotice(){
        $user_name = I('post.user_name');
        $method = new MethodController();
        $conn = $method->OracleOldDBCon();
        $notice_select = "SELECT DISTINCT C.NOTICE_ID,C.NOTICE,C.TIMES,D.USER_ACCOUNT,D.NOTICE_TIMES FROM (SELECT * FROM TMP_DAYPOST_USER A,SYS_NOTICE_RECORD B) C
                             LEFT JOIN USER_NOTICE_RECORD D ON C.ACCOUNT = D.USER_ACCOUNT AND C.NOTICE_ID = D.NOTICE_ID
                                   WHERE (C.ACCOUNT = '".$user_name."' AND D.NOTICE_TIMES < C.TIMES) OR 
                                   (C.ACCOUNT = '".$user_name."' AND D.USER_ACCOUNT IS NULL) ";
        Log::write('查询'.$user_name.'用户通知SQL：' . $notice_select . "<br>", 'INFO');
        $result_rows = oci_parse($conn, $notice_select); // 配置SQL语句，执行SQL
        $notice = $method->search_long($result_rows);
        $result['message'] = null;
        if (!empty($notice[0]['NOTICE_ID'])) {
            $result['status'] = "success";
            for ($i = 0; $i < sizeof($notice); $i++) {
                $result['message'][$i] = $notice[$i]['NOTICE'];
                $return[$i]['id'] = $notice[$i]['NOTICE_ID'];
                //之前没通知过
                if(empty($notice[$i]['USER_ACCOUNT'])||strcmp($notice[$i]['USER_ACCOUNT'],$user_name)){
                    //新增用户通知记录
                    $insert = "INSERT INTO USER_NOTICE_RECORD(NOTICE_ID,USER_ACCOUNT,NOTICE_TIMES) VALUES(".$notice[$i]['NOTICE_ID'].",'".$user_name."',1)";
                    Log::write('新增'.$user_name.'用户通知'.$notice[$i]['NOTICE_ID'].'SQL：' . $insert . "<br>", 'INFO');
                    $result_rows = oci_parse($conn, $insert); // 配置SQL语句，执行SQL
                    oci_execute($result_rows, OCI_COMMIT_ON_SUCCESS);
                }else{
                    //更新用户通知次数
                    $times = (int)$notice[$i]['NOTICE_TIMES']+1;
                    $update = "UPDATE USER_NOTICE_RECORD SET NOTICE_TIMES = ".$times ."WHERE NOTICE_ID = '".$notice[$i]['NOTICE_ID']."' AND USER_ACCOUNT = '".$user_name."'";
                    Log::write('更新'.$user_name.'用户通知'.$notice[$i]['NOTICE_ID'].'SQL：' . $update . "<br>", 'INFO');
                    $result_rows = oci_parse($conn, $update); // 配置SQL语句，执行SQL
                    oci_execute($result_rows, OCI_COMMIT_ON_SUCCESS);
                }
            }
        } else {
            $result['status'] = "failed";
        }
        oci_free_statement($result_rows);
        oci_close($conn);
        exit(json_encode($result));
    }

}