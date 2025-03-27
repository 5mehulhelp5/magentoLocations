<?php
namespace LeanCommerce\LocationGrid\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Magento\Framework\App\ResourceConnection;

class SaveBranch implements ObserverInterface
{
    /**
     * @var ResourceConnection
     */
    protected $resource;

    public function __construct(
        ResourceConnection $resource
    ) {
        $this->resource = $resource;
    }

    public function execute(Observer $observer)
    {
        // Obtenemos el producto
        $product = $observer->getEvent()->getProduct();
        // Obtenemos los datos enviados (asegúrate de que el nombre coincida con el field del formulario)
        $data = $product->getData('custom_sucursal') ?: [];
        
        $productId = $product->getId();

        $connection = $this->resource->getConnection();
        $tableName = $this->resource->getTableName('lc_location_product');

        // Eliminar relaciones antiguas
        $connection->delete($tableName, ['product_id = ?' => $productId]);

        // Insertar nuevas relaciones
        foreach ($data as $branchId) {
            $connection->insert($tableName, [
                'product_id' => $productId,
                'location_id' => $branchId
            ]);
        }
    }
}
