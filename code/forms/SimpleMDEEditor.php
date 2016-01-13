<?php

class SimpleMDEEditor extends TextareaField
{
    /**
     * Returns the field holder used by templates
     * @return {string} HTML to be used
     */
    public function FieldHolder($properties=array())
    {
        Requirements::css('vendor/etdsolutions/simplemde-markdown-editor/simplemde.min.css');
        Requirements::javascript('vendor/etdsolutions/simplemde-markdown-editor/simplemde.min.js');
        Requirements::css(MARKDOWN_MODULE_BASE.'/css/editor.css');
        Requirements::javascript(MARKDOWN_MODULE_BASE.'/javascript/editor.js');
        return parent::FieldHolder($properties);
    }
}
