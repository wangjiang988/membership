<?php
 namespace Home\Model;

 use Think\Model;
 use Think\Page;

class NoticeModel extends Model
{
    protected $tableName = "notice";

//    protected $fields = array('id', 'username','nickname' ,'email');
    protected $pk     = 'id';

    //自动验证
    protected $_validate = array(
//        array('name','','帐号名称已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
    );

    //自动完成
    protected $_auto = array (
//        array('status','1'),  // 新增的时候把status字段设置为1
//        array('create_at','time',1,'function'), //
//        array('update_at','time',2,'function'), // 对update_time字段在更新的时候写入当前时间戳
    );


     public function getList($where = array("1"=>1),$page=1,$perPage=10){
         $count = count($this->select());
         $pageM = new Page($count, $perPage);
         $show = $pageM->show();
         $list = $this->where($where)->limit($perPage)->page($page)->order('create_at DESC')->select();

         return [
             'list'=>$list,
             'page'=>$show,
         ];
     }

     public function getAll()
     {
         return $this->select();
     }

     public function changeStatus($id,$status)
     {
         $data['status'] = $status;
         $data['update_at'] = time();
         return $this->where('id='.$id)->save($data);
     }
}