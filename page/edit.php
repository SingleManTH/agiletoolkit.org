<?php
class page_edit extends Page {
    function page_addon(){
        $m=$this->add('Model_Content_Addon')
            ->my()->load($this->api->stickyGET('id'));

        $f=$this->add('Form');
        $f->setModel($m);
        $f->addSubmit();


        if($f->isSubmitted()){
            $f->update();
            $f->js()->univ()->successMessage('Content updated')->execute();
        }

    }
}
