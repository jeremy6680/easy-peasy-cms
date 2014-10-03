
		@if(Session::has('ok'))
			<div data-alert class="alert-box success radius">{{ Session::get('ok') }}</div>
		@endif


				<h2>Liste des utilisateurs</h2>

			<table>
				<thead>
					<tr>
						<th>#</th>
						<th>Nom</th>
						<th></th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				  @foreach ($users as $user)
				    <td>{{ $user->id }}</td>
				    <td><strong>{{ $user->pseudo }}</strong></td>
				    <td>{{ link_to_route('users.show', 'Voir', array($user->id), array('class' => 'button success small radius')) }}</td>
				    <td>{{ link_to_route('users.edit', 'Modifier', array($user->id), array('class' => 'button small radius')) }}</td>
				    <td>
							{{ Form::open(array('method' => 'DELETE', 'route' => array('users.destroy', $user->id))) }}
								{{ Form::submit('Supprimer', array('class' => 'button alert small radius', 'onclick' => 'return confirm(\'Voulez-vous vraiment supprimer cet utilisateur ?\')')) }}
							{{ Form::close() }}
				    </td>
				    </tr>
				  @endforeach
	  		</tbody>
			</table>

		{{ link_to_route('users.create', 'Ajouter un utilisateur', null, array('class' => 'button secondary small radius right')) }}
		{{ $users->links(); }}