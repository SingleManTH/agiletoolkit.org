<?php
class page_my extends Page {
    function init(){
        parent::init();
        $this->api->auth->check();
    }
    function page_index(){


        if($this->api->me()['is_admin'])$this->add('AdminMenu');

        $m=$this->add('Button')->set('Add New ..')->addMenu();
        $m->addMenuItem($this->js()->univ()->frameURL(
            'Add New Article',
            $this->api->url('./add',array('t'=>'Article'))), 'Forum Post');
        $m->addMenuItem($this->js()->univ()->frameURL(
            'Add New Support Article',
            $this->api->url('./add',array('t'=>'Article'))), 'Support Article');
        $m->addMenuItem($this->js()->univ()->frameURL(
            'Add New Plugin',
            $this->api->url('./add',array('t'=>'Addon'))), 'Agile Toolkit Plugin');
        $m->addMenuItem($this->js()->univ()->frameURL(
            'Add New Theme',
            $this->api->url('./add',array('t'=>'Theme'))), 'Agile Toolkit Theme');



        $tt=$this->add('Tabs');
        $tt->addTabURL('./profile');
        $tt->addTabURL('./content');
        $tt->addTabURL('./purchases');
        $tt->addTabURL('./settings');



    }

    function page_profile(){

        $cc=$this->add('View_Columns');
        $c=$cc->addColumn(6);


        $c->add('H2')->set('User Preferences');

        $f=$c->add('Form');
        $f->setModel($this->api->auth->model);
        $f->addSubmit('Save');
        if($f->isSubmitted()){
            $f->update()->js()->univ()->successMessage('Saved')->execute();
        }
        if($f->addButton('Logout')->isClicked()){
            $this->api->auth->logout();
            $this->js()->univ()->location($this->api->url())->execute();
        }

        $c=$cc->addColumn(6);
        $c->add('H2')->set('OAuth Preferences');

        $c->add('romaninsh/opauth/View_MyAuth');
    }

    function page_content(){
        $this->add('Grid')->setModel('Content')->my();
    }

    function page_purchases(){
        $this->add('Grid')->setModel('Purchases')->my();
    }

    function page_settings(){
        $f=$this->add('Form');
        $f->addField('boolean','');
    }

    function page_add(){
        $m='Model_Content_'.basename($this->api->stickyGET('t'));
        $m=$this->add($m);

        $f=$this->add('Form');
        $f->setModel($m->my(),$m->add_fields);
        $f->addSubmit('Add');
        if($f->isSubmitted()){
            $f->update();
            $f->js()->univ()->location($this->api->url(
                'edit/'.strtolower($_GET['t']),
                array('t'=>false,'id'=>$m->id)
            ))->execute();
        }
    }
}
