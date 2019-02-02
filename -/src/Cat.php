<?php namespace ss\components\mce;

class Cat
{
    private $cat;

    public function __construct(\ss\models\Cat $cat)
    {
        $this->cat = $cat;
    }

    public function mcesBuilder()
    {
        return $this->cat->morphMany(\ss\components\mce\models\Mce::class, 'target');
    }
}
