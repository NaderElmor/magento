<?php

namespace Test\Database\Controller\Adminhtml\Member;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Test\Database\Model\ResourceModel\Member\CollectionFactory;
use Magento\Backend\Model\View\Result\RedirectFactory;

class MassDelete extends Action
{
    private CollectionFactory $collectionFactory;
    private Filter $filter;
    private RedirectFactory $redirectFactory;

    public function __construct(
        RedirectFactory $redirectFactory,
        CollectionFactory $collectionFactory,
        Filter $filter,
        Context $context)
    {
        parent::__construct($context);
        $this->collectionFactory = $collectionFactory;
        $this->filter = $filter;
        $this->redirectFactory = $redirectFactory;
    }

    public function execute()
    {
        $collection = $this->filter->getCollection($this->collectionFactory->create());
        $i = 0;
        foreach ($collection as $item){
            $item->delete();
            $i++;
        }

        $this->messageManager->addSuccessMessage(__('A total of '. $i.' have been deleted'));

        $resultRedirect = $this->redirectFactory->create();
        return $resultRedirect->setPath('*/*/index');

    }
}
