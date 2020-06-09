<?php

namespace BetterWP\Shortcode;

//use BetterWP\Shortcode\Shortcode as Shortcode;
use BetterWP\Pattern\FactorableAbstract as FactorableAbstract;

/**
 * TODO: function remove shortcode
 */
class ShortcodeFactory extends FactorableAbstract {
    protected static $hookable_class = 'BetterWP\Shortcode\Shortcode';
}