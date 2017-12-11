<form action="{{ url('/api/mobile/ContractorStaff') }}" method="post" enctype="multipart/form-data">
	{{ csrf_field() }}    
	<input type="file" name="file" id="file">
	<input type="submit" name="submit">
</form> 