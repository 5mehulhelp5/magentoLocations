<?php
namespace LeanCommerce\LocationGrid\Model;

use LeanCommerce\LocationGrid\Api\Data\LocationProductInterface;
use Magento\Framework\Model\AbstractModel;

class LocationProduct extends AbstractModel implements LocationProductInterface
{
    protected function _construct()
    {
        $this->_init(\LeanCommerce\LocationGrid\Model\ResourceModel\LocationProduct::class);
    }

    /**
     * @inheritDoc
     */
    public function getEntityId()
    {
        return $this->getData(self::ENTITY_ID);
    }

    /**
     * @inheritDoc
     */
    public function setEntityId($entityId)
    {
        return $this->setData(self::ENTITY_ID, $entityId);
    }

    /**
     * @inheritDoc
     */
    public function getProductId()
    {
        return $this->getData(self::PRODUCT_ID);
    }

    /**
     * @inheritDoc
     */
    public function setProductId($productId)
    {
        return $this->setData(self::PRODUCT_ID, $productId);
    }

    /**
     * @inheritDoc
     */
    public function getLocationId()
    {
        return $this->getData(self::LOCATION_ID);
    }

    /**
     * @inheritDoc
     */
    public function setLocationId($locationId)
    {
        return $this->setData(self::LOCATION_ID, $locationId);
    }
}