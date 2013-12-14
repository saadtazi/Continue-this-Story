<?php

/**
 * Base project form.
 *
 * @package    continuethisstory
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: BaseForm.class.php 20147 2009-07-13 11:46:57Z FabianLange $
 */
class sfWidgetFormFbFriendsSingleSelector extends sfWidgetFormInput
{
    protected function configure($options = array(), $attributes = array())
  {
    

  }

  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
      $id = $this->generateId($name);
      $res = '
      <script type="text/javascript">
    $().ready(function() {
	
	FB.ensureInit( function() {
	    
		$("#' . $id . '").friendselector({hiddenfieldname: "' . $name . '"});
	 });
    });

</script>
<input type="text" id="' . $id . '" style="display:none;" class="ac_input fbs_single" />
';
    return $res;
  }
}
