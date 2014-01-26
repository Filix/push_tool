<?php
namespace Filix\PushBundle\Model;

/**
 * MessageInterface
 *
 * @author Filix
 */
interface NoticeMessageInterface
{
//    const NOTICE_TYPE = 'NOTICE';
//    const BLACKBOX_TYPE = 'BLOCK_BOX';
    
    const OPEN_ACTION = "OPEN_APP";
    const REDIRECT_ACTION = "REDIRECT";
    
    /*
     * get message type
     * 
     * @return string
     */
//    public function getType();
    
    /*
     * set message type
     * 
     * @param $type string
     * 
     * @return self
     */
//    public function setType($type);
    
    /*
     * get message title
     * 
     * @return string
     */
    public function getTitle();
    
    /*
     * set message title
     * 
     * @param $title string
     * 
     * @return self
     */
    public function setTitle($title);
    
    /*
     * get message content
     * 
     * @return string
     */
    public function getContent();
    
    /*
     * set message conetent
     * 
     * @param $content string
     * 
     * @return self
     */
    public function setContent($content);
    
    /*
     * get if rang when receive the message
     * 
     * @return boolean
     */
    public function isRang();
    
    /*
     * set if rang when receive the message
     * 
     * @param $rang boolean
     * 
     * @return self
     */
    public function setRang($rang);
    
    /*
     * get if shake when receive the message
     * 
     * @return boolean
     */
    public function isShake();
    
    /*
     * set if shake when receive the message
     * 
     * @param $shake boolean
     * 
     * @return self
     */
    public function setShake($shake);
    
    /*
     * get if the message clearable
     * 
     * @return boolean
     */
    public function isClearable();
    
    /*
     * set if the message clearable
     * 
     * @param $clearable boolean
     * 
     * @return self
     */
    public function setClearable($clearable);
    
    /*
     * get the action when click the message
     * 
     * @return string
     */
    public function getClickAction();
    
    
    /*
     * set the action when click the message
     * 
     * @param $action string
     * 
     * @return self
     */
    public function setClickAction($action);
    
    /*
     * get the redirect url when click the message
     * 
     * @return string
     */
    public function getRedirectUrl();
    
    /*
     * set the redirect url when click the url
     * 
     * @param $url string
     * 
     * @return self
     */
    public function setRedirectUrl($url);
    
    /*
     * get offline time
     * 
     * @return int
     */
    public function getOfflineTime();
    
    /*
     * set offline time
     * 
     * @param $second int
     * 
     * @return self
     */
    public function setOfflineTime($second);
}
