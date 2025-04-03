<?php
namespace LeanCommerce\LocationGrid\Api;

interface GridRepositoryInterface
{
    /**
     * Obtener lista de productos con datos básicos
     * @return array
     */
    public function getData();

    /**
     * Crear nuevo producto
     * @param string $branchName
     * @param string $address
     * @param string $phone
     * @param string $latitude
     * @param string $longitude
     * @param string $is_active
     * @return array
     */
    public function createLocation($branchName, $address, $phone, $latitude, $longitude, $is_active);
}
