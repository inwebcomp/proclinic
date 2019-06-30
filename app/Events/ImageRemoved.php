<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;

class ImageRemoved
{
    use Dispatchable;

    public $image;

    /**
     * @param \App\Models\Image $image
     */
    public function __construct($image)
    {
        $this->image = $image;
    }
}
