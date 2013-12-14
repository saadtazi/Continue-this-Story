<?php if (count($stories) <= 0):?>
<?php echo $no_story_msg;?>
<?php else:?>
<ul>
    <?php foreach ($stories as $story):?>
    <li class="storyitem">
        <h2><a href="<?php echo url_for('story/view?slug=' .$story->getSlug());?>"><?php echo $story->getTitle();?></a></h2>
        <p><?php echo __('created by');?> <?php echo $story->getCreatorName();?> - <?php echo $story->getCreatedAt();?>
    </li>
    <?php endforeach;?>
</ul>
<?php endif;?>