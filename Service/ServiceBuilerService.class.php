<?php

/**
 * author: Jayin <tonjayin@gmail.com>
 */

namespace Devtool\Service;

class ServiceBuilerService extends DevtoolService {

    static function createService($service_title, $model_name, $force_create = false){
        $templateFile_behavior = APP_PATH . 'Devtool' . DIRECTORY_SEPARATOR . 'Data' . DIRECTORY_SEPARATOR . 'Service' . DIRECTORY_SEPARATOR . 'TplService.tpl';

        $targetFileBehavior = self::getSystemModulePath() . 'Service' . DIRECTORY_SEPARATOR . $model_name . 'Service.class.php';

        $vars = [
            'service_title' => $service_title,
            'model_name' => $model_name
        ];

        if ($force_create | !file_exists($targetFileBehavior)) {
            $content = self::fetchContent($templateFile_behavior, $vars);
            file_put_contents($targetFileBehavior, $content);
        } else {
            return self::createReturn(false, null, '服务 ' . $model_name . 'Service 已经存在');
        }

        return self::createReturn(true, null, '操作成功');
    }

}