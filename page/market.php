<?php
class page_market extends Page {
    function init(){
        parent::init();
        $this->add('Grid')->setModel('Content');
    }
}
