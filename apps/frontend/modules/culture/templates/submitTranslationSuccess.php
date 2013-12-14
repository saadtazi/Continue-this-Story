<h1><?php echo __('Oops');?></h1>
<p><?php echo __('Your favorite site doesn\'t exist in the requested language');?></p>

<h1><?php echo __('Want to help?');?></h1>
<p><?php echo __('You can help us!! Yes, you can.');?></p>
<p><?php echo __('Download the <a href="#">following Xml file</a>, translate from english to your favorite language, and send it back to us through that <a href="%SUBMIT_TRANS_URL%">form</a>', array('%SUBMIT_TRANS_URL%'=> url_for('language', 'submitTranslation')));?></p>