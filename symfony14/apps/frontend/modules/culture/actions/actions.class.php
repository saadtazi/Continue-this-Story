<?php

/**
 * culture actions.
 *
 * @package    continuethisstory
 * @subpackage language
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class cultureActions extends sfActions
{
   public function executeSwitch(sfWebRequest $request) {
        $user = $this->getUser();
        $available_cultures =  $user->getAvailableCultures() ;
        if (!array_key_exists( $request->getParameter('lang'), $available_cultures)) {
            $this->forward($this->getModuleName(), 'oops');
        }
        $user->setCulture($request->getParameter('lang'));
        $this->redirect($request->getReferer());
    }

    public function executeOops(sfWebRequest $request) {
        
    }

    public function executeSubmitTranslation(sfWebRequest $request) {}
}
