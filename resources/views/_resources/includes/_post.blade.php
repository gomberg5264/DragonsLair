{{-- The post template that is used to present all posts on the site. --}}
<?php
    use App\models\User;
    use App\models\Post;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\DB;

    $postAuthor = DB::table('users')->where('id', $post->user_id)->first();
?>
<div id="{{($post->id).'postAncestorDiv'}}">
    <article class="post" id="{{($post->id).'postArticle'}}">
    <p id="{{($post->id).'postParagraph'}}">{{$post->body}}</p>
    <div class="info">
        Posted by {{$postAuthor->userName}} on {{$post->created_at}}.
    </div>
    <div class="interaction">
        <form action="{{route('deletePost', ['postID' => $post->id])}}" method="post" class="post-interactions">
            &nbsp;&nbsp;&nbsp;<a href="/posts/{{$post->id}}">Permalink</a> &nbsp;&nbsp;&nbsp;|
            &nbsp;&nbsp;&nbsp;<a href="#">Like</a> &nbsp;&nbsp;&nbsp;|
            &nbsp;&nbsp;&nbsp;<a href="#">Disike</a> &nbsp;&nbsp;&nbsp;|
            @if(Auth::user()->id == $post->user_id)
            <button type="button" class="btn btn-link editPost" data-postid="{{$post->id}}" onclick="editClick(event)">Edit</button> | {{-- <a href={{$editURL}} class={{$editClass}}>Edit</a> --}}
                <button type="submit" class="btn btn-link">Delete</button>
                <input type="hidden" name="_token" value={{Session::token()}}>
                {{-- <a href="/posts/deletePost/{{$post->id}}">Delete</a> --}}
            @endif
            <input type="hidden" name="_token" value="{{Session::token()}}">
        </form>
    </div>
</article>
</div>

