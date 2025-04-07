<?php

namespace LeanCommerce\LocationGrid\Model;

use LeanCommerce\LocationGrid\Api\GridRepositoryInterface;
use LeanCommerce\LocationGrid\Model\GridFactory;
use LeanCommerce\LocationGrid\Model\ResourceModel\Grid\CollectionFactory;
use Magento\Framework\Exception\LocalizedException;
use LeanCommerce\LocationGrid\Model\ResourceModel\Grid as GridResource;


class GridRepository implements GridRepositoryInterface
{
    protected $gridCollectionFactory;
    protected $gridFactory;
    protected $productRepository;
    protected $gridResource;


    public function __construct(
        CollectionFactory $gridCollectionFactory,
        GridFactory $gridFactory,
        GridResource $gridResource

    ) {
        $this->gridCollectionFactory = $gridCollectionFactory;
        $this->gridFactory           = $gridFactory;
        $this->gridResource          = $gridResource;
    }

    public function getData()
    {
        $collection = $this->gridCollectionFactory->create();
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
        foreach ($collection as $grid) {
            $locations[] = [
                'id'         => $grid->getId(),
                'branchName' => $grid->getBranchName(),
                'address'    => $grid->getAddress(),
                'phone'      => $grid->getPhone(),
                'latitude'   => $grid->getLatitude(),
                'longitude'  => $grid->getLongitude(),
                'is_active'  => $this->getStatusLabel($grid->getStatus()),
            ];
        }

        return ['success' => true, 'locations' => $locations];
    }

    private function getStatusLabel($statusId)
    {
        $statuses = [
            1 => 'Habilitado',
            2 => 'Deshabilitado',
        ];
        return $statuses[$statusId] ?? 'Desconocido';
    }

    public function createLocation($branchName, $address, $phone, $latitude, $longitude, $is_active)
    {
        try {
            // Validaciones básicas
            if (empty($branchName) || empty($address) || empty($phone) || empty($latitude) || empty($longitude) || empty($is_active)) {
                throw new LocalizedException(__('Datos inválidos'));
            }

            // Crear producto
            $grid = $this->gridFactory->create();

            $grid->setBranchName($branchName)
                ->setAddress($address)
                ->setPhone($phone)
                ->setLatitude($latitude)
                ->setLongitude($longitude)
                ->setIsActive($is_active);

            // Guardar producto
            $this->gridResource->save($grid);

            return [
                'success'    => true,
                'message'    => 'Producto creado',
                'product_id' => $grid->getId(),
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage(),
            ];
        }
    }
}
