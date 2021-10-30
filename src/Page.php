<?php

namespace Manzadey\Tilda;

class Page extends Entity
{
    public function info() : Response
    {
        return $this->client->getPageInfo($this->id);
    }

    public function fullInfo() : Response
    {
        return $this->client->getPageFull($this->id);
    }

    public function export() : Response
    {
        return $this->client->getPageExport($this->id);
    }

    public function fullExport() : Response
    {
        return $this->client->getPageFullExport($this->id);
    }
}