<? defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model("layanan_model");
        $this->load->library('form_validation');
    }

    public function index(){
        $data["layanan"] = $this->layanan_model->getAll();
        $this->load->view("admin/layanan/list", $data);
    }

    public function add(){
        $layanan = $this->layanan_model;
        $validation = $this->form_validation;
        $validation->set_rules($layanan->rules());

        if ($validation->run()) {
            $layanan->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $this->load->view("admin/layanan/new_form");
    }

    public function edit($id = null){
        if (!isset($id)) redirect('admin/layanan');

        $layanan = $this->layanan_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["layanan"] = $layanan->getById($id);
        if (!$data["layanan"]) show_404();

        $this->load->view("admin/layanan/edit_form", $data);
    }

    public function delete($id=null){
        if (!isset($id)) show_404();

        if ($this->layanan_model->delete($id)) {
            redirect(site_url('admin/layanan'));
        }
    }
}
?>