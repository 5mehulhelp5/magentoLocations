<?php

namespace LeanCommerce\LocationGrid\Api\Data;

interface GridInterface
{
    const ENTITY_ID = 'entity_id';
    const NAME = 'name';
    const DESCRIPTION = 'description';
    const LINK = 'link';
    const IS_ACTIVE = 'is_active';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    /**
     * Get EntityId.
     *
     * @return int
     */
    public function getEntityId();

    /**
     * Set EntityId.
     */
    public function setEntityId($entityId);

    /**
     * Get Name.
     *
     * @return varchar
     */
    public function getName();

    /**
     * Set Name.
     */
    public function setName($name);

    /**
     * Get Description.
     *
     * @return varchar
     */
    public function getDescription();

    /**
     * Set Description.
     */
    public function setDescription($description);

    /**
     * Get Link.
     *
     * @return varchar
     */
    public function getLink();

    /**
     * Set Link.
     */
    public function setLink($link);

    /**
     * Get IsActive.
     *
     * @return varchar
     */
    public function getIsActive();

    /**
     * Set StartingPrice.
     */
    public function setIsActive($isActive);

    /**
     * Get CreatedAt.
     *
     * @return varchar
     */
    public function getCreatedAt();

    /**
     * Set CreatedAt.
     */
    public function setCreatedAt($createdAt);

    /**
     * Get UpdatedAt.
     *
     * @return varchar
     */
    public function getUpdatedAt();

    /**
     * Set UpdatedAt.
     */
    public function setUpdatedAt($updatedAt);
}
