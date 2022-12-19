@extends('layouts.admin')
@section('title', 'Category')
@section('content')
    
    <h1 class="page-title">Categories</h1>
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6 offset-md3">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{$error}}
                        </div>
                    @endforeach
                 @endif
                 
                <div class="card">
                    <div class="card-header">
                    <h5>create category</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('adminpanel.category.store')}}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror " value="{{old('name')}}" >
                                @error('name')
                                <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror

                            </div>
                            <div class="form-group text-end">
                                <button type="submit" class="btn btn-primary">create</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    
                        <h5>Categories</h5>
                        <div class="card-body">
                            <table class="table table-stripped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Total Products</th>
                                        <th>Published</th>
                                        <th>Action</th>
                                    </tr>                                   
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                   
                                    <tr>
                                    
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td></td>
                                        <td>{{\Carbon\Carbon::parse($category->created_at)->format('d/m/Y')}}</td>
                                        <td>
                                            <a href="{{ route('categories.subcategories.index', $category) }}" class="btn btn-info">Sub Categorys</a>
                                            <a href="{{ route('adminpanel.category.edit', $category) }}" class="btn btn-warning">Edit</a>
                                            <a href="#" class="btn btn-danger delete-item" data-id="{{$category->id}}">Delete</a>
                                            <form action="{{route('adminpanel.category.destroy', $category->id )}}" id="delete-form-{{ $category->id }}" method="post" class="d-none">
                                                @csrf 
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $('.delete-item').on('click', function(e) {
            e.preventDefault();
            if(!confirm('Are you sure?')) {
                return;
            }
            var id = $(this).data('id');
            $('#delete-form-'+id).submit();
        })
    </script>
@endpush