<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare (strict_types=1);

use pvc\html\factory\factory\HtmlFactory;
use pvc\html\factory\val_tester\ValTesterMediaTypeSpecifier;
use pvc\http\mime\MimeTypeFactory;
use pvc\http\mime\MimeTypes;
use pvc\http\mime\MimeTypesSrc;

use pvc\interfaces\html\factory\HtmlFactoryInterface;

use function DI\create;
use function DI\get;

return [
    MimeTypesSrc::class => create()->constructor(create(MimeTypeFactory::class)),
    MimeTypes::class => create()->constructor(get(MimeTypesSrc::class)),
    /**
     * used inside the input tag, specifies the types of files (media types) that the server accepts
     */
    ValTesterMediaTypeSpecifier::class => create()->constructor(get(MimeTypes::class)),

    /**
     * used within an iframe element, allows certain kinds of behaviors (events) to occur within the iframe)
     * TODO: lots of allow values to track down......
     */
    // 'allow' => create(AttributeSingleValue::class)->constructor('allow'),

    'autocompletelistchoices' => ['on', 'off'],

    'crossOriginChoices' => ['anonymous', 'usecredentials'],

    /**
     * first choice is character-oriented, url strings are url-encoded, second choice is binary
     */
    'enctypechoices' => ['application/x-www-form-urlencoded', 'multipart/form-data'],

    /**
     * kinds of virtual keyboards
     */
    'inputmodechoices' => ['none', 'text', 'decimal', 'numeric', 'tel', 'search', 'email', 'url'],

    'kindchoices' => ['subtitles', 'captions', 'chapters', 'metadata'],

    'methodchoices' => ['get', 'post', 'put', 'patch', 'delete'],

    'popovertargetactionchoices' => ['show', 'hide', 'toggle'],

    'preloadlistchoices' => ['auto', 'metadata', 'none'],

    'validReferrerPolicies' => [
        'no-referrer',
        'no-referrer-when-downgrade',
        'origin',
        'origin-when-cross-origin',
        'same-origin',
        'strict-origin',
        'strict-origin-when-cross-origin',
        'unsafe-url'
    ],

    'relChoices' => [
        'nofollow',
        'noopener',
        'noreferrer',
        'stylesheet',
        'icon',
        'canonical',
        'dns-prefetch',
        'external',
        'author',
        'help',
        'license',
        'prev',
        'next',
        'bookmark',
        'search',
        'alternate',
        'tag',
    ],

    'sandboxchoices' => [
        'allow-downloads',
        'allow-forms',
        'allow-modals',
        'allow-orientation-lock',
        'allow-pointer-lock',
        'allow-popups',
        'allow-popups-to-escape-sandbox',
        'allow-presentation',
        'allow-same-origin',
        'allow-scripts',
        'allow-storage-access-by-user-activation',
        'allow-top-navigation',
        'allow-top-navigation-by-user-activation',
        'allow-top-navigation-to-custom-protocols'
    ],

    'shapechoices' => ['rect', 'circle', 'poly'],

    'targetChoices' => ['_blank', '_parent', '_self', '_top'],

    'buttontypechoices' => ['submit', 'reset', 'button'],

    'inputtypechoices' => [
        'button',
        'checkbox',
        'color',
        'date',
        'datetime-local',
        'email',
        'file',
        'hidden',
        'image',
        'month',
        'number',
        'password',
        'radio',
        'range',
        'reset',
        'search',
        'submit',
        'tel',
        'text',
        'time',
        'url',
        'week'
    ],

    'scopechoices' => ['col', 'row', 'colgroup', 'rowgroup'],

    'wrapchoices' => ['hard', 'soft', 'off'],

    'xmlnschoices' => ['http://www.w3.org/1999/xhtml'],
];