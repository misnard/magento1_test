<?php
/**
 * Controller for customer space preferences
 *
 * Class Misnard_Customer_PreferencesController
 */

/** Overload by include path because the magento autoloader doesn't allow controllers overload */
require_once "Mage/Customer/controllers/AccountController.php";

/**
 * Class Misnard_Customer_AccountController
 */
class Misnard_Customer_AccountController extends Mage_Customer_AccountController
{
    /**
     * Controller to see customer preferences in dashboard
     */
    public function preferencesAction()
    {
        $this->loadLayout();
        $this->renderLayout();
    }

    /**
     *  Controller to submit customer preferences
     */
    public function submitPreferencesAction()
    {
        var_dump($this->getRequest()->getParam('preferences'));

        if ($customer = Mage::getSingleton('customer/session')->getCustomer()) {
            $customerPreferencesModel = Mage::getModel('misnard_customer/preferences');

            $customerPreferences = $customerPreferencesModel
                ->getCollection()
                ->addFieldToFilter('customer_id', $customer->getEntityId())
                ->getFirstItem();

            $preferencesParam = $this->getRequest()->getParam('preferences');

            $preferences = implode(',', $preferencesParam);
            $customerPreferences->setPreferences($preferences);
            $customerPreferences->setCustomerId($customer->getEntityId());
            $customerPreferences->save();
        }

        $this->_redirectReferer();
    }
}