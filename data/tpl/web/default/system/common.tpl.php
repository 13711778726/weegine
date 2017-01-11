<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header-gw', TEMPLATE_INCLUDEPATH)) : (include template('common/header-gw', TEMPLATE_INCLUDEPATH));?>
<ol class="breadcrumb">
	<li><a href="./?refresh"><i class="fa fa-home"></i></a></li>
	<li><a href="<?php  echo url('system/welcome');?>">系统</a></li>
	<li><a href="<?php  echo url('system/common');?>">其他设置</a></li>
	<li class="active">全局设置</li>
</ol>
	<div class="clearfix">
		<form action="" method="post" class="form-horizontal form" onsubmit="return formcheck(this)" id="form">
			<h5 class="page-header">全局设置</h5>
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">授权地址安全模式</label>
				<div class="col-sm-10 col-xs-12">
					<label for="radio_1" class="radio-inline"><input type="radio" name="authmode" id="radio_1" value="1" <?php  if(empty($_W['setting']['authmode']) || $_W['setting']['authmode'] == 1) { ?> checked<?php  } ?> /> 宽松</label>
					<label for="radio_0" class="radio-inline"><input type="radio" name="authmode" id="radio_0" value="2" <?php  if(!empty($_W['setting']['authmode']) && $_W['setting']['authmode'] == 2) { ?> checked<?php  } ?> /> 严格</label>
					<div class="help-block">设置严格模式时，系统提供给用户的授权地址时效为3分钟，在这个时间内用户没有点击则失效。并且在严格模式下，授权地址为一次性地址，用户点击后该地址自动失效。但不会影响已授权过的用户。</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-md-offset-2 col-lg-offset-2 col-xs-12 col-sm-10 col-md-10 col-lg-10">
					<input name="authmodesubmit" type="submit" value="提交" class="btn btn-primary span3" />
					<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
				</div>
			</div>
			<h5 class="page-header">系统锁操作</h5>
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">删除升级锁</label>
				<div class="col-sm-10 col-xs-12">
					<input name="bae_delete_update" type="submit" value="删除" class="btn btn-primary span3" />
					<div class="help-block">升级“系统”系统时，需要先删除升级锁，确保升级正常进行。</div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">删除安装锁</label>
				<div class="col-sm-10 col-xs-12">
					<input name="bae_delete_install" type="submit" value="删除" class="btn btn-primary span3" />
					<div class="help-block">重新安装“系统”系统时，需要先删除安装锁。</div>
				</div>
			</div>
		</form>
	</div>
	<script type="text/javascript">
	kindeditor($('#signature'));
	</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer-gw', TEMPLATE_INCLUDEPATH)) : (include template('common/footer-gw', TEMPLATE_INCLUDEPATH));?>
