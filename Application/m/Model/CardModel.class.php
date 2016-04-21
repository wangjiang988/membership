<?php
 namespace m\Model;

 use Think\Model;
 use Think\Page;

class CardModel extends Model
{
    protected $tableName = "card";

//    protected $fields = array('id', 'username','nickname' ,'email');
    protected $pk     = 'id';

    //自动验证
    protected $_validate = array(
    );

    //自动完成
    protected $_auto = array (
        array('status','1'),  // 新增的时候把status字段设置为1
        array('create_at','time',1,'function'), // 对name字段在新增和编辑的时候回调getName方法
        array('update_at','time',2,'function'), // 对update_time字段在更新的时候写入当前时间戳
    );

     public function getAll()
     {
         return $this->select();
     }

     public function getMemberIdsBycards($search_card){
         $res = $this->field('member_id')->where('vip_card like \'%'.trim($search_card).'%\'')->select();
         if($res){
             $temp = array();
             foreach ($res as $card){
                 $temp[] = $card['member_id'];
             }
             return implode(',',$temp);
         }else{
             return false;
         }
     }

     public function getList($where = '1=1',$page=1,$perPage=10){
         $count = count($this->select());
         $pageM = new Page($count, $perPage);
         $show = $pageM->show();
         $list = $this->where($where)->limit($perPage)->page($page)->order('create_at DESC')->select();
         return $list;
     }

     public function changeStatus($id,$status)
     {
         $data['status'] = $status;
         $data['update_at'] = time();
         return $this->where('id='.$id)->save($data);
     }
     //得到导出ｅｘｃｅｌ的二维数组
     public function getExcelTypeData(){
         //导出所有数据
         $list = $this->field('vip_card,vip_card_password,status,active_time,create_at')
                      ->order('create_at DESC')->select();
         $newList = array();
         foreach ($list as $card){
             $card['active_time'] = date('Y-m-d H:i:s', $card['active_time']);
             $card['create_at'] = date('Y-m-d H:i:s', $card['create_at']);
             $newList[] = $card;
         }
         return $newList;
     }

}