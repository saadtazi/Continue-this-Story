<?php

/**
 * BaseStory
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $title
 * @property integer $creator_id
 * @property string $creator_name
 * @property string $culture
 * @property boolean $is_public
 * @property boolean $is_active
 * @property boolean $is_finished
 * @property integer $piece_length
 * @property sfGuardUser $Creator
 * @property Doctrine_Collection $Pieces
 * 
 * @method string              getTitle()        Returns the current record's "title" value
 * @method integer             getCreatorId()    Returns the current record's "creator_id" value
 * @method string              getCreatorName()  Returns the current record's "creator_name" value
 * @method string              getCulture()      Returns the current record's "culture" value
 * @method boolean             getIsPublic()     Returns the current record's "is_public" value
 * @method boolean             getIsActive()     Returns the current record's "is_active" value
 * @method boolean             getIsFinished()   Returns the current record's "is_finished" value
 * @method integer             getPieceLength()  Returns the current record's "piece_length" value
 * @method sfGuardUser         getCreator()      Returns the current record's "Creator" value
 * @method Doctrine_Collection getPieces()       Returns the current record's "Pieces" collection
 * @method Story               setTitle()        Sets the current record's "title" value
 * @method Story               setCreatorId()    Sets the current record's "creator_id" value
 * @method Story               setCreatorName()  Sets the current record's "creator_name" value
 * @method Story               setCulture()      Sets the current record's "culture" value
 * @method Story               setIsPublic()     Sets the current record's "is_public" value
 * @method Story               setIsActive()     Sets the current record's "is_active" value
 * @method Story               setIsFinished()   Sets the current record's "is_finished" value
 * @method Story               setPieceLength()  Sets the current record's "piece_length" value
 * @method Story               setCreator()      Sets the current record's "Creator" value
 * @method Story               setPieces()       Sets the current record's "Pieces" collection
 * 
 * @package    continuethisstory
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseStory extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('story');
        $this->hasColumn('title', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '255',
             ));
        $this->hasColumn('creator_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => '4',
             ));
        $this->hasColumn('creator_name', 'string', 50, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '50',
             ));
        $this->hasColumn('culture', 'string', 7, array(
             'type' => 'string',
             'default' => 'en',
             'length' => '7',
             ));
        $this->hasColumn('is_public', 'boolean', null, array(
             'type' => 'boolean',
             'default' => true,
             ));
        $this->hasColumn('is_active', 'boolean', null, array(
             'type' => 'boolean',
             'default' => true,
             ));
        $this->hasColumn('is_finished', 'boolean', null, array(
             'type' => 'boolean',
             'default' => true,
             ));
        $this->hasColumn('piece_length', 'integer', 4, array(
             'type' => 'integer',
             'default' => 140,
             'length' => '4',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser as Creator', array(
             'local' => 'creator_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasMany('StoryPiece as Pieces', array(
             'local' => 'id',
             'foreign' => 'story_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $taggable0 = new Taggable();
        $sluggable0 = new Doctrine_Template_Sluggable(array(
             'fields' => 
             array(
              0 => 'title',
             ),
             ));
        $this->actAs($timestampable0);
        $this->actAs($taggable0);
        $this->actAs($sluggable0);
    }
}