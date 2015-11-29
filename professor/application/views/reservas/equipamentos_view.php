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
              foreach ($equipamentos as $checkbox){
          			echo "<br/>".$checkbox;
              }

              echo "<br/>".$datareserva;
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="sidebar" class="col-xs-12 col-sm-4 col-md-5">

    </div>

  </div>
</div>
