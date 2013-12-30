<?php

/**
 * Base project form.
 *
 * @package    continuethisstory
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: BaseForm.class.php 20147 2009-07-13 11:46:57Z FabianLange $
 */
class sfWidgetFormLimitedTextArea extends sfWidgetFormTextarea
{
    protected function configure($options = array(), $attributes = array())
  {
    $this->addOption('limit');
    $this->addOption('text_tag', 'div');
    $this->addOption('text_tag_options', array());
    $this->addOption('text', ' chars left');
    $this->addOption('limit_field_id', null);

  }

  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    $textarea = parent::render($name, $value, $attributes, $errors);

    $chars_left = $this->getOption('limit') - strlen($value);
    $text_field_id = $this->generateId($name);
    $char_left_tag_id = $text_field_id . '_left';

    $limit_text = '<span id="' . $char_left_tag_id . '">' . $chars_left . '</span>'. $this->getOption('text');
    
    $text = $this->renderContentTag($this->getOption('text_tag'), $limit_text, $this->getOption('text_tag_options'));

    $js  = '<script type="text/javascript">
                var char_limit = ' . $this->getOption('limit') . ';
    ';
    
    $limit_field_id = $this->getOption('limit_field_id');
    
    $js .= '
        $(function () {';
    if (!is_null($limit_field_id)) {
        $js .= '$(\'#'.$limit_field_id.'\').keyup(function () {
                    $(\'#'.$text_field_id.'\').keyup();
                });
                ';
    }
    $js .= '$(\'#'.$text_field_id.'\').keyup(function () {
                var $this = $(this);
                var limit_id = $this.attr(\'id\') + \'_left\';
                ';
    if (!is_null($limit_field_id)) {
        $js .= 'var limit = $(\'#'. $limit_field_id .'\').val()';
    } else {
        $js .= 'var limit = ' . $this->getOption('limit') . ';';
    }
    $js .= '
		newlength = limit - $this.val().length;
		
		if (newlength < 0) {
		    $this.val($this.val().substr(0,limit));
		    $(\'#\'+ limit_id ).addClass(\'error\');
		    newlength = 0;
		} else {
		    $this.val($this.val().substr(0,limit));
		    $(\'#\'+ limit_id ).removeClass(\'error\');
		}
		$(\'#\'+ limit_id ).html(newlength);
                
            });
        });
        

    '
    ;
    $js .= '</script>';
    return $textarea . $text . $js;
  }

}
