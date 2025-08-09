@extends('layouts.app')
@section('admin_content')



     <section class="content-main">
                <div class="content-header">
                    <div>
                        <h2 class="content-title card-title">User Create</h2>
                
                    </div>
                    <div>
                        <a href="{{route('user.index')}}" class="btn btn-md">User List</a>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
               
                            <form action="{{route('user.store')}}" method="post">
                                @csrf
                            	<div class="row">
                            		<div class="col-md-6">
                            		<label>Name *</label>
                            		<input type="text" name="name" placeholder="Name" value="{{ old('name') }}" required class="form-control">
                            	</div> <br>
                            	<div class="col-md-6">
                            		<label>Email *</label>
                            		<input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required class="form-control">
                            	</div> <br>

                            	<div class="col-md-6">
                            		<label>Password *</label>
                            		<input type="password" name="password" placeholder="Password" required class="form-control">
                            	</div> <br>
                            	<div class="col-md-6">
                            		<label>Confirm Password *</label>
                            		<input type="password" name="password_confirmation" placeholder="Password" required class="form-control">
                            	</div>


                            	</div>
                            	<br>
                            	<button type="Submit" class="btn btn-md">Submit</button>
                            </form>
                        </div>

                </div>               
            </section>
@endsection