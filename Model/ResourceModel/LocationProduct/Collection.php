<?php
namespace LeanCommerce\LocationGrid\Model\ResourceModel\LocationProduct;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \LeanCommerce\LocationGrid\Model\LocationProduct::class,
            \LeanCommerce\LocationGrid\Model\ResourceModel\LocationProduct::class
        );
    }
}