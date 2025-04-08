<?php
namespace LeanCommerce\LocationGrid\Api\Data;

interface LocationProductInterface
{
    const ENTITY_ID = 'entity_id';
    const PRODUCT_ID = 'product_id';
    const LOCATION_ID = 'location_id';

    /**
     * Get Entity ID
     *
     * @return int|null
     */
    public function getEntityId();

    /**
     * Set Entity ID
     *
     * @param int $entityId
     * @return $this
     */
    public function setEntityId($entityId);

    /**
     * Get Product ID
     *
     * @return int
     */
    public function getProductId();

    /**
     * Set Product ID
     *
     * @param int $productId
     * @return $this
     */
    public function setProductId($productId);

    /**
     * Get Location ID
     *
     * @return int
     */
    public function getLocationId();

    /**
     * Set Location ID
     *
     * @param int $locationId
     * @return $this
     */
    public function setLocationId($locationId);
}