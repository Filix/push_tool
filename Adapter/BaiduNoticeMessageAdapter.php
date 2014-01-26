<?php
namespace Filix\PushBundle\Adapter;

use Filix\PushBundle\Model\BaiduNoticeMessage;
use Filix\PushBundle\Model\NoticeMessageInterface;
/**
 * Description of BaiduNoticeMessageAdapter
 *
 * @author Filix
 */
class BaiduNoticeMessageAdapter
{
    public function adapt(BaiduNoticeMessage $message){
        $m = array(
            'title' => $message->getTitle(),
            'description' => $message->getContent(),
            'notification_builder_id' => $message->getBuilderId(),
            'notification_basic_style' => $message->getBasicStyle(),
            'open_type' => $message->getOpenType(),
            'net_support' => $message->getNetSupport(),
            'user_confirm' => $message->getUserConfirm(),
        );
        if ($message->getClickAction() == NoticeMessageInterface::REDIRECT_ACTION) {
            $m = array_merge($m, array('open_type' => 1, 'url' => $message->getRedirectUrl()));
        }
        if($message->getPkgContent()){
            $m['pkg_content'] = $message->getPkgContent();
        }
        if($message->getPkgName()){
            $m['pkg_name'] = $message->getPkgName();
        }
        if($message->getPkgVersion()){
            $m['pkg_version'] = $message->getPkgVersion();
        }
        if($message->getCustomContent()){
            $m['custom_content'] = $message->getCustomContent();
        }
        return $m;
    }
}
