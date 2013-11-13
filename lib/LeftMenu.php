<?php
class LeftMenu extends Menu_Objective {
    public $current_menu_class="atk-state-active";
    public $inactive_menu_class="";

    function init(){
        parent::init();

      //  $this->addSubMenu('sub')
       //     ->addMenuItem('about');

        $this->addMenuItem('download');
        $this->addMenuItem('doc','Documentation');
        $this->addMenuItem('blog');
        $this->addMenuItem('help');
        $this->addMenuItem('my','My Account');




    }
    function defaultTemplate() {
        return array('leftmenu');
    }
}
