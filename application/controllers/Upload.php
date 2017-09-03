<?php
    class Upload extends CI_Controller {
        public function __construct() {
            parent::__construct();

            // 检查用户是否登录
            $sta = $this->session->userdata('user');
            if (!isset($sta) ){
                redirect('login/login_real');
            }
            // 载入模型
            $this->load->model('upload_model');
            $this->load->model("news_model");
            // 载入CI资源
            $this->load->library('form_validation');
        }
        
        public function index() {
            $data = $this->fetch_from_sessions();

            // 若sessions中没有信息或处于基本信息页面，初始化data
            if ($data['status'] == NULL || $data['status'] == 'baseinfos') {
                $data = $this->new_page($data);
            }

            // 上传课程的基本信息
            if ($data['status'] == 'baseinfos' && $this->input->post('article') !== NULL) {
                $data = $this->upload_baseinfos($data);
            }

            // 上传章节资料
            if ($data['status'] == 'chapters') {
                $data['upload_err'] = '';
            }
            if ($data['status'] == 'chapters' && $this->input->post('uploadchapter') !== NULL) {
                $data = $this->upload_files($data, 0);
            }

            // 结束本次上传
            if ($data['status'] == 'chapters' && $this->input->post('gofinish') !== NULL) {
                $data['status'] = 'finish';
            }

            // 完成上传
            if ($data['status'] == 'finish' && $this->input->post('finish') !== NULL) {
                $this->destory_sessions();
                $data = $this->new_page();
            }

            // 最后，保存更改后的sessions
            $this->save_to_sessions($data);

            $sta = $this->session->userdata('user');
            if (!isset($sta) ){
                redirect('login/login_real');
            }
            $data["usr"] = $sta;

            $this->load->view("upload/top",$data);
            $this->load->view("upload/mid",$data);
            $this->load->view("upload/foot");

        }

        // 从sessions中读取数据
        private function fetch_from_sessions() {
            $data['article']  = $this->session->userdata('article');
            $data['records']  = $this->session->userdata('records');
            $data['status']   = $this->session->userdata('status');
            $data['catnames'] = $this->session->userdata('catnames');
            return $data;
        }

        // 将数据保存到sessions中
        private function save_to_sessions($data) {
            $this->session->set_userdata('article',  $data['article']);
            $this->session->set_userdata('records',  $data['records']);
            $this->session->set_userdata('status',   $data['status']);
            $this->session->set_userdata('catnames', $data['catnames']);
        }

        // 新的页面，初始化数据
        private function new_page($data = array()) {
            $data['article'] = NULL;
            $data['cats']    = $this->upload_model->get_categories();
            $data['records'] = array();
            $data['status']  = 'baseinfos';
            
            $data['catnames'] = array(array(), array());
            foreach($data['cats'][0] as $cat) {
                $data['catnames'][0][$cat['category_id']] = $cat['category_name'];
            }
            foreach($data['cats'][1] as $cat) {
                $data['catnames'][1][$cat['category_id']] = $cat['category_name'];
            }
            return $data;
        }

        // 上传基本信息
        private function upload_baseinfos($data) {
            $success = TRUE;

            // 文字信息验证
            $this->form_validation->set_rules('name', '课程名称',  'required');
            $this->form_validation->set_rules('cat1', '课程分类1', 'required|is_natural');
            $this->form_validation->set_rules('cat2', '课程分类2', 'required|is_natural');
            $this->form_validation->set_rules('text', '课程简介',  'required');
            if (!$this->form_validation->run()) {  $success = FALSE;  }

            // 封面图片上传
            $config = array(
                'upload_path'   => './images/covers/',
                'allowed_types' => 'gif|jpg|png',
                'max_size'      => 512,
                'encrypt_name'  => TRUE
            );
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('img')) {
                $data['imgerr'] = $this->upload->display_errors();
                $success        = FALSE;
            } else {
                $imgdata        = $this->upload->data();
                $imgpath        = './images/covers/'.$imgdata['file_name'];
                if (!$success) {  unlink($imgpath);  }
            }

            // 数据正确，插入数据库
            if ($success) {
                $data['article']           = array();
                $data['article']['id']     = NULL;
                $data['article']['name']   = $this->input->post('name');
                $data['article']['cat1']   = $data['catnames'][0][$this->input->post('cat1')];
                $data['article']['cat2']   = $data['catnames'][1][$this->input->post('cat2')];
                $data['article']['cat1no'] = $this->input->post('cat1');
                $data['article']['cat2no'] = $this->input->post('cat2');
                $data['article']['text']   = $this->input->post('text');
                $data['article']['img']    = $imgpath;
                $data['article']['id']     = $this->upload_model->add_article($data['article']);
                $data['status']            = 'chapters';
            }

            return $data;
        }

        // 资料上传
        private function upload_files($data, $type = 0) {
            $file = array(
                'aid'               => $data['article']['id'], 
                'fname'             => '', 
                'fpath'             => '', 
                'rname'             => ''
            );

            // 资料名称验证
            $this->form_validation->set_rules('fname', '资料标题', 'required');
            if (!$this->form_validation->run()) {
                $data['upload_err'] .= validation_errors();
            } else {
                $file['fname']       = $this->input->post('fname');
            }

            // 资料文件上传验证
            $config = array(
                'upload_path'       => './resources/',
                'allowed_types'     => 'pdf|ppt|pptx|doc|docx|txt',
                'path_encoding'     => 'GB2312'
            );
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('fpath')) {
                $data['upload_err'] .= $this->upload->display_errors();
            } else {
                $fdata               = $this->upload->data();
                $file['rname']       = $fdata['client_name'];
                $file['fpath']       = './resources/'.$fdata['file_name'];
                if ($data['upload_err'] !== '') { unlink(mb_convert_encoding($file['fpath'], 'GB2312', 'UTF-8')); }
            }

            // 数据正确，插入数据库
            if ($data['upload_err'] === '') {
                $this->upload_model->add_chapter($file);
                $data['records'][]   = $file;
            }

            return $data;
        }

        // 销毁保存在sessions中的数据
        private function destory_sessions() {
            $unset_sessions = array(
                'article', 'records', 'maxcid', 'status', 'catnames', 'cats'
            );
            $this->session->unset_userdata($unset_sessions);
        }

    }
?>