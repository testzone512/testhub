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
     * @author	Nilesh dabhi
     * @access	public
     * @param   integer-$iGalleryId
     * @return void
     */
    function get_blog_details($blogId = 0){

        $arrData = array();

        $this->db->select('*');
        $this->db->from('blog');
		if($blogId != 0)
        $this->db->where('blog_id', $blogId);

        $objQuery = $this->db->get();
        return $objQuery->result_array();

    }

    /**
     * save_blog
     *
     * This is used to save blog details
     *
     * @author	Chintan Bhimani
     * @access	public
     * @param   array-$arrData
     * @return void
     */
    function save_blog($arrData){

        if($this->db->insert('blog', $arrData)){
            return true;
        }else{
            return false;
        }

    }

    /**
     * update_blog
     *
     * This is used to update blog details
     *
     * @author	Chintan Bhimani
     * @access	public
     * @param   array-$UpdateData, integer-$blogId
     * @return void
     */
    function update_blog($blogId,$UpdateData){

        $this->db->where('blog_id',$blogId);

        if($this->db->update('blog', $UpdateData))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * delete_blog
     *
     * This is used to delete blog
     *
     * @author	Chintan Bhimani
     * @access	public
     * @param   integer-$blogId
     * @return void
     */
    function delete_blog($blogId){

        // $this->db->where('surfaceId',$surfaceId);
        if($this->db->delete('blog', array('blog_id' => $blogId)))
        {
            return true;
        }
        else
        {
            return false;
        }
    }






}
?>