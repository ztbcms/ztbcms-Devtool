<?php

/**
 * author: Jayin <tonjayin@gmail.com>
 */

namespace Devtool\Service;

use System\Service\BaseService;


/**
 * 开发工具基类
 */
class DevtoolService extends BaseService {

    /**
     * 获取 System 模块目录
     * @return string
     */
    protected static function getSystemModulePath(){
        return APP_PATH . 'System' . DIRECTORY_SEPARATOR;
    }

    /**
     * 获取模板渲染后的内容
     *
     * @param       $templateFile
     * @param array $vars
     * @return bool|mixed|string
     */
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