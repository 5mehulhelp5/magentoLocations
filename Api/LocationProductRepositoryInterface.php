<?php
namespace LeanCommerce\LocationGrid\Api;

use LeanCommerce\LocationGrid\Api\Data\LocationProductInterface;

interface LocationProductRepositoryInterface
{
    /**
     * Delete a product-location relation
     *
     * @param int $productId
     * @param int $locationId
     * @return bool
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function delete($productId, $locationId);

    /**
     * Get list of all product-location relations
     *
     * @return \LeanCommerce\LocationGrid\Api\Data\LocationProductInterface[]
     */
    public function getList();

    /**
     * Get product-location relations by product ID
     *
     * @param int $productId
     * @return \LeanCommerce\LocationGrid\Api\Data\LocationProductInterface[]
     */
    public function getByProductId($productId);

    /**
     * Save product-location relation
     *
     * @param int $productId
     * @param int $locationId
     * @return \LeanCommerce\LocationGrid\Api\Data\LocationProductInterface
     * @throws \Magento\Framework\Exception\AlreadyExistsException
     */
    public function save($productId, $locationId);
}