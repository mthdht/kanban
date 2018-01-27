@extends('layouts.kanban.app')

@section('content')
    <div class=" w3-row-padding">
        <!-- Header -->
        <header class="w3-container" style="padding-top:22px">
            <h5><b><i class="fa fa-folder"></i> {{ $project->titre }} <span class="w3-right"> Date-line: {{ $project->dateLine }}</span></b></h5>
        </header>

        <div class="container">
            projet : {{ $project }} <br>
            projet categories: <br>
            @foreach($project->categories as $category)
                {{ $category->titre }} <br>
                @foreach($category->tasks as $task)
                    tache: {{ $task }} <br>
                @endforeach
            @endforeach
            <br>
            projet taches:  <br>
            @foreach($project->tasks as $task)
                tache: {{ $task }} <br>
            @endforeach



        </div>
    </div>

@endsection