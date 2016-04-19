<?php
 namespace Home\Model;

 use Think\Model;
 use Think\Page;

class MemberModel extends Model
{
    protected $tableName = "member";

//    protected $fields = array('id', 'username','nickname' ,'email');
    protected $pk     = 'id';

    //自动验证
    protected $_validate = array(
        array('name','','帐号名称已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
    );

    //自动完成
    protected $_auto = array (
        array('status','1'),  // 新增的时候把status字段设置为1
        array('create_at','time',1,'function'), //
        array('update_at','time',2,'function'), // 对update_time字段在更新的时候写入当前时间戳
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
     //得到导出ｅｘｃｅｌ的二维数组
     public function getExcelTypeData(){
         //TODO 会员卡的信息也应该导出来
         //导出所有数据
         $list = $this->field('id,name,birth,phone,phone_status,create_at,status')
             ->order('create_at DESC')->select();
         //导出所有卡信息
         $cardList = M('Card')->where('member_id <> 0')->select();
         $newCardList = array();
         if(!empty($cardList)){
             foreach ($cardList as $card) {
                 $newCardList[$card['member_id']][] = $card;
//                 $newCardList[$card['member_id']]['vip_card_password'] = $card['vip_card_password'];
             }
         }

         $newList = array();
         //计算总共需要显示多少列

         foreach ($list as $member){
             $member['create_at'] = date('Y-m-d H:i:s', $member['create_at']);
             if($newCardList[$member['id']]){
                 $i = 0;
                 for ($i;$i <count($newCardList[$member['id']]); $i++){
                     $member['card'.($i+1)] = $newCardList[$member['id']][$i]['vip_card'];
                     $member['card'.($i+1).'_password'] = $newCardList[$member['id']][$i]['vip_card_password'];
                 }
             }

             $newList[] = $member;

         }

         return $newList;
     }
}