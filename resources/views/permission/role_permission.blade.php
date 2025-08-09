@extends('layouts.app')
@section('admin_content')



     <section class="content-main">
                <div class="content-header">
                    <div>
                        <h2 class="content-title card-title">Role Permission </h2>
                
                    </div>
                    <div>
                        <a href="{{route('permission.create')}}" class="btn btn-md">Create Permission</a>
                    </div>
                </div>
                <div class="card mb-4">
                   
                    <!-- card-header end// -->
                    <div class="card-body">
                        <form action="{{route('sync.permission')}}" method="post">
                            @csrf
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Permission Name</th>
                                        @foreach($roles as $role)
                                        <th scope="col">{{$role->name}}</th>
                                        @endforeach
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($permissions as $key=>$value)
                                    <tr>
                                        
                                        <td>{{$value->name}}</td>

                                     @foreach($roles as $role)
                                       <td>
                           
                                <input type="checkbox" name="permissions[{{$role->name}}][]" value="{{$value->name}}" {{$role->hasPermissionTo($value->name) ? 'checked' : ''}}>
                               
                                       </td>
                                                @endforeach
                                    </tr>

                                    @endforeach
                                   
                                   
                                </tbody>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <button type="Submit" class="btn btn-primary">Submit</button>
                            </div>
                            
                        </div>
                        <!-- table-responsive //end -->

                    </form>
                    </div>
                    <!-- card-body end// -->
                </div>
                <!-- card end// -->
               
            </section>
@endsection