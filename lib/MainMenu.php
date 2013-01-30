<?php
class MainMenu extends Menu {
    function init(){
        parent::init();

        $this->addMenuItem('index');
        $this->addMenuItem('doc','Documentation');
        $this->addMenuItem('support');
        $this->addMenuItem('market');
        $this->addMenuItem('my','My Account');
    }
}
