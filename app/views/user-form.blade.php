@extends('_master')

@section('title')
	DBF - Generate Users
@stop

@section('content')
	@if ($error != '')
		<div id="errorText">
			{{$error}}
		</div>
	@endif

	<form action="./user-gen" method="POST">
		<table>
			<tbody>
				<tr>
					<td><label for="numUsers">Number of Users: </label></td>
					<td><input type="number" name="numUsers" value="{{$numUsers}}" id="numUsers" /> 1-100</td>
				</tr>
				<tr>
					<td><label for="genBirthday">Generate Birthdays: </label></td>
					<td>
						<input type="checkbox" name="genBirthday" id="genBirthday" 
							@if ($genBirthday == "on")
								checked
							@endif
						/>
					</td>
				</tr>
				<tr>
					<td><label for="genProfile">Generate Profiles: </label></td>
					<td>
						<input type="checkbox" name="genProfile" id="genProfile" 
							@if ($genProfile)
								checked
							@endif
						/>
					</td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="submit" /></td>
				</tr>
			</tbody>
		</table>
	</form>

	
	@if ($userData != '')
		<div id="loremText">
			{{$userData}}
		</div>
	@endif
@stop