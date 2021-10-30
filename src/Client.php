<?php

namespace Manzadey\Tilda;

use GuzzleHttp\Exception\GuzzleException;
use JsonException;

class Client
{
    private string $publicKey;

    private string $secretKey;

    private string $url = 'http://api.tildacdn.info';

    private string $apiVersion = 'v1';

    private \GuzzleHttp\Client $client;

    private array $entityContainer = [];

    public function __construct(string $publicKey, string $secretKey)
    {
        $this->publicKey = $publicKey;
        $this->secretKey = $secretKey;

        $this->clientInit();
    }

    public function getProjectsList() : Response
    {
        return $this->call('getprojectslist');
    }

    public function getProjectInfo(int $id) : Response
    {
        return $this->callProject($id, 'getproject');
    }

    public function getProjectExport(int $id) : Response
    {
        return $this->callProject($id, 'getprojectexport');
    }

    public function getProject(int $id) : Project
    {
        return $this->entityContainer[$id] ?? $this->entityContainer[$id] = new Project($this, $id);
    }

    public function getPageList(int $id) : Response
    {
        return $this->callProject($id, 'getpageslist');
    }

    public function getPage(int $id) : Page
    {
        return $this->entityContainer[$id] ?? $this->entityContainer[$id] = new Page($this, $id);
    }

    public function getPageInfo(int $id) : Response
    {
        return $this->callPage($id, 'getpage');
    }

    public function getPageFull(int $id) : Response
    {
        return $this->callPage($id, 'getpagefull');
    }

    public function getPageExport(int $id) : Response
    {
        return $this->callPage($id, 'getpageexport');
    }

    public function getPageFullExport(int $id) : Response
    {
        return $this->callPage($id, 'getpagefullexport');
    }

    private function callProject(int $id, string $method) : Response
    {
        return $this->call($method, [
            'projectid' => $id,
        ]);
    }

    public function callPage(int $id, string $method) : Response
    {
        return $this->call($method, [
            'pageid' => $id,
        ]);
    }

    private function call(string $method, array $attributes = []) : Response
    {
        try {
            $response = $this->client->get($method, [
                'query' => array_merge($attributes, [
                    'publickey' => $this->publicKey,
                    'secretkey' => $this->secretKey,
                ]),
            ])->getBody()->getContents();

            $array = json_decode($response, true, 512, JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE);

            return new Response($array);
        } catch (GuzzleException | JsonException $e) {
            return new Response([
                'status'        => Response::ERROR_STATUS,
                'error_message' => $e->getMessage(),
            ]);
        }
    }

    private function clientInit() : void
    {
        $this->client = new \GuzzleHttp\Client([
            'base_uri' => "$this->url/$this->apiVersion/",
            'timeout'  => '2.0',
            'query'    => [
                'publickey' => $this->publicKey,
                'secretkey' => $this->secretKey,
            ],
        ]);
    }

    private function getMethodUrl(string $method) : string
    {
        return "$this->url/$this->apiVersion/$method";
    }

    /**
     * @return string
     */
    public function getUrl() : string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url) : void
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getApiVersion() : string
    {
        return $this->apiVersion;
    }

    /**
     * @param string $apiVersion
     */
    public function setApiVersion(string $apiVersion) : void
    {
        $this->apiVersion = $apiVersion;
    }
}