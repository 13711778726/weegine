<?php defined('IN_IA') or exit('Access Denied');?>﻿<?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?><link href="<?php echo MODULE_URL;?>images/style.css" rel="stylesheet" type="text/css"><style type="text/css">    .intors img{ max-width: 100%;}    .normal{font-weight: normal;}	.inpbox{ display:-webkit-box;}	.inpbox label{ display:block;-webkit-box-flex:1;font-weight:normal; padding-left:5px;}    select{border: 1px solid #cccccc !important;}    .form-control{margin-bottom:5px !important;}</style><div class="container">    <div class="lead_box" id="success_box" <?php  if($forms_status == '') { ?> style="display:none;"<?php  } ?>>        <img width="100%" src="<?php echo MODULE_URL;?>images/success.jpg">        <div class="success_info"><?php  echo $forms_status;?></div>        <center><a href="javascript:void(0);" onclick="WeixinJSBridge.call('closeWindow');" class="btn btn-primary">返回微信</a></center>    </div>    <?php  if($forms_status == '') { ?>    <div id="iframes"><iframe src="<?php  echo $forms['url'];?>" width="100%" height="100%" frameborder="0" name="html5" id="html5"></iframe></div>    <form action="" class="form-horizontal form" method="post" enctype="multipart/form-data">        <input type="hidden" name="id" value="<?php  echo $forms['rid'];?>">        <input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />        <input type="hidden" name="submit" value="submit" />		<?php  if($forms['spage']!=1) { ?>        <div class="lead_box" id="step_1">            <!-- <h6><?php  echo $forms['title'];?></h6>            <div class="lead_content intors">                <?php  echo $forms['content'];?>            </div> -->            <div style="width:100%;line-height:30px;border:1px solid #F9F3F3;position:fixed;bottom:0px;left:0px;background-color:#F9F3F3;border-radius:5px;background-color: rgba(255, 255, 255, 0.8);">            	<div style="float:left;height:75px;width:200px;overflow:hidden;">            		<div style="padding:18px 0 0 10px;float:left;"><img src="<?php echo MODULE_URL;?>images/success.jpg" width="40" height="40" /></div>            		<div style="padding:18px 0 0 5px;float:left;line-height:20px;">我推荐</br>是的发送到是的发送到</div>            	</div>            	<div style="float:right;height:75px;padding-right:10px;"><a href="###" class="btn btn-primary" id="go2">马上开始</a></div>            </div>        </div>		<?php  } ?>        <div class="lead_box" id="step_2" style="display:none;">            <h6><?php  echo $forms['title'];?></h6>			<div class="lead_content intors">                <?php  echo $forms['content'];?>            </div>                   <div class="lead_content">                <?php  if(is_array($attrs)) { foreach($attrs as $row) { ?>                       <div class="form-group">                    <label class="col-xs-12 item-label"><?php  echo $row['title'];?>:</label>                    <div class="col-xs-12">                    <?php  if($row['type'] == 'text') { ?>                    <input type="text" name="submit_data[<?php  echo $row['attr_id'];?>]" value="<?php  echo $row['defvalue'];?>" class="form-control <?php  if($row['is_must']) { ?>required<?php  } ?>" />                    <?php  } else if($row['type'] == 'textarea') { ?>                    <textarea name="submit_data[<?php  echo $row['attr_id'];?>]" class="form-control <?php  if($row['is_must']) { ?>required<?php  } ?>" cols="70" rows="5"><?php  echo $row['defvalue'];?></textarea>                    <?php  } else if($row['type'] == 'radio') { ?>                        <?php  if(is_array($row['extra'])) { foreach($row['extra'] as $key => $erow) { ?>                            <p class="inpbox">                                <input type="radio" value="<?php  echo $erow;?>" name="submit_data[<?php  echo $row['attr_id'];?>]" id="inp_<?php  echo $row['attr_id'];?>_<?php  echo $key;?>" <?php  if($row['defvalue']==$erow) { ?>checked<?php  } ?>><label for="inp_<?php  echo $row['attr_id'];?>_<?php  echo $key;?>"> <?php  echo $erow;?></label>                            </p>                        <?php  } } ?>                    <?php  } else if($row['type'] == 'checkbox') { ?>                        <?php  if(is_array($row['extra'])) { foreach($row['extra'] as $key => $erow) { ?>                            <p class="inpbox">                                <input type="checkbox" value="<?php  echo $erow;?>" name="submit_data[<?php  echo $row['attr_id'];?>][]" id="inp_<?php  echo $row['attr_id'];?>_<?php  echo $key;?>" <?php  if($row['defvalue']==$erow) { ?>checked<?php  } ?>> <label for="inp_<?php  echo $row['attr_id'];?>_<?php  echo $key;?>"> <?php  echo $erow;?></label>                            </p>                        <?php  } } ?>                    <?php  } else if($row['type'] == 'select') { ?>                        <select name="submit_data[<?php  echo $row['attr_id'];?>]" class="form-control <?php  if($row['is_must']) { ?>required<?php  } ?>">                        <?php  if(is_array($row['extra'])) { foreach($row['extra'] as $erow) { ?>                            <option value="<?php  echo $erow;?>"  <?php  if($row['defvalue']==$erow) { ?>selected<?php  } ?>><?php  echo $erow;?></option>                        <?php  } } ?>                        </select>                    <?php  } else if($row['type'] == 'date') { ?>                        <?php  echo tpl_form_field_date('submit_data['.$row['attr_id'].']', $row['defvalue'], false);?>                    <?php  } else if($row['type'] == 'datetime') { ?>                        <?php  echo tpl_form_field_date('submit_data['.$row['attr_id'].']', $row['defvalue'], true);?>                    <?php  } else if($row['type'] == 'images') { ?>                    	<input type="file" name="submit_data[<?php  echo $row['attr_id'];?>]" value="" class="<?php  if($row['is_must']) { ?>required<?php  } ?>" />                    <?php  } else if($row['type'] == 'district') { ?>                    	<?php  echo tpl_form_field_district("submit_data[".$row['attr_id']."]",array('province' => '','city' => '','district' => ''));?>                    <?php  } else { ?>                    <?php  } ?>                    <?php  if($forms['show_desc'] && $row['description']!='') { ?>                        <span class="help-block"><?php  echo $row['description'];?></span>                    <?php  } ?>                    </div>                </div>                <?php  } } ?>            </div>            <center><a href="###" class="btn btn-primary" id="dosave"> 填写好了  确认提交 </a></center>        </div>    </form>    <?php  } ?></div><div id="bgDiv" style="background:#000; width:100%; height:100%; position:absolute; top:0; left:0; opacity:0.5; -moz-opacity:0.5; padding-top:50%; text-align:center; display:none;z-index:9999;""><p style=" position:absolute; bottom:20%; left:48%; padding:0px; margin:0px ">正在提交...</p></div><?php (!empty($this) && $this instanceof WeModuleSite) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?><script language="javascript" src="<?php echo MODULE_URL;?>images/jquery.form.js"></script><script type="text/javascript">require(['jquery'], function($){        $("#go2").on('click', function(){            $("#step_1").hide();            $("#step_2").show();                        $("#iframes").hide();        });        $(".form").ajaxForm({            type: "POST",            url: $(".form").attr('action'),            dataType: 'json',            error: function(request) {            	console.log(request);                alert("出现问题了。麻烦告诉我们一声！\n" + request.responseText);                $("#bgDiv").hide();            },            success: function(data) {                if( data.s == '200' ){                    $(".form").remove();                    var msg = data.msg;                    if(data.redirect){                    	setTimeout(function(){                    		location.href = data.redirect;                    	},3000);                    	var msg = '<a href="'+data.redirect+'">'+data.msg+'</a>';                    }                    $("#success_box").show();                    $("#success_box .success_info").html( msg );                } else {                    alert( data.msg );                }                $("#bgDiv").hide();            }        })                $("#dosave").on('click', function(){        	$(".form").submit();        	$("#bgDiv").height($('body').height()).show();        });    })</script>