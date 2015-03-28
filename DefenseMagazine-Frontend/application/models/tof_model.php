<?php

class  Tof_model extends CI_Model {

	 function upload_image($champ) {
    
      $config['upload_path'] = realpath(APPPATH . '../image_produit/thumb'); 
      $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
      $config['max_size']  = '0';
      $config['max_width']  = '0';
      $config['max_height']  = '0';
      
      $this->load->library('upload', $config);

      $configThumb = array();
      $configThumb['image_library'] = 'gd2';
      $configThumb['source_image'] = '';
      $configThumb['create_thumb'] = TRUE;
      $configThumb['maintain_ratio'] = TRUE;
      
      $configThumb['width'] = 150;
      $configThumb['height'] = 200;
    
      $this->load->library('image_lib');

     
        $upload = $this->upload->do_upload($champ);
       
		$format_image = FALSE;
		$id_tof = 0; 
       
        $data = $this->upload->data();
        
        if($data['is_image'] == 1) {
		  $format_image = TRUE;
		  
		  $configThumb['source_image'] = $data['full_path'];
          $this->image_lib->initialize($configThumb);
          $this->image_lib->resize();
        
			$insert_img = array(
					   'url_image ' => $data['file_name']
						);
	
			$this->db->insert('images', $insert_img);
			$name = $data['file_name'];
			$query = $this->db->query("SELECT * FROM images WHERE url_image = '$name'");
			$list = $query->result();
			foreach($list as $row){
			$id_tof = $row->id_image ;	
			}
		
		}
		else{
			$format_image = FALSE;
		}
		
			$image_result = array();
			$image_result['format_image']= $format_image;
			$image_result['id_tof']= $id_tof;
		
       return $image_result;
    
  }
	
	
	 function get_img($id_img){
	 	
		$query_str = "SELECT * FROM images WHERE id_image = '$id_img'";
		$query = $this->db->query($query_str);
		$list = $query->result();
		
		foreach($list as $row){
		$nom_image = $row->url_image;			
		}
		return $nom_image;
	 }


	 function get_id_img($nom_img){
	 	
		$query_str = "SELECT * FROM images WHERE url_image = '$nom_img'";
		$query = $this->db->query($query_str);
		$list = $query->result();
		
		foreach($list as $row){
		$id_image = $row->id_image;			
		}
		return $id_image;
	 }

	
	 function update_image($field,$id_img){
	 	
		
      $config['upload_path'] = realpath(APPPATH . '../image_produit/thumb'); 
      $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
      $config['max_size']  = '0';
      $config['max_width']  = '0';
      $config['max_height']  = '0';
      
      $this->load->library('upload', $config);

      $configThumb = array();
      $configThumb['image_library'] = 'gd2';
      $configThumb['source_image'] = '';
      $configThumb['create_thumb'] = TRUE;
      $configThumb['maintain_ratio'] = TRUE;
      
      $configThumb['width'] = 150;
      $configThumb['height'] = 200;
    
      $this->load->library('image_lib');

     
        $upload = $this->upload->do_upload($field);
       
		$format_image = FALSE; 
       
        $data = $this->upload->data();
        
        if($data['is_image'] == 1) {
		  $format_image = TRUE;
		  
		  $configThumb['source_image'] = $data['full_path'];
          $this->image_lib->initialize($configThumb);
          $this->image_lib->resize();
        
			$update_img = array(
					   'url_image ' => $data['file_name']
						);
			$this->db->where('id_image', $id_img);
			$this->db->update('images', $update_img); 
	
		
		}
		else{
			$format_image = FALSE;
		}
		
			$image_result = array();
			$image_result['format_image']= $format_image;
		
       return $image_result;
		
	 }

	
}



?>