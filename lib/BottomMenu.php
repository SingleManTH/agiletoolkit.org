<?php
class BottomMenu extends Menu_Objective {
    public $current_menu_class="atk-state-active";
    public $inactive_menu_class="";

    function init(){
        parent::init();
        //$this->setClass('atk-menu atk-menu-naked atk-menu-horizontal');
        $this->setClass('bottom-menu');
    }
    function addItems() {

        $about = $this->addSubMenu('About')->setClass('/*atk-menu atk-menu-naked atk-menu-vertical*/');
        $about->addMenuItem('about')->js('click')->univ()->redirect('about');
        $about->addMenuItem('features')->js('click')->univ()->redirect('features');
        $about->addMenuItem('performance')->js('click')->univ()->redirect('performance');
        $about->addMenuItem('license')->js('click')->univ()->redirect('about');
        $about->addMenuItem('contact-us','ContactUs')->js('click')->univ()->redirect('contact-us');

        $download = $this->addSubMenu('Development')->setClass('/*atk-menu atk-menu-naked atk-menu-vertical*/');
        $download->addMenuItem('development')->js('click')->univ()->redirect('development');
        $download->addMenuItem('contribute')->js('click')->univ()->redirect('contribute');
        $download->addMenuItem('updates')->js('click')->univ()->redirect('updates');
        $download->addMenuItem('troubleshouting')->js('click')->univ()->redirect('troubleshouting');

        $download = $this->addSubMenu('Download')->setClass('/*atk-menu atk-menu-naked atk-menu-vertical*/');
        $download->addMenuItem('framework')->js('click')->univ()->redirect('framework');
        $download->addMenuItem('plugins')->js('click')->univ()->redirect('plugins');
        $download->addMenuItem('demo')->js('click')->univ()->redirect('demo');
        $download->addMenuItem('logo')->js('click')->univ()->redirect('logo');

        $download = $this->addSubMenu('Community')->setClass('/*atk-menu atk-menu-naked atk-menu-vertical*/');
        $download->addMenuItem('community')->js('click')->univ()->redirect('community');
        $download->addMenuItem('google-groups','Google Groups')->js('click')->univ()->redirect('google-groups');
        $download->addMenuItem('stack_overflow')->js('click')->univ()->redirect('stack_overflow');
        $download->addMenuItem('google-plus','Google Plus')->js('click')->univ()->redirect('google-plus');
        $download->addMenuItem('facebook')->js('click')->univ()->redirect('facebook');

        $doc = $this->addSubMenu('Documentation')->setClass('/*atk-menu atk-menu-naked atk-menu-vertical*/');
        $doc->addMenuItem('doc','Documentation')->js('click')->univ()->redirect('doc');
        $doc->addMenuItem('getting-started','Getting Started')->js('click')->univ()->redirect('getting-started');
        $doc->addMenuItem('class-reference','Class Reference')->js('click')->univ()->redirect('class-reference');
        $doc->addMenuItem('plugins')->js('click')->univ()->redirect('plugins');

        $blog = $this->addSubMenu('Blog')->setClass('/*atk-menu atk-menu-naked atk-menu-vertical*/');
        $blog->addMenuItem('blog')->js('click')->univ()->redirect('blog');

        $help = $this->addSubMenu('Help')->setClass('/*atk-menu atk-menu-naked atk-menu-vertical*/');
        $help->addMenuItem('help')->js('click')->univ()->redirect('help');

    }
    function defaultTemplate() {
        return array('bottom-menu');
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
//    function defaultTemplate() {
//        return array('mainmenu');
//    }
//}
