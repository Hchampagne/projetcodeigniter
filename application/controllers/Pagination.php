	
<?php defined('BASEPATH') or exit('No direct script access allowed');

class Pagination extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $config = array();
        $config["base_url"] = site_url()."/pagination";   
        $config["total_rows"] = $this->pagination_model->get_counter();
        $config["per_page"] = 5;
        $config["uri_segment"] = 2;
       
        $config['use_page_number'] = true;
      
        $config['first_link'] = false;     
        $config['last_link'] = false;     
        $config['attributes'] = array('class'=>'btn btn-outline-primary','role'=>'button');
        $config['next_link'] = false;  
        $config['prev_link'] = false;   
        $config['cur_tag_open'] = '<a href="" class="btn btn-outline-primary" role="bouton">';
        $config['cur_tag_close'] = '</a>';

        $config['num_links'] = 10;

        
        
        $this->pagination->initialize($config);      
        $data["links"] = $this->pagination->create_links();      
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data['pagination'] = $this->pagination_model->get_prod($config["per_page"], $page);
        $this->load->view('paginations/index', $data);
    }
}
