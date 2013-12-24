<?php

class myUser extends sfGuardSecurityUser {
    protected $fbInfoArray = array();
    protected $isSetFbInfoArray = false;

    public function getAvailableCultures() {
	return sfConfig::get('app_culture_available_cultures');
    }

    public function getFbId() {

	return sfFacebook::getAnyFacebookUid();
    }

    public function getFacebookFirstName() {
	return $this->getFacebookField('first_name');
    }
    public function getFacebookName() {
	return $this->getFacebookField('name');
    }
    public function getFacebookProfilePic() {
	
	return $this->getFacebookField('pic_small');
    }

    public function getFacebookField($fieldname) {
	
	if (!$this->getAttribute('has_facebook_info')) {
	    $this->retieveInfoFromFacebook();
	} elseif (!$this->isSetFbInfoArray) {
	    $this->fbInfoArray = $this->getAttribute('user_info');
	}
	return isset($this->fbInfoArray[$fieldname])? $this->fbInfoArray[$fieldname] : '';
    }
    

    private function retieveInfoFromFacebook() {
	$fb_uid = $this->getFbId();
	if ($fb_uid) {
	    $ret = sfFacebook::getFacebookApi()->users_getInfo(
		    array(
		    $fb_uid
		    ),
		    array(
		    'name',
		    'first_name',
		    'last_name',
		    'pic_small'
		    )
	    );
	    $this->fbInfoArray = $ret[0];
	    $this->isSet = true;
	    $this->setAttribute('user_info', $ret[0]);
	    $this->setAttribute('has_facebook_info', true);
	}
	$this->fbInfoArray = $this->getAttribute('user_info');
	return $this->fbInfoArray;
    }


}

