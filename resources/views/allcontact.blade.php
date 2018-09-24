 @extends('layout')
 @section('content')
 	
<div class="row-fluid sortable">
				<div class="box ">
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Simple Table</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<p>
					 @php
						$message=Session::get('message');
						if($message){
							echo $message;
							Session::put('message',null);
						}
					 @endphp
					 </p>
					<div class="box-content">
						<table class="table">
							  <thead>
								  <tr>
									  <th>Contact Id</th>
									  <th>Contact Name</th>
									  <th>Contact Number</th>
									  <th>Action</th>                                          
								  </tr>
							  </thead>   
							  <tbody> 
								 
								@foreach($all_contact_info as $v_contact)
								
								<tr>
									<td>{{$v_contact->contact_id}}</td>
									<td class="center">{{$v_contact->contact_name}}</td>
									<td class="center">{{$v_contact->contact_number}}</td>
									<td class="center">
									<a href="{{URL::to('/edit_conatct/'.$v_contact->contact_id)}}" class="btn btn-info">Edit</a>
									<a href="{{URL::to('/delete_conatct/'.$v_contact->contact_id)}}" class="btn btn-danger">Delete</a>
									</td>  				
								</tr>   
                                @endforeach		
							  </tbody>
						 </table>  
						 <div class="pagination pagination-centered">
						  <ul>
							<li><a href="#">Prev</a></li>
							<li class="active">
							  <a href="#">1</a>
							</li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">Next</a></li>
						  </ul>
						</div>     
					</div>
				</div><!--/span-->
				
				
			</div><!--/row-->
				
 
 @endsection