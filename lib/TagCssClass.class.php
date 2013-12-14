<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TagCssClassclass
 *
 * @author Saad Tazi
 */
class TagCssClass {
    const NB_CLASSES = 2;
    const MAX_NUM = 2;
    const CSS_PREFIX = 'tag';
    public static function get($tagNumber) {
        if ($tagNumber > self::MAX_NUM) {
            $tagNumber = self::MAX_NUM;
        }
        return self::CSS_PREFIX . ((int)( $tagNumber / self::NB_CLASSES) + 1 );
    }
}
?>
