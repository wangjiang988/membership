<?php
 namespace Home\Model;

 use Think\Model;
 use Think\Page;

class SiteModel extends Model
{
    protected $tableName = "site";

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
}