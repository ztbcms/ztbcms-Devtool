<?php

/**
 * author: Jayin <tonjayin@gmail.com>
 */

namespace Devtool\Controller;

use Common\Controller\Base;
use Devtool\Service\BehaviorBuilderService;
use Devtool\Service\ModelBuilderService;
use Devtool\Service\ServiceBuilerService;
use Devtool\Service\ServicePreviewService;
use PhpParser\Error;
use PhpParser\ParserFactory;
use System\Service\BaseService;

class TestController extends Base {

    function test(){
//        echo APP_PATH . 'Devtool' .DIRECTORY_SEPARATOR .  'Data' . DIRECTORY_SEPARATOR . 'Behavior' . DIRECTORY_SEPARATOR . 'Behavior.tpl';

//        BehaviorBuilderService::createBehavior('UserFuck', '用户XX');

//        ModelBuilderService::createModel(1001,'', '', true);
//        $res = BaseService::find('Shop/Apply', ['id' => 1]);

//        $res = ServiceBuilerService::createService('申请', 'Apply', true);

//        var_dump($res);
//
//        $res = ModelBuilderService::fixTablename('apply_user_ruby_on');
//        var_dump($res);

//        $file =  __DIR__ . '/BehaviorController.class.php';
//
//        $res = ServicePreviewService::parserClassFile($file);
//        dump($res);

        $res = ServicePreviewService::getSystemService();
        dump($res);


    }


}