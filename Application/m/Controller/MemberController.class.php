<?php
namespace m\Controller;
use Think\Controller;
class MemberController extends BaseController {

    /**
     * 我的会员区　　即会员中心
     */
    public function index()
    {

        $this->display();
    }

    /**
     * 我的会员卡
     */
    public function mycard()
    {
        $this->display();
    }

    /**
     * 新增会员卡
     */
    public function addcard()
    {
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