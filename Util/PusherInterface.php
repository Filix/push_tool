<?php
namespace Filix\PushBundle\Util;

use Filix\PushBundle\Model\NoticeMessageInterface;
use Filix\PushBundle\User\UserInterface;
use Filix\PushBundle\Client\ClientInterface;
use Filix\PushBundle\User\UsersInterface;
use Filix\PushBundle\Platform\PlatformsInterface;
use Filix\PushBundle\Tag\TagInterface;

interface PusherInterface
{
    public function init(array $params);
    
    public function getType();
    
    /*
     * 向应用推送通知
     */
    public function pushNoticeToApp(NoticeMessageInterface $message, PlatformsInterface $platforms);
    
    /*
     * 向标签推送通知
     */
    public function pushNoticeToTag(NoticeMessageInterface $message, TagInterface $tag);
    
    /*
     * 向单个用户推送通知
     */
    public function pushNoticeToUser(NoticeMessageInterface $message, UserInterface $user);
    
    /*
     * 向一组用户推送通知
     */
    public function pushNoticeToUsers(NoticeMessageInterface $message, UsersInterface $users);
    
    /*
     * 向某个客户端推送通知
     */
    public function pushNoticeToClient(NoticeMessageInterface $message, ClientInterface $client);
    
    /*
     * 向应用推送消息
     */
    public function pushMessageToApp();
    
    /*
     * 向单个用户推送消息
     */
    public function pushMessageToUser();
    
    /*
     * 向一组用户推送消息
     */
    public function pushMessageToUsers();
    
    /*
     * 向某个客户端推送消息
     */
    public function pushMessageToClient();
    
    /*
     * 打标签
     */
    public function addTag();
    
    /*
     * 向标签推送消息
     */
    public function pushMessageToTag();
    
}
