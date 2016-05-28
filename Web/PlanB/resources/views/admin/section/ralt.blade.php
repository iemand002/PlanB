<div class="row list-group-item" draggable="false" data-id="{{$nr}}">
    {!! Form::hidden('tekst-'.$nr,$tekst,['id'=>'tekst-'.$nr]) !!}
    {!! Form::hidden('url-'.$nr,$url,['id'=>'url-'.$nr,'onchange'=>"handle_image_change('$nr')"]) !!}
    {!! Form::hidden('type_id-'.$nr,4) !!}
    {!! Form::hidden('id-'.$nr,$id,['id'=>'id-'.$nr]) !!}
    <div class="col-md-7" contenteditable="true" data-tekst-id="{{$nr}}">
        {!! $tekst!!}
    </div>
    <div class="col-md-4">
        <img src="{{((strpos($url,'http')===0||strpos($url,'/images')===0)?'':'/img').$url}}"
             data-url-id="{{$nr}}" id="img-{{$nr}}">
    </div>
    <i class="fa fa-arrows pull-right" aria-hidden="true"></i>
    <i class="fa fa-times pull-right tink-text-red" aria-hidden="true"></i>
</div>