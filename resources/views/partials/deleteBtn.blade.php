<form action="{{ route($route, $id) }}" method="POST">
@csrf
@method('delete')

<button type="submit" class="btn">
    <i class="fa-regular fa-trash-can"></i>
</button>
</form>