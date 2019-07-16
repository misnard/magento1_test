<?php

/**
 * Class Misnard_Adminhtml_Block_Customer_Edit_Tabs
 */
class Misnard_Adminhtml_Block_Customer_Edit_Tabs extends Mage_Adminhtml_Block_Customer_Edit_Tabs
{
    /**
     * @return Mage_Core_Block_Abstract
     */
    public function _beforeToHtml()
    {
        $this->addTab('CustomerPreferences', array(
            'label' => Mage::helper('customer')->__('Customer Preferences'),
            'class' => 'ajax',
            'url' => $this->getUrl('*/*/preferences', array('_current' => true)),
        ));

        return parent::_beforeToHtml();
    }
}