<?php echo __('');?>
<?php include_partial('story/list', array('stories' => $stories, 'no_story_msg' => __('Mmm, no story for tag "%TAG%"!', array('%TAG%'=>$tag))));?>