<div class="row">
	<div class="medium-1 large-2 columns">
		<sidebar>
			@if (isset($previousPost))
				<div class="previous">
					<a href="{{ URL::route('posts.show', $previousPost) }}"><span class="fi-arrow-left icon"></span><br>
					<span class="navi-text">Précédent</span><br>
						@if (isset($previousPostTitle))
							<span class="navi-title">{{ $previousPostTitle }}</span>
						@endif
					</a>
				</div>
			@endif		
		</sidebar>
	</div>
	<div class="medium-10 medium-centered large-8 columns">
		<article class="post">
	
		    <header class="post-header">
		        <h2 class="post-title">
		            {{$post->title}}
		        </h2>
		        <div class="clearfix">
		            <span class="left date">{{ $post->created_at->format('d/m/Y') }}</span>
		            <span class="right label">{{HTML::link('#reply','Répondre',['style'=>'color:inherit'])}} </span>
		        </div>
		    </header>
			
		    <div class="post-content">
		        <p>{{ Markdown::parse($post->content) }}</p>
		    </div>
		
		    <footer class="post-footer">
		        <hr>
		    </footer>
		</article>
		@if (Auth::check())
			@if(Auth::user()->admin == 1) {{HTML::linkRoute('posts.edit','Modifier',$post->id)}}
			@elseif(Auth::user()->pseudo == $post->user->pseudo){{HTML::linkRoute('posts.edit','Modifier')}}
			@else{{''}}
			@endif
		@endif
		<section class="comments">
		    @if(!$comments->isEmpty())
		        <h3>Commentaires sur {{$post->title}}</h3>
		        <ul>
		            @foreach($comments as $comment)
		                <li>
		                    <article>
		                        <header>
		                            <div class="clearfix">
		                                <span class="right date">{{ $comment->created_at->format('d/m/Y') }}</span>
		                                <span class="left commenter">{{link_to_route('posts.show',$comment->commenter,$post->id)}}</span>
		                            </div>
		                        </header>
		                        <div class="comment-content">
		                            <p>{{{$comment->comment}}}</p>
		                        </div>
		                        <footer>
		                            <hr>
		                        </footer>
		                    </article>
		                </li>
		            @endforeach
		        </ul>
		    @else
		        <h3>Aucun commentaire sur {{$post->title}}</h3>
		    @endif
		    <!--comment form -->
		    @include('comments.commentform') 
		</section>	
	</div>
	<div class="medium-1 large-2 columns">
		<sidebar>
			@if (isset($nextPost))
				<div class="next">
					<a href="{{ URL::route('posts.show', $nextPost) }}"><span class="fi-arrow-right icon"></span><br>
					<span class="navi-text">Suivant</span><br>
						@if (isset($nextPostTitle))
							<span class="navi-title">{{ $nextPostTitle }}</span>
						@endif
					</a>
				</div>
			@endif		
		</sidebar>
	</div>
</div>
