<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Json To Code</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="{{ asset('/css/json_to_code.css') }}" rel="stylesheet">

  @yield('head')
</head>
<body class="json_to_code">

<header>
  <nav class="navbar navbar-light">
    {{-- TODO: トップページを作る --}}
    <a class="navbar-brand" href="{{ route('cool_word.index') }}">
      <img src="{{ asset('img/logo.png') }}" alt="playground" width="80" height="50">
    </a>
  </nav>
</header>

<main>
  @yield('main')
</main>

<footer>
  @yield('footer')
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

@yield('script')
</body>
</html>
