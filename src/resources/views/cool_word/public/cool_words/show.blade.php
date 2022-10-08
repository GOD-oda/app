@extends('cool_word.public.cool_words.cool_word_base')

@section('main')
  <div class="container py-3">
    <div class="row py-2">
      <h1>{{ $coolWord['name'] }}</h1>
    </div>

    <div class="row py-2">
      <p>{{ $coolWord['description'] }}</p>
    </div>
  </div>
@endsection
