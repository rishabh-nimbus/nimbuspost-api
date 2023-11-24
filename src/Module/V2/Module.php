<?php

namespace Nimbuspackage\Nimbuspost\Module\V2;

use Nimbuspackage\Nimbuspost\ServerCall\Client;

/**
* @author  Kishan taretiya
*/
class Module{
    
    protected $client;
    protected $token;

    function __construct(Client $client, $token = null){
        $this->client=$client;
        $this->token=$token;
    }

    /**
    * 
    * server call request in get method
    * @param string url endpoint
    * @return object/array
    */

    function getRequest($endpoint){

        return $this->client->setEndpoint($endpoint)
            ->setHeaders($this->token)
            ->get();

    }
    /**
    * 
    * server call request in post method
    * @param string url endpoint,payload 
    * @return object/array
    */
    function postRequest($endpoint,$post){

        return $this->client->setEndpoint($endpoint)
            ->setHeaders($this->token)
            ->post($post);

    }
}
?>