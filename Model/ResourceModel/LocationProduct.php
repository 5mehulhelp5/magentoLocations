<?php

namespace LeanCommerce\LocationGrid\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class LocationProduct extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('lc_location_product', 'product_id'); // Usamos 'product_id' como PK
    }
}
