<div class="table-responsive">
{{--    <table class="table table-striped {{$class}} btn-sm" id="{{$id}}">--}}
    <table class="table table-striped">
        <thead class="text-center">
            <tr>
                <th class="numCol">#</th>
                {{$thead}}
                <th class="actCol">Actions</th>
            </tr>
        </thead>

        <tbody>
            {{$slot}}
        </tbody>
    </table>

    <div class="row">
        <div class="col-md-12">
            <div class="float-left">

            </div>
            <div class="float-right">
                {{$collection->links()}}
            </div>
        </div>
    </div>

</div>

