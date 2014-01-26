<?php

namespace Filix\PushBundle\Util;

use Filix\PushBundle\Util\PusherInterface;
use Filix\PushBundle\Util\Baidu\Baidu;
use Filix\PushBundle\Model\BaiduNoticeMessage;
use Filix\PushBundle\Model\NoticeMessageInterface;
use Filix\PushBundle\Client\BaiduClient;
use Filix\PushBundle\Client\ClientInterface;
use Filix\PushBundle\User\UserInterface;
use Filix\PushBundle\Exception\InstanceErrorException;
use Filix\PushBundle\User\UsersInterface;
use Filix\PushBundle\Platform\PlatformsInterface;
use Filix\PushBundle\Platform\AndroidPlatform;
use Filix\PushBundle\Platform\IosPlatform;
use Filix\PushBundle\Tag\TagInterface;
use Filix\PushBundle\Adapter\BaiduNoticeMessageAdapter;
/**
 * Baidu Push Service
 *
 * @author Filix
 */
class BaiduPusher implements PusherInterface
{
    const TYPE = 'BAIDU';
    
    const NOTICE_TYPE = 1;
    const MESSAGE_TYPE = 0;
    
    const TO_USER = 1;
    const TO_TAG = 2;
    const TO_ALL = 3;
    
    const ANDROID_TYPE = 3;
    const IOS_TYPE = 4;

    protected $sdk;
    
    protected $adapter;

    public function __construct($api_key = null, $secret_key = null)
    {
        $this->sdk = new Baidu($api_key, $secret_key);
        $this->adapter = new BaiduNoticeMessageAdapter();
    }
    
    public function getSdk(){
        return $this->sdk;
    }
    
    public function init(array $params)
    {
        $this->sdk->init($params);
        
        return $this;
    }

    public function addTag()
    {
        
    }

    public function getType()
    {
        return self::TYPE;
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

    public function pushNoticeToApp(NoticeMessageInterface $message, PlatformsInterface $platforms)
    {
        if(!$message instanceof BaiduNoticeMessage){
            throw new InstanceErrorException('Compile Error: '
                    . '$message must be instance of Filix\PushBundle\Model\BaiduNoticeMessage in ' . __CLASS__ . '::' . __FUNCTION__ . ', at line ' . __LINE__);
        }
        $push_type = self::TO_ALL; //所有人
        $optional[Baidu::MESSAGE_TYPE] = self::NOTICE_TYPE; //指定消息类型为通知
        $optional[Baidu::MESSAGE_EXPIRES] = $message->getOfflineTime(); //秒
        $m = $this->adapter->adapt($message);
        $message_key = "bd_mk:" . $message->getId();
        foreach($platforms->getPlatforms() as $platform){
            if($platform->getName() == AndroidPlatform::NAME){
                $optional[Baidu::DEVICE_TYPE] = self::ANDROID_TYPE;
                $r = $this->sdk->pushMessage($push_type, $m, $message_key, $optional);
            }else if($platform->getName() == IosPlatform::NAME){
                $optional[Baidu::DEVICE_TYPE] = self::IOS_TYPE;
                $r = $this->sdk->pushMessage($push_type, $m, $message_key, $optional);
            }
        }
    }
    
    public function pushNoticeToTag(NoticeMessageInterface $message, TagInterface $tag)
    {
        if(!$message instanceof BaiduNoticeMessage){
            throw new InstanceErrorException('Compile Error: '
                    . '$message must be instance of Filix\PushBundle\Model\BaiduNoticeMessage in ' . __CLASS__ . '::' . __FUNCTION__ . ', at line ' . __LINE__);
        }
        $push_type = self::TO_TAG; //单个人
        $optional[Baidu::MESSAGE_TYPE] = self::NOTICE_TYPE; //指定消息类型为通知
        $optional[Baidu::MESSAGE_EXPIRES] = $message->getOfflineTime(); //秒
        $optional['tag'] = $tag->getName();
        $m = $this->adapter->adapt($message);
//        var_dump($m);exit;
        $message_key = "bd_mk:" . $message->getId();
        $this->sdk->pushMessage($push_type, $m, $message_key, $optional);
    }

    public function pushNoticeToClient(NoticeMessageInterface $message, ClientInterface $client)
    {
        if(!$message instanceof BaiduNoticeMessage){
            throw new InstanceErrorException('Compile Error: '
                    . '$message must be instance of Filix\PushBundle\Model\BaiduNoticeMessage in ' . __CLASS__ . '::' . __FUNCTION__ . ', at line ' . __LINE__);
        }
        if(!$client instanceof BaiduClient){
            throw new InstanceErrorException('Compile Error: '
                    . '$client must be instance of Filix\PushBundle\Client\BaiduClient in ' . __CLASS__ . '::' . __FUNCTION__ . ', at line ' . __LINE__);
        }
        $push_type = self::TO_USER; //单个人
        $optional[Baidu::MESSAGE_TYPE] = self::NOTICE_TYPE; //指定消息类型为通知
        $optional[Baidu::MESSAGE_EXPIRES] = $message->getOfflineTime(); //秒
        $m = $this->adapter->adapt($message);
        $message_key = "bd_mk:" . $message->getId();
        $this->sdk->pushMessage($push_type, $m, $message_key, $optional);
    }

    public function pushNoticeToUser(NoticeMessageInterface $message, UserInterface $user)
    {
        if(!$message instanceof BaiduNoticeMessage){
            throw new InstanceErrorException('Compile Error: '
                    . '$message must be instance of Filix\PushBundle\Model\BaiduNoticeMessage in ' . __CLASS__ . '::' . __FUNCTION__ . ', at line ' . __LINE__);
        }
        $clients = $user->getClients();
        foreach ($clients as $client) {
            $this->pushNoticeToClient($message, $client);
        }
    }

    public function pushNoticeToUsers(NoticeMessageInterface $message, UsersInterface $users)
    {
        if(!$message instanceof BaiduNoticeMessage){
            throw new InstanceErrorException('Compile Error: '
                    . '$message must be instance of Filix\PushBundle\Model\BaiduNoticeMessage in ' . __CLASS__ . '::' . __FUNCTION__ . ', at line ' . __LINE__);
        }
        $users = $users->getUsers();
        foreach ($users as $user) {
            $this->pushNoticeToUser($message, $user);
        }
    }

    public function pushMessageToTag()
    {
        
    }

}
