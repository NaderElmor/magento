<?php

namespace Test\Database\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Member extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('test_database_member', 'entity_id');
    }
}
