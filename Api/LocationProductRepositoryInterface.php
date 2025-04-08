<?php

namespace LeanCommerce\LocationGrid\Api;

use LeanCommerce\LocationGrid\Api\Data\LocationProductInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterface;

interface LocationProductRepositoryInterface
{
    /**
     * Save a product-location relation.
     *
     * @param LocationProductInterface $locationProduct
     * @return LocationProductInterface
     */
    public function save(LocationProductInterface $locationProduct);

    /**
     * Get product-location relation by Product ID.
     *
     * @param int $productId
     * @return LocationProductInterface
     */
    public function getById($productId);

    /**
     * Delete a product-location relation.
     *
     * @param LocationProductInterface $locationProduct
     * @return bool
     */
    public function delete(LocationProductInterface $locationProduct);

    /**
     * Get a list of product-location relations matching criteria.
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return SearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}
