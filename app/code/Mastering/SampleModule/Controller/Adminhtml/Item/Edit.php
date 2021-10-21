<?php

namespace Mastering\SampleModule\Controller\Adminhtml\Item;

use Magento\Framework\App\Action\HttpGetActionInterface;

class Edit extends \Magento\Cms\Controller\Adminhtml\Block implements HttpGetActionInterface
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
    \Magento\Backend\App\Action\Context $context,
    \Magento\Framework\Registry $coreRegistry,
    \Magento\Framework\View\Result\PageFactory $resultPageFactory
) {
    $this->resultPageFactory = $resultPageFactory;
    parent::__construct($context, $coreRegistry);


}

    /**
     * Edit CMS block
     *
     * @return \Magento\Framework\Controller\ResultInterface
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
{
    // 1. Get ID and create model
    $id = $this->getRequest()->getParam('id');
    var_dump($id);
    exit();
    $model = $this->_objectManager->create( \Mastering\SampleModule\Model\Item::class);

//    // 2. Initial checking
//    if ($id) {
//        $model->load($id);
//        if (!$model->getId()) {
//            $this->messageManager->addErrorMessage(__('This item no longer exists.'));
//            /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
//            $resultRedirect = $this->resultRedirectFactory->create();
//            return $resultRedirect->setPath('*/*/');
//        }
//    }
//
//    $this->_coreRegistry->register('item', $model);
//
//    // 5. Build edit form
//    /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
//    $resultPage = $this->resultPageFactory->create();
//    $this->initPage($resultPage)->addBreadcrumb(
//        $id ? __('Edit ') : __('New '),
//        $id ? __('Edit ') : __('New ')
//    );
//    $resultPage->getConfig()->getTitle()->prepend(__('Items'));
//    $resultPage->getConfig()->getTitle()->prepend($model->getId() ? $model->getTitle() : __('New Item'));
//    return $resultPage;
}

}


