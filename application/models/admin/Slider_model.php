<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slider_model extends CI_Model
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
     * get_slider_details
     *
     * This is used to get Slider details
     *
     * @author	Chintan Bhimani
     * @access	public
     * @param   integer-$sliderId
     * @return void
     */
    function get_slider_details($sliderId = 0){

        $this->db->select('*');
        $this->db->from('slider');
        if($sliderId != 0)
            $this->db->where('slider_id',$sliderId);
        $objQuery = $this->db->get();
        return $objQuery->result_array();

    }

    /**
     * save_slider
     *
     * This is used to save Slider details
     *
     * @author	Chintan Bhimani
     * @access	public
     * @param   array-$arrData
     * @return void
     */
    function save_slider($arrData){

        if($this->db->insert('slider', $arrData)){
            return true;
        }else{
            return false;
        }

    }

    
    /**
     * update_slider
     *
     * This is used to update slider details
     *
     * @author	Chintan Bhimani
     * @access	public
     * @param   array-$arrData, integer-$sliderId
     * @return void
     */
    function update_slider($sliderId,$UpdateData){

        $this->db->where('slider_id',$sliderId);

        if($this->db->update('slider', $UpdateData))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * delete_slider
     *
     * This is used to delete Slider
     *
     * @author	Chintan Bhimani
     * @access	public
     * @param   integer-$sliderId
     * @return void
     */
    function delete_slider($sliderId){

        // $this->db->where('surfaceId',$surfaceId);
        if($this->db->delete('slider', array('slider_id' => $sliderId)))
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