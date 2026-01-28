@forelse ($users as $user)
<tr>
    <th scope="row">{{ $loop->iteration }}</th>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>Admin</td>

    <td>
        <form action="{{ route('deleteUser', $user) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this user?');"><i class="bi bi-trash"></i> Delete</button>
        </form>
        <a href="{{ route('editUser', $user->id) }}" class="btn btn-primary btn-sm">
            <i class="bi bi-pencil-square"></i> Edit
        </a>
    </td>
</tr>
@empty
<td colspan="6">
    <span class="text-danger">
        <strong>No User Found!</strong>
    </span>
</td>
@endforelse