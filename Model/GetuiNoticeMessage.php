<?php

namespace Filix\PushBundle\Model;

/**
 * GetuiNoticeMessage
 *
 * @author Filix
 */
class GetuiNoticeMessage extends NoticeMessage
{

    const TRANSMISSION_TYPE_OPEN = 1;
    const TRANSMISSION_TYPE_CUSTOM = 2;

    protected $logo;
    protected $transmission_type = 1;
    protected $transmission_content;

    public function getLogo()
    {
        return $this->logo;
    }

    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    public function getTransmissionType()
    {
        return $this->transmission_type;
    }

    public function setTransmissionType($transmission_type)
    {
        $this->transmission_type = $transmission_type;

        return $this;
    }

    public function getTransmissionContent()
    {
        return $this->transmission_content;
    }

    public function setTransmissionContent($transmission_content)
    {
        $this->transmission_content = $transmission_content;

        return $this;
    }

}
