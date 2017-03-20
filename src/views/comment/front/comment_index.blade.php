@extends('laravel-authentication-acl::client.layouts.base')

@section('head_css')
    {!! HTML::style('comments/css/comment.css') !!}
    <script src="comments/js/jquery-3.1.1.min.js"></script>
@stop

@section('content')

<div class="nk-blog-post nk-blog-post-single">
                <!-- START: Post Text -->
                <div class="nk-post-text mt-0">
                    <div class="nk-post-img">
                        <img src="comments/img/post-2.jpg" alt="Grab your sword and fight the Horde">
                    </div>
                    <div class="nk-gap-1"></div>
                    <h1 class="nk-post-title h4">Grab your sword and fight the Horde</h1>
                    <div class="nk-post-by">
                        <img src="comments/img/avatar-2.jpg" alt="Witch Murder" class="img-circle" width="35"> by <a href="https://nkdev.info">Witch Murder</a> in Sep 5, 2016

                        
                        <div class="nk-post-categories">
                            
                            <span class="bg-main-1">Action</span>
                            
                            <span class="bg-main-2">Adventure</span>
                            
                        </div>
                        
                    </div>
                    <div class="nk-gap"></div>
                    <p>Just then her head struck against the roof of the hall: in fact she was now more than nine feet high, and she at once took up the little golden key and hurried off to the garden door.	The first question of course was, how to get dry again: they had a consultation about this, and after a few minutes it seemed quite natural to Alice to find herself talking familiarly with them, as if she had known them all her life. Indeed, she had quite a long argument with the Lory, who at last turned sulky, and would only say, `I am older than you, and must know better'; and this Alice would not allow without knowing how old it was, and, as the Lory positively refused to tell its age, there was no more to be said.</p>

<div class="nk-gap"></div>
<blockquote class="nk-blockquote">
    <div class="nk-blockquote-icon"><span>"</span></div>
    <div class="nk-blockquote-content">
        Just then her head struck against the roof of the hall: in fact she was now more than nine feet high, and she at once took up the little golden key and hurried off to the garden door. As if she had known them all her life. Indeed, she had quite a long argument with the Lory.
    </div>
    <div class="nk-blockquote-author"><span>Samuel Marlow</span></div>
</blockquote>

<div class="nk-gap"></div>

<img class="pull-left mt-0" src="comments/img/post-inner-img.jpg" alt="">
<h3 class="h4">Now the races of these two have been</h3>

<p>I confess this side of the country was much pleasanter than mine; but yet I had not the least inclination to remove, for as I was fixed in my habitation it became natural to me, and I seemed all the while I was here to be as it were upon a journey, and from home. However, I travelled along the shore she clutched the matron by the arm, and forcing her into a chair by the bedside, was about to speak, wh en looking round, she caught sight of the two old women bending forward in the attitude of eager list eners.They belong to the old gentleman, said Oliver, wringing his hands; "to the good, kind, old gentle man who took me into his house, and had me nursed, when I was near dying of the fever . Oh, pray send them back; send him back the books and money</p>
                    
                    
                </div>
                <!-- END: Post Text -->

                <!-- START: Similar Articles -->
                <div class="nk-gap-2"></div>
                
                
                
                <!-- END: Similar Articles -->

                <!-- START: Comments -->
                <div id="comments"></div>
                <h3 class="nk-decorated-h-2"><span> Comments</span></h3>
                <div class="nk-gap"></div>
                <div class="nk-comments">
                    <!-- START: Comment -->
                    @include('comment::comment.front.comment_item')

                   
                </div>
                <!-- END: Comments -->

                <!-- START: Reply -->
                <div class="nk-gap-2"></div>
                <h3 class="nk-decorated-h-2"><span><span class="text-main-1">Leave</span> a Reply</span></h3>
                <div class="nk-gap"></div>
                <div class="nk-reply">
                    {{ Form::open(['route'=>'comment.add', 'method' => 'get']) }}

						{{ Form::textarea('comment_content', null, ['class' => 'form-control required', 'placeholder' => 'Comment']) }}
						<div style="float: right; padding-top: 15px;">
							{{ Form::submit('Post Comment', ['class' => 'nk-btn nk-btn-rounded nk-btn-color-main-1'])}}
						</div>
					<input type="hidden" name="user_id" value="1">
					<input type="hidden" name="post_id" value="9">
					<input type="hidden" name="parent_id" value="0">
					<input type="hidden" name="status_id" value="9">
					{{ Form::close() }}
                </div>
                <!-- END: Reply -->
            </div>




@stop