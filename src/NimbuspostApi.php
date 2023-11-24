<?php

namespace Nimbuspackage\Nimbuspost;

use Nimbuspackage\Nimbuspost\Traits\Authenticate;
use Nimbuspackage\Nimbuspost\ServerCall\V2\NimbuspostClient;
use Nimbuspackage\Nimbuspost\Exceptions\NimbusException;
use Nimbuspackage\Nimbuspost\Module\V2\CourierModule;

class NimbuspostApi
{
    public $client;
    use Authenticate;

    public function __construct()
    { 
        $client=new NimbuspostClient;
        $this->client = $client;
    }

    /**
     * set the response type
     *
     * @param string $type ['object','array']
     * @return null
     */
    public function setResponseType(string $type)
    { 
        if(in_array($type,['object','array']))
            $this->client->responseType($type);
        else
            throw new NimbusException('invalid response type');
    }

    /**
     * verify credential
     *
     * @param array credential
     * @return 'object','array'
     */
    public function login(array $credentials){
        return $this->auth($this->client, $credentials);
    }

    /**
     * verify credential
     *
     * @param array credential
     * @return 'object','array'
     */
    public function courier(string $token){
        return new CourierModule($this->client,$token);
    }

}
