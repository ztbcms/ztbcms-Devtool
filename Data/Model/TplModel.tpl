<?php

/**
 * author: Devtool
 * created: {{create_date}}
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
        $modelid = M('model')->where(['tablename' => $this->tableName])->getField('modelid');
        $field_arr = M('model_field')->where(['modelid' => $modelid, 'issystem' => 1, 'disabled' => 0])->getField('field', true);
        if($field_arr){
            $field_str = implode(',', $field_arr);
            $field_str .= ',id';
        }else{
            $field_str = '*';
        }
        return $field_str;
    }

}
