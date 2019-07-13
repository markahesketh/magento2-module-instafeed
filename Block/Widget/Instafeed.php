<?php

namespace MarkHesketh\Instafeed\Block\Widget;

use Magento\Framework\View\Element\Template;
use Magento\Store\Model\ScopeInterface;
use Magento\Widget\Block\BlockInterface;

class Instafeed extends Template implements BlockInterface
{
    public function _toHtml(): string
    {
        if (!$this->isEnabled()) {
            return '';
        }

        $this->setTemplate('widget/instafeed.phtml');

        return parent::_toHtml();
    }

    public function isEnabled(): bool
    {
        return (bool)$this->_scopeConfig->getValue('markhesketh_instafeed/account_info/enabled', ScopeInterface::SCOPE_STORE);
    }

    public function getUserId(): int
    {
        return (int)$this->_scopeConfig->getValue('markhesketh_instafeed/account_info/user_id', ScopeInterface::SCOPE_STORE);
    }

    public function getAccessToken(): string
    {
        return $this->_scopeConfig->getValue('markhesketh_instafeed/account_info/access_token', ScopeInterface::SCOPE_STORE);
    }

    public function getInstafeedLimit(): int
    {
        return (int)$this->_scopeConfig->getValue('markhesketh_instafeed/feed_display/instafeed_limit', ScopeInterface::SCOPE_STORE);
    }

    public function getInstafeedTemplate(): string
    {
        $template = $this->_scopeConfig->getValue('markhesketh_instafeed/feed_display/instafeed_template', ScopeInterface::SCOPE_STORE);

        return preg_replace('/\s+/', ' ', trim($template));
    }
}
