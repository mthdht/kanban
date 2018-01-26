@extends('layouts.kanban.app')

@section('content')
    <div class="recent w3-margin-top w3-row-padding">
    <!-- Header -->
    <header class="w3-container" style="padding-top:22px">
        <h5><b><i class="fa fa-folder"></i> Taches récentes</b></h5>

    </header>

    @foreach(\Auth::user()->tasks()->orderBy('updated_at')->take(4)->get() as $task)
        <div class="w3-col m4 l3">
            <div class="w3-container w3-padding w3-round w3-card" style="height: 150px;">

                <div class="w3-display-container w3-padding-top" style="height: 100%;">
                    <a href="{{ route('projects.show', ['project' => $task->category->project]) }}" class="w3-display-topmiddle w3-center">
                        <h5 class="w3-hover-none w3-medium"><b>{{ $task->titre }}</b></h5>
                    </a>
                    <div class="w3-display-left"><i class="fa fa-code"></i></div>
                    <div class=" w3-display-right w3-small" style="width: 80%">
                        {{ substr($task->description, 0, 50) }} ...
                    </div>
                    <div class="tag w3-display-bottomleft">
                        <i class="fa fa-tags"></i>
                        @foreach($task->tags as $tag)
                            <span class="w3-tag w3-orange">{{ $tag->titre }}</span>
                        @endforeach
                    </div>
                </div>

                <div class="w3-clear"></div>

            </div>
        </div>
    @endforeach

    </div>

    <div class="all w3-margin-top w3-row-padding">
    <!-- Header -->
    <header class="w3-container" style="padding-top:22px">
        <h5>
            <b><i class="fa fa-folder"></i> Toutes les taches</b>
        </h5>
    </header>

    <table class="w3-table w3-striped w3-hoverable">
        <thead>
        <tr class="w3-blue-gray">
            <th>Id</th>
            <th>Titre</th>
            <th>Description</th>
            <th>Dateline</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
            <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->titre }}</td>
                <td>{{ substr($task->description, 0, 50) }}...</td>
                <td>{{ $task->dateLine }}</td>
                <td>
                    <a href="{{ route('projects.show', ['project' => $task->category->project]) }}"><button class="w3-button w3-blue w3-hover-light-blue"><i class="fa fa-eye"></i></button></a>
                    <a href="{{ route('projects.show', ['project' => $task->category->project]) }}"><button class="w3-button w3-orange w3-hover-amber"><i class="fa fa-pencil"></i></button></a>
                    <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="post" style="display: inline-block">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="w3-button w3-red w3-hover-pink"><i class="fa fa-trash"></i></button>
                    </form>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
@endsection