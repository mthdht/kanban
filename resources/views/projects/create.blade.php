@extends('layouts.kanban.app')

@section('content')
    <div class="new w3-margin-top">
        <!-- Header -->
        <header class="w3-container" style="padding-top:22px">
            <h5><b><i class="fa fa-folder"></i> Ajouter un projet</b></h5>
        </header>

        <form class="w3-container w3-col m6" method="POST" action="{{ route('projects.store') }}">
            {{ csrf_field() }}

            <div class="w3-section {{ $errors->has('titre') ? ' has-error' : '' }}">
                <label class="">Titre</label>
                <input class="w3-input w3-border" type="text" placeholder="My project" name="titre" value=""/>

                @if ($errors->has('titre'))
                    <span class="help-block">
                        <strong>{{ $errors->first('titre') }}</strong>
                    </span>
                @endif
            </div>

            <div class="w3-section {{ $errors->has('description') ? ' has-error' : '' }}">
                <label>Description</label><br>
                <textarea name="description" value="" id="" rows="6" style="width: 100%" placeholder="Add a description of your project here..."></textarea>
                @if ($errors->has('description'))
                    <span class="help-block">
                        <strong>{{ $errors->first('description') }}</strong>
                    </span>
                @endif
            </div>

            <div class="w3-section {{ $errors->has('dateLine') ? ' has-error' : '' }}">
                <label class="">Date-line</label>
                <input class="w3-input w3-border" name="dateline" value="" type="date" placeholder=""/>

                @if ($errors->has('dateLine'))
                    <span class="help-block">
                        <strong>{{ $errors->first('dateLine') }}</strong>
                    </span>
                @endif
            </div>

            <div class="w3-section">
                <button class="w3-button w3-green" type="submit">Envoyer</button>
            </div>
        </form>
    </div>
@endsection