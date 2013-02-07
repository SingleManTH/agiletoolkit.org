<?php
class page_support extends Page {
    function init(){
        parent::init();

        $parser = new dflydev\markdown\MarkdownParser();

        $html = $parser->transformMarkdown(file_get_contents(
            $this->api->locatePath('docs','data/dsql/overview.md')
        ));

        $this->template->setHTML('Content',$html);
        
    }
}
