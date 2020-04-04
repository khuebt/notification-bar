<?php

namespace Khuetd\NotificationBar\Helper;


/**
 * Catalog data helper
 */
class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    /**
     * ScopeConfigInterface scopeConfig
     *
     * @var scopeConfig
     */
    protected $scopeConfig;
    const SCOPE_TYPE_BAR = 'store';

    /**
     * @param CustomerSession $customerSession
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context
    ) {
        parent::__construct($context);
    }

    public function allowExtension()
    {
        return $this->scopeConfig->getValue('notificationbar_config/general/enabledisable', self::SCOPE_TYPE_BAR);
    }

    public function getDefaultStyling()
    {
        return $this->scopeConfig->getValue('notificationbar_config/general/defaultstyling', self::SCOPE_TYPE_BAR);
    }

    public function getDefaultContent()
    {
        return $this->scopeConfig->getValue('notificationbar_config/general/defaultcontent', self::SCOPE_TYPE_BAR);
    }

    public function getAllowClosed()
    {
        return $this->scopeConfig->getValue('notificationbar_config/general/allowclosed', self::SCOPE_TYPE_BAR);
    }

    public function getAllowClosedSecond()
    {
        return $this->scopeConfig->getValue('notificationbar_config/general/allowclosedsecond', self::SCOPE_TYPE_BAR);
    }

    public function getNbidentifier()
    {
        return $this->scopeConfig->getValue('notificationbar_config/general/nbidentifier', self::SCOPE_TYPE_BAR);
    }

    public function getFixedNotificationBar()
    {
        return $this->scopeConfig->getValue('notificationbar_config/general/fixednotificationbar', self::SCOPE_TYPE_BAR);
    }

    public function getFixedNotificationBarMargin()
    {
        return $this->scopeConfig->getValue('notificationbar_config/general/fixednotificationbarmargin', self::SCOPE_TYPE_BAR);
    }
}
