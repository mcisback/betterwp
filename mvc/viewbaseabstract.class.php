<?php

namespace BetterWP\MVC;

abstract class ViewBaseAbstract {

    public static function render( string $view_name, ...$vars ) {
        // Extract the variables to a local namespace
        extract( $vars );
        
        static::process_template( $view_name );
    }

    public static function get_base_path() {
        return parent::get_base_path() . '/views';
    }

    protected static function name_to_path( string $view_name ) {
        $parts = explode( '.', $view_name );

        if( len( $parts ) < 1 ) {
            return static::get_base_path() . '/' . $view_name . '.view.php';
        } else {
            $tmp = str_replace( '.', '/', $view_name );

            return static::get_base_path() . '/' . $view_name . '.view.php';
        }
    }

    /**
     * * Here hook what kind of template engine you want to use:
     * ? Blade
     * ? PHP
     * ? Twig
     **/
    protected static function process_template( string $view_name ) {
        include( static::name_to_path( $view_name) );
    }

}

/*class NB_ViewHelper {

    public static function includeWithVariables(
    $filePath, array $variables = array(), $print = true, array $subs = null) {

    $htmlPositions = array(

        "::after_begin_head::" => "<head>",
        "::before_end_head::" => "</head>",
        "::after_begin_body::" => "<body>",
        "::before_end_body::" => "</body>"

    );

    $output = NULL;

    if( file_exists( $filePath ) ){

        // Extract the variables to a local namespace
        extract( $variables );

        // Start output buffering
        ob_start();

        // Include the template file
        include( $filePath );

        // End buffering and return its contents
        $output = ob_get_clean();

        if( $subs !== null ) {

            foreach ($subs as $pattern => $replacement) {

                if( array_key_exists( $pattern, $htmlPositions ) ) {

                    if( is_callable( $replacement) ) {

                        $replacement = $replacement( $variables );

                    }

                    if( strpos( $pattern, "after" ) !== FALSE ) {

                        $replacement = "\n" . $htmlPositions[ $pattern ] . "\n" . $replacement;

                    } else {

                        $replacement .= "\n" . $htmlPositions[ $pattern ] . "\n\n";

                    }

                    $output = preg_replace( "#".$htmlPositions[ $pattern ]."#", $replacement, $output );

                }

                if( is_callable( $replacement) ) {

                    $replacement = $replacement( $variables );

                }

                $output = preg_replace( "#$pattern#", $replacement, $output );

            }

        }

    } else {

        die( "$filePath does not exists" );

    }

    if ( $print ) {

        print $output;

    }

    return $output;

    }

}*/
