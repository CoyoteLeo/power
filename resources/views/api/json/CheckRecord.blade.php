<form action="{{ url('api/json/CheckRecord/insert') }}" method="post">
	{{ csrf_field() }}
<TEXTAREA cols='50' rows='5' name='json' ></TEXTAREA><input type="submit" name="">
</form>