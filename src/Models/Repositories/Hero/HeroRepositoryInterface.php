<?php

namespace Playground\Models\Repositories\Hero;

interface HeroRepositoryInterface
{
    const ID = 'id';
    const NAME = 'name';
    const CATEGORY = 'category';
    const ULTIMATE_ID = 'ultimate_id';

    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getCategory();

    /**
     * @return int
     */
    public function getUltimateId();

    /**
     * @param $name string
     * @return mixed
     */
    public function setName($name);

    /**
     * @param $category string
     * @return mixed
     */
    public function setCategory($category);

    /**
     * @param $ultimateId int
     * @return mixed
     */
    public function setUltimateId($ultimateId);
}