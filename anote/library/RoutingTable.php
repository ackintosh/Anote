<?php
namespace anote\library;

class RoutingTable
{
    private $core;

    public function __construct(AnoteCore $core)
    {
        $this->core = $core;
    }
}
