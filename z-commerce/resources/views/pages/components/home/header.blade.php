<header class="home-header">
    <div class="home-header-text">
        <h2 class="title">welcome to clothing store</h2>
        <p class="tagline">explore our collection</p>
    </div>
    <nav>
      <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link text-success active" id="nav-search-tab" data-bs-toggle="tab" data-bs-target="#nav-search" type="button" role="tab" aria-controls="nav-search" aria-selected="true">Search</button>
        <button class="nav-link text-info" id="nav-filter-tab" data-bs-toggle="tab" data-bs-target="#nav-filter" type="button" role="tab" aria-controls="nav-filter" aria-selected="false">Filter</button>
      </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="nav-search" role="tabpanel" aria-labelledby="nav-search-tab">
        <div class="home-header-search">
            <form action="{{ route('search') }}" method="post">
                @csrf
                <input type="text" name="query" placeholder="search...">
                <button class="btn btn-info">Search</button>
            </form>
        </div>
      </div>
      <div class="tab-pane fade" id="nav-filter" role="tabpanel" aria-labelledby="nav-filter-tab">
        <div class="home-header-search">
            <form action="{{ route('search') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col">
                        <select name="category_id" id="category_id" class="form-control">
                            <option value="">Select Category</option>
                            @foreach($categories as $categorie)
                                <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <select name="sub_categorie_id" id="sub_categorie_id" class="form-control">
                            <option value="">Select Sub Category</option>
                        </select>
                    </div>
                    <div class="col">
                        <input type="text" name="price" class="form-control" placeholder="price...">
                    </div>
                    <div class="col">
                        <button class="btn btn-info">Search</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
    
</header>

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js" integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        
        $('#category_id').on('change', function(e) {
            var id = $(this).val();
            if(id) {
                getSubCat(id);                
            }
        })

        function getSubCat(id, subid=false) {
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
                    $('#sub_categorie_id').html(res);
                }
            })
        }
    </script>
@endpush