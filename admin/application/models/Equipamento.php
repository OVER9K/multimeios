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

class Equipamento extends CI_Model{
	public function do_insert($dados=NULL){
		if($dados!=NULL):
			$this->db->insert('equipamento',$dados);
			$this->session->set_flashdata('cadastrook','Cadastro efetuado com sucesso');
			redirect('equipamentos/create');
		endif;
	}
	
	public function do_update($dados=NULL, $condicao=NULL){
		if($dados!=NULL && $condicao!=NULL):
			$this->db->update('equipamento',$dados,$condicao);
			$this->session->set_flashdata('edicaook','Cadastro alterado com sucesso');
			redirect(current_url());
		endif;
	}
	
	public function do_delete($condicao=NULL){
		if($condicao!=NULL):
			$this->db->delete('equipamento',$condicao);
			$this->session->set_flashdata('excluirok','Registro deletado com sucesso');
			redirect('equipamentos');
		endif;
	}
	
	public function get_all($quantidade=0, $inicio=0){
		if($quantidade > 0) $this->db->limit($quantidade, $inicio);
		
		$this->db->select('equipamento.idequipamento, equipamento.descricaoequipamento,equipamento.datacompra, equipamento.modelo, categoria.descricaocategoria');
		$this->db->from('equipamento');
		$this->db->join('categoria', 'equipamento.fk_idcategoria = categoria.idcategoria');
		return $this->db->get();
	}
	
	public function get_byid($id=NULL){
		if ($id!=NULL) :
			$this->db->where('idequipamento',$id);
			$this->db->limit(1);
			return $this->db->get('equipamento');
		else :
			return FALSE;
		endif;
		
	}
}