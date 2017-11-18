<?php

/**
 * author: Jayin <tonjayin@gmail.com>
 */

namespace Devtool\Service;

class ModelBuilderService extends DevtoolService {

    /**
     * 创建模型
     *
     * @param        $model_id
     * @param string $name 表名，首字母大写
     * @param string $tableName
     * @param bool   $force_create 是否强制生成
     * @return array
     */
    static function createModel($model_id, $name = '', $tableName = '', $force_create = false) {
        $model = M('model')->where(['modelid' => $model_id])->find();
        $model_fields = M('modelField')->where(['modelid' => $model_id])->order('listorder ASC')->select();

        if (empty($name)) {
            $name = ucfirst($model['tablename']);
        }

        if (empty($tableName)) {
            $tableName = $model['tablename'];
        }

        //筛选出没有禁用的字段
        $enable_fields = ['id'];
        foreach ($model_fields as $index => $field) {
            if ($field['disabled'] == 0 && $field['issystem'] == 1) {
                $enable_fields[] = $field['field'];
            }
        }

        $vars = [
            'model_title' => $model['name'],
            'model_description' => $model['description'],
            'name' => $name,
            'tableName' => $tableName,
            'enable_fields' => join(',', $enable_fields),
            'create_date' => date('Y-m-d H:i:s')
        ];

        $templateFile = APP_PATH . 'Devtool' . DIRECTORY_SEPARATOR . 'Data' . DIRECTORY_SEPARATOR . 'Model' . DIRECTORY_SEPARATOR . 'TplModel.tpl';

        $targetFile = self::getSystemModulePath() . 'Model' . DIRECTORY_SEPARATOR . $name . 'Model.class.php';

        if ($force_create || !file_exists($targetFile)) {
            $content = self::fetchContent($templateFile, $vars);
            file_put_contents($targetFile, $content);
        } else {
            return self::createReturn(false, null, '模型 ' . $name . 'Model 已经存在');
        }

        return self::createReturn(true, null, '操作成功');
    }

    /**
     * 根据表名修正为驼峰式命名
     *
     * @param $tablename
     * @return string
     */
    static function fixTablename($tablename){
        $names = explode('_',$tablename);

        foreach ($names as $index => $name){
            $names[$index] = ucfirst($name);
        }

        return implode('', $names);

    }

}