<?php
namespace Home\Controller;


use Think\Exception;
use Org\Util\PHPExcel;

class CardController extends BaseController
{



    /**
     * 会员列表首页
     */
    public function index()
    {
        $where = array();
        $where['1'] = '1';
        $searchForm = I('post.searchForm');
        if($searchForm || I('get.search_card')){
            $search_card = I('post.search_card')?I('post.search_card'):I('get.search_card');
            if(!empty(trim($search_card)))
                $where['vip_card'] = array('LIKE','%'.trim($search_card)."%");
            $search['search_card'] = $search_card;
            $this->assign('search',$search);

        }

        $model = D('Card');
        $page = I('get.p',1);
        $list = $model->getList($where,$page);
        $this->assign('list',$list);
        $this->display();
    }

    /**
     * 创建会员卡
     */
    public function create()
    {
        $model = D('Card');

        $data = I('post.');
        $data['create_at'] = time();
        //默认数据
        $data['status'] = 0; //默认不激活

        try{
            $ret = $model->add($data);
            if($ret){
                if(IS_AJAX) echo json_encode(array('errCode'=>200,'msg'=>'创建成功'));
                else $this->success("创建成功");
            }else{
                if(IS_AJAX) echo json_encode(array('errCode'=>-1,'msg'=>'创建失败'));
                else $this->success("创建失败");
            }
        }catch (Exception $e){
            if(IS_AJAX){ echo json_encode(array('errCode'=>-1,'msg'=>json_encode($e)));exit(0);}
            else $this->success("创建失败,sql错误");
        }
    }

    /**
     * 删除
     */
    public function delete()
    {
        $ids = I('post.ids');

        if(!$ids){
            echo json_encode(array('errCode'=>'404',"msg"=>'参数错误'));
            exit(0);
        }
//        $arr_ids = explode(',',$ids);
        $model = D('Card');
        $ret = $model->delete($ids);
        if($ret)
            echo json_encode(array('errCode'=>'200',"msg"=>'删除成功'));
        else
            echo json_encode(array('errCode'=>'-1',"msg"=>'删除失败'));
    }

    public function changeStatus(){
        $id = I('post.id');
        $status = I('post.status');
        if(!in_array($status,array(0,1,"0","1")) && (!is_numeric($id) || empty($id))){
            echo json_encode(array('errCode'=>'404',"msg"=>'参数错误'));
            exit(0);
        }
        $model = D('Card');
        $ret = $model->changeStatus($id,$status);

        if($ret){
            echo json_encode(array('errCode'=>'200',"msg"=>'修改成功'));
            exit(0);
        }else{
            echo json_encode(array('errCode'=>'500',"msg"=>'修改失败'));
            exit(0);
        }

    }

    /**
     * 根据会员ＩＤ得到会员信息
     */
    public function view(){
        $model = D('Member');
        $id = I('post.id');
        if(empty($id) || !is_numeric($id)) {
            echo json_encode(array('errCode' => '500', 'msg' => '参数传递错误'));
            exit(0);
        }
        $info = $model->where('id='.$id)->find();
        if($info){
            echo json_encode(array('errCode' => '200', 'msg' => '查询成功','data'=>$info));
        }else{
            echo json_encode(array('errCode' => '404', 'msg' => '查询失败'));
        }
        exit(0);
    }

    /**
     * 　TODO　会员导出
     */
    public function outExcel(){
        $excel = new PHPExcel();
        //Excel表格式,这里简略写了8列
        $letter = array('A','B','C','D','E');
        //表头数组
        $tableheader = array('卡号','密码','是否激活','激活时间','创建时间');

        //填充表头信息
        for($i = 0;$i < count($tableheader);$i++) {
            $excel->getActiveSheet()->setCellValue("$letter[$i]1","$tableheader[$i]");
        }
//
//        $data = array(
//            array('1','小王','男','20','100'),
//            array('2','小李','男','20','101'),
//            array('3','小张','女','20','102'),
//            array('4','小赵','女','20','103')
//        );
        $model = D('Card');
        $data = $model->getExcelTypeData();
        //填充表格信息
        for ($i = 2;$i <= count($data) + 1;$i++) {
            $j = 0;
            foreach ($data[$i - 2] as $key=>$value) {
                $excel->getActiveSheet()->setCellValue("$letter[$j]$i","$value");
                $j++;
            }
        }
        //创建Excel输入对象
        $write = new \PHPExcel_Writer_Excel5($excel);
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
        header("Content-Type:application/force-download");
        header("Content-Type:application/vnd.ms-execl");
        header("Content-Type:application/octet-stream");
        header("Content-Type:application/download");;
        header('Content-Disposition:attachment;filename="cardList.xls"');
        header("Content-Transfer-Encoding:binary");
        $write->save('php://output');
    }

    public function inExcel(){
        if($_FILES['excel_file']['name']){
            $tmp_file = $_FILES ['excel_file'] ['tmp_name'];
            $file_types = explode ( ".", $_FILES ['excel_file'] ['name'] );
            $file_type = $file_types [count ( $file_types ) - 1];
            /*判别是不是.xls文件，判别是不是excel文件*/
            if (strtolower ( $file_type ) != "xls")
            {
                $this->error ( '不是Excel文件，重新上传' );
            }

            /*设置上传路径*/
            $savePath =  WEB_PATH.'/Public/upload/excel/';
            /*以时间来命名上传的文件*/
            $str = date ( 'Ymdhis' );
            $file_name = $str . "." . $file_type;
            /*是否上传成功*/
            if (!copy( $tmp_file, $savePath.$file_name ))
            {
                echo json_encode(array('errCode'=>0 ,'msg'=>'导入错误'));
                exit(0);
//                $this->error ( '上传失败' );
            }

            $excel = new PHPExcel(); //这个不能少，虽然没用到，但是后面的类都是通过这个运行这个类注册文件得到
            $objReader = \PHPExcel_IOFactory::createReader('Excel5');//use excel2007 for 2007 format
            $objReader->setReadDataOnly(true);
            $objPHPExcel = $objReader->load($savePath.$file_name);
            $objWorksheet = $objPHPExcel->getActiveSheet();
            $highestRow = $objWorksheet->getHighestRow();           //取得总行数
            $highestColumn = $objWorksheet->getHighestColumn(); //取得总列数
            $highestColumnIndex = \PHPExcel_Cell::columnIndexFromString($highestColumn);
            $excelData = array();
            //row从２开始算，因为1行是头部
            for ($row = 2; $row <= $highestRow; $row++) {
//                for ($col = 0; $col < $highestColumnIndex; $col++) {
//                    $excelData[$row][] =(string)$objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
//                }
                //第一列为卡号
                $excelData[$row-2]['vip_card'] =(string)$objWorksheet->getCellByColumnAndRow(0, $row)->getValue();
                //第二列为卡密码
                $excelData[$row-2]['vip_card_password'] =(string)$objWorksheet->getCellByColumnAndRow(1, $row)->getValue();
            }
            //以上步骤已经将excel转化为数组，接下来就是将数据插入数据库
//            dump($excelData);
            $model = D('Card');
            try{
                $ret = $model->addAll($excelData);
                if($ret){
                    echo json_encode(array('errCode' => '200', 'msg' => '导入成功'));
                    exit(0);
                }else{
                    echo json_encode(array('errCode' => '500', 'msg' => '导入失败'));exit(0);
                }
            }catch (Exception $e){
                //TODO　不能直接批量插入的话，需要进行卡号的排除,　将$excelData先去掉重复的卡号。然后进行插入.
                echo json_encode(array('errCode' => '500', 'msg' => '导入失败,有可能是您会员卡号有重复'));
                exit(0);
            }
        }
    }

    /**
     * 更新
     */
    public function update(){
        $data = I('post.');
        if(trim($data['update_id']) && trim($data['update_name']) && trim($data['update_phone']) && trim($data['update_birth'])){

        }else{
            echo json_encode(array('errCode'=>-1,'msg'=>'参数值有空值'));
        }
        $model = D('Member');
        $update = array();
        $update['id'] = trim($data['update_id']);
        $update['name'] = trim($data['update_name']);
        $update['phone'] = trim($data['update_phone']);
        $update['birth'] = trim($data['update_birth']);
        $update['status'] = trim($data['update_status']);
        $update['update_at'] = time();
        try{
            $ret = $model->save($update);
        }catch (Exception $e ){
            echo json_encode(array('errCode'=>-1,'msg'=>json_encode($e)));exit(0);
        }

        if(!$ret){
            echo json_encode(array('errCode'=>-1,'msg'=>'更新失败'));
        }else
            echo json_encode(array('errCode'=>0,'msg'=>'更新成功'));
        exit(0);
    }

    public function updateCell(){
        $data = I('post.');
        if($data['id'] && $data['name']){

        }else{
            echo json_encode(array('errCode'=>-1,'msg'=>'参数值有空值'));
        }
        $model = D('Card');
        $update = array();
        $update['id'] = $data['id'];
        $update[$data['name']] = $data['value'];
        try{
            $ret = $model->save($update);
        }catch (Exception $e ){
            echo json_encode(array('errCode'=>-1,'msg'=>json_encode($e)));exit(0);
        }

        if(!$ret){
            echo json_encode(array('errCode'=>-1,'msg'=>'更新失败'));
        }else
            echo json_encode(array('errCode'=>0,'msg'=>'更新成功'));
    }
}


