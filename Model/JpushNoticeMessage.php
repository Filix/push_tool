<?php

namespace Filix\PushBundle\Model;

/**
 * Description of JpushNoticeMessage
 *
 * @author Filix
 */
class JpushNoticeMessage extends NoticeMessage
{

    protected $builder_id = 0;
    
    protected $sendno;
    
    protected $extras = array();
    
    protected $description;
    
    protected $override_msg_id;

    public function getBuilderId()
    {
        return $this->builder_id;
    }
    
    public function setBuilderId($builder_id)
    {
        $this->builder_id = $builder_id;
        
        return $this;
    }

    public function getSendno()
    {
        return $this->sendno;
    }
    
    public function setSendno($sendno)
    {
        $this->sendno = $sendno;
        
        return $this;
    }

    /*
     * @return array
     */
    public function getExtras()
    {
        return $this->extras;
    }
    
    public function setExtras(array $extras)
    {
        $this->extras = $extras;
        
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        
        return $this;
    }
    
    public function getOverrideMsgId()
    {
        return $this->override_msg_id;
    }

    public function setOverrideMsgId($override_msg_id)
    {
        $this->override_msg_id = $override_msg_id;
        
        return $this;
    }
    
    final public function isRang()
    {
        return null;
    }
    
    final public function setRang($rang)
    {
        return $this;
    }

    final public function isShake()
    {
        return null;
    }
    
    final public function setShake($shake)
    {
        return $this;
    }
    
    final public function isClearable()
    {
        return null;
    }
    
    final public function setClearable($clearable)
    {
        return $this;
    }
    
    final public function getClickAction()
    {
        return null;
    }
    
    final public function setClickAction($action)
    {
        return $this;
    }
    
    final public function getRedirectUrl()
    {
        return null;
    }
    
    final public function setRedirectUrl($url)
    {
        return $this;
    }

}
