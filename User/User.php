<?php
namespace Filix\PushBundle\User;

use Filix\PushBundle\Client\ClientInterface;
use Filix\PushBundle\Common\ArrayCollection\ArrayCollection;

/**
 * User
 *
 * @author Filix
 */
class User implements UserInterface
{

    protected $user_id;
    
    protected $clients;

    public function __construct(array $clients = array())
    {
        $this->clients = new ArrayCollection($clients);
    }
    
    public function getUserId()
    {
        return $this->user_id;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
        
        return $this;
    }

    public function addClient(ClientInterface $client)
    {
        $this->clients->add($client);

        return $this;
    }

    public function getClients()
    {
        return $this->clients;
    }

}
