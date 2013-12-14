<?php

/**
 * culture Components.
 *
 * @package    continuethisstory
 * @subpackage language
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class cultureComponents extends sfComponents
{
   public function executeSwitchWidget(sfWebRequest $request) {
      $this->available_languages = $this->getUser()->getAvailableCultures();
      $this->available_language_keys = array_keys($this->available_languages);
      $this->last_language_key = end($this->available_language_keys);
    }

    

}
