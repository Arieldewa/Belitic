@extends("layout.admin")
@section("content")
<div class="row">
    <div class="col-md-8">
        <div class="card">

            <div class="content">
                    <div class="form-group">
                        <label>Title</label>
                        <p>{{$page->title}}</p>
                    </div>
                     <div class="form-group">
                        <label>Description</label>
                        <p>{{$page->description}}</p>
                    </div>
                     <div class="form-group">
                        <label>Meta keywords</label>
                        <p>{{$page->meta_keywords}}</p>
                    </div>
                     <div class="form-group">
                        <label>Meta Description</label>
                        <p>{{$page->meta_description}}</p>
                    </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
    <div class="card">
    <div class="header">
        <h4 class="title">Product</h4>
    </div>
    <div class="content table-responsive table-full-width">
        <table class="table table-hover table-striped">
            <thead>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Merchant</th>
            </thead>
            <tbody>
                @foreach ($page->products as $product)
                <tr>
                    <td><img  style="width: 150px;height: auto;"src="{{$product->image}}" class="img-responsive" alt="Image"></td>
                    <td>{{$product->name}}e</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->merchant}}</td>
                </tr>

                @endforeach

            </tbody>
        </table>

    </div>
    </div>
    </div>

</div>
@endsection
