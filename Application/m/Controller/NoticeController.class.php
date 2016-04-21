<?php
namespace m\Controller;
use Think\Controller;
class NoticeController extends BaseController {

    public function index()
    {
        $model = D('Notice');
        $list = $model->getList();
        $read_notices = $this->current_user['read_notices'];
        if($read_notices){
            $read_arr = explode(',',$read_notices);
        }else{
            $read_arr = array();
        }
        $new_list = array();
        if($list){
            foreach ($list as $notice){
                 $notice['read'] = in_array($notice['id'],$read_arr)?'1':'0';
                 $new_list[]=$notice;
            }
        }
        $this->assign('list',$new_list);
        $this->display();
    }

    public function view(){
        $id=I('get.id');
        $notice = M('Notice')->where('id='.$id)->find();
        //修改该条状态该用户的阅读记录
        $read_notices = $this->current_user['read_notices'];
        $read_arr = array();
        if($read_notices !='' ){
            $read_arr = explode(',',$read_notices);
        }else{
            $read_arr = array();
        }
        if(!in_array($notice['id'],$read_arr)){
            $read_arr[] = $notice['id'];
            $update_member['read_notices'] = implode(',',$read_arr);
            M('Member')->where('id='.$this->current_user['id'])->save($update_member);
        }

        $this->assign('notice',$notice);
        $this->display();
    }
}