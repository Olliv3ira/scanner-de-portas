<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Scanner extends CI_Controller {

    private $group, $port, $ip, $template, $result;
    
    public function index()
    {
        $this->load->helper('html');
        $this->load->model('scannermodel');
        $data['groups'] = $this->scannermodel->getGroups();
        $data['ipaddress'] = Scanner::getIp();
        $this->load->view('template/header');
	    $this->load->view('scanner', $data);
        $this->load->view('template/footer');
    }

    public function getIp()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
        {     
            $this->ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        {
            $this->ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else
        {
            $this->ip = $_SERVER['REMOTE_ADDR'];
        }     
        
        return $this->ip;
    }
    
    public function getPortVerification()
    {        
        $this->ip = $this->input->get_post('ip', TRUE);
        $this->port = $this->input->get_post('port', TRUE);

        if(empty($this->port) || !\is_numeric($this->port))
        {
            show_404();
        }
        elseif(empty($this->ip))
        {
            show_404();
        }
        else
        {
            $fp = @fsockopen ($this->ip, $this->port, $errno, $errstr,10);
            if($fp) 
            {
                if($errno)
                {
                    print('Error: '.$errno);
                }
                else
                {
                    print('<font color="red">Aberta</font>');
                }
            }
            else 
            {
                print('<font color="green">Ok</font>');              
            }
		}
	}
    
    public function getPortsGroup()
    {
        $this->group = $this->input->get_post('group', TRUE);
        
        if(empty($this->group) || !\is_numeric($this->group))
        {
            show_404();
        }
        else
        {
            $this->load->model('scannermodel');
            $this->result = $this->scannermodel->getPortsGroup($this->group);

            foreach ($this->result AS $item)
            {
                $this->template = '<tr>';
                $this->template .= '<td><input type="checkbox" name="checkbox" class="checkbox" port-number="'.$item->PORTA.'"></td>';
                $this->template .= '<td style="text-center">'.$item->PORTA.'</td>';
                $this->template .= '<td>'.$item->PROTOCOLO.'</td>';
                $this->template .= '<td>'.$item->SERVICO.'</td>';
                $this->template .= '<td>'.$item->DESCRICAO.'</td>';
                $this->template .= '<td id="status'.$item->PORTA.'" class="text-center">---</td>';
                $this->template .= '</tr>';
                
                echo $this->template;
            }            
        }
    }
    
    
}
