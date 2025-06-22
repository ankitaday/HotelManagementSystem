{{-- @foreach ($reservations as $reservation)
{{ $reservation->id }}

@endforeach --}}
@extends('users.home')
@section('content')


<style>
    body {
        background: #f0f2f5;
    }
    .chat-container {
        max-width: 800px;
        margin: 0 auto;
    }
    .chat-box {
        height: 500px;
        overflow-y: scroll;
        background: #fff;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .message {
        margin-bottom: 15px;
        max-width: 70%;
        padding: 10px 15px;
        border-radius: 20px;
        position: relative;
        display: inline-block;
        word-wrap: break-word;
        clear: both;
    }
    .message.user {
        background: #0d6efd;
        color: white;
        float: right;
        text-align: right;
    }
    .message.other {
        background: #e4e6eb;
        color: black;
        float: left;
    }
    .chat-footer {
        background: #fff;
        border-radius: 10px;
        padding: 15px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        margin-top: 20px;
    }
    .file-label {
        cursor: pointer;
        color: #0d6efd;
    }
</style>

<div class="container chat-container mt-5">
    {{-- <h3 class="text-center mb-4">💬 comment</h3> --}}

    <div class="chat-box mb-3" id="chat-box">
        <!-- Example dynamic messages -->
        <div class="message other">
            Hello! Having issues with booking?
        </div>
        <div class="message other">
            <p>Reseravtion number: {{ $reservations->id }}</p>
            <p>Room number: {{ $reservations->room->room_number }}</p>
            <p>Room type: {{ $reservations->room->room_type }}</p>

            <p>Check In: {{ $reservations->check_in }}</p>
            <p>Check Out: {{ $reservations->check_out }}</p>
        </div>
        @foreach($comments as $comment)

        <div class="message {{ $comment->user_type=='user' ? 'user' : 'other' }}">
            {{ $comment->comment }}
            @if($comment->document)
            <br>
            @php
                $ext = pathinfo($comment->document, PATHINFO_EXTENSION);
            @endphp

            @if(in_array($ext, ['jpg', 'jpeg', 'png']))
            <a href="{{ asset('storage/' . $comment->document) }}" ><img src="{{ asset('storage/' . $comment->document) }}" target="_blank" width="200"></a>

            @else
                <a href="{{ asset('storage/' . $comment->document) }}"  style="color:white" target="_blank"> View Document</a>
            @endif
        @endif
        </div>

        @endforeach
        <!-- Add dynamic messages here -->
    </div>

    <div class="chat-footer">
        <form id="chat-form" enctype="multipart/form-data" method="POST" action="{{ route('comment', $reservations->id)  }}">
            @csrf
            <div class="d-flex align-items-center">
                <input type="text" name="message" class="form-control rounded-pill me-2" placeholder="Type a message..." required>
                <input type="text" name="id" class="form-control rounded-pill me-2" placeholder="Type a message..." readonly value="{{ $reservations->id }}" required hidden>
                <input type="file" name="file" id="file-upload" hidden>
                <label for="file-upload" class="file-label me-2">
                    📎
                </label>

                <button type="submit" class="btn btn-primary rounded-circle">
                    >
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Auto-scroll chat box to bottom
    var chatBox = document.getElementById('chat-box');
    chatBox.scrollTop = chatBox.scrollHeight;
    if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
   </script>

@endsection
