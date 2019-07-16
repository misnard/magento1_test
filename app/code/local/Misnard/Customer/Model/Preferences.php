<?php

/**
 * Class Misnard_Customer_Model_Preferences
 */
class Misnard_Customer_Model_Preferences extends Mage_Core_Model_Abstract
{
    /**
     * Init customer preferences resource model
     */
    public function _construct()
    {
        parent::_construct();
        $this->_init('misnard_customer/preferences');
    }
}