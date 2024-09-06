<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare (strict_types=1);

namespace pvc\html\factory\definitions;

use pvc\html\abstract\attribute\Event;

use pvc\validator\val_tester\always_true\AlwaysTrueTester;

use function DI\create;
use function DI\get;


return [
    'event_tester' => create(AlwaysTrueTester::class),

    'onabort' => create(Event::class)->constructor('onabort', get('event_tester')),
    'onauxclick' => create(Event::class)->constructor('onauxclick', get('event_tester')),
    'onbeforeinput' => create(Event::class)->constructor('onbeforeinput', get('event_tester')),
    'onbeforematch' => create(Event::class)->constructor('onbeforematch', get('event_tester')),
    'onbeforetoggle' => create(Event::class)->constructor('onbeforetoggle', get('event_tester')),
    'onblur' => create(Event::class)->constructor('onblur', get('event_tester')),
    'oncancel' => create(Event::class)->constructor('oncancel', get('event_tester')),
    'oncanplay' => create(Event::class)->constructor('oncanplay', get('event_tester')),
    'oncanplaythrough' => create(Event::class)->constructor('oncanplaythrough', get('event_tester')),
    'onchange' => create(Event::class)->constructor('onchange', get('event_tester')),
    'onclick' => create(Event::class)->constructor('onclick', get('event_tester')),
    'onclose' => create(Event::class)->constructor('onclose', get('event_tester')),
    'oncontextlost' => create(Event::class)->constructor('oncontextlost', get('event_tester')),
    'oncontextmenu' => create(Event::class)->constructor('oncontextmenu', get('event_tester')),
    'oncontextrestored' => create(Event::class)->constructor('oncontextrestored', get('event_tester')),
    'oncopy' => create(Event::class)->constructor('oncopy', get('event_tester')),
    'oncuechange' => create(Event::class)->constructor('oncuechange', get('event_tester')),
    'oncut' => create(Event::class)->constructor('oncut', get('event_tester')),
    'ondblclick' => create(Event::class)->constructor('ondblclick', get('event_tester')),
    'ondrag' => create(Event::class)->constructor('ondrag', get('event_tester')),
    'ondragend' => create(Event::class)->constructor('ondragend', get('event_tester')),
    'ondragenter' => create(Event::class)->constructor('ondragenter', get('event_tester')),
    'ondragleave' => create(Event::class)->constructor('ondragleave', get('event_tester')),
    'ondragover' => create(Event::class)->constructor('ondragover', get('event_tester')),
    'ondragstart' => create(Event::class)->constructor('ondragstart', get('event_tester')),
    'ondrop' => create(Event::class)->constructor('ondrop', get('event_tester')),
    'ondurationchange' => create(Event::class)->constructor('ondurationchange', get('event_tester')),
    'onemptied' => create(Event::class)->constructor('onemptied', get('event_tester')),
    'onended' => create(Event::class)->constructor('onended', get('event_tester')),
    'onerror' => create(Event::class)->constructor('onerror', get('event_tester')),
    'onfocus' => create(Event::class)->constructor('onfocus', get('event_tester')),
    'onformdata' => create(Event::class)->constructor('onformdata', get('event_tester')),
    'oninput' => create(Event::class)->constructor('oninput', get('event_tester')),
    'oninvalid' => create(Event::class)->constructor('oninvalid', get('event_tester')),
    'onkeydown' => create(Event::class)->constructor('onkeydown', get('event_tester')),
    'onkeypress' => create(Event::class)->constructor('onkeypress', get('event_tester')),
    'onkeyup' => create(Event::class)->constructor('onkeyup', get('event_tester')),
    'onload' => create(Event::class)->constructor('onload', get('event_tester')),
    'onloadeddata' => create(Event::class)->constructor('onloadeddata', get('event_tester')),
    'onloadedmetadata' => create(Event::class)->constructor('onloadedmetadata', get('event_tester')),
    'onloadstart' => create(Event::class)->constructor('onloadstart', get('event_tester')),
    'onmousedown' => create(Event::class)->constructor('onmousedown', get('event_tester')),
    'onmouseenter' => create(Event::class)->constructor('onmouseenter', get('event_tester')),
    'onmouseleave' => create(Event::class)->constructor('onmouseleave', get('event_tester')),
    'onmousemove' => create(Event::class)->constructor('onmousemove', get('event_tester')),
    'onmouseout' => create(Event::class)->constructor('onmouseout', get('event_tester')),
    'onmouseover' => create(Event::class)->constructor('onmouseover', get('event_tester')),
    'onmouseup' => create(Event::class)->constructor('onmouseup', get('event_tester')),
    'onpaste' => create(Event::class)->constructor('onpaste', get('event_tester')),
    'onpause' => create(Event::class)->constructor('onpause', get('event_tester')),
    'onplay' => create(Event::class)->constructor('onplay', get('event_tester')),
    'onplaying' => create(Event::class)->constructor('onplaying', get('event_tester')),
    'onprogress' => create(Event::class)->constructor('onprogress', get('event_tester')),
    'onratechange' => create(Event::class)->constructor('onratechange', get('event_tester')),
    'onreset' => create(Event::class)->constructor('onreset', get('event_tester')),
    'onresize' => create(Event::class)->constructor('onresize', get('event_tester')),
    'onscroll' => create(Event::class)->constructor('onscroll', get('event_tester')),
    'onscrollend' => create(Event::class)->constructor('onscrollend', get('event_tester')),
    'onsecuritypolicyviolation' => create(Event::class)->constructor('onsecuritypolicyviolation', get('event_tester')),
    'onseeked' => create(Event::class)->constructor('onseeked', get('event_tester')),
    'onseeking' => create(Event::class)->constructor('onseeking', get('event_tester')),
    'onselect' => create(Event::class)->constructor('onselect', get('event_tester')),
    'onslotchange' => create(Event::class)->constructor('onslotchange', get('event_tester')),
    'onstalled' => create(Event::class)->constructor('onstalled', get('event_tester')),
    'onsubmit' => create(Event::class)->constructor('onsubmit', get('event_tester')),
    'onsuspend' => create(Event::class)->constructor('onsuspend', get('event_tester')),
    'ontimeupdate' => create(Event::class)->constructor('ontimeupdate', get('event_tester')),
    'ontoggle' => create(Event::class)->constructor('ontoggle', get('event_tester')),
    'onvolumechange' => create(Event::class)->constructor('onvolumechange', get('event_tester')),
    'onwaiting' => create(Event::class)->constructor('onwaiting', get('event_tester')),
    'onwebkitanimationend' => create(Event::class)->constructor('onwebkitanimationend', get('event_tester')),
    'onwebkitanimationiteration' => create(Event::class)->constructor('onwebkitanimationiteration', get('event_tester')),
    'onwebkitanimationstart' => create(Event::class)->constructor('onwebkitanimationstart', get('event_tester')),
    'onwebkittransitionend' => create(Event::class)->constructor('onwebkittransitionend', get('event_tester')),
    'onwheel' => create(Event::class)->constructor('onwheel', get('event_tester')),
];
