<?php
    class Upload_model extends CI_Model {
        
        // 获取分类名称和编码
        public function get_categories() {
            $cats = array();
            $query = $this->db->get('category');
            $cats[0] = $query->result_array();
            $query = $this->db->get('category2');
            $cats[1] = $query->result_array();
            return $cats;
        }

        // 插入文章（课程）
        public function add_article($article) {
            // 插入数据
            $time = date('Y-m-d H:i:s');
            $data = array(
                'name'      => $article['name'],
                'author'    => $this->session->userdata('user'),
                'http'      => $article['img'],
                'date'      => $time,
                'category1' => $article['cat1no'],
                'category2' => $article['cat2no'],
                'category3' => '1',
                'text'      => $article['text']
            );
            $this->db->insert('article', $data);
            // 获取插入数据的id
            $this->db->select('id');
            $query = $this->db->get_where('article', $data);
            $res = $query->result_array();
            return $res[0]['id'];
        }

        // 插入章节
        public function add_chapter($chapter) {
            for ($i = 1; $i <= 3; $i++) {
                if ($chapter['file'.$i] != '') {
                    $chapter['file'.$i] = './resources/'.$chapter['file'.$i];
                }
            }
            $this->db->insert('resources', $chapter);
        }

        public function get_resource($id,$type){
                $query = $this->db->get_where("resources",array("article_id"=>$id,"type"=>$type));
                return $query->result_array();
        }
    }
?>