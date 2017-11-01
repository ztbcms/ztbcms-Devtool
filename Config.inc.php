<?php

// +----------------------------------------------------------------------
// | 模块配置
// +----------------------------------------------------------------------

return array(
	//模块名称
	'modulename' => 'ZTBCMS开发者工具',
	//图标
	'icon' => 'https://dn-coding-net-production-pp.qbox.me/e57af720-f26c-4f3b-90b9-88241b680b7b.png',
	//模块简介
	'introduce' => 'ZTBCMS开发着工具',
	//模块介绍地址
	'address' => 'http://doc.ztbcms.com/module/cron/',
	//模块作者
	'author' => 'ZTBCMS',
	//作者地址
	'authorsite' => 'http://www.ztbcms.com',
	//作者邮箱
	'authoremail' => 'admin@ztbcms.com',
	//版本号，请不要带除数字外的其他字符
	'version' => '0.1.0.0',
	//适配最低版本，
	'adaptation' => '3.7.0.0',//TODO 至少依赖 3.7.2.7 以上
	//签名
	'sign' => 'd98e19e9a5eb746f5c5fe5309b3c806e',
	//依赖模块
    /**
     *  依赖：
        "nikic/php-parser": "^3.1",
        "phpdocumentor/reflection-docblock": "^4.1"
     */
	'depend' => array(),
);
