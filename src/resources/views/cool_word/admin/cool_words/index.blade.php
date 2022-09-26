@extends('base')

@section('main')
  <div class="container py-3">
    <form action="{{ route('cool_word.admin.cool_words.index') }}" class="row g-3">
      <div class="col-md-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $input['name'] ?? '' }}">
      </div>
      <div class="col-md-2 mt-auto">
        <button type="submit" class="btn btn-primary">検索</button>
      </div>
    </form>

    <div class="row">
      @foreach ($paginator->items() as $coolWord)
        <div class="col-4 my-3">
          <div class="card">
            <div class="card-body">
              <p>{{ $coolWord['name'] }}</p>
              <p>閲覧数: {{ $coolWord['views'] }}</p>

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
