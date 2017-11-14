<?php

/**
 * author: Devtool
 */

namespace System\Model;

use Common\Model\BaseRelationModel;

/**
 * {{model_title}}
 *
 * {{model_description}}
 */
class {{name}}Model extends BaseRelationModel {

    protected $tableName = '{{tableName}}';
    /**
     * 启用的字段
     */
    const ENABLE_FIELDS = '{{enable_fields}}';

    /**
     * 获取启用的字段
     * 格式： username,id,age
     */
    function _getEnableFields(){
        return self::ENABLE_FIELDS;
    }

}