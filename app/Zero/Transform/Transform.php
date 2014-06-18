<?php

namespace Zero\Transform;

use Illuminate\Database\Eloquent\Collection;

/**
 * Class Transform
 * @package Zero\Transform
 */
class Transform {
    /**
     * @param Collection $collection
     * @return array
     */
    public static function collection(Collection $collection)
    {
        return array_map(function ($e)
        {
            return $e->transform();
        }, $collection->all());
    }
} 