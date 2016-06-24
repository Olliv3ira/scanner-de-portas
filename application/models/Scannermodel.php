<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Scannermodel extends CI_Model
{
    public function getGroups()
    {
        $this->db->select('ID, NOME AS GRUPO');
        $this->db->from('grupo');
        $this->db->where('STATUS', 1);
        $query = $this->db->get();
        return $query->result();
    }
    public function getPortsGroup($id)
    {
        //Faz a seleção das colunas e altera seus respectivos nomes de acordo com a necessidade
        $this->db->select('porta.NUMERO AS PORTA, protocolo.NOME AS PROTOCOLO, SERVICO, DESCRICAO');
        $this->db->from('registro');
        $this->db->join('porta', 'registro.PORTAID=porta.ID');
        $this->db->join('protocolo', 'porta.PROTOCOLOID=protocolo.ID');
        $this->db->join('grupo', 'registro.GRUPOID=grupo.ID');
        $this->db->where('grupo.ID', $id);
        $this->db->order_by('porta.NUMERO ASC');
        $query = $this->db->get();
        return $query->result();
    }
}

