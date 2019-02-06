<?php namespace ss\components\mce\schemas;

class Mce extends \Schema
{
    public $table = 'ss_components_mce';

    public function blueprint()
    {
        return function (\Illuminate\Database\Schema\Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('parent_id')->default(0); // todo del
            $table->morphs('target');
            $table->string('tag')->default('');
            $table->boolean('current')->default(false);
            $table->dateTime('created_at')->nullable(); // todo timestamps()
            $table->dateTime('updated_at')->nullable(); // todo timestamps()
            $table->text('content');
        };
    }
}
