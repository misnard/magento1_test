<?php

/**
 * Class Misnard_Customer_Model_Resource_Preferences_Collection
 */
class Misnard_Customer_Model_Resource_Preferences_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    /**
     * Init customer preferences resource model for collection
     */
    public function _construct()
    {
        parent::_construct();
        $this->_init('misnard_customer/preferences');
    }
}