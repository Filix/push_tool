<?php

class IGtTarget
{

    var $appId;
    var $clientId;

    public function __construct()
    {
        
    }

    function get_appId()
    {
        return $this->appId;
    }

    function set_appId($appId)
    {
        return $this->appId = $appId;
    }

    function get_clientId()
    {
        return $this->clientId;
    }

    function set_clientId($clientId)
    {
        return $this->clientId = $clientId;
    }

}
