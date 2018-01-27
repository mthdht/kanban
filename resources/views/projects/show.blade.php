@extends('layouts.kanban.app')

@section('content')
    <div class=" w3-row-padding">
        <!-- Header -->
        <header class="w3-container" style="padding-top:22px">
            <h5>
                <b id="projectTitre" onclick="toggle('projectTitreInput');document.getElementById('projectTitre').style.display = 'none';document.getElementById('projectTitreInput').focus()">
                    <i class="fa fa-folder"></i> {{ $project->titre }}
                </b>

                <b id="projetDateLine" class="w3-right" onclick="toggle('projectDateLineInput');document.getElementById('projectDateLine').style.display = 'none';document.getElementById('projectDateLineInput').focus()">
                    <span> Date-line: <span>{{ $project->dateLine }}</span></span>
                </b>
                <form action="{{ route('projects.update', ['project' => $project]) }}" id="projectTitreForm" method="POST" style="width: 90%;">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <input type="text" name="titre" value="{{ $project->titre }}" class="w3-input w3-border" id="projectTitreInput" style="display: none;"
                           onblur="document.getElementById('projectTitreForm').submit()">
                </form>

                <form action="{{ route('projects.update', ['project' => $project]) }}" id="projectDateLineForm" method="POST" class="w3-right">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <input type="hidden" name="titre" value="{{ $project->titre }}">
                    <input type="date" name="dateLine" value="{{ $project->dateLine }}" class="w3-input w3-border" id="projectDateLineInput" style="display: none;"
                           onblur="document.getElementById('projectDateLineForm').submit()">
                </form>
            </h5>

        </header>
    </div>

    <div class="board w3-margin" style="display: inline-flex;align-items: flex-start">
        @foreach($project->categories as $category)
            @component('components.category', ['category' => $category])
            @endcomponent
        @endforeach

        <div class="w3-border addCategory w3-card">
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

        <!-- The Modal -->
        <div id="modal" class="w3-modal ">
            <div class="w3-modal-content w3-card">
                <div class="w3-container w3-padding">
                    <span onclick="document.getElementById('modal').style.display='none'" class="w3-button w3-display-topright w3-xlarge">&times;</span>
                    <header class="w3-container w3-border-bottom w3-padding w3-text-gray">
                        <h5 id="modalTitre" onclick="toggle('titreInput');document.getElementById('modalTitre').style.display = 'none';document.getElementById('titreInput').focus()">

                        </h5>
                        <form action="" method="POST" id="titreForm">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <input type="text" name="titre" value="" class="w3-input w3-border" id="titreInput" style="display: none;"
                                   onblur="document.getElementById('titreForm').submit()">
                        </form>
                     </header>

                    <div class="w3-container w3-padding">
                        Catégory:
                        <button class="w3-button w3-text-blue-gray" onclick="toggle('modalCategoryChange')" id="modalCategory">

                        </button>

                        <div id="modalCategoryChange" class="w3-dropdown-content w3-bar-block w3-border w3-light-gray" style="width:290px;">
                            <span onclick="toggle('modalCategoryChange')" class="w3-button w3-display-topright w3-blue-gray">&times;</span>
                            <header class="w3-container w3-border-bottom w3-padding w3-blue-gray">
                                <h5> Changer de catégorie</h5>
                            </header>
                            <div class="w3-margin">
                                <form action="" method="POST" id="category_idForm">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}

                                    <select class="w3-select w3-dark-gray w3-col m7 w3-margin-right" name="category_id">
                                        <option value="" disabled selected>Choisir catégorie</option>
                                        @foreach($project->categories as $category)
                                            <option value="{{ $category->id }}" >{{ $category->titre }}</option>
                                        @endforeach
                                    </select>

                                    <button type="submit" class="w3-button w3-green">Envoyer</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="w3-container w3-padding">
                        Date line:
                        <button class="w3-button" id="modalDateLine" onclick="toggle('dateLineInput');document.getElementById('modalDateLine').style.display = 'none';document.getElementById('dateLineInput').focus()">

                        </button>
                        <form action="" method="POST" id="dateLineForm">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <input type="date" name="dateLine" value="" class="w3-input w3-border" id="dateLineInput" style="display: none;"
                                   onblur="document.getElementById('dateLineForm').submit()">
                        </form>

                    </div>

                    <div id="description w3-container" class="w3-col m9">
                        <header class="w3-padding w3-text-gray">
                            Description:
                            <button class="w3-button" onclick="toggle('descriptionForm');toggle('modalDescription');document.getElementById('descriptionInput').focus()">Editer</button>
                        </header>
                        <div class="w3-container text">
                            <pre class="w3-white w3-border-0 w3-text-gray w3-show" id="modalDescription" style="display: none;" onclick="toggle('descriptionForm');toggle('modalDescription');document.getElementById('descriptionInput').focus()">

                            </pre>
                            <form action="" method="POST" id="descriptionForm" style="display: none;">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <textarea type="text" name="description" value="" class="w3-input w3-border" id="descriptionInput" rows="6"></textarea>
                                <button class="w3-button w3-green w3-margin" type="submit">Envoyer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
