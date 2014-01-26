<?php
namespace Filix\PushBundle\Model;

/**
 * BlockBoxMessageInterface
 *
 * @author Filix
 */
interface BlockBoxMessageInterface
{
    /*
     * get message
     * 
     * @return string
     */
    public function getMessage();
    
    /*
     * set message
     * 
     * @param $message string
     * 
     * @return self
     */
    public function setMessage($message);
}
