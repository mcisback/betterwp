<?php

namespace BetterWP\Pattern;

/**
 * TODO: everything
 */
abstract class FactorableAbstract  {
    protected static $hookables_container = [];
    protected static $hookable_class = '';

    static function add( $cb ){
        
        if(is_callable($cb)) {
        
            $hookable = $cb(new static::$hookable_class());
            $hookable->register();

            static::$hookables_container[ $hookable->key ] = $hookable;
        
        } elseif (is_object($cb)) {
            
            if(is_a($cb, static::$hookable_class)) {
                $cb->register();
            }
        
        }
    
    }

    static function del( $key ) {

        if( static::exists( $key ) ) {
    
            static::get( $key )->delete();

            static::unset( $key );

        }
    
    }

    static function do( string $key ) {
        if( static::exists( $key ) ) {
            
            self:$hookables[ $key ]->do();

        }
    }

    static function exists( string $key ) {
        return array_key_exists( $key, static::$hookables_container );
    }

    static function get( string $key ) {
        return static::$hookables_container[ $key ];
    }

    static function unset( string $key ) {
        unset( static::$hookables_container[ $key ] );
    }
}