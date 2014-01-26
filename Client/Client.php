<?php
namespace Filix\PushBundle\Client;

/**
 * Description of Client
 *
 * @author Filix
 */
class Client implements ClientInterface
{
    protected $client_id;

    public function getClientId()
    {
        return $this->client_id;
    }

    public function setClientId($client_id)
    {
        $this->client_id = $client_id;
        
        return $this;
    }

}
