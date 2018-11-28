<?php

namespace Spatie\SchemaOrg\Generator;

class Property
{
    /** @var string */
    public $name;

    /** @var string */
    public $description;

    /** @var string */
    public $resource;

    /** var array */
    public $types = [];

    /** @var array */
    public $ranges = [];

    public function addType($type)
    {
        $this->types[] = $type;
    }

    public function addRanges($ranges)
    {
        foreach ($ranges as $range) {
            $this->addRange($range);
        }

        sort($this->ranges);
    }

    private function addRange($range)
    {
        $this->ranges[] = $range;
        $this->ranges[] = "{$range}[]";

        $this->ranges = array_unique($this->ranges);
    }
}
