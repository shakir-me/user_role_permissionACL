@extends('layouts.app')
@section('admin_content')



     <section class="content-main">
                <div class="content-header">
                    <div>
                        <h2 class="content-title card-title">Permission List</h2>
                
                    </div>
                    <div>
                        @can('role-permission')
                        <a href="{{route('role.permission')}}" class="btn btn-md">Role Permission</a>
                        @endcan
                        @can('permission-create')
                        <a href="{{route('permission.create')}}" class="btn btn-md">Create Permission</a>
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
                                        <th scope="col" class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($permissions as $key=>$permission)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td><b>{{$permission->name}}</b></td>
                                   
                                        <td class="text-end">
                                                 @can('permission-edit')
                                            <a href="{{route('permission.edit',$permission->id)}}" class="btn btn-md rounded font-sm">Edit</a>
                                            @endcan
                                            @can('permission-delete')
                                            <a href="{{route('permission.delete',$permission->id)}}"  class="btn btn-danger rounded font-sm" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
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
                            {{$permissions->links()}}
                        </ul>
                    </nav>
                </div>
            </section>
@endsection