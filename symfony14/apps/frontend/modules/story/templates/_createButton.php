<?php if ($sf_user->isAuthenticated()):?>
<div>
<a href="<?php echo url_for('story/create')?>"><?php echo __('Start a new Story!');?></a>
</div>
<?php endif;?>