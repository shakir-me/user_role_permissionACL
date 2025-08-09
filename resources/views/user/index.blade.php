@extends('layouts.app')
@section('admin_content')



     <section class="content-main">
                <div class="content-header">
                    <div>
                        <h2 class="content-title card-title">User List</h2>
                
                    </div>
                    <div>
                        @can('user-create')

                        <a href="{{route('user.create')}}" class="btn btn-md">Create User</a>
                        @endcan
                    </div>
                </div>
                <div class="card mb-4">
                   
                    <!-- card-header end// -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Role</th>
                                        <th scope="col" class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $key=>$user)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td><b>{{$user->name}}</b></td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            @if($user->roles)
                                            {{$user->roles->first()->name}} @endif</td>
                                        <td class="text-end">
                                            @can('user-edit')
                                            <a href="{{route('user.edit',$user->id)}}" class="btn btn-md rounded font-sm">Edit</a>
                                            @endcan
                                            @can('user-delete')
                                            <a href="{{route('user.delete',$user->id)}}"  class="btn btn-danger rounded font-sm" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                            @endcan
                                           
                                        </td>
                                    </tr>

                                    @endforeach
                                   
                                   
                                </tbody>
                            </table>
                        </div>
                        <!-- table-responsive //end -->
                    </div>
                    <!-- card-body end// -->
                </div>
                <!-- card end// -->
                <div class="pagination-area mt-15 mb-50">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-start">
                            {{$users->links()}}
                        </ul>
                    </nav>
                </div>
            </section>
@endsection