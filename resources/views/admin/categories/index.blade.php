<x-admin-layout>
<div class="container">   
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Manage Product Categories</h2>
        </div>
        <div class="pull-right">
		
            <a class="btn btn-success" href="{{ url('admin/add-categories') }}">Add New Categories</a>
        </div>
    </div>
</div>

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


<table class="table table-bordered">
 <tr>
   <th>No</th>
   <th>PARENT CATEGORY</th>
   <th>SUB CATEGORY </th>
   <th>ACTIVE</th>
   <th width="280px">Action</th>
 </tr>
 @foreach ($data as $key => $data)
 <?php //echo "<pre>"; print_r($data->parent_id); ?>
  <tr>
    <td>{{$data->id}}</td>
    <td>{{$data->cat_name}}</td>
	@if(!empty($data->id))
    <td>{{ App\Helpers::getSubCatName($data->id) }}</td>
	@else
	<td>NA</td>
	@endif
    <td>{{ $data->status }}</td>
    
    <td>
       <a class="btn btn-info" href="{{ url('admin/show-categories',$data->id) }}">Show</a>
       <a class="btn btn-primary" href="{{ url('admin/edit-categories',$data->id) }}">Edit</a>
       
    </td>
  </tr>
 @endforeach
</table>

</div>
   
</x-admin-layout>
   
