<?php namespace ss\components\mce\models;

class Mce extends \Model
{
    public $table = 'ss_components_mce';

    public function target()
    {
        return $this->morphTo();
    }
}
