<?php

/**
 * author: Jayin <tonjayin@gmail.com>
 */

namespace Devtool\Controller;

use Devtool\Service\ServiceBuilerService;

class ServiceController extends DevtoolController {

    /**
     * 根据Model来创建对应的Service
     */
    function createServiceByModel(){
        $modelid = I('get.modelid');
        $model = M('model')->where(['modelid' => $modelid])->find();
        $this->assign('model', $model);

        $this->display();
    }

    /**
     * 生成
     */
    function doCreateServiceByModel(){
        $service_title = I('service_title');
        $model_name = I('model_name');

        $res = ServiceBuilerService::createService($service_title, $model_name);
        if($res['status']){
            $this->success('操作成功', U('Devtool/Model/modelList'));
        }else{
            $this->error($res['msg']);
        }
    }

}