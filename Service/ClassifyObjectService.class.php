<?php

/**
 * author: Jayin <tonjayin@gmail.com>
 */

namespace Devtool\Service;

use phpDocumentor\Reflection\DocBlock;
use System\Service\BaseService;

class ClassifyObjectService extends BaseService {

    /**
     * @param $class_object
     * @return array|\ReflectionProperty[]
     */
    static function getAllProperties($class_object){
        $properties = [];
        $reflect = new \ReflectionClass($class_object);
        $class_properties = $reflect->getProperties(\ReflectionProperty::IS_PRIVATE);
        foreach ($class_properties as $index => $class_property){

            $properties[] = [
                'name' => $class_property->getName(),
                'value' => '',
                'docComment' => self::makeDocComment($class_property->getDocComment()),
                'declaringClass' => $class_property->getDeclaringClass()->getName(),
                'modifiers' => $class_property->getModifiers(),
            ];
        }

        $parentClass = $reflect->getParentClass();

        if($parentClass){
            return array_merge($properties, self::getAllProperties($parentClass->name));
        }

        return $properties;
    }

    private static function makeDocComment($docComemnt = ''){
        if(!$docComemnt){
            return null;
        }

        $factory  = \phpDocumentor\Reflection\DocBlockFactory::createInstance();
        $docBlock = $factory->create($docComemnt);

        $tag_var = self::getVarTagFromTagList($docBlock, 'var');
        return [
            'name' => $docBlock->getSummary(),
            'type' => $tag_var->getType(),
            'description' => $docBlock->getDescription()
        ];
    }


    /**
     * @param DocBlock $docBlock
     * @param string $tag_name
     * @return null|DocBlock\Tags\Var_
     */
    private static function getVarTagFromTagList(DocBlock $docBlock, $tag_name){
        $tag_vars = $docBlock->getTagsByName('var');

        foreach ($tag_vars as $index => $tag){
            if($tag instanceof DocBlock\Tags\Var_){
                return $tag;
            }
        }

        return null;
    }


    /**
     * @param $property_name
     * @return string
     */
    private static function makeGetMethodByPropertyName($property_name){
        $strings = explode('_', $property_name);
        foreach ($strings as $index => $string){
            $strings[$index] = ucfirst($string);
        }

        return 'get'.implode('', $strings);
    }
}