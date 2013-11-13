<?php
class MainMenu extends Menu_Objective {
    public $current_menu_class="atk-state-active";
    public $inactive_menu_class="";

    function init(){
        parent::init();
        $this->setClass('atk-menu atk-menu-naked atk-menu-horizontal');
    }
    private $submenus = array();
    function addItems() {

        $this->submenus['about'] = $this->addSubMenu('About');
        $this->submenus['about']->addMenuItem('about')->js('click')->univ()->redirect('about');
        $this->submenus['about']->addMenuItem('features')->js('click')->univ()->redirect('features');
        $this->submenus['about']->addMenuItem('performance')->js('click')->univ()->redirect('performance');
        $this->submenus['about']->addMenuItem('license')->js('click')->univ()->redirect('license');
        $this->submenus['about']->addMenuItem('contact-us','ContactUs')->js('click')->univ()->redirect('contact-us');

        $this->submenus['download'] = $this->addSubMenu('Download');
        $this->submenus['download']->addMenuItem('framework')->js('click')->univ()->redirect('framework');
        $this->submenus['download']->addMenuItem('plugins')->js('click')->univ()->redirect('plugins');
        $this->submenus['download']->addMenuItem('demo')->js('click')->univ()->redirect('demo');
        $this->submenus['download']->addMenuItem('logo')->js('click')->univ()->redirect('logo');

        $this->submenus['doc'] = $this->addSubMenu('Documentation');
        $this->submenus['doc']->addMenuItem('doc','Documentation')->js('click')->univ()->redirect('doc');
        $this->submenus['doc']->addMenuItem('getting-started','Getting Started')->js('click')->univ()->redirect('getting-started');
        $this->submenus['doc']->addMenuItem('class-reference','Class Reference')->js('click')->univ()->redirect('class-reference');
        $this->submenus['doc']->addMenuItem('plugins')->js('click')->univ()->redirect('plugins');

        $this->submenus['blog'] = $this->addSubMenu('Blog');
        $this->submenus['blog']->addMenuItem('blog')->js('click')->univ()->redirect('blog');

        $this->submenus['help'] = $this->addSubMenu('Help');
        $this->submenus['help']->addMenuItem('help')->js('click')->univ()->redirect('help');

        $this->addSubmenuJS();
        $this->addSubmenuClasses();

    }
    function addSubmenuJS() {
        // hide all first
        $this->js(true)->find('ul')->hide();

        // show one by click
        $js = array();
        foreach ($this->submenus as $menu_name => $submenu) {
            foreach ($this->submenus as $k => $v) {
                if ($k == $menu_name) {
                    $js[] = $v->js()->show();
                } else {
                    $js[] = $v->js()->hide();
                }
            }
            $this->submenus[$menu_name]->owner->js('click',$js);
        }

        // hide all by click outside of menu
        $js = array();
        foreach ($this->submenus as $v) {
            $js[] = $v->js()->hide();
        }
        $this->js('click',$js)->_selectorDocument();
    }
    function addSubmenuClasses() {
        foreach ($this->submenus as $v) {
            $v->setClass('main-sub-menu');
        }
    }
    function defaultTemplate() {
        return array('mainmenu');
    }
}





//class MainMenu extends Menu {
//    public $current_menu_class="atk-state-active";
//    public $inactive_menu_class="";
//
//    function init(){
//        parent::init();
//
//        $this->addMenuItem('about');
//        $this->addMenuItem('download');
//        $this->addMenuItem('doc','Documentation');
//        $this->addMenuItem('blog');
//        $this->addMenuItem('help');
//        $this->addMenuItem('my','My Account');
//
//        $pop = $this->add('View_Popover');
//        $pop->add('View',null,null,array('view/navdoc'));
//        $this->on('click', '#agiletoolkit_org_mainmenu_i1',
//            $pop->showJS(
//                '#agiletoolkit_org_mainmenu_i1',
//                array('width'=>'900')
//            )
//        );
//    }
//    function addItems() {}
//    function defaultTemplate() {
//        return array('_mainmenu');
//    }
//}
