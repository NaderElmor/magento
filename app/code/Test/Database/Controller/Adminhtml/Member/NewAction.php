<?php

namespace Test\Database\Controller\Adminhtml\Member;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\ForwardFactory;
use Magento\Framework\App\ResponseInterface;

class NewAction extends  Action
{
    // internal redirect to the add page
    protected $forwardFactory;
    public function __construct(Context $context, ForwardFactory $forwardFactory)
    {
         $this->forwardFactory = $forwardFactory;
        parent::__construct($context);
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed("Test_Database::parent");
    }

    public function execute()
    {
       $resultForward = $this->forwardFactory->create();

       return $resultForward->forward('edit');
    }
}
