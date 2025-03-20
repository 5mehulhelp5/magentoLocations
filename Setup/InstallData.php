<?php

namespace LeanCommerce\LocationGrid\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    private $eavSetupFactory;

    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

        // Agregar atributo 'location_records' al producto
        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'location_records',
            [
                'type' => 'varchar', // Se guarda como cadena, p.ej. con IDs separados por comas
                'label' => 'Associated Locations',
                'input' => 'multiselect',
                'backend' => '',
                'required' => false,
                'sort_order' => 200,
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                'visible' => true,
                'user_defined' => true,
                'system' => false,
                'group' => 'General',
                'used_in_product_listing' => true,
                'is_visible_on_front' => false,
                'option' => ['values' => []]
            ]
        );

        $setup->endSetup();
    }
}
