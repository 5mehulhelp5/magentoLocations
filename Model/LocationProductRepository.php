<?php
namespace LeanCommerce\LocationGrid\Model;

use LeanCommerce\LocationGrid\Api\Data\LocationProductInterface;
use LeanCommerce\LocationGrid\Api\LocationProductRepositoryInterface;
use LeanCommerce\LocationGrid\Model\ResourceModel\LocationProduct\CollectionFactory;
use Magento\Framework\Exception\AlreadyExistsException;
use Magento\Framework\Exception\NoSuchEntityException;

class LocationProductRepository implements LocationProductRepositoryInterface
{
    protected $locationProductFactory;
    protected $collectionFactory;
    protected $resource;

    public function __construct(
        \LeanCommerce\LocationGrid\Model\LocationProductFactory $locationProductFactory,
        \LeanCommerce\LocationGrid\Model\ResourceModel\LocationProduct $resource,
        CollectionFactory $collectionFactory
    ) {
        $this->locationProductFactory = $locationProductFactory;
        $this->resource = $resource;
        $this->collectionFactory = $collectionFactory;
    }

    public function delete($productId, $locationId)
    {
        $collection = $this->collectionFactory->create()
            ->addFieldToFilter('product_id', $productId)
            ->addFieldToFilter('location_id', $locationId);
        
        if ($collection->getSize() === 0) {
            throw new NoSuchEntityException(__('Record not found'));
        }

        foreach ($collection as $item) {
            $this->resource->delete($item);
        }
        return true;
    }

    public function getList()
    {
        return $this->collectionFactory->create()->getItems();
    }

    public function getByProductId($productId)
    {
        return $this->collectionFactory->create()
            ->addFieldToFilter('product_id', $productId)
            ->getItems();
    }

    public function save($productId, $locationId)
    {
        // Validar duplicados
        $collection = $this->collectionFactory->create()
            ->addFieldToFilter('product_id', $productId)
            ->addFieldToFilter('location_id', $locationId);
        
        if ($collection->getSize() > 0) {
            throw new AlreadyExistsException(__('This product-location combination already exists.'));
        }

        $locationProduct = $this->locationProductFactory->create();
        $locationProduct->setProductId($productId)
            ->setLocationId($locationId);
        $this->resource->save($locationProduct);
        return $locationProduct;
    }
}