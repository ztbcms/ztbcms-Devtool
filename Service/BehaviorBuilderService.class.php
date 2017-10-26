<?php

/**
 * author: Jayin <tonjayin@gmail.com>
 */

namespace Devtool\Service;

use System\Service\BaseService;

class BehaviorBuilderService extends BaseService {


    static function createBehavior($name, $description){
        $templateFile_behavior = APP_PATH . 'Devtool' .DIRECTORY_SEPARATOR .  'Data' . DIRECTORY_SEPARATOR . 'Behavior' . DIRECTORY_SEPARATOR . 'Behavior.tpl';
        $templateFile_behaviorParam = APP_PATH . 'Devtool' .DIRECTORY_SEPARATOR .  'Data' . DIRECTORY_SEPARATOR . 'Behavior' . DIRECTORY_SEPARATOR . 'BehaviorParam.tpl';

        $targetFileBehavior = self::getSystemModulePath() . 'Behavior' . DIRECTORY_SEPARATOR . $name . 'Behavior.class.php';
        $targetFileBehaviorParam = self::getSystemModulePath() . 'Behavior' . DIRECTORY_SEPARATOR . $name . 'Behavior.class.php';

        $vars = [
            'name' => $name,
            'description' => $description
        ];
        $content = self::fetchContent($templateFile_behavior, $vars);
        file_put_contents($targetFileBehavior, $content);

        $content = self::fetchContent($templateFile_behaviorParam, $vars);
        file_put_contents($targetFileBehaviorParam, $content);

        return self::createReturn(true, null, '操作成功');


    }

    private static function getSystemModulePath(){
        return APP_PATH . 'System' .DIRECTORY_SEPARATOR;
    }

    static function fetchContent($templateFile, $vars = []){
        $content = '';
        if(!empty($templateFile) && file_exists($templateFile) && is_file($templateFile)){
            $content = file_get_contents($templateFile);
            foreach ($vars as $key => $val){
                $pattern = '/{{' . $key. '}}/i';
                $content = preg_replace($pattern, $val, $content);
            }
        }

        return $content;

    }

}