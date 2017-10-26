<?php

/**
 * author: Jayin <tonjayin@gmail.com>
 */

namespace Devtool\Service;

class ModelBuilderService extends DevtoolService {

    /**
     * @param        $model_id
     * @param string $name 表名，首字母大写
     * @param string $tableName
     * @param string $description
     * @return array
     */
    static function createModel($model_id, $name = '', $tableName = '', $description = '') {
        $model = M('model')->where(['modelid' => $model_id])->find();
        //, 'disabled' => 0
        $model_fields = M('modelField')->where(['modelid' => $model_id])->order('listorder ASC')->select();

        if (empty($name)) {
            $name = ucfirst($model['tablename']);
        }

        if (empty($tableName)) {
            $tableName = $model['tablename'];
        }

        if (empty($description)) {
            $description = $model['name'];
        }
        $enable_fields = [];
        foreach ($model_fields as $index => $field) {
            if ($field['disabled'] == 0) {
                $enable_fields[] = $field['field'];
            }
        }

        $vars = [
            'name' => $name,
            'description' => $description,
            'tableName' => $tableName,
            'enable_fields' => join(',', $enable_fields)
        ];

        $templateFile = APP_PATH . 'Devtool' . DIRECTORY_SEPARATOR . 'Data' . DIRECTORY_SEPARATOR . 'Model' . DIRECTORY_SEPARATOR . 'TplModel.tpl';

        $targetFile = self::getSystemModulePath() . 'Model' . DIRECTORY_SEPARATOR . $name . 'Model.class.php';

        if (!file_exists($targetFile)) {
            $content = self::fetchContent($templateFile, $vars);
            file_put_contents($targetFile, $content);
        } else {
            return self::createReturn(false, null, '模型 ' . $name . 'Model 已经存在');
        }

        return self::createReturn(true, null, '操作成功');
    }

}