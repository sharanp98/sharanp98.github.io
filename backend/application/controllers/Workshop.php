<?php
class Workshop extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('workshop_model');
    }

    public function add_workshop(){
        $user = $this->session->userdata('user');
        if($user){
            if($user['is_admin']==1){
                $this->load->view('add_workshop');
            } else {
                echo "No permission";
            }
        } else {
            die('Please Login.');
        }
    }

    public function add_new_workshop(){
        if($this->input->post() == null){
            die('No POST Data.');
        }
        $user = $this->session->userdata('user');
        if($user){
            if($user['is_admin']==1){
                
                 $Title = $this->input->post('Title');
                 $category =(boolean) $this->input->post('category');
                 $Description = base64_encode($this->input->post('Description'));
                 $register_link = $this->input->post('registerlink');
                $config['upload_path'] = './Downloads/';
                $config['allowed_types'] = 'pdf|jpeg|png|jpg';
                $config['max_size'] = 30000;
                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('poster_file', $config)){
                    $error = array('error' => $this->upload->display_errors());
                    print_r($error);
                    die();
                } else{
                    $data = array('upload_data' => $this->upload->data());
                }
                $Poster_image=$data['upload_data']['file_name'];
                if(!$this->upload->do_upload('image_file', $config)){
                    $error = array('error' => $this->upload->display_errors());
                    print_r($error);
                    die();
                } else{
                    $data['upload_data_icon'] = $this->upload->data();
                }
                $Icon_image = $data['upload_data_icon']['file_name'];
                $workshop_data = array(
                    'Title' => $Title,
                    'Description' => $Description,
                    'Poster_image' => $Poster_image,
                    'icon' => $Icon_image,
                    'category'=> $category,
                    'register_link'=>$register_link,
                );

                $this->workshop_model->add_workshop($workshop_data);
                $data['success'] = true;
                $data['workshop'] = $workshop_data;
                $this->load->view('view_workshop', $data);

            } else {
                echo "No permission";
            }
        } else {
            die('Please Login.');
        }
    }

    public function get_workshop_data($category=null){
        if($category!=='1'&&$category!=='0'||$category===null){
            die('Parameter Error');
        }
       $result = $this->workshop_model->retrieve_results($category);
       
       echo json_encode($result);

    }

    public function display_data(){
        $user = $this->session->userdata('user');
        if($user){
            if($user['is_admin']==1){
                $result['data'] = $this->workshop_model->display_data();
                $this->load->view('display_workshops' , $result);
            } else {
                echo "No permission";
            }
        } else {
            die('Please Login.');
        }
    }
    public function deletedata(){
        $user = $this->session->userdata('user');
        if($user){
            if($user['is_admin']==1){
                $id=$this->input->get('sno');
	            $this->workshop_model->deleterecords($id);
                if($this->db->affected_rows())
                {
                    echo "Deleted";
                }
                else{
                    echo "Error Deleting";
                }
            } else {
                echo "No permission";
            }
        } else {
            die('Please Login.');
        }
    }
}
?>