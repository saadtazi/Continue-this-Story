<?php if ($sf_user->isAuthenticated() && sfFacebook::getAnyFacebookUid()): ?>
    <?php echo __('Hello');?>
    <?php echo $sf_user->getFacebookFirstName();?>
    <img src="<?php echo $sf_user->getFacebookProfilePic();?>" title="<?php echo $sf_user->getFacebookName();?>"/>
    <a href="<?php echo url_for('sfGuardAuth/signout');?>"><?php echo __('Logout');?></a>

<?php else: ?>
    <fb:login-button v="2" onlogin="updateLoginBox('<?php echo url_for('sfFacebookConnectAuth/signin');?>','<?php echo url_for('user/loginBox');?>');"><fb:intl>Connect with Facebook</fb:intl></fb:login-button>

<?php endif; ?>
