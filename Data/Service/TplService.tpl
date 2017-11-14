<?php

/**
 * author: Devtool
 * created: {{create_date}}
 */

namespace System\Service;

/**
 * {{service_title}}服务
 */
class {{model_name}}Service extends BaseService {

    /**
     * 根据ID获取{{service_title}}
     *
     * @param $id
     * @return array
     */
    static function get{{model_name}}ById($id) {
        return self::find('{{model_name}}', ['id' => $id]);
    }


    /**
     * 获取{{service_title}}列表
     *
     * @param array  $where
     * @param string $order
     * @param int    $page
     * @param int    $limit
     * @param bool   $isRelation
     * @return array
     */
    static function get{{model_name}}List($where = [], $order = '', $page = 1, $limit = 20, $isRelation = false) {
        return self::select('{{model_name}}', $where, $order, $page, $limit, $isRelation);
    }

    /**
     * 添加{{service_title}}
     *
     * @param array $data
     * @return array
     */
    static function create{{model_name}}($data = []) {
        return self::create('{{model_name}}', $data);
    }

    /**
     * 更新{{service_title}}
     *
     * @param       $id
     * @param array $data
     * @return array
     */
    static function update{{model_name}}($id, $data = []) {
        return self::update('{{model_name}}', ['id' => $id], $data);
    }

    /**
     * 删除{{service_title}}
     *
     * @param $id
     * @return array
     */
    static function delete{{model_name}}ById($id) {
        return self::delete('{{model_name}}', ['id' => $id]);
    }
}