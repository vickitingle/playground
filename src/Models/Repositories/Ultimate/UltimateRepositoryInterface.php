<?php

namespace Playground\Models\Repositories\Ultimate;

/**
 * Interface UltimateRepositoryInterface
 * @package Playground\Models\Repositories\Ultimate
 */
interface UltimateRepositoryInterface
{
    const ID = 'id';
    const ULTIMATE_NAME = 'name';
    const VOICE_LINE = 'voice_line';
    const HERO_ID = 'hero_id';

    /**
     * @return mixed
     */
    public function getId();

    /**
     * @return mixed
     */
    public function getName();

    /**
     * @return mixed
     */
    public function getVoiceLine();

    /**
     * @return mixed
     */
    public function getHeroId();

    /**
     * @param $name
     * @return mixed
     */
    public function setName($name);

    /**
     * @param $voiceLine
     * @return mixed
     */
    public function setVoiceLine($voiceLine);

    /**
     * @param $heroId
     * @return mixed
     */
    public function setHeroId($heroId);
}