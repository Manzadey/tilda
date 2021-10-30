<?php

namespace Manzadey\Tilda;

abstract class Entity
{
    protected Client $client;

    protected int $id;

    public function __construct(Client $client, int $id)
    {
        $this->client = $client;
        $this->id     = $id;
    }
}