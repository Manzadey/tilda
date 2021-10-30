<?php

namespace Manzadey\Tilda;

class Response
{
    public const ERROR_STATUS = 'ERROR';

    public const SUCCESS_STATUS = 'FOUND';

    private array $data;

    public function __construct(array $data = [])
    {
        $this->data = $data;
    }

    public function getStatus() : bool
    {
        return !($this->data['status'] === self::ERROR_STATUS);
    }

    public function getResult() : ?array
    {
        return $this->data['result'] ?? null;
    }

    public function getData() : array
    {
        return $this->data;
    }

    public function getErrorMessage() : ?string
    {
        return $this->data['error_message'] ?? null;
    }
}