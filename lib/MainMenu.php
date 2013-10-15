<?php
class MainMenu extends Menu {
    public $current_menu_class="atk-state-active";
    public $inactive_menu_class="";

    function init(){
        parent::init();

        $this->addMenuItem('about');
        $this->addMenuItem('download');
        $this->addMenuItem('doc','Documentation');
        $this->addMenuItem('blog');
        $this->addMenuItem('help');
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
    function defaultTemplate() {
        return array('mainmenu');
    }
}
