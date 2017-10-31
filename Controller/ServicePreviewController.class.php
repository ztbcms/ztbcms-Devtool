<?php

/**
 * author: Jayin <tonjayin@gmail.com>
 */

namespace Devtool\Controller;

use Devtool\Service\ServicePreviewService;

/**
 * 服务预览
 */
class ServicePreviewController extends DevtoolController {

    /**
     * 服务列表
     */
    function serviceList(){
        $serviceList = ServicePreviewService::getSystemService()['data'];
        $this->assign('serviceList', $serviceList);
        $this->display();
    }

    /**
     * 展示服务
     */
    function showService(){
        $service_file = I('service_file','','urldecode');
        $service = ServicePreviewService::parserClassFile($service_file)['data'];

        $this->assign('service', $service);
        $this->display();
    }

}