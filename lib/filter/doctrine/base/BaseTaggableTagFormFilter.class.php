<?php

/**
 * TaggableTag filter form base class.
 *
 * @package    continuethisstory
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseTaggableTagFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'       => new sfWidgetFormFilterInput(),
      'story_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Story')),
    ));

    $this->setValidators(array(
      'name'       => new sfValidatorPass(array('required' => false)),
      'story_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Story', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('taggable_tag_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addStoryListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query->leftJoin('r.StoryTaggableTag StoryTaggableTag')
          ->andWhereIn('StoryTaggableTag.id', $values);
  }

  public function getModelName()
  {
    return 'TaggableTag';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'name'       => 'Text',
      'story_list' => 'ManyKey',
    );
  }
}
