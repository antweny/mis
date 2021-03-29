<div class="table-responsive">
    <table class="table table-striped {{$class}} btn-sm" id="{{$id}}">
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
</div>
