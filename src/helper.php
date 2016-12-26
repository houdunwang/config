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
		if ( $name === '' ) {
			return \houdunwang\config\Config::all();
		}
		if ( $value === '' ) {
			return \houdunwang\config\Config::get( $name );
		}

		return \houdunwang\config\Config::set( $name, $value );
	}
}