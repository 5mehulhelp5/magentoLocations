<?php

namespace LeanCommerce\LocationGrid\Model;

use LeanCommerce\LocationGrid\Api\Data\GridInterface;

class Grid extends \Magento\Framework\Model\AbstractModel implements GridInterface
{
    /**
     * CMS page cache tag.
     */
    const CACHE_TAG = 'lc_location_records';

    /**
     * @var string
     */
    protected $_cacheTag = 'lc_location_records';

    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'lc_location_records';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('LeanCommerce\LocationGrid\Model\ResourceModel\Grid');
    }
    /**
     * Get EntityId.
     *
     * @return int
     */
    public function getEntityId()
    {
        return $this->getData(self::ENTITY_ID);
    }

    /**
     * Set EntityId.
     */
    public function setEntityId($entityId)
    {
        return $this->setData(self::ENTITY_ID, $entityId);
    }
    /**
     * Get Name.
     *
     * @return varchar
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * Set Name.
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Get Description.
     *
     * @return varchar
     */
    public function getDescription()
    {
        return $this->getData(self::DESCRIPTION);
    }

    /**
     * Set Description.
     */
    public function setDescription($description)
    {
        return $this->setData(self::DESCRIPTION, $description);
    }

    /**
     * Get Link.
     *
     * @return varchar
     */
    public function getLink()
    {
        return $this->getData(self::LINK);
    }

    /**
     * Set Link.
     */
    public function setLink($link)
    {
        return $this->setData(self::LINK, $link);
    }

    /**
     * Get IsActive.
     *
     * @return varchar
     */
    public function getIsActive()
    {
        return $this->getData(self::IS_ACTIVE);
    }

    /**
     * Set IsActive.
     */
    public function setIsActive($isActive)
    {
        return $this->setData(self::IS_ACTIVE, $isActive);
    }

    /**
     * Get CreatedAt.
     *
     * @return varchar
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Set CreatedAt.
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * Get UpdatedAt.
     *
     * @return varchar
     */
    public function getUpdatedAt()
    {
        return $this->getData(self::UPDATED_AT);
    }

    /**
     * Set UpdatedAt.
     */
    public function setUpdatedAt($updatedAt)
    {
        return $this->setData(self::UPDATED_AT, $updatedAt);
    }
}
