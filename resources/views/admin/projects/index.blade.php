@extends('layouts/main-layout')

@section('content')
<div class="all-project-admin">
  <div class="container">
    <div class="card-container">
      @foreach ($projects as $project)
      <div class="card-inner">
        <a href="{{route('guest.projects.show', $project->slug)}}" class="card">
          <div class="div">
            <h5 class="card-title">{{$project->name}}</h5>
            <span class="desc">{{$project->desc}}</span>
            <div class="lang-section">
              <span class="title-lang">Linguaggi utilizzati:</span>
              <span class="lang">{{$project->language}}</span>
            </div>
          </div>
        </a>
        <div class="edit-delete">
          <a class="edit" href="{{ route('projects.edit', $project) }}"><i class="fa-regular fa-pen-to-square"></i></a>
          <button type="button" class="btn btn-danger mb-4" data-toggle="modal" data-target="#exampleModal">
            Cancella
          </button>
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="deleteModalLabel">Sei sicuro di voler cancellare questo progetto?</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  La cancellazione sarà definitiva e irreversibile.
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                  <form action="{{route('projects.destroy', $project)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit" data-toggle="modal" data-target="#deleteModal">CANCELLA</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
@endsection
