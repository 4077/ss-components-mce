<?php namespace ss\components\mce;

class Pivot
{
    private $pivot;

    public function __construct(\ss\models\CatComponent $pivot)
    {
        $this->pivot = $pivot;
    }

    public function mcesBuilder()
    {
        return $this->pivot->morphMany(\ss\components\mce\models\Mce::class, 'target');
    }

    public function getCurrent()
    {
        if (!$currentVersion = $this->mcesBuilder()->where('current', true)->first()) {
            $datetime = \Carbon\Carbon::now()->toDateTimeString();

            $currentVersion = $this->mcesBuilder()->create([
                                                               'created_at' => $datetime,
                                                               'updated_at' => $datetime,
                                                               'current'    => true
                                                           ]);
        }

        return $currentVersion;
    }
}
