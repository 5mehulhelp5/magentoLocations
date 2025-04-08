<?php

namespace LeanCommerce\LocationGrid\Api\Data;

interface LocationProductInterface
{
    const PRODUCT_ID = 'product_id';
    const LOCATION_ID = 'location_id';

    public function getProductId();
    public function setProductId($id);

    public function getLocationId();
    public function setLocationId($id);
}
