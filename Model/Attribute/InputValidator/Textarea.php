<?php
/**
 * Copyright © Alekseon sp. z o.o.
 * http://www.alekseon.com/
 */
namespace Alekseon\AlekseonEav\Model\Attribute\InputValidator;

/**
 * Class Textarea
 * @package Alekseon\AlekseonEav\Model\Attribute\InputValidator
 */
class Textarea extends AbstractValidator
{
    /**
     * @param $value
     * @return bool
     */
    public function validateValue($value)
    {
        $maxLength = $this->attribute->getInputParam('maxlength');
        if ($maxLength && strlen($value) > $maxLength) {
            return false;
        }
        return true;
    }

    /**
     * @return array|string[]
     */
    public function getValidationFieldClass()
    {
        $maxLength = $this->attribute->getInputParam('maxlength');
        if ($maxLength) {
            return 'validate-length maximum-length-' . $maxLength;
        }

        return '';
    }

    /**
     * @return bool[]
     */
    public function getDataValidateParams()
    {
        $maxLength = $this->attribute->getInputParam('maxlength');
        if ($maxLength) {
            return [
                'validate-length' => true,
            ];
        }

        return [];
    }
}
