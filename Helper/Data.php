<?php

namespace Augustash\Facebookpixel\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{

    const XML_PATH_ENABLED = 'augustash_facebookpixel/general/enabled';
    const XML_PATH_SNIPPET_ENABLED = 'augustash_facebookpixel/advanced/snippet';
    const XML_PATH_TRACK_REVENUE = 'augustash_facebookpixel/general/account_number';
    const XML_PATH_ACCOUNT_NUMBER = 'augustash_facebookpixel/general/account_number';

    /**
     * @var boolean
     */
    protected $isEnabled;

    /**
     * @var boolean
     */
    protected $isSnippetEnabled;

    /**
     * @var boolean
     */
    protected $revenueEnabled;

    /**
     * @var string
     */
    protected $accountNumber;

    /**
     * Check if module is enabled
     *
     * @return boolean
     */
    public function isEnabled($storeId = null)
    {
        $this->isEnabled = $this->getConfig(self::XML_PATH_ENABLED, $storeId);

        return $this->isEnabled;
    }

    /**
     * Check if javascript snippet is added by this module
     *
     * @return boolean
     */
    public function isSnippetEnabled($storeId = null)
    {
        $this->isSnippetEnabled = $this->getConfig(self::XML_PATH_SNIPPET_ENABLED, $storeId);

        return $this->isSnippetEnabled;
    }

    /**
     * Check if revenue tracking is enabled
     *
     * @return boolean
     */
    public function trackRevenue($storeId = null)
    {
        $this->revenueEnabled = $this->getConfig(self::XML_PATH_TRACK_REVENUE, $storeId);

        return $this->revenueEnabled;
    }

    /**
     * Retrieve configuration value for `account_number`
     *
     * @return string
     */
    public function accountNumber($storeId = null)
    {
        $this->accountNumber = $this->getConfig(self::XML_PATH_ACCOUNT_NUMBER, $storeId);

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
