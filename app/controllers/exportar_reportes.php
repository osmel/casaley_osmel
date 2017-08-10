<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Exportar_reportes extends CI_Controller {
 
    function __construct() {
        parent::__construct();
        $this->load->model('admin/modelo', 'modelo'); 
        
        

    }
    




 public function exportar()  {
        
        $this->load->library('export');

        $data['extra_search'] = ($this->input->post('extra_search'));
        $data['busqueda'] = ($this->input->post('busqueda'));
        $nombre_completo=$this->session->userdata('nombre_completo');
        
        
        // 2- ordenar por factura
        switch($data['extra_search']) {

            case "reportes_participante":
                $data['movimientos'] = $this->modelo->exportar_participantes($data);
                
                
                if ($data['movimientos']) {
                    $this->export->to_excel($data['movimientos'], 'reporte_participante_'.date("Y-m-d_H-i-s").'-'.$nombre_completo);
                }    
                
                break;

                

            case "exportar_participantes_unico":
                $data['movimientos'] = $this->modelo->exportar_participantes_unico($data);
                
                
                if ($data['movimientos']) {
                    $this->export->to_excel($data['movimientos'], 'reporte_participante_unico'.date("Y-m-d_H-i-s").'-'.$nombre_completo);
                }    
                
                break;        


            default:
        }

    }


}