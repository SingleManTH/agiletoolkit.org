<?php
class AdminMenu extends Menu {
    function init(){
        parent::init();

        $this->addMenuItem('admin/users','Users');
    }
}
