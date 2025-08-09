@extends('layouts.app')
@section('admin_content')



     <section class="content-main">
                <div class="content-header">
                    <div>
                        <h2 class="content-title card-title">Permission Create</h2>
                
                    </div>
                    <div>
                        <a href="{{route('permission.index')}}" class="btn btn-md">Permission List</a>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
               
                            <form action="{{route('permission.store')}}" method="post">
                                @csrf
                            	<div class="row">
                            		<div class="col-md-6">
                            		<label>Name *</label>
                            		<input type="text" name="name" placeholder="Name" value="{{ old('name') }}" required class="form-control">
                            	</div>                               
                        

                            	


                            	</div>
                            	<br>
                            	<button type="Submit" class="btn btn-md">Submit</button>
                            </form>
                        </div>

                </div>               
            </section>
@endsection