FriendWallFacebook
==================

Checks if the visitor of your Page is one of your Friends on Facebook

Usage
-----
	require_once('vendor/autoload.php');

	$appId = 'XXXXX';
	$secret = 'XXXXX';
	$myUserId = 'XXXXX';

	$friendWall = new OliverLorenz\FriendWall($appId, $secret, $myUserId);
	if($friendWall->isAuthenticated()) {
		if($friendWall->areYouMyFriend()) {
			echo "You are my Friend";
		} else {
			echo "You are NOT my Friend";
		}
		echo ' <a href="' . $friendWall->getLogoutUrl() . '">Logout</a>';
	} else {
		echo ' <a href="' . $friendWall->getLoginUrl() . '">Login</a>';
	}
