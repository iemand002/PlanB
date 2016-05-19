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
            {!! Form::label('naam', "Locatie", ['class'=>'col-sm-2 control-label']) !!}
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
    </div>
    <div role="tabpanel" class="tab-pane" id="template">
        <div class="row">
            <div class="col-md-8 box" id="sortable">
            </div>
            <div class="col-md-4 box">
                <div class="list-group" id="draggable">
                    <div class="row list-group-item">
                        <div class="col-md-11">
                            <h1>Header h1</h1>
                        </div>
                    </div>
                    <div class="row list-group-item">
                        <div class="col-md-11">
                            <img src="/images/dummy.png">
                        </div>
                    </div>
                    <div class="row list-group-item">
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
                </div>
            </div>
        </div>
    </div>
</div>
@section('css-sub')
    <link rel="stylesheet" href="/css/jquery-ui.css">
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

        .ghost {
            opacity: .2;
        }
    </style>
@endsection
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
    <script src="//cdnjs.cloudflare.com/ajax/libs/Sortable/1.4.2/Sortable.min.js"></script>
    <script>
        Sortable.create(document.getElementById('draggable'), {
            sort: false,
            group: {
                name: 'advanced',
                pull: 'clone',
                put: false
            }
        });
        Sortable.create(document.getElementById('sortable'), {
            sort: true,
            group: {
                name: 'advanced',
                pull: false,
                put: true
            },
            handle: '.fa-arrows',
            filter: '.fa-times',
            animation: 0,
            ghostClass: 'ghost',
            onAdd: function (evt) {
                var item = evt.item;
                var move = document.createElement('i');
                move.setAttribute('class', 'fa fa-arrows pull-right');
                move.setAttribute('aria-hidden', 'true');
                item.appendChild(move);
                var del = document.createElement('i');
                del.setAttribute('class', 'fa fa-times pull-right tink-text-red');
                del.setAttribute('aria-hidden', 'true');
                item.appendChild(del);
            },
            onFilter: function (evt) {
                evt.item.parentNode.removeChild(evt.item);
            }
        });
    </script>
@endsection