@extends('layouts.app')
@section('admin_content')



     <section class="content-main">
                <div class="content-header">
                    <div>
                        <h2 class="content-title card-title">Role Update</h2>
                
                    </div>
                    <div>
                        <a href="{{route('role.index')}}" class="btn btn-md">Role List</a>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
               
                            <form action="{{route('role.update',$role->id)}}" method="post">
                                @csrf
                            	<div class="row">
                            		<div class="col-md-6">
                            		<label>Name *</label>
                            		<input type="text" name="name" placeholder="Name" value="{{ old('name',$role->name) }}" required class="form-control">
                            	</div> 
                                <div> <br> <br>
                         <div class="row">
                            	<div class="col-md-12">
                            		<label>Permission *</label>
                            		@foreach($permissions as $permission)
                                     <input type="checkbox" class="" name="permission[]" value="{{$permission->id}}" {{$role->hasPermissionTo($permission->name) ? 'checked':null}}>
                                     <label>{{$permission->name}}</label>
                                    @endforeach
                            	</div> <br>

                            	


                            	</div>
                            	<br>
                            	<button type="Submit" class="btn btn-md">Update</button>
                            </form>
                        </div>

                </div>               
            </section>
@endsection