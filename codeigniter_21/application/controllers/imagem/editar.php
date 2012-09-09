<?php
class Editar extends CI_Controller{
    
    function __construct(){
        parent::__construct();
        
        $this->load->model('imagem/editar_model');
    }
    
    public function index($id = 0){
        $data = array(
            'page_title' => 'Editar imagem',
            'content_title' => 'Editar imagem'
        );
        $data['multiple_images'] = false;
        $data['message'] = "";
        $data['form_values'] = "";
        $data['produtos'] = $this->editar_model->getProdutos();
        
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('produto_id', 'Produto', 'required');
        $this->form_validation->set_rules('sufixo', 'Sufixo', 'required');
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
        
        if ($this->form_validation->run()):
            
            if(count($_FILES) > 0): // Se tiver alguma imagem e alguém não burlou a validação JS - STeV
                $img_name = $this->_uploadImage('img_file');
            else:
                $this->session->set_flashdata('message', "Nenhuma imagem selecionada.");
            endif;
            
            if($this->editar_model->editarImagem($id, $img_name)) $this->session->set_flashdata('message', "Imagem editada com sucesso");
            redirect(current_url());
        endif;
        
        $data['message'] = $this->session->flashdata('message');
        $data['form_values'] = ($id > 0)?$this->editar_model->getImagem($id):''; // Deve ficar depois do evento de edição - STeV
        
        $this->load->view('templates/header', $data);
        $this->load->view('imagem/form_view', $data);
        $this->load->view('templates/footer');
    }
    private function _uploadImage($input_name){
        // Fazer o upload da imagem - STeV
        if($_FILES[$input_name]['error'] == 0):
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['encrypt_name'] = true;
            
            $this->load->library('upload',$config);

            if (!$this->upload->do_upload($input_name)):
                $this->session->set_flashdata('message', $this->upload->display_errors('<p class="error">', '</p>'));
                return false;
            else:
                return $this->_resizeImage();
            endif;
        endif;
    }
    
    private function _resizeImage(){
        // Fazer o resize da imagem - STeV
        $config['image_library'] = 'gd2';
        $config['source_image']	= $this->upload->upload_path.$this->upload->file_name;
//                $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = false;
        $config['width'] = 450;
        $config['height'] = 300;

        $this->load->library('image_lib', $config);

        if (!$this->image_lib->resize()):
            $this->session->set_flashdata('message', $this->image_lib->display_errors('<p class="error">', '</p>'));
            return false;
        else:
            $this->image_lib->clear(); // Limpar class - STeV
            return $this->upload->file_name;
        endif;
    }
    
    function item($id = 0){
        // Route scapes - STeV
        $this->index($id);
    }
}
?>
