	
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
        $config["base_url"] = site_url() . "/pagination";
        $config["total_rows"] = $this->pagination_model->get_counter();
        $config["per_page"] = 7;
        $config["uri_segment"] = 2;


        //$config['full_tag_open'] = '<ul class="pagination">';
        //$config['full_tag_close'] = '</ul>';

        $config['use_page_numbers'] = TRUE;

        $config['first_link'] = false;
        //$config['first_tag_open'] = '';
        //$config['first_tag_close'] = '';

        $config['last_link'] = false;
        //$config['last_tag_open'] = '';
        //$config['last_tag_close'] = '';


        $config['next_link'] = 'Suivant';
        //$config['next_tag_open'] = '';
        //$config['next_tag_close'] = '';

        $config['prev_link'] = 'Précédent';
        //config['prev_tag_open'] = '<li class="prev page">';
        //$config['prev_tag_close'] = '</li>';

        //$config['cur_tag_open'] = '<span href="">';
        //$config['cur_tag_close'] = '</span>';

        //$config['num_tag_open'] = '<li class="page">';
        //$config['num_tag_close'] = '</li>';

        $config['display_pages'] = FALSE;

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();
        $data['pagination'] = $this->pagination_model->get_prod($config["per_page"], $page);

        $this->load->view('paginations/index', $data);
    }
}
