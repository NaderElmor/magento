<?php

namespace Test\Database\Model\Ui;

use Test\Database\Model\ResourceModel\Member\CollectionFactory;
use Magento\Ui\DataProvider\AbstractDataProvider;
use function PHPUnit\Framework\arrayHasKey;

class DataProvider extends AbstractDataProvider
{
    protected  $loadedData;
    public function __construct(
        CollectionFactory $collectionFactory,
        $name,
        $primaryFieldName,
        $requestFieldName,
        array $meta = [],
        array $data = [])
    {
        $this->collection = $collectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if(isset($this->loadedData)){
            return $this->loadedData;
        }

        $items = $this->collection->getItems();

        $this->loadedData = array();

        foreach ($items as $member){
            $this->loadedData[$member->getId()]['member'] = $member->getData();
        }

        return $this->loadedData;
    }
}
