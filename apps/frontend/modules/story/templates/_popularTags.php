<?php if (count($tags) > 0):?>
<div id="cloud">
    <h3><?php echo __('Tag Cloud');?></h3>
    <ul>
    <?php foreach ($tags as $tag):?>
        <li class="<?php echo TagCssClass::get($tag->nb);?>"><a href="<?php echo url_for('story/tag?tag='.$tag->name)?>" title="<?php echo htmlentities($tag->name);?> (x<?php echo $tag->nb;?>)"><?php echo $tag->name;?></a></li>
    <?php endforeach;?>
    </ul>
</div>
<?php endif;?>