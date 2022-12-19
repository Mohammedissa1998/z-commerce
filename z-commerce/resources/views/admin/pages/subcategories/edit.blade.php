@extends('layouts.admin')
@section('title', 'Category')
@section('content')
    
    <h1 class="page-title">Sub Categories (Category : {{ $category->name }})</h1>
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{$error}}
                        </div>
                    @endforeach
                 @endif
                 
                <div class="card">
                    <div class="card-header">
                    <h5>Update sub category</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('categories.subcategories.update', [$category, $subcategory])}}" method="post">
                            @csrf
                            @method('patch')
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" value="{{ $subcategory->name }}" class="form-control @error('name') is-invalid @enderror " value="{{old('name')}}" >
                                @error('name')
                                <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror

                            </div>
                            <div class="form-group text-end">
                                <button type="submit" class="btn btn-primary">Update</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
