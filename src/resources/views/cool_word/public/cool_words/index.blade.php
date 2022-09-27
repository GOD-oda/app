@extends('public_base')

@section('head')
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
@endsection

@section('main')
  <div class="container py-3">
    <div class="row">
      @foreach ($paginator->items() as $coolWord)
        <div class="col-4 my-3 ml-5">
          <div class="card">
            <div class="card-body">
              <h4>{{ $coolWord['name'] }}</h4>
              <div class="d-flex align-items-center">
                <span class="material-symbols-outlined">visibility</span>
                <span class="ms-2">{{ $coolWord['views'] }}</span>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection
