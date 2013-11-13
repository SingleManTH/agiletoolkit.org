<?php
class Admin extends ApiFrontend {

    public $public_location;    // js, css, images
    public $private_location;   // templates, php files, resources

    function init(){
        parent::init();

        $this->requires('atk','4.3');

        $this->add('jUI');
        $a=$this->dbConnect();


        $this->pathfinder->public_location->addRelativeLocation('atk43',
            array(
                'public'=>'.',
                'css'=>'css',
            ));

        $this->api->pathfinder->base_location->defineContents(array(
            'docs'=>array('docs','doc'),  // Documentation (external)
            'content'=>'content',          // Content in MD format
            'addons'=>array('vendor','addons'),
            'php'=>array('shared',),
        ));

//        $a=$this->api->add('Auth');
//        $a->usePasswordEncryption();
//        $a->setModel('User');


        $this->layout = $l = $this->add('Layout_Fluid');
        $l->addMenu('Menu_Main');
    }
}
