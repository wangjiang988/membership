<?php

namespace Home\Controller;

use Think\Controller;

/**
 * Class BaseController
 * @package Home\Controller
 * 定义一个基础控制器
 */
class BaseController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        //登录拦截
        $this->loginFilter();
        //站点信息记录
        $this->assingnSiteInfo();


    }

    public function loginFilter(){
        //加入登陆拦截 MODULE_NAME,CONTROLLER_NAME,ACTION_NAME
        //dump(CONTROLLER_NAME);die;
        $user = $this->getUser();
        if(!$user){
            $uri = CONTROLLER_NAME.'/'.ACTION_NAME;
            if(!in_array($uri, ['User/login','User/logout','User/register']) ){
                //如果不是上述几个ｕｒｌ，则进行登陆判断
                $this->redirect('User/login');
            }
        }else{
            S('user',(array)json_decode(base64_decode($user)));
            //TODO 可以在这里加上延长登陆时间和校验登陆ip的功能．
        }
    }

    /**
     * 站点信息赋值到页面
     */
    public function assingnSiteInfo(){
        $site = M('site')->find(1);
        $this->assign('site',$site);
        //当前操作位置
        $this->assign('controller',CONTROLLER_NAME);
        $this->assign('uri',CONTROLLER_NAME.'/'.ACTION_NAME);
        $this->assign('title',L('site_'.CONTROLLER_NAME.'_title'));
        $this->assign('page_title',L('site_'.CONTROLLER_NAME.'_'.ACTION_NAME.'_title'));
    }

    public function getUser(){
        if(!isset($_COOKIE['info'])) return false;
        else
            return $_COOKIE['info'];
    }
    public function getFormatInfo(){
       return (array)json_decode(base64_decode($this->getUser()));
    }

    
}