<?php


namespace Test\Database\Controller\Adminhtml\Member;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Test\Database\Model\Member;
use Magento\Backend\App\Action;


class Edit extends Action
{
    protected  $pageFactory;
    protected  $member;
    protected  $registry;
    public function __construct(Context $context, PageFactory $pageFactory,Member $member,Registry $registry)
    {

        $this->member = $member;
        $this->pageFactory = $pageFactory;
        $this->registry = $registry;
        parent::__construct($context);
    }
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed("Test_Database::parent");
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam("id");


        //model instance
        $model = $this->member;

        if($id){
            $model->load($id);
            // If the model does not loaded
            if(!$model->getId()) {
                $this->messageManager->addErrorMessage(_('This member does not exist'));
                //redirect
                $result = $this->resultRedirectFactory->create();
                return  $result->setPath('page/member/index');
            }
        }


        $data = $this->_getSession()->getFormData(true);

        if(!empty($data)){
            $model->setData($data);
        }

        $this->registry->register('member', $model);
        $resultPage = $this->pageFactory->create();
        $resultPage->addBreadcrumb($id ? __('Edit Member') : __('Add a new Member'),"");

        if($id){
            $resultPage->getConfig()->getTitle()->prepend('Edit');
        } else {
            $resultPage->getConfig()->getTitle()->prepend('Add');
        }

        return  $resultPage;
    }



}
