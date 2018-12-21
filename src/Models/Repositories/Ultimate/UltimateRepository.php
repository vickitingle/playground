<?php

namespace Playground\Models\Repositories\Ultimate;

use Playground\Models\Ultimate;
use Core\Database;
use Core\Core;

/**
 * Class UltimateRepository
 * @package Playground\Models\Repositories\Ultimate
 */
class UltimateRepository extends Ultimate implements UltimateRepositoryInterface
{
    /** @var array */
    protected $data;

    /**
     * UltimateRepository constructor.
     * @param Database $database
     * @param Core $core
     * @param $data
     */
    public function __construct(
        Database $database,
        Core $core,
        $data
    ) {
        parent::__construct($database, $core);
        $this->data = $data;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->getData(self::ID);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->getData(self::ULTIMATE_NAME);
    }

    /**
     * @return string
     */
    public function getVoiceLine()
    {
        return $this->getData(self::VOICE_LINE);
    }

    /**
     * @return int
     */
    public function getHeroId()
    {
        return $this->getData(self::HERO_ID);
    }

    /**
     * @param $name
     * @return mixed
     */
    public function setName($name)
    {
        return $this->setData(self::ULTIMATE_NAME, $name);
    }

    /**
     * @param $voiceLine
     * @return mixed
     */
    public function setVoiceLine($voiceLine)
    {
        return $this->setData(self::VOICE_LINE, $voiceLine);
    }

    /**
     * @param $heroId
     * @return mixed
     */
    public function setHeroId($heroId)
    {
        return $this->setData(self::HERO_ID, $heroId);
    }
}