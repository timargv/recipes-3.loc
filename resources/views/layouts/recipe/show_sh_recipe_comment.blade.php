@foreach($comments as $comment)
    <div class="d-flex mt-3">
        <a href="{{ route('user.show', $comment->author) }}" class="align-self-top"><img src="{{ $comment->author->getAvatar() }}" alt="Card image" class="rounded-circle" width="30px" height="30px"></a>
        <div class="align-self-top ml-3">
            <div class="font-weight-light" style="font-size: 13px; line-height: 18px;">
                <span class="font-weight-bold pr-1">
                    {{ $comment->author->name }}
                    @foreach($comment->replies as $reply)
                        <i class="fa fa-angle-right"></i>
                        <a href="{{ route('user.show', $reply->author) }}">{{ $reply->author->name }}</a>
                    @endforeach
                </span>
                {{ $comment->text }}

            </div>
            <a href="#" class="text-decoration-none small text-muted-50">Ответить</a>
        </div>
    </div>
@endforeach