<table border="1">
    <thead>
        <tr>
            <th>Title</th>
            <th>Created By</th>
            <th>Due Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($manager_task as $item)
            <tr>
                <td>{{ $item->title }}</td>
                <td>{{ $item->created_user->username }}</td>
                <td>{{ $item->due_date }}</td>
                <td>{{ $item->status }}</td>
                <td>
                    <a href="{{ route('manager.task_from_director.detail', $item->id) }}">Detail</a>
                    {{-- detail send to employee, input form employee tasks --}}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
