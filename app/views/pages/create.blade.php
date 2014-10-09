<h2 class="new-post">
    Ajouter une nouvelle page
    <span class="right">{{ HTML::link('admin','Annuler',['class' => 'button tiny radius']) }}</span>
</h2>
<hr>
{{ Form::open( array('route' => 'admin.pages.store') )}}
	<div class="editor-wrapper">
	{{ Form::text('title','',array('class' => 'title')) }}
	{{ $errors->first('title', '<small class="error">:message</small>') }}
	{{ Form::textarea('content') }}
	{{ $errors->first('content', '<small class="error">:message</small>') }}
	</div>
	{{ Form::select('draft', [false => 'Prêt à publier', true => 'Enregistrer en tant que brouillon'], false) }}
	<br>
	{{ Form::submit('valider', array('class' => 'button tiny radius')) }}
{{ Form::close()}}
