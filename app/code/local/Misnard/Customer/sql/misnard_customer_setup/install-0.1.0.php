<?php
/**
 *  Installer v0.1.0 for customer preferences
 *
 *  Task: init custom table to store params
 */

/** @var Mage_Core_Model_Resource_Setup $installer */
$installer = $this;

$installer->startSetup();

if (!$installer->tableExists('misnard_customer/preferences')) {
    $preferencesTable = $installer->getConnection()
        ->newTable($installer->getTable('misnard_customer/preferences'))
        ->addColumn(
            'preferences_id', Varien_Db_Ddl_Table::TYPE_INTEGER,
            null,
            array(
                'identity' => true,
                'unsigned' => true,
                'nullable' => false,
                'primary' => true,
            ), 'Unique identifier'
        )
        ->addColumn(
            'customer_id', Varien_Db_Ddl_Table::TYPE_INTEGER,
            100,
            array(),
            'Customer id'
        )
        ->addColumn(
            'preferences', Varien_Db_Ddl_Table::TYPE_VARCHAR,
            '100'
            , array(),
            'Customer Preferences'
        );
    $installer->getConnection()->createTable($preferencesTable);
}

$installer->endSetup();