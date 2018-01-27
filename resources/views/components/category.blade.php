<div class="w3-border category  w3-card">
    <div title="{{ $category->description }}" class="titre w3-container w3-white w3-text-gray w3-bottombar w3-border-orange">
        <h5>
            <b><i class="fa fa-arrows-h"></i> {{ $category->titre }}</b>
            <span class="w3-dropdown-click w3-right w3-hover-none">
                        <i class="fa fa-cog" onclick="toggle('category-{{ $category->id }}')"></i>
                        <div id="category-{{ $category->id }}" class="w3-dropdown-content w3-bar-block w3-border" style="right: 0;">
                            <button class="w3-bar-item w3-button" onclick="toggle('addTask{{ $category->id }}');toggle('category-{{ $category->id }}')"><b>Ajouter une tache</b></button>
                            <button class="w3-bar-item w3-button" onclick="document.getElementById('deleteCategory-{{ $category->id }}').submit()"><b>Effacer category</b></button>
                            <form action="{{ route('categories.destroy', ['category' => $category]) }}" method="POST" id="deleteCategory-{{ $category->id }}">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                            </form>
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
            @component('components.task', ['task' => $task, 'category' => $category])
            @endcomponent
        @endforeach
    </div>
</div>