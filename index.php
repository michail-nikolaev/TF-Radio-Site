<?php

# This file passes the content of the Readme.md file in the same directory
# through the Markdown filter. You can adapt this sample code in any way
# you like.

# Install PSR-0-compatible class autoloader
spl_autoload_register(function($class){
	require preg_replace('{\\\\|_(?!.*\\\\)}', DIRECTORY_SEPARATOR, ltrim($class, '\\')).'.php';
});

# Get Markdown class
use \Michelf\MarkdownExtra;

# Read file and pass content through the Markdown praser
$text = file_get_contents('example-md/README.md');
$html = MarkdownExtra::defaultTransform($text);

?>

<html lang="ru">
<head>
	<title>Task Force Radio</title>
	<link rel="shortcut icon" href="img/favicon.png" type="image/png">

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
	<link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet" media="screen">
		
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.1/css/font-awesome.css" rel="stylesheet">
		
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
		
	<link rel="stylesheet" type="text/css" href="style.css">
		
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<!-- GitHub Ribbon -->
<a href="https://github.com/michail-nikolaev/task-force-arma-3-radio" target="_blank">
	<img style="position: absolute; top: 0; right: 0; border: 0; z-index:100;" src="img/github-ribbon.png" alt="Fork me on GitHub">
</a>
<div class="top-alert">
	Страница находится в разработке.
</div>

<div class="container">
	<div class="row">
		<!-- Left col -->
		<div class="col-xs-3 text-right pos-relative">
			<img class="radio" src="img/radio.png" alt="Radio">
			
			<p class="copyrights">
				Copyright&nbsp;2013<?php $y=date("Y"); if ($y != 2013) echo "—" .$y;?>&nbsp;<a href="http://forum.task-force.ru/index.php?action=profile;u=12">Nkey</a> <!-- Add year interval if year is not 2013 -->
				<br>Сайт: <a href="http://forum.task-force.ru/index.php?action=profile;u=7">MTF</a>
			</p>
			<p class="copyrights">Форум отряда
			<br><a href="http://task-force.ru">Task&nbsp;Force:&nbsp;Arrowhead</a></p>
		</div>
		
		<!-- Right col -->
		<div class="col-xs-8 col-xs-offset-1">
			
			<div class="header">
				<img class="logo hires" width="425" height="69" src="img/logo.png" alt="Radio">

				<div class="clearfix">
					<div class="credit pull-left">
						Created by
						<div class="name"><a href="http://forum.task-force.ru/index.php?action=profile;u=12" target="_blank">[TF]Nkey</a></div>
					</div>
					<div class="credit">
						Thanks to
						<div class="name thanks">
							<a href="http://forum.task-force.ru/index.php?action=profile;u=7" target="_blank">[TF]MTF</a>, <a href="http://forum.task-force.ru/index.php?action=profile;u=14" target="_blank">[TF]Hardckor</a>, Andrey Z.
						</div>
					</div>
				</div>

				<div class="clearfix">
					<div class="pull-left margin-r-4">
						<a href="https://github.com/michail-nikolaev/task-force-arma-3-radio/raw/master/releases/0.7.0%20beta.zip" class="btn btn-primary btn-lg">
							<span class="fa fa-cloud-download fa-lg"></span>&nbsp;Скачать рацию
						</a>
						<p class="text-center opacity07 white">v0.7.0 beta от 15.09.2013</p>
					</div>
					<div class="pull-left margin-r-4">
						<button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target="#myModal">
							<span class="fa fa-pencil fa-lg"></span>&nbsp;Написать автору
						</button>
					</div>
				</div>	

				<!-- Modal -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="writeToAuthor" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							
							<div class="modal-header">
								<a href="#" class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
								<h4 class="modal-title" id="writeToAuthor">Письмо автору</h4>
							</div>
							<div class="modal-body">							
								<div class="alert alert-danger hide" id="check-form-message"></div><!-- Form validation alerts -->
							
								<!-- Modal contents -->
								<form role="form" id="mailForm" method="post" action="mail.php" onSubmit="return checkForm(this)">
									<div class="form-group">
										<label for="email">Ваш email</label>
										<input type="email" class="form-control" name="email" placeholder="my@email.ru" check_pattern="^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$" check_message="Введите правильный email.">
									</div>
									<div class="form-group">
										<label for="mailForm-message">Сообщение</label>
										<textarea class="form-control" name="message" rows="5" placeholder="Спасибо! Это лучшая рация, с которой мы играли!" check_message="Вы ничего не написали."></textarea>
									</div>
								</form>								
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
								<button type="submit" class="btn btn-primary" form="mailForm">Отправить</button>
							</div>
								
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->				
				
			</div><!-- /.header -->						
			
			<div id="readme-content">	
				<?php echo $html; ?><!-- MARKDOWN GOES HERE -->
			</div>
					
		</div><!-- Right col end -->
	</div><!-- /.row -->
</div>

<script src="https://code.jquery.com/jquery.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="script.js"></script>
</body>
</html>