<?php
class AdminPage extends Page {
    function init(){
        parent::init();

        if (!$this->api->me()['is_admin']) {
            throw $this->exception('Not an admin');
        }
    }
}
