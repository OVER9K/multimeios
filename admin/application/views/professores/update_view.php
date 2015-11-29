<?php

/*
 *
 Copyright 2015 João Rodolfo da Silva Paiva

 This file is part of AUDIOVISUAL.

 AUDIOVISUAL is free software: you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation, either version 3 of the License, or
 (at your option) any later version.

 AUDIOVISUAL is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with AUDIOVISUAL.  If not, see <http://www.gnu.org/licenses/>.

 *
 */
?>
<div class="wrapper" role="main">
	<div class="container">
		<div class="row">
			<div id="conteudo" class="col-xs-12 col-sm-8 col-md-9">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4>Alterar professor:</h4>
					</div>
					<div class="panel-body">
						<div class="col-xs-12 col-sm-8 col-md-6"> <!-- div para diminuir o tamanho dos inputs do form -->
							<div class="btn-group btn-group-sm" role="group" aria-label="basic-options">
								<?php echo anchor('professores/create', 'Novo', array('class' => 'btn btn-default', 'type' => 'button')); ?>
								<?php echo anchor('professores/retrieve', 'Listar', array('class' => 'btn btn-default', 'type' => 'button')); ?>
								<?php echo str_repeat('<br/>', 2); ?>
							</div>

								<?php
								$iduser = $this->uri->segment(3);
								if ($iduser == NULL)
									redirect('professores/retrieve');

								$query = $this->Professor->get_byid($iduser)->row();

								if($this->session->flashdata('edicaook')):
									echo '<div class="alert alert-success" role="alert">'.$this->session->flashdata('edicaook').'</div>';
								endif;

								echo form_open("professores/update/$iduser",'class="form-horizontal"');
								echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>');
								echo form_label('Nome completo');
								echo form_input(array('name' => 'nome', 'class' => 'form-control'), set_value('nome', $query -> nome), 'autofocus');
								echo form_label('e-mail');
								echo form_input(array('name' => 'email', 'class' => 'form-control'), set_value('email', $query -> email), 'disabled="disabled"');
								echo form_label('Senha');
								echo form_password(array('name' => 'senha', 'class' => 'form-control'));
								echo form_label('Repita a senha');
								echo form_password(array('name' => 'senha2', 'class' => 'form-control'));
								echo str_repeat('<br/>', 1);

								echo form_submit('alterar', 'Gravar','class="btn btn-warning"');
								echo form_hidden('idprofessor', $query -> idprofessor);
								echo form_close();
								?>
						</div>
					</div>
					<div class="panel-footer">

					</div>
				</div>
			</div>

			<div id="sidebar" class="col-xs-12 col-sm-4 col-md-3">
				<!-- SIDEBAR -->
			</div>
		</div>
	</div>
</div>
<br/>
