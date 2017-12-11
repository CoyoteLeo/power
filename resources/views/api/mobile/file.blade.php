<form action="{{ url('/api/mobile/file') }}" method="post" enctype="multipart/form-data">
	<input type="file" name="file[]"  multiple>
	<input type="submit" name="submit">
</form> 