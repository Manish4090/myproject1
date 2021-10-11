<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>
	
	<x-slot name="header">
      <a class="btn btn-primary" href="{{ route('admin.categories') }}">Back</a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   							
							<div class="col-lg-8 push-lg-4 personal-info">
							
							 <input type="hidden" name="userId" value="{{ $data['id'] }}">
								<div class="form-group row">
									<label class="col-lg-3 col-form-label form-control-label">Categroies Name</label>
									<div class="col-lg-9">
										<input class="form-control" type="text" name="name" value="{{ $data['cat_name'] }}" readonly>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-lg-3 col-form-label form-control-label">Description</label>
									<div class="col-lg-9">
										<input class="form-control" name="additional_des" type="textarea" value="{{ $data['additional_des'] }}" readonly>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-lg-3 col-form-label form-control-label">Categroies Image</label>
									<div class="col-lg-9">
										<img src="{{ asset('storage/cat_image/'.$data['image']) }}" alt="" title="">
									</div>
								</div>
								
								
						</div>
						  
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>