@extends('layouts/main-layout')

@section('content')

<div class="container">
  <div class="addProjects">
    <h1>Modifica un tipo</h1>
    
    <form action="{{route('types.update', $type)}}" method="POST">
    @csrf

    @method('PUT')

    <div class="mb-3">
      <label for="name">Modifica il nome</label>
      <input required value="{{old('name') ?? $type->name}}" class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name">
      @error('name')
          <div class="invalid-feedback">
            {{$message}}
          </div>
        @enderror
    </div>
    <div class="mb-3">
      <label for="desc">Modifica la descrizione</label>
      <textarea required class="form-control @error('desc') is-invalid @enderror" id="desc" name="desc">{{old('desc') ?? $type->desc}}</textarea>
      @error('desc')
          <div class="invalid-feedback">
            {{$message}}
          </div>
        @enderror
    </div>
    
    <button type="submit" class="btn btn-primary">Salva</button>
    </form>
  </div>
</div>


@endsection