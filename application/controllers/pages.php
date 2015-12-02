<?php
class pages extends CI_Controller {

    public function view($page = 'home')
    {
        if (! file_exists('/app/codeigniter/application/views/pages/' . $page . '.php'))
        {
            print("not found");
            show_404();
        }

        $data['title'] = ucfirst($page);  // Capitalize the first letter

        $this->load->view('templates/header', $data);

        $twilio = $this->config->item('twilio');

        if(empty($twilio['sid']) || empty($twilio['secret']))
            $this->load->view('pages/credentials', $data );
        else
            $this->load->view('pages/' . $page, $data);

        $this->load->view('templates/footer', $data);
    }

}
?>
