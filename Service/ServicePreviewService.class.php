<?php

/**
 * author: Jayin <tonjayin@gmail.com>
 */

namespace Devtool\Service;

use PhpParser\Error;
use PhpParser\Node\Stmt\Class_;
use PhpParser\ParserFactory;
use Shop\Service\BaseService;

class ServicePreviewService extends BaseService {

    /**
     * 解析 类文件
     *
     * @param $class_file
     * @return array
     */
    static function parserClassFile($class_file) {
        $ParserFactory = new ParserFactory();
        $parser = $ParserFactory->create(ParserFactory::PREFER_PHP7);

        $code = file_get_contents($class_file);

        $result = [
            'class_name' => '',
            'summary' => '',
            'description' => '',
            'methods' => ''
        ];
        try {
            $stmts = $parser->parse($code);
            // $stmts is an array of statement nodes
            $class = $stmts[0]->stmts[1];
            $result['class_name'] = $class->name;
            //类的说明
            if ($class->getAttributes() && $class->getAttributes()['comments'] && count($class->getAttributes()['comments'])) {
                $comments = $class->getAttributes()['comments'][0]->getText();
                $docblock_result = self::parserDocComment($comments);
                $result['summary'] = $docblock_result['summary'];
                $result['description'] = $docblock_result['description'];
            }

            $public_methods = self::getStaticMethod($class);
            foreach ($public_methods as $index => $method) {
                $m = [];
                $m['name'] = $method->name;
                $m['description'] = '';
                if ($method->getAttributes() && $method->getAttributes()['comments'] && count($method->getAttributes()['comments']) > 0) {
                    $comments = $method->getAttributes()['comments'][0]->getText();
                    $docblock_result = self::parserDocComment($comments);
                    $m['summary'] = $docblock_result['summary'];
                    $m['description'] = $docblock_result['description'];
                }
                $result['methods'][] = $m;
            }

            return self::createReturn(true, $result);
        } catch (Error $e) {
            return self::createReturn(false, null, '解析异常');
        }
    }

    /**
     * 获取静态方法
     *
     * @param Class_ $class_
     * @return array
     */
    private static function getStaticMethod(Class_ $class_) {

        $methods = $class_->stmts;

        $public_methods = [];

        foreach ($methods as $index => $method) {
            //含有static 的
            if ($method->type & Class_::MODIFIER_STATIC) {
                $public_methods[] = $method;
            }
        }

        return $public_methods;
    }

    /**
     * 解析注释块
     *
     * @param string $docComment
     * @return array
     */
    static function parserDocComment($docComment = '') {
        $factory = \phpDocumentor\Reflection\DocBlockFactory::createInstance();
        $docblock = $factory->create($docComment);

        $result = [];
        $result['summary'] = $docblock->getSummary();
        $result['description'] = (string)$docblock->getDescription();

        return $result;
    }

}