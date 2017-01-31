<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model
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
     * get_product_details_for_listing
     *
     * This is used to get Product details
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @return void
     */
    function get_product_details_for_listing() {


        $this->db->select("*");
        $this->db->from("product pr");
		$this->db->join('category cat','cat.category_id = pr.product_category_id','left');
        $this->db->order_by("product_id", "desc");
        $objQuery = $this->db->get();

        //$this->db->last_query();

        return $objQuery->result_array();
    }


   /**
     * update_active_inactive_product
     *
     * This help to update active or inactive Product
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @return	void
     */
    public function update_active_inactive_product($Action,$ProductId) 
	{
        if ($Action == 'Active')
        {
            $result = $this->db->query("UPDATE product SET product_status ='0' WHERE product_id=$ProductId");
        } else {
            $result = $this->db->query("UPDATE product SET product_status ='1' WHERE product_id=$ProductId");
        }

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * get_category
     *
     * This is used to Getcategory
     *
     * @author	Rutunj Sheladiya
     * @access	public
     * @param   array-$arrData
     * @return void
     */
    function get_parent_category() {

        $arrData = array();

        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('category_parent_id', '0');
        $this->db->order_by('category_parent_id', 'asc');

        $objQuery = $this->db->get();
        $i = 0;
        ///   echo '<pre>';print_R($objQuery->result_array());echo "</pre>";
        foreach ($objQuery->result_array() as $catdt) 
		{
            $catstan[$i]['category_name'] = $catdt['category_name'];
            $catstan[$i]['category_id'] = $catdt['category_id'];
            $catstan[$i]['category_parent_id'] = $catdt['category_parent_id'];

            $data = $this->get_chiled_category($catdt['category_id'], '-- ', $i);
            ///echo "<pre>";print_r($data);
            if (count($data) != 0) 
			{
                $i = $i+count($data);
            } else 
			{

            }
            $i++;
            $finalaa = array_merge($catstan, $data);
            $catstan = array();
            $catstan = $finalaa;
            ///print_r($catstan);echo "</pre>";
        }
//                 print_r($catstan);
        return $catstan;
    }

    function get_chiled_category($child, $dot, $i) {
        $catstan = array();

        $this->db->select('*');
        $this->db->from('category');
        $this->db->where('category_parent_id', $child);
        $this->db->order_by('category_parent_id', 'asc');
        $objQuery = $this->db->get();

        foreach ($objQuery->result_array() as $catdt) {
            $catstan[$i]['category_name'] = $dot . $catdt['category_name'];
            $catstan[$i]['category_id'] = $catdt['category_id'];
            $catstan[$i]['category_parent_id'] = $catdt['category_parent_id'];

            $data = $this->get_chiled_category($catdt['category_id'], '- ' . $dot, $i);
//                            print_r($data);
            if (count($data) != 0) {
                $i = count($data);
            } else {

            }
            $i++;
            $finalaa = array_merge($catstan, $data);
            $catstan = array();
            $catstan = $finalaa;
        }
        return $catstan;
    }
    /**
     * save_Product
     *
     * This is used to save_Product
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @param   array-$arrData
     * @return void
     */
    function save_product($arrData) {

        if ($this->db->insert('product', $arrData)) {
            return true;
        } else {
            return false;
        }
    }


    /**
     *
     *
     * This is used to save product detail
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @param   array-$arrData
     * @return void
     */
    function save_productdetail($arrData)
    {

        if($this->db->insert('product_detail', $arrData))
        {
            return true;
        }else
        {
            return false;
        }

    }



    /**
     * get_product_for_edit
     *
     * This is used to get client details
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @param   integer-$iclientid
     * @return void
     */
    function get_product_for_edit($productId = 0) {

        $arrData = array();

        if ($productId != 0) {
            $this->db->where('product_id', $productId);
        }

        $this->db->select('*');
        $this->db->from('product');
        //$this->db->join('sz_product_images pi', 'p.product_id = pi.pi_product_id');
        $objQuery = $this->db->get();

        //$this->db->last_query();

        return $objQuery->result_array();
    }

    /**
     * get_product_details_for_edit
     *
     * This is used to get product details
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @param   integer-$iproductid
     * @return void
     */
    function get_product_details_for_edit($productId = 0){

        $arrData = array();

        if($productId != 0 ){
            $this->db->where('pd_product_id', $productId);
        }

        $this->db->select();

        $objQuery = $this->db->get('product_detail');

        //$this->db->last_query();

        return $objQuery->result_array();

    }


    /**
     * update_Product
     *
     * This is used to update Product details
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @param   array-$UpdateData, integer-$iclientid
     * @return void
     */
    function update_product($productId, $UpdateData) {

        $this->db->where('product_id', $productId);

        if ($this->db->update('product', $UpdateData)) {
            return true;
        } else {
            return false;
        }
    }
	
	 /**
     * get_product_details_for_view
     *
     * This is used to get Product details
     *
     * @author	Nilesh Dabhi
     * @access	public
	 * @param   array-, integer-$productId
     * @return void
     */
    function get_product_details_for_view($productId) 
	{
        $this->db->select("*");
        $this->db->from("product pr");
		$this->db->join('category cat','cat.category_id = pr.product_category_id');
        if($productId != 0 ){
            $this->db->where('product_id', $productId);
        }
        $objQuery = $this->db->get();

        //$this->db->last_query();

        return $objQuery->result_array();
    }

    /**
     * delete_product_detail
     *
     * This is used to delete product details
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @param   integer-$surfaceId
     * @return void
     */
    function delete_product_detail($productId){

        // $this->db->where('surfaceId',$surfaceId);
        if($this->db->delete('product_detail', array('pd_product_id' => $productId)))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * delete_product
     *
     * This is used to delete product and product details
     *
     * @author	Nilesh Dabhi
     * @access	public
     * @param   integer-$surfaceId
     * @return void
     */
    function delete_product($productId){

        // $this->db->where('surfaceId',$surfaceId);
        if($this->db->delete('product', array('product_id' => $productId)))
        {
            $this->db->delete('product_detail', array('pd_product_id' => $productId));
            return true;
        }
        else
        {
            return false;
        }
    }






}
?>