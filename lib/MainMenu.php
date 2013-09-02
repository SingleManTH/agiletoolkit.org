<?php
class MainMenu extends Menu_jUI {
    function init(){
        parent::init();

        $this->addMenuItem('doc','Documentation');
        $this->addMenuItem('support');
        $this->addMenuItem('market');
        $this->addMenuItem('my','My Account');
    }
}
