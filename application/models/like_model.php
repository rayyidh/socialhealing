<?php
class Like_model extends CI_Model {

    function get_likes() {
        $query = $this->db->query('SELECT `like`.`like` 
        FROM posts
        LEFT JOIN `ci_jquery`.`likes` ON `post_id`.`id` = `like`.`post_id` ');
        return $query = $query -> result_array();

    }
    function add_likes($post_id,$likes){
        $query = $this->db->where('post_id',$post_id);
        $query = $this->db->get('posts');
        if ($query->num_rows() == 0){
            //insert
            $this->db->insert('posts',array('post_id'=>$post_id,'like'=>$likes));
        }else {
            //update
            $this->db->where('post_id',$post_id);
            $this->db->update('posts',array('like'=>$likes));
        }
        
    }
    
    
    function java_fucntions() {
        $like_function = "
         
            
            var num_likes = (parseInt($(this).next().text()) + 1);
            
            $(this).next().text(num_likes);
            var project_id = $(this).prev().text();
           
            $.ajax({
                url:window.location,
                type:'POST',
                data:{
                    id : project_id,
                    likes : num_likes,
                },success : function (msg){
                    
                }   
            });
        
        ";
        $this -> javascript -> click('.like', $like_function);
        $this -> javascript -> compile();

    }

}

/*end of file*/
