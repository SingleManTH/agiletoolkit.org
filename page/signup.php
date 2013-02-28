<?php
class page_signup extends Page {
    function init(){
        parent::init();
        $f=$this->add('Form');
        $f->addClass('stacked');
        $m=$this->add('Model_User');
        $m->getElement('username')->editable(true);
        $m->getElement('email')->editable(true);
        $f->setModel($m,array('username','email','password','full_name'));
        $f->addSubmit('Create Account');
    }
    function defaultTemplate(){
        return array('page/signup');
    }
}
