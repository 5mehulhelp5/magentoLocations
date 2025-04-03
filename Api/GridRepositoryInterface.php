<?php
namespace LeanCommerce\LocationGrid\Api;

interface GridRepositoryInterface
{
    /**
     * Obtener lista de productos con datos básicos
     * @return array
     */
    public function getData();
}