<?php namespace ss\components\mce\ui\controllers\main;

class Xhr extends \Controller
{
    public $allow = self::XHR;

    public function save() // todo access
    {
        if ($pivot = $this->unxpackModel('pivot')) {

        }

        if ($mce = $this->unxpackModel('mce')) {
            $mce->content = $this->data('value');
            $mce->save();

            $this->se('ss/components/mce/' . $pivot->id)->trigger();
        }
    }
}
