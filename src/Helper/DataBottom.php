<?php

namespace Ktd\NotificationBar\Helper;


/**
 * Catalog data helper
 */
class DataBottom extends \Magento\Framework\App\Helper\AbstractHelper
{
    const SCOPE_TYPE_BAR = 'store';
    /**
     * ScopeConfigInterface scopeConfig
     *
     * @var scopeConfig
     */
    protected $scopeConfig;

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
        return $this->scopeConfig->getValue('notificationbar_config/generalbottom/enabledisable', self::SCOPE_TYPE_BAR);
    }

    public function getDefaultStyling()
    {
        return $this->scopeConfig->getValue('notificationbar_config/generalbottom/defaultstyling', self::SCOPE_TYPE_BAR);
    }

    public function getDefaultContent()
    {
        return $this->scopeConfig->getValue('notificationbar_config/generalbottom/defaultcontent', self::SCOPE_TYPE_BAR);
    }

    public function getAllowClosed()
    {
        return $this->scopeConfig->getValue('notificationbar_config/generalbottom/allowclosed', self::SCOPE_TYPE_BAR);
    }

    public function getAllowClosedSecond()
    {
        return $this->scopeConfig->getValue('notificationbar_config/generalbottom/allowclosedsecond', self::SCOPE_TYPE_BAR);
    }

    public function getNbidentifier()
    {
        return $this->scopeConfig->getValue('notificationbar_config/generalbottom/nbidentifier', self::SCOPE_TYPE_BAR);
    }

    public function getFixedNotificationBar()
    {
        return $this->scopeConfig->getValue('notificationbar_config/generalbottom/fixednotificationbar', self::SCOPE_TYPE_BAR);
    }

    public function getFixedNotificationBarMargin()
    {
        return $this->scopeConfig->getValue('notificationbar_config/generalbottom/fixednotificationbarmargin', self::SCOPE_TYPE_BAR);
    }
}
