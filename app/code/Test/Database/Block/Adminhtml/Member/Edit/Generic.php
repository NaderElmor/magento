<?php

namespace Test\Database\Block\Adminhtml\Member\Edit;

use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Registry;

class Generic
{
    protected $urlBuilder;
    protected $registry;

    /**
     * @param $urlBuilder
     * @param $registry
     */
    public function __construct(Context $context,Registry $registry)
    {
        $this->urlBuilder = $context->getUrlBuilder();
        $this->registry = $registry;
    }


    public function  getId()
    {
        $member =  $this->registry->registry('member');
        return $member ? $member->getId() : null;
    }

    public function  getUrl($route = '', $param = [])
    {
        return $this->urlBuilder->getUrl($route, $param);
    }
}
