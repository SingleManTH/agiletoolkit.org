<?php
class Model_Content_Addon extends Model_Content {
    public $type='Addon';
    public $add_fields=array('namespace');

    function init(){
        parent::init();

        $this->a=$this->join('addon.id','id');
        $this->a->addField('descr')->type('text')->caption('What does it do?');
        $this->a->addField('version');
        $this->a->addField('namespace')
            ->placeholder('johnsmith/HelloWorld')
            ->hint('Namespace must be unique and may contain slash');

        $this->addHook('beforeSave',function($m){
            // avoid conditions
            $mm=$m->add('Model_Content_Addon')
                ->addCondition('namespace',$m['namespace'])
                ->tryLoadAny();

            if($mm->loaded() && $mm->id != $m->id){
                throw $m->exception('Namespace already exists','Exception_ForUser');
            }
        });

    }
}
