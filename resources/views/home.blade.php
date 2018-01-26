@extends('layouts.kanban.app')

@section('content')

    <div class="topBoard w3-row-padding">
        <!-- Header -->
        <header class="w3-container" style="padding-top:22px">
            <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
        </header>

        <div class="w3-quarter">
            <div class="w3-container w3-red w3-padding-16">
                <div class="w3-left"><i class="fa fa-folder w3-xxxlarge"></i></div>
                <div class="w3-right">
                    <h3>{{ \Auth::user()->projects()->count() }}</h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Projets</h4>
            </div>
        </div>

        <div class="w3-quarter">
            <div class="w3-container w3-green w3-padding-16">
                <div class="w3-left"><i class="fa fa-file-code-o w3-xxxlarge"></i></div>
                <div class="w3-right">
                    <h3>{{ \Auth::user()->tasks()->count() }}</h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Tickets</h4>
            </div>
        </div>

        <div class="w3-quarter">
            <div class="w3-container w3-orange w3-text-white w3-padding-16">
                <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
                <div class="w3-right">
                    <h3>0</h3>
                </div>
                <div class="w3-clear"></div>
                <h4>Messages</h4>
            </div>
        </div>

        <div class="w3-quarter">
            <div class="w3-container w3-teal w3-padding-16">
                <div class="w3-left"><i class="fa fa-cogs w3-xxxlarge"></i></div>
                <div class="w3-right">
                    <h3>0</h3>
                </div>
                <div class="w3-clear"></div>
                <h4>options</h4>
            </div>
        </div>
    </div>

    <div class="recent w3-margin-top w3-row-padding">
        <!-- Header -->
        <header class="w3-container" style="padding-top:22px">
            <h5><b><i class="fa fa-folder"></i> Projets récents</b><a href="{{ route('projects.create') }}" class="w3-button w3-green w3-right w3-hover-lime">
                    Add
                    <i class="fa fa-plus-square"></i>
                </a></h5>

        </header>

        @foreach(\Auth::user()->projects()->orderBy('updated_at')->take(4)->get() as $project)
            <div class="w3-quarter">
                <div class="w3-container w3-padding-16 w3-center w3-round w3-card">
                    <a href="{{ route('projects.show', ['project' => $project]) }}">
                        <h3 class="w3-margin-bottom w3-hover-none"><b>{{ $project->titre }}</b></h3>
                    </a>
                    <div class="w3-half"><i class="fa fa-file-code-o w3-xxlarge w3-margin"></i></div>
                    <div class="w3-half">
                        <h3>{{ $project->tasks()->count() }}</h3>
                        <p> Tickets</p>
                    </div>
                    <div class="w3-clear"></div>
                    <div class="tag"><i class="fa fa-tags"></i> js-php</div>
                </div>
            </div>
        @endforeach

    </div>

    <div class="stat w3-row-padding">
        <!-- Header -->
        <header class="w3-container" style="padding-top:22px">
            <h5><b><i class="fa fa-area-chart"></i> Statistics</b></h5>
        </header>
    </div>
@endsection
