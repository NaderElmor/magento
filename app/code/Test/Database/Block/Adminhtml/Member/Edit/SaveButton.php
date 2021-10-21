<?php

namespace Test\Database\Block\Adminhtml\Member\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class SaveButton  implements ButtonProviderInterface
{
    public function getButtonData()
    {
        return [
            'label' => _('Save'),
            'class' => 'save primary',
            'sort_order' => 50,

        ];
    }

}
