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

namespace Augustash\Facebookpixel\Api;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\StoreManagerInterface;

// phpcs:disable Generic.Files.LineLength.TooLong

interface ConfigInterface
{
    public const XML_PATH_ENABLED = 'augustash_facebookpixel/general/enabled';
    public const XML_PATH_ACCOUNT_NUMBER = 'augustash_facebookpixel/general/account_number';
    public const XML_PATH_SNIPPET_ENABLED = 'augustash_facebookpixel/advanced/snippet';
    public const XML_PATH_TRACK_REVENUE = 'augustash_facebookpixel/advanced/revenue';

    /**
     * Returns a store manager object.
     *
     * @return StoreManagerInterface
     */
    public function getStoreManager(): StoreManagerInterface;

    /**
     * Returns a configured value.
     *
     * @param string $path
     * @param string $scope
     * @param string|int|null $scopeCode
     * @return mixed
     */
    public function getValue(
        string $path,
        string $scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT,
        string|int|null $scopeCode = null
    );

    /**
     * Returns the module's configured value.
     *
     * @param string $scope
     * @param string|int|null $scopeCode
     * @return bool
     */
    public function isEnabled(
        string $scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT,
        string|int|null $scopeCode = null
    ): bool;

    /**
     * Check if javascript snippet is added by this module
     *
     * @param string $scope
     * @param string|int|null $scopeCode
     * @return bool
     */
    public function isSnippetEnabled(
        string $scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT,
        string|int|null $scopeCode = null
    ): bool;

    /**
     * Check if revenue tracking is enabled
     *
     * @param string $scope
     * @param string|int|null $scopeCode
     * @return bool
     */
    public function isTrackRevenueEnabled(
        string $scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT,
        string|int|null $scopeCode = null
    ): bool;

    /**
     * Return the module's configured value for 'account_number'
     *
     * @param string $scope
     * @param string|int|null $scopeCode
     * @return string|null
     */
    public function getAccountNumber(
        string $scope = ScopeConfigInterface::SCOPE_TYPE_DEFAULT,
        string|int|null $scopeCode = null
    ): ?string;
}
