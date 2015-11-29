<!--
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


-->

<nav>
	<ul class="sf-menu" id="nav">
		<li class="selected">
			<?php echo anchor('views/home', 'Página Inicial'); ?>
		</li>
		<li>
			<a href="#">Cadastro</a>
			<ul>
				<li>
					<?php echo anchor('cprofessor', 'Professor'); ?>
				</li>
				<li>
					<?php echo anchor('cdisciplina', 'Disciplina'); ?>
				</li>
				<li>
					<?php echo anchor('chorario', 'Horario'); ?>
				</li>
				<li>
					<?php echo anchor('csala', 'Sala'); ?>
				</li>
				<li>
					<?php echo anchor('cequipamento', 'Equipamento'); ?>
				</li>
				<li>
					<?php echo anchor('ccategoria', 'Categoria'); ?>
				</li>
			</ul>
		</li>
		<li>
			<?php echo anchor('cReserva', 'Reserva'); ?>
		</li>
		<li>
			<?php echo anchor('cgerencial', 'Gerencial'); ?>
		</li>
	</ul>
</nav>
</header>