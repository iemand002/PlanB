<div class="row show-grid">
    <div class="col-md-4">
        <img src="{{((strpos($url,'http')===0||strpos($url,'/images')===0)?'':'/img').$url}}" alt="" class='img-responsive'>
    </div>
    <div class="col-md-8">
        {!! $section->tekst!!}
    </div>
</div>