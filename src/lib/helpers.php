<?php

function dump(...$args) {
    foreach ($args as $arg) {
        print '<pre>';
        var_dump($arg);
        print '</pre>';
    }
}
