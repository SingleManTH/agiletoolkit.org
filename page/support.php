<?php
class page_support extends Page {
    function init(){
        parent::init();

        $parser = new dflydev\markdown\MarkdownExtraParser();

        $html = $parser->transformMarkdown(file_get_contents(
            $this->api->locatePath('docs','test.md')
        ));

        $this->template->setHTML('Content',$html);
        
    }
}
