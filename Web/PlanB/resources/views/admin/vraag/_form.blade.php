<div class="form-group">
    {!! Form::label('vraag', "Vraag/stelling", ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('vraag',null,['id'=>'vraag','class'=>'form-control','placeholder'=>"De vraag/stelling"]) !!}
    </div>
</div>
<?php $count = 2;?>
<div id="antwoorden">
    {!! Form::hidden('count',$count,['id'=>'count']) !!}
    <div class="form-group">
        {!! Form::label('antwoord-1', trans("vraag-antwoord.antwoord")." 1", ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('antwoord-1',null,['id'=>'antwoord-1','class'=>'form-control','placeholder'=>trans("vraag-antwoord.antwoord")." 1"]) !!}
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('antwoord-2', trans("vraag-antwoord.antwoord")." 2", ['class'=>'col-sm-2 control-label']) !!}
        <div class="col-sm-10">
            {!! Form::text('antwoord-2',null,['id'=>'antwoord-2','class'=>'form-control','placeholder'=>trans("vraag-antwoord.antwoord")." 2"]) !!}
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <button id='antwoord' type="button" class="btn btn-success"><i class="fa fa-plus"></i> Nog een antwoord</button>
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">{{$submitbuttonText}}</button>
    </div>
</div>
@section('js-sub')
    <script>
        var count = {{$count}}
        $('#antwoord').click(function () {
            count++;
            $('#antwoorden').append("<div class=\"form-group\">" +
                    '<label for="antwoord-' + count + '" class="col-sm-2 control-label">{{trans("vraag-antwoord.antwoord")}} ' + count + '</label>' +
                    "<div class=\"col-sm-10\">" +
                    '<input id="antwoord-' + count + '" class="form-control" placeholder="{{trans("vraag-antwoord.antwoord")}} ' + count + '" name="antwoord-' + count + '" type="text">' +
                    "</div>" +
                    "</div>");
            $('#count').val(count);
        })
    </script>
@endsection