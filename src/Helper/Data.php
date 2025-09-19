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

namespace Augustash\Facebookpixel\Helper;

use Augustash\Facebookpixel\Api\ConfigInterface;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;

class Data extends AbstractHelper
{
    /**
     * @param ConfigInterface $config
     * @param Context $context
     */
    public function __construct(
        protected ConfigInterface $config,
        Context $context
    ) {
        parent::__construct($context);
    }

    /**
     * Check if module is enabled
     *
     * @return bool
     */
    public function isEnabled(): bool
    {
        return (bool) $this->config->isEnabled();
    }

    /**
     * Check if javascript snippet is added by this module
     *
     * @return bool
     */
    public function isSnippetEnabled(): bool
    {
        return (bool) $this->config->isSnippetEnabled();
    }

    /**
     * Check if revenue tracking is enabled
     *
     * @return bool
     */
    public function isTrackRevenueEnabled(): bool
    {
        return $this->config->isTrackRevenueEnabled();
    }

    /**
     * Retrieve configuration value for 'account_number'
     *
     * @return string|null
     */
    public function getAccountNumber(): ?string
    {
        return $this->config->getAccountNumber();
    }
}
