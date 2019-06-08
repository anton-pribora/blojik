<?php

function htmlescape($html, $nl2br = false) {
    return $nl2br ? nl2br(htmlentities($html)) : htmlentities($html);
}