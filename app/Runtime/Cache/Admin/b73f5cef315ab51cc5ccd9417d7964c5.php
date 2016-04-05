<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">
	<meta name="description" content="广工光电技术实验教学示范中心">
	<meta name="keywords" content="广东工业大学，物理与光电工程学院,光电技术实验,教学">
	<title>光电技术示范中心后台登陆界面</title>
	<link rel="stylesheet" href="/ThinkPHP/Public/css/bootstrap.css">
	<link rel="stylesheet" href="/ThinkPHP/Public/admin/css/index.css">
	<script src="/ThinkPHP/Public/js/jQuery.js"></script>
	<script src="/ThinkPHP/Public/js/bootstrap.min.js"></script>
</head>
<body>
	<header class="header clear">
		<h2>光电技术实验中心后台</h2>
		<div class="info-con">
			<ul class="clear">
				<li>222 |</li>
				<li>222 |</li>
				<li>222 </li>
			</ul>
		</div>
	</header>
	<div class="container main">
		<div class="row">
			<div class="col-xs-2 left-nav">
				<ul>
					<li><a href="http://localhost/ThinkPHP/index.php/Admin/index/" class="config_btn">基本信息</a></li>
					<li><a href="http://localhost/ThinkPHP/index.php/Admin/article/index/p/1.html" class="article_btn">所有文章</a></li>
					<li><a href="http://localhost/ThinkPHP/index.php/Admin/news/index/p/1" class="news_btn">所有新闻</a></li>
					<li class="nav-on"><a href="javascript:void(0)" class="add_btn">发表文章或新闻</a></li>
				</ul>
			</div>
			<div class="col-xs-10 right-con row">
				<div class="form_con">
					<div class="item">
						<div class="typeclass">
							<label for="mytxt">请选择发文类型：</label>
							<select id="typeclass">
								<option value="文章">文章</option>
								<option value="新闻">新闻</option>
							</select>
						</div>
						<div class="tabclass ml50">
							<label for="mytab">请选择所属TAB：</label>
							<select id="tabclass">
								<option value="教学队伍">教学队伍</option>
								<option value="教研改革">教研改革</option>
								<option value="课程教学">课程教学</option>
								<option value="方法手段">方法手段</option>
								<option value="教学条件">教学条件</option>
								<option value="教学效果">教学效果</option>
								<option value="创新教育">创新教育</option>
								<option value="教学录像">教学录像</option>
							</select>
						</div>
						<div class="a_title_con ml50">
							<label for="a_title">请输入标题</label>
							<input type="text" name="a_title" id="a_title">
						</div>
					</div>
				</div>
				<div class="edit_con edui-default" id="content">
					
				</div>
				<div id="submit">发表</div>
			</div>
		</div>
	</div>
	<footer class="footer">
		IP:0000000
	</footer>
	
</body>
<!-- 配置文件 -->
<script type="text/javascript" src="/ThinkPHP/uedit/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/ThinkPHP/uedit/ueditor.all.js"></script>
<!-- 实例化编辑器 -->
<script type="text/javascript">
	$(function(){
		var ue = UE.getEditor('content');
		$("#submit").on("click",function(){
			var check = checkPrama();
			$.post("/ThinkPHP/index.php/Admin/Edit/edit",check,function(data){
				console.log(data);
			})
		})
		function setTABClassID(str){
			var bid;
			switch(str){
				case '教学队伍': bid = 1;break;
				case '教研改革': bid = 2;break;
				case '课程教学': bid = 3;break;
				case '方法手段': bid = 4;break;
				case '教学条件': bid = 5;break;
				case '教学效果': bid = 6;break;
				case '创新教育': bid = 7;break;
				case '教学录像': bid = 8;break;
				default: return false;
			}
			return bid;
		}
		function checkPrama(){
			var typeclass , tabclass , a_title , html_con , Prama = {};
			typeclass = $("#typeclass").find("option:selected").val();
			tabclass = $("#tabclass").find("option:selected").val();
			a_title = $("#a_title").val();
			html_con = ue.getContent();	
			if (typeclass=='' || tabclass=='' || a_title=='') {
				alert("请将必要信息填写完整！")
			}else if(html_con==''){
				alert("正文不能为空！！")
			}else{
				var bid = setTABClassID(tabclass);
				alert(bid);
				Prama = {
					"typeclass":typeclass,
					"bid":bid,
					"title":a_title,
					"content":html_con
				}
				return Prama;
			}
		}
	})
</script>
</html>