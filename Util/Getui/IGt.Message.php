<?php 

class IGtMessage{
	var  $isOffline;
	/*
	 * 过多久该消息离线失效（单位秒） 支持1-72小时*3600秒，默认1小时
	 */
	var $offlineExpireTime;

	var $data;

	 public function __construct()
	 {

	 }

	function get_isOffline()
	{
		return $this->isOffline;
	}
	function set_isOffline($isOffline)
	{
		return $this->isOffline = $isOffline;
	}
	function get_offlineExpireTime()
	{
		return $this->offlineExpireTime;
	}
	function set_offlineExpireTime($offlineExpireTime)
	{
		return $this->offlineExpireTime = $offlineExpireTime;
	}
	function get_data()
	{
		return $this->data;
	}
	function set_data($data)
	{
		return $this->data = $data;
	}
}