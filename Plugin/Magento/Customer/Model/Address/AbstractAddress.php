<?php
namespace Codex\PhoneNotRequired\Plugin\Magento\Customer\Model\Address;

class AbstractAddress
{
    public function afterValidate(
        \Magento\Customer\Model\Address\AbstractAddress $subject,
        $result
    ) {
        if (!is_array($result)) {
            return $result;
        }
        $key = array_search(__('Please enter the phone number.'), $result);
        if ($key !== false) {
            unset($result[$key]);
        }
        if (empty($result)) {
            return true;
        }
        return array_values($result);
    }
}