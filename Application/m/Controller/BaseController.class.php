<?php
namespace m\Controller;
use Think\Controller;
class BaseController extends Controller {

    public function __construct()
    {
        parent::__construct();
        //TODO 这里加上验证token代码
    }

    /**
     * 生成随机唯一数作为token
     * 算法　１次ＭＤ５　
     *　字符串为　生称一个三位数随机数＋当前时间＋当前ｉｐ
     */
    public function _generateToken(){
        return md5(rand(100,999).time()+get_client_ip());
    }

}