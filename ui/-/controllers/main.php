<?php namespace ss\components\mce\ui\controllers;

class Main extends \Controller
{
    private $cat;

    private $pivot;

    public function __create()
    {
        $this->cat = $this->unpackModel('cat');
        $this->pivot = $this->unpackModel('pivot');

        $this->instance_($this->pivot->id);
    }

    public function reload()
    {
        $this->jquery('|')->replace($this->view());
    }

    public function view()
    {
        $v = $this->v('|');

        $ss = ss();

        $cat = $this->cat;

        $pivot = $this->pivot;
        $pivotXPack = xpack_model($pivot);

        $globalEditable = $ss->globalEditable();
        $catEditable = $ss->cats->isEditable($cat);

        $mce = \ss\components\mce\pivot($pivot)->getCurrent();

        $editable = $globalEditable && $catEditable;

        $v->assign([
                       'EMPTY_EDITABLE_CLASS' => $editable && !$mce->content ? 'empty_editable' : '',
                       'CONTENT'              => $editable
                           ? $this->c('\std\ui\mce~:view|ss/components/mce/' . $pivot->id, [
                               'path'        => '>xhr:save|',
                               'data'        => [
                                   'pivot' => $pivotXPack,
                                   'mce'   => xpack_model($mce)
                               ],
                               'content'     => $mce->content ?? '',
                               'height'      => 200,
                               'inline'      => true,
                               'filemanager' => false,
                               'options'     => [

                               ]
                           ])
                           : $mce->content
                   ]);

        $this->css();

        $this->se('ss/components/mce/' . $pivot->id)->rebind(':reload', [
            'cat'   => pack_model($this->cat),
            'pivot' => pack_model($this->pivot)
        ]);

        return $v;
    }
}
