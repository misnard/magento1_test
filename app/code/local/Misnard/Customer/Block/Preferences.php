<?php

/**
 * Class Misnard_Customer_Block_Preferences
 */
class Misnard_Customer_Block_Preferences extends Mage_Core_Block_Template
{
    /**
     * Return customer preferences
     *
     * @return array
     */
    public function getCustomerPreferences()
    {
        $finalPreferences = array();

        if ($customer = Mage::getSingleton('customer/session')->getCustomer()) {
            $preferencesOptions = unserialize(Mage::getStoreConfig('customer/preferences/choices'));

            $customerPreferencesModel = Mage::getModel('misnard_customer/preferences');

            $customerPreferences = $customerPreferencesModel
                ->getCollection()
                ->addFieldToFilter('customer_id', $customer->getEntityId())
                ->getFirstItem();

            $customerPreference = explode(',', $customerPreferences->getPreferences());

            $finalPreferences = array();

            foreach ($preferencesOptions as $key => $preferencesOption) {
                foreach ($preferencesOption as $option) {
                    $finalPreferences[$key][$option] = in_array($option, $customerPreference) ? 'checked' :
                        'unchecked';
                }
            }
        }

        return $finalPreferences;
    }
}