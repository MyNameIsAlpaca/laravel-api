@extends('layouts/main-layout')

@section('content')

<div class="container">
  <h1>Dettagli del progetto</h1>
  <table class="table">
      <tbody>
          <tr>
              <th>Nome:</th>
              <td>{{ $project->name }}</td>
          </tr>
          <tr>
            <td>
                <img src="{{ asset('/storage/' . $project->project_image) }}" alt="" class="w-50">
            </td>
          </tr>
          <tr>
              <th>Descrizione:</th>
              <td>{{ $project->desc }}</td>
          </tr>
          <tr>
              <th>Linguaggio utilizzato:</th>
              <td>{{ $project->language }}</td>
          </tr>
          <tr>
              <th>Link:</th>
              <td>{{ $project->link }}</td>
          </tr>
          <tr>
              <th>Data di pubblicazione:</th>
              <td>{{ $project->publication_date }}</td>
          </tr>
          @if (isset($project->type->name))
          <tr>
            <th>Tipo di progetto:</th>
            <td>{{ $project->type->name }}</td>
          </tr>
          @endif
          <tr>
            <th>Linguaggi utilizzati:</th>
            <td>
                <span>
                    @foreach($project->technologies as $technology)
                    {{$technology->name}}
                    @endforeach
                </span>
            </td>
        </tr>
      </tbody>
  </table>
</div>

@endsection