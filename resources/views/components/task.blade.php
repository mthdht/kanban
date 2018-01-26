<div class="task w3-card w3-white w3-margin-top w3-margin-bottom w3-round">
    <header class="w3-container w3-border-bottom w3-padding w3-text-gray">
        <b> {{ $task->titre }}  </b>
        <span class="w3-dropdown-click w3-right w3-hover-none">
            <i class="fa fa-cog" onclick="toggle('task-{{ $task->id }}')"></i>

            <div id="task-{{ $task->id }}" class="w3-dropdown-content w3-bar-block w3-border" style="right: 0;">
                <button class="w3-bar-item w3-button" onclick="modal({{ $task }}, '{{ $category->titre }}');toggle('task-{{ $task->id }}')">Voir/edit tache</button>
                <button class="w3-bar-item w3-button"  onclick="document.getElementById('deleteTask-{{ $task->id }}').submit()">Effacer tache</button>
                <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST" id="deleteTask-{{ $task->id }}">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                 </form>
            </div>
        </span>
    </header>

    <div class="description w3-container ">
        <button class="w3-button" onclick="modal({{ $task }}, '{{ $category->titre }}')">
            <i class="fa fa-tasks"></i> <span class="w3-margin-left"> plus</span>
        </button>
        <pre class="w3-tiny w3-text-blue-gray w3-white w3-border" onclick="modal({{ $task }}, '{{ $category->titre }}')">{{ substr($task->description, 0 , 40) }} ...</pre>
    </div>

    <div class="tags w3-container w3-border-top w3-padding" >
        <div id="tag" onclick="toggle('addTaskTag-{{ $task->id }}');document.getElementById('addTaskTagInput-{{ $task->id }}').focus()">
            <i class="fa fa-tags"></i>
            @foreach($task->tags as $tag)
                <span class="w3-tag w3-orange">{{ $tag->titre }}</span>
            @endforeach
        </div>
        <form action="{{ route('tags.store') }}" method="POST" id="addTaskTag-{{ $task->id }}" style="display: none;">
            {{ csrf_field() }}
            <input type="hidden" name="task_id" value="{{ $task->id }}">
            <input type="text" id="addTaskTagInput-{{ $task->id }}" class="w3-input w3-border" placeholder="Ex: php" name="titre" value="" onblur="document.getElementById('addTaskTag-{{ $task->id }}').submit()">
        </form>
    </div>
</div>