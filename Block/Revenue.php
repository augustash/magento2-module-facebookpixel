<?php

namespace Augustash\Facebookpixel\Block;

use Magento\Checkout\Block\Onepage\Success;
use Augustash\Facebookpixel\Block\Snippet as SnippetHelper;

/**
 * One page checkout success page
 */
class Revenue extends \Magento\Framework\View\Element\Template
{
	/**
     * @var boolean
     */
    protected $revenueEnabled;

	/**
     * @var \Magento\Checkout\Model\Session
     */
	protected $checkoutSession;

	public function __construct(
	        \Magento\Framework\View\Element\Template\Context $context,
	        \Magento\Checkout\Model\Session $checkoutSession,
	        SnippetHelper $snippet,
	        array $data = []
	    )
	{
		$this->snippet = $snippet;
	    $this->checkoutSession = $checkoutSession;

        parent::__construct($context, $data);
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

    /**
     * Check that revenue tracking is enabled in admin
     *
     * @return boolean
     */
    public function getTrackRevenue()
    {
    	$this->revenueEnabled = $this->_scopeConfig->getValue(
            'augustash_facebookpixel/advanced/revenue',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );

        return $this->revenueEnabled;
    }
}