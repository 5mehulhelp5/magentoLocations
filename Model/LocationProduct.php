<?php

namespace LeanCommerce\LocationGrid\Model;

use Magento\Framework\Model\AbstractModel;
use LeanCommerce\LocationGrid\Api\Data\LocationProductInterface;


class LocationProduct extends AbstractModel implements LocationProductInterface
{
    protected function _construct()
    {
        $this->_init(\LeanCommerce\LocationGrid\Model\ResourceModel\LocationProduct::class);
    }

    public function getProductId()
    {
        return $this->getData(self::PRODUCT_ID);
    }

    public function setProductId($id)
    {
        return $this->setData(self::PRODUCT_ID, $id);
    }

    public function getLocationId()
    {
        return $this->getData(self::LOCATION_ID);
    }

    public function setLocationId($id)
    {
        return $this->setData(self::LOCATION_ID, $id);
    }
}
