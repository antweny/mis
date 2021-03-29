<div class="modal fade" id="{{$id}}" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog {{$class}}" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title">{{$title}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{$slot}}
            </div>

            @if(!is_null($footer))
                <div class="modal-footer">
                    {{$footer}}
                </div>
            @endif
        </div>
    </div>
</div>
