<?php
/**
 * Created by JetBrains PhpStorm.
 * User: vadym
 * Date: 10/27/13
 * Time: 1:09 PM
 * To change this template use File | Settings | File Templates.
 */
class Menu_Main extends Menu {
    public $current_menu_class="atk-state-active";
    public $inactive_menu_class="";
    function init() {
        parent::init();
        $this->setClass('atk-menu atk-menu-naked atk-menu-horizontal');

        $this->addMenuItem('index','Dashboard');
        $this->addMenuItem('users');
    }
    function defaultTemplate() {
        return array('view/main_menu');
    }
}