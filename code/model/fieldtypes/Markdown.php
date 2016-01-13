<?php

class Markdown extends Text
{

    public static $casting=array(
        'AsHTML'=>'HTMLText',
        'Markdown'=>'Text'
    );


    public static $escape_type='xml';

    /**
     * @return {string} Markdown rendered as HTML
     */
    public function AsHTML()
    {
        $Parsedown = new Parsedown();
        return $Parsedown->text($this->value);
    }

    /**
     * Renders the field used in the template
     * @return {string} HTML to be used in the template
     */
    public function forTemplate()
    {
        return $this->AsHTML();
    }
}
