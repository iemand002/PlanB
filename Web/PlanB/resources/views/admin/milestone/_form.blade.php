<div class="form-group">
    {!! Form::label('naam', "naam", ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('naam',null,['id'=>'naam','class'=>'form-control','placeholder'=>"milestone.naam"]) !!}
    </div>
</div>

<div class="form-group">
{!! Form::label('naam', "locatie", ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('locatie',null,['id'=>'locatie','class'=>'form-control','placeholder'=>"milestone.locatie"]) !!}
    </div>
</div>

<div class="form-group">
{!! Form::label('naam', "beschrijving", ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('beschrijving',null,['id'=>'beschrijving','class'=>'form-control','placeholder'=>"milestone.beschrijving"]) !!}
    </div>
</div>

<div class="form-group">
{!! Form::label('naam', "afbeelding", ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('afbeelding',null,['id'=>'afbeelding','class'=>'form-control','placeholder'=>"milestone.afbeelding"]) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">{{$submitbuttonText}}</button>
    </div>
</div>
@section('js-sub')

@endsection