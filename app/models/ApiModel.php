<?php

/**
 * Class ApiModel
 */
abstract class ApiModel extends \Eloquent {
    /**
     * Returns the transformed model for JSON
     *
     * @return mixed
     */
    public function transform()
    {
        return $this->asArray();
    }
} 