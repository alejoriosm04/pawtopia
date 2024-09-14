@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="row">
  @foreach ($viewData["pets"] as $pet)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <div class="card-body text-center">
        <a href="{{ route('pet.show', ['id'=> $pet->getId()]) }}"
          class="btn bg-primary text-white">
          {{ $pet->getId() }} - 
            <strong>{{ $pet->getName() }}</strong> ( {{ $pet->getbirthDate() }} )
          - {{ $pet->getSpecie() }}
        </a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
