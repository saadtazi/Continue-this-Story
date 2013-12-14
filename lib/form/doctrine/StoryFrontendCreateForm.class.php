<?php

/**
 * StoryFrontendCreateForm form.
 *
 * @package    continuethisstory
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class StoryFrontendCreateForm extends StoryForm {
    
    public function configure() {
        parent::configure();

        unset($this['creator_id']);
        
        $storyPiece = new StoryPiece();
        $storyPiece->Story = $this->getObject();
        
        $form = new StoryPieceFirstForm($storyPiece);

        $this->embedForm('first_piece', $form);
    }

    public function save($con = null) {
        
        $this->getObject()->setCreator(sfContext::getInstance()->getUser()->getGuardUser());

        parent::save($con);
    }
    
}
