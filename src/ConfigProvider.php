<?php
/** .-------------------------------------------------------------------
 * |  Software: [HDCMS framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <2300071698@qq.com>
 * |    WeChat: aihoudun
 * | Copyright (c) 2012-2019, www.houdunwang.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/
namespace houdunwang\config;

use hdphp\kernel\ServiceProvider;

class ConfigProvider extends ServiceProvider {

	//延迟加载
	public $defer = true;

	public function boot() {
		$this->load();
		date_default_timezone_set( c( 'app.timezone' ) );
	}

	//加载配置文件
	protected function load() {
		foreach ( glob( ROOT_PATH . '/system/config/*' ) as $file ) {
			$info = pathinfo( $file );
			c( $info['filename'], require $file );
		}
	}

	public function register() {
		$this->app->single( 'Config', function ( $app ) {
			return new Config( $app );
		} );
	}
}