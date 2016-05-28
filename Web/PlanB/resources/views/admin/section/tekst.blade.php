<div class="row list-group-item" draggable="false" data-id="{{$nr}}">
    {!! Form::hidden('tekst-'.$nr,$tekst,['id'=>'tekst-'.$nr]) !!}
    {!! Form::hidden('url-'.$nr,null,['id'=>'url-'.$nr]) !!}
    {!! Form::hidden('type_id-'.$nr,5) !!}
    {!! Form::hidden('id-'.$nr,$id,['id'=>'id-'.$nr]) !!}
    <div class="col-md-11" contenteditable="true" data-tekst-id="{{$nr}}">
        {!! $tekst !!}
    </div>
    <i class="fa fa-arrows pull-right" aria-hidden="true"></i>
    <i class="fa fa-times pull-right tink-text-red" aria-hidden="true"></i>
</div>