<?php
namespace m\Controller;
use Think\Controller;
class BaseController extends Controller {

    public $current_user;
    public $token;
    public function __construct()
    {
        parent::__construct();
        //TODO 这里加上验证token代码
        $this->checkToken();
    }

    /**
     * 检查token来验证用户是否合法
     *　ｔｏｋｅｎ　＋ｉｐ　＋ｔｏｋｅｎ有效期　的验证规则
     * 验证通过则更新last_login_time
     */
    public function checkToken(){
        $token_get = I('get.token');
        $token_post = I('post.token');
        $token = empty($token_get)?$token_post:$token_get;
        if(!$token){
            @header("Location:/m/Login/login");
        }else{
            $mem = M('Member')->where('token=\''.$token.'\'')->find();
            if($mem){
                //表现为当前ip且ｔｏｋｅｎ有效期为一周
                if(get_client_ip() == $mem['last_login_ip'] && $mem['last_login_time']+(60*60*24*7)>time()){
                    $this->current_user = $mem;
                    $this->token = $token;
                    $this->assign('token',$token);
                }else{
                    @header("Location:/m/Login/login");
                }

            }else{
                @header("Location:/m/Login/login");
            }
        }
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