<?php
namespace Codex\PhoneNotRequired\Plugin\Model\Quote;

class Address
{
    public function afterValidate(\Magento\Quote\Model\Quote\Address $subject, $result)
    {
        if (is_array($result)) {
            $blacklist = array(
                __('Please enter the phone number.')
            );
            $result = array_diff($result, $blacklist);

            if (count($result) == 0) {
                return true;
            }
        }

        return $result;
    }
}