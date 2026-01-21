@extends('layouts.edica')
@section('content')
<body>
    <div class="edica-loader"></div>

    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{$post->title}}</h1>

            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">{{$dateAndCommentsCount}}</p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{asset('/storage/' . $post -> main_image)}}" alt="featured image" class="w-50 m-auto">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        {!! $post->content !!}
                    </div>
                </div>

            </section>

            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <section class="related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">Related Posts</h2>
                        <div class="row">
                            @foreach($relatedPosts as $relatedPost)
                                <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                    <img src="{{asset('/storage/' . $relatedPost -> main_image)}}" alt="related post" class="post-thumbnail">
                                    <p class="post-category">{{$relatedPost->category->name}}</p>
                                    <a href="{{route('blog.show',$relatedPost->id)}}" class="">
                                        <h5 class="post-title">{{$relatedPost->title}}</h5>
                                    </a>
                                </div>
                            @endforeach

                        </div>
                    </section>
                        <div class="comments-list">
                            @foreach($post->comments as $comment)
                                <div class="comment">
                                    <div class="username">
                                        {{$comment->user->name}}
                                    </div>
                                    <span>{{$comment->dateAsCarbon->diffForHumans()}}</span>
                                    {{$comment->message}}
                                </div>
                            @endforeach
                        </div>
                    <section>

                    </section>
                    @auth()
                    <section class="comment-section">
                        <h2 class="section-title mb-5" data-aos="fade-up">Leave a Reply</h2>
                        <form action="{{route('personal.comment.store',$post->id)}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12" data-aos="fade-up">
                                <label for="comment" class="sr-only">Comment</label>
                                <textarea name="message" id="comment" class="form-control" placeholder="Comment" rows="10">Comment</textarea>
                                </div>
                                <input type="hidden" name="post_id" value="{{$post->id}}">
                            </div>
                            <div class="row">
                                <div class="col-12" data-aos="fade-up">
                                    <input type="submit" value="Send Message" class="btn btn-warning">
                                </div>
                            </div>
                        </form>
                    </section>
                    @endauth
                </div>
            </div>
        </div>
    </main>

@endsection
