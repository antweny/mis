<table class="table">
    <thead class="text-center">
    <tr>
        <th scope="col">Name</th>
        <th scope="col">Acronym</th>
        <th scope="col">Founded</th>
        <th scope="col">Category</th>
        <th scope="col">Location</th>
        <th scope="col">Mobile</th>
        <th scope="col">Email</th>
        <th scope="col">Website</th>
        <th scope="col">Fax</th>
        <th scope="col">Address</th>
        <th scope="col">Descriptions</th>
    </tr>
    </thead>
    <!-- table body -->
    <tbody>
    @foreach ($organizations as $organization)
        <tr>
            <td class="text-left">{{ $organization->name }}</td>
            <td class="text-center">{{ $organization->acroynm }}</td>
            <td class="text-center">{{ $organization->founded }}</td>
            <td class="text-center">{{$organization->organization_category->name}}</td>
            <td class="text-center">{{$organization->location->name}}</td>
            <td class="text-center">{{$organization->mobile}}</td>
            <td class="text-center">{{$organization->email}}</td>
            <td class="text-center">{{$organization->website}}</td>
            <td class="text-center">{{$organization->fax}}</td>
            <td class="text-center">{{$organization->address}}</td>
            <td class="text-center">{{$organization->desc}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
