<?php

/*
 *
			Copyright 2015 João Rodolfo da Silva Paiva

	This file is part of E-RESERVAS.

    E-RESERVAS is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    E-RESERVAS is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with E-RESERVAS.  If not, see <http://www.gnu.org/licenses/>.

 *
 */
?>
<div class="wrapper" role="main">
	<div class="container">
		<div class="row">
			<div id="conteudo" class="col-xs-12 col-sm-8 col-md-9">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4>Nova Reserva:</h4>
					</div>
					<div class="panel-body">
						<div class="col-xs-12 col-sm-8 col-md-7"> <!-- div para diminuir o tamanho dos inputs do form -->
							<div class="btn-group btn-group-sm" role="group" aria-label="basic-options">
								<?php echo anchor('Reservas/create','Nova',array('class'=>'btn btn-default','type'=>'button')); ?>
								<?php echo anchor('Reservas/retrieve','Histórico',array('class'=>'btn btn-default','type'=>'button')); ?>
								<?php echo str_repeat('<br/>', 3); ?>
							</div>
							<?php
							if($this->session->flashdata('reservaok')){
								echo '<div class="alert alert-success" role="alert">'.$this->session->flashdata('cadastrook').'</div>';
							}elseif ($this->session->flashdata('indisponivel')) {
								echo '<div class="alert alert-danger" role="alert">'.$this->session->flashdata('indisponivel').'</div>';
							}
							echo form_open('Reservas/create', 'class="form-horizontal"');
							echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>');?>
								<div class="form-group">
									<label class="control-label col-sm-2" for="periodo">Disciplina:</label>
									<div class="col-sm-8 col-md-offset-1">
										<?php
										echo '<select name="iddisciplina" class="form-control">';
											foreach ($selectDisciplina as $linha){
												echo '<option value="'.$linha->iddisciplina.'">'.$linha->descricaodisciplina.'</option>';
											}
										echo '</select>';
										?>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-2" for="periodo">Sala:</label>
									<div class="col-sm-8 col-md-offset-1">
										<?php
										echo '<select name="idsala" class="form-control">';
											foreach ($selectSala as $linha){
												echo '<option value="'.$linha->idsala.'">'.$linha->descricaosala.' (Bloco '.$linha->bloco.')'.'</option>';
											}
										echo '</select>';
										?>
									</div>
								</div>
  							<div class="form-group">
    								<label class="control-label col-sm-2" for="datadareserva">Data:</label>
    								<div class="col-sm-8 col-md-offset-1">
      								<input type="date" class="form-control" name="datadareserva" min="<?php echo $dateMin ?>" max="<?php echo $dateMax ?>" required/>
    								</div>
								</div>
  							<div class="form-group">
    								<label class="control-label col-sm-2" for="horainicio">Horário:</label>
    								<div class="col-sm-8 col-md-offset-1">
											<select class="form-control" name="horainicio">
  											<option value="1">Primeiro até Segundo</option>
												<option value="2">Primeiro até Quarto</option>
  											<option value="3">Terceiro até Quarto</option>
											</select>
    								</div>
  							</div>
								<div class="form-group">
    								<label class="control-label col-sm-2" for="periodo">Periodo:</label>
    								<div class="col-sm-8 col-md-offset-1">
											<select class="form-control" name="periodo">
  											<option value="1">Matutino</option>
												<option value="2">Vespertino</option>
  											<option value="3">Noturno</option>
											</select>
    								</div>
  							</div>
								<div class="form-group">
		    						<label class="control-label col-sm-2" for="equipamentodareserva">Equipamento(s):</label>
		    						<div class="col-sm-8 col-md-offset-2">
											<?php
											foreach ($checkboxCategoria as $checkbox){
												echo '<div class="checkbox">';
												echo '<label><input type="checkbox" name="categoria[]" id="categoria" value="'.$checkbox->idcategoria.'">'.$checkbox->descricaocategoria.'</label>';
												echo '</div>';
											}
											?>
		    						</div>
		  					</div>
		  					<div class="form-group">
		    						<div class="col-sm-offset-2 col-sm-10">
		      						<button type="submit" class="btn btn-primary">OK</button>
		    						</div>
		  					</div>
								<?php echo form_close(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="sidebar" class="col-xs-12 col-sm-4 col-md-5">
			<a href="#demo" class="btn btn-info" data-toggle="collapse">REGRAS</a>
  		<div id="demo" class="collapse">
				<div class="well">
					<p>1. A reserva deve ser feita com no mínimo 2 dias de antecedencia.</p>
					<p>2. A reserva só pode ser feita para no máximo 2 semanas seguintes.</p>
				</div>
			</div>
		</div>

	</div>
</div>
