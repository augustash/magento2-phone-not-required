<?php
namespace Codex\PhoneNotRequired\Plugin\Magento\Sales\Model\Order\Address;

class Validator
{
    public function afterValidateForCustomer(
        \Magento\Sales\Model\Order\Address\Validator $subject,
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