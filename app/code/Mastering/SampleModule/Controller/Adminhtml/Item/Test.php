<?php

namespace Mastering\SampleModule\Controller\Adminhtml\Item;

use Magento\Framework\Controller\ResultFactory;

class Test extends \Magento\Backend\App\Action
{
    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
