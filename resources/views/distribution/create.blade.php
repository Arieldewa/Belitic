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
                {!! Form::open(['route'=>'distribution.store']) !!}

                    <div class="form-group">
                        <label>Agent</label>
                        {!! Form::select('agent_id',$agents,null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <label>Product</label>
                        {!! Form::select('product_id',$products,null,['class'=>'form-control','id'=>'product_id']) !!}
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        {!! Form::text('qty',null,['class'=>'form-control','id'=>'qty']) !!}
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        {!! Form::text('price',null,['class'=>'form-control','readonly'=>true,'id'=>'price']) !!}
                    </div>

                <button type="submit" class="btn btn-info btn-fill pull-right">Create</button>
                    <div class="clearfix"></div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function(){

        $("#qty").keyup(function(){
            var product_id = $("#product_id").val();
            var qty = $("#qty").val();
            var price = $("#price").val();
            $.ajax({
                url:" {{ route('cost')}}",
                data: {"id": product_id,"qty":qty},
                type: 'GET',
            })
                .done(function(res) {
                    $("#price").val(res)
                })
        });
    });

</script>
@endsection