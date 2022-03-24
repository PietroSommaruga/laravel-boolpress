<form action="{{ route($route, $id) }}" method="POST" class="d-inline-block">
    @csrf
    @method("delete")
  
    <button type="submit" class="btn btn-link text-danger">
      Elimina
    </button>
  </form>
  