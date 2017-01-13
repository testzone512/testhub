<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery_model extends CI_Model
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
     * get_gallery_details_using_productId
     *
     * This is used to get gallery details
     *
     * @author	Nilesh dabhi
     * @access	public
     * @param   integer-$iGalleryId
     * @return void
     */
    function get_gallery_details_using_productId($productId){

        $arrData = array();

        $this->db->select('pr.product_id,pr.product_name,gl.gallery_id,gl.gallery_image,gl.gallery_status');
        $this->db->from('gallery gl');
        $this->db->join('product pr','gl.gallery_product_id = pr.product_id');
        $this->db->where('gallery_product_id', $productId);

        $objQuery = $this->db->get();

        //echo $this->db->last_query(); die;

        return $objQuery->result_array();

    }




    /**
     * update_active_inactive_gallery
     *
     * This help to update active or inactive user
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @return	void
     */
    public function update_active_inactive_gallery($Action,$GalleryId) {
        if ($Action == 'Active')
        {
            $result = $this->db->query("UPDATE gallery SET gallery_status ='0' WHERE gallery_id=$GalleryId");
        } else {
            $result = $this->db->query("UPDATE gallery SET gallery_status ='1' WHERE gallery_id=$GalleryId");
        }

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * save_gallery
     *
     * This is used to save gallery details
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @param   array-$arrData
     * @return void
     */
    function save_gallery($arrData){

        if($this->db->insert('gallery', $arrData)){
            return true;
        }else{
            return false;
        }

    }


    /**
     * get_gallery_details_using_galleryId
     *
     * This is used to get gallery details
     *
     * @author	Nilesh dabhi
     * @access	public
     * @param   integer-$iGalleryId
     * @return void
     */
    function get_gallery_details_using_galleryId($galleryId){

        $arrData = array();

        $this->db->select('*');
        $this->db->from('gallery');
        $this->db->where('gallery_id', $galleryId);

        $objQuery = $this->db->get();

        //echo $this->db->last_query(); die;

        return $objQuery->result_array();

    }

    /**
     * update_gallery
     *
     * This is used to update gallery details
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @param   array-$arrData, integer-$iGalleryId
     * @return void
     */
    function update_gallery($galleryId,$UpdateData){

        $this->db->where('gallery_id',$galleryId);

        if($this->db->update('gallery', $UpdateData))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * delete_gallery
     *
     * This is used to delete gallery
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @param   integer-$surfaceId
     * @return void
     */
    function delete_gallery($galleryId){

        // $this->db->where('surfaceId',$surfaceId);
        if($this->db->delete('gallery', array('gallery_id' => $galleryId)))
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