<?php

/**
 * author: Jayin <tonjayin@gmail.com>
 */

namespace Devtool\Controller;

use Devtool\Service\ModelBuilderService;

class ModelController extends DevtoolController {

    /**
     *  模型列表
     */
    function modelList(){
        $models = M('model')->where(['type' => 0])->select();
        $this->assign('models', $models);
        $this->display();
    }

    /**
     * 创建 Model 文件页
     */
    function createModel(){
        $modelid = I('modelid');
        $model = M('model')->where(['modelid' => $modelid])->find();

        $this->assign('model', $model);
        $this->display();
    }

    /**
     * 创建 Model 文件操作
     */
    function doCreateModel(){
        $modelid = I('modelid');
        $name = I('name');
        $tablename = I('tablename');
        $res = ModelBuilderService::createModel($modelid, $name, $tablename);
        if($res['status']){
            $this->success('操作成功！', U('Devtool/Model/modelList'));
        }else{
            $this->error($res['msg']);
        }
    }

}