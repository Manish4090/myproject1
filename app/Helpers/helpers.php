<?php
namespace App;
use App\Models\User;
use App\Models\Categories;



class Helpers
{
	
    public static function userDetails($userId)
    {
		
		$userDetails = User::where('id',$userId)->first();
		
        return $userDetails->name;
    }
	
	public static function getSubCatName($catId){
		
		$catSubData = Categories::where("parent_id",$catId)->get();
		$html='';
		foreach($catSubData as $catSubDatas){
			$html .= $catSubDatas['cat_name']. ',';
		}	
		$html1 = substr_replace($html ,"", -1); 
		return $html1;
		
	}
}