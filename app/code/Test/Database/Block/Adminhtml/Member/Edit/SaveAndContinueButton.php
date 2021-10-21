<?php

namespace Test\Database\Block\Adminhtml\Member\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class SaveAndContinueButton  implements ButtonProviderInterface
{
    public function getButtonData()
    {
        return [
            'label' => _('Save and continue'),
            'class' => 'save',
            'sort_order' => 40,

        ];
    }

}
