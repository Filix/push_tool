<?php

namespace Filix\PushBundle\Model;

use Filix\PushBundle\Model\NoticeMessageInterface;

/**
 * BaiduNoticeMessage
 *
 * @author Filix
 */
class BaiduNoticeMessage extends NoticeMessage
{

    protected $builder_id = 0;
    protected $open_type = 0;
    protected $net_support = 1;
    protected $user_confirm = 0;
    protected $pkg_content;
    protected $pkg_name;
    protected $pkg_version;
    protected $custom_content = array();

    public function getId()
    {
        return md5(urlencode($this->getTitle() . '_' . $this->getContent() . $this->getBasicStyle()));
    }

    public function getBuilderId()
    {
        return $this->builder_id;
    }

    public function setBuilderId($builder_id)
    {
        $this->builder_id = $builder_id;

        return $this;
    }

    public function getOpenType()
    {
        return $this->open_type;
    }

    public function setOpenType($open_type)
    {
        $this->open_type = $open_type;

        return $this;
    }

    public function getNetSupport()
    {
        return $this->net_support;
    }

    public function setNetSupport($net_support)
    {
        $this->net_support = $net_support;

        return $this;
    }

    public function getUserConfirm()
    {
        return $this->user_confirm;
    }

    public function setUserConfirm($user_confirm)
    {
        $this->user_confirm = $user_confirm;

        return $this;
    }

    public function getPkgContent()
    {
        return $this->pkg_content;
    }

    public function setPkgContent($pkg_content)
    {
        $this->pkg_content = $pkg_content;

        return $this;
    }

    public function getPkgName()
    {
        return $this->pkg_name;
    }

    public function setPkgName($pkg_name)
    {
        $this->pkg_name = $pkg_name;

        return $this;
    }

    public function getPkgVersion()
    {
        return $this->pkg_version;
    }

    public function setPkgVersion($pkg_version)
    {
        $this->pkg_version = $pkg_version;

        return $this;
    }

    public function getCustomContent()
    {
        return $this->custom_content;
    }

    public function setCustomContent(array $custom_content)
    {
        $this->custom_content = $custom_content;

        return $this;
    }

    public function getBasicStyle()
    {
        $style = 0;
        $style += $this->isRang() ? 4 : 0;
        $style += $this->isShake() ? 2 : 0;
        $style += $this->isClearable() ? 1 : 0;
        return $style;
    }

}
