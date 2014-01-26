<?php
namespace Filix\PushBundle\Adapter;

use Filix\PushBundle\Model\JpushNoticeMessage;
use Filix\JpushBundle\Util\Message;
use Filix\PushBundle\Platform\PlatformsInterface;

/**
 * JpushNoticeMessageAdapter
 *
 * @author Filix
 */
class JpushNoticeMessageAdapter
{
    public function adapt(JpushNoticeMessage $message){
        $m = new Message();
        $m->setMsgContent(array(
            'n_builder_id' => $message->getBuilderId(), 
            'n_title' => $message->getTitle(), 
            'n_content' => $message->getContent(), 
            'n_extras' => $message->getExtras()
        ));
        $m->setMsgType(Message::MSG_TYPE_NOTICE);
        $m->setOverrideMsgId($message->getOverrideMsgId());
        $m->setSendDescription($message->getDescription());
        $m->setSendno($message->getSendno());
        $m->setTimeToLive($message->getOfflineTime());
        return $m;
    }
}
