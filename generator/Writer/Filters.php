<?php

namespace Spatie\SchemaOrg\Generator\Writer;

class Filters
{
    public static function doc($text, array $options = [])
    {
        $indentation = isset($options[0]) ? $options[0] : 0;
        $docblockPrefix = str_repeat(' ', $indentation * 4).' * ';

        $lineLength = 80 - 3 - ($indentation * 4);

        $text = str_replace('<br />', '', $text);

        $text = preg_replace('/(\n|\\\n)/', "\n".$docblockPrefix, $text);

        return wordwrap($text, $lineLength, "\n".$docblockPrefix);
    }

    public static function lcfirst($text)
    {
        return lcfirst($text);
    }
}
