<?php


namespace Nimbuspackage\Nimbuspost\Traits;

use Nimbuspackage\Nimbuspost\ServerCall\Client;
use Nimbuspackage\Nimbuspost\Exceptions\NimbusException;

trait Authenticate
{
    public function auth(Client $client, $credentials = null)
    {

        if (! is_array($credentials) || empty($credentials['email']) || empty($credentials['password'])) {
            throw new NimbusException('Invalid Credentials');
        }

        $endpoint = 'users/login';

        $authDetails = $client->setEndpoint($endpoint)
            ->setHeaders('login')
            ->post($credentials);

        return $authDetails;
    }
}
?>
