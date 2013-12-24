<?php

/**
 * Story form.
 *
 * @package    continuethisstory
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class StoryForm extends BaseStoryForm
{
    public function configure() {
        //var_dump($this->widgetSchema);
        //die();
        $this->useFields(array('title', 'creator_name','creator_id', 'is_public', 'culture', 'piece_length'));

        //$this->widgetSchema['creator_id'] = new sfWidgetFormInputHidden();
        //$this->validatorSchema['creator_id'] = new sfValidatorPass();
        
        $this->widgetSchema['tags'] = new sfWidgetFormInput();
        $this->validatorSchema['tags'] = new sfValidatorPass();

        $this->widgetSchema['culture'] = new sfWidgetFormChoice(array(
                        'choices'  => sfContext::getInstance()->getUser()->getAvailableCultures(),
                        'expanded' => false,
                        'multiple' => false
        ));
        $this->embedForm('first_piece', new StoryPieceForm());
    }

    public function updateDefaultsFromObject() {
        parent::updateDefaultsFromObject();

        if (isset($this->widgetSchema['tags'])) {
            $this->setDefault('tags', implode(', ', $this->object->getTags()));
        }
    }


    public function setTags($con = null) {
        if (!$this->isValid()) {
            throw $this->getErrorSchema();
        }

        if (!isset($this->widgetSchema['tags'])) {
        // somebody has unset this widget
            return;
        }
        $this->object->setTags($this->getValue('tags'));

    }

}
