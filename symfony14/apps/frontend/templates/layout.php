<?php use_helper('sfFacebookConnect')?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml"  xml:lang="<?php echo $sf_user->getCulture();?>" lang="<?php echo $sf_user->getCulture();?>">
    <head>
	<?php include_http_metas() ?>
	<?php include_metas() ?>
	<title><?php if (!include_slot('title')):?><?php echo __('Continue This Story');?><?php endif;?></title>
	<link rel="shortcut icon" href="/favicon.ico" />
	<?php include_stylesheets() ?>
	<script type="text/javascript" src="http://www.google.com/jsapi"></script>
	<script type="text/javascript">
	    google.load("jquery", "1.3.2");
	    google.load("jqueryui", "1.7.2");
	</script>
	<script src="http://static.ak.connect.facebook.com/js/api_lib/v0.4/FeatureLoader.js.php/en_US" type="text/javascript"></script>
	<?php include_javascripts() ?>
    </head>
    <body>
	<?php include_partial('global/header');?>


	<div id="content">
	    <?php echo $sf_content ?>
	    <?php echo include_partial('story/createButton');?>
	</div>
	<div id="col1">
	<?php include_component('story','popularTags');?>
	</div>
	<?php include_partial('global/footer');?>

	<script type="text/javascript">
	    FB_RequireFeatures(["XFBML"], function() {
		FB.init("<?php echo sfConfig::get('app_facebook_api_key');?>","/xd_receiver.htm");
	    });
	</script>
	
    </body>
</html>
