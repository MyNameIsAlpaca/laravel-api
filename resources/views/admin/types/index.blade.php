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
        
        @foreach ($types as $type)
        <tr>
          <th scope="row">{{$type->id}}</th>
          <td>{{$type->name}}</td>
          <td>{{$type->desc}}</td>
          <td><a href="{{ route('types.edit', $type) }}"><i class="fa-solid fa-pen-to-square"></i></a></td>
          <td>
            <a href="">
              <a type="button" class="fa-solid fa-trash" data-toggle="modal" data-target="#exampleModal">
              </a>
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="deleteModalLabel">Sei sicuro di voler cancellare questo tipo?</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      La cancellazione sarà definitiva e irreversibile.
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                      <form action="{{route('types.destroy', $type->id)}}" method="POST">
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
    <a href="{{ route('admin.types.create') }}">
      <button class="btn btn-secondary">
        Aggiungi un tipo
      </button>
    </a>
  </div>

</div>


@endsection
