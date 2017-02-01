<?php
   namespace App;
   use Illuminate\Database\Eloquent\Model;
   use DB;


    class Category_model extends Model 
	{
		 protected $table = 'category';
		 
		 
		public function get_parent_category()
		{
			$objQuery=DB::table('category')->where('category_parent_id',0)->orderBy('category_parent_id','asc')->get();
			$i = 0;
			///   echo '<pre>';print_R($objQuery->result_array());echo "</pre>";
			foreach ($objQuery as $catdt)
			{
				$catstan[$i]['category_name'] = $catdt['category_name'];
				$catstan[$i]['category_id'] = $catdt['category_id'];
				$catstan[$i]['category_parent_id'] = $catdt['category_parent_id'];
	
				$data =Category_model::get_chiled_category($catdt['category_id'], '-- ', $i);
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
					//print_r($catstan);
			return $catstan;
		}
	   public function get_chiled_category($child, $dot, $i)
       {
			$catstan = array();
	
		   $objQuery=DB::table('category')->where('category_parent_id',$child)->orderBy('category_parent_id','asc')->get();
			foreach ($objQuery as $catdt)
			{
				$catstan[$i]['category_name'] = $dot . $catdt['category_name'];
				$catstan[$i]['category_id'] = $catdt['category_id'];
				$catstan[$i]['category_parent_id'] = $catdt['category_parent_id'];
	
				$data =Category_model::get_chiled_category($catdt['category_id'], '- ' . $dot, $i);
				//print_r($data);
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

		public function get_sub_category_details()
		{
			$query = DB::table('category');
			$query->whereNotIn('category_parent_id',0);
			$objQuery =  $query->get();
			//echo "<pre>"; print_r($objQuery); die;
			return $objQuery;
		}
    }
	
	
?>	