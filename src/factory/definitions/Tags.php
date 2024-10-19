<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */

declare (strict_types=1);

namespace pvc\html\factory\definitions;

/**
 * The tagvoid and tag classes in this factory library extend their respective objects in the abstract library.
 * The sole difference is that the ones in the library have magic setters for attributes.  You can write something
 * like $tag->accesskey('m') when the attribute does not yet exist (or if you are updating it for some reason) instead
 * of a more cumbersome method of separately creating the attribute and then adding it to the tag, e.g.
 *
 * $attribute = $factory->makeAttribute('accesskey');
 * $attribute->setValue('m');
 * $tag->setAttribute($attribute);
 */

use pvc\html\factory\factory\HtmlFactory;
use pvc\html\factory\tag\Tag;
use pvc\html\factory\tag\TagVoid;

use pvc\interfaces\html\factory\HtmlFactoryInterface;

use function DI\create;
use function DI\get;


return [

    /**
     * anchor tag, creates a hyperlink
     */
    'a' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'a')
        ->method('setAllowedAttributes',
                 ['download', 'href', 'hreflang', 'media', 'ping', 'referrerpolicy', 'rel', 'target', 'type']),

    /**
     * defines an abbreviation or an acronym.  Use the global title attribute to show the description for the
     * abbreviation/acronym when you mouse over the element.
     */
    'abbr' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'abbr'),

    /**
     * The <address> tag defines the contact information for the author/owner of a document or an article.
     */
    'address' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'address'),

    /**
     * defines an area inside an image map
     */
    'area' => create(TagVoid::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'area')
        ->method('setAllowedAttributes',
                 ['alt','coords', 'download', 'href',
                     'hreflang', 'media', 'referrerpolicy', 'rel',
                     'shape', 'target', 'type'
                 ]),

    /**
     * specifies independent, self-contained content. An article should make sense on its own, and it should be possible
     * to distribute it independently of the rest of the site.
     */
    'article' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'article'),

    /**
     * The <aside> tag defines some content aside from the content it is placed in. The <aside> content is often
     * placed as a sidebar in a document.
     */
    'aside' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'aside'),

    /**
     * used to embed sound content in a document
     */
    'audio' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'audio')
        ->method('setAllowedAttributes', ['autoplay', 'controls', 'loop', 'muted', 'preload', 'src']),

    /**
     * makes the contained content bold.  Better to use css
     */
    'b' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'b'),

    /**
     * Specify a default URL and a default target for all links on a page
     */
    'base' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'base')
        ->method('setAllowedAttributes', ['href', 'target']),

    /**
     * BDI stands for Bi-Directional Isolation.  The <bdi> tag isolates a part of text that might be formatted in
     * a different direction from other text outside it. This element is useful when embedding user-generated content
     * with an unknown text direction.
     */
    'bdi' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'bdi'),

    /**
     * bi directional override
     */
    'bdo' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'bdo'),

    /**
     * A section that is quoted from another source
     */
    'blockquote' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'blockquote')
        ->method('setAllowedAttributes', ['cite']),

    /**
     * defines the document's body.
     */
    'body' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'body'),

    /**
     * inserts a single line break
     */
    'br' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'br'),

    /**
     * defines a clickable button.
     */
    'button' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'button')
        ->method('setAllowedAttributes',
                [
                    'autofocus','disabled', 'form', 'formaction', 'formenctype', 'formmethod', 'formnovalidate',
                    'formtarget', 'popovertarget', 'popovertargetaction', 'name', 'type', 'value'
                    ]),
    /**
     * used to draw graphics, on the fly, via scripting (usually JavaScript)
     */
    'canvas' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName','canvas')
        ->method('setAllowedAttributes', ['height', 'width']),

    /**
     * used inside a table element, defines a table caption.  Must immediately follow the opening table tag
     */
    'caption' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'caption'),

    /**
     * defines the title of a creative work
     */
    'cite' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'cite'),

    /**
     * Define some text as computer code
     */
    'code' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'code'),

    /**
     * specifies column properties for each column within a <colgroup> element.  useful for applying styles to entire
     * columns, instead of repeating the styles for each cell, for each row
     */
    'col' => create(TagVoid::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'col'),

    /**
     * specifies a group of one or more columns in a table for formatting
     */
    'colgroup' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'colgroup'),

    /**
     * used to add a machine-readable translation of a given content
     */
    'data' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'data'),

    /**
     * specifies a list of pre-defined options for an <input> element
     */
    'datalist' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'datalist'),

    /**
     * used to describe a term/name in a description list (see 'dl' and 'dt')
     */
    'dd' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'dd'),

    /**
     * defines text that has been deleted from a document. Browsers will usually strike a line through deleted text.
     */
    'del' => create(TagVoid::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName','embed')
        ->method('setAllowedAttributes', ['cite', 'datetime']),

    /**
     * creates a widget that can open/close to provide a summary or detailed set of information
     */
    'details' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName','details')
        ->method('setAllowedAttributes', ['open']),

    /**
     * stands for the "definition element", and it specifies a term that is going to be defined within the content
     */
    'dfn' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'dfn'),

    /**
     * defines a dialog box or subwindow, making it easy to create popup dialogs and modals on a web page
     */
    'dialog' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName','dialog')
        ->method('setAllowedAttributes', ['open']),

    /**
     * section in a document (the classic 'containing element')
     */
    'div' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'div'),

    /**
     * defines a description list
     */
    'dl' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'dl'),

    /**
     * defines a term/name in a description list
     */
    'dt' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'dt'),

    /**
     * define emphasized text. The content inside is typically displayed in italic
     */
    'em' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'em'),

    /**
     * defines a container for an external resource, such as a web page, a picture, a media player
     */
    'embed' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName','del')
        ->method('setAllowedAttributes', ['height', 'src', 'type', 'width']),

    /**
     * used to group related elements in a form
     */
    'fieldset' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName','fieldset')
        ->method('setAllowedAttributes', ['disabled', 'form', 'name']),

    /**
     * defines a caption for a <figure> element
     */
    'figcaption' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'figcaption'),

    /**
     * specifies self-contained content, like illustrations, diagrams, photos, code listings, etc
     */
    'figure' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'figure'),

    /**
     * used to create an HTML form for user input
     */
    'form' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'form')
        ->method('setAllowedAttributes',
                 ['accept-charset', 'action', 'autocomplete', 'enctype', 'method', 'name', 'novalidate', 'rel', 'target'])
        ->method('setAllowedSubtags',
                 ['input', 'textarea', 'button', 'select','option', 'optgroup', 'fieldset', 'label', 'output']),

    /**
     * heading levels
     */
    'h1' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'h1'),

    'h2' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'h2'),

    'h3' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'h3'),

    'h4' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'h4'),

    'h5' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'h5'),

    'h6' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'h6'),

    /**
     * a container for metadata (data about data) and is placed between the <html> tag and the <body> tag
     */
    'head' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'head')
        ->method('setAllowedAttributes', ['none'])
        ->method('setAllowedSubtags',
                 ['title', 'style', 'base', 'link','meta', 'script', 'noscript']),

    /**
     * represents a container for introductory content or a set of navigational links.
     */
    'header' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'header'),

    /**
     * used to surround a heading and one or more <p> elements.
     */
    'hgroup' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'hgroup'),

    /**
     * defines a thematic break in an HTML page (e.g. a shift of topic).  most often displayed as a horizontal rule
     * that is used to separate content
     */
    'hr' => create(TagVoid::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'hr'),

    /**
     * represents the root of an HTML document
     */
    'html' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'html')
        ->method('setAllowedSubtags', ['head', 'body', 'footer']),

    /**
     * defines a part of text in an alternate voice or mood. The content inside is typically displayed in italic
     */
    'i' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'i'),

    /**
     * specifies an inline frame
     */
    'iframe' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName','iframe')
        ->method('setAllowedAttributes',
                 ['allow', 'height', 'loading', 'name', 'referrerpolicy', 'sandbox', 'src', 'srcdoc', 'width']),

    /**
     * used to embed an image in an HTML page
     */
    'img' => create(TagVoid::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'img')
        ->method('setAllowedAttributes',
                ['alt', 'crossorigin', 'height', 'ismap', 'loading', 'longdesc', 'referrerpolicy', 'sizes',
                    'src', 'srcset', 'usemap', 'width'
                ]),

    /**
     * specifies an input field where the user can enter data
     */
    'input' => create(TagVoid::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'input')
        ->method('setAllowedAttributes',
                 [
                     'accept', 'alt', 'autocomplete', 'autofocus', 'checked', 'dirname', 'disabled', 'form',
                     'formaction', 'formenctype', 'formmethod', 'formnovalidate', 'formtarget', 'height', 'list',
                     'max', 'maxlength', 'min', 'minlength', 'multiple', 'name', 'pattern', 'placeholder',
                     'popovertarget', 'popovertargetaction', 'readonly', 'required', 'size', 'src', 'step',
                     'type', 'value', 'width',
                 ]),

    /**
     * defines a text that has been inserted into a document. Browsers will usually underline inserted text
     */
    'ins' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'ins')
        ->method('setAllowedAttributes', ['cite','datetime']),

    /**
     * used to define keyboard input. The content inside is displayed in the browser's default monospace font.
     * This tag is not deprecated. However, it is possible to achieve richer effect by using CSS.
     */
    'kbd' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'kbd'),

    /**
     * defines a label for an element
     */
    'label' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'label')
        ->method('setAllowedAttributes', ['for', 'form']),

    /**
     * defines a caption for the <fieldset> element
     */
    'legend' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'legend'),

    /**
     * defines a list item
     */
    'li' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'li')
        ->method('setAllowedAttributes', ['value']),

    /**
     * defines the relationship between the current document and an external resource
     */
    'link' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'link')
        ->method('setAllowedAttributes',
                 ['crossorigin', 'href', 'hreflang', 'media', 'referrerpolicy', 'rel', 'sizes', 'title', 'type']),

    /**
     * Specify the main content of the document
     */
    'main' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'main'),

    /**
     * image map
     */
    'map' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'map')
        ->method('setAllowedAttributes', ['charset', 'content', 'http-equiv', 'name']),

    /**
     * defines text that should be marked or highlighted
     */
    'mark' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'mark'),

    /**
     * defines an unordered list of content.  It is an alternative to the <ul> tag and browsers will treat these two
     * lists equally.
     */
    'menu' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'menu')
        ->method('setAllowedSubtags', ['li']),

    /**
     * describes metadata within an HTML document
     */
    'meta' => create(TagVoid::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'meta')
        ->method('setAllowedAttributes', ['charset', 'content', 'http-equiv', 'name']),

    /**
     * defines a scalar measurement within a known range, or a fractional value. This is also known as a gauge
     */
    'meter' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'meter')
        ->method('setAllowedAttributes', ['form', 'high', 'low', 'max', 'min', 'optimum', 'value']),

    /**
     * A set of navigation links
     */
    'nav' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'nav')
        ->method('setAllowedSubtags', ['a']),

    /**
     * defines an alternate content to be displayed to users that have disabled scripts in their browser
     */
    'noscript' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'noscript'),

    /**
     * defines a container for an external resource
     */
    'object' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'object')
        ->method('setAllowedAttributes',
                 ['data', 'form', 'height', 'name', 'type', 'typemustmatch', 'usemap', 'width']),

    /**
     * defines an ordered list
     */
    'ol' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'ol')
        ->method('setAllowedAttributes', ['reversed', 'start', 'type']),

    /**
     * used to group related options in a <select> element (drop-down list)
     */
    'optgroup' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'optgroup')
        ->method('setAllowedAttributes', ['disabled', 'label']),

    /**
     * defines an option in a select list
     */
    'option' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'option')
        ->method('setAllowedAttributes', ['disabled', 'label', 'selected', 'value',]),

    /**
     * used to represent the result of a calculation (like one performed by a script)
     */
    'output' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'output')
        ->method('setAllowedAttributes', ['for', 'form', 'name']),

    /**
     * defines a paragraph
     */
    'p' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'p'),

    /**
     * define parameters for an <object> element
     */
    'param' => create(TagVoid::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'param')
        ->method('setAllowedAttributes', ['name', 'value',]),

    /**
     * gives web developers more flexibility in specifying image resources
     */
    'picture' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'picture')
        ->method('setAllowedSubtags', ['source', 'img']),

    /**
     * defines preformatted text.  element is displayed in a fixed-width font, and the text preserves both spaces and
     * line breaks. The text will be displayed exactly as written in the HTML source code.
     */
    'pre' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'pre'),

    /**
     * Use the <progress> tag in conjunction with JavaScript to display the progress of a task.
     */
    'progress' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'progress')
        ->method('setAllowedAttributes', ['max', 'value']),

    /**
     * defines a short quotation
     */
    'q' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName','q')
        ->method('setAllowedAttributes', ['cite']),

    /**
     * used to provide parentheses around a ruby text, to be shown by browsers that do not support ruby annotations
     */
    'rp' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'rp'),

    /**
     * defines an explanation or pronunciation of characters (for East Asian typography) in a ruby annotation
     */
    'rt' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'rt'),

    /**
     * specifies a ruby annotation. A ruby annotation is a small extra text, attached to the main text to indicate
     * the pronunciation or meaning of the corresponding characters. This kind of annotation is often used in
     * Japanese publications
     */
    'ruby' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'ruby'),

    /**
     * specifies text that is no longer correct, accurate or relevant. The text will be displayed with a line through it
     */
    's' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 's'),

    /**
     * define sample output from a computer program
     */
    'sample' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'sample'),

    /**
     * used to embed a client-side script (JavaScript)
     */
    'script' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'script')
        ->method('setAllowedAttributes',
                [
                    'async', 'crossorigin', 'defer', 'integrity', 'nomodule', 'referrerpolicy', 'src', 'type'
                ]),

    /**
     * Elements inside a <search> element are typically form elements used to perform a search
     */
    'search' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'search'),

    /**
     * defines a section in a document
     */
    'section' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'section'),

    /**
     * creates a drop-down list
     */
    'select' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'select')
        ->method('setAllowedAttributes',
                 ['autofocus','disabled', 'form', 'multiple', 'name', 'required', 'size'])
        ->method('setAllowedSubTags', ['option']),

    /**
     * defines smaller text (like copyright and other side-comments)
     */
    'small' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'small'),

    /**
     * used to specify multiple media resources for media elements, such as <video>, <audio>, and <picture>
     */
    'source' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'source')
        ->method('setAllowedAttributes',
                 ['media','sizes', 'src', 'srcset', 'type']),

    /**
     * an inline container used to mark up a part of a text; the inline version of div
     */
    'span' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'span'),

    /**
     * used to define text with strong importance. The content inside is typically displayed in bold
     */
    'strong' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'strong'),

    /**
     * used to define style information (CSS) for a document
     */
    'style' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'style')
        ->method('setAllowedAttributes',
                 ['media', 'type']),

    /**
     * defines subscript text. Subscript text appears half a character below the normal line, and is sometimes
     * rendered in a smaller font
     */
    'sub' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'sub'),

    /**
     * defines a visible heading for the <details> element. The heading can be clicked to view/hide the details.
     * The <summary> element should be the first child element of the <details> element.
     */
    'summary' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'summary'),

    /**
     * defines superscript text
     */
    'sup' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'sup'),

    /**
     * defines a container for SVG graphics
     */
    'svg' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'svg'),

    /**
     * defines an HTML table
     */
    'table' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'table')
        ->method('setAllowedSubTags',
                 ['caption', 'colgroup', 'td', 'th', 'tr', 'thead', 'tbody', 'tfoot']),

    /**
     * used to group the body content in an HTML table
     */
    'tbody' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'tbody')
        ->method('setAllowedSubTags', ['tr']),

    /**
     * defines a standard data cell in an HTML table (table detail)
     */
    'td' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'td')
        ->method('setAllowedAttributes', ['colspan', 'headers', 'rowspan']),

    /**
     * used as a container to hold some HTML content hidden from the user when the page loads. You can use the
     * <template> tag if you have some HTML code you want to use over and over again, but not until you ask for it.
     * To do this without the <template> tag, you have to create the HTML code with JavaScript to prevent the browser
     * from rendering the code.
     */
    'template' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'template'),

    /**
     * defines a multi-line text input control
     */
    'textarea' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'textarea')
        ->method('setAllowedAttributes', ['autofocus', 'cols', 'dirname', 'disabled', 'form',
            'maxlength', 'name', 'placeholder', 'readonly', 'required', 'rows', 'wrap']),

    /**
     * used to group footer content in an HTML table
     * The <tfoot> element must have one or more <tr> tags inside
     */
    'tfoot' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'tfoot')
        ->method('setAllowedSubTags', ['tr']),

    /**
     * defines a header cell in an HTML table
     */
    'th' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'th')
        ->method('setAllowedAttributes', ['abbr', 'colspan', 'headers', 'rowspan', 'scope']),

    /**
     * used to group header content in an HTML table
     * must have one or more <tr> tags inside
     */
    'thead' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'thead')
        ->method('setAllowedSubTags', ['tr']),

    /**
     * defines a specific time (or datetime)
     */
    'time' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'time')
        ->method('setAllowedAttributes', ['datetime']),

    /**
     * defines the title of the document
     */
    'title' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'title'),

    /**
     * defines a row in an HTML table
     * contains one or more <th> or <td> elements
     */
    'tr' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'tr')
        ->method('setAllowedSubTags', ['td', 'td']),

    /**
     * specifies text tracks for <audio> or <video> elements
     */
    'track' => create(TagVoid::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'track')
        ->method('setAllowedAttributes', ['default', 'kind', 'label', 'src', 'srclang',]),

    /**
     * represents some text that is unarticulated and styled differently from normal text, such as misspelled words
     */
    'u' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'u'),

    /**
     * defines an unordered (bulleted) list
     */
    'ul' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'ul')
        ->method('setAllowedSubTags', ['li']),

    /**
     * used to defines a variable in programming or in a mathematical expression.
     * This tag is not deprecated. However, it is possible to achieve richer effect by using CSS
     */
    'var' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'var'),

    /**
     * used to embed video content in a document
     */
    'video' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'video')
        ->method('setAllowedAttributes', ['autoplay', 'controls', 'height', 'loop', 'muted',
            'poster', 'preload', 'src', 'width']),

    /**
     * (Word Break Opportunity) tag specifies where in a text it would be ok to add a line-break.
     * When a word is too long, the browser might break it at the wrong place. You can use the <wbr> element to add
     * word break opportunities.
     */
    'wbr' => create(Tag::class)
        ->constructor(get(HtmlFactoryInterface::class))
        ->method('setName', 'wbr'),
];
