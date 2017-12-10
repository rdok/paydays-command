<?php

use Stichoza\GoogleTranslate\TranslateClient;

function translate($target, $string)
{
    if (empty($target)) {
        return $string;
    }
    return TranslateClient::translate('en', $target, $string);
}
