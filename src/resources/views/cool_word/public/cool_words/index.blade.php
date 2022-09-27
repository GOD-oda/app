@extends('cool_word.public.base')

@section('main')
  <div class="container py-3">
    <div class="row">
      @foreach ($paginator->items() as $coolWord)
        <div class="col-4 my-3 ml-5">
          <div class="card">
            <div class="card-body">
              <h4><a href="{{ route('cool_word.show', ['id' => $coolWord['id']]) }}">{{ $coolWord['name'] }}</a></h4>
              <div class="d-flex align-items-center">
                <span class="material-symbols-outlined">visibility</span>
                <span class="ms-2">{{ $coolWord['views'] }}</span>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <div class="row">
      {{ $paginator->links() }}
    </div>
  </div>
@endsection
