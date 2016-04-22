<div class="form-group">
    {!! Form::label('vraag', trans("project.vraag"), ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('vraag',null,['id'=>'vraag','class'=>'form-control','placeholder'=>trans("project.vraag")]) !!}
    </div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">{{$submitbuttonText}}</button>
    </div>
</div>
@section('js-sub')
@endsection