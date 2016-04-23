<div class="form-group">
    {!! Form::label('naam', trans("project.naam"), ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('naam',null,['id'=>'naam','class'=>'form-control','placeholder'=>trans("project.naam")]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('publish_from', trans("project.publish.vanaf"), ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('publish_from',null,['id'=>'publish_from','class'=>'form-control datetimepicker','placeholder'=>trans("common.datumformaatInclTijd")]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('publish_till', trans("project.publish.tot"), ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('publish_till',null,['id'=>'publish_till','class'=>'form-control datetimepicker','placeholder'=>trans("common.datumformaatInclTijd")]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('thema_id', trans("project.thema"), ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('thema_id',$themas,null,['id'=>'thema_id','class'=>'form-control','placeholder'=>trans("project.thema-desc")]) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">{{$submitbuttonText}}</button>
    </div>
</div>
@section('js-sub')
    <script>
        $(function () {
            $('.datetimepicker').datetimepicker({
                locale: 'nl',
                format: 'DD/MM/YYYY HH:mm:ss',
                sideBySide: true
            });
        });
    </script>
@endsection