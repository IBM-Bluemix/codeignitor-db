<?php
class pages extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
    }

    public function view($page = 'home')
    {
        if (! file_exists('/app/codeigniter/application/views/pages/' . $page . '.php'))
        {
            print("not found");
            show_404();
        }

        $data['title'] = ucfirst($page);  // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer', $data);
    }

}
?>
