<?php
/**
 * Singleton trait which implements Singleton pattern in any class in which this trait is used.
 *
 * @package UC
 */

namespace UC\Inc\Traits;

trait Singleton {

    /**
     * Protected class constructor to prevent direct object creation
     */
    protected function __construct() {
    }

    /**
     * Prevent object cloning
     */
    final protected function __clone() {
    }

    /**
     *
     * @return object Singleton instance of the class.
     */
    final public static function get_instance() {

        /**
         * Collection of instance.
         *
         * @var array
         */
        static $instance = [];

        $called_class = get_called_class();

        if ( ! isset( $instance[ $called_class ] ) ) {

            $instance[ $called_class ] = new $called_class();

            /**
             * Use the `uc_theme_singleton_init_{$called_class}` hook to execute code
             */
            do_action( sprintf( 'uc_theme_singleton_init_%s', $called_class ) );

        }

        return $instance[ $called_class ];

    }

} // End trait