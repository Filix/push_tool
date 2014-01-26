<?php
namespace Filix\PushBundle\Adapter;

use Filix\PushBundle\Model\GetuiNoticeMessage;
use Filix\PushBundle\Util\Getui\IGeTui;
use Filix\PushBundle\Model\NoticeMessageInterface;
use Filix\PushBundle\Platform\PlatformsInterface;
/**
 * GetuiNoticeMessageAdapter
 *
 * @author Filix
 */
class GetuiNoticeMessageAdapter
{
    /*
     * Filix\PushBundle\Util\Getui\IGeTui
     */
    protected $sdk;
    
    public function __construct($sdk){
        $this->sdk = $sdk;
    }
    
    public function adaptSingleMessage(GetuiNoticeMessage $message){
        $template = $this->getTemplate($message);
	//个推信息体
	$m = new \IGtSingleMessage();
        
        if($message->getOfflineTime() > 0){
            $m->set_isOffline(true);//是否离线
            $m->set_offlineExpireTime($message->getOfflineTime());//离线时间
        }else{
            $m->set_isOffline(false);//是否离线
            $m->set_offlineExpireTime(0);
        }
	$m->set_data($template);//设置推送消息类型
        return $m;
    }
    
    public function adaptAppMessage(GetuiNoticeMessage $message){
        $template = $this->getTemplate($message);
        $m = new \IGtAppMessage();
        if($message->getOfflineTime() > 0){
            $m->set_isOffline(true);//是否离线
            $m->set_offlineExpireTime($message->getOfflineTime());//离线时间
        }else{
            $m->set_isOffline(false);//是否离线
            $m->set_offlineExpireTime(0);
        }
        $m->set_appIdList(array($this->sdk->getAppId()));
	$m->set_data($template);//设置推送消息类型
        return $m;
    }
    
    protected function getTemplate($message){
        if($message->getClickAction() == NoticeMessageInterface::REDIRECT_ACTION){
            $template = new \IGtLinkTemplate();
            $template->set_url($message->getRedirectUrl());
        }else{
            $template =  new \IGtNotificationTemplate(); 
            //透传
            $template ->set_transmissionType($message->getTransmissionType());//透传类型 1,应用立即启动，2，客户端处理启动
            $template ->set_transmissionContent($message->getTransmissionContent());//透传内容
        }
        $template ->set_title($message->getTitle());//通知栏标题
	$template ->set_text($message->getContent());//通知栏内容
	$template ->set_logo($message->getLogo());//通知栏logo
	$template ->set_isRing($message->isRang());//是否响铃
	$template ->set_isVibrate($message->isShake());//是否震动
	$template ->set_isClearable($message->isClearable());//通知栏是否可清除
	$template ->set_appId($this->sdk->getAppId());//应用appid
	$template ->set_appkey($this->sdk->getAppKey());//应用appkey
        // iOS推送需要设置的pushInfo字段
	//$template ->set_pushInfo($actionLocKey,$badge,$message,$sound,$payload,$locKey,$locArgs,$launchImage);
        return $template;
    }
    
    
    
}
