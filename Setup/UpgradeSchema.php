<?php
namespace LeanCommerce\LocationGrid\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;

class UpgradeSchema implements UpgradeSchemaInterface
{
    public function upgrade(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $installer = $setup;
        $installer->startSetup();

        if (version_compare($context->getVersion(), '1.0.1', '<')) {
            // Crear tabla relacional 'lc_location_product'
            $relationTableName = 'lc_location_product';
            $relationTable     = $installer->getConnection()->newTable(
                $installer->getTable($relationTableName)
            )->addColumn(
                'entity_id',
                Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
                'Entity ID'
            )
                ->addColumn(
                    'product_id',
                    Table::TYPE_INTEGER,
                    null,
                    ['unsigned' => true, 'nullable' => false],
                    'Product ID'
                )
                ->addColumn(
                    'location_id',
                    Table::TYPE_INTEGER,
                    null,
                    ['unsigned' => false, 'nullable' => false],
                    'Location ID'
                )
                ->addIndex(
                    $installer->getIdxName(
                        $relationTableName,
                        ['product_id', 'location_id'],
                        \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_UNIQUE
                    ),
                    ['product_id', 'location_id'],
                    ['type' => \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_UNIQUE]
                )
                ->addForeignKey(
                    $installer->getFkName(
                        $relationTableName,
                        'product_id',
                        'catalog_product_entity',
                        'entity_id'
                    ),
                    'product_id',
                    $installer->getTable('catalog_product_entity'),
                    'entity_id',
                    Table::ACTION_CASCADE
                )
                ->addForeignKey(
                    $installer->getFkName(
                        $relationTableName,
                        'location_id',
                        'lc_location_records',
                        'entity_id'
                    ),
                    'location_id',
                    $installer->getTable('lc_location_records'),
                    'entity_id',
                    Table::ACTION_CASCADE
                )
                ->setComment('Product-Location Relation Table');

            $installer->getConnection()->createTable($relationTable);
        }

        $installer->endSetup();
    }
}
