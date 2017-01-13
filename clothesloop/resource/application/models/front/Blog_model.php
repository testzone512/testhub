<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database('default');
        $this->load->library('session');
        date_default_timezone_set("Asia/Kolkata");

        // Call the Model constructor
        parent::__construct();
    }



    /**
     * get_blog_details
     *
     * This is used to get blog details
     *
     * @author	Chintan Bhimani
     * @access	public
     * @param   integer-$blogId
     * @return void
     */
    function get_front_blog_details($blogId = 0){

        $arrData = array();

        $this->db->select('*');
        $this->db->from('blog');
		if($blogId != 0)
        $this->db->where('blog_id', $blogId);
        $this->db->order_by('blog_created_on','DESC');
        $this->db->limit(6);

        $objQuery = $this->db->get();
        return $objQuery->result_array();

    }


}
?>