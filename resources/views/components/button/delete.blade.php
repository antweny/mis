<form method="POST" action="{{$slot}}" class="form-horizontal" role="form" autocomplete="off">
    @csrf
    @method('DELETE')
    <button class="btn btn-block btn-del" onclick="return confirm('Confirm to delete?')"><i class="fa fa-times"></i> Delete </button>
</form>

