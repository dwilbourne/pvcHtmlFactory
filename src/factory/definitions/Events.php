<?php

/**
 * @author: Doug Wilbourne (dougwilbourne@gmail.com)
 */
declare (strict_types=1);

namespace pvc\html\factory\definitions;

use pvc\html\abstract\attribute\Event;

use function DI\create;


return [
    'onabort' => create(Event::class)->constructor('onabort'),
    'onauxclick' => create(Event::class)->constructor('onauxclick'),
    'onbeforeinput' => create(Event::class)->constructor('onbeforeinput'),
    'onbeforematch' => create(Event::class)->constructor('onbeforematch'),
    'onbeforetoggle' => create(Event::class)->constructor('onbeforetoggle'),
    'onblur' => create(Event::class)->constructor('onblur'),
    'oncancel' => create(Event::class)->constructor('oncancel'),
    'oncanplay' => create(Event::class)->constructor('oncanplay'),
    'oncanplaythrough' => create(Event::class)->constructor('oncanplaythrough'),
    'onchange' => create(Event::class)->constructor('onchange'),
    'onclick' => create(Event::class)->constructor('onclick'),
    'onclose' => create(Event::class)->constructor('onclose'),
    'oncontextlost' => create(Event::class)->constructor('oncontextlost'),
    'oncontextmenu' => create(Event::class)->constructor('oncontextmenu'),
    'oncontextrestored' => create(Event::class)->constructor('oncontextrestored'),
    'oncopy' => create(Event::class)->constructor('oncopy'),
    'oncuechange' => create(Event::class)->constructor('oncuechange'),
    'oncut' => create(Event::class)->constructor('oncut'),
    'ondblclick' => create(Event::class)->constructor('ondblclick'),
    'ondrag' => create(Event::class)->constructor('ondrag'),
    'ondragend' => create(Event::class)->constructor('ondragend'),
    'ondragenter' => create(Event::class)->constructor('ondragenter'),
    'ondragleave' => create(Event::class)->constructor('ondragleave'),
    'ondragover' => create(Event::class)->constructor('ondragover'),
    'ondragstart' => create(Event::class)->constructor('ondragstart'),
    'ondrop' => create(Event::class)->constructor('ondrop'),
    'ondurationchange' => create(Event::class)->constructor('ondurationchange'),
    'onemptied' => create(Event::class)->constructor('onemptied'),
    'onended' => create(Event::class)->constructor('onended'),
    'onerror' => create(Event::class)->constructor('onerror'),
    'onfocus' => create(Event::class)->constructor('onfocus'),
    'onformdata' => create(Event::class)->constructor('onformdata'),
    'oninput' => create(Event::class)->constructor('oninput'),
    'oninvalid' => create(Event::class)->constructor('oninvalid'),
    'onkeydown' => create(Event::class)->constructor('onkeydown'),
    'onkeypress' => create(Event::class)->constructor('onkeypress'),
    'onkeyup' => create(Event::class)->constructor('onkeyup'),
    'onload' => create(Event::class)->constructor('onload'),
    'onloadeddata' => create(Event::class)->constructor('onloadeddata'),
    'onloadedmetadata' => create(Event::class)->constructor('onloadedmetadata'),
    'onloadstart' => create(Event::class)->constructor('onloadstart'),
    'onmousedown' => create(Event::class)->constructor('onmousedown'),
    'onmouseenter' => create(Event::class)->constructor('onmouseenter'),
    'onmouseleave' => create(Event::class)->constructor('onmouseleave'),
    'onmousemove' => create(Event::class)->constructor('onmousemove'),
    'onmouseout' => create(Event::class)->constructor('onmouseout'),
    'onmouseover' => create(Event::class)->constructor('onmouseover'),
    'onmouseup' => create(Event::class)->constructor('onmouseup'),
    'onpaste' => create(Event::class)->constructor('onpaste'),
    'onpause' => create(Event::class)->constructor('onpause'),
    'onplay' => create(Event::class)->constructor('onplay'),
    'onplaying' => create(Event::class)->constructor('onplaying'),
    'onprogress' => create(Event::class)->constructor('onprogress'),
    'onratechange' => create(Event::class)->constructor('onratechange'),
    'onreset' => create(Event::class)->constructor('onreset'),
    'onresize' => create(Event::class)->constructor('onresize'),
    'onscroll' => create(Event::class)->constructor('onscroll'),
    'onscrollend' => create(Event::class)->constructor('onscrollend'),
    'onsecuritypolicyviolation' => create(Event::class)->constructor('onsecuritypolicyviolation'),
    'onseeked' => create(Event::class)->constructor('onseeked'),
    'onseeking' => create(Event::class)->constructor('onseeking'),
    'onselect' => create(Event::class)->constructor('onselect'),
    'onslotchange' => create(Event::class)->constructor('onslotchange'),
    'onstalled' => create(Event::class)->constructor('onstalled'),
    'onsubmit' => create(Event::class)->constructor('onsubmit'),
    'onsuspend' => create(Event::class)->constructor('onsuspend'),
    'ontimeupdate' => create(Event::class)->constructor('ontimeupdate'),
    'ontoggle' => create(Event::class)->constructor('ontoggle'),
    'onvolumechange' => create(Event::class)->constructor('onvolumechange'),
    'onwaiting' => create(Event::class)->constructor('onwaiting'),
    'onwebkitanimationend' => create(Event::class)->constructor('onwebkitanimationend'),
    'onwebkitanimationiteration' => create(Event::class)->constructor('onwebkitanimationiteration'),
    'onwebkitanimationstart' => create(Event::class)->constructor('onwebkitanimationstart'),
    'onwebkittransitionend' => create(Event::class)->constructor('onwebkittransitionend'),
    'onwheel' => create(Event::class)->constructor('onwheel'),
];
