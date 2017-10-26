<?php

/**
 * author: Jayin <tonjayin@gmail.com>
 */

namespace Devtool\Controller;

use Common\Controller\Base;
use Devtool\Service\BehaviorBuilderService;

class TestController extends Base {

    function test(){
//        echo APP_PATH . 'Devtool' .DIRECTORY_SEPARATOR .  'Data' . DIRECTORY_SEPARATOR . 'Behavior' . DIRECTORY_SEPARATOR . 'Behavior.tpl';

        BehaviorBuilderService::createBehavior('UserFuck', '用户XX');
    }

}