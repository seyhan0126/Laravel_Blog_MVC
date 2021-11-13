@extends('layouts.app')

@section('content')
    <div class="py-4">
        <h1 class="text-center">Add Contact</h1>

        <section class="p-3 d-flex justify-content-center">

            <form action={{ route('contact.store') }} method="POST">
                @csrf
                @if(!Auth::user())    
                <div class="form-outline mb-3">
                    <label class="form-label" for="name" style="margin-left: 0px;">Name</label>
                    <input type="text" id="name" name="name" value="{{ Request::old('name')  }}" class="form-control">
                </div>

                <div class="form-outline mb-3">
                    <label class="form-label" for="email" style="margin-left: 0px;">Email address</label>
                    <input type="email" id="email" name="email" value="{{ Request::old('email')  }}" class="form-control">
                </div>
                @endif
                <div class="form-outline mb-3">
                    <label class="form-label" for="subject" style="margin-left: 0px;">Subject</label>
                    <input type="text" id="subject" name="subject" value="{{ Request::old('subject')  }}" class="form-control">
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="message" style="margin-left: 0px;">Message</label>
                    <textarea class="form-control" id="message" name="message" value="{{ Request::old('message')  }}" rows="4"></textarea>
                </div>
                <div><button type="submit" class="btn btn-secondary">submit</button></div>
            </form>
        </section>
    </div>
@endsection