<div class="form-group">
    {!! Form::label('vraag', "Vraag/stelling", ['class'=>'col-sm-2 control-label']) !!}
    <div class="col-sm-10">
        {!! Form::text('vraag',null,['id'=>'vraag','class'=>'form-control','placeholder'=>"De vraag/stelling"]) !!}
    </div>
</div>
<div id="antwoorden">
    @if(isset($vraag))
        <?php $count = 0;?>
        @foreach($vraag->antwoorden as $antwoord)
            <?php $count++;?>
            {!! Form::hidden('id-'.$count,$antwoord->id) !!}
            {!! Form::hidden('del-'.$count,0,['id'=>"del-$count"]) !!}
            <div class="form-group" id="antwoord-group-{{$count}}">
                {!! Form::label('antwoord-'.$count, trans("vraag-antwoord.antwoord")." ".$count, ['class'=>'col-sm-2 control-label']) !!}
                <div class="col-sm-10">
                    @if($count>2)
                        <div class="input-group">
                            @endif
                            {!! Form::text('antwoord-'.$count,$antwoord->antwoord,['id'=>'antwoord-'.$count,'class'=>'form-control','placeholder'=>trans("vraag-antwoord.antwoord")." ".$count]) !!}
                            @if($count>2)
                                <span class="input-group-btn">
                            <button class="btn btn-danger del" type="button" data-id="{{$count}}"><i
                                        class="fa fa-trash"></i><span class="sr-only">Verwijder antwoord</span></button>
                        </span>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    @elseif(old('count'))
        <?php $count = old('count');?>
        @for($i=1;$i<=old('count');$i++)
            {!! Form::hidden('id-'.$i,old('id-'.$i)) !!}
            {!! Form::hidden('del-'.$i,old('del-'.$i),['id'=>"del-$i"]) !!}
            @unless(old('del-'.$i))
                <div class="form-group" id="antwoord-group-{{$i}}">
                    {!! Form::label('antwoord-'.$i, trans("vraag-antwoord.antwoord")." ".$i, ['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                        @if($i>2)
                            <div class="input-group">
                                @endif
                                {!! Form::text('antwoord-'.$i,old('antwoord-'.$i),['id'=>'antwoord-'.$i,'class'=>'form-control','placeholder'=>trans("vraag-antwoord.antwoord")." ".$i]) !!}
                                @if($i>2)
                                    <span class="input-group-btn">
                            <button class="btn btn-danger del" type="button" data-id="{{$i}}"><i
                                        class="fa fa-trash"></i><span class="sr-only">Verwijder antwoord</span></button>
                        </span>
                            </div>
                        @endif
                    </div>
                </div>
            @endunless
        @endfor
    @else
        <?php $count = 2;?>
        {!! Form::hidden('id-1',0) !!}
        {!! Form::hidden('del-1',0,['id'=>"del-1"]) !!}
        <div class="form-group" id="antwoord-group-1">
            {!! Form::label('antwoord-1', trans("vraag-antwoord.antwoord")." 1", ['class'=>'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Form::text('antwoord-1',null,['id'=>'antwoord-1','class'=>'form-control','placeholder'=>trans("vraag-antwoord.antwoord")." 1"]) !!}
            </div>
        </div>
        {!! Form::hidden('id-2',0) !!}
        {!! Form::hidden('del-2',0,['id'=>"del-2"]) !!}
        <div class="form-group" id="antwoord-group-2">
            {!! Form::label('antwoord-2', trans("vraag-antwoord.antwoord")." 2", ['class'=>'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Form::text('antwoord-2',null,['id'=>'antwoord-2','class'=>'form-control','placeholder'=>trans("vraag-antwoord.antwoord")." 2"]) !!}
            </div>
        </div>
    @endif
</div>
{!! Form::hidden('count',$count,['id'=>'count']) !!}
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <button id='antwoord' type="button" class="btn btn-success"><i class="fa fa-plus"></i> Nog een antwoord</button>
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
        <a href="{{route('admin.project.show',$project->slug)}}" class="btn btn-default">Annuleer</a>
    </div>
</div>
@section('js-sub')
    <script>
        var count = {{$count}}
        $('#antwoord').click(function () {
            count++;
            $('#antwoorden').append(
                    '<input type="hidden" value="0" name="id-' + count + '">' +
                    '<input type="hidden" value="0" name="del-' + count + '" id="del-' + count + '">' +
                    '<div class="form-group" id="antwoord-group-' + count + '">' +
                    '<label for="antwoord-' + count + '" class="col-sm-2 control-label">{{trans("vraag-antwoord.antwoord")}} ' + count + '</label>' +
                    "<div class=\"col-sm-10\">" +
                    '<div class="input-group">' +
                    '<input id="antwoord-' + count + '" class="form-control" placeholder="{{trans("vraag-antwoord.antwoord")}} ' + count + '" name="antwoord-' + count + '" type="text">' +
                    '<span class="input-group-btn">' +
                    '<button class="btn btn-danger del" type="button" data-id="' + count + '"><i class="fa fa-trash"></i><span class="sr-only">Verwijder antwoord</span></button>' +
                    '</span>' +
                    '</div>' +
                    "</div>" +
                    "</div>");
            $('#count').val(count);
            $('#antwoord-' + count).focus();
        });
        $('#antwoorden').on("click", ".del", function () {
            var antwId = $(this).data('id');
            console.log(antwId);
            $('#antwoord-group-' + antwId).remove();
            $('#del-' + antwId).val(1);
        })
    </script>
@endsection