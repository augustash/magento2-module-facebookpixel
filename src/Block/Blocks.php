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

namespace Augustash\Facebookpixel\Block;

use Augustash\Facebookpixel\Helper\Data as FacebookpixelHelperData;
use Magento\Checkout\Model\Session as CheckoutSession;
use Magento\Framework\View\Element\Template as ParentClass;
use Magento\Framework\View\Element\Template\Context;

class Blocks extends ParentClass
{
    /**
     * @param FacebookpixelHelperData $helper
     * @param Context  $context
     * @param array $data
     */
    public function __construct(
        protected FacebookpixelHelperData $helper,
        protected CheckoutSession $checkoutSession,
        Context $context,
        array $data = []
    ) {
        $this->helper = $helper;
        $this->checkoutSession = $checkoutSession;

        parent::__construct($context, $data);
    }

    /**
     * Check if Facebookpixel module is enabled
     *
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->helper->isEnabled();
    }

    /**
     * Check if Facebookpixel module advanced javascript to header is enabled
     *
     * @return bool
     */
    public function isSnippetEnabled(): bool
    {
        return (bool) $this->helper->isSnippetEnabled();
    }

    /**
     * Check if Facebookpixel module advanced revenue tracking is enabled
     *
     * @return bool
     */
    public function isTrackRevenueEnabled(): bool
    {
        return (bool) $this->helper->isTrackRevenueEnabled();
    }

    /**
     * Retrieve configuration value for `account_number`
     *
     * @return string|null
     */
    public function getAccountNumber(): ?string
    {
        return $this->helper->getAccountNumber();
    }

    /**
     *  Return last total amount from checkout session
     *
     * @return string
     */
    public function getRevenue(): string
    {
        $order = $this->checkoutSession->getLastRealOrder();

        return (string) $order->getData('total_due');
    }
}
