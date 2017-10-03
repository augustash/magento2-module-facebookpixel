<?php

namespace Augustash\Facebookpixel\Block;


class Snippet extends \Magento\Framework\View\Element\Template
{
    /**
     * @var boolean
     */
    protected $isEnabled;

    /**
     * @var string
     */
    protected $accountNumber;

    /**
     * Retrieve configuration value for `enabled`
     *
     * @return boolean
     */
    public function getIsEnabled()
    {
        $this->isEnabled = $this->_scopeConfig->getValue(
            'augustash_facebookpixel/general/enabled',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
        return $this->isEnabled;
    }

    /**
     * Retrieve configuration value for `account_number`
     *
     * @return string
     */
    public function getAccountNumber()
    {
        $this->accountNumber = $this->_scopeConfig->getValue(
            'augustash_facebookpixel/general/account_number',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );

        return $this->accountNumber;
    }
}
