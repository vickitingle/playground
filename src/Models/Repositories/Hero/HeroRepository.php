<?php

namespace Playground\Models\Repositories\Hero;

use Playground\Models\Hero;
use Core\Database;
use Core\Core;

class HeroRepository extends Hero implements HeroRepositoryInterface
{
    protected $data;

    public function __construct(
        Database $database,
        Core $core,
        $data
    ) {
        parent::__construct($database, $core);
        $this->data = $data;
    }

    /**
     * @return int|mixed
     */
    public function getId()
    {
        return $this->getData(self::ID);
    }

    /**
     * @return mixed|string
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * @return mixed|string
     */
    public function getCategory()
    {
        return $this->getData(self::CATEGORY);
    }

    /**
     * @return int|mixed
     */
    public function getUltimateId()
    {
        return $this->getData(self::ULTIMATE_ID);
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * @param string $category
     * @return mixed
     */
    public function setCategory($category)
    {
        return $this->setData(self::CATEGORY, $category);
    }

    /**
     * @param int $ultimateId
     * @return mixed
     */
    public function setUltimateId($ultimateId)
    {
        return $this->setData(self::ULTIMATE_ID, $ultimateId);
    }
}