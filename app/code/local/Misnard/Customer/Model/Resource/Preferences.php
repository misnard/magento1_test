<?php

/**
 * Class Misnard_Customer_Model_Resource_Preferences
 */
class Misnard_Customer_Model_Resource_Preferences extends Mage_Core_Model_Resource_Db_Abstract
{
    /**
     * init customer preferences table link
     */
    public function _construct()
    {
        $this->_init('misnard_customer/preferences', 'preferences_id');
    }
}