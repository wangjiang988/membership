<?php
namespace Home\Controller;


class SiteController extends BaseController {
    
    public function index(){
        $this->display();
    }

    public function update(){
        $data = I('post.');
        if($data['id'] && $data['name']){

        }else{
            echo json_encode(array('errCode'=>-1,'msg'=>'参数值有空值'));
        }
        $model = D('site');
        $update = array();
        $update['id'] = $data['id'];
        $update[$data['name']] = $data['value'];
        try{
            $ret = $model->save($update);
        }catch (Exception $e ){
            echo json_encode(array('errCode'=>-1,'msg'=>json_encode($e)));exit(0);
        }

        if(!$ret){
            echo json_encode(array('errCode'=>-1,'msg'=>'更新失败'));
        }else
            echo json_encode(array('errCode'=>0,'msg'=>'更新成功'));
    }

}