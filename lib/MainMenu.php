<?php
class MainMenu extends Menu {
    function init(){
        parent::init();

        $this->addMenuItem('index');
        $this->addMenuItem('doc','Documentation');
        $this->addMenuItem('support');
        $this->addMenuItem('market');
        $this->addMenuItem('my','My Account');


        $pop = $this->add('View_Popover');
        $pop->add('View',null,null,array('view/navdoc'));
        $this->on('click', '#agiletoolkit_org_mainmenu_i1', 
            $pop->showJS(
                '#agiletoolkit_org_mainmenu_i1',
                array('width'=>'900')
            )
        );




    }
}
