<?php
class MainMenu extends Menu_jUI {
    function init(){
        parent::init();

        $this->addMenuItem('index');
        $this->addMenuItem('doc','Documentation');
        $this->addMenuItem('support');
        $this->addMenuItem('market');
        $this->addMenuItem('my','My Account');
    }
    function render(){
        return Menu_Basic::render();
    }
}
