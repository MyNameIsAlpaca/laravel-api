@extends('layouts/main-layout')

@section('content')

<div class="container">
  <div class="addProjects">
    <h1>Aggiungi un progetto</h1>
    
    <form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    

    <div class="mb-3">
      <label for="project_image">Aggiungi un'immagine</label>
      <input type="file" id="project_image" name="project_image" class="form-control @error('project_image') is-invalid @enderror">
      @error('project_image')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>

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
    <div class="mb-3">
      <label for="publication_date">Aggiungi una data di pubblicazione</label>
      <input required value="{{old('publication_date')}}" class="form-control @error('publication_date') is-invalid @enderror" type="date" id="publication_date" name="publication_date">
      @error('publication_date')
          <div class="invalid-feedback">
            {{$message}}
          </div>
        @enderror
    </div>
    <div class="mb-3">
      <label for="link">Aggiungi un link</label>
      <input required value="{{old('link')}}" class="form-control @error('link') is-invalid @enderror" type="text" id="link" name="link">
      @error('link')
          <div class="invalid-feedback">
            {{$message}}
          </div>
        @enderror
    </div>
    <div class="mb-3">
      <label for="type_id">Tipo di progetto</label>
      <select class="form-select @error('type_id') is-invalid @enderror" name="type_id" id="type_id">
        <option value="">Scegli</option>
        @foreach ($types as $type)
            <option value="{{$type->id}}" {{$type->id == old('type_id') ? 'selected' : ''}}>{{$type->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="mb-3 form-group">
      <h4>Tecnologie utlizzate</h4>
      @foreach($technologies as $technology)
      <input type="checkbox" id="technology-{{$technology->id}}" name="technologies[]" value="{{$technology->id}}">
      <label for="technology-{{$technology->id}} ">{{$technology->name}}</label>
      @endforeach
    </div>
    <button type="submit" class="btn btn-primary">Aggiungi</button>
    </form>
  </div>
</div>


@endsection