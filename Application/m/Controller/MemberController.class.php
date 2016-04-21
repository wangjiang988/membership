<?php
namespace m\Controller;
use Think\Controller;
class MemberController extends BaseController {

    /**
     * 我的会员区　　即会员中心
     */
    public function index()
    {
        //得到公告未读公告数量
        $list = M('Notice')->where('status=1')->select();
        $read_notices = $this->current_user['read_notices'];
        $unread_num = 0;
        if($read_notices){
            $read_arr = explode(',',$read_notices);
        }else{
            $read_arr = array();
        }
        if($list){
            foreach ($list as $notice){
                if(!in_array($notice['id'],$read_arr))
                    $unread_num ++;
            }
        }

        $this->assign('unread_num',$unread_num);
        $this->display();
    }

    /**
     * 我的会员卡
     */
    public function mycard()
    {
        $model = D('card');
        $list = $model->getList(array('member_id'=>$this->current_user['id']));
        $this->assign('list',$list);
        $this->display();
    }

    /**
     * 新增会员卡
     */
    public function addcard()
    {
        if(IS_AJAX){
            $model = D('Card');
            $data = I('post.');

            $card = $model->where($data)->find();

            if($card){
                if($card['member_id'] && $card['member_id']!=$this->current_user['id']){
                    echo json_encode(array('errCode'=>403,'msg'=>'此卡已经被其他用户绑定!'));exit(0);
                }
                elseif($card['member_id'] && $card['member_id']==$this->current_user['id']){
                    echo json_encode(array('errCode'=>403,'msg'=>'此卡已经被您绑定过了!'));exit(0);
                }else{
                    //绑定卡与当前用户
                    $card['member_id'] = $this->current_user['id'];
                    $card['status'] = 1;
                    $card['update_at'] =time();
                    $ret = $model->save($card);
                    if($ret)
                    {
                        echo json_encode(array('errCode'=>200,'msg'=>'绑定成功!'));exit(0);
                    }else{
                        echo json_encode(array('errCode'=>500,'msg'=>'绑定失败!'));exit(0);
                    }
                }

            }else{
                echo json_encode(array('errCode'=>500,'msg'=>'没有此卡信息！'));exit(0);
            }
            exit(0);
        }
        $this->display();
    }

    /**
     * 我的微信卡包
     */
    public function mywxcard()
    {
        $this->display();
    }
}