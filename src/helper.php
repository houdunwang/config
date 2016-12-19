<?php
/**
 * 操作配置项
 *
 * @param string $name
 * @param string $value
 *
 * @return mixed
 */
if ( ! function_exists( 'c' ) ) {
	function c( $name = '', $value = '' ) {
		static $instance = null;
		if ( is_null( $instance ) ) {
			$instance = new \houdunwang\config\Config();
		}
		if ( $name === '' ) {
			return $instance->all();
		}
		if ( $value === '' ) {
			return $instance->get( $name );
		}

		return $instance->set( $name, $value );
	}
}