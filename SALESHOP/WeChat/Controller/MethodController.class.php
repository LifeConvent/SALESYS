<?php
/**
 * Created by PhpStorm.
 * User: lawrance
 * Date: 2016/11/24
 * Time: 下午1:32
 */

namespace WeChat\Controller;

use Think\Controller;

class MethodController extends Controller
{

    /**
     * 简单对称加密算法之加密
     * @param String $string 需要加密的字串
     * @param String $skey 加密EKY
     * @return String
     */
    public function encode($string = '', $skey = 'SALESYStem-^@%$*#&^!(*')
    {
        $strArr = str_split(base64_encode($string));
        $strCount = count($strArr);
        foreach (str_split($skey) as $key => $value)
            $key < $strCount && $strArr[$key] .= $value;
        return str_replace(array('=', '+', '/'), array('O0O0O', 'o000o', 'oo00o'), join('', $strArr));
    }

    /**
     * 简单对称加密算法之解密
     * @param String $string 需要解密的字串
     * @param String $skey 解密KEY
     * @return String
     */
    public function decode($string = '', $skey = 'SALESYStem-^@%$*#&^!(*')
    {
        $strArr = str_split(str_replace(array('O0O0O', 'o000o', 'oo00o'), array('=', '+', '/'), $string), 2);
        $strCount = count($strArr);
        foreach (str_split($skey) as $key => $value)
            $key <= $strCount && isset($strArr[$key]) && $strArr[$key][1] === $value && $strArr[$key] = $strArr[$key][0];
        return base64_decode(join('', $strArr));
    }

    public function checkIn(&$admin)
    {
        $token = $_SESSION['token'];
        $token = $this->decode($token);
        $info = explode('-', $token);
        if ($info[2] == 'success') {
            $admin = $info[0];
            if ($info[1] - time() <= 7) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function back()
    {
        $_SESSION['token'] = '';
        $this->redirect('Index/index');
    }

    public function getSysResponse()
    {
        $sysResponse = M('auto_response');
        $result = $sysResponse->select();
        exit(json_encode($result));
    }

    public function searchUserInput()
    {
        $user_input = I('get.u_i');
        $sysResponse = M();
        $result = $sysResponse->where('user_input LIKE \'' . $user_input . '%\'')
            ->table('tb_auto_response')
            ->query('SELECT * FROM %TABLE% %WHERE%', true);
        if ($result) {
            exit(json_encode($result));
        } else {
            exit('');
        }
    }

    public function deleteRes()
    {
        $id = I('post.id');
        $condition['id'] = "$id";
        $sysResponse = M('auto_response');
        $res = $sysResponse->where($condition)->delete();
        if ($res) {
            $result['status'] = 'success';
            $result['message'] = '删除成功！';
        } else {
            $result['status'] = 'failed';
            $result['message'] = '删除失败！';
        }
        exit(json_encode($result));
    }

    public function modifyRes()
    {
        $id = I('post.id');
        $user_input = I('post.user_input');
        $sys_response = I('post.sys_response');
        $sys_response_type = I('post.sys_response_type');
        $temp['id'] = "$id";
        $condition['user_input'] = "$user_input";
        $condition['sys_response'] = "$sys_response";
        $condition['sys_response_type'] = "$sys_response_type";
        $sysResponse = M('auto_response');
        $res = $sysResponse->where($temp)->save($condition);
        if ($res) {
            $result['status'] = 'success';
            $result['message'] = '修改成功！';
        } else {
            $result['status'] = 'failed';
            $result['message'] = '修改失败！';
        }
        exit(json_encode($result));
    }

    public function getSurvey()
    {
        $survey = M('survey');
        $result = $survey->field('g.group_name,name,survey_id,level,owner')
            ->table('tb_survey_group')
            ->where('g.group_id=s.survey_group')
            ->query("SELECT %FIELD% FROM tb_survey AS s, %TABLE% AS g %WHERE% ", true);
        for ($i = 0; $i < sizeof($result); $i++) {
            switch ($result[$i]['level']) {
                case '1':
                    $result[$i]['level'] = '系级';
                    break;
                case '2':
                    $result[$i]['level'] = '院级';
                    break;
                case '3':
                    $result[$i]['level'] = '校级';
                    break;
            }
        }
        if ($result) {
            exit(json_encode($result));
        } else {
            exit(json_encode(''));
        }
    }

    public function getSurveyDemo()
    {
        $survey = M('survey');
        $result = $survey->field('g.group_name,name,survey_id,level,owner')
            ->table('tb_survey_group')
            ->where('g.group_id=s.survey_group AND is_demo=1')
            ->query("SELECT %FIELD% FROM tb_survey AS s, %TABLE% AS g %WHERE% ", true);
        for ($i = 0; $i < sizeof($result); $i++) {
            switch ($result[$i]['level']) {
                case '1':
                    $result[$i]['level'] = '系级';
                    break;
                case '2':
                    $result[$i]['level'] = '院级';
                    break;
                case '3':
                    $result[$i]['level'] = '校级';
                    break;
            }
        }
        if ($result) {
            exit(json_encode($result));
        } else {
            exit(json_encode(''));
        }
    }

    public function searchSurvey()
    {
        $name = I('get.name');
        $survey = M();
        //模糊查询
        $result = $survey->field('g.group_name,name,level,owner')
            ->where("name LIKE '" . $name . "%' AND g.group_id=s.survey_group")
            ->table('tb_survey')
            ->query("SELECT %FIELD% FROM %TABLE% AS s,tb_survey_group AS g %WHERE%", true);
        if ($result) {
            for ($i = 0; $i < sizeof($result); $i++) {
                switch ($result[$i]['level']) {
                    case '1':
                        $result[$i]['level'] = '系级';
                        break;
                    case '2':
                        $result[$i]['level'] = '院级';
                        break;
                    case '3':
                        $result[$i]['level'] = '校级';
                        break;
                }
            }
            exit(json_encode($result));
        } else {
            exit(json_encode(''));
        }
    }

//    Excel导出函数
    public function exportExcel($expTitle, $expCellName, $expTableData, $expName)
    {
        $xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
        $username = '';
        $method = new MethodController();
        $result = $method->checkIn($username);
        $fileName = $username . date('_YmdHis');//文件输出的文件名
        $cellNum = count($expCellName);
        $dataNum = count($expTableData);

        vendor("PHPExcel.PHPExcel");
//        $objPHPExcel = new PHPExcel();//ThinkPHP3.1的写法

        $objPHPExcel = new \PHPExcel();//ThinkPHP3.2的写法，有命名空间的概念
        $cellName = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ');
        $objPHPExcel->getActiveSheet(0)->setTitle(iconv('utf-8', 'utf-8', $expName));
        $objPHPExcel->getActiveSheet(0)->mergeCells('A1:' . $cellName[$cellNum - 1] . '1');//合并单元格
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $expTitle . '  导出时间:' . date('Y-m-d H:i:s'));
        for ($i = 0; $i < $cellNum; $i++) {
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i] . '2', $expCellName[$i][1]);
        }
        // Miscellaneous glyphs, UTF-8
        for ($i = 0; $i < $dataNum; $i++) {
            for ($j = 0; $j < $cellNum; $j++) {
                $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j] . ($i + 3), $expTableData[$i][$expCellName[$j][0]]);
            }
        }


        header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="' . $xlsTitle . ' . xls"');
        header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
//        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');//ThinkPHP3.1的写法

        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');//ThinkPHP3.2的写法，有命名空间的概念
        $objWriter->save('php://output');
        exit;
    }

    //导出用户表
    public function expUser()
    {//导出Excel
        $xlsName = "用户信息";
        $xlsTitle = "User";
        $xlsCell = array( //设置字段名和列名的映射
            array('stu_name', '姓名'),
            array('stu_num', '学号'),
            array('stu_sex', '性别'),
            array('stu_pro', '专业'),
            array('stu_graclass', '年级'),
            array('stu_class', '班级'),
            array('is_base', '是否在校'),
            array('is_onset', '是否在读'),
            array('stu_type', '学生类型'),
            array('stu_phone', '手机号'),
            array('stu_qq', 'QQ'),
            array('is_match', '是否匹配')
        );
        $xlsModel = M('user');

        $xlsData = $xlsModel->field('stu_name,stu_num,stu_sex,stu_pro,stu_graclass,stu_class,is_base,is_onset,stu_type,stu_phone,stu_qq,is_match')->select();
        $pro = '';
        //替换字段
        foreach ($xlsData as $k => $v) {
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
            $xlsData[$k]['stu_pro'] = $v['stu_pro'] = $pro;

            $is_base = '';
            switch ($v['is_base']) {
                case '1':
                    $is_base = '在校';
                    break;
                case '0':
                    $is_base = '不在校';
                    break;
            }
            $xlsData[$k]['is_base'] = $v['is_base'] = $is_base;

            $is_onset = '';
            switch ($v['is_onset']) {
                case '1':
                    $is_onset = '在读';
                    break;
                case '0':
                    $is_onset = '不在读';
                    break;
            }
            $xlsData[$k]['is_onset'] = $v['is_onset'] = $is_onset;

            $type = '';
            switch ($v['stu_type']) {
                case '1':
                    $type = '本科生';
                    break;
                case '2':
                    $type = '研究生';
                    break;
                case '3':
                    $type = '博士生';
                    break;
            }
            $xlsData[$k]['stu_type'] = $v['stu_type'] = $type;
        }
        $this->exportExcel($xlsTitle, $xlsCell, $xlsData, $xlsName);

    }

    function array2object($array)
    {
        if (is_array($array)) {
            $obj = new StdClass();
            foreach ($array as $key => $val) {
                $obj->$key = $val;
            }
        } else {
            $obj = $array;
        }
        return $obj;
    }

    function object2array($object)
    {
        if (is_object($object)) {
            foreach ($object as $key => $value) {
                $array[$key] = $value;
            }
        } else {
            $array = $object;
        }
        return $array;
    }

    //导出用户表
    public function expSurveyCondition()
    {//导出Excel
        $method = new MethodController();
        $res = $method->checkIn($username);
        if ($res) {
            $data = I('get.content');
            $data = htmlspecialchars_decode($data);
            $xlsData = json_decode($data);
            $last = json_last_error();
            foreach ($xlsData as $k => $v) {
                $xlsData[$k] = $this->object2array($v);
                $user = M('user');
                $condition['stu_num'] = $xlsData[$k]['stu_num'];
                $student = $user->where($condition)->select();
                $xlsData[$k]['stu_name'] = $student[0]['stu_name'];
                $xlsData[$k]['stu_sex'] = $student[0]['stu_sex'];
                $xlsData[$k]['stu_graclass'] = $student[0]['stu_graclass'];
                $xlsData[$k]['stu_pro'] = $student[0]['stu_pro'];
                switch ($xlsData[$k]['stu_pro']) {
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
                $xlsData[$k]['stu_pro'] = $pro;
                $xlsData[$k]['stu_class'] = $student[0]['stu_class'];
            }
            $xlsName = "问卷完成情况";
            $xlsTitle = '问卷完成情况统计';
            $xlsCell = array( //设置字段名和列名的映射
                array('stu_name', '姓名'),
                array('stu_num', '学号'),
                array('stu_sex', '性别'),
                array('stu_pro', '专业'),
                array('stu_graclass', '年级'),
                array('stu_class', '班级'),
                array('is_match', '微信是否匹配'),
                array('is_finish', '是否完成问卷'),
                array('survey_id', '问卷ID'),
                array('name', '问卷名称'),
            );
            $this->exportExcel($xlsTitle, $xlsCell, $xlsData, $xlsName);
        }
    }

    /**
     * 导入excel文件
     * @param  string $file excel文件路径
     * @return array        excel文件内容数组
     */
    public function import_excel($file)
    {
        // 判断文件是什么格式
        $type = pathinfo($file);
        $type = strtolower($type["extension"]);
        $type = $type === 'csv' ? $type : 'Excel5';
        ini_set('max_execution_time', '0');
        Vendor('PHPExcel.PHPExcel');
        // 判断使用哪种格式
        $objReader = \PHPExcel_IOFactory::createReader($type);
        $objPHPExcel = $objReader->load($file);
        $sheet = $objPHPExcel->getSheet(0);
        // 取得总行数
        $highestRow = $sheet->getHighestRow();
        // 取得总列数
        $highestColumn = $sheet->getHighestColumn();
        //循环读取excel文件,读取一条,插入一条
        $data = array();
        //从第一行开始读取数据
        for ($j = 1; $j <= $highestRow; $j++) {
            //从A列读取数据
            for ($k = 'A'; $k <= $highestColumn; $k++) {
                // 读取单元格
                $data[$j][] = $objPHPExcel->getActiveSheet()->getCell("$k$j")->getValue();
            }
            //读取完美一行数据即可进行该行数据的插入
        }
        return $data;
    }

    public function importExecl($file)
    {
        if (!file_exists($file)) {
            return array("error" => 0, 'message' => 'file not found!');
        }
        Vendor("PHPExcel.PHPExcel.IOFactory");
        Vendor("PHPExcel.PHPExcel");
        $objReader = \PHPExcel_IOFactory::createReader('Excel5');
        try {
            $PHPReader = $objReader->load($file);
        } catch (\Exception $e) {
        }
        if (!isset($PHPReader)) return array("error" => 0, 'message' => 'read error!');
        $allWorksheets = $PHPReader->getAllSheets();
        $i = 0;
        foreach ($allWorksheets as $objWorksheet) {
            $sheetname = $objWorksheet->getTitle();
            $allRow = $objWorksheet->getHighestRow();//how many rows
            $highestColumn = $objWorksheet->getHighestColumn();//how many columns
            $allColumn = \PHPExcel_Cell::columnIndexFromString($highestColumn);
            $array[$i]["Title"] = $sheetname;
            $array[$i]["Cols"] = $allColumn;
            $array[$i]["Rows"] = $allRow;
            $arr = array();
            $isMergeCell = array();
            foreach ($objWorksheet->getMergeCells() as $cells) {//merge cells
                foreach (\PHPExcel_Cell::extractAllCellReferencesInRange($cells) as $cellReference) {
                    $isMergeCell[$cellReference] = true;
                }
            }
            for ($currentRow = 1; $currentRow <= $allRow; $currentRow++) {
                $row = array();
                for ($currentColumn = 0; $currentColumn < $allColumn; $currentColumn++) {
                    ;
                    $cell = $objWorksheet->getCellByColumnAndRow($currentColumn, $currentRow);
                    $afCol = \PHPExcel_Cell::stringFromColumnIndex($currentColumn + 1);
                    $bfCol = \PHPExcel_Cell::stringFromColumnIndex($currentColumn - 1);
                    $col = \PHPExcel_Cell::stringFromColumnIndex($currentColumn);
                    $address = $col . $currentRow;
                    $value = $objWorksheet->getCell($address)->getValue();
                    if (substr($value, 0, 1) == '=') {
                        return array("error" => 0, 'message' => 'can not use the formula!');
                        exit;
                    }
                    if ($cell->getDataType() == \PHPExcel_Cell_DataType::TYPE_NUMERIC) {
                        $cellstyleformat = $cell->getParent()->getStyle($cell->getCoordinate())->getNumberFormat();
                        $formatcode = $cellstyleformat->getFormatCode();
                        if (preg_match('/^([$[A-Z]*-[0-9A-F]*])*[hmsdy]/i', $formatcode)) {
                            $value = gmdate("Y-m-d", \PHPExcel_Shared_Date::ExcelToPHP($value));
                        } else {
                            $value = \PHPExcel_Style_NumberFormat::toFormattedString($value, $formatcode);
                        }
                    }
                    if ($isMergeCell[$col . $currentRow] && $isMergeCell[$afCol . $currentRow] && !empty($value)) {
                        $temp = $value;
                    } elseif ($isMergeCell[$col . $currentRow] && $isMergeCell[$col . ($currentRow - 1)] && empty($value)) {
                        $value = $arr[$currentRow - 1][$currentColumn];
                    } elseif ($isMergeCell[$col . $currentRow] && $isMergeCell[$bfCol . $currentRow] && empty($value)) {
//                        $value = $temp;
                    }
                    $row[$currentColumn] = $value;
                }
                $arr[$currentRow] = $row;
            }
            $array[$i]["Content"] = $arr;
            $i++;
        }
        spl_autoload_register(array('Think', 'autoload'));//must, resolve ThinkPHP and PHPExcel conflicts
        unset($objWorksheet);
        unset($PHPReader);
        unset($PHPExcel);
        unlink($file);
        return array("error" => 1, "data" => $array);
    }

    //导入excel内容转换成数组
    public function import($filePath)
    {
        $this->__construct();
        Vendor("PHPExcel.PHPExcel");
        $PHPExcel = new \PHPExcel();
        /**默认用excel2007读取excel，若格式不对，则用之前的版本进行读取*/
        $PHPReader = new \PHPExcel_Reader_Excel2007();
        if (!$PHPReader->canRead($filePath)) {
            $PHPReader = new \PHPExcel_Reader_Excel5();
            if (!$PHPReader->canRead($filePath)) {
                echo 'no Excel';
                return;
            }
        }

        $PHPExcel = $PHPReader->load($filePath);
        $currentSheet = $PHPExcel->getSheet(0);  //读取excel文件中的第一个工作表
        $allColumn = $currentSheet->getHighestColumn(); //取得最大的列号
        $allRow = $currentSheet->getHighestRow(); //取得一共有多少行
        $erp_orders_id = array();  //声明数组

        /**从第二行开始输出，因为excel表中第一行为列名*/
        for ($currentRow = 1; $currentRow <= $allRow; $currentRow++) {

            /**从第A列开始输出*/
            for ($currentColumn = 'A'; $currentColumn <= $allColumn; $currentColumn++) {

                $val = $currentSheet->getCellByColumnAndRow(ord($currentColumn) - 65, $currentRow)->getValue();
                /**ord()将字符转为十进制数*/
                if ($val != '') {
                    $erp_orders_id[] = $val;
                }
                /**如果输出汉字有乱码，则需将输出内容用iconv函数进行编码转换，如下将gb2312编码转为utf-8编码输出*/
                //echo iconv('utf-8','gb2312', $val)."\t";
            }
        }
        return $erp_orders_id;
    }

    public function upload()
    {
        if (!empty($_FILES)) {
            $tempFile = $_FILES['file']['tmp_name'];
            $targetFile = "Public/uploads/" . $_FILES['file']['name'];
            if (move_uploaded_file($tempFile, $targetFile)) {
                //上传成功后直接输出新页面进行数据库导入
//                $this->redirect('DataManage/sysCourse');
//                ----------
            }
        }
    }

    //第一种方案
//    public function startUploads()
//    {
//        $match_relation = I('post.m_r');
//        $file_name = I('post.f_n');
//        $table_name = I('post.t_n');
//
////        $match_relation = 'tag_id-学号,tag_name-姓名';
////        $file_name = 'test.XLS';
////        $table_name = 'user_tag';
//        //解析匹配关系
//        $match_relation = explode(',', $match_relation);
//        $data = $this->import_excel('Public/uploads/' . $file_name);
////        dump($data);
//        $match = $field = $count = null;
//        foreach ($match_relation AS $key => $val) {
//            $match[$key] = explode('-', $val);
//        }
//        $num = 0;
//        foreach ($data[1] AS $key => $val) {
//            foreach ($match AS $k => $v) {
//                if ($v[1] == $val) {
//                    $data[1][$key] = $val[0];
//                    $field[$num] = $v[0];
//                    $count[$num++] = $key;
//                }
//            }
//        }
//        $table = M($table_name);
//
////        $result['status'] = 'success';
////        echo json_encode($result);
//        for ($j = 2; $j < sizeof($data); $j++) {
//            $condition = null;
//            for ($i = 0; $i < sizeof($field); $i++) {
//                $condition[$field[$i]] = $data[$j][$count[$i]];
//            }
//            $res = $table->where($condition)->select();
//            if (!$res) {
////                dump($condition);
//                $res = $table->add($condition);
//                if ($res) {
//                    $result['status'] = 'success';
//                } else {
//                    $result['status'] = 'failed';
//                    $result['message'] = $res;
//                }
//            }
//        }
//        if ($result['status'] == null) {
//            $result['status'] = 'failed';
//            $result['message'] = '无数据更新!';
//        }
//        exit(json_encode($result));
//    }

    //第二种方案.发过来数据(新增临时文件夹名称-时间戳)后断开连接,之后开始轮询请求查询取得文件中的数据解析,JOSN包含处理进度
    public function startUploads()
    {

//        $match_relation = 'tag_id-学号,tag_name-姓名';
//        $file_name = 'test.XLS';
//        $table_name = 'user_tag';
//        $time = 'user_tag';

        $time = I('post.time');
        $file_name = I('post.f_n');
        $table_name = I('post.t_n');
        $match_relation = I('post.m_r');

        $result['status'] = 'success';
        $result['percent'] = '0%';
        $this->write($time, json_encode($result));

        //解析匹配关系
        $match_relation = explode(',', $match_relation);
        $data = $this->import_excel('Public/uploads/' . $file_name);
//        dump($data);
        $match = $field = $count = null;
        foreach ($match_relation AS $key => $val) {
            $match[$key] = explode('-', $val);
        }
        $num = 0;
        foreach ($data[1] AS $key => $val) {
            foreach ($match AS $k => $v) {
                if ($v[1] == $val) {
                    $data[1][$key] = $val[0];
                    $field[$num] = $v[0];
                    $count[$num++] = $key;
                }
            }
        }
        $table = M($table_name);

//        $result['status'] = 'success';
//        echo json_encode($result);
        $result = null;
        for ($j = 2; $j < sizeof($data); $j++) {
            $condition = null;
            for ($i = 0; $i < sizeof($field); $i++) {
                $condition[$field[$i]] = $data[$j][$count[$i]];
            }
            $percent = (float)$j / (sizeof($data) - 1);
            $res = $table->where($condition)->select();
            if (!$res) {
//                dump($condition);
                $res = $table->add($condition);
                if ($res) {
                    $result['status'] = 'success';
                    $result['percent'] = ($percent * 100) . '%';
                } else {
                    $result['status'] = 'failed';
                    $result['message'] = $res;
                }
                $this->write($time, json_encode($result));
            }
        }
        if ($result == null) {
            $result['status'] = 'success';
            $result['message'] = '无数据更新!';
            $result['percent'] = '100%';
            $this->write($time, json_encode($result));
        }
        exit(json_encode($result));
    }

    public function deleteFile()
    {
        $time = I('post.time');
        $file_name = I('post.f_n');
        unlink("Public/file/" . $time . ".txt");
        unlink("Public/uploads/" . $file_name);
    }

    public function getFile()
    {
        $time = I('post.time');
        exit($this->read($time));
    }

    public function importTest()
    {
        $data = $this->import_excel('Public/uploads/13级成绩.xls');
        dump($data);
    }

    //获取数据库数据表结构
    public function getTableStruct()
    {
        $db = M();
        $res = $db->query($sql = 'show tables');
        $col = null;
        foreach ($res AS $key => $val) {
            $field = $val['tables_in_ces'];
            $field = substr($field, 3, strlen($field) - 3);
            $col[$key] = $field;
        }
        return $col;
    }

    //获取数据库数据表字段
    public function getTableFiled()
    {
        $field = I('post.table_name');
        $file_name = I('post.file_name');
        $data = $this->import_excel('Public/uploads/' . $file_name);
        $result['status'] = 'success';
        $result['file_field'] = $data[1];
        $result['data'] = M($field)->getDbFields();
        exit(json_encode($result));
    }

    public function outTest()
    {
        $test = null;
        $title = null;
        $title[0] = '0';
        $title[1] = '1';
        $title[2] = "2";
        $title[3] = '3';
        $test[0][0] = 'asdf';
        $test[0][1] = 'asdf';
        $test[0][2] = 'asdf';
        $test[0][3] = 'asdf';
        $this->exportExcel('test', $title, $test, 'test');
    }

    public function replace($content)
    {
        $content = str_replace("&gt;", ">", $content);
        $content = str_replace("&lt;", "<", $content);
        $content = str_replace("&nbsp;", " ", $content);
        $content = str_replace("&quot;", "\"", $content);
        $content = str_replace("&#39;", "'", $content);
        $content = str_replace("\\\\", "\\", $content);
        $content = str_replace("\\n", "\n", $content);
        $content = str_replace("\\r", "\r", $content);
        return $content;
    }

    public function write($userid = null, $content = null)
    {
        $myfile = fopen("Public/file/" . $userid . ".txt", "wb") or die("Unable to open file!");
        file_put_contents("Public/file/" . $userid . ".txt", $content);
        fclose($myfile);
    }

    public function read($userid = null)
    {
//        $userid = 'test';
        $result = file_get_contents("Public/file/" . $userid . ".txt");
        return $result;
    }

}