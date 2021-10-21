<?php

namespace Test\Database\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    /**
     * {@inheritdoc}
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $setup->getConnection()->insert(
            $setup->getTable('test_database_member'),
            [
                'name' => 'Member 1',
                'status' => true
            ]
        );

        $setup->getConnection()->insert(
            $setup->getTable('test_database_member'),
            [
                'name' => 'Memeber 2',
                'status' => true
            ]
        );

        $setup->endSetup();
    }
}
