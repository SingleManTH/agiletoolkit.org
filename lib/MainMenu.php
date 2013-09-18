<?php
class MainMenu extends Menu {
    function init(){
        parent::init();

        $this->addMenuItem('index');
        $this->addMenuItem('doc','Documentation');
        $this->addMenuItem('support');
        $this->addMenuItem('market');
        $this->addMenuItem('my','My Account');


        $this->add('View_Popover')
            ->add('HelloWorld');

        //$this->on('click','#agiletoolkit_org_mainmenu_i1')
            //->univ()->alert(535);
    }
}
