<?php
global $_GPC, $_W;
load()->model('mc');

load()->func('tpl');

load()->func('communication');

load()->func('file');

include MODULE_ROOT . '/inc/common.php';

$rid = intval( $_GPC['id'] );

$forms = pdo_fetch('SELECT * FROM '.tablename('fwei_forms')." WHERE rid = :rid", array(':rid'=>$rid) );
include $this->template('ajax');

