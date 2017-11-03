<?php

namespace Augustash\Facebookpixel\Helper;

use Augustash\Crazyegg\Helper\Data as CrazyeggHelperData;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * @var boolean
     */
    protected $isEnabled;

    /**
     * @var boolean
     */
    protected $revenueEnabled;

    /**
     * @var string
     */
    protected $accountNumber;

    /**
     * Retrieve configuration value for `enabled`
     *
     * @return boolean
     */
    public function isEnabled()
    {
        $this->isEnabled = $this->getConfig('augustash_facebookpixel/general/enabled');

        return $this->isEnabled;
    }

    /**
     * Check that revenue tracking is enabled in admin
     *
     * @return boolean
     */
    public function trackRevenue()
    {
        $this->revenueEnabled = $this->getConfig('augustash_facebookpixel/advanced/revenue');

        return $this->revenueEnabled;
    }

    /**
     * Retrieve configuration value for `account_number`
     *
     * @return string
     */
    public function accountNumber()
    {
        $this->accountNumber = $this->getConfig('augustash_facebookpixel/general/account_number');

        return $this->accountNumber;
    }

    /**
     * Utility function to ease fetching of values from the Stores > Configuration
     *
     * @param  string           $field      # see the etc/adminhtml/system.xml for field names
     * @param  null|integer     $storeId    # Magento store ID
     * @return mixed
     */
    protected function getConfig($field, $storeId = null)
    {
        return $this->scopeConfig->getValue(
            $field,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
            $storeId
        );
    }
}
