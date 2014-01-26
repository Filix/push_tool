<?php

namespace Filix\PushBundle\Client;

/**
 * BaiduClient
 *
 * @author Filix
 */
class BaiduClient extends Client
{

    protected $user_id;

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }
    
    public function getChannelId()
    {
        return $this->getClientId();
    }

    public function setChannelId($channel_id)
    {
        return $this->setClientId($channel_id);
    }
    
    

}
