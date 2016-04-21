<?php
namespace m\Controller;
use Think\Controller;
class LoginController extends Controller {

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
                //查看该卡是否已经绑定客户，如果已经绑定客户,则直接跳转到我的会员区
                if(!empty($ret['member_id'])){
                    //取出token
                    //登录会员区
//                    $card_member = array();
                    $card_member = D('Member')->where('id='.$ret['member_id'])->find();
                    if($card_member){
                        $token = $card_member['token'];
                        if(!$token){
                            $token = $this->_generateToken();
                            $update = array();
                            $update['token'] = $token;
                            $update['last_login_time'] = time();
                            M('Member')->where('id='.$card_member['id'])->save($update);
                            unset($update);
                        }
                        $url = U("/m/Member/index").'?token='.$token;
                        echo json_encode(array('errCode'=>302,'msg'=>'有此卡号和密码，且匹配正确',
                            'data'=>array('url'=>$url)));exit(0);
                    }else{
                        //登录成功 创建一个用户　，基本信息留空　记录ｔｏｋｅｎ，　ｉｐ　和ｔｉｍｅ
                        //登录操作　不算修改。所以不记录update_time

                        $member = $card_update = array();
                        $member['name'] = '系统临时用户';
                        $member['status'] = 0 ;
                        $member['token'] = $this->_generateToken();
                        $member['phone'] = null; //因为phone是唯一键，所以要给他生称一个唯一值，就放ｔｏｋｅｎ
                        $member['last_login_ip'] = get_client_ip();
                        $member['last_login_time'] = time();

                        $model = D('Member');

                        $model->startTrans();

                        $ret_id = $model->add($member);
                        if($ret_id){
                            //生成ＩＤ后进行与卡进行临时绑定
                            $card_update['member_id'] = $ret_id;
                            $rs = M('Card')->where('id='.$ret['id'])->save($card_update);
                            if($rs){
                                $model->commit();//返回ｔｏｋｅｎ
                                echo json_encode(array('errCode'=>200,'msg'=>'有此卡号和密码，且匹配正确',
                                    'data'=>array('token'=>$member['token'],'id'=>$ret['id'])));exit(0);
                            }else{
                                $model->rollback();
                                echo json_encode(array('errCode'=>201,'msg'=>'有此卡号和密码，临时用户与卡绑定失败'));exit(0);
                            }
                        }else{
                            $model->rollback();
                            echo json_encode(array('errCode'=>201,'msg'=>'生成临时用户失败'));exit(0);
                        }
                    }

                }elseif($ret){
                    //登录成功 创建一个用户　，基本信息留空　记录ｔｏｋｅｎ，　ｉｐ　和ｔｉｍｅ
                    //登录操作　不算修改。所以不记录update_time

                    $member = $card_update = array();
                    $member['name'] = '系统生成用户';
                    $member['status'] = 0 ;
                    $member['token'] = $this->_generateToken();
                    $member['phone'] = $member['token']; //因为phone是唯一键，所以要给他生称一个唯一值，就放ｔｏｋｅｎ
                    $member['last_login_ip'] = get_client_ip();
                    $member['last_login_time'] = time();

                    $model = D('Member');

                    $model->startTrans();

                    $ret_id = $model->add($member);
                    if($ret_id){
                        //生成ＩＤ后进行与卡进行临时绑定
                        $card_update['member_id'] = $ret_id;
                        $rs = M('Card')->where('id='.$ret['id'])->save($card_update);
                        if($rs){
                            $model->commit();//返回ｔｏｋｅｎ
                            echo json_encode(array('errCode'=>200,'msg'=>'有此卡号和密码，且匹配正确',
                                'data'=>array('token'=>$member['token'])));exit(0);
                        }else{
                            $model->rollback();
                            echo json_encode(array('errCode'=>201,'msg'=>'有此卡号和密码，临时用户与卡绑定失败'));exit(0);
                        }
                    }else{
                        $model->rollback();
                        echo json_encode(array('errCode'=>201,'msg'=>'生成临时用户失败'));exit(0);
                    }

                }else{
                    echo json_encode(array('errCode'=>404,'msg'=>'卡号或密码信息填写错误，请重新填写'));exit(0);
                }
            }
            exit(0);
        }
        $this->display();
    }



    /**
     * 生成随机唯一数作为token
     * 算法　１次ＭＤ５　
     *　字符串为　生称一个三位数随机数＋当前时间＋当前ｉｐ
     * 生成token的同时，更新一下登录时间
     */
    public function _generateToken(){
        return md5(rand(100,999).time()+get_client_ip());
    }

    



}