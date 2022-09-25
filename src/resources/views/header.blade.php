<header class="my-2">
  <div class="container">
    <div class="row">
      <div class="col-sm-3 offset-sm-9">
        @if (Auth::check())
          <form action="{{ route('login.logout') }}" method="POST">
            @csrf

            <button type="submit" class="btn btn-primary">Log out</button>
          </form>
        @endif
      </div>
    </div>
  </div>
</header>
