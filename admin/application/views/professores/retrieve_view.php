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
					<?php
					if($this->session->flashdata('excluirok')):
							echo '<p>'.$this->session->flashdata('excluirok').'</p>';
					endif;
					?>
					<div class="panel-heading"><h4>Lista de professores:</h4></div>
					<div class="panel-body">
						<div class="btn-group btn-group-sm" role="group" aria-label="basic-options">
							<?php echo anchor('professores/create','Novo',array('class'=>'btn btn-default','type'=>'button')); ?>
							<?php echo anchor('professores/retrieve','Listar',array('class'=>'btn btn-default','type'=>'button')); ?>
						</div>
					</div>
					
					<?php
					if($query == null){
						?>						
						<div class="alert alert-info" role="alert">
							<strong>Ops!</strong>
							Nenhum registro encontrado, para começar a cadastrar clique em 'Novo'.
						</div><?php
					}else{
						?><div class="table-responsive"><?php
					//tabela com os professores
					$template = array(
        				'table_open' => '<table class="table">'
					);
					
					$this->table->set_template($template);

					
						$this->table->set_heading('#', 'Nome', 'e-mail','Operações');
						foreach ($query as $linha):
							$this->table->add_row(
								$linha->idprofessor,
								$linha->nome,$linha->email,
								anchor("professores/update/$linha->idprofessor",'<span class="glyphicon glyphicon-pencil"></span>').
								' - '.anchor("professores/delete/$linha->idprofessor",'<span class="glyphicon glyphicon-remove"></span>')
								);
						endforeach;
						echo $this->table->generate();
						?></div><?php
					}
					?>
					
					<div class="panel-footer">
						<?php if($paginacao) echo $paginacao; ?>
					</div>		
				</div>
			</div>
		</div>
				
		<div id="sidebar" class="col-xs-12 col-sm-4 col-md-3">
					<!-- SIDEBAR -->
		</div>
	</div>
</div>
