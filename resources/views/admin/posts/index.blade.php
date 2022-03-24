@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">

        <div class="card">
          <div class="card-header d-flex">
            Lista dei post

            <a class="ms-auto" href="{{ route('admin.posts.create') }}">Aggiungi...</a>
          </div>

          <div class="card-body">
            <ul class="list-group">
              @foreach ($posts as $post)
                <li class="list-group-item ">
                  <div class="d-flex align-items-center">
                    <div>
                        {{ $post->title }}
                        <br>

                        @php
                          $dateFormat = "d-m-y H:i"
                        @endphp

                        <small class="fst-italic">{{ $post->created_at->format($dateFormat) }} - {{ $post->user->name }} - {{ isset($post->category) ? $post->category->code : "senza categoria" }}</small>

                        <br>

                        @if($post->updated_at->diffInHours(date(0)) <= 12)
                          <span>Modificato: {{$post->updated_at->diffForHumans(date(0)) }}</span>
                        @else 
                          <span>Modificato: {{$post->updated_at->format($dateFormat)}}</span>
                        @endif


                        @if ($post->trashed())
                          <span class="position-absolute top20 end-0 translate-middle badge rounded-pill bg-danger p-2">POST ARCHIVIATO</span>
                        @endif


                        
                    </div>
                    <div class="d-flex">
                      @include('partials.deleteBtn', [
                        'id' => $post->id,
                        'route' => 'admin.posts.destroy',
                      ])

                      <a class="ms-auto" href="{{ route('admin.posts.show', $post->slug) }}">Mostra</a>
                    </div>
                    
                  </div>
                  @if($post->image !== null)
                    <div class="my-3 d-flex justify-content-center">
                      <img class="img-fluid"src="{{ asset("storage/" . $post->image) }}" alt="image" class="img-fluid">
                    </div>
                  @else
                    <div class="my-3 d-flex justify-content-center">
                      <img class="img-fluid"src="https://via.placeholder.com/450" alt="image" class="img-fluid">
                    </div>
                  @endif
                </li>
              @endforeach
            </ul>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection