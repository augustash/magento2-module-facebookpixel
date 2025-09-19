<?php

/**
 * Augustash Facebook Pixel
 *
 * Adds the meta pixel tracking script to the HTML head section
 *
 * @author Josh Johnson <josh@augustash.com>
 * @author Adam Cornell <acornell@augustash.com>
 * @copyright 2025 - present August Ash, Inc. (https://augustash.com)
 */

declare(strict_types=1);

namespace Augustash\Facebookpixel\Model;

use Augustash\Facebookpixel\Api\ConfigInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\StoreManagerInterface;

// phpcs:disable Generic.Files.LineLength.TooLong

class Config implements ConfigInterface
{
    /**
     * @param ScopeConfigInterface $scopeConfig
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        protected ScopeConfigInterface $scopeConfig,
        protected StoreManagerInterface $storeManager
    ) {
    }

    /**
     * @inheritdoc
     */
    public function getStoreManager(): StoreManagerInterface
    {
        return $this->storeManager;
    }

    /**
     * @inheritdoc
     */
    public function getValue(string $path, string $scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT, int|string|null $scopeCode = null)
    {
        if (in_array($scope, [ScopeInterface::SCOPE_STORE, ScopeInterface::SCOPE_STORES]) && null === $scopeCode) {
            $scopeCode = $this->getStoreManager()->getStore()->getId();
        }

        if (in_array($scope, [ScopeInterface::SCOPE_WEBSITE, ScopeInterface::SCOPE_WEBSITES]) && null === $scopeCode) {
            $scopeCode = $this->getStoreManager()->getWebsite()->getCode();
        }

        return $this->scopeConfig->getValue($path, $scope, $scopeCode);
    }

    /**
     * @inheritdoc
     */
    public function isEnabled(
        string $scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT,
        int|string|null $scopeCode = null
    ): bool {
        return (bool) $this->getValue(self::XML_PATH_ENABLED, $scope, $scopeCode);
    }

    /**
     * @inheritdoc
     */
    public function isSnippetEnabled(
        string $scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT,
        string|int|null $scopeCode = null
    ): bool {
        if (!$this->isEnabled($scope, $scopeCode)) {
            return false;
        }

        return (bool) $this->getValue(self::XML_PATH_SNIPPET_ENABLED, $scope, $scopeCode);
    }

    /**
     * @inheritdoc
     */
    public function isTrackRevenueEnabled(
        string $scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT,
        string|int|null $scopeCode = null
    ): bool {
        if (!$this->isEnabled($scope, $scopeCode)) {
            return false;
        }

        return (bool) $this->getValue(self::XML_PATH_TRACK_REVENUE, $scope, $scopeCode);
    }

    /**
     * @inheritdoc
     */
    public function getAccountNumber(
        string $scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT,
        string|int|null $scopeCode = null
    ): ?string {
        if (!$this->isEnabled($scope, $scopeCode)) {
            return null;
        }

        return $this->getValue(self::XML_PATH_ACCOUNT_NUMBER, $scope, $scopeCode);
    }
}
