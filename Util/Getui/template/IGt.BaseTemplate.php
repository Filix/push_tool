<?php 

class IGtBaseTemplate{
	var $appId;
	var $appkey;
	var $pushInfo;
	
	function get_transparent() {
		$transparent = new Transparent();
		$transparent->set_id('');
		$transparent->set_messageId('');
		$transparent->set_taskId('');
		$transparent->set_action('pushmessage');
		$transparent->set_pushInfo($this->get_pushInfo());
		$transparent->set_appId($this->appId);
		$transparent->set_appKey($this->appkey);

		$actionChainList = $this->getActionChain();
		
		foreach($actionChainList as $index=>$actionChain){
			$transparent->add_actionChain();
			$transparent->set_actionChain($index,$actionChain);
		}
		return $transparent->SerializeToString();
	}

	function  get_transmissionContent() {
		return null;
	}
	
	function  get_pushType() {
		return null;
	}

	function get_actionChain() {
		return null;
	}

	function get_pushInfo() {
		if ($this->pushInfo==null) {	
			$this->pushInfo = new PushInfo();
			$this->pushInfo->set_actionKey('');
			$this->pushInfo->set_badge('');
			$this->pushInfo->set_message('');
			$this->pushInfo->set_sound('');
		}

		return $this->pushInfo;
	}

	function set_pushInfo($actionLocKey,$badge,$message,$sound,$payload,$locKey,$locArgs,$launchImage) {
		$this->pushInfo = new PushInfo();
		$this->pushInfo->set_actionLocKey($actionLocKey);
		$this->pushInfo->set_badge($badge);
		$this->pushInfo->set_message($message);
		if ($sound!=null) {
			$this->pushInfo->set_sound($sound);
		}
		if ($payload!=null) {
			$this->pushInfo->set_payload($payload);
		}
		if ($locKey!=null) {
			$this->pushInfo->set_locKey($locKey);
		}
		if ($locArgs!=null) {
			$this->pushInfo->set_locArgs($locArgs);
		}
		if ($launchImage!=null) {
			$this->pushInfo->set_launchImage($launchImage);
		}
	}
	
	function  set_appId($appId) {
		$this->appId = $appId;
	}

	function  set_appkey($appkey) {
		$this->appkey = $appkey;
	}
}