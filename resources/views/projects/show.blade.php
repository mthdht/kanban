@extends('layouts.kanban.app')

@section('content')
    <div class=" w3-row-padding">
        <!-- Header -->
        <header class="w3-container" style="padding-top:22px">
            <h5><b><i class="fa fa-folder"></i> {{ $project->titre }} <span
                            class="w3-right"> Date-line: {{ $project->dateLine }}</span></b></h5>
        </header>
    </div>

    <div class="board w3-margin" style="display: inline-flex;align-items: flex-start">
        @foreach($project->categories as $category)
            <div class="w3-border category">
                <div title="{{ $category->description }}" class="titre w3-container w3-white w3-text-gray w3-bottombar w3-border-orange">
                    <h5>
                        <b><i class="fa fa-arrows-h"></i> {{ $category->titre }}</b>
                        <span class="w3-dropdown-click w3-right w3-hover-none">
                        <i class="fa fa-cog" onclick="toggle('category-{{ $category->id }}')"></i>

                        <div id="category-{{ $category->id }}" class="w3-dropdown-content w3-bar-block w3-border" style="right: 0;">
                            <a href="#" class="w3-bar-item w3-button">Link 1</a>
                            <a href="#" class="w3-bar-item w3-button">Link 2</a>
                            <a href="#" class="w3-bar-item w3-button">Link 3</a>
                        </div>
                    </span>
                    </h5>
                </div>
                <div class="tasks w3-container w3-blue-gray">
                    <div class="addTask w3-card w3-white w3-margin w3-round">
                        <header class="w3-container w3-border-bottom w3-padding w3-light-gray"
                                onclick="toggle('addTask{{ $category->id }}')">
                            <i class="fa fa-plus-square"></i><b> Ajouter une tache </b>
                        </header>

                        <form action="{{ route('tasks.store') }}" method="POST" class="form w3-container w3-padding w3-hide w3-dark-gray" id="addTask{{ $category->id }}">
                            {{ csrf_field() }}
                            <input type="text" name="titre" value="" placeholder="Ex: faire ceci ou cela"
                                   class="w3-input w3-round w3-light-gray"/>
                            <input type="hidden" value="{{ $category->id }}" name="category_id">
                            <button class="w3-button w3-green w3-margin-top" type="submit">
                                Envoyer
                            </button>
                        </form>

                    </div>
                    @foreach($category->tasks as $task)
                        <div class="task w3-card w3-white w3-margin-top w3-margin-bottom w3-round">
                            <header class="w3-container w3-border-bottom w3-padding w3-text-gray">
                                <b> {{ $task->titre }}  </b>
                                <span class="w3-dropdown-click w3-right w3-hover-none">
                                    <i class="fa fa-cog" onclick="toggle('task-{{ $task->id }}')"></i>

                                    <div id="task-{{ $task->id }}" class="w3-dropdown-content w3-bar-block w3-border" style="right: 0;">
                                        <a href="#" class="w3-bar-item w3-button">Link 1</a>
                                        <a href="#" class="w3-bar-item w3-button">Link 2</a>
                                        <a href="#" class="w3-bar-item w3-button">Link 3</a>
                                    </div>
                                </span>
                            </header>

                            <div class="description w3-container ">
                                <button class="w3-button">
                                    <i class="fa fa-tasks"></i> <span class="w3-margin-left"> plus</span>
                                </button>
                                <p class="w3-text-blue-gray">{{ substr($task->description, 0 , 80) }} ...</p>
                            </div>

                            <div class="tags w3-container w3-border-top w3-padding">
                                <i class="fa fa-tags"></i>
                                <span class="w3-tag w3-orange">js</span>
                                <span class="w3-tag w3-blue-gray">php</span>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        @endforeach

        <div class="w3-border addCategory ">
            <div class="w3-container w3-white w3-text-gray w3-bottombar w3-border-orange">
                <h5><b><i class="fa fa-plus-square"></i> Nouvelle catégorie</b></h5>
            </div>

            <div class="add w3-container w3-dark-gray w3-padding">
                <form action="{{ route('categories.store') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="text" name="titre" value="" placeholder="Ex: To-Do"
                           class="w3-input w3-round w3-light-gray"/>
                    <input type="hidden" value="{{ $project->id }}" name="project_id">
                    @if ($errors->has('titre'))
                        <span class="help-block">
                        <strong>{{ $errors->first('titre') }}</strong>
                    </span>
                    @endif
                    <button class="w3-button w3-green w3-margin-top" type="submit">
                        Envoyer
                    </button>
                </form>
            </div>
        </div>
@endsection
