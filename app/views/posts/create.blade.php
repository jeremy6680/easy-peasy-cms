<h2 class="new-post">
    Ajouter un nouvel article
    <span class="right">{{ HTML::link('admin/dash-board','Annuler',['class' => 'button tiny radius']) }}</span>
</h2>
<hr>
{{ Form::open( array('route' => 'posts.store') )}}
	{{ Form::label('title', "Titre de l'article") }}
	{{ Form::text('title') }}
	{{ $errors->first('title', '<small class="error">:message</small>') }}
	{{ Form::textarea('content','',array('data-uk-htmleditor' => '{markdown:true}' )) }}
	{{ $errors->first('content', '<small class="error">:message</small>') }}
	{{ Form::select('draft', [false => 'Prêt à publier', true => 'Enregistrer en tant que brouillon'], false) }}
	<br>
	{{ Form::submit('valider', array('class' => 'button tiny radius')) }}
{{ Form::close()}}

<textarea data-uk-htmleditor="{markdown:true}"></textarea>

