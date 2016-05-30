<div class="form-group">
    {!! Form::label('naam', trans("project.naam"), ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('projectnaam',null,['id'=>'naam','class'=>'form-control','placeholder'=>trans("project.naam")]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('beschrijving', trans("project.beschrijving"), ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::textarea('projectbeschrijving',null,['id'=>'beschrijving','class'=>'form-control','placeholder'=>trans("project.beschrijving")]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('publish_from', trans("project.publish.vanaf"), ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('project_publish_from',null,['id'=>'publish_from','class'=>'form-control datetimepicker','placeholder'=>trans("common.datumformaatInclTijd")]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('publish_till', trans("project.publish.tot"), ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('project_publish_till',null,['id'=>'publish_till','class'=>'form-control datetimepicker','placeholder'=>trans("common.datumformaatInclTijd")]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('thema_id', trans("project.thema"), ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::select('thema_id',$themas,null,['id'=>'thema_id','class'=>'form-control','placeholder'=>trans("project.thema-desc")]) !!}
    </div>
</div>
@if(isset($submitbuttonText))
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" name="submit" value="sluiten" class="btn btn-default">{{$submitbuttonText}} &amp;
                Sluiten
            </button>
            @if($create)
                <button type="submit" name="submit" value="nieuw" class="btn btn-default">{{$submitbuttonText}} &amp;
                    Nieuw
                </button>
            @endif
            <a href="{{route('admin.project.show',$project->slug)}}" class="btn btn-default">Annuleer</a>
        </div>
    </div>
@endif
@section('js-sub2')
    <script>
        $(function () {
            $('#publish_from').datetimepicker({
                locale: 'nl',
                format: 'DD/MM/YYYY HH:mm:ss',
                sideBySide: true
            }).on("dp.change", function (e) {
                $('#publish_till').data("DateTimePicker").minDate(e.date);
            });
            $('#publish_till').datetimepicker({
                locale: 'nl',
                format: 'DD/MM/YYYY HH:mm:ss',
                sideBySide: true
            }).on("dp.change", function (e) {
                $('#publish_from').data("DateTimePicker").maxDate(e.date);
            });
        });
    </script>
@endsection