<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */

declare (strict_types=1);

namespace pvc\html\factory\definitions;

use pvc\filtervar\FilterVarValidateUrl;
use pvc\html\abstract\attribute\AttributeMultiValue;
use pvc\html\abstract\attribute\AttributeSingleValue;
use pvc\html\abstract\attribute\AttributeVoid;
use pvc\html\factory\val_tester\callable\CallableTesterCharset;
use pvc\html\factory\val_tester\callable\CallableTesterLang;
use pvc\html\factory\val_tester\regex\RegexAccessKey;
use pvc\html\factory\val_tester\regex\RegexCssClass;
use pvc\html\factory\val_tester\regex\RegexIdName;
use pvc\html\factory\val_tester\regex\RegexSizes;
use pvc\html\factory\val_tester\regex\RegexTextDirection;
use pvc\html\factory\val_tester\ValTesterAreaCoords;
use pvc\html\factory\val_tester\ValTesterMediaTypeSpecifier;
use pvc\html\factory\val_tester\ValTesterTitle;
use pvc\http\mime\MimeTypeFactory;
use pvc\http\mime\MimeTypes;
use pvc\http\mime\MimeTypesSrc;
use pvc\intl\LanguageCodes;
use pvc\msg\Msg;
use pvc\parser\date_time\ParserJavascriptDateTime;
use pvc\regex\boolean\RegexTrueFalse;
use pvc\regex\boolean\RegexYesNo;
use pvc\regex\filename\RegexWindowsFilename;
use pvc\regex\numeric\RegexPositiveIntegerSimple;
use pvc\regex\Regex;
use pvc\validator\val_tester\always_true\AlwaysTrueTester;
use pvc\validator\val_tester\bool\BoolTester;
use pvc\validator\val_tester\callable\CallableTester;
use pvc\validator\val_tester\ctype\CTypeTesterDigit;
use pvc\validator\val_tester\ctype\CTypeTesterPrintable;
use pvc\validator\val_tester\filter_var\FilterVarTester;
use pvc\validator\val_tester\list_choice\ListChoiceTester;
use pvc\validator\val_tester\parser\ParserTester;
use pvc\validator\val_tester\regex\RegexTester;

use function DI\create;
use function DI\get;

/**
 * configuration for the creation of attributes.
 */

/**
 * TODO: look at consolidating attribute testers for things like ids, name, classes where the rules for
 * valid values are all the same
 *
 * TODO: check whether other multivalued attributes besides sandbox can be void, or whether sandbox is the only one
 */

/**
 * list of context-sensitive attributes:
 *
 *      dirname
 *      for
 *      form
 *      headers
 *      high
 *      list
 *      type
 */
return [
    'accept' => create(AttributeMultiValue::class)
        ->constructor('accept', get(ValTesterMediaTypeSpecifier::class)),

    /**
     * used inside the form tag, specifies the character encodings that are to be used for the form submission
     */
    'accept-charset' => create(AttributeMultiValue::class)
        ->constructor('accept-charset', create(CallableTesterCharset::class)),

    /**
     * one of the global attributes, specifies a shortcut key to activate/focus an element
     */
    'accesskey' => create(AttributeSingleValue::class)
        ->constructor(
            'accesskey',
            create(RegexTester::class)->constructor(create(RegexAccessKey::class)))
        ->method('setGlobal', true),

    /**
     * used inside the form tag, specifies where to send the form-data when a form is submitted
     */
    'action' => create(AttributeSingleValue::class)
        ->constructor(
            'action',
            create(FilterVarTester::class)->constructor(create(FilterVarValidateUrl::class))
        ),

    /**
     * used within the area, img and input elements, specifies an alternate text when the original element fails to
     * display
     */
    'alt' => create(AttributeSingleValue::class)
        ->constructor('alt', create(CTypeTesterPrintable::class)),

    'async' => create(AttributeVoid::class)
        ->constructor('async', create(BoolTester::class)),


    'autocomplete' => create(AttributeSingleValue::class)
        ->constructor(
            'autocomplete',
            create(ListChoiceTester::class)->constructor(get('autocompletelistchoices'))
        ),

    'autofocus' => create(AttributeVoid::class)
        ->constructor('autofocus', create(BoolTester::class)),

    'autoplay' => create(AttributeVoid::class)
        ->constructor('autoplay', create(BoolTester::class)),

    'charset' => create(AttributeSingleValue::class)
        ->constructor('charset', create(CallableTesterCharset::class)),

    'checked' => create(AttributeVoid::class)
        ->constructor('checked', create(BoolTester::class)),

    'cite' => create(AttributeSingleValue::class)
        ->constructor(
            'cite',
            create(FilterVarTester::class)
                ->constructor(create(FilterVarValidateUrl::class))
        ),

    'class' => create(AttributeMultiValue::class)
        ->constructor(
            'class',
            create(RegexTester::class)->constructor(create(RegexCssClass::class)))
        ->method('setGlobal', true),

    /**
     * rows and cols are attributes of the textarea element, but it is probably preferable to set those
     * visual characteristics with css.  The implementation here is provided for completeness......
     */
    'cols' => create(AttributeSingleValue::class)
        ->constructor('cols', create(CTypeTesterDigit::class)),

    'colspan' => create(AttributeSingleValue::class)
        ->constructor('colspan', create(CTypeTesterDigit::class)),

    /**
     * content appears inside the meta element.  If the name attribute is set, content can be any string that describes
     * the metadata more fully.  This description should apply to the entire page and there's really no
     * validation that can be done on the string per se.
     *
     * If the http-equiv attribute is set, content is a pragma directive, which provides caching information which
     * is equivalent to a similarly named http header.  The caching directive is specifically for this page, whereas
     * server-side directives apply to all pages.  The http-equiv attribute has been deprecated in HTML5 and is
     * included here only for the sake of completeness.
     */
    'content' => create(AttributeSingleValue::class)
        ->constructor('content', create(AlwaysTrueTester::class)),

    'contenteditable' => create(AttributeSingleValue::class)
        ->constructor(
            'contenteditable',
            create(RegexTester::class)->constructor(create(RegexTrueFalse::class)))
        ->method('setGlobal', true),

    'controls' => create(AttributeVoid::class)->constructor('controls', create(BoolTester::class)),

    'coords' => create(AttributeSingleValue::class)
        ->constructor('coords', create(ValTesterAreaCoords::class)),

    'crossorigin' => create(AttributeSingleValue::class)
        ->constructor(
            'crossorigin',
            create(ListChoiceTester::class)
                ->constructor(get('crossOriginChoices'))
        ),

    /**
     * specifies the resource for an object element to use
     */
    'data' => create(AttributeSingleValue::class)
        ->constructor(
            'data',
            create(FilterVarTester::class)->constructor( create(FilterVarValidateUrl::class))
        ),

    /**
     * used in the ins and del elements to track the date/time a particular change was made to a document
     */
    'datetime' => create(AttributeSingleValue::class)
        ->constructor(
            'datetime',
            create(ParserTester::class)
                ->constructor(create(ParserJavascriptDateTime::class)
                                  ->constructor(create(Msg::class)))
        ),

    'default' => create(AttributeVoid::class)->constructor('default', create(BoolTester::class)),

    'defer' => create(AttributeVoid::class)->constructor('defer', create(BoolTester::class)),

    'dir' => create(AttributeSingleValue::class)
        ->constructor(
            'dir',
            create(RegexTester::class)->constructor(create(RegexTextDirection::class)))
        ->method('setGlobal', true),

    /**
     * TODO: decide whether to pursue automatically generating the dirname value based on the name of the
     * containing element.....
     */
    'dirname' => create(AttributeSingleValue::class)
        ->constructor('dirname', create(AlwaysTrueTester::class)),

    'disabled' => create(AttributeVoid::class)->constructor('disabled', create(BoolTester::class)),

    /**
     * the windows operating systems are the most restrictive in terms of length and characters allowed, so if
     * the filename is good enough for windows, it ought to be ok on Mac and Unix also
     */
    'download' => create(AttributeSingleValue::class)
        ->constructor(
            'download',
            create(RegexTester::class)->constructor(create(RegexWindowsFilename::class))
        ),

    'draggable' => create(AttributeSingleValue::class)
        ->constructor(
            'draggable',
            create(RegexTester::class)->constructor(create(RegexTrueFalse::class)))
        ->method('setGlobal', true),

    'enctype' => create(AttributeSingleValue::class)
        ->constructor(
            'enctype',
            create(ListChoiceTester::class)->constructor(get('enctypechoices'))
        ),

    /**
     * The enterkeyhint attribute is a Global Attribute, and can be used on any HTML element, but the element
     * must be editable.  It changes the text on a virtual keyboard Enter key from 'Enter' to whatever the value
     * of this attribute is
     */
    'enterkeyhint' => create(AttributeSingleValue::class)
        ->constructor('enterkeyhint', create(AlwaysTrueTester::class))
        ->method('setGlobal', true),

    /**
     * used in a label element, it specifies the id of the form element to which the label applies
     * used in an output element, it specifies the ids of the input elements to be used in the calculation
     */
    'for' => create(AttributeMultiValue::class)
        ->constructor('for', create(AlwaysTrueTester::class)),

    /**
     * used to include an input which belongs to a form but is coded outside the form structure.  The value
     * of the attribute must be the id of the form
     */
    'form' => create(AttributeSingleValue::class)
        ->constructor('form', create(AlwaysTrueTester::class)),

    /**
     * used to override the action attribute on the surrounding form element, this attribute can appear
     * on an input element or a button element as long as the element/button type is 'submit'
     */
    'formaction' => create(AttributeSingleValue::class)
        ->constructor('formaction', create(FilterVarTester::class)->constructor(
                create(FilterVarValidateUrl::class))),

    'formnovalidate' => create(AttributeVoid::class)
        ->constructor('formnovalidate', create(BoolTester::class)),

    /**
     * applies to <th> and <td> elements, specifies the id of the <th> element to which this cell belongs.
     * Useful perhaps when a <th> element has a colspan > 1
     */
    'headers' => create(AttributeSingleValue::class)
        ->constructor('headers', create(AlwaysTrueTester::class)),

    'height' => create(AttributeSingleValue::class)
        ->constructor('height', create(RegexTester::class)
            ->constructor(create(RegexPositiveIntegerSimple::class))),

    'hidden' => create(AttributeVoid::class)
        ->constructor('hidden', create(BoolTester::class))
        ->method('setGlobal', true),

    /**
     * used inside the meter tag, must be a positive number >= min attribute and <= max attribute.  This is meant to
     * indicate what is 'loud' because actual volume depends on the recording levels as well as the current
     * speaker volume
     */
    'high' => create(AttributeSingleValue::class)
        ->constructor(
            'high', create(RegexTester::class)
                ->constructor(create(RegexPositiveIntegerSimple::class))
        ),

    'href' => create(AttributeSingleValue::class)
        ->constructor('href', create(FilterVarTester::class)
            ->constructor(create(FilterVarValidateUrl::class))
        ),

    'hreflang' => create(AttributeSingleValue::class)
        ->constructor('hreflang', create(CallableTester::class)
            ->constructor([LanguageCodes::class, 'validate'])
        ),

    /**
     * validating header names and values could be a huge project.  There are some very simple "validators"
     * which aim to make sure header names and values are not null and conform to the rules for constructing
     * the identifiers that make up names and values.  The IANA registry has the com[plete specification, but
     * it is large......
     */
    'http-equiv' => create(AttributeSingleValue::class)
        ->constructor('http-equiv', create(AlwaysTrueTester::class)),

    'id' => create(AttributeSingleValue::class)
        ->constructor('id', create(RegexTester::class)
            ->constructor(create(RegexIdName::class)))
            ->method('setGlobal', true),

    /**
     * inert disables the element and all the other elements contained inside.
     */
    'inert' => create(AttributeVoid::class)
        ->constructor('inert', create(BoolTester::class)),

    'inputmode' => create(AttributeSingleValue::class)
        ->constructor('inputmode', create(ListChoiceTester::class)
            ->constructor(get('inputmodechoices'))
        ),

    /**
     * specifies that the image is part of a server-side image map
     */
    'ismap' => create(AttributeVoid::class)
        ->constructor('ismap', create(BoolTester::class)),

    /**
     * TODO: what does this attribute do?
     */
    'itemscope' => create(AttributeVoid::class)
        ->constructor('itemscope', create(BoolTester::class)),

    /**
     * appies to a track element, specifies the kind of track (metadata is a script)
     */
    'kind' => create(AttributeSingleValue::class)
        ->constructor('kind', create(AlwaysTrueTester::class)),

    /**
     * applies to optgroup, option and track, it specifies the title of the element
     */
    'label' => create(AttributeSingleValue::class)
        ->constructor('label', create(AlwaysTrueTester::class)),

    'lang' => create(AttributeSingleValue::class)
        ->constructor('lang', create(CallableTesterLang::class))
        ->method('setGlobal', true),

    /**
     * refers to the id of a datalist element that contains the options for this input element
     */
    'list' => create(AttributeSingleValue::class)
        ->constructor('list', create(AlwaysTrueTester::class)),

    /**
     * specifies that an audio/video element will loop to the beginning once it is finished playing
     */
    'loop' => create(AttributeVoid::class)
        ->constructor('loop', create(BoolTester::class)),

    /**
     * used inside a meter element, specifes a value considered to be low (must be greater than min and less than max)
     */
    'low' => create(AttributeSingleValue::class)
        ->constructor(
            'low',
            create(RegexTester::class)
                ->constructor(create(RegexPositiveIntegerSimple::class))
        ),

    /**
     * usde inside meter, input and progress elements, specifies the maximum possible value
     */
    'max' => create(AttributeSingleValue::class)
        ->constructor(
            'max',
            create(RegexTester::class)
                ->constructor(create(RegexPositiveIntegerSimple::class))
        ),

    /**
     * Specifies the maximum number of characters allowed in an element
     */
    'maxlength' => create(AttributeSingleValue::class)
        ->constructor('maxlength', create(RegexTester::class)
            ->constructor(create(RegexPositiveIntegerSimple::class))),

    /**
     * 'media' attribute value is a media query, a string indicating the media type of the link (which is
     * the successor to mime-type and includes all the old mime-types)
     *
     * don't really want to get into validating the value.  There's a good reference on acceptable values at
     * https://www.dofactory.com/html/attributes/media
     */

    'media' => create(AttributeSingleValue::class)
        ->constructor('media', create(AlwaysTrueTester::class)),

    /**
     * inside a form, the http request type
     */
    'method' => create(AttributeSingleValue::class)
        ->constructor('method', create(ListChoiceTester::class)
            ->constructor(get('methodchoices'))),

    /**
     * TODO: verify attribute type and fix value regex
     */
    'min' => create(AttributeSingleValue::class)
        ->constructor(
            'min',
            create(RegexTester::class)
                ->constructor(create(RegexPositiveIntegerSimple::class))
        ),

    /**
     * inside select and input, denotes that a user can select more than one value
     */
    'multiple' => create(AttributeVoid::class)->constructor('multiple', create(BoolTester::class)),

    /**
     * audio is muted
     */
    'muted' => create(AttributeVoid::class)->constructor('muted', create(BoolTester::class)),

    /**
     * name of an element (similar to id but does not need to be unique in the document)
     */
    'name' => create(AttributeSingleValue::class)
        ->constructor('name', create(RegexTester::class)
            ->constructor(create(RegexIdName::class))),

    'nomodule' => create(AttributeVoid::class)->constructor('nomodule', create(BoolTester::class)),

    /**
     * used inside a form element, do not validate the form
     */
    'novalidate' => create(AttributeVoid::class)->constructor('novalidate', create(BoolTester::class)),

    /**
     * used inside the details element, specifies that the details should be visible
     */
    'open' => create(AttributeVoid::class)->constructor('open', create(BoolTester::class)),

    /**
     * describes the optimal setting inside a meter element
     */
    'optimum' => create(AttributeSingleValue::class)
        ->constructor(
            'optimum',
            create(RegexTester::class)
                ->constructor(create(RegexPositiveIntegerSimple::class))),

    /**
     * used inside an input element, specifies a regular expression against which to validate the input
     */
    'pattern' => create(AttributeSingleValue::class)
        ->constructor(
            'pattern',
            create(CallableTester::class)->constructor([Regex::class, 'validatePattern'])),

    /**
     * specifies a space-separated list of URLs to be notified if a user follows the hyperlink.
     */
    'ping' => create(AttributeMultiValue::class)
        ->constructor('ping', create(FilterVarTester::class)
            ->constructor(create(FilterVarValidateUrl::class))),

    /**
     * specifies a short hint that describes the expected value of an input field or a textarea (appears inside
     * the input or textarea elements).  Value can be any string......
     */
    'placeholder' => create(AttributeSingleValue::class)
        ->constructor('placeholder', create(AlwaysTrueTester::class)),

    /**
     * Used inside a video element.
     * A Boolean attribute indicating that the video is to be played "inline"; that is, within the element's
     * playback area. Note that the absence of this attribute does not imply that the video will always be played in
     * fullscreen.
     */
    'playsinline' => create(AttributeVoid::class)->constructor('playsinline', create(BoolTester::class)),

    /**
     * defines an element as a popover element, meaning that when it is invoked, it will be placed on top of the
     * content, not interfere with the position of other HTML elements.  A popover element will be invisible until it
     * is invoked by another element. The other element must have a popovertarget attribute where the value refers
     * to the popover element's id.
     */
    'popover' => create(AttributeVoid::class)
        ->constructor('popover', create(BoolTester::class))
        ->method('setGlobal', true),

    /**
     * used within button elements and input elements of type = 'button'
     * refers to the popover element with the specified id, allowing you to toggle between showing and hiding it
     */
    'popovertarget' => create(AttributeSingleValue::class)
        ->constructor('popovertarget', create(RegexTester::class)
            ->constructor(create(RegexIdName::class))),

    /**
     * defines the interaction between the popover and the button modifying the popover's visibility.
     * The default behavior is toggle.
     */
    'popovertargetaction' => create(AttributeSingleValue::class)
        ->constructor(
            'popovertargetaction',
            create(ListChoiceTester::class)->constructor(get('popovertargetactionchoices'))
        ),

    /**
     * specifies an image to be shown while the video is downloading, or until the user hits the play button. If
     * this is not included, the first frame of the video will be used instead.
     */
    'poster' => create(AttributeSingleValue::class)
        ->constructor(
            'poster',
            create(FilterVarTester::class)->constructor(create(FilterVarValidateUrl::class))
        ),

    /**
     * used inside a video element
     * specifies if and how the author thinks that the media file should be loaded when the page loads.
     */
    'preload' => create(AttributeSingleValue::class)
        ->constructor(
            'preload',
            create(ListChoiceTester::class)
                ->constructor(get('preloadlistchoices'))
        ),

    /**
     * applies to input and textarea elements
     * makes the element readonly
     */
    'readonly' => create(AttributeVoid::class)->constructor('readonly', create(BoolTester::class)),

    'referrerpolicy' => create(AttributeSingleValue::class)
        ->constructor(
            'referrerpolicy',
            create(ListChoiceTester::class)
                ->constructor(get('validReferrerPolicies'))),

    /**
     * used inside a, area, form and link elements
     * Specifies the relationship of the target object to the link object.
     */
    'rel' => create(AttributeSingleValue::class)
        ->constructor(
            'rel',
            create(ListChoiceTester::class)->constructor(get('relChoices'))
        ),

    /**
     * used inside input, select and textarea elements
     * Specifies that the element must be filled out before submitting the form
     */
    'required' => create(AttributeVoid::class)->constructor('required', create(BoolTester::class)),

    /**
     * used inside the ol (ordered list) element
     * specifies that the list should be presented in descending order
     */
    'reversed' => create(AttributeVoid::class)->constructor('reversed', create(BoolTester::class)),

    /**
     * specifies the visible height of a text area, in lines
     * better to use css, this is simply presented for completeness
     */
    'rows' => create(AttributeSingleValue::class)
        ->constructor(
            'rows',
            create(RegexTester::class)
                ->constructor(create(RegexPositiveIntegerSimple::class))
        ),

    /**
     * Specifies the number of rows a table cell should span
     */
    'rowspan' => create(AttributeSingleValue::class)
        ->constructor(
            'rowspan',
            create(RegexTester::class)
                ->constructor(create(RegexPositiveIntegerSimple::class))
        ),


    /**
     * Enables an extra set of restrictions for the content in an iframe.  The value of the attribute can either be
     * empty to apply all restrictions, or space-separated tokens to lift particular restrictions
     */
    'sandbox' => create(AttributeMultiValue::class)
        ->constructor(
            'sandbox',
            create(ListChoiceTester::class)->constructor(get('sandboxchoices'))
        ),

    /**
     * used within a th element.  Not used by browsers, is used by screen readers
     * Defines the cells that the header element relates to
     */

    'scope' => create(AttributeSingleValue::class)
        ->constructor(
            'scope',
            create(ListChoiceTester::class)->constructor(get('scopechoices'))
        ),

    /**
     * used within an option element, specifies that the element should be preselected
     */
    'selected' => create(AttributeVoid::class)->constructor('selected', create(BoolTester::class)),

    /**
     * shapes that define an area
     */
    'shape' => create(AttributeSingleValue::class)
        ->constructor(
            'shape',
            create(ListChoiceTester::class)->constructor(get('shapechoices'))
        ),

    /**
     * Specifies the width, in characters (for <input>) or specifies the number of visible options (for <select>)
     */
    'size' => create(AttributeSingleValue::class)
        ->constructor(
            'size',
            create(RegexTester::class)
                ->constructor(create(RegexPositiveIntegerSimple::class))
        ),

    /**
     * specifies the sizes of icons for visual media
     */
    'sizes' => create(AttributeSingleValue::class)
        ->constructor(
            'sizes',
            create(RegexTester::class)
                ->constructor(create(RegexSizes::class))
        ),

    /**
     * applies to col and colgroup elements, Specifies the number of columns to span
     */
    'span' => create(AttributeSingleValue::class)
        ->constructor(
            'span',
            create(RegexTester::class)
                ->constructor(create(RegexPositiveIntegerSimple::class))
        ),

    'spellcheck' => create(AttributeSingleValue::class)
        ->constructor(
            'spellcheck',
            create(RegexTester::class)->constructor(create(RegexTrueFalse::class))
        )
        ->method('setGlobal', true),

    /**
     * sets the source of a media file
     */
    'src' => create(AttributeSingleValue::class)
        ->constructor(
            'src',
            create(FilterVarTester::class)->constructor(create(FilterVarValidateUrl::class))
        ),

    /**
     * the value is supposed to be some html which populates the containing iframe and will supercede a
     * src attribute if one is present
     */
    'srcdoc' => create(AttributeSingleValue::class)
        ->constructor('srcdoc', create(AlwaysTrueTester::class)),

    /**
     * specifies the language of a track element
     */
    'srclang' => create(AttributeSingleValue::class)
        ->constructor('srclang', create(CallableTesterLang::class)),

    /**
     * specifies the URL of the image to use in different situations
     */
    'srcset' => create(AttributeSingleValue::class)
        ->constructor(
            'srcset',
            create(FilterVarTester::class)->constructor(create(FilterVarValidateUrl::class))
        ),

    /**
     * Defines the first number in an ordered list if something other than 1
     */
    'start' => create(AttributeSingleValue::class)
        ->constructor(
            'start',
            create(RegexTester::class)
                ->constructor(create(RegexPositiveIntegerSimple::class))
        ),

    /**
     * specifies the interval size for an <input> element
     */
    'step' => create(AttributeSingleValue::class)
        ->constructor(
            'step',
            create(RegexTester::class)
                ->constructor(create(RegexPositiveIntegerSimple::class))
        ),

    /**
     * not going to try and do any css validation
     */
    'style' => create(AttributeSingleValue::class)
        ->constructor('style', create(AlwaysTrueTester::class)),

    /**
     * Specifies the tabbing order of an element
     */
    'tabindex' => create(AttributeSingleValue::class)
        ->constructor(
            'tabindex',
            create(RegexTester::class)
                ->constructor(create(RegexPositiveIntegerSimple::class))
        )
        ->method('setGlobal', true),

    /**
     * Specifies the target for where to open the linked document or where to submit the form
     */
    'target' => create(AttributeSingleValue::class)
        ->constructor(
            'target',
            create(ListChoiceTester::class)->constructor(get('targetChoices'))
        ),

    /**
     * Specifies extra information about an element
     */
    'title' => create(AttributeSingleValue::class)
        ->constructor(
            'title',
            create(ValTesterTitle::class)
        )
        ->method('setGlobal', true),

    /**
     * Specifies whether the content of an element should be translated or not
     */
    'translate' => create(AttributeSingleValue::class)
        ->constructor(
            'translate',
            create(RegexTester::class)->constructor(create(RegexYesNo::class)))
        ->method('setGlobal', true),


    'typebutton' => create(AttributeSingleValue::class)
        ->constructor(
            'type',
            create(ListChoiceTester::class)
                ->constructor(get('buttontypechoices'))
        ),

    'typeinput' => create(AttributeSingleValue::class)
        ->constructor(
            'type',
            create(ListChoiceTester::class)
                ->constructor(get('inputtypechoices'))
        ),

    'typemime' => create(AttributeSingleValue::class)
        ->constructor('type', get(ValTesterMediaTypeSpecifier::class)),


    /**
     * specifies an image or an object as an image map.  The value is a partial url, starting with '#', referred
     * to as a fragid in the w3 specification.  Not sure how to validate it.
     */
    'usemap' => create(AttributeSingleValue::class)
        ->constructor('usemap', create(AlwaysTrueTester::class)),

    /**
     * defines the value of an element, not sure how to validate the value syntactially
     */
    'value' => create(AttributeSingleValue::class)
        ->constructor('value', create(AlwaysTrueTester::class)),

    /**
     * specifies the width of the element
     */
    'width' => create(AttributeSingleValue::class)
        ->constructor(
            'width',
            create(RegexTester::class)
                ->constructor(create(RegexPositiveIntegerSimple::class))
        ),

    /**
     * used inside a textarea element, specifies how to treat the ends of each line of text in the control
     */
    'wrap' => create(AttributeSingleValue::class)
        ->constructor(
            'wrap',
            create(ListChoiceTester::class)
                ->constructor(get('wrapchoices'))
        ),

    'xmlns' => create(AttributeSingleValue::class)
        ->constructor(
            'xmlns',
            create(ListChoiceTester::class)->constructor(get('xmlnschoices'))
        ),
];
