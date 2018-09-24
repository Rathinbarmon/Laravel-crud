<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;  
use Session; 
session_start(); 

class AdminController extends Controller
{
   public function add_contact()
   {
	   return view('addcontact');
   }
	//connecting with database
   public function all_contact()
   {
		$allcontact_info=DB::table('tbl_contact')
			->get();
		$manage_contact=view('allcontact')
			->with('all_contact_info',$allcontact_info);
		return view('layout')
			->with('allcontact',$manage_contact); 
		
   }
	//save data  
   public function save_contact(Request $set)
   {
	    $data = array();
	    $data['contact_name'] = $set->contact_name;
	    $data['contact_number'] = $set->contact_number;
	    
		DB::table('tbl_contact')->insert($data);
		Session::put('message','Data Added Successfully!!');
		return Redirect::to('/addcontact'); 
		
   }
   
   //Edit 
   public function edit_conatct($contact_id)
   {
	   $contact_info = DB::table('tbl_contact')
			->where('contact_id',$contact_id)
			->first(); 
			
		$manage_contact=view('contact_edit')
			->with('all_contact_info',$contact_info);
		return view('layout')
			->with('contact_edit',$manage_contact); 
			
		Session::put('message','Data Updated Successfully!!');
		return Redirect::to('/allcontact');
   } 
   
   //update  
   public function update_conatact(Request $readd, $contact_id)
   { 
		$data = array();
	    $data['contact_name']   = $readd->contact_name;
	    $data['contact_number'] = $readd->contact_number;
	   
		DB::table('tbl_contact')
			->where('contact_id',$contact_id)
			->update($data); 
		 
		Session::put('message','Data Updated Successfully!!');
		return Redirect::to('/allcontact');
   } 
   
   //Delete
   public function delete_conatct($contact_id)
   {
	    DB::table('tbl_contact')
			->where('contact_id',$contact_id)
			->delete();
			
		Session::put('message','Data Deleted Successfully!!');
		return Redirect::to('/allcontact');
   }
}
