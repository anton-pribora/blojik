<?php

function htmlescape($html, $nl2br = false) {
    return $nl2br ? nl2br(htmlentities($html)) : htmlentities($html);
}

function rel_link(array $params = []) {
    return '?' . http_build_query($params + $_GET);
}