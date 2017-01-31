<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testimonial_model extends CI_Model
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
     * get_testimonial_details
     *
     * This is used to get Testimonial details
     *
     * @author	Chintan Bhimani
     * @access	public
     * @param   integer-$testimonialId
     * @return void
     */
    function get_testimonial_details($testimonialId = 0){

        $this->db->select('*');
        $this->db->from('testimonial');
        if($testimonialId != 0)
            $this->db->where('testimonial_id',$testimonialId);
        $objQuery = $this->db->get();
        return $objQuery->result_array();

    }

    /**
     * save_testimonial
     *
     * This is used to save Testimonial details
     *
     * @author	Chintan Bhimani
     * @access	public
     * @param   array-$arrData
     * @return void
     */
    function save_testimonial($arrData){

        if($this->db->insert('testimonial', $arrData)){
            return true;
        }else{
            return false;
        }

    }

    
    /**
     * update_testimonial
     *
     * This is used to update Testimonial details
     *
     * @author	Chintan Bhimani
     * @access	public
     * @param   array-$arrData, integer-$testimonialId
     * @return void
     */
    function update_testimonial($testimonialId,$UpdateData){

        $this->db->where('testimonial_id',$testimonialId);

        if($this->db->update('testimonial', $UpdateData))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * delete_testimonial
     *
     * This is used to delete Testimonial
     *
     * @author	Chintan Bhimani
     * @access	public
     * @param   integer-$testimonialId
     * @return void
     */
    function delete_testimonial($testimonialId){

        // $this->db->where('surfaceId',$surfaceId);
        if($this->db->delete('testimonial', array('testimonial_id' => $testimonialId)))
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