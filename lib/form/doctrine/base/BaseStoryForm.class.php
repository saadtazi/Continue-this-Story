<?php

/**
 * Story form base class.
 *
 * @method Story getObject() Returns the current form's model object
 *
 * @package    continuethisstory
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseStoryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'title'        => new sfWidgetFormInputText(),
      'creator_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'), 'add_empty' => false)),
      'creator_name' => new sfWidgetFormInputText(),
      'culture'      => new sfWidgetFormInputText(),
      'is_public'    => new sfWidgetFormInputCheckbox(),
      'is_active'    => new sfWidgetFormInputCheckbox(),
      'is_finished'  => new sfWidgetFormInputCheckbox(),
      'piece_length' => new sfWidgetFormInputText(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
      'slug'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'title'        => new sfValidatorString(array('max_length' => 255)),
      'creator_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Creator'))),
      'creator_name' => new sfValidatorString(array('max_length' => 50)),
      'culture'      => new sfValidatorString(array('max_length' => 7, 'required' => false)),
      'is_public'    => new sfValidatorBoolean(array('required' => false)),
      'is_active'    => new sfValidatorBoolean(array('required' => false)),
      'is_finished'  => new sfValidatorBoolean(array('required' => false)),
      'piece_length' => new sfValidatorInteger(array('required' => false)),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
      'slug'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Story', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('story[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Story';
  }

}
