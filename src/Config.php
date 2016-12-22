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

//配置项处理
class Config {
	//配置集合
	protected static $items = [ ];

	//批量设置配置项
	public static function batch( array $config ) {
		foreach ( $config as $k => $v ) {
			self::set( $k, $v );
		}

		return true;
	}

	/**
	 * 添加配置
	 *
	 * @param $key
	 * @param $name
	 *
	 * @return bool
	 */
	public static function set( $key, $name ) {
		$tmp    = &self::$items;
		$config = explode( '.', $key );
		foreach ( (array) $config as $d ) {
			if ( ! isset( $tmp[ $d ] ) ) {
				$tmp[ $d ] = [ ];
			}
			$tmp = &$tmp[ $d ];
		}

		$tmp = $name;

		return true;
	}

	/**
	 * 获取配置
	 *
	 * @param $key
	 *
	 * @return array|void|null
	 */
	public static function get( $key ) {
		$tmp    = self::$items;
		$config = explode( '.', $key );
		foreach ( (array) $config as $d ) {
			if ( isset( $tmp[ $d ] ) ) {
				$tmp = $tmp[ $d ];
			} else {
				return null;
			}
		}

		return $tmp;
	}

	/**
	 * 排队字段获取数据
	 *
	 * @param string $key 获取键名
	 * @param array $extName 排除的字段
	 *
	 * @return array
	 */
	public static function getExtName( $key, array $extName ) {
		$config = self::get( $key );
		$data   = [ ];
		foreach ( (array) $config as $k => $v ) {
			if ( ! in_array( $k, $extName ) ) {
				$data[ $k ] = $v;
			}
		}

		return $data;
	}

	/**
	 * 检测配置是否存在
	 *
	 * @param $key
	 *
	 * @return bool
	 */
	public static function has( $key ) {
		$tmp    = self::$items;
		$config = explode( '.', $key );
		foreach ( (array) $config as $d ) {
			if ( isset( $tmp[ $d ] ) ) {
				$tmp = $tmp[ $d ];
			} else {
				return false;
			}
		}

		return true;
	}

	/**
	 * 获取所有配置项
	 * @return array
	 */
	public static function all() {
		return self::$items;
	}

	/**
	 * 设置items也就是一次更改全部配置
	 *
	 * @param $items
	 *
	 * @return mixed
	 */
	public static function setItems( $items ) {
		return self::$items = $items;
	}
}