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
                {!! Form::open(['route'=>'agent.store']) !!}
                    <div class="form-group">
                        <label>Nama</label>
                        {!! Form::text('name',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <label>No HP</label>
                        {!! Form::text('no_hp',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        {!! Form::text('alamat',null,['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <label>Pengurus</label>
                        {!! Form::select('user_id',$users,null,['class'=>'form-control']) !!}
                    </div>


                <button type="submit" class="btn btn-info btn-fill pull-right">Create</button>
                    <div class="clearfix"></div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
