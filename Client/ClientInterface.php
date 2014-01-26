<?php
namespace Filix\PushBundle\Client;

/**
 * ClientInterface
 *
 * @author Filix
 */
interface ClientInterface
{
    /*
     * get client id
     * 
     * @return string
     */
    public function getClientId();
    
    /*
     * set client id
     * 
     * @param $client_id string
     * 
     * @return self
     */
    public function setClientId($client_id);
    
}
