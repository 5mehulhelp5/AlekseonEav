<?php
/**
 * Copyright © Alekseon sp. z o.o.
 * http://www.alekseon.com/
 */
namespace Alekseon\AlekseonEav\Model\Attribute\SystemValueProvider;

abstract class AbstractProvider
{
    /**
     * Get System Value for given attribute code and entity
     *
     * @param \Alekseon\AlekseonEav\Api\Data\EntityInterface $entity
     * @param $attributeCode
     * @return mixed
     */
    abstract function getValue(\Alekseon\AlekseonEav\Api\Data\EntityInterface $entity, $attributeCode, $params = []);
}
