# SimpleMDE Editor & Markdown for SilverStripe 3
This module adds a field and a data type that allows for Markdown editing in the CMS, and HTML template rendering using the Github Flavoured Markdown parser [Parsedown](http://parsedown.org/).

It is integrated with the [SimpleMDE Markdown Editor](https://github.com/NextStepWebs/simplemde-markdown-editor) for CMS editing (see "Editor limitations" below).

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

### .htaccess:
The JavaScript and CSS resources needed to show the editor is unfortunately installed in the `vendor` folder. By default, SilverStripe blocks all HTTP requests to it (note that we do not want to include the dependencies directly because we want Composer to handle those dependencies). In order to get this to work, we'll need to allow access to those resources.

Add the following line:

```
RewriteCond %{REQUEST_FILENAME} !\.(js|css)$
```

above this line:

```
RewriteRule ^vendor(/|$) - [F,L,NC]
```

so that the `.htaccess` file would look similar to the following:

```
# Deny access to potentially sensitive files and folders
RewriteCond %{REQUEST_FILENAME} !\.(js|css)$   
RewriteRule ^vendor(/|$) - [F,L,NC]

RewriteRule silverstripe-cache(/|$) - [F,L,NC]
RewriteRule composer\.(json|lock) - [F,L,NC]
```

## Editor limitations:
SimpleMDE has some nice features such as full-page editing/preview, as well as "Side by Side" editing [see demo](http://nextstepwebs.github.io/simplemde-markdown-editor/). Unfortunately this doesn't play nice with SilverStripe's CMS as the fullscreen elements are positioned statically. Rather than some ugly hacking, and until someone hopefully finds an elegant solution (pull requests please), fullscreen & side-by-side functionality has been hidden from the toolbar.
