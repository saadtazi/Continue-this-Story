<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/

/**
 * Description of LanguageFiltersclass
 *
 * @author Saad Tazi
 */
class LanguageFilter extends sfFilter {
    public function execute($filterChain) {
        // Execute this filter only once
        if ($this->isFirstCall()) {
            // Filters don't have direct access to the request and user objects.
            // You will need to use the context object to get them

            $user    = $this->getContext()->getUser();
            
            if (!$user->hasAttribute('first_visit')) {
                $request = $this->getContext()->getRequest();


                $culture = $request->getPreferredCulture(array_keys($user->getAvailableCultures()));
                $user->setCulture($culture);
                $user->setAttribute('first_visit', 'true');
            }
            
        }

        // Execute next filter
        $filterChain->execute();
    }
}

