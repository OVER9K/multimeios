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

if ( ! defined('BASEPATH'))
	exit('No direct script access allowed');

class Reserva extends CI_Model{

  public function getDisciplina($idprofessor=0){
    if($idprofessor > 0){
      $this->db->select('*');
      $this->db->from('disciplina');
      $this->db->where('fk_idprofessor',$idprofessor);
      return $this->db->get();
    }
  }

	public function getCategoria(){
		$this->db->select('*');
		$this->db->from('categoria');
		return $this->db->get();
	}

	public function getSala(){
		$this->db->select('*');
		$this->db->from('sala');
		return $this->db->get();
	}

	public function getEquipamento_byCategoria($categoria = NULL){
		if ($categoria != NULL){
			$this->db->where('fk_idcategoria',$categoria);
			return $this->db->get('equipamento');
		}else{
			return FALSE;
		}
	}

	public function getEquipamento_byId($equipamento = NULL){
		if ($categoria != NULL){
			$this->db->where('idequipamento',$equipamento);
			return $this->db->get('equipamento');
		}else{
			return FALSE;
		}
	}

	public function verificaReservado($idequipamento, $dados){
		//query = "SELECT reserva.horainicio, reserva.datareserva, reserva.periodo, reservaequipamento.fk_idequipamento
		//FROM reserva, reservaequipamento WHERE reserva.horainicio = $ AND reserva.datareserva = $ AND reserva.periodo = $ AND
		//reservaequipamento.fk_idequipamento = $ AND reservaequipamento.fk_idreserva = reserva.idreserva";

		$this->db->select('reserva.idreserva');
		$this->db->from('reserva','reservaequipamento');
		$this->db->where('reserva.horainicio',$dados['horainicio']);
		$this->db->where('reserva.datareserva',$dados['datareserva']);
		$this->db->where('reserva.periodo',$dados['periodo']);
		$this->db->where('reservaequipamento.fk_idequipamento',$idequipamento);
		$this->db->where('reservaequipamento.fk_idreserva','reserva.idreserva');
		return $this->db->get();
	}

	public function do_insert($dados, $disponiveis){//como pegar o ID da 'reserva' pra inserir na 'reservaequipamento'
		if ($dados != NULL and $disponiveis != NULL) {
			$this->db->insert('reserva',$dados);
			foreach ($disponiveis as $equipamento) {
				$this->db->insert('reservaequipamento',$equipamento);
			}
			$this->session->set_flashdata('cadastrook','Cadastro efetuado com sucesso');
			redirect('categorias/create');
		}
	}
}
