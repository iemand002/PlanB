@extends('layout.main')

@section('pagetitle')
{{$project->naam}} - Projecten
@endsection

@section('css')
@yield('css-sub')
<style>
    .show-grid {
        margin-bottom: 15px;
    }
</style>
@endsection

@section('content')

<div class="row">
    <div class="col-sm-8">
        @if($project->milestones->count()!=0)
        @foreach($project->milestonesPublished[0]->sections as $section)
        <?php switch ($section->type_id){
            case 1:?>
            @include('section.h1',['tekst'=>$section->tekst])
            <?php break;
            case 2:?>
            @include('section.afbeelding',['url'=>$section->url])
            <?php break;
            case 3:?>
            @include('section.lart',['url'=>$section->url,'tekst'=>$section->tekst])
            <?php break;
            case 4:?>
            @include('section.ralt',['url'=>$section->url,'tekst'=>$section->tekst])
            <?php break;
            case 5:?>
            @include('section.tekst',['tekst'=>$section->tekst])
            <?php break;
        }?>
        @endforeach
        @else

        @endif
        <div class="row">
            <div class="projectVragen col-sm-12">
                <h3>Vragen</h3>
                @if(\Carbon\Carbon::createFromFormat('d/m/Y H:i:s',$project->milestones[0]->publish_till)->lt(\Carbon\Carbon::now()))
                <p>Vragen bij deze milestone kunnen niet meer beantwoord worden</p>
                @elseif($project->milestones[0]->vragen->count() == 0)
                <p>Er zijn nog geen vragen voor deze milestone</p>
                @else
                <?php $slideCounter = 0 ?>
                <div class="slider">
                    <div class="slide-container">
                        @foreach ($project->milestones[0]->vragen as $vraag)
                        <?php $slideCounter++ ?>
                        <div class="slide {{$slideCounter}}">
                            <p class="smallTitles">{{ ucfirst($vraag->vraag) }}</p>
                            @foreach ($vraag->antwoorden as $antwoord)
                            <button type="button" class="btn-success btn-block next"
                            id="{{$antwoord->id}}">{{ ucfirst($antwoord->antwoord) }}</button>
                            @endforeach
                        </div>
                        @endforeach
                        <?php $slideCounter++ ?>
                        <div class="slide {{$slideCounter}}">
                            @foreach ($project->milestones[0]->vragen as $vraag)
                            <?php $barColorCounter = 1 ?>
                            <p class="mediumTitles">{{ ucfirst($vraag->vraag) }}</p>

                            {{-- som van de antwoorden berekenen  --}}

                            <?php $totalAnswerCount = 0; ?>
                            @foreach ($vraag->antwoorden as $antwoord)
                            <?php $totalAnswerCount += $antwoord->aantal_gekozen; ?>
                            @endforeach

                            {{--  som van de antwoorden berekenen  --}}

                            @foreach ($vraag->antwoorden as $antwoord)
                            <?php $percent = $totalAnswerCount > 0 ? round(($antwoord->aantal_gekozen / $totalAnswerCount) * 100) : 0 ?>
                            <div>{{ ucfirst($antwoord->antwoord) }}</div>
                            <div class="progress">
                                <div class="progress-bar <?php switch ($barColorCounter) {
                                    case '1':
                                    echo "progress-bar-success";
                                    break;
                                    case '2':
                                    echo "progress-bar-info";
                                    break;
                                    case '3':
                                    echo "progress-bar-warning";
                                    break;
                                    case '4':
                                    echo "progress-bar-danger";
                                    break;
                                    default:
                                    echo "progress-bar-success";
                                    break;
                                } ?>" role="progressbar" aria-valuenow="{{ $percent }}"
                                aria-valuemin="0" aria-valuemax="100"
                                style="min-width:2%;width: {{ $percent }}%">
                                <p class="pollText">{{ $antwoord->aantal_gekozen }}</p>
                            </div>
                        </div>
                        <?php
                        if ($barColorCounter >= 4) {
                            $barColorCounter = 1;
                        } else {
                            $barColorCounter++;
                        }
                        ?>
                        @endforeach
                        <p><em>Aantal keer gestemd: {{ $totalAnswerCount }}</em></p>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
</div>
</div>

<div class="col-sm-4">
    <div class="row">
        <div class="col-sm-12">
            <h2>Projectinfo</h2>
            <h3>{{$project->naam}}</h3>
            <div>{{$project->beschrijving}}</div>
            <div class="likeDislike">
                <?php $likesPercentage = round(($project->milestones[0]->likes/($project->milestones[0]->likes+$project->milestones[0]->dislikes))*100) ?>
                <div class="progress">
                    <div class="progress-bar progress-bar-success" style="width: {{$likesPercentage}}%">
                        <p>Likes: {{ $project->milestones[0]->likes }}</p>
                    </div>
                    <div class="progress-bar progress-bar-danger" style="width: {{100-$likesPercentage}}%">
                        <p>Dislikes: {{ $project->milestones[0]->dislikes }}</p>
                    </div>
                </div>
            </div>
            <div>
                <p>Looptijd project:</p>
                <p>van: {{ $project->publish_from }}</p>
                <p>tot: {{ $project->publish_till }}</p>
                <div class="col-sm-4">
                    <div class="row">
                        <div class="col-sm-12">
                            <h2>Projectinfo</h2>
                            <h3>{{$project->naam}}</h3>
                            <div>{{$project->beschrijving}}</div>
                            <div>
                                <p>Looptijd project:</p>
                                <p>van: {{ $project->publish_from }}</p>
                                <p>tot: {{ $project->publish_till }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="projectMilestones col-sm-12">
                            <div class="timeline">
                                <div class="timeline-label">Milestones</div>
                                <ul class="timeline-list">
                                    @foreach ($project->milestones as $milestone)
                                    <li>
                                        <div class="timeline-list-label">
                                            <time datetime="{{ $milestone->publish_from_date_only}}">{{ $milestone->publish_from_date_only }}</time>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <p class="milestoneTitles"><strong>{{ $milestone->naam }}</strong></p>
                                                <p>{{ str_limit($milestone->beschrijving, $limit = 120, $end = '...')}}</p>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endsection