<?php

namespace LeanCommerce\LocationGrid\Api\Data;

interface GridInterface
{
    const ENTITY_ID = 'entity_id';
    const BRANCHNAME = 'branchName';
    const ADDRESS = 'address';
    const PHONE = 'phone';
    const LATITUDE = 'latitude';
    const LONGITUDE = 'longitude';
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
     * Get BranchName.
     *
     * @return varchar
     */
    public function getBranchName();

    /**
     * Set BranchName.
     */
    public function setBranchName($branchName);

    /**
     * Get Address.
     *
     * @return varchar
     */
    public function getAddress();

    /**
     * Set Address.
     */
    public function setAddress($address);

    /**
     * Get Phone.
     *
     * @return varchar
     */
    public function getPhone();

    /**
     * Set Phone.
     */
    public function setPhone($phone);

    /**
     * Get Latitude.
     *
     * @return varchar
     */
    public function getLatitude();

    /**
     * Set Latitude.
     */
    public function setLatitude($latitude);

    /** 
     * Get Longitude.
     *
     * @return varchar
     */
    public function getLongitude();

    /**
     * Set Longitude.
     */
    public function setLongitude($longitude);

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
