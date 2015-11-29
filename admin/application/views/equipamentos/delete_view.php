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
						<h4>Excluir equipamento:</h4>
					</div>
					<div class="panel-body">
						<div class="col-xs-12 col-sm-8 col-md-6"> <!-- div para diminuir o tamanho dos inputs do form -->
							<div class="btn-group btn-group-sm" role="group" aria-label="basic-options">
								<?php echo anchor('equipamentos/create', 'Novo', array('class' => 'btn btn-default', 'type' => 'button')); ?>
								<?php echo anchor('equipamentos/retrieve', 'Listar', array('class' => 'btn btn-default', 'type' => 'button')); ?>
								<?php echo str_repeat('<br/>', 2); ?>
							</div>
								<?php
								$iduser = $this->uri->segment(3);
								if($iduser==NULL)
									redirect('equipamentos/retrieve');

								$query = $this->Equipamento->get_byid($iduser)->row();

								echo form_open("equipamentos/delete/$iduser",'class="form-horizontal"');
								echo form_label('Descrição');
								echo form_input(array('name' => 'descricaoequipamento', 'value' => $query->descricaoequipamento, 'class' => 'form-control'), 'disabled="disabled"');
								echo form_label('Data da compra');
								echo form_input(array('name' => 'datacompra', 'value' => $query->datacompra, 'class' => 'data form-control'),'disabled="disabled"');
								echo form_label('Modelo');
								echo form_input(array('name' => 'modelo','value'=> $query->modelo, 'class' => 'form-control'),'disabled="disabled"');
								echo form_label('Categoria');
								echo '<select name="fk_idcategoria" class="form-control" disabled="disabled">';
									foreach ($select as $linha){
										if($linha->idcategoria == $query->fk_idcategoria){
											echo '<option value="'.$linha->idcategoria.'" selected>'.$linha->descricaocategoria.'</option>';
											break;
										}
									}
								echo '</select>';

								echo str_repeat('<br/>', 1);
								echo form_hidden('idequipamento',$query->idequipamento);
								echo form_submit('excluir', 'Excluir','class="btn btn-danger"');
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
