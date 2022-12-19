@extends('layouts.admin')
@section('title','Create Products')
@section('content')

<h1 class="page-title">Create Products</h1>
    <div class="container">
        <div class="row mb-5">
            <div class="col-12">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{$error}}
                        </div>
                    @endforeach
                 @endif

                <div class="card">
                    <div class="card-header">
                    <h5>create Product</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{route('adminpanel.products.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6">
                                <div class="form-group mb-3">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror " value="{{old('title')}}" >
                                @error('title')
                                <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror

                            </div>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                <div class="form-group mb-3">
                                <label for="price">price</label>
                                <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror " value="{{old('price')}}" >
                                @error('price')
                                <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                </span>
                                @enderror

                            </div>
                                </div>
                            </div> <!-- .row -->

                            <div class="row mb-3">
                                <div class="col-md-4">
                                <div class="form-group">

                                    <label for="category">Category</label>
                                    <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror ">
                                        <option value="">-- Select Category --</option> 
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : '' }} >{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                                </div>

                                </div>

                                <div class="col-md-4">
                                <div class="form-group">

                                    <label for="category">Sub Category</label>
                                    <select name="sub_categorie_id" id="sub_category_id" class="form-control @error('sub_categorie_id') is-invalid @enderror ">
                                        <option value="">-- Select Sub Category --</option> 

                                    </select>
                                    @error('sub_categorie_id')
                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                                </div>

                                </div>

                                <div class="col-md-4">
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                                    @error('image')

                                    <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </span>

                                    @enderror
                                    </div>    
                                </div>


                            </div><!-- .row -->


                            <div class="row mb-3">
                                <div class="col-md-6">
                               
                                 <div class="form-group">
                                    <label for="colors"> Colors </label> &nbsp;
                                    @foreach ($colors as $color)
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" name="colors[]" class="form-check-input" id="{{$color->name}}" value="{{$color->id}}">

                                        <label for="{{$color->name}}" class="form-check-label">{{$color->name}}</label>
                                              
                                    </div>
                                    @endforeach 

                                    @error('colors')

                                    <span class="invalid-feedback">
                                    <strong>{{$message}}</strong>
                                     </span>

                                    @enderror

                                 </div>                               
                              

                            </div><!-- .row -->

                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="description">
                                            <textarea name="description" id="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror">Description</textarea>
                                            @error('description')

                                                <span class="invalid-feedback">
                                                <strong>{{$message}}</strong>
                                                    </span>

                                                    @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group text-end">
                                <button type="submit" class="btn btn-primary">create</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        @if(old('category_id'))
            getSubCat('{{ old('category_id') }}', '{{ old('sub_categorie_id') }}');
        @endif

        $('#category_id').on('change', function(e) {
            var id = $(this).val();
            if(id) {
                getSubCat(id);
            }
        })

        function getSubCat(id, subid=false){
            $.ajax({
                url: "{{ route('adminpanel.products.subcategories') }}",
                method: "post",
                data: {
                    category_id: id,
                    subcat_id: subid,
                    "_token": "{{csrf_token()}}"
                },
                success: function (res) {
                    // console.log(res)
                    $('#sub_category_id').html(res);
                }
            })
        }
    </script>
@endpush