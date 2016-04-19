<?php
namespace m\Controller;
use Think\Controller;
class LoginController extends BaseController {

    /**
     * 会员登录界面
     * 登录界面
     */
    public function login(){
        if(IS_AJAX){
            $data = I('post.');
            if(trim($data['vip_card']) == '' || trim($data['vip_card_password']) == ''){
                echo json_encode(array('errCode'=>500,'msg'=>'请将信息填写完整!'));exit(0);
            }else{
                //检查卡号和密码是否正确
                $card = trim($data['vip_card']);
                $card_password =  trim($data['vip_card_password']);
                $ret = M('Card')->where('vip_card=\''.$card.'\' and vip_card_password=\''.$card_password.'\'')->find();

                if($ret){
                    //登录成功　记录ｔｏｋｅｎ，　ｉｐ　和ｔｉｍｅ
                    //登录操作　不算修改。所以不记录update_time
                    $update =array();

                    $update['token'] = $this->_generateToken();
                    $update['last_login_ip'] = get_client_ip();
                    $update['last_login_time'] = time();

                    M('Card')->where('id='.$ret['id'])->save($update);
                    echo json_encode(array('errCode'=>200,'msg'=>'有此卡号和密码，且匹配正确','data'=>$ret));exit(0);
                }else{
                    echo json_encode(array('errCode'=>404,'msg'=>'卡号或密码信息填写错误，请重新填写'));exit(0);
                }
            }
            exit(0);
        }
        $this->display();
    }
}