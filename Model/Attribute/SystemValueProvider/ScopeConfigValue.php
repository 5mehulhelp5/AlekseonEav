<?php
/**
 * Copyright © Alekseon sp. z o.o.
 * http://www.alekseon.com/
 */
namespace Alekseon\AlekseonEav\Model\Attribute\SystemValueProvider;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;

class ScopeConfigValue extends AbstractProvider
{
    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @inheritDoc
     */
    public function getValue(\Alekseon\AlekseonEav\Api\Data\EntityInterface $entity, $attributeCode, $params = [])
    {
        $configPath = $params['path'] ?? false;
        if ($configPath) {
            return $this->scopeConfig->getValue(
                $configPath,
                ScopeInterface::SCOPE_STORE,
                $entity->getStoreId()
            );
        }
        return null;
    }
}
