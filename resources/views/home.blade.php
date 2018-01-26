@extends('layouts.kanban.app')

@section('content')

    <div class="topBoard w3-row-padding">
        <!-- Header -->
        <header class="w3-container" style="padding-top:22px">
            <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
        </header>

        @component('components.topCard')
            @slot('icon')
                folder
            @endslot
            @slot('title')
                Projets
            @endslot
            @slot('count')
                {{ \Auth::user()->projects()->count() }}
            @endslot
            @slot('color')
                red
            @endslot
        @endcomponent

        @component('components.topCard')
            @slot('icon')
                code
            @endslot
            @slot('title')
                Tasks
            @endslot
            @slot('count')
                {{ \Auth::user()->tasks()->count() }}
            @endslot
            @slot('color')
                green
            @endslot
        @endcomponent

        @component('components.topCard')
            @slot('icon')
                envelope
            @endslot
            @slot('title')
                Messages
            @endslot
            @slot('count')
                0
            @endslot
            @slot('color')
                amber
            @endslot
        @endcomponent

        @component('components.topCard')
            @slot('icon')
                cog
            @endslot
            @slot('title')
                Settings
            @endslot
            @slot('count')
                0
            @endslot
            @slot('color')
                teal
            @endslot
        @endcomponent
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
