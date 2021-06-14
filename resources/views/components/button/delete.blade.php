<form method="POST" action="{{$slot}}" class="form-horizontal" role="form" autocomplete="off">
    @csrf
    @method('DELETE')
    <button class="btn btn-block btn-del" onclick="return confirm('Confirm to delete?')" data-toggle="tooltip" data-placement="top" title="Delete">
        <i class="fa fa-times"></i> Delete
    </button>
</form>

