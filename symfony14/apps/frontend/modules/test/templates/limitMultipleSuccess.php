<?php use_javascript('jquery-textlimit/jquery-textlimit');?>
<form action="">
<textarea name="story[first_piece][text]" id="story_first_piece_text"></textarea>
<div><span id="story_first_piece_text_left">140</span> chars left</div>
<script type="text/javascript">
    $(function () {
	$('#story_first_piece_text').textLimit({'limit': 10});
    });
</script>
</form>

<?php use_javascript('jquery-textlimit/jquery-textlimit');?>
<form action="">
<textarea name="story[first_piece][text]" id="story_first_piece_text2"></textarea>
<div><span id="story_first_piece_text2_left">140</span> chars left</div>
<script type="text/javascript">
    $(function () {
	$('#story_first_piece_text2').textLimit({'limit': 20});
    });
</script>
</form>