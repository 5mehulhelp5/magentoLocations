<?php
namespace LeanCommerce\LocationGrid\Model;

use LeanCommerce\LocationGrid\Api\GridRepositoryInterface;
use LeanCommerce\LocationGrid\Model\ResourceModel\Grid\CollectionFactory;

class GridRepository implements GridRepositoryInterface
{
    protected $productCollectionFactory;

    public function __construct(CollectionFactory $productCollectionFactory
    ) {
        $this->productCollectionFactory = $productCollectionFactory;
    }

    public function getData()
    {
        $collection = $this->productCollectionFactory->create();
        $collection->addFieldToSelect([
            'entity_id',
            'branchName',
            'address',
            'phone',
            'latitude',
            'longitude',
            'is_active',
        ]);
        $collection->setPageSize(5); // Limitar a 5 productos para ejemplo

        $locations = [];
        foreach ($collection as $product) {
            $locations[] = [
                'id'         => $product->getId(),
                'branchName' => $product->getBranchName(),
                'address'    => $product->getAddress(),
                'phone'      => $product->getPhone(),
                'latitude'   => $product->getLatitude(),
                'longitude'  => $product->getLongitude(),
                'is_active'  => $this->getStatusLabel($product->getStatus()),
            ];
        }

        return ['success' => true, 'locations' => $locations];
    }

    private function formatPrice($price)
    {
        return $this->priceCurrency->format($price, false);
    }

    private function getStatusLabel($statusId)
    {
        $statuses = [
            1 => 'Habilitado',
            2 => 'Deshabilitado',
        ];
        return $statuses[$statusId] ?? 'Desconocido';
    }

    private function getVisibilityLabel($visibilityId)
    {
        $visibilityOptions = [
            1 => 'No visible',
            2 => 'Búsqueda',
            3 => 'Catálogo',
            4 => 'Búsqueda y Catálogo',
        ];
        return $visibilityOptions[$visibilityId] ?? 'Desconocido';
    }
}
