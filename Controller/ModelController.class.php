<?php

/**
 * author: Jayin <tonjayin@gmail.com>
 */

namespace Devtool\Controller;

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
        $this->display();
    }

    /**
     * 创建 Model 文件操作
     */
    function doCreateModel(){

    }

}