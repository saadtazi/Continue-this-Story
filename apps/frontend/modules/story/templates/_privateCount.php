<?php echo format_number_choice(
    '[0]... and no stories that are (still) private|[1]...and one story that is (still) private|(1,+Inf]...and %%COUNT%% stories that are (still) private',
    array('%count%' => '<strong>'.$private_story_count.'</strong>'),
    $private_story_count
  )
?>
