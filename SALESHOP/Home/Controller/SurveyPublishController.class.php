<?php
/**
 * Created by PhpStorm.
 * User: lawrance
 * Date: 2016/12/3
 * Time: 上午10:57
 */

namespace Home\Controller;

use Think\Controller;
use Think\Think;

class SurveyPublishController extends Controller
{
    public function surPubBef()
    {
        $open_id = I('get.oi');
        if ($open_id == null || $open_id == '') {
            return;
        }
        $survey = $this->searchSurvey($open_id);
        if (!$survey) {
            $show = new ShowController();
            $user = M('user');
            $conditi['openid'] = $open_id;
            $name = $user->field('stu_name')
                ->where($conditi)
                ->select();
            $show->assign('stu_name', htmlspecialchars($name[0]['stu_name']));
            $show->display('Show/show');
            return;
        }
        $this->assign('SList', htmlspecialchars(json_encode($survey)));
        $this->assign('TITLE', TITLE);
        $this->display();
    }

    public function searchSurvey($openid = null)
    {
        $survey_plan = M();
        $condition['openid'] = "$openid";
        $condition['is_finish'] = '0';
        $result = $survey_plan->table('tb_survey_plan')->field('s.survey_id,s.name,p.stu_num,p.openid,p.is_finish')->where($condition)->query('SELECT %FIELD% FROM %TABLE% AS p,tb_survey AS s %WHERE% AND p.survey_id=s.survey_id', true);
        if ($result) {
            return $result;
        } else {
            return '';
        }
    }

    public function surveyPublish()
    {
        $survey_id = I('get.si');
        $open_id = I('get.oi');
        $show = new ShowController();

        if ($survey_id == null || $open_id == null) {
            $show->assign('title', '错误提示');
            $show->assign('head', '用户不具有回答此问卷的权限');
            $show->assign('body', '请按照正常流程从微信端获取问卷');
            $show->display('Show/showError');
            return;
        }

        //查询问卷是否完成
        $condi['survey_id'] = $survey_id;
        $condi['openid'] = $open_id;
        $sur_plan = M('survey_plan');
        $sur_res = $sur_plan->field('is_finish')->where($condi)->select();
        if (!$sur_res) {
            $show->assign('title', '错误提示');
            $show->assign('head', '用户不具有回答此问卷的权限');
            $show->assign('body', '请按照正常流程从微信端获取问卷');
            $show->display('Show/showError');
            return;
        } else if ($sur_res[0]['is_finish'] == '1') {
            $user = M('user');
            $conditi['openid'] = $open_id;
            $name = $user->field('stu_name')
                ->where($conditi)
                ->select();
            $show->assign('stu_name', htmlspecialchars($name[0]['stu_name']));
            $show->display('Show/show');
            return;
        }

        $condition['survey_id'] = $survey_id;
        $survey = M();
        $res = $survey->field('name,description,question,count')
            ->where($condition)
            ->query(' SELECT %FIELD% FROM tb_survey %WHERE% ', true);

        $count = (int)$res[0]['count'];
        $question = $res[0]['question'];
        $name = $res[0]['name'];
        $description = $res[0]['description'];
        $surveyList['count'] = $count;
        $surveyList['name'] = $name;
        $surveyList['description'] = $description;
        $surveyList['survey_id'] = $survey_id;

        $list = explode(",", $question);
        $tb = M('survey_question');
        for ($i = 0; $i < sizeof($list); $i++) {
            $condition = array();
            $condition['question_id'] = $list[$i];
            $question = $tb->field('name,before_des,after_des,type,hint,question_id,sort,is_must,content')
                ->where($condition)
                ->select();
            $questionList[$i] = $question[0];
        }
        $this->assign('QList', htmlspecialchars(json_encode($questionList)));
        $this->assign('SList', htmlspecialchars(json_encode($surveyList)));
        $this->assign('openid', htmlspecialchars($open_id));
        $this->display();
    }

    public function surveyAnswer()
    {
        $temp = $_POST['ans'];
        $ans = I('post.ans');
        $openid = I('post.openid');
//        $id = I('post.id');
        $id = $_POST['id'];
        if (md5($temp . KEY) != strtolower($id)) {
            $result['status'] = 'failed';
            $result['message'] = '非法提交！数据已被第三方修改！' . $temp . '-------\n' . $id . '---' . md5($temp . KEY);
            exit(json_encode($result));
        }
        $ans = htmlspecialchars_decode($ans);
        $s_a = json_decode($ans);
        $errorinfo = json_last_error();
        $survey_id = $s_a[0]->survey_id;
        $obj = new \stdClass();

        for ($i = 1; $i < sizeof($s_a); $i++) {
            $obj = $s_a[$i];
            $temp = array();
            $temp['question_id'] = $obj->question_id;
            $temp['content'] = $obj->question_ans;
            $temp['type'] = $obj->type;
            $temp['survey_id'] = $survey_id;
            $temp['openid'] = $openid;
            $condtion[] = $temp;
        }
        $survey_ans = M('survey_answer');
        $res = $survey_ans->addAll($condtion);
        if ($res) {
            $condi['survey_id'] = $survey_id;
            $condi['openid'] = $openid;
            $other['is_finish'] = '1';
            $survey_plan = M('survey_plan');
            $res = $survey_plan->where($condi)->save($other);
            if ($res)
                $result['status'] = 'success';
        } else {
            $result['status'] = 'failed';
            $result['message'] = $survey_id . '-----' . $ans;
        }
        exit(json_encode($result));

    }

}