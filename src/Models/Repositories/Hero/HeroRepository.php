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

    public function getId()
    {
        return $this->getData(self::ID);
    }

    public function getName()
    {
        return $this->getData(self::NAME);
    }

    public function getCategory()
    {
        return $this->getData(self::CATEGORY);
    }

    public function getUltimateId()
    {
        return $this->getData(self::ULTIMATE_ID);
    }

    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    public function setCategory($category)
    {
        return $this->setData(self::CATEGORY, $category);
    }

    public function setUltimateId($ultimateId)
    {
        return $this->setData(self::ULTIMATE_ID, $ultimateId);
    }

    public function getData($key)
    {
        return $this->data[$key];
    }

    public function setData($key, $value)
    {
        return $this->data[$key] = $value;
    }
}