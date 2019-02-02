<?php namespace ss\components\mce;

class Mce
{
    private $mce;

    public function __construct(\ss\components\mce\models\mce $mce)
    {
        $this->mce = $mce;
    }

    public function duplicate()
    {
        $newMce = \ss\components\mce\models\Mce::create($this->mce->toArray());

        return $newMce;
    }

    public function delete()
    {
        $this->mce->delete();
    }

    public function reset()
    {
        $this->resetCache();
    }

    public function resetCache()
    {

    }
}
