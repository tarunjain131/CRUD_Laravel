<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Salary</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->salary }}</td>
                <td>
                    <a href="{{ route('show', $item->id) }}" class="btn btn-dark btn-sm"
                        style="margin-right: 10px;">View</a>
                    <a href="{{ route('edit', $item->id) }}" class="btn btn-dark btn-sm"
                        style="margin-right: 10px;">Edit</a>
                    <form action="{{ route('delete', $item->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                         <button type="button" class="btn btn-danger btn-sm delete-button">Delete</button>
                    </form>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $data->links() }}
