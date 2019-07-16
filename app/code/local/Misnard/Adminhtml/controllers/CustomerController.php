<?php

/** Overload by include path because the magento autoloader doesn't allow controllers overload */
require_once "Mage/Adminhtml/controllers/CustomerController.php";

/**
 * Class Misnard_Adminhtml_CustomerController
 */
class Misnard_Adminhtml_CustomerController extends Mage_Adminhtml_CustomerController
{
    /**
     * Controller for admin customer preference Action
     */
    public function preferencesAction()
    {
        $this->_initCustomer();
        $this->getResponse()->setBody(
            $this->getLayout()
                ->createBlock('misnard_adminhtml/customer_edit_tab_preferences','admin_customer_preferences')
                ->setCustomerId(Mage::registry('current_customer')->getId())
                ->setUseAjax(true)
                ->toHtml()
        );
    }
}