@extends('layouts/main-layout')

@section('content')

<div class="container">
  <div class="addProjects">
    <h1>Aggiungi un tipo</h1>
    
    <form action="{{route('admin.types.store')}}" method="POST">
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
      <label for="desc">Aggiungi una descrizione</label>
      <textarea required class="form-control @error('desc') is-invalid @enderror" id="desc" name="desc">{{old('desc')}}</textarea>
      @error('desc')
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