<?php


$m=$this->add('Model_Record')
    ->load($this->api->stickyGET('id'));

$f=$this->add('Form');
$n=$f->add('node/NodeNotify');

$f->setModel($m);
$n->setModel($m);

// If notification is triggered
$n->js( $form->js()->reload() );

if($f->isSubmitted()){
    $n->trigger();
}


