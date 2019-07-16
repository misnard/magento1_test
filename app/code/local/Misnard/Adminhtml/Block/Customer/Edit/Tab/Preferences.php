<?php

/**
 * Class Misnard_Adminhtml_Block_Customer_Edit_Tab_Preferences
 */
class Misnard_Adminhtml_Block_Customer_Edit_Tab_Preferences extends Mage_Adminhtml_Block_Abstract
{
    /**
     * Misnard_Adminhtml_Block_Customer_Edit_Tab_Preferences constructor.
     * @param array $args
     */
    public function __construct(array $args = array())
    {
        parent::__construct($args);
        $this->setTemplate('misnard/preferences.phtml');
    }

    /**
     * Return customer preferences
     *
     * @return array
     */
    public function getCustomerPreferences()
    {
        $finalPreferences = array();

        if ($this->getCustomerId()) {
            $preferencesOptions = unserialize(Mage::getStoreConfig('customer/preferences/choices'));

            $customerPreferencesModel = Mage::getModel('misnard_customer/preferences');

            $customerPreferences = $customerPreferencesModel
                ->getCollection()
                ->addFieldToFilter('customer_id', $this->getCustomerId())
                ->getFirstItem();

            $customerPreference = explode(',', $customerPreferences->getPreferences());

            $finalPreferences = array();

            foreach ($preferencesOptions as $key => $preferencesOption) {
                foreach ($preferencesOption as $option) {
                    if (in_array($option, $customerPreference)) {
                        $finalPreferences[$key][] = $option;
                    }
                }
            }
        }

        return $finalPreferences;
    }
}