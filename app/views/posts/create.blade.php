<h2 class="new-post">
    Ajouter un nouvel article
    <span class="right">{{ HTML::link('admin/','Annuler',['class' => 'button tiny radius']) }}</span>
</h2>
<hr>
{{ Form::open( array('route' => 'posts.store') )}}
	{{ Form::label('title') }}
	{{ Form::text('title','',array('class' => 'ContentEditable')) }}
	{{ $errors->first('title', '<small class="error">:message</small>') }}
	{{ Form::textarea('content','',array('class' => 'ContentEditable')) }}
	{{ $errors->first('content', '<small class="error">:message</small>') }}
	{{ Form::label('category') }}
	{{ Form::text('category') }}
	{{ Form::select('draft', [false => 'Prêt à publier', true => 'Enregistrer en tant que brouillon'], false) }}
	<br>
	{{ Form::submit('valider', array('class' => 'button tiny radius')) }}
{{ Form::close()}}
