<?php
class Frontend extends ApiFrontend {

    public $public_location;    // js, css, images
    public $private_location;   // templates, php files, resources

    public $me;


    function addSharedLocations(){
        $parent_directory=dirname(dirname(@$_SERVER['SCRIPT_FILENAME']));
        $this->private_location = $this->pathfinder->addLocation('my-private',array(
            'docs'=>'docs',
            'php'=>'lib',
            'page'=>'page',
            'addons'=>array('atk4-addons','vendor'),
            'template'=>'templates',
        ))->setBasePath($parent_directory)
        ;

        $this->public_location = $this->pathfinder->addLocation('my-public',array(
            'js'=>'js',
            'css'=>'css',
        ))->setBasePath($parent_directory.'/public')
        ;

        $this->public_atk4 = $this->pathfinder->addLocation('atk4-public',array(
            'js'=>'js',
            'template'=>'.',
        ))->setBasePath($parent_directory.'/public/atk4')
        ;
    }
    function init(){
        parent::init();

        $a=$this->dbConnect();

        $this->public_location->setBaseURL($this->pm->base_path);
        $this->public_atk4->setBaseURL($this->pm->base_path.'/atk4');

        $this->add('jUI');

        $this->add('MainMenu',null,'Menu');

        $a=$this->api->add('Auth');
        $a->usePasswordEncryption();
        $a->setModel('User');

        // Enable authentication through OPauth
        $op=$a->add('romaninsh/opauth/Controller_Opauth');
        $op->addStrategy('github,facebook,twitter,google');

        if($a->isLoggedIn()){
            $this->me=$a->model;
        }


    }
    function getConfig($path, $default_value = undefined){
        if(is_null($this->config)){
            $this->readConfig('../config-default.php');
            $this->readConfig('../config.php');
        }
        return parent::getConfig($path,$default_value);
    }
}
