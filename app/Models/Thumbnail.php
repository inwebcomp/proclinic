<?php

namespace App\Models;

/**
 * Class Thumbnail
 * @package App\Models
 * @property \Intervention\Image\Image image
 * @property \App\Traits\WithImages object
 */
class Thumbnail
{
    private $modifier;
    /**
     * @var bool
     */
    private $onlyForMain;

    public function __construct($modifier, $onlyForMain = false)
    {
        $this->modifier = $modifier;
        $this->onlyForMain = $onlyForMain;
    }

    /**
     * @param mixed $modifier
     */
    public function setModifier($modifier)
    {
        $this->modifier = $modifier;
    }

    /**
     * @return mixed
     */
    public function getModifier()
    {
        return $this->modifier;
    }

    /**
     * @return bool
     */
    public function isOnlyForMain()
    {
        return $this->onlyForMain;
    }
}
