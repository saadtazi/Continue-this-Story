<?php

/**
 * test actions.
 *
 * @package    continuethisstory
 * @subpackage test
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class testActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    //$this->forward('default', 'module');
  }

  public function executeGetData() {

  }

  public function executeLimitSimple() {
      
  }
  
  public function executeLimitMultiple() {
      
  }

  public function executeLimitMultipleWithFieldLength() {

  }

}
