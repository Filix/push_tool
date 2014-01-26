<?php

namespace Filix\PushBundle\Util;

use Filix\JpushBundle\Util\JPush;
use Filix\PushBundle\Model\NoticeMessageInterface;
use Filix\PushBundle\Client\ClientInterface;
use Filix\PushBundle\User\UserInterface;
use Filix\PushBundle\Exception\InstanceErrorException;
use Filix\PushBundle\User\UsersInterface;
use Filix\PushBundle\Platform\PlatformsInterface;
use Filix\PushBundle\Platform\AndroidPlatform;
use Filix\PushBundle\Platform\IosPlatform;
use Filix\PushBundle\Adapter\JpushNoticeMessageAdapter;
use Filix\JpushBundle\Util\Message;
use Filix\PushBundle\Model\JpushNoticeMessage;
use Filix\PushBundle\Client\JpushClient;
use Filix\PushBundle\Tag\TagInterface;

/**
 * JpushPusher
 *
 * @author Filix
 */
class JpushPusher implements PusherInterface
{

    const TYPE = 'JPUSH';
    
    protected $sdk;
    
    protected $adapter;
    
    public function __construct($masterSecret = null, $appkeys = null)
    {
        $this->sdk = new JPush($masterSecret, $appkeys);
        $this->adapter = new JpushNoticeMessageAdapter();
    }

    public function addTag()
    {
        
    }

    public function init(array $params)
    {
        $this->sdk->init($params);
        
        return $this;
    }

    public function getType()
    {
        return self::TYPE;
    }

    public function pushNoticeToApp(NoticeMessageInterface $message, PlatformsInterface $platforms)
    {
        if(!$message instanceof JpushNoticeMessage){
            throw new InstanceErrorException('Compile Error: '
                    . '$message must be instance of Filix\PushBundle\Model\JpushNoticeMessage in ' . __CLASS__ . '::' . __FUNCTION__ . ', at line ' . __LINE__);
        }
        $m = $this->adapter->adapt($message);
        $ps = array();
        foreach($platforms->getPlatforms() as $platform){
            if($platform->getName() == AndroidPlatform::NAME){
                $ps[] = Message::ANDROID_PLATFORM;
            }else if($platform->getName() == IosPlatform::NAME){
                $ps[] = Message::IOS_PLATFORM;
            }
        }
        $m->setPlatform($ps);
        $m->setReceiverType(Message::RECEIVER_TYPE_ALL);
        $this->sdk->send($m);
    }

    public function pushNoticeToClient(NoticeMessageInterface $message, ClientInterface $client)
    {
        if(!$message instanceof JpushNoticeMessage){
            throw new InstanceErrorException('Compile Error: '
                    . '$message must be instance of Filix\PushBundle\Model\JpushNoticeMessage in ' . __CLASS__ . '::' . __FUNCTION__ . ', at line ' . __LINE__);
        }
        if(!$client instanceof JpushClient){
            throw new InstanceErrorException('Compile Error: '
                    . '$client must be instance of Filix\PushBundle\Client\JpushClient in ' . __CLASS__ . '::' . __FUNCTION__ . ', at line ' . __LINE__);
        }
        $m = $this->adapter->adapt($message);
        $m->setReceiverType(Message::RECEIVER_TYPE_ALIAS);
        $m->setReceiverValue(array($client->getClientId()));
        $this->sdk->send($m);
    }
    
    public function pushNoticeToTag(NoticeMessageInterface $message, TagInterface $tag)
    {
        if(!$message instanceof JpushNoticeMessage){
            throw new InstanceErrorException('Compile Error: '
                    . '$message must be instance of Filix\PushBundle\Model\JpushNoticeMessage in ' . __CLASS__ . '::' . __FUNCTION__ . ', at line ' . __LINE__);
        }
        $m = $this->adapter->adapt($message);
        $m->setReceiverType(Message::RECEIVER_TYPE_TAG);
        $m->setReceiverValue(array($tag->getName()));
        $this->sdk->send($m);
    }

    public function pushNoticeToUser(NoticeMessageInterface $message, UserInterface $user)
    {
        if(!$message instanceof JpushNoticeMessage){
            throw new InstanceErrorException('Compile Error: '
                    . '$message must be instance of Filix\PushBundle\Model\JpushNoticeMessage in ' . __CLASS__ . '::' . __FUNCTION__ . ', at line ' . __LINE__);
        }
        $m = $this->adapter->adapt($message);
        $m->setReceiverType(Message::RECEIVER_TYPE_ALIAS);
        $m->setReceiverValue(array($user->getUserId()));
        $this->sdk->send($m);
    }

    public function pushNoticeToUsers(NoticeMessageInterface $message, UsersInterface $users)
    {
        if(!$message instanceof JpushNoticeMessage){
            throw new InstanceErrorException('Compile Error: '
                    . '$message must be instance of Filix\PushBundle\Model\JpushNoticeMessage in ' . __CLASS__ . '::' . __FUNCTION__ . ', at line ' . __LINE__);
        }
        $m = $this->adapter->adapt($message);
        $m->setReceiverType(Message::RECEIVER_TYPE_ALIAS);
        $us = $users->getUsers();
        $t = array();
        foreach($us as $user){
            $t[] = $user->getUserId();
        }
        $m->setReceiverValue(array_unique($t));
        $this->sdk->send($m);
    }

    public function pushMessageToApp()
    {
        
    }

    public function pushMessageToClient()
    {
        
    }

    public function pushMessageToUser()
    {
        
    }

    public function pushMessageToUsers()
    {
        
    }

    public function pushMessageToTag()
    {
        
    }

}
