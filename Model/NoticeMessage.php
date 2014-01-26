<?php
namespace Filix\PushBundle\Model;

/**
 * NoticeMessage
 *
 * @author Filix
 */
class NoticeMessage implements NoticeMessageInterface
{
//    protected $type;
    
    protected $title;
    
    protected $content;
    
    protected $is_rang = true;
    
    protected $is_shake = false;
    
    protected $is_clearable = true;
    
    protected $click_action;
    
    protected $redirect_url;
    
    protected $offline_time = 0;
    
//    public function getType()
//    {
//        return $this->type;
//    } 
//    
//    public function setType($type)
//    {
//        $this->type = $type;
//        
//        return $this;
//    }
    
    public function getTitle()
    {
        return $this->title;
    }
    
    public function setTitle($title)
    {
        $this->title = $title;
        
        return $this;
    }
    
    public function getContent()
    {
        return $this->content;
    }
    
    public function setContent($content)
    {
        $this->content = $content;
        
        return $this;
    }
    
    public function isRang()
    {
        return $this->is_rang;
    }
    
    public function setRang($rang)
    {
        $this->is_rang = $rang;
        
        return $this;
    }

    public function isShake()
    {
        return $this->is_shake;
    }
    
    public function setShake($shake)
    {
        $this->is_shake = $shake;
        
        return $this;
    }
    
    public function isClearable()
    {
        return $this->is_clearable;
    }
    
    public function setClearable($clearable)
    {
        $this->is_clearable = $clearable;
        
        return $this;
    }
    
    public function getClickAction()
    {
        return $this->click_action;
    }
    
    public function setClickAction($action)
    {
        if(in_array($action, array(self::OPEN_ACTION, self::REDIRECT_ACTION))){
            $this->click_action = $action;
        }
        
        return $this;
    }
    
    public function getRedirectUrl()
    {
        return $this->redirect_url;
    }
    
    public function setRedirectUrl($url)
    {
        $this->redirect_url = $url;
        
        return $this;
    }
    
    public function getOfflineTime()
    {
        return $this->offline_time;
    }
    
    public function setOfflineTime($second)
    {
        $this->offline_time = $second;
        
        return $this;
    }

}
