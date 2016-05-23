@section('buttons')
@endsection
<ul class="nav-tabs nav-lg" role="tablist">
    <li role="presentation" class="active"><a href="#details" aria-controls="details" role="tab" data-toggle="tab">Details</a>
    </li>
    <li role="presentation"><a href="#template" aria-controls="template" role="tab" data-toggle="tab">Template</a></li>
</ul>
<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="details">
        <div class="form-group">
            {!! Form::label('naam', "Naam", ['class'=>'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Form::text('naam',null,['id'=>'naam','class'=>'form-control','placeholder'=>"Milestone naam"]) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('locatie', "Locatie", ['class'=>'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Form::text('locatie',null,['id'=>'locatie','class'=>'form-control','placeholder'=>"Rond welke locatie speelt deze milestone zich af?"]) !!}
                {!! Form::hidden('coordinaten',null,['id'=>'location', 'data-geo'=>'location']) !!}
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
            {!! Form::label('beschrijving', "Beschrijving", ['class'=>'col-sm-2 control-label']) !!}
            <div class="col-sm-10">
                {!! Form::textarea('beschrijving',null,['id'=>'beschrijving','class'=>'form-control','placeholder'=>"Beschrijving van de milestone"]) !!}
                <span class="help-block">Beschrijving van de milestone, zichtbaar in de app en verkort in de tijdlijn</span>
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('afbeelding', "Afbeelding voor app", ['class'=>'col-sm-2 control-label']) !!}
            <div class="col-sm-6">
                <div class="input-group">
                    {!! Form::text('afbeelding',null,['id'=>'afbeelding','class'=>'form-control','placeholder'=>"Kies een afbeelding of geef een url","onchange"=>"handle_image_change2()"]) !!}
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
    </div>
    <div role="tabpanel" class="tab-pane" id="template">
        {!! Form::hidden('count',0,['id'=>'count']) !!}
        {!! Form::hidden('positions',null,['id'=>'positions']) !!}
        <div class="row">
            <div class="col-md-8 box" id="sortable">
            </div>
            <div class="col-md-4 box">
                <div class="list-group" id="draggable">
                    <div class="row list-group-item">
                        {!! Form::hidden('tekst','Header h1',['id'=>'tekst']) !!}
                        {!! Form::hidden('url',null,['id'=>'url']) !!}
                        {!! Form::hidden('type_id',1) !!}
                        <div class="col-md-11">
                            <h1>Header h1</h1>
                        </div>
                    </div>
                    <div class="row list-group-item">
                        {!! Form::hidden('tekst',null,['id'=>'tekst']) !!}
                        {!! Form::hidden('url',"/images/dummy.png",['id'=>'url']) !!}
                        {!! Form::hidden('type_id',2) !!}
                        <div class="col-md-11">
                            <img src="/images/dummy.png">
                        </div>
                    </div>
                    <div class="row list-group-item">
                        {!! Form::hidden('tekst',"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias commodi cum cupiditate
                            doloribus
                            et laborum, libero minima, odio omnis placeat quam tempora voluptate voluptates. Cumque hic
                            quod
                            sapiente tempora vel.",['id'=>'tekst']) !!}
                        {!! Form::hidden('url',"/images/dummy.png",['id'=>'url']) !!}
                        {!! Form::hidden('type_id',3) !!}
                        <div class="col-md-4">
                            <img src="/images/dummy.png">
                        </div>
                        <div class="col-md-7">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias commodi cum cupiditate
                            doloribus
                            et laborum, libero minima, odio omnis placeat quam tempora voluptate voluptates. Cumque hic
                            quod
                            sapiente tempora vel.
                        </div>
                    </div>
                    <div class="row list-group-item">
                        {!! Form::hidden('tekst',"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias commodi cum cupiditate
                            doloribus
                            et laborum, libero minima, odio omnis placeat quam tempora voluptate voluptates. Cumque hic
                            quod
                            sapiente tempora vel.",['id'=>'tekst']) !!}
                        {!! Form::hidden('url',"/images/dummy.png",['id'=>'url']) !!}
                        {!! Form::hidden('type_id',4) !!}
                        <div class="col-md-7">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias commodi cum cupiditate
                            doloribus
                            et laborum, libero minima, odio omnis placeat quam tempora voluptate voluptates. Cumque hic
                            quod
                            sapiente tempora vel.
                        </div>
                        <div class="col-md-4">
                            <img src="/images/dummy.png">
                        </div>
                    </div>
                    <div class="row list-group-item">
                        {!! Form::hidden('tekst',"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias commodi cum cupiditate
                            doloribus
                            et laborum, libero minima, odio omnis placeat quam tempora voluptate voluptates. Cumque hic
                            quod
                            sapiente tempora vel.",['id'=>'tekst']) !!}
                        {!! Form::hidden('url',null,['id'=>'url']) !!}
                        {!! Form::hidden('type_id',5) !!}
                        <div class="col-md-11">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias commodi cum cupiditate
                            doloribus
                            et laborum, libero minima, odio omnis placeat quam tempora voluptate voluptates. Cumque hic
                            quod
                            sapiente tempora vel.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('css-sub')
    <style>
        .box {
            border: 1px solid lightgray;
        }

        #sortable {
            min-height: 100px;
            min-height: calc(100vh - 200px);
        }

        #sortable, #draggable {
            list-style-type: none;
        }

        .sortable-ghost {
            opacity: .3;
        }

        [contenteditable]:focus {
            outline: 1px solid gray;
        }
    </style>
@endsection
@section('js-sub')
    <script>
        $(function () {
            $('.datepicker').datetimepicker({
                locale: 'nl',
                format: 'DD/MM/YYYY HH:mm:ss',
                sideBySide: true
            });
        });
    </script>
    {{--<script src="//cdnjs.cloudflare.com/ajax/libs/Sortable/1.4.2/Sortable.min.js"></script>--}}
    <script src="/js/Sortable.min.js"></script>
    <script>
        var count = 1;
        Sortable.create(document.getElementById('draggable'), {
            sort: false,
            group: {
                name: 'advanced',
                pull: 'clone',
                put: false
            }
        });
        var sortable = Sortable.create(document.getElementById('sortable'), {
            sort: true,
            group: {
                name: 'advanced',
                pull: false,
                put: true
            },
            handle: '.fa-arrows',
            filter: '.fa-times',
            animation: 0,
            onAdd: function (evt) {
                console.log(evt);
                var item = evt.item;
                item.setAttribute('data-id', count);
                var move = document.createElement('i');
                move.setAttribute('class', 'fa fa-arrows pull-right');
                move.setAttribute('aria-hidden', 'true');
                item.appendChild(move);
                var del = document.createElement('i');
                del.setAttribute('class', 'fa fa-times pull-right tink-text-red');
                del.setAttribute('aria-hidden', 'true');
                item.appendChild(del);
                var tekst = item.children[0];
                tekst.name = "tekst-" + count;
                tekst.id = "tekst-" + count;
                var url = item.children[1];
                url.name = "url-" + count;
                url.id = "url-" + count;
                url.setAttribute('onchange', "handle_image_change('" + count + "')");
                var type = item.children[2];
                type.name = "type_id-" + count;
                type.id = "type_id-" + count;
                var input;
                switch (type.value) {
                    case "1":
                        input = item.children[3].children[0];
                        input.contentEditable = true;
                        input.setAttribute('data-tekst-id', count);
                        break;
                    case "2":
                        input = item.children[3].children[0];
                        input.setAttribute('data-url-id', count);
                        input.id = 'img-' + count;
                        break;
                    case "3":
                        input = item.children[4];
                        input.contentEditable = true;
                        input.setAttribute('data-tekst-id', count);
                        input = item.children[3].children[0];
                        input.setAttribute('data-url-id', count);
                        input.id = 'img-' + count;
                        break;
                    case "4":
                        input = item.children[3];
                        input.contentEditable = true;
                        input.setAttribute('data-tekst-id', count);
                        input = item.children[4].children[0];
                        input.setAttribute('data-url-id', count);
                        input.id = 'img-' + count;

                        break;
                    case "5":
                        input = item.children[3];
                        input.contentEditable = true;
                        input.setAttribute('data-tekst-id', count);
                        break;
                }
                document.getElementById('count').value = count;
//                $("#count").val(count);
                count++;
                sortable.save();
            },
            onFilter: function (evt) {
                var id = evt.item.getAttribute('data-id');
                var inpHidden = document.createElement('input');
                inpHidden.setAttribute('type', 'hidden');
                inpHidden.setAttribute('name', 'del-' + id);
                inpHidden.setAttribute('value', true);
                document.getElementById('template').appendChild(inpHidden);
                evt.item.parentNode.removeChild(evt.item);
                sortable.save();
            },
            onRemove: function (evt) {
                console.log(evt);
            },
            store: {
                /**
                 * Get the order of elements. Called once during initialization.
                 * @param   {Sortable}  sortable
                 * @returns {Array}
                 */
                get: function (sortable) {
//                    console.log(sortable);
//                    var order = localStorage.getItem(sortable.options.group);
//                    return order ? order.split('|') : [];
                    return [];
                },

                /**
                 * Save the order of elements. Called onEnd (when the item is dropped).
                 * @param {Sortable}  sortable
                 */
                set: function (sortable) {
                    console.log(sortable.toArray());
                    document.getElementById('positions').value = sortable.toArray();
//                    var order = sortable.toArray();
//                    localStorage.setItem(sortable.options.group, order.join('|'));
                }
            }
        });
        $('#sortable').on('blur', '[contenteditable]', function () {
            var id = $(this)[0].getAttribute('data-tekst-id');
            $("#tekst-" + id).val($(this)[0].innerHTML);
        }).on('click', 'img', function () {
            console.log($(this));
            window.open('{{route('upload.picker')}}?id=url-' + $(this)[0].getAttribute('data-url-id'), 'imagepicker', 'width=1000,height=500,scrollbars=yes,toolbar=no,location=no');
            var id = $(this)[0].getAttribute('data-tekst-id');
            $("#tekst-" + id).val($(this)[0].innerHTML);
        });
        function handle_image_change(id) {
            $('#img-' + id).attr("src", function () {

                var value = $('#url-' + id).val();
                if (value.substr(0, 4) != 'http') {
                    value = '/img' + value;
                }
                return value;
            });
        }
        function handle_image_change2() {
            $("#image-preview").attr("src", function () {

                var value = $("#afbeelding").val();
                if (value.substr(0, 4) != 'http') {
                    value = '/img' + value;
                }
                return value;
            });
        }
    </script>
@endsection