<?php use_javascript('jquery-textlimit/jquery-textlimit');?>
<form action="">
<textarea name="story[first_piece][text]" id="story_first_piece_text"></textarea>
<div><span id="story_first_piece_text_left">140</span> chars left</div>
<script type="text/javascript">
    $(function () {
	$('#story_first_piece_text').textLimit();
    });
</script>
</form>