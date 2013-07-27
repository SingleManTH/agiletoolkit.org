<?php
class Model_Content_Article extends Model_Content {
    public $add_fields=array('name');
    function init(){
        parent::init();

        $this->addField('body')->type('text');
    }
}
