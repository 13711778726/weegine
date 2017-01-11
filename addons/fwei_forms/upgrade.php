<?php
/**
 * Enter description here ... 
 * ============================================================================
 * 版权所有 2014-2015 Flyfish，并保留所有权利。
 * 网站地址: http://www.fwei.net；
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * @Author: flyfish <1331305@qq.com>
 * @Id: upgrade.php 2015-5-9 上午8:59:29
*/
$notice = pdo_fieldexists('fwei_forms', 'notice');
if( !$notice ){
	pdo_query("ALTER TABLE ".tablename('fwei_forms')." ADD `notice` text NOT NULL");
}
$max_num = pdo_fieldexists('fwei_forms', 'max_num');
if( !$max_num ){
	pdo_query("ALTER TABLE ".tablename('fwei_forms')." ADD `max_num` int(10) NOT NULL DEFAULT 0");
}
$redirect = pdo_fieldexists('fwei_forms', 'redirect');
if( !$redirect ){
	pdo_query("ALTER TABLE ".tablename('fwei_forms')." ADD `redirect` varchar(250) NOT NULL");
}
$spage = pdo_fieldexists('fwei_forms', 'spage');
if( !$spage ){
	pdo_query("ALTER TABLE ".tablename('fwei_forms')." ADD `spage` tinyint(1) DEFAULT 0");
}