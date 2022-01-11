<head>
<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>

<style>

.fa-user-circle {
    height:25px;
    width:25px;
}
.reply-content {
    text-align:left;
    margin: 3px 0;
    color:#333333
}
.reply-date {
    text-align:right;
    color:darkgray;
    margin: 1px 0;
    font-size:9px;
}

.reply-comment {
    display:flex;
    
}
.arrow{
    position:relative;
    width:60vw;
    background:#E6E6E6;
    padding:10px;
    text-align:left;
    color:#333333;
    font-size:14px;
    font-weight:bold;
    border-radius:15px;
    -webkit-border-radius:15px;
    -moz-border-radius:15px;
    margin:5px 0 5px 45px;
}

.arrow:after{
    border: solid transparent;
    content:'';
    height:0;
    width:0;
    pointer-events:none;
    position:absolute;
    border-color: rgba(230, 230, 230, 0);
    border-top-width:10px;
    border-bottom-width:10px;
    border-left-width:20px;
    border-right-width:20px;
    margin-top: -10px;
    border-right-color:#E6E6E6;
    right:100%;
    top:50%;
}
.chat-container {
    display:flex;
    justify-content:flex-start;
    padding: 0 0 0 10vw;
    margin: 5px 0 5px 0;
}

.chat-info {
    display:flex;
    flex-direction: column;
    align-items: flex-end;
}
.chat-date {
    padding: 0 0 0 0;
    margin: 0 0 0 0;
}
</style>
<div class="section-heading text-center">
        <!-- Dream Dots -->
        <h2 class="fadeInUp" data-wow-delay="0.3s">Chats<img src="img/art-work/fire.png" width="20" alt=""></h2>
        <div class="dream-dots justify-content-center fadeInUp" data-wow-delay="0.2s">
                <span>取引連絡をしましょう</span>
        </div>
</div>
<div class="timelineBox">
        <ul class="timeline">
            @foreach($chats as $chat)
            <li>
                <div class="chat-container">
                    <div>
                        <span class="aut-info-chat">
                            @if($chat->user->prof_img)
                            <img src="/users/{{$chat->user->prof_img}}" width="50" alt="">
                            @else
                            <img src="{{asset('img/authors/2.png')}}" width="50" alt="">
                            @endif
                        </span>
                    </div>
                    <div class="chat-info">
                        <div class="arrow">
                            <p class="reply-content"> {{$chat->message}} </p>
                        </div>
                        <div class="reply-date">
                                <p class="chat-date"><i class="fa fa-clock-o mr-5p"></i>{{ date('Y/m/d H:i', strtotime($chat->created_at) )}}</p>
                        </div>
                    </div>
                </div>
                
            </li>

            @endforeach

            <li class="text-center">
            <div class="chat-container">
                <form action="{{ url('/chat') }}" method="POST">
                @csrf
                <div class="col-12 col-md-12" style = "width:60vw">    
                    <div class="group">
                        <input type="textbox" name="message" class="form-control" placeholder="メッセージを送ろう">
                        <input type="hidden" name="user_id" value="{{Auth::id()}}" > 
                        <input type="hidden" name="purchaser_id" value="{{ $purchase -> id}}">
                            <span class="highlight"></span>
                            <span class="bar"></span>
                        <div class="col-12 text-center">
                        <button type="submit" class="more-btn mb-15" style="margin:15px 0 0 0">Send</button>
                    </div>
                </div>
                </form>
            </div>
            </li>
        </ui>

        
</div>