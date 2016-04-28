<div class="form-group">
    {!! Form::label('naam', "Naam", ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('naam',null,['id'=>'naam','class'=>'form-control','placeholder'=>"Thema naam"]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('beschrijving', "Beschrijving", ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::textarea('beschrijving',null,['id'=>'beschrijving','class'=>'form-control','placeholder'=>"Geef een beschijving van het thema"]) !!}
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-success">{{$submitbuttonText}}</button>
        <a href="{{URL::previous()}}" type="button" class="btn btn-default">Annuleer</a>
    </div>
</div>

@section('js-sub')

@endsection