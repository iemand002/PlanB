@extends('layout.main')
@section('pagetitle')
    Alle projecten
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12 ">
            <?php $counter = 0 ?>
            <div class="filter-bar">
                <div class="row">
                    <div class="col-xs-12 col-sm-9">
                        <div class="bar">
                            <ul class="bar-left">
                                <li><a class="filter-bar-item" disabled="">Filter:</a></li>
                                <li>
                                    <a class="filter-bar-item active" data-filter="*">Alle themas</a>
                                </li>

                                @foreach($themas as $thema)
                                    <li>
                                        <a class="filter-bar-item" data-filter=".{{$thema->slug}}">{{$thema->naam}}</a>
                                    </li>
                                {{--<button data-filter=".{{$thema->slug}}">{{$thema->naam}}</button>--}}
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            {{--<button data-filter="*" class="active">Alle themas</button>--}}
            {{--@foreach($themas as $thema)--}}
            {{--<button data-filter=".{{$thema->slug}}">{{$thema->naam}}</button>--}}
            {{--@endforeach--}}
            {{--</div>--}}

            <div class="row projecten">
                @foreach ($projecten as $project)
                    <div class="col-sm-6 project {{$project->thema->slug}}">
                        <a href="{{ route('project.show', $project->slug) }}"><h2 class="projectTitle">{{ ucfirst($project->naam) }}</h2>
                        </a>
                        <div class="row">
                            <?php $url = $project->milestones[0]->afbeelding ?>
                            <div class="col-sm-6 projectImage"><img
                                        src="{{((strpos($url,'http')===0||strpos($url,'/images')===0)?'':'/img').$url}}"
                                        alt="" class='img-responsive'></div>
                            <div class="col-sm-6 projectText"><p
                                        class="justify">{{ $project->beschrijving }}</p>
                            </div>
                        </div>
                        <p>Looptijd: {{ $project->publish_from }} t.e.m. {{$project->publish_till}}</p>
                        <p>Thema: {{$project->thema->naam}}</p>
                        <div>
                            @if ((($project->milestones[0]->likes+$project->milestones[0]->dislikes)) != 0)
                                <?php $likesPercentage = round(($project->milestones[0]->likes / ($project->milestones[0]->likes + $project->milestones[0]->dislikes)) * 100);
                                if ($likesPercentage > 90) {
                                    $likesPercentage = 90;
                                } else if ($likesPercentage < 10) {
                                    $likesPercentage = 10;
                                }?>
                            @else
                                <?php $likesPercentage = 50 ?>
                            @endif
                            <div class="progress">
                                <div class="progress-bar progress-bar-success" style="width: {{$likesPercentage}}%">
                                    <p>{{ $project->milestones[0]->likes }}</p>
                                </div>
                                <div class="progress-bar progress-bar-danger"
                                     style="width: {{100-$likesPercentage}}%">
                                    <p>{{ $project->milestones[0]->dislikes }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        var $projecten = $('.projecten').isotope({
            itemSelector: '.project',
            layoutMode: 'fitRows'
        });
        {{-- filter items on button click --}}
        $('.bar-left').on('click', 'li a', function () {
            var filterValue = $(this).attr('data-filter');
            $projecten.isotope({filter: filterValue});
        });
        {{-- change active class on buttons --}}
        $('.bar ul').each(function (i, buttonGroup) {
            var $buttonGroup = $(buttonGroup);
            $buttonGroup.on('click', 'li a', function () {
                $buttonGroup.find('.active').removeClass('active');
                $(this).addClass('active');
            });
        });
        $('.projectText').ellipsis();
    </script>
@endsection