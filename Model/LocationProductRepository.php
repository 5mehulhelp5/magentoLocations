<?php

namespace LeanCommerce\LocationGrid\Model;

use LeanCommerce\LocationGrid\Api\LocationProductRepositoryInterface;
use LeanCommerce\LocationGrid\Api\Data\LocationProductInterface;
use LeanCommerce\LocationGrid\Model\ResourceModel\LocationProduct as ResourceModel;
use LeanCommerce\LocationGrid\Model\ResourceModel\LocationProduct\CollectionFactory;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Api\SearchResultsInterfaceFactory;

class LocationProductRepository implements LocationProductRepositoryInterface
{
    protected $resource;
    protected $locationProductFactory;
    protected $collectionFactory;
    protected $searchResultsFactory;

    public function __construct(
        ResourceModel $resource,
        LocationProductFactory $locationProductFactory,
        CollectionFactory $collectionFactory,
        SearchResultsInterfaceFactory $searchResultsFactory
    ) {
        $this->resource = $resource;
        $this->locationProductFactory = $locationProductFactory;
        $this->collectionFactory = $collectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
    }

    public function save(LocationProductInterface $locationProduct)
    {
        $this->resource->save($locationProduct);
        return $locationProduct;
    }

    public function getById($productId)
    {
        $locationProduct = $this->locationProductFactory->create();
        $this->resource->load($locationProduct, $productId);
        return $locationProduct;
    }

    public function delete(LocationProductInterface $locationProduct)
    {
        $this->resource->delete($locationProduct);
        return true;
    }

    public function getList(SearchCriteriaInterface $criteria)
    {
        $collection = $this->collectionFactory->create();
        foreach ($criteria->getFilterGroups() as $group) {
            foreach ($group->getFilters() as $filter) {
                $collection->addFieldToFilter($filter->getField(), [$filter->getConditionType() => $filter->getValue()]);
            }
        }

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }
}
