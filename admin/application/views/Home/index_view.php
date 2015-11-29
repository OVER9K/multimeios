<?php
/*
 *
 Copyright 2015 João Rodolfo da Silva Paiva

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
<div class="wrapper jumbotron" role="main">
		<div class="container">
			<div class="row">
				<div id="conteudo" class="col-xs-12 col-sm-8 col-md-9">
					<?php
					if($this->session->flashdata('loginerro')):
						echo '<div class="alert alert-danger" role="alert">'.$this->session->flashdata('loginerro').'</div>';
					endif;
					echo form_open('Home/login','class="form-signin"');
        //  echo '<form action="Home/login" class="form-signin" method="post" accept-charset="utf-8">';


					echo '<h3 class="form-signin-heading">Área administrativa</h3>';
					echo form_input(array(
										'name'=>'admin',
										'type'=>'text',
										'class'=>'form-control',
										'placeholder'=>'Login',
										'required'=>'',
										'autofocus'=>'',
									));

					echo form_password(array(
										'name'=>'senha',
										'class'=>'form-control',
										'type'=>'password',
										'placeholder'=>'Senha',
										'required'=>'',
									));
					echo str_repeat('<br/>', 1);
					echo form_submit(array(
										'name'=>'login',
										'class'=>'btn btn-lg btn-primary btn-block',
									),'Entrar');

					echo form_close();
					?>
				</div>

				<div id="sidebar" class="col-xs-12 col-sm-4 col-md-3">
					<!-- SIDEBAR -->
				</div>
			</div>
		</div>
	</div>
