<?php

namespace LeanCommerce\LocationGrid\Model\ResourceModel\Grid;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'entity_id';
    /**
     * Define resource model.
     */
    protected function _construct()
    {
        $this->_init(
            'LeanCommerce\LocationGrid\Model\Grid',
            'LeanCommerce\LocationGrid\Model\ResourceModel\Grid'
        );
    }
}
