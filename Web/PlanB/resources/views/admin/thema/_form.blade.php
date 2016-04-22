<div class="form-group">
    {!! Form::label('naam', "naam", ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('naam',null,['id'=>'naam','class'=>'form-control','placeholder'=>"thema.naam"]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('beschrijving', "beschrijving", ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::textarea('beschrijving',null,['id'=>'beschrijving','class'=>'form-control','placeholder'=>"thema.beschrijving"]) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">{{$submitbuttonText}}</button>
    </div>
</div>

@section('js-sub')

@endsection