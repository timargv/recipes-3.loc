<div class="recipe-comment-sh align-self-top ">

<div class="my-1 small card-subtitle text-muted pt-2">
    <form method="POST" action="{{ route('comment.store') }}" class="d-flex bd-highlight" style="text-decoration: none">
        @csrf
        <input class="reply_id" type="hidden" name="reply_id" value="">
        <input class="recipe_id" type="hidden" name="recipe_id" value="{{ $recipe->id }}">
        <div class="align-self-top">
            <img class="rounded-circle" src="{{ Auth::user()->getAvatar() }}" width="30px" height="30px">
        </div>
        <div class="align-self-center bd-highlight flex-grow-1">
            <span class="px-2 py-2 card-subtitle text-muted text-dark d-block">
                 <textarea class="addComment" placeholder="{{ __('comments.Comment') }}" name="text"></textarea>
            </span>
        </div>
        <div class="align-self-top">
            <button class="float-right btn btn-sm py-1 px-2 text-center btn-primary" style="margin-top: 2px;">
                <i class="fa fa-send-o pr-1"></i> {{ __('comments.Post') }}
            </button>
        </div>
    </form>
</div>
</div>
