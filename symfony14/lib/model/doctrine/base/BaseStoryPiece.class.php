<?php

/**
 * BaseStoryPiece
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $story_id
 * @property boolean $is_active
 * @property integer $writer_id
 * @property string $writer_name
 * @property text $text
 * @property string $next_writer_id
 * @property Story $Story
 * @property sfGuardUser $Writer
 * 
 * @method integer     getStoryId()        Returns the current record's "story_id" value
 * @method boolean     getIsActive()       Returns the current record's "is_active" value
 * @method integer     getWriterId()       Returns the current record's "writer_id" value
 * @method string      getWriterName()     Returns the current record's "writer_name" value
 * @method text        getText()           Returns the current record's "text" value
 * @method string      getNextWriterId()   Returns the current record's "next_writer_id" value
 * @method Story       getStory()          Returns the current record's "Story" value
 * @method sfGuardUser getWriter()         Returns the current record's "Writer" value
 * @method StoryPiece  setStoryId()        Sets the current record's "story_id" value
 * @method StoryPiece  setIsActive()       Sets the current record's "is_active" value
 * @method StoryPiece  setWriterId()       Sets the current record's "writer_id" value
 * @method StoryPiece  setWriterName()     Sets the current record's "writer_name" value
 * @method StoryPiece  setText()           Sets the current record's "text" value
 * @method StoryPiece  setNextWriterId()   Sets the current record's "next_writer_id" value
 * @method StoryPiece  setStory()          Sets the current record's "Story" value
 * @method StoryPiece  setWriter()         Sets the current record's "Writer" value
 * 
 * @package    continuethisstory
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseStoryPiece extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('story_piece');
        $this->hasColumn('story_id', 'integer', 20, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => '20',
             ));
        $this->hasColumn('is_active', 'boolean', null, array(
             'type' => 'boolean',
             'default' => true,
             ));
        $this->hasColumn('writer_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => '4',
             ));
        $this->hasColumn('writer_name', 'string', 50, array(
             'type' => 'string',
             'notnull' => true,
             'length' => '50',
             ));
        $this->hasColumn('text', 'text', null, array(
             'type' => 'text',
             'notnull' => true,
             ));
        $this->hasColumn('next_writer_id', 'string', 20, array(
             'type' => 'string',
             'length' => '20',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Story', array(
             'local' => 'story_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('sfGuardUser as Writer', array(
             'local' => 'writer_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}