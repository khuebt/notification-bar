<?php

namespace Ktd\NotificationBar\Block;

class NotificationBarBottom extends \Magento\Framework\View\Element\Template
{
    const COOKIE_TNF = 'notification-bar-cookie-bottom';
    protected $dataHelper;
    /**
     * @var \Magento\Cms\Model\Template\FilterProvider
     */
    protected $_filterProvider;
    /**
     * @var \Magento\Framework\Stdlib\CookieManagerInterface
     */
    protected $_cookieManager;

    /**
     * NotificationBarBottom constructor.
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Ktd\NotificationBar\Helper\DataBottom           $dataHelper
     * @param \Magento\Cms\Model\Template\FilterProvider       $filterProvide
     * @param \Magento\Framework\Stdlib\CookieManagerInterface $cookieManager
     * @param array                                            $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Ktd\NotificationBar\Helper\DataBottom $dataHelper,
        \Magento\Cms\Model\Template\FilterProvider $filterProvide,
        \Magento\Framework\Stdlib\CookieManagerInterface $cookieManager,
        array $data = []
    ) {
        $this->_filterProvider = $filterProvide;
        $this->_cookieManager = $cookieManager;
        $this->dataHelper = $dataHelper;
        parent::__construct($context, $data);
    }

    public function getAllowGlobal()
    {
        return $this->dataHelper->allowExtension() &&
            $this->_hasNotEmpty() &&
            (!$this->isClosedAndCleared() || !$this->dataHelper->getAllowClosed());
    }

    public function getContent()
    {
        $content = $this->dataHelper->getDefaultContent();
        $html = $this->_filterProvider->getBlockFilter()->filter($content);

        return $html;
    }

    public function isClosedAndCleared()
    {
        //var_dump($_COOKIE);die();
        return $this->_cookieManager->getCookie(self::COOKIE_TNF);
    }

    public function getHelper()
    {
        return $this->dataHelper;
    }

    protected function _hasNotEmpty()
    {
        $content = $this->getContent();

        return !empty($content);
    }
}
