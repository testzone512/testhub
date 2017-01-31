<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



/**
 * @function		GetAllCommon
 *
 * Short desc
 *
 * For fetching data from table and returns an array.
 *
 * @access			public
 * @param			string-$tableName , string-$strData (Option Parameter)
 * @return			array
 *	
 * @author			Rima mehta 
 * @copyright		Copyright (c) 2015
 * @since			Version 1.0
**/
if ( ! function_exists('GetAllCommon'))
{
	function GetAllCommon($tableName , $strData='' , $orderByField='', $orderBySort='')
	{
		$CI =& get_instance();
		
		if ($strData != '')
			$CI->db->select( $strData );
		
		if($orderByField!='')
			if($orderBySort=='')
				$CI->db->order_by($orderByField, "ASC"); 
			else
				$CI->db->order_by($orderByField, $orderBySort); 
		
		$query = $CI->db->get( $tableName );
		//echo $CI->db->last_query();
		
		return $query->result_array();
	}
}


/**
 * @function		GetAllCommonWithWhere
 *
 * Short desc
 *
 * For fetching data from table with where condition and returns an array.
 *
 * @access			public
 * @param			string-$tableName , string-$where string-$strData (Option Parameter)
 * @return			array
 *	
 * @author			Rima mehta 
 * @copyright		Copyright (c) 2015
 * @since			Version 1.0
**/
if ( ! function_exists('GetAllCommonWithWhere'))
{
	function GetAllCommonWithWhere($tableName , $where , $strData='', $orderByField='', $orderBySort='')
	{
		$CI =& get_instance();
		
		$CI->db->where( $where );
		
		if ($strData != '')
			$CI->db->select( $strData );

		if($orderBySort == '')
			$orderBySort ='ASC';

		if($orderByField!='')
		{
			if( strpos($orderByField, ',') === false)
			{
				if (is_numeric($orderByField))
					$CI->db->order_by($orderByField, $orderBySort); 
				else
					$CI->db->order_by("UPPER(".$orderByField.")", $orderBySort); 
			}
			else
			{
				// when it comes here, it meas $orderByField has comma seperated fields
				$CI->db->order_by($orderByField, $orderBySort); 
			}
		}
		
		$query = $CI->db->get( $tableName );
		//echo $CI->db->last_query();die;
		//return $query->result (); // This will return object
		return $query->result_array();
	}
}

/**
 * @function		GetAutoIncrementCommon 
 *
 * Short desc
 *
 * This is used to get autoincrement value
 *
 * @access			public
 * @param			string-$sequealName
 * @return			int
 *	
 * @author			Rima mehta 
 * @copyright		Copyright (c) 2012, Web Werks India Pvt Ltd
 * @since			Version 1.0
**/
if ( ! function_exists('GetAutoIncrementCommon'))
{
	function GetAutoIncrementCommon($sequealName)
	{	
		$CI =& get_instance();
		
		$conn = oci_connect($CI->config->item('dbuser'), $CI->config->item('dbpassword'), $CI->config->item('dbhost').'/'.$CI->config->item('dbname'));
		$query = "SELECT $sequealName.nextval from dual"; 
		
		$stid = oci_parse($conn, $query);
		$r = oci_execute($stid, OCI_DEFAULT);
		
		while ($row = oci_fetch_row($stid)) {
		  foreach($row as $autoId) {
			  //this adds autoincremented id from sequence
			  $incrementId = $autoId;
		  }
		}
		oci_close($conn); 
		return $incrementId;
	}
}

	/**
	 * GetKeyValueArrayCommon
	 *
	 * This is used to get array in Key value Form
	 *
	 * @author	Rima Mehta
	 * @access	public
	 * @param   void
	 * @return  array
	 */
	 if ( ! function_exists('GetKeyValueArrayCommon'))
	{
		function GetKeyValueArrayCommon($arrData, $keyFieldName, $valueFieldname, $firstBlank='') {
			
			$data = array();

			if($firstBlank!='')
				$data[''] = "--- $firstBlank ---";

			if($arrData)
			{
				for($i=0; $i<count($arrData);$i++)
					$data[$arrData[$i][$keyFieldName]] = $arrData[$i][$valueFieldname];
			}
			
			return $data;
		}
	}


	




	/*
	 * get_size
	 *
	 */
	function get_size($product_id)
	{
		$strigdata ="";
		$CI =& get_instance();
		$CI->db->select();
		$CI->db->where('pd_product_id', $product_id);
		$query = $CI->db->get('product_detail');
		//echo $CI->db->last_query();die;
		//return $query->result (); // This will return object
		$arrProdDetails =  $query->result_array();

		if(!empty($arrProdDetails))
		{
			foreach($arrProdDetails as $val)
			{
				$size_array[]=$val['pd_product_size'];
			}
			//print_r($size_array);
			if(!empty($size_array)){
				//$this->db->where('size_id', $sizeId);
				$CI->db->where_in('size_id', $size_array);
			}

			$CI->db->select();
			$objQuery = $CI->db->get('size');
			//$this->db->last_query();

			$arrSizeDetails =  $objQuery->result_array();
			//echo "<pre>"; print_r($arrSizeDetails); die;
			if(!empty($arrSizeDetails))
			{
				$string = '';
				foreach($arrSizeDetails as $value)
				{
					//$data=implode(',', $value['size_name']);
					$string .= $value['size_name'].',';

				}
				$strigdata = mb_substr($string, 0, -1);
			}
			else
			{
				$strigdata = "No";
			}

		}
		else
		{
			$strigdata = "No";
		}
		return $strigdata;
	}
/*
	 * get_colour
	 *
	 */
function get_colour($colour_id)
{
	$CI =& get_instance();
	$CI->db->select();
	$CI->db->where('colour_id', $colour_id);
	$query = $CI->db->get('colour');
	//echo $CI->db->last_query();die;

	$coloueGet = $query->result_array(); // This will return object
	if(!empty($coloueGet))
	{
		$getAll = $coloueGet[0]['colour_name'];
	}
	return $getAll;
}

/*
 * get_product_size
 *
 */
function get_product_size($size_id)
{
	$CI =& get_instance();
	$CI->db->select();
	$CI->db->where('size_id', $size_id);
	$query = $CI->db->get('size');
	//echo $CI->db->last_query();die;

	$sizeGet = $query->result_array(); // This will return object
	if(!empty($sizeGet))
	{
		$getAll = $sizeGet[0]['size_name'];
	}
	return $getAll;
}

/*
 * get_qty
 *
 */
function get_qty($product_id)
{
	$CI =& get_instance();
	$CI->db->select();
	$CI->db->where('product_id', $product_id);
	$query = $CI->db->get('product');
	//echo $CI->db->last_query();die;

	$qtyGet = $query->result_array(); // This will return object
	if(!empty($qtyGet))
	{
		$getAll = $qtyGet[0]['product_qty'];
	}
	return $getAll;
}

/*
 * sub_total
 */
function sub_total($user_id)
{
	$CI =& get_instance();
	$CI->db->select_sum('tc_product_total');
	$CI->db->where('tc_user_id', $user_id);
	$query = $CI->db->get('temp_cart');
	//echo $CI->db->last_query();die;

	$qtyGet = $query->result_array(); // This will return object
	if(!empty($qtyGet))
	{
		$getAllTotal = $qtyGet[0]['tc_product_total'];
	}
	else
	{
		$getAllTotal = 0;
	}
	return $getAllTotal;
}

/*
 * shipping_calculate
 */
function shipping_calculate($totalval)
{
	
	$CI =& get_instance();
	$CI->db->select();
	$CI->db->where('shipping_to >=', $totalval);
	$query = $CI->db->get('shipping');
	//echo $CI->db->last_query();die;

	$qtyGet = $query->result_array(); // This will return object
	if(!empty($qtyGet))
	{
		$getAll = $qtyGet[0]['shipping_amount'];
	}
	else{
		$getAll = 0;
	}
	return $getAll;
}

/*
 * product count
 *
 */
function  product_count($user_id)
{

	$CI =& get_instance();
	$CI->db->where('tc_user_id', $user_id);
	$query = $CI->db->get('temp_cart');
	//echo $CI->db->last_query();die;

	$qtyGet = $query->result_array(); // This will return object
	if(!empty($qtyGet))
	{
		$coutnAll = count($qtyGet);
	}
	else
	{
		$coutnAll = 0;
	}
	return $coutnAll;
}

/*
 *
 * get_shipping_cost_order
 */
function shipping_cost_order($id,$newDate)
{
	$CI =& get_instance();
	//$CI->db->where_in('cart_product_id', $id);
	$CI->db->where_in('cart_product_id', $id);
	$CI->db->like('cart_created_on', $newDate);
	$query = $CI->db->get('cart');
	//echo $CI->db->last_query();die;

	$qtyGet = $query->result_array(); // This will return object
	if(!empty($qtyGet))
	{
		$qtyGet;
	}
	return $qtyGet;
}





	/*    
     * get_product_name
	 *
	 */
	function get_product_name($product_id)
	{
		$strigdata ="";
			$CI =& get_instance();
			$product_arr = explode(',',$product_id);
			//print_r($size_array);
			if(!empty($product_arr)){
				//$this->db->where('size_id', $sizeId);
				$CI->db->where_in('product_id', $product_arr);
			}

			$CI->db->select();
			$objQuery = $CI->db->get('product');
			//$this->db->last_query();

			$arrProductDetails =  $objQuery->result_array();
			//echo "<pre>"; print_r($arrSizeDetails); die;
			if(!empty($arrProductDetails))
			{
				$string = '';
				foreach($arrProductDetails as $value)
				{
					//$data=implode(',', $value['size_name']);
					$string .= $value['product_name'].',';

				}
				$strigdata = mb_substr($string, 0, -1);
			}
			else
			{
				$strigdata = "No";
			}

		
		return $strigdata;
	}