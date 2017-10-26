<?php

/**
 * author: Jayin <tonjayin@gmail.com>
 */

namespace Devtool\Controller;

use Devtool\Service\BehaviorBuilderService;

/**
 * 行为
 */
class BehaviorController extends DevtoolController {

    /**
     * 创建行为页
     */
    function createBehavior(){
        $this->display();
    }

    /**
     * 创建行为操作
     */
    function doCreateBehavior(){
        $name = I('name');
        $description = I('description');
        $res = BehaviorBuilderService::createBehavior($name, $description);
        if($res['status']){
            $this->success('操作成功！');
        }else{
            $this->error($res['msg']);
        }

    }

}