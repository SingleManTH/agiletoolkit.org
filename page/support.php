<?php
class page_support extends Page {
    function init(){
        parent::init();

        $parser = new dflydev\markdown\MarkdownExtraParser();

        $html = $parser->transformMarkdown(file_get_contents(
            $this->api->locatePath('docs','test.md')
        ));

        $this->template->loadTemplateFromString($html);

        $page=$this;

        //$page->template->eachTag('Code',function($a,$b) use($page){ $page->add('View_Code',null,$b)->set($a); });
        $page->template->eachTag('Example',function($a,$b) use($page){ $page->add('romaninsh/documenting/View_Example',null,$b)->set($a); });
        //$page->template->eachTag('Silent',function($a,$b) use($page){ $page->add('View_Example',null,$b)->set($a,true); });
        //$page->template->eachTag('ExecuteTrigger',function($a,$b) use($page){ $page->add('View_ExecuteTrigger',null,$b)->set($a,'trigger'); });
    }
}
