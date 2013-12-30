<?php

/**
 * StoryPiece form.
 *
 * @package    continuethisstory
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class StoryPieceFirstForm extends StoryPieceForm
{
  public function configure()
  {
      parent::configure();
      
      unset($this['writer_id'], $this['writer_name']);
  }



  public function updateObject($values = null){
      $this->getObject()->setWriter($this->getObject()->Story->Creator);
      $this->getObject()->setWriterName($this->getObject()->Story->getCreatorName());
      //die('saving StoryPieceFIRSTForm');
      parent::updateObject($values);
  }
}
