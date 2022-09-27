@extends('cool_word.public.base')

@section('main')
  <div class="container py-3">
    <div class="row">
      <h1>{{ $coolWord['name'] }}</h1>
    </div>
  </div>
@endsection
