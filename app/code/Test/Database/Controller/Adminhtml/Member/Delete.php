<?php

namespace Test\Database\Controller\Adminhtml\Member;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\RedirectFactory;
use Magento\Framework\View\Result\PageFactory;
use Test\Database\Model\Member;

class Delete extends  Action
{
    protected $model;
    protected $pageFactory;
    // internal redirect to the add page
    protected $resultRedirectFactory;

    public function __construct(
        RedirectFactory $redirectFactory,
        Member $member,
        PageFactory $pageFactory,
        Context $context
    )
    {
        $this->resultRedirectFactory = $redirectFactory;
        $this->model = $member;
        $this->pageFactory = $pageFactory;
        parent::__construct($context);
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed("Test_Database::parent");
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $id = $this->getRequest()->getParam('id');

        if($id){
            $model = $this->model;
            $model->load($id);

            try {
                $model->delete();
                $this->messageManager->addSuccessMessage(__('Member Deleted'));
                return $resultRedirect->setPath('*/*/index');

            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage(__($e->getMessage()));
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);

            }

        }
        return $resultRedirect->setPath('*/*/index');
    }
}
