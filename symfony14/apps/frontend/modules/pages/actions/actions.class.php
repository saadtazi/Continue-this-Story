<?php

/**
 * pages actions.
 *
 * @package    continuethisstory
 * @subpackage pages
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pagesActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    if (!$request->hasParameter('page')) {
        //$this->forward404();
    }
    $this->page = $request->getParameter('page');
  }
}
