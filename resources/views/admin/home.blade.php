@extends('layouts.main-layout')

@section('content')

<div class="home-admin">
  <div class="container">
    <h1 class="title">Benvenuto nella tua pagina!</h1>
    <hr>
    <h2 class="pb-3">Sezione progetti</h2>
    <a href="{{ route('admin.projects.index') }}">
      <button class="btn btn-primary">
        Vai alla pagina di gestione dei progetti
      </button>
      </a>
    <a href="{{ route('admin.projects.create') }}">
      <button class="btn btn-secondary">
        Vai al create dei progetti
      </button>
      </a>
    <hr>
    <h2 class="pb-3">Sezione tipi</h2>

    <a href="{{ route('admin.types.index') }}">
    <button class="btn btn-primary">
      Vai alla lista dei tipi
      </button>
      </a>
      
    <a href="{{ route('admin.types.create') }}">
      <button class="btn btn-secondary">
        Vai al create dei tipi
      </button>
    </a>

    <hr>


    <h2 class="pb-3">Sezione linguaggi</h2>

    <a href="{{ route('admin.technologies.index') }}">
      <button class="btn btn-primary">
        Vai alla lista dei linguaggi
      </button>
    </a>
    <a href="{{ route('admin.technologies.create') }}">
      <button class="btn btn-secondary">
        Vai al create dei linguaggi
      </button>
    </a>

    


  </div>
</div>

@endsection