<?php

/**
 * author: Jayin <tonjayin@gmail.com>
 */

namespace Devtool\Service;

use Shop\Service\BaseService;

/**
 * 开发工具基类
 */
class DevtoolService extends BaseService {


    protected static function getSystemModulePath(){
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