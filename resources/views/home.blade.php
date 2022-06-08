<!DOCTYPE html>
<html lang="en">
<head>
  <title>Short url</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Short url</h2>
  <div class="h-100 d-1 align-items-center justify-content-center">
    <div class="card">
        @if (Session::has('success'))
            <div class="alert alert-success">
                <p>{{ Session::get('success') }}</p>
            </div>
        @endif
        @if (Session::has('generatedLink'))
            <div class="p-3">
            <h3>Below is the generated link</h3>
                <a href="{{ Session::get('generatedLink') }}" target="_blank">{{ Session::get('generatedLink') }}</a>
                @php
                    Session::forget('generatedLink');
                @endphp
            </div>
        @endif
      <div class="card-header">
        <form method="POST" action="{{ route('generate.link') }}">
            @csrf
            <div class="input-group mb-3">
              <input type="text" name="link" class="form-control" placeholder="Enter URL">
              <div class="input-group-append">
                <button class="btn btn-success" type="submit">Submit</button>
              </div>
            </div>
        </form>
      </div>
    </div>
    </div>

</div>

</body>
</html>
