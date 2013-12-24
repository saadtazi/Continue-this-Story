<?php

/**
 * StoryPiece form.
 *
 * @package    continuethisstory
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class StoryPieceFrontendForm extends StoryPieceForm
{
  public function configure()
  {
      $this->useFields(array('text','writer_name', 'next_writer_id'));
      $this->widgetSchema['text'] = new sfWidgetFormLimitedTextArea(
              array('limit' => $this->getObject()->Story->piece_length,
              'text_tag'=> 'h6',
              'text' => ' chars left'
              ));
      $this->widgetSchema['next_writer_id']= new sfWidgetFormFbFriendsSingleSelector();
  }

  public function setWriterName($value) {
      if (is_null($value) || $value == '') {
          //grab the creator name from the story
	  //Not called if empty or field removed from form
          $this->object->setWriterName($this->object->Story->creator_name);
      }
  }
  public function save($con = null) {

        $this->getObject()->setWriter(sfContext::getInstance()->getUser()->getGuardUser());

        parent::save($con);
    }

}
