<?php

namespace TRAINERPOKEMON\Traits;

trait TransformTextToUrl
{
    public function transformTextToUrl($txt)
    {
        $txt = str_replace(' ', '-', $txt);
        $txt = preg_replace(' ~[^ \\pL0 - 9 _] + ~u ', ' - ', $txt);
        $txt = trim($txt, "-");
        $txt = iconv("utf-8", "us-ascii//TRANSLIT", $txt);
        $txt = strtolower($txt);
        $txt = preg_replace(' ~[^ - a - z0 - 9 _] + ~', '', $txt);
        return $txt;
    }
}
