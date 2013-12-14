<h1><?php echo $story->getTitle();?></h1>
<?php if ($tags = $story->getTags()):?>
    <ul class="storytags">
    <?php foreach ($tags as $tag):?>
        <li><a href="<?php url_for('story/tag?tag='.$tag);?>"><?php echo $tag;?></a></li>
    <?php endforeach;?>
    </ul>
<?php endif;?>
<?php if (count($story_pieces) <= 0):?>
    <?php echo __('Oops, not the longest story ever. Nobody wrote (yet)!');?>
<?php else:?>
    <ul>
        <?php foreach ($story_pieces as $key => $story_piece):?>
        <li><div class="piece"><?php echo $story_piece->getText();?></div></li>
        <?php endforeach;?>
    </ul>
    <?php if ($can_modify_last_piece):?>
    <?php echo __('You can still modify the last piece');?>
	<form action="" method="post">
	    <table>
	    <?php echo $form;?>
	    </table>
	    <input type="submit" value="<?php echo __('Modify') ?>" />
	</form>
    <?php endif;?>
    <?php if ($allowed_to_write_next):?>
        <?php echo __('You are the next to continue this story');?>
	<form action="" method="post">
	    <table>
	    <?php echo $form;?>
	    </table>
	    <input type="submit" value="<?php echo __('Add') ?>" />
	</form>
    <?php endif;?>

    <?php if (!$can_modify_last_piece && !$allowed_to_write_next && $sf_user->getGuardUser() && $story->isAdmin($sf_user->getGuardUser()->getId())):?>
	<?php echo __('As an admin, become the next writer');?>
	<form action="<?php echo url_for('story/changeNextWriter')?>" method="post">
	<input type="hidden" name="story_id" value="<?php echo $story->id;?>"/>
	<input type="hidden" name="story_piece_id" value="<?php echo $last_story_piece->id;?>"/>
	<input type="submit" value="<?php echo __('Become the next writer') ?>" />
    </form>
    <?php else:?>
	<?php echo __('<!--not the creator-->');?>
        
    <?php endif;?>
<?php endif;?>