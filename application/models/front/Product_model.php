<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database('default');
        $this->load->library('session');
        // Call the Model constructor
        parent::__construct();
    }



    /**
     * get_random_product
     *
     * This is used to get random Product details
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @return void
     */
    public function get_random_product() {

        $objQuery = $this->db->query("SELECT * FROM product ORDER BY RAND() LIMIT 4");
        //$this->db->last_query();
    //   echo "<pre>"; print_r($objQuery->result_array()); die;
        return $objQuery->result_array();
    }

    /**
     * get_recent_product
     *
     * This is used to get random Product details
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @return void
     */
    public function get_recent_product()
    {
        $date = date("Y-m-d",strtotime("-5 day", strtotime(date('Y-m-d'))));
        //$objQuery = $this->db->query("SELECT * FROM product where product_created_on between  '".$date."' and '".date('Y-m-d')."' ORDER BY RAND() LIMIT 8");
        $objQuery = $this->db->query("SELECT * FROM product ORDER BY RAND(),product_id desc LIMIT 8");
        // echo $this->db->last_query(); die;
        //echo "<pre>"; print_r($objQuery->result_array()); die;
        return $objQuery->result_array();
    }


    /*
     * get_shop_product_detail
     *
     * This is used to get product detail for shop page
     *
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @return void
     *
     */
    public function get_shop_product_detail($start_from,$num_rec_per_page)
    {
        $arrData = array();

       // $this->db->select('*');
      //  $this->db->from('product pro');
      //  $this->db->join('category cat','pro.product_category_id = cat.category_id','left');
      //  $this->db->join('product_detail pd','pro.product_id = pd.pd_product_id','left');
      //  $this->db->join('size sz','pd.pd_product_size = sz.size_id','left');
      //  $objQuery = $this->db->get();

        $objQuery = $this->db->query("SELECT * FROM product as pro left join category as cat ON pro.product_category_id = cat.category_id left JOIN product_detail as pd ON pro.product_id = pd.pd_product_id LEFT JOIN size as sz ON pd.pd_product_size = sz.size_id ORDER BY product_id asc LIMIT $start_from, $num_rec_per_page");
     	
        //echo $this->db->last_query(); die;
		//echo "<pre>"; print_r( $objQuery->result_array()); die;
        return $objQuery->result_array();
    }


    /*
     * get_product_details
     *
     * This is used to get product detail for shop page
     *
     *
     * @author	Chintan Bhimani
     * @access	public
     * @return void
     *
     */
    public function get_product_details($productId)
    {
        $this->db->select('*');
        $this->db->from('product pro');
        $this->db->join('category cat','pro.product_category_id = cat.category_id','left');
        $this->db->join('product_detail pd','pro.product_id = pd.pd_product_id','left');
        //$this->db->join('size sz','pd.pd_product_size = sz.size_id','left');
        $this->db->where('product_id',$productId);
        $this->db->group_by('product_id');
        $objQuery = $this->db->get();
        return $objQuery->result_array();
    }

    /*
     * get_product_colour_details
     *
     * This is used to get product colour detail
     *
     *
     * @author	Chintan Bhimani
     * @access	public
     * @return void
     *
     */
    public function get_product_colour_details($productId)
    {
        $this->db->select('*');
        $this->db->from('colour c');
        $this->db->join('product_detail pd','c.colour_id = pd.pd_product_color','left');
        $this->db->where('pd_product_id',$productId);
        $this->db->group_by('pd_product_id');
        $colourQuery = $this->db->get();
        return $colourQuery->result_array();
    }

    /*
     * get_product_size_details
     *
     * This is used to get product size detail
     *
     *
     * @author	Chintan Bhimani
     * @access	public
     * @return void
     *
     */
    public function get_product_size_details($productId)
    {
        $this->db->select('*');
        $this->db->from('size s');
        $this->db->join('product_detail pd','s.size_id = pd.pd_product_size','left');
        $this->db->where('pd_product_id',$productId);
        //$this->db->group_by('pd_product_id');
        $colourQuery = $this->db->get();
        return $colourQuery->result_array();
    }

    /*
     * get_product_gallery_details
     *
     * This is used to get product Gallery detail
     *
     *
     * @author	Chintan Bhimani
     * @access	public
     * @return void
     *
     */
    public function get_product_gallery_details($productId)
    {
        $this->db->select('*');
        $this->db->from('gallery');
        $this->db->where('gallery_product_id ',$productId);
        $galleryQuery = $this->db->get();
        return $galleryQuery->result_array();
    }





}
?>