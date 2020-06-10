<?php

namespace BetterWP\MVC;

abstract class MVCBaseAbstract {

    public static function get_base_path() {
        return get_template_directory() . '/betterwp';
    }

}
