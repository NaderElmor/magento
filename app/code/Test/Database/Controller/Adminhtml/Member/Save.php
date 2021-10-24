<?php

namespace Test\Database\Controller\Adminhtml\Member;

use Magento\Backend\Model\View\Result\Forward;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\RedirectFactory;
use Test\Database\Model\Member;

class Save extends Action
{

    private Member $model;
    private RedirectFactory $redirectFactory;

    public function __construct(
        RedirectFactory $redirectFactory,

        Member $Member,
        Context $context
    )
    {

        $this->model = $Member;
        parent::__construct($context);


        $this->redirectFactory = $redirectFactory;
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed("Test_Database::parent");

    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        /** @var Forward $resultForward */

        /** @var Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->redirectFactory->create();

        if ($data){
            $member = $this->getRequest()->getParam('member');

            if (array_key_exists('entity_id',$member)){
                $id = $member['entity_id'];
                $model = $this->model->load($id);
            }

            $model = $this->model->setData($data['member']);

        }

        try {
            $model->save();
            $this->messageManager->addSuccessMessage(__('Member Saved successfully'));
            $this->_getSession()->setFormData(false);
            if ($this->getRequest()->getParam('back')){
                return $resultRedirect->setPath('*/*/edit',['id'=>$model->getId(),'current'=>true]);
            }else{
                return $resultRedirect->setPath('*/*/index');
            }
        }catch (\Exception $e){
            $this->messageManager->addErrorMessage($e->getMessage());
        }

        return $resultRedirect->setPath('*/*/index');

    }
}
