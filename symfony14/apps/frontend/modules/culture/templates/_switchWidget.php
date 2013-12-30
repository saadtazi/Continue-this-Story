<div id="langswitcher">
<?php foreach ($available_languages as $language_key => $language):?>
<a href="<?php echo url_for('culture/switch?lang=' . $language_key);?>"><?php echo __($language);?></a>
<?php if ($last_language_key != $language_key):?>|<?php endif;?>
<?php endforeach;?>
</div>