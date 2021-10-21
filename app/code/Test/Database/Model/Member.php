<?php

namespace Test\Database\Model;

use Magento\Framework\Model\AbstractModel;
use Test\Database\Model\ResourceModel\Member as MemberResource;

class Member extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(MemberResource::class);
    }
}
