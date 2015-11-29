<?php
/*			Copyright 2015 João Rodolfo da Silva Paiva

	This file is part of e-reservas.

    e-reservas is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    e-reservas is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with e-reservas.  If not, see <http://www.gnu.org/licenses/>.
*/
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title>e-Reservas &raquo; <?php echo ucfirst($controller); ?></title>
		<meta name="description" content="">
		<meta name="author" content="João">

		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/template2/css/style.css'); ?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/template2/css/bootstrap.min.css'); ?>" />
		<link rel="stylesheet" href="<?php echo base_url('public/template2/css/jquery-ui.css'); ?>" />
		<link rel="icon" sizes="128x128" href="<?php echo base_url('public/template2/img/favicon-128.png'); ?>"/>

		<script type="text/javascript" src="<?php echo base_url('public/template2/js/jquery-2.1.3.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('public/template2/js/bootstrap.min.js'); ?>"></script>
		<script type="text/javascript" src="<?php echo base_url('public/template2/js/jquery-ui.min.js'); ?>"></script>

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references
		<link rel="shortcut icon" href="/favicon.ico">
		<link rel="apple-touch-icon" href="/apple-touch-icon.png">-->
	</head>

	<body>
		<nav class="navbar navbar-default" role="navigation">
		<div class="container">

			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo base_url(); ?>">
					<img alt="e-Reservas" src="<?php echo base_url('public/template2/img/favicon-16.png'); ?>"/>
				</a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav"> <!-- menu administrativo -->
					<?php
					if($this->session->userdata('logado')==TRUE){ //verifica se admin esta logado e mostra o menu completo
						?>
					<li><?php echo anchor('home','Início'); ?></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Cadastros<span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><?php echo anchor('professores','Professor'); ?></li>
							<li><?php echo anchor('cursos','Curso'); ?></li>
							<li><?php echo anchor('disciplinas','Disciplina'); ?></li>
							<li class="divider"></li>
							<li><?php echo anchor('categorias','Categoria'); ?></li>
							<li><?php echo anchor('equipamentos','Equipamento'); ?></li>
							<li class="divider"></li>
							<li><?php echo anchor('salas','Sala'); ?></li>
						</ul>
					</li>
					<li class="disabled"><a href="#">Reservas</a></li>
					
					<?php
					} //fechando o if, se nao estiver logado só irá mostrar menus abaixo
					 ?>
					<li class="disabled"><a href="#">Contato</a></li>
					<li><a href="http://over9k.github.io/e-Reservas">Sobre</a></li>


				</ul>
				<?php // verifica se o usuário está logado e carrega o nome
					if($this->session->userdata('logado')==TRUE){ ?>
					<p class="navbar-text navbar-right">
					<span class="glyphicon glyphicon glyphicon-user" aria-hidden="true"></span>
					<?php
					echo ucfirst($this->session->userdata('admin'));
					echo '  ';
					echo anchor('home/logout','Sair','class="btn btn-xs btn-danger"');
					?>
					</p>
					<?php
					}
				 ?>




			</div><!-- /.navbar-collapse -->
		</div><!-- /.container -->
	</nav><!-- Fim do menu superior -->
