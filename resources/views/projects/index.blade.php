@extends('layouts.kanban.app')

@section('content')
    <div class="recent w3-margin-top w3-row-padding">
        <!-- Header -->
        <header class="w3-container w3-margin-bottom" style="padding-top:22px">
            <h5>
                <b class="">
                    <i class="fa fa-folder"></i>
                    Projets récents
                    <a href="{{ route('projects.create') }}" class="w3-button w3-green w3-right w3-hover-lime">
                        Add
                        <i class="fa fa-plus-square"></i>
                    </a>
                </b>

            </h5>
        </header>

        <div class="w3-quarter">
            <div class="w3-container w3-padding-16 w3-center w3-round w3-card w3-hover-text-teal">
                <h3 class="w3-margin-bottom"><b>projet 1</b></h3>
                <div class="w3-left"><i class="fa fa-file-code-o w3-xxlarge w3-margin"></i></div>
                <div class="w3-right">
                    <h3>6</h3>
                    <p> Tickets</p>
                </div>
                <div class="w3-clear"></div>
                <div class="tag"><i class="fa fa-tags"></i> js-php</div>
            </div>
        </div>

        <div class="w3-quarter">
            <div class="w3-container w3-padding-16 w3-center w3-round w3-card w3-hover-text-teal">
                <h3 class="w3-margin-bottom"><b>projet 1</b></h3>
                <div class="w3-left"><i class="fa fa-file-code-o w3-xxlarge w3-margin"></i></div>
                <div class="w3-right">
                    <h3>6</h3>
                    <p> Tickets</p>
                </div>
                <div class="w3-clear"></div>
                <div class="tag"><i class="fa fa-tags"></i> js-php</div>
            </div>
        </div>

        <div class="w3-quarter">
            <div class="w3-container w3-padding-16 w3-center w3-round w3-card w3-hover-text-teal">
                <h3 class="w3-margin-bottom"><b>projet 1</b></h3>
                <div class="w3-left"><i class="fa fa-file-code-o w3-xxlarge w3-margin"></i></div>
                <div class="w3-right">
                    <h3>6</h3>
                    <p> Tickets</p>
                </div>
                <div class="w3-clear"></div>
                <div class="tag"><i class="fa fa-tags"></i> js-php</div>
            </div>
        </div>

        <div class="w3-quarter">
            <div class="w3-container w3-padding-16 w3-center w3-round w3-card w3-hover-text-teal">
                <h3 class="w3-margin-bottom"><b>projet 1</b></h3>
                <div class="w3-left"><i class="fa fa-file-code-o w3-xxlarge w3-margin"></i></div>
                <div class="w3-right">
                    <h3>6</h3>
                    <p> Tickets</p>
                </div>
                <div class="w3-clear"></div>
                <div class="tag"><i class="fa fa-tags"></i> js-php</div>
            </div>
        </div>
    </div>

    <div class="all w3-margin-top w3-row-padding">
        <!-- Header -->
        <header class="w3-container" style="padding-top:22px">
            <h5>
                <b><i class="fa fa-folder"></i> Tous les projets</b>
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
                @foreach($projects as $project)
                    <tr>
                    <td>{{ $project->id }}</td>
                    <td>{{ $project->titre }}</td>
                    <td>{{ substr($project->description, 0, 50) }}...</td>
                    <td>{{ $project->dateLine }}</td>
                    <td>
                        <a href="{{ route('projects.show', $project) }}"><button class="w3-button w3-blue w3-hover-light-blue"><i class="fa fa-eye"></i></button></a>
                        <a href="{{ route('projects.show', $project) }}"><button class="w3-button w3-orange w3-hover-amber"><i class="fa fa-pencil"></i></button></a>
                        <form action="{{ route('projects.destroy', ['project' => $project]) }}" method="post" style="display: inline-block">
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