<?php

namespace Test\Database\Block\Adminhtml\Member\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class ResetButton  implements ButtonProviderInterface
{
    public function getButtonData()
    {
        return [
            'label' => _('Reset'),
            'on_click' => 'location.reload()',
            'class' => 'reset',
            'sort_order' => 30,

        ];
    }


}
