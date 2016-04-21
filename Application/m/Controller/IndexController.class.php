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
                $insert['id'] = $this->current_user['id'];
                $insert['name'] = $data['name'];
                $insert['phone'] = $data['phone'];
                $insert['birth'] = $data['birth'];
                $insert['phone_status'] = 1;//手机已经验证过了
                $insert['status'] = 1;//手机已经验证过了
                $insert['create_at'] = time();//临时用户不算创建用户，只有在这里算创建用户

                try{
                    $ret = $model->save($insert);
                    if($ret){
                        //用户添加成功，绑定用户ＩＤ和卡信息，会员卡已经转为会员登录
                        $card=D('Card');
                        $where = $update =  array();
                        $where['id'] = $data['card_id'];

                        $update['status'] = 1;
                        $update['member_id'] = $ret;

                        $card->where($where)->save($update);
                        echo json_encode(array('errCode'=>200,'msg'=>'用户添加成功','data'=>array('token'=>$this->token)));
                        exit(0);
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
    public function getVerifyCode()
    {
        if (IS_AJAX){
            $imgCode = I('post.imgVerify');
            $phone = I('post.phone');
            if($this->check_verify($imgCode)){
                //验证正确。开始发送短信
                $verifyCode = $this->_generateVerifyCode(6);

                $http = 'http://api.sms.cn/mtutf8/';
                $sms_user = C('SMS_USER');
                $sms_password = C('SMS_PASSWORD');
                $mobile	 = $phone;	//号码，以英文逗号隔开
                $content = '你好，您的短信验证码为'.$verifyCode;		//内容
                $res = sendSMS($http,$sms_user,$sms_password,$mobile,$content);
                $rs_arr = explode('&',$res);
                $rs_status = explode('=',$rs_arr[1]);
                if($rs_status[1] == 100){
                    //记录验证码信息,有效时间３０分钟
                    $codeInfo = array('verifyCode'=>$verifyCode,'create_at'=>time());
                    S('msmCode_'.$this->current_user['id'],$codeInfo, 60*30);
                    echo json_encode(array('errCode'=>'200','msg'=>'发送成功','data'=>array('code'=>$verifyCode)));exit(0);
                }else{
                    echo json_encode(array('errCode'=>'500','msg'=>'短信发送失败，请重新发送！'));exit(0);
                }
                exit(0);

            }else{
                echo json_encode(array('errCode'=>'400','msg'=>'您输入的图形验证码有误！'));exit(0);
            }

            //获取验证码后，需要记录到缓存。　id+验证码 　S(ID+'verifyCode') = $code;
//            S();
            exit(0);
        }

    }

    /**
     * @return mixed
     * 生成短信验证码
     */
    public function _generateVerifyCode($length = 6)
    {
        return str_pad(mt_rand(0, pow(10, $length) - 1), $length, '0', STR_PAD_LEFT);
    }

    /**
     * 检查验证码是否正确
     */
    public function _checkVerify($verifyCode)
    {
        $codeInfo = S('msmCode_'.$this->current_user['id']);
        if(isset($codeInfo['verifyCode']) && $verifyCode == $codeInfo['verifyCode']){
            return true;
        }else{
            return false;
        }
    }

    /**
     *
     * 验证码生成
     */
    public function verify_c(){
        $Verify = new \Think\Verify();
        $Verify->fontSize = 18;
        $Verify->length   = 4;
        $Verify->useNoise = false;
        $Verify->codeSet = '0123456789';
        $Verify->imageW = 130;
        $Verify->imageH = 50;
        //$Verify->expire = 600;
        $Verify->entry();
    }

    // 检测输入的验证码是否正确，$code为用户输入的验证码字符串
    public function check_verify($code, $id = ""){
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }

    
    


}