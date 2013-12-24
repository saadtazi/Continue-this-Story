<?php

/**
 * story components.
 *
 * @package    continuethisstory
 * @subpackage home
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class storyComponents extends sfComponents
{
 
  public function executePublicList()
  {
    $this->public_stories = Doctrine::getTable('Story')->getPublicStories();

  }
  public function executePrivateCount()
  {
    $this->private_story_count = Doctrine::getTable('Story')->getprivateStoryCount();
  }

  public function executePopularTags() {
      
      $this->tags = Doctrine::getTable('Story')->getPopularTags();
  }
}
