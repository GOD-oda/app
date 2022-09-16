@extends('base')

@section('main')
  <div class="container py-3">
    <div class="row">
      @foreach ($paginator->items() as $coolWord)
        <div class="col-4 my-3">
          <div class="card">
            <div class="card-body">
              <p>{{ $coolWord['name'] }}</p>

              <a href="{{ route('cool_word.admin.cool_words.show', ['id' => $coolWord['id']]) }}" class="btn btn-primary">詳細</a>
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
