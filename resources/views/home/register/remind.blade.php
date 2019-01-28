<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>账号激活的邮件提醒</title>
</head>
<body>
	<pre>
		尊敬的{{$uname['username']}}:

       	您好，感谢您的注册 。这是一封注册确认邮件。 
		请点击以下链接完成确认： <a href="http://llhmm.cn/home/remind?id={{$id}}&token={{$token}}">http://llhmm.cn/home/remind?id={{$id}}&token={{$token}}</a>
		如果链接不能点击，请复制地址到浏览器，然后直接打开。 
													
													二郎巷博客

	</pre>
</body>
</html>