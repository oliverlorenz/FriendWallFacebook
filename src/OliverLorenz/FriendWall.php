<?php

namespace OliverLorenz;

class FriendWall
{
	protected $_appId;
	protected $_secret;
	protected $_ownUserId;
	protected $_facebookClient;
	protected $_user;
	
	public function __construct($appId, $secret, $ownUserId) 
	{
		$this->_appId = $appId;
		$this->_secret = $secret;
		$this->_ownUserId = $ownUserId;

		$this->_facebookClient = new \Facebook(array(
		  'appId'  => $this->_appId,
		  'secret' => $this->_secret,
		));	
	}

	protected function _getUser()
	{
		return $this->_facebookClient->getUser();
	}

	public function isAuthenticated() 
	{
		return (bool) $this->_getUser();
	}

	public function getLoginUrl() {
		return $this->_facebookClient->getLoginUrl();
	}

	public function getLogoutUrl() {
		return $this->_facebookClient->getLogoutUrl();
	}

	public function areYouMyFriend()
	{
		$friends = $this->_facebookClient->api('/me/friends');
		foreach ($friends['data'] as $friend) {
			if($friend['id'] == $this->_ownUserId) {
				return true;
			}
		}
		$profile = $this->_facebookClient->api('/me');
		if($profile['id'] == $this->_ownUserId) {
			return true;
		}
		return false;
	}
}