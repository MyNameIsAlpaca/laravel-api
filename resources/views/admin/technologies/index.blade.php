@extends('layouts/main-layout')

@section('content')

<div class="admin-type-section">
  <div class="container">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">Name</th>
          <th scope="col">Descrizione</th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($technologies as $technology)
        <tr>
          <th scope="row">{{$technology->id}}</th>
          <td>{{$technology->name}}</td>
          <td>{{$technology->desc}}</td>
          <td><a href="{{ route('technologies.edit', $technology) }}"><i class="fa-solid fa-pen-to-square"></i></a></td>
          <td>
            <a href="">
              <a type="button" class="fa-solid fa-trash" data-toggle="modal" data-target="#exampleModal">
              </a>
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
                      <form action="{{route('technologies.destroy', $technology->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit" data-toggle="modal" data-target="#deleteModal">CANCELLA</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <a href="{{ route('admin.technologies.create') }}">
      <button class="btn btn-secondary">
        Aggiungi un linguaggio
      </button>
    </a>
  </div>

</div>


@endsection
