<table class="table">
    <thead class="text-center">
        <tr>
            <th>Name</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Sex</th>
            <th>Age Group</th>
            <th>Occupation</th>
            <th>Location</th>
            <th>Group</th>
        </tr>
    </thead>
    <!-- table body -->
    <tbody>
        @foreach ($individuals as $individual)
            <tr>
                <td class="text-left">{{$individual->name}}</td>
                <td  class="text-center">{{$individual->mobile}}</td>
                <td  class="text-center">{{$individual->email}}</td>
                <td  class="text-center">{{$individual->sex}}</td>
                <td  class="text-center">{{$individual->age_group}}</td>
                <td  class="text-left">{{$individual->occupation}}</td>
                <td class="text-center">{{$individual->location->name}}</td>
                <td class="text-center">@foreach($individual->individual_group as $group) {{$group->name.','}} @endforeach </td>
            </tr>
        @endforeach
    </tbody>
</table>
