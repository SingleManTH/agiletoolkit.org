<?php
class page_doc extends Page {
    public $page;
    function init(){
        parent::init();

        list($this->page,$junk)=explode('.',$_GET['doc']);



        $parser = new dflydev\markdown\MarkdownExtraParser();
        $html = $parser->transformMarkdown(file_get_contents(
            $this->api->locatePath('docs',$this->page.'.md')
        ));

        $html=str_replace('<pre><code>','<?Code?>',$html);
        $html=str_replace('</code></pre>','<?/Code?>',$html);
        $html=preg_replace(
            '/<p><img src="([^"]*)" alt="([^"]*)" \/><\/p>/',
            '<?Image?>\\1 \\2<?/?>',
            $html
        );


        $this->template->loadTemplateFromString($html);

        $page=$this;

        $page->template->eachTag('Code',function($a,$b) use($page){
            $page->add('romaninsh/documenting/View_Example',null,$b)->set($a,true);
        });

        $page->template->eachTag('Example',function($a,$b) use($page){
            $page->add('romaninsh/documenting/View_Example',null,$b)->set($a);
        });

        $page->template->eachTag('Image',function($a,$b) use($page){
            list($file,$title)=explode(' ',$a,2);
            $page->add('View',null,$b)
                ->setElement('image')
                ->setAttr('src',$page->api->locateURL('public','images/doc/'.dirname($page->page).'/'.$file))
                ->setAttr('alt',$title)
                ->setAttr('title',$title);
        });
    }
    /*
    function defaultTemplate(){
        return array('page/doc');
    }
     */
}
