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

$this->load->view('template/header');
$this->load->view($controller . '/' . $page . '_view');
$this->load->view('template/footer');
