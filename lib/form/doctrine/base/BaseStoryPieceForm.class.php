<?php

/**
 * StoryPiece form base class.
 *
 * @method StoryPiece getObject() Returns the current form's model object
 *
 * @package    continuethisstory
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseStoryPieceForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'story_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Story'), 'add_empty' => false)),
      'is_active'      => new sfWidgetFormInputCheckbox(),
      'writer_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Writer'), 'add_empty' => false)),
      'writer_name'    => new sfWidgetFormInputText(),
      'text'           => new sfWidgetFormInputText(),
      'next_writer_id' => new sfWidgetFormInputText(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'story_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Story'))),
      'is_active'      => new sfValidatorBoolean(array('required' => false)),
      'writer_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Writer'))),
      'writer_name'    => new sfValidatorString(array('max_length' => 50)),
      'text'           => new sfValidatorPass(),
      'next_writer_id' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('story_piece[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'StoryPiece';
  }

}
