# SimpleMDE Editor & Markdown for SilverStripe 3
This module adds a field and a data type that allows for Markdown editing in the CMS, and HTML template rendering
using the Github Flavoured Markdown parser [Parsedown](http://parsedown.org/).

It is integrated with the [SimpleMDE Markdown Editor](https://github.com/NextStepWebs/simplemde-markdown-editor)
for CMS editing (see "Editor limitations" below).

## Requirements
- SilverStripe 3.x

## Usage
Use the Markdown data type as your fields data type, then use the SimpleMDEEditor field in the CMS for editing.

### Page class:

```php
class MyMarkdownPage extends Page
{
    public static $db=array(
        'MarkdownContent'=>'Markdown'
    );

    public function getCMSFields()
    {
        $fields=parent::getCMSFields();

        $editor = SimpleMDEEditor::create('MarkdownContent', 'Page Content (Markdown)');
        $fields->addFieldToTab('Root.Main', $editor);

        return $fields;
    }
}
```

### Template:

```html
<div class="content">
    $MarkdownContent  <!-- Will show as rendered html -->
</div>
```

## Editor limitations:
SimpleMDE has some nice features such as full-page editing/preview, as well as "Side by Side" editing
[see demo](http://nextstepwebs.github.io/simplemde-markdown-editor/). Unfortunately this doesn't play nice with
SilverStripe's CMS as the fullscreen elements are positioned statically. Rather than some ugly hacking, and until
someone hopefully finds an elegant solution (pull requests please), fullscreen & side-by-side functionality has been
hidden from the toolbar.