<?php

namespace Augustash\Facebookpixel\Block;

use Magento\Checkout\Block\Onepage\Success;
use Augustash\Facebookpixel\Helper\Data as FacebookpixelHelperData;

/**
 * One page checkout success page
 */
class Revenue extends \Magento\Framework\View\Element\Template
{
	/**
     * @var \Augustash\Facebookpixel\Helper\Data
     */
	protected $helper;

	/**
     * @var \Magento\Checkout\Model\Session
     */
	protected $checkoutSession;

	/**
     * class constructor
     *
     * @param \Magento\Framework\View\Element\Template\Context  $context
     * @param FacebookpixelHelperData                           $helper
     * @param array                                             $data
     */
	public function __construct(
	        \Magento\Framework\View\Element\Template\Context $context,
	        FacebookpixelHelperData $helper,
	        \Magento\Checkout\Model\Session $checkoutSession,
	        array $data = []
	    )
	{
		$this->helper = $helper;
	    $this->checkoutSession = $checkoutSession;

        parent::__construct($context, $data);
	}

	/**
     * Check if Facebookpixel module is enabled
     *
     * @return boolean
     */
    public function getIsEnabled()
    {
        return $this->helper->isEnabled();
    }

    /**
     * Check if Facebookpixel module advanced revenue tracking is enabled
     *
     * @return boolean
     */
    public function getRevenueEnabled()
    {
        return $this->helper->trackRevenue();
    }

    /**
	 *	Return last total amount from checkout session
	 *
     * @return string
     */
	public function getRevenue()
	{
		$order = $this->checkoutSession->getLastRealOrder();

		return $order->getData('total_due');
    }
}
