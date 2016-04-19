<?php
namespace m\Controller;
use Think\Controller;
use Think\Exception;

class IndexController extends BaseController {

    /**
     * 填写资料页面
     */
    public function profile()
    {
        if(IS_AJAX){
            $data = I('post.');
            if(in_array('',$data)){
                echo json_encode(array('errCode'=>500,'msg'=>'参数错误'));exit(0);
            }
            //校验验证码
            if($this->_checkVerify($data['verifyCode'])){
                $model = D('Member');
                $insert = array();
                $insert['name'] = $data['name'];
                $insert['phone'] = $data['phone'];
                $insert['birth'] = $data['birth'];
                $insert['phone_status'] = 1;//手机已经验证过了
                $insert['status'] = 1;//手机已经验证过了
                $insert['create_at'] = time();

                try{
                    $ret = $model->add($insert);
                    if($ret){
                        //用户添加成功，绑定用户ＩＤ和卡信息
                        $card=D('Card');
                        $where = $update =  array();
                        $where['id'] = $data['id'];

                        $update['status'] = 1;
                        $update['member_id'] = $ret;

                        $card->where($where)->save($update);
                        echo json_encode(array('errCode'=>200,'msg'=>'用户添加成功'));exit(0);
                    }else{
                        echo json_encode(array('errCode'=>400,'msg'=>'插入数据失败'));exit(0);
                    }
                }catch (Exception $e){
                    echo json_encode(array('errCode'=>404,'msg'=>'添加失败，可能手机号码已经被使用'));exit(0);
                }
            }else{
                //验证码不正确，重新输入，或者重新获取
                echo json_encode(array('errCode'=>501,'msg'=>'验证码不正确'));exit(0);
            }
            exit(0);
        }
        $this->display();
    }

    /**
     * 在这里写获取微信卡券的资料。
     */
    public function getwxcard(){
        //
        $this->display();
    }

    /**
     * @return string
     * 获取验证码方法
     */
    public function getVerify()
    {
        if (IS_AJAX){
            //获取验证码后，需要记录到缓存。　id+验证码 　S(ID+'verifyCode') = $code;
//            S();
            return 'asdf';
        }

    }
    /**
     * 检查验证码是否正确
     */
    public function _checkVerify($verifyCode)
    {
        if($verifyCode == 'asdf'){
            return true;
        }else{
            return false;
        }
    }




}