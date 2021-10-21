<?php

namespace Test\Database\Model\ResourceModel\Member;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Test\Database\Model\Member;
use Test\Database\Model\ResourceModel\Member as MemberResource;

class Collection  extends  AbstractCollection
{
    protected $_idFieldName = "entity_id";

    protected function _construct()
    {
        $this->_init(Member::class, MemberResource::class);
    }
}
