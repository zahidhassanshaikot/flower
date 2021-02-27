
@extends('back-end.layouts.master')

@section('message')
    active
@endsection


@section('main-content')


        <div class="content-container">
            <div class="chat-module">
                <div class="chat-module-top">
                    
                    <div class="chat-module-body">
                        @foreach ($messages as $message)
                        @if(Auth::id()==$message->receiver_id)
                        <div class="media chat-item btn-rounded alert alert-dark">
                            <div class="media-body">
                                <div class="chat-item-title">
                                    <span class="chat-item-author">{{ $message->sender_name }}</span>
                                    <span>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($message->created_at))->diffForHumans() }}</span>
                                </div>
                                <div class="chat-item-body">
                                    <p>{{ $message->message }}</p>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="media chat-item btn-rounded alert alert-primary">
                            <div class="media-body">
                                <div class="chat-item-title">
                                    <span class="chat-item-author">{{ $message->sender_name }}</span>
                                    <span>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($message->created_at))->diffForHumans() }}</span>
                                </div>
                                <div class="chat-item-body">
                                    <p>{{ $message->message }}</p>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                    <div class="chat-module-bottom">
                        {!!  Form::open(['route'=>'reply-message','class'=>'chat-form','id'=>'editMeta','method' => 'post','enctype'=>'multipart/form-data']) !!} 
                        {{-- <form class="chat-form"> --}}
                            <textarea class="form-control" name="message" placeholder="Type message" onkeypress="submitOnEnter(event)" rows="2"></textarea>
                            <input type="text" class="custom-file-input" value="{{ $receiver_id }}">
                            <div class="chat-form-buttons">
                                {{-- <button type="submit" class="btn btn-link" style="display:none">
                                    <i class="mdi mdi-send"></i>
                                </button> --}}
                                <div class="custom-file custom-file-naked">
                                    <input type="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">
                                        <i class="fas fa-paperclip"></i>
                                    </label>
                                </div>
                                
                            </div>
                            {!! Form::close() !!}
                    </div>
                </div>
            </div>

<script>
    function submitOnEnter(e) {
  if (e.which == 13) {
    document.getElementById("editMeta").submit()
  }
}
</script>
            

@endsection 

