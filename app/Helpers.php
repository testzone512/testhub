<?php

class Helpers
{
    function hello_world()
    {
        return 'Hello World';
    }  
	
	
	
	 public static function GetAllCommon($tableName,$strData='')
	{
		$query = DB::table($tableName)->get();
		//echo "<pre>"; print_r($query); die;
		return $query;
		 //$result=DB::table('users')->where('id',$userId)->get();
	} 
	
	public static function GetKeyValueArrayCommon($arrData, $keyFieldName, $valueFieldname, $firstBlank='') 
	{
			
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


	/*
     * get_product_name
	 *
	 */
	public static function get_product_name($product_id)
	{
		$strigdata = "";
		$product_arr = explode(',',$product_id);
		$query=DB::table('product');
		if(!empty($product_arr))
		{
			$query->whereIn('product_id', $product_arr);
		}
		$arrProductDetails = $query->get();

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

	/*
	 *
	 * get_shipping_cost_order
	 */

	public static function shipping_cost_order($id,$newDate)
	{
		$query=DB::table('cart');
		$query->whereIn('cart_product_id', $id);
		$query->orWhere('cart_created_on', 'like',$newDate);
		$qtyGet = $query->get();
		if(!empty($qtyGet))
		{
			$qtyGet;
		}
		return $qtyGet;
	}



	/*
	 * get_colour
	 *
	 */
	public static function get_colour($colour_id)
	{
		$query=DB::table('colour');
		$query->where('colour_id', $colour_id);
		$coloueGet = $query->get();

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
	public static function get_product_size($size_id)
	{
		$query=DB::table('size');
		$query->where('size_id', $size_id);
		$sizeGet = $query->get();
		if(!empty($sizeGet))
		{
			$getAll = $sizeGet[0]['size_name'];
		}
		return $getAll;
	}


	/*
	 * get_size
	 *
	 */
	public static function get_size($product_id)
	{
		$strigdata ="";

		$query=DB::table('product_detail');
		$query->where('pd_product_id', $product_id);
		$arrProdDetails = $query->get();

		if(!empty($arrProdDetails))
		{
			foreach($arrProdDetails as $val)
			{
				$size_array[]=$val['pd_product_size'];
			}
			//print_r($size_array);

			$query1=DB::table('size');
			if(!empty($size_array)) {
				$query1->whereIn('size_id', $size_array);
			}
			$arrSizeDetails = $query1->get();

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
 * get_qty
 *
 */
	public static function get_qty($product_id)
{
	$query=DB::table('product');
	$query->where('product_id', $product_id);
	$qtyGet = $query->get();
	if(!empty($qtyGet))
	{
		$getAll = $qtyGet[0]['product_qty'];
	}
	return $getAll;
}




	public static function  product_count($user_id)
	{
		$query=DB::table('temp_cart');
		$query->where('tc_user_id', $user_id);
		$qtyGet = $query->get();
		if(!empty($qtyGet)) {
			$coutnAll = count($qtyGet);
		}
		else
		{
			$coutnAll = 0;
		}
		return $coutnAll;
	}


	/*
 * sub_total
 */
	public static function sub_total($user_id)
	{
		$query=DB::table('temp_cart');
		$query->where('tc_user_id', $user_id);
		$qtyGet = $query->get();
		$getAllTotal = 0;

		foreach($qtyGet as $var) {
			$getAllTotal += $var['tc_product_total'];
		}

		//echo $getAllTotal; die;
		return $getAllTotal;
	}




	/*
 * shipping_calculate
 */
	public static function shipping_calculate($totalval)
	{
		$query=DB::table('shipping');
		$query->where('shipping_to','>=', $totalval);
		$qtyGet = $query->get();
		if(!empty($qtyGet))
		{
			$getAll = $qtyGet[0]['shipping_amount'];
		}
		else{
			$getAll = 0;
		}
		return $getAll;
	}


}

?>