<table class="table">
    <thead class="text-center">
    <tr>
        <th scope="col">Full Name</th>
        <th scope="col">Mobile</th>
        <th scope="col">Title</th>
        <th scope="col">Organization</th>
        <th scope="col">Acronym</th>
        <th scope="col">Location</th>
        <th scope="col">Start Date</th>
        <th scope="col">End Date</th>
        <th scope="col">Descriptions</th>
    </tr>
    </thead>
    <!-- table body -->
    <tbody>
        @foreach ($experiences as $experience)
            <tr>
                <td class="text-left">{{ $experience->individual->name }}</td>
                <td class="text-left">{{ $experience->individual->mobile }}</td>
                <td class="text-center">{{ $experience->job_title->name }}</td>
                <td class="text-center">{{ $experience->organization->name }} </td>
                <td class="text-center">{{ $experience->organization->acronym }} </td>
                <td class="text-center">{{ $experience->location->name }} </td>
                <td class="text-center">{{ $experience->start_date}} </td>
                <td class="text-center">{{ $experience->end_date }} </td>
                <td class="text-center">{{ $experience->descriptions }} </td>
            </tr>
        @endforeach
    </tbody>
</table>
