<?php

namespace Spatie\SchemaOrg\Generator\Parser\Tasks;

use Symfony\Component\DomCrawler\Crawler;

abstract class Task
{
    /** @string */
    protected $definition;

    public function __construct($definition)
    {
        $this->definition = $definition;
    }

    public static function fromCrawler($crawler)
    {
        $node = $crawler->getNode(0);
        $html = $node->ownerDocument->saveHTML($node);

        return new static($html);
    }

    protected function getText($node, $selector = null)
    {
        if ($selector) {
            $node = $node->filter($selector)->first();
        }

        if ($node->count() === 0) {
            return '';
        }

        return trim($node->text());
    }

    protected function getAttribute($node, $attribute)
    {
        if ($node->count() === 0) {
            return '';
        }

        $attr = $node->filter("[{$attribute}]")->attr($attribute);
        return isset($attr) ? $attr : '';
    }
}
