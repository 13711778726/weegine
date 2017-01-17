<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
	<ul class="nav nav-tabs">
		<li><a href="<?php  echo $this->createWebUrl('values', array('id'=>$rid))?>">数据列表</a></li>
		<li class="active"><a href="###">详细数据</a></li>
	</ul>

	<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('forms_info', TEMPLATE_INCLUDEPATH)) : (include template('forms_info', TEMPLATE_INCLUDEPATH));?>
	<form action="" class="form-horizontal form" method="post" enctype="multipart/form-data">
		<input type="hidden" name="fid" value="<?php  echo $fans['fid'];?>">
		<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		<div class="panel panel-default">
			<div class="panel-heading">
				表单详情
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">Openid</label>
					<div class="col-sm-8">
						<p class="help-block"><a href="<?php  echo url('mc/member/post', array('uid'=>$fans['uid']))?>" target="_blank"><?php  echo $fans['openid'];?></a></p>
					</div>
				</div>
				<?php  if(is_array($attrs)) { foreach($attrs as $row) { ?>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label"><?php  echo $row['title'];?></label>
					<div class="col-sm-8">
						<p class="help-block">
						<?php  if($row['type'] == 'images' && $values[$row['attr_id']]['attr_value']) { ?>
						<a href="/attachment/<?php  echo $values[$row['attr_id']]['attr_value'];?>" target="_blank"><img src="/attachment/<?php  echo $values[$row['attr_id']]['attr_value'];?>" style="width:100px;" /></a>
						<?php  } else { ?>
						<?php  echo emoji_html_to_unified($values[$row['attr_id']]['attr_value'])?>
						<?php  } ?>
						</p>
					</div>
				</div>
				<?php  } } ?>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">提交时间</label>
					<div class="col-sm-8">
						<p class="help-block"><?php  echo date('Y-m-d H:i:s', $fans['created']);?></p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">状态</label>
					<div class="col-sm-8">
						<label class="radio-inline">
							<input type="radio" value="1" name="status" <?php  if($fans['status']=='1') { ?>checked<?php  } ?>> 已处理
						</label>
						<label class="radio-inline">
							<input type="radio" value="0" name="status" <?php  if($fans['status']=='0') { ?>checked<?php  } ?>> 未处理
						</label>
					</div>
				</div>
				<?php  if($fans['updated']) { ?>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">更新时间</label>
					<div class="col-sm-8">
						<p class="help-block"><?php  echo date('Y-m-d H:i:s', $fans['updated']);?></p>
					</div>
				</div>
				<?php  } ?>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">&nbsp;</label>
					<div class="col-xs-12 col-sm-9">
						<button type="submit" class="btn btn-primary span2" name="submit" value="提交">提交</button>
						<button class="btn span2" value="关闭" onclick="history.go(-1);" name="close" type="button">返回</button>
					</div>
				</div>
			</div>
		</div>

	</form>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>