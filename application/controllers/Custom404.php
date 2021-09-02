<?php
class Custom404 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // $this->output->set_status_header('404');
        $data = array();
        $data['heading'] = '404';
        $data['message'] = 'custom404view'; // View name
        $this->load->view('errors/html/error_404', $data);
    }
}
?>