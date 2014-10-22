@extends('_master')

@section('title')
	DBF - Generate Lorem
@stop

@section('content')
	@if ($error !== '')
		<div id="errorText">
			{{$error}}
		</div>
	@endif

	<form action="./lorem-gen" method="POST">
		<table>
			<tbody>
				<tr>
					<td><label for="numParagraphs">Number of Paragraphs: </label></td>
					<td><input type="number" name="numParagraphs" value="{{$numParagraphs}}" id="numParagraphs" /> 1-100</td>
				</tr>
				<tr colspan="2">
					<td><input type="submit" name="submit" /></td>
				</tr>
			</tbody>
		</table>
	</form>

	
	@if ($content !== '')
		<div id="loremText">
			{{$content}}
		</div>
	@endif
@stop