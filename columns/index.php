<?php

use \Tsugi\Util\U;

require_once "../tsugi/config.php";
require_once "../cookie.php";

header("Cache-Control: no-transform, max-age=2592000");

$document = U::get_request_document();

if ( ! file_exists($document) ) {
    header("Location: ".$CFG->apphome);
    return;
}

if ( ! check_cookie($CFG->servicedesc, $document) ) return;

$type = mime_content_type($document);
$contents = file_get_contents($document);
if ( $type === false || $contents == false ) {
    header("Location: ".$CFG->apphome);
    return;
}

$length = strlen($contents);
header("Content-Type: ".$type);
header("Content-Length: ".$length);
echo($contents);

