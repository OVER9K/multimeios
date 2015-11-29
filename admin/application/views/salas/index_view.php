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
						<h4>Salas:</h4>
					</div>
					<div class="panel-body">
						<div class="col-xs-12 col-sm-8 col-md-6"> <!-- div para diminuir o tamanho dos inputs do form -->
							<div class="btn-group btn-group-sm" role="group" aria-label="basic-options">
								<?php echo anchor('salas/create','Novo',array('class'=>'btn btn-default','type'=>'button')); ?>
								<?php echo anchor('salas/retrieve','Listar',array('class'=>'btn btn-default','type'=>'button')); ?>
								<?php echo str_repeat('<br/>', 2); ?>
							</div>
							<?php
							if($this->session->flashdata('excluirok')):
									echo '<div class="alert alert-danger" role="alert">'.$this->session->flashdata('excluirok').'</div>';
							endif;
							?>
						</div>
					</div>						
				</div>
			</div>
		</div>

		<div id="sidebar" class="col-xs-12 col-sm-4 col-md-3">
			<!-- SIDEBAR -->
		</div>
		
	</div>
</div>