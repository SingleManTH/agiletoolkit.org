<?php
class Frontend extends ApiFrontend {

    public $public_location;    // js, css, images
    public $private_location;   // templates, php files, resources

    function init(){
        parent::init();

        $this->add('jUI');
        $a=$this->dbConnect();


        $this->pathfinder->public_location->addRelativeLocation('atk43',
            array(
                'css'=>'css',
                'public'=>'.',
            ));

        $this->api->pathfinder->base_location->defineContents(array(
            'docs'=>array('docs','doc'),  // Documentation (external)
            'content'=>'content',          // Content in MD format
            'addons'=>'vendor',
        ));


        $this->layout=$l=$this->add('Layout_Fluid');

        $l->addMenu('MainMenu');

        // See if sidebar is needed
        //$sb = yaml_parse_file('content/toc.yaml');
        //var_Dump($sb);


        $a=$this->api->add('Auth');
        $a->usePasswordEncryption();
        $a->setModel('User');


        // There are a number of public pages. Take them out
        $this->add('romaninsh/mdcms/Controller',
            array('target'=>$l,'callback'=>function($p){
                $bar=$p->api->layout->addLeftBar();
                $m=$bar->add('LeftMenu');
                $m->addMenuItem('hello');



            })
        );


        $r = $this->add("Controller_PatternRouter");
        $r
          ->addRule('doc\/(.*)', "doc", array('doc'))
          ->link('edit/addon',array('id'))
          ->route();


        $this->js(true)
            ->_load('modernizr-2.6.2.min')
            ->_load('plugins')
            ->_load('main')
            ->univ()->page_init()
            ;

        // Enable authentication through OPauth
        $op=$a->add(
            'romaninsh/opauth/Controller_Opauth',
            array(
                'register_page'=>'ofinish',
                'default_action'=>array('redirect_me'=>'my'),
            )
        );
        $op->addStrategy('github,facebook,twitter,google');
        return;

        if($a->isLoggedIn()){
            $this->me=$a->model;
            $nav=$this->add('View',null,'NavUser',array('view/navuser'));
            $nav->template->trySet('name',$this->me['username']);
        }else{
            $f=$this->add('Form',array('js_widget'=>null),'Login',array('login-form'));
            $f->addField('line','email','');
            $f->addField('line','password','');
            $f->addSubmit('Login');
            if($f->isSubmitted()){
                if($a->verifyCredentials($f->get('email'), $f->get('password'))){
                    $a->login($f->get('email'));
                    $a->loggedIn($f->get('email'),$f->get('password'));
                }
            }
        }


    }
    function me() {
        if (!$this->auth->isLoggedIn()) {
            throw $this->exception('Must be logged in');
        }

        return $this->auth->model;
    }
    function myID() {
        if (!$this->auth->isLoggedIn()) {
            throw $this->exception('Must be logged in');
        }

        return $this->auth->model->id;
    }
    /*
    function getConfig($path, $default_value = undefined){
        if(is_null($this->config)){
            $this->readConfig('../config-default.php');
            $this->readConfig('../config.php');
        }
        return parent::getConfig($path,$default_value);
    }
     */
}
