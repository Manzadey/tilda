<?php

namespace Manzadey\Tilda;

class Project extends Entity
{
    public function info() : Response
    {
        return $this->client->getProjectInfo($this->id);
    }

    public function pages() : Response
    {
        return $this->client->getPageList($this->id);
    }

    public function export() : Response
    {
        return $this->client->getProjectExport($this->id);
    }
}