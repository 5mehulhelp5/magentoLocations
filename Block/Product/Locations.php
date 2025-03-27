<?php
namespace LeanCommerce\LocationGrid\Block\Product;

use Magento\Framework\View\Element\Template;
use LeanCommerce\LocationGrid\Model\ResourceModel\Grid\CollectionFactory as LocationCollectionFactory;
use Magento\Framework\Registry;

class Locations extends Template
{
    protected $locationCollectionFactory;
    protected $registry;
    
    public function __construct(
        Template\Context $context,
        LocationCollectionFactory $locationCollectionFactory,
        Registry $registry,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->locationCollectionFactory = $locationCollectionFactory;
        $this->registry = $registry;
    }

    public function getProduct()
    {
        return $this->registry->registry('current_product');
    }

    public function getLocations()
    {
        $product = $this->getProduct();
        if (!$product || !$product->getId()) return [];
        
        $collection = $this->locationCollectionFactory->create();
        $collection->getSelect()->join(
            ['lp' => 'lc_location_product'],
            'main_table.entity_id = lp.location_id',
            []
        )->where('lp.product_id = ?', $product->getId());
        
        return $collection;
    }
}