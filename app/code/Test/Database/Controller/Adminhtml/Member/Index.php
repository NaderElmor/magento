<?php

namespace Test\Database\Controller\Adminhtml\Member;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;


class Index extends Action
{
    private  $pageFactory;
    public function __construct(Context $context, PageFactory $pageFactory)
    {
        $this->pageFactory = $pageFactory;
        parent::__construct($context);
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed("Test_Database::parent");
    }


    public function execute()
    {
       return $this->pageFactory->create();
    }



}
