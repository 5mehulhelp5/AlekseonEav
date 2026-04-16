<?php
/**
 * Copyright © Alekseon sp. z o.o.
 * http://www.alekseon.com/
 */
namespace Alekseon\AlekseonEav\Plugin;

use Magento\Framework\App\ObjectManager;

class LoadSystemValuesPlugin
{
    protected $providers = [];

    /**
     * @param \Alekseon\AlekseonEav\Model\ResourceModel\EntityInterface $entity
     * @return void
     */
    public function afterLoad(
        \Alekseon\AlekseonEav\Model\ResourceModel\EntityInterface $subject,
        \Alekseon\AlekseonEav\Model\ResourceModel\EntityInterface $resource,
        \Magento\Framework\Model\AbstractModel $object
    ) {
        foreach ($object->getSystemValues() as $attributeCode => $systemValueData) {
            if ($object->getData($attributeCode) === null) {
                $class = $systemValueData['provider'];
                if (!isset($this->providers[$class])) {
                    $this->providers[$class] = ObjectManager::getInstance()->create($class);
                }
                $provider = $this->providers[$class];
                $object->setData(
                    $attributeCode,
                    $provider->getValue($object, $attributeCode, $systemValueData['params'] ?? [])
                );
                $object->setOrigData($attributeCode, null);
            }
        }
    }
}
