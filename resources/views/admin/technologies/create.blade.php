@extends('layouts/main-layout')

@section('content')

<div class="container">
  <div class="addProjects">
    <h1>Aggiungi un tipo</h1>
    
    <form action="{{route('admin.technologies.store')}}" method="POST">
    @csrf

    <div class="mb-3">
      <label for="name">Aggiungi un nome</label>
      <input required value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name">
      @error('name')
          <div class="invalid-feedback">
            {{$message}}
          </div>
        @enderror
    </div>
    <div class="mb-3">
      <label for="color">Aggiungi un colore</label>
      <input type="color" required value="{{old('color')}}" class="form-control form-control-color @error('color') is-invalid @enderror" id="color" name="color">
      @error('color')
          <div class="invalid-feedback">
            {{$message}}
          </div>
        @enderror
    </div>
    
    <button type="submit" class="btn btn-primary">Aggiungi</button>
    </form>
  </div>
</div>


@endsection