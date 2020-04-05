<?php

namespace Ktd\NotificationBar\Block;

class NotificationBar extends \Magento\Framework\View\Element\Template
{
    const COOKIE_TNF = 'notification-bar-cookie';
    protected $dataHelper;
    protected $_cookieManager;
    /**
     * @var \Magento\Cms\Model\Template\FilterProvider
     */
    protected $_filterProvider;

    /**
     * NotificationBar constructor.
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Ktd\NotificationBar\Helper\Data                 $dataHelper
     * @param \Magento\Cms\Model\Template\FilterProvider       $filterProvide
     * @param \Magento\Framework\Stdlib\CookieManagerInterface $cookieManager
     * @param array                                            $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Ktd\NotificationBar\Helper\Data $dataHelper,
        \Magento\Cms\Model\Template\FilterProvider $filterProvide,
        \Magento\Framework\Stdlib\CookieManagerInterface $cookieManager,
        array $data = []
    ) {
        $this->_cookieManager = $cookieManager;
        $this->_filterProvider = $filterProvide;
        $this->dataHelper = $dataHelper;
        parent::__construct($context, $data);
    }

    /**
     * @return bool
     */
    public function getAllowGlobal()
    {
        $dataHelper = $this->getHelper();

        return $this->dataHelper->allowExtension() &&
            $this->_hasNotEmpty() &&
            (!$this->isClosedAndCleared() || !$this->dataHelper->getAllowClosed());
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        $content = $this->dataHelper->getDefaultContent();
        $html = $this->_filterProvider->getBlockFilter()->filter($content);

        return $html;
    }

    /**
     * @return mixed
     */
    public function isClosedAndCleared()
    {
        //var_dump($_COOKIE);die();
        return $this->_cookieManager->getCookie(self::COOKIE_TNF);
    }

    /**
     * @return \Ktd\NotificationBar\Helper\Data
     */
    public function getHelper()
    {
        return $this->dataHelper;
    }

    /**
     * @return bool
     */
    protected function _hasNotEmpty()
    {
        $content = $this->getContent();

        return !empty($content);
    }
}
