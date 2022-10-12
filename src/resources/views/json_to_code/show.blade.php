@extends('json_to_code.base')

@section('service', 'json_to_code')

@section('header')
  <div class="p-2">
    <h1>Json To Code</h1>
  </div>
@endsection

@section('main')
  <div class="container py-3">
    <form class="mb-3">
      @csrf

      <div id="input" class="mb-3">
        <textarea id="json" class="form-control" cols="30" rows="10"></textarea>
      </div>

      <div>
        <button class="btn btn-outline-dark" id="run">実行</button>
      </div>
    </form>

    <div class="output">
      <div class="php" id="output"></div>
    </div>
  </div>
@endsection

@section('script')
  <script>
    function run(event) {
      event.preventDefault();

      let json = document.getElementById('json');

      let outputDiv = document.getElementById('output');
      outputDiv.innerText = '';

      fetch('/api/json_to_code/run', {
        headers: {
          Accept: "application/json",
          "Content-Type": "application/json;charset=utf-8"
        },
        method: 'post',
        body: JSON.stringify({
          json: json.value
        })
      }).then(response => {
        console.log(response);
        if (response.ok) {
          return response.json();
        } else {
          throw new Error(`リクエスト失敗 status code ${response.status} `);
        }
      }).then(res => {
        let outputDiv = document.getElementById('output');
        outputDiv.innerHTML = res.php;
      }).catch(error => {
        console.log(error);
      });
    }

    let btn = document.getElementById('run');
    btn.addEventListener('click', run);
  </script>
@endsection
