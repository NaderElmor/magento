<?php

namespace Test\Database\Controller\Page;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Test\Database\Model\MemberFactory;


class Index extends Action
{
    protected  $memberFactory;

    public function __construct(Context $context, MemberFactory $memberFactory)
    {
        $this->memberFactory = $memberFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        /*
        $member = $this->memberFactory->create();
        $member->addData(['name' => 'Khaled', 'status' => false]);
        $member->save();
        $loaded_member =  $member->load(3); //load the member with the id 2
        $loaded_member->delete();

        $loaded_member->setName('Nader'); //update the name
        $loaded_member->save(); //save the updated
        dd($loaded_member->getData());
        */

        // Deal with collections
        $member = $this->memberFactory->create();
        $collection = $member->getCollection()
                             ->addFieldToSelect('name')
                             ->addFieldToFilter('name', ['like' => 'n%']);
        foreach ($collection as $_member){
            echo "<pre>";
                print_r($_member->getData());
            echo "</pre>";
        }


    }
}
