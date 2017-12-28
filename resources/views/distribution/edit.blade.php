@extends("layout.admin")
@section("content")
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="header">
                <h4 class="title">Create Menu</h4>
            </div>
            <div class="content">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> Ada inputan yang salah.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    {!! Form::model($product,['route'=>['product.update',$product->id],'method'=>'PATCH']) !!}
                    <div class="form-group">
                        <label>Nama</label>
                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        {!! Form::text('harga',null,['class'=>'form-control']) !!}
                    </div>



                    <button type="submit" class="btn btn-info btn-fill pull-right">Update</button>
                <div class="clearfix"></div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
