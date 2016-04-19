<?php
namespace Home\Controller;


use Home\Model\AdminModel;
use Think\Exception;
use Org\Util\PHPExcel;

class NoticeController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 公告列表首页
     */
    public function index()
    {
        $where = array();
        $where['1'] = '1';
        $searchForm = I('post.searchForm');
        if($searchForm){
            $search = I('post.');
            if(!empty(trim($search['search_title'])))
                $where['title'] = array('LIKE','%'.trim($search['search_title'])."%");

            $this->assign('search',$search);

        }

        $model = D('Notice');
        $page = I('get.p',1);
        $list = $model->getList($where,$page);
        $this->assign('list',$list);
        $this->display();
    }

    /**
     * 根据会员ＩＤ得到会员信息
     */
    public function view(){
        $model = D('Notice');
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
     * 更新
     */
    public function update(){
        $data = I('post.');
        if(trim($data['update_id']) && trim($data['update_title']) && trim($data['update_content']) ){

        }else{
            echo json_encode(array('errCode'=>-1,'msg'=>'参数值有空值'));
        }
        $model = D('Notice');
        $update = array();
        $update['id'] = trim($data['update_id']);
        $update['title'] = trim($data['update_title']);
        $update['content'] = trim($data['update_content']);
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
        $cards = M('card')->where('Notice_id='.$id)->select();
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
        $model = D('Notice');

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
        $model = D('Notice');
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
        $model = D('Notice');
        $ret = $model->changeStatus($id,$status);

        if($ret){
            echo json_encode(array('errCode'=>'200',"msg"=>'修改成功'));
            exit(0);
        }else{
            echo json_encode(array('errCode'=>'500',"msg"=>'修改失败'));
            exit(0);
        }

    }
}


