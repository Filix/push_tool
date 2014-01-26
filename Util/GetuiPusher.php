<?php
namespace Filix\PushBundle\Util;

use Filix\PushBundle\Util\Getui\IGeTui;
use Filix\PushBundle\Util\PusherInterface;
use Filix\PushBundle\Model\NoticeMessageInterface;
use Filix\PushBundle\Client\ClientInterface;
use Filix\PushBundle\User\UserInterface;
use Filix\PushBundle\Exception\InstanceErrorException;
use Filix\PushBundle\User\UsersInterface;
use Filix\PushBundle\Platform\PlatformsInterface;
use Filix\PushBundle\Platform\AndroidPlatform;
use Filix\PushBundle\Platform\IosPlatform;
use Filix\PushBundle\Tag\TagInterface;
use Filix\PushBundle\Model\GetuiNoticeMessage;
use Filix\PushBundle\Adapter\GetuiNoticeMessageAdapter;
/**
 * Description of GetuiPusher
 *
 * @author Filix
 */
class GetuiPusher implements PusherInterface
{
    protected $sdk;
    
    protected $adapter;

    public function __construct($app_id = null, $app_key = null, $master_secret = null)
    {
        $this->sdk = new IGeTui($app_id, $app_key, $master_secret);
        $this->adapter = new GetuiNoticeMessageAdapter($this->getSdk());
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
        
    }

    public function pushMessageToApp()
    {
        
    }

    public function pushMessageToClient()
    {
        
    }

    public function pushMessageToTag()
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
        if(!$message instanceof GetuiNoticeMessage){
            throw new InstanceErrorException('Compile Error: '
                    . '$message must be instance of Filix\PushBundle\Model\GetuiNoticeMessage in ' . __CLASS__ . '::' . __FUNCTION__ . ', at line ' . __LINE__);
        }
        $m = $this->adapter->adaptAppMessage($message);
        $ps = array();
        foreach($platforms->getPlatforms() as $platform){
            $ps[] = $platform->getName();
        }
        if($ps) $m->set_phoneTypeList($ps);
        $this->sdk->pushMessageToApp($m);
    }

    public function pushNoticeToClient(NoticeMessageInterface $message, ClientInterface $client)
    {
        if(!$message instanceof GetuiNoticeMessage){
            throw new InstanceErrorException('Compile Error: '
                    . '$message must be instance of Filix\PushBundle\Model\GetuiNoticeMessage in ' . __CLASS__ . '::' . __FUNCTION__ . ', at line ' . __LINE__);
        }
        $m = $this->adapter->adaptSingleMessage($message);
	$target = new \IGtTarget();
	$target->set_appId($this->sdk->getAppId());
	$target->set_clientId($client->getClientId());
	$this->sdk->pushMessageToSingle($m,$target);
    }

    public function pushNoticeToTag(NoticeMessageInterface $message, TagInterface $tag)
    {
        if(!$message instanceof GetuiNoticeMessage){
            throw new InstanceErrorException('Compile Error: '
                    . '$message must be instance of Filix\PushBundle\Model\GetuiNoticeMessage in ' . __CLASS__ . '::' . __FUNCTION__ . ', at line ' . __LINE__);
        }
        
        $m = $this->adapter->adaptAppMessage($message);
        
    }

    public function pushNoticeToUser(NoticeMessageInterface $message, UserInterface $user)
    {
        if(!$message instanceof GetuiNoticeMessage){
            throw new InstanceErrorException('Compile Error: '
                    . '$message must be instance of Filix\PushBundle\Model\GetuiNoticeMessage in ' . __CLASS__ . '::' . __FUNCTION__ . ', at line ' . __LINE__);
        }
        $m = $this->adapter->adaptSingleMessage($message);
        $targets = array();
        foreach($user->getClients() as $client){
            $target = new \IGtTarget();
            $target->set_appId($this->sdk->getAppId());
            $target->set_clientId($client->getClientId());
            $targets[] = $target;
        }
	$rep = $this->sdk->pushMessageToList($this->sdk->getContentId($m),$targets);
    }

    public function pushNoticeToUsers(NoticeMessageInterface $message, UsersInterface $users)
    {
        if(!$message instanceof GetuiNoticeMessage){
            throw new InstanceErrorException('Compile Error: '
                    . '$message must be instance of Filix\PushBundle\Model\GetuiNoticeMessage in ' . __CLASS__ . '::' . __FUNCTION__ . ', at line ' . __LINE__);
        }
        foreach($users->getUsers() as $user){
            $this->pushMessageToUser($message, $user);
        }
    }
    
}
