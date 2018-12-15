


@extends('layouts.frontend')

@section('content')

    <div class="stunning-header stunning-header-bg-lightviolet">
        <div class="stunning-header-content">
            <h1 class="stunning-header-title">{{$post->title}}</h1>
        </div>
    </div>


    <div class="container">
        <div class="row medium-padding120">
            <main class="main">
                <div class="col-lg-10 col-lg-offset-1">
                    <article class="hentry post post-standard-details">

                        <div class="post-thumb">
                            <img src="{{asset($post->featured)}}" alt="{{$post->title}}">
                        </div>

                        <div class="post__content">


                            <div class="post-additional-info">

                                <div class="post__author author vcard">
                                    Posted by

                                    <div class="post__author-name fn">
                                        <a href="#" class="post__author-link">{{$post->user->name}}</a>
                                    </div>

                                </div>

                                <span class="post__date">

                                <i class="seoicon-clock"></i>

                                <time class="published" datetime="2016-03-20 12:00:00">
                                   {{$post->created_at->toFormattedDateString()}}
                                </time>

                            </span>

                                <span class="category">
                                <i class="seoicon-tags"></i>
                                <a href="{{route('category.single', ['id' => $post->category->id])}}">{{$post->category->name}}</a>
                            </span>

                            </div>

                            <div class="post__content-info">

                                {!! $post->content !!}

                                <div class="widget w-tags">
                                    <div class="tags-wrap">
                                        @foreach($post->tags as $tag)
                                            <a href="{{route('tag.single', ['id' => $tag->id])}}" class="w-tags-item">{{$tag->tag}}</a>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="socials">Share:
                            <a href="#" class="social__item">
                                <i class="seoicon-social-facebook"></i>
                            </a>
                            <a href="#" class="social__item">
                                <i class="seoicon-social-twitter"></i>
                            </a>
                            <a href="#" class="social__item">
                                <i class="seoicon-social-linkedin"></i>
                            </a>
                            <a href="#" class="social__item">
                                <i class="seoicon-social-google-plus"></i>
                            </a>
                            <a href="#" class="social__item">
                                <i class="seoicon-social-pinterest"></i>
                            </a>
                        </div>

                    </article>

                    <div class="blog-details-author">

                        <div class="blog-details-author-thumb">
                            <img src="{{asset($post->user->profile->avatar)}}" width="110" height="110" alt="{{$post->user->profile->avatar}}">
                        </div>

                        <div class="blog-details-author-content">
                            <div class="author-info">
                                <h5 class="author-name">{{$post->user->name}}</h5>
                                <p class="author-info">{{$post->user->email}}</p>
                            </div>
                            <p class="text">{{$post->user->profile->about}}</p>
                            <div class="socials">

                                <a href="#" class="social__item">
                                    <img src="{{asset('app/svg/circle-facebook.svg')}}" alt="facebook">
                                </a>

                                <a href="#" class="social__item">
                                    <img src="{{asset('app/svg/twitter.svg')}}" alt="twitter">
                                </a>

                                <a href="#" class="social__item">
                                    <img src="{{asset('app/svg/google.svg')}}" alt="google">
                                </a>

                                <a href="#" class="social__item">
                                    <img src="{{asset('app/svg/youtube.svg')}}" alt="youtube">
                                </a>

                            </div>
                        </div>
                    </div>

                    <div class="pagination-arrow">

                        @if($next)
                            <a href="{{route('post.single', ['slug' => $next->slug])}}" class="btn-next-wrap">
                                <div class="btn-content">
                                    <div class="btn-content-title">Next Post</div>
                                    <p class="btn-content-subtitle">{{$next->title}}</p>
                                </div>
                                <svg class="btn-next">
                                    <use xlink:href="#arrow-right"></use>
                                </svg>
                            </a>
                        @endif

                       @if($prev)
                            <a href="{{route('post.single', ['slug' => $prev->slug])}}" class="btn-prev-wrap">
                                <svg class="btn-prev">
                                    <use xlink:href="#arrow-left"></use>
                                </svg>
                                <div class="btn-content">
                                    <div class="btn-content-title">Previous Post</div>
                                    <p class="btn-content-subtitle">{{$prev->title}}</p>
                                </div>

                            </a>
                       @endif



                    </div>

                    <div class="comments">

                        <div class="heading text-center">
                            <h4 class="h1 heading-title">Comments</h4>
                            <div class="heading-line">
                                <span class="short-line"></span>
                                <span class="long-line"></span>
                            </div>
                        </div>

                       @if(Auth::user())
                            <!doctype html>
                            <html lang="{{ app()->getLocale() }}">
                            <head>
                                <meta charset="utf-8"/>
                                <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
                                <meta name="viewport" content="width=device-width, initial-scale=1"/>
                                <meta name="_token" content="{{csrf_token()}}" />
                                <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css"/>
                            </head>
                            <body>
                            <div class="container">

                                <form id="myForm" class="form-group">

                                    <textarea id="comment1" class="form-control" name="comment" style="border:solid 1px orange; width: 80%" rows="2"></textarea>
                                    <input type="hidden" name="postid" id="postid" value="{{$post->id}}">
                                    <input type="hidden" name="postid" id="userid" value="{{Auth::user()->id}}">
                                    <br>
                                        <button class="btn btn-primary" value="" href="{{ route('comment.store') }}" id="ajaxSubmit">Submit</button>
                                </form>
                            </div>
                            <script src="http://code.jquery.com/jquery-3.3.1.min.js"
                                    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                                    crossorigin="anonymous">
                            </script>
                            <script>
                                jQuery(document).ready(function(){
                                    jQuery('#ajaxSubmit').click(function(e){
                                        e.preventDefault();
                                        $.ajaxSetup({
                                            headers: {
                                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                                            }
                                        });
                                        jQuery.ajax({
                                            url: "{{ route('comment.store') }}",
                                            method: 'post',
                                            data: {
                                                comment2: jQuery('#comment1').val(),
                                                postid: jQuery('#postid').val(),
                                                userid: jQuery('#userid').val()
                                            },
                                            success: function(result){
                                                jQuery('.alert').show();
                                                jQuery('.alert').html(result.success);
                                                // console.log(result.success.comment);
                                                $('#data').append(' <img src="{{asset(Auth::user()->profile->avatar)}}" width="50" height="50" alt=""> &nbsp;&nbsp;&nbsp;\n' +
                                                '                            {{Auth::user()->name}} - says:\n' +
                                                '                            &nbsp;&nbsp;&nbsp;<span style="font-size: 12px">'+result.success.created_at+'</span><br>\n' +
                                                '                            <span>\n' +
                                                '    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>'+result.success.comment+'</b> <hr>\n' +
                                                '</span>                            <br>');


                                            }});
                                    });

                                    // auto-load function
                                   });
                            </script>
                            </body>
                            </html>







                           @else
                            <div class="text-center">
                                <a href="{{route('login')}}"><img src="{{asset('uploads/buttons/login.png')}}"  alt="login"></a>
                            &nbsp;&nbsp;
                                <a href="{{route('user.create')}}"><img src="{{asset('uploads/buttons/signup.png')}}"  alt="register"></a></div> <br><br>
                       @endif
                        

                    </div>




                    <div class="row" id="data">
                        @foreach($post->comments as $comment)
                            <img src="{{asset($comment->user->profile->avatar)}}" width="50" height="50" alt=""> &nbsp;&nbsp;&nbsp;
                            <b>{{$comment->user->name}}</b> - says:


                            &nbsp;&nbsp;&nbsp;<span style="font-size: 12px">{{$comment->created_at->diffForHumans()}}</span> &nbsp;&nbsp;&nbsp; <!-- Trigger the modal with a button -->
                            <button type="button" class="btn btn-info btn-xs comment-reply" data-id="{{$comment->id}}" data-toggle="modal" data-target="#myModal">Reply</button>

                            <br>

                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$comment->comment}}
                        <br>
                            <button class="badge badge-success" id="hideshow">Replies:</button>

                            <br><br>

                                <div id="content">

                                    @foreach($comment->replies as $reply)
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      <img src="{{asset($reply->user->profile->avatar)}}" width="30" height="30" alt=""> &nbsp;&nbsp;&nbsp;
                                        {{$reply->user->name}} - says:
                                        &nbsp;&nbsp;&nbsp;<span style="font-size: 12px">{{$reply->created_at->diffForHumans()}}</span> &nbsp;&nbsp;&nbsp; <!-- Trigger the modal with a button -->

                                        <br>

                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    <b>{{$reply->reply}}</b>  <br><br>

                                    @endforeach

                                </div>


                            <hr style="border-top: dotted 2px;" />
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;






                            <br>
                        @endforeach

                    </div>

                </div>


                <!-- End Post Details -->

                <!-- Sidebar-->

                <div class="col-lg-12">
                    <aside aria-label="sidebar" class="sidebar sidebar-right">
                        <div  class="widget w-tags">
                            <div class="heading text-center">
                                <h4 class="heading-title">ALL BLOG TAGS</h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>

                            <div class="tags-wrap">
                                <a href="#" class="w-tags-item">SEO</a>
                                <a href="#" class="w-tags-item">Advertising</a>
                                <a href="#" class="w-tags-item">Business</a>
                                <a href="#" class="w-tags-item">Optimization</a>
                                <a href="#" class="w-tags-item">Digital Marketing</a>
                                <a href="#" class="w-tags-item">Social</a>
                                <a href="#" class="w-tags-item">Keyword</a>
                                <a href="#" class="w-tags-item">Strategy</a>
                                <a href="#" class="w-tags-item">Audience</a>
                            </div>
                        </div>
                    </aside>
                </div>

                <!-- End Sidebar-->

            </main>
        </div>
    </div>

@stop






    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add comment reply</h4>
                </div>

                    <div class="alert alert-success" style="display:none"></div>
                <meta name="_token" content="{{csrf_token()}}" />

                <div class="modal-body">
                    <form id="myForm">
                        <div id="clearDIV" class="form-group">
                            <textarea type="text" class="form-control" id="reply" rows="5" cols="5"></textarea>
                            <input type="hidden" id="post_id" name="post_id" value="{{$post->id}}">
                            <input type="hidden" id="user_id" name="user_id" value="{{Auth::user()->id}}">
                            <input type="hidden" id="comment_id" name="comment_id" value="{{Auth::user()->id}}">

                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" id="ajaxSubmit1">Submit</button>

                </div>
            </div>

        </div>
    </div>

<script src="http://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

{{--reply script--}}
<script>
    jQuery(document).ready(function(){

        // $("#ajaxSubmit1").click(function() {
        //     $('#clearDIV').value('');
        // });

        $("#hideshow").click(function() {
            $("#content").toggle();
        });

        $('.comment-reply').on('click', function(){
           var commentId = $(this).data('id');
           $('#comment_id').val(commentId);
        });

        jQuery('#ajaxSubmit1').click(function(e){
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });




            jQuery.ajax({
                url: "{{ url('/reply/store') }}",
                method: 'post',
                data: {
                    reply: jQuery('#reply').val(),
                    user_id: jQuery('#user_id').val(),
                    post_id : jQuery('#post_id').val(),
                    comment_id : jQuery('#comment_id').val(),
                },
                success: function(result1){
                    jQuery('.alert').show();
                    jQuery('.alert').html(result1.success);
                    $('#content').append('&nbsp;&nbsp;&nbsp;&nbsp; <img src="{{asset(Auth::user()->profile->avatar)}}" width="30" height="30" alt=""> &nbsp;&nbsp;&nbsp;\n' +
                        '                            {{Auth::user()->name}} - says:\n' +
                        '                            &nbsp;&nbsp;&nbsp;<span style="font-size: 12px">'+result1.success1.created_at+'</span><br>\n' +
                        '                            <span>\n' +
                        '    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>'+result1.success1.reply+'</b> <hr>\n' +
                        '</span>                            <br>');
                }});
        });
    });
</script>

<style>
    .badge {
        padding: 1px 9px 2px;
        font-size: 12.025px;
        font-weight: bold;
        white-space: nowrap;
        color: #ffffff;
        background-color: #3a87ad;
        -webkit-border-radius: 9px;
        -moz-border-radius: 9px;
        border-radius: 9px;
    }
    .badge-success{
        background-color: #3a87ad;
    }
    .badge-success:hover {
        background-color: #356635;
    }
</style>