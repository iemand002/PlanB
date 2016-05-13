<div class="form-group">
    {!! Form::label('naam', "Naam", ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('naam',null,['id'=>'naam','class'=>'form-control','placeholder'=>"Milestone naam"]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('naam', "Locatie", ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('locatie',null,['id'=>'locatie','class'=>'form-control','placeholder'=>"Rond welke locatie speelt deze milestone zich af?"]) !!}
        {!! Form::hidden('coordinaten',null,['id'=>'location', 'data-geo'=>'location']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('naam', "Beschrijving", ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::textarea('beschrijving',null,['id'=>'beschrijving','class'=>'form-control','placeholder'=>"Beschrijving van de milestone"]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('naam', "Afbeelding", ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-6">
        <div class="input-group">
            {!! Form::text('afbeelding',null,['id'=>'afbeelding','class'=>'form-control','placeholder'=>"Kies een afbeelding of geef een url","onchange"=>"handle_image_change()"]) !!}
            <span class="input-group-btn">
                <button class="btn btn-default" type="button"
                        onclick="window.open('{{route('upload.picker')}}?id=afbeelding','imagepicker', 'width=1000,height=500,scrollbars=yes,toolbar=no,location=no'); return false">
                    {{trans('upload.choose_picture')}}
                </button>
            </span>
        </div>
    </div>
    <div class="col-md-4 text-right" style="min-height: 34px">
        <img src="{{ isset($milestone)?(strpos($milestone->afbeelding,'http')===0?'':'/img').$milestone->afbeelding:'/images/dummy.png' }}"
             class="img img-responsive"
             id="image-preview">
    </div>
</div>
@if(!isset($projectcreate))
    <div class="form-group">
        {!! Form::label('publish_from', 'Milestone zichtbaar vanaf', ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('publish_from',null,['id'=>'publish_from','class'=>'form-control datepicker','placeholder'=>trans("common.datumformaatInclTijd")]) !!}
        </div>
    </div>
@endif
<div class="form-group">
    {!! Form::label('publish_till', 'Vragen zichtbaar t/m', ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('publish_till',null,['id'=>'publish_till','class'=>'form-control datepicker','placeholder'=>trans("common.datumformaatInclTijd")]) !!}
        <span class="help-block">Wordt automatisch afgesloten als er een nieuwe milestone gepubliceerd wordt</span>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="submit" value="sluit" class="btn btn-default">{{$submitbuttonText}} &amp; Sluiten
        </button>
        @if(isset($create))
            <button type="submit" name="submit" value="nieuw" class="btn btn-default">{{$submitbuttonText}} &amp;
                Nieuw
            </button>
        @endif
        @if(isset($projectcreate))
            <a href="{{route('admin.projecten.index')}}" class="btn btn-default">Annuleer</a>
        @else
            <a href="{{route('admin.project.show',$project->slug)}}" class="btn btn-default">Annuleer</a>
        @endif
    </div>
</div>
@section('js-sub')
    <script>
        function handle_image_change() {
            $("#image-preview").attr("src", function () {

                var value = $("#afbeelding").val();
                if (value.substr(0, 4) != 'http') {
                    value = '/img' + value;
                }
                return value;
            });
        }
    </script>
    <script>
        $(function () {
            $('.datepicker').datetimepicker({
                locale: 'nl',
                format: 'DD/MM/YYYY HH:mm:ss',
                sideBySide: true
            });
        });
    </script>
@endsection