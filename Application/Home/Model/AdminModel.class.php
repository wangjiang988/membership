<?php
 namespace Home\Model;

 use Think\Model;
 use Think\Page;

class AdminModel extends Model
{
    protected $tableName = "admin";

//    protected $fields = array('id', 'username','nickname' ,'email');
    protected $pk     = 'id';

    //自动验证
    protected $_validate = array(
//        array('verify','require','验证码必须！'), //默认情况下用正则进行验证
        array('name','','帐号名称已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
//        array('value',array(1,2,3),'值的范围不正确！',2,'in'), // 当值不为空的时候判断是否在一个范围内
//        array('repassword','password','确认密码不正确',0,'confirm'), // 验证确认密码是否和密码一致
//        array('password','checkPwd','密码格式不正确',0,'function'), // 自定义函数验证密码格式
    );

    //自动完成
    protected $_auto = array (
        array('status','1'),  // 新增的时候把status字段设置为1
        array('password','makePwd',3,'callback') , // 对password字段在新增和编辑的时候使makePwd函数处理
        array('create_at','time',1,'function'), // 对name字段在新增和编辑的时候回调getName方法
        array('update_at','time',2,'function'), // 对update_time字段在更新的时候写入当前时间戳
    );

     protected function makePwd($password)
    {
        return md5(md5($password));
    }

     public function getList($page=1,$perPage=5){
         $count = count($this->select());
         $pageM = new Page($count, $perPage);
         $show = $pageM->show();
         $list = $this->limit($perPage)->page($page)->select();

         return [
             'list'=>$list,
             'page'=>$show,
         ];
     }

     public function getAll()
     {
         return $this->select();
     }
}