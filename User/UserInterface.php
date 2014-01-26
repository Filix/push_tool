<?php
namespace Filix\PushBundle\User;

use Filix\PushBundle\Client\ClientInterface;

/**
 * UserInterface
 *
 * @author Filix
 */
interface UserInterface
{
    public function getUserId();
    
    public function setUserId($user_id);
    
    /*
     * add client
     * 
     * @param $client client
     * 
     * @return self
     */
    public function addClient(ClientInterface $client);
    
    /*
     * get clients
     * 
     * @return ArrayCollection
     */
    public function getClients();
    
}
