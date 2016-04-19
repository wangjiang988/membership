<?php
namespace Home\Controller;


use Home\Model\AdminModel;
use Think\Exception;
use Org\Util\PHPExcel;

class MemberController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 会员列表首页
     */
    public function index()
    {
        $where = array();
        $where['1'] = '1';
        $searchForm = I('post.searchForm');
        if($searchForm){
            $search = I('post.');
            if(!empty(trim($search['search_name'])))
                $where['name'] = array('LIKE','%'.trim($search['search_name'])."%");
            if(!empty(trim($search['search_phone'])))
            $where['phone'] = array('LIKE','%'.trim($search['search_phone']).'%');
            //这个比较复杂,要先根据卡号查询到用户ID ,然后在ＩＤ　中查询用户
            if(!empty(trim($search['search_card']))){
                $card_model = D('card');
                $ids = $card_model->getMemberIdsBycards($search['search_card']);
                $where['id'] = array('IN',$ids);

            }
            $this->assign('search',$search);

        }

        $model = D('Member');
        $page = I('get.p',1);
        $list = $model->getList($where,$page);
        $this->assign('list',$list);
        $this->display();
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
        $letter = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
        //表头数组
        $tableheader = array('ID','会员姓名','会员生日','手机号码','手机是否验证','创建时间','状态是否可用','卡１','卡１密码','后面都是卡信息');

        //填充表头信息
        for($i = 0;$i < count($tableheader);$i++) {
            $excel->getActiveSheet()->setCellValue("$letter[$i]1","$tableheader[$i]");
        }
//        $data = array(
//            array('1','小王','男','20','100'),
//            array('2','小李','男','20','101'),
//            array('3','小张','女','20','102'),
//            array('4','小赵','女','20','103')
//        );
        $model = D('Member');
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
        header('Content-Disposition:attachment;filename="memberList.xls"');
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

            $excel = new PHPExcel();
            $objReader = \PHPExcel_IOFactory::createReader('Excel5');//use excel2007 for 2007 format
            $objReader->setReadDataOnly(true);
            $objPHPExcel = $objReader->load($savePath.$file_name);
            $objWorksheet = $objPHPExcel->getActiveSheet();
            $highestRow = $objWorksheet->getHighestRow();           //取得总行数
            $highestColumn = $objWorksheet->getHighestColumn(); //取得总列数
            $highestColumnIndex = \PHPExcel_Cell::columnIndexFromString($highestColumn);
            $excelData = array();
            for ($row = 1; $row <= $highestRow; $row++) {
                for ($col = 0; $col < $highestColumnIndex; $col++) {
                    $excelData[$row][] =(string)$objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
                }
            }
            dump($excelData);
        }else{
            echo "没有选择文件";
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

    /**
     * 根据会员ＩＤ　得到旗下会员卡
     */
    public function getCards()
    {
        $id = I('post.id');
        if(!$id){
            echo json_encode(array('errCode'=>500,'msg'=>'参数错误'));exit(0);
        }
        $cards = M('card')->where('member_id='.$id)->select();
        if($cards){
            //将数据ｈｔｍｌ格式化输出
            $html = "<table class='table table-striped table-bordered'><thead><tr>";
            $html .= "<th>卡号</th>";
            $html .= "<th>密码</th>";
            $html .= "<th>状态</th> ";
            $html .= "<th>操作</th> </tr></thead>";
            $html .= "<tbody>";
            foreach ($cards as $card){
                $html .= "<tr>";
                $html .= "<td>".$card['vip_card']."</td>";
                $html .= "<td>".$card['vip_card_password']."</td>";
                if($card['status'])
                    $html .= "<td><span class=\"label label-success\">已激活</span></td>";
                else{
                    $html .= "<td><span class=\"label label-danger\">未激活</span></td>";
                }
                $url =  U('Card/index','search_card='.$card['vip_card']);
                $html .= "<td><a  href=$url >查看卡明细</a></td>";
                $html .= "<tr>";
            }
            $html .= "</tbody>";
            $html .= "</table>";
            echo json_encode(array('errCode' => '200', 'msg' => '查询成功','data'=>$html));
        }else{

            echo json_encode(array('errCode' => '404', 'msg' => '查询失败'));
        }
        exit(0);
    }

    /**
     * 创建会员
     */
    public function create()
    {
        $model = D('Member');

        $data = I('post.');
        $data['create_at'] = time();
        if(isset($data['phone'])){
            //查看电话是否已经存在
            $has_phone = $model->where('phone='.$data['phone'])->find();
            if($has_phone){
                if(IS_AJAX){ echo json_encode(array('errCode'=>'403','msg'=>'已经存在该电话号码'));exit(0);}
                else $this->success("已经存在该电话号码");
            }
        }

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
            echo json_encode(array('errCode'=>'404',"msg"=>'参数错误'));exit(0);
        }
//        $arr_ids = explode(',',$ids);
        $model = D('Member');
        $ret = $model->delete($ids);
        if($ret)
            echo json_encode(array('errCode'=>'200',"msg"=>'删除成功'));
        else
            echo json_encode(array('errCode'=>'-1',"msg"=>'删除失败'));
    }
}


