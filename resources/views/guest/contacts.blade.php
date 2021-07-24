@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Contact Me</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            
        @endif
        @if(session('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>{{session('message')}}</strong>
            </div>

            <script>
            $(".alert").alert();
            </script>
        @endif

        <form action="{{route('contacts.send')}}" method="POST">
            @csrf
            <div class="form-group">
              <label for="full_name">Full Name</label>
              <input type="text" name="full_name" id="full_name" class="form-control" placeholder="Full Name" aria-describedby="fullNameHelper" minlength="5" maxlength="255" value="{{old('full_name')}}" required>
              <small id="fullNameHelper" class="text-muted">Type your full name</small>
            </div>
            <div class="form-group">
              <label for="email">Email Addrss</label>
              <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelper" placeholder="example@example.com" value="{{old('email')}}" required>
              <small id="emailHelper" class="form-text text-muted">Type here your email address</small>
            </div>
            <div class="form-group">
              <label for="message">Message</label>
              <textarea class="form-control" name="message" id="message" rows="5">{{old('message')}}</textarea>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Send</button>
        </form>
    </div>

    
    
@endsection
