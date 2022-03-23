@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header d-flex align-items-center">
              <a href="{{ route('admin.posts.index') }}" class="me-2"> <- </a>
                  {{ $post->title }}
                  <a class="ms-auto" href="{{ route('admin.posts.edit', $post->slug) }}">Modifica</a>
            </div>

            <div class="card-body">

              @if($post->image !== null)
                  <div class="my-3 d-flex justify-content-center">
                    <img class="img-fluid"src="{{ asset("storage/" . $post->image) }}" alt="image" class="img-fluid">
                  </div>
              @else
              <div class="my-3 d-flex justify-content-center">
                <img class="img-fluid"src="https://via.placeholder.com/150" alt="image" class="img-fluid">
              </div>
              @endif

              <p class="lead">
                {!! $post->content !!}
              </p>

              <div class="my-2">

                @php
                  use Carbon\Carbon;
                  $dateFormat = "d-m-y H:i"
                @endphp

                {{ $post->slug }}

                <br>

                Creato: {{ $post->created_at->format($dateFormat) }}

                <br>  

                @if($post->updated_at->diffInHours(date(0)) <= 12)
                  <p>Modificato: {{$post->updated_at->diffForHumans(date(0)) }}</p>
                @else 
                  <p>Modificato: {{$post->updated_at->format($dateFormat)}}</p>
                @endif

              </div>

              <div class="my-2">
                <strong>{{ $post->user->name }}</strong>
                <p>{{ $post->user->email }}</p>
              </div>

              @if ($post->category !== null)
                <div class="my-2">
                  Categoria: {{ $post->category->code }}
                  <br>
                  Descrizione: {{ $post->category->description }}
                </div>
              @endif

              @if ($post->tags !== null)
                <div class="my-2">tags:
                  @foreach ($post->tags as $tag)
                    <span class="bg-light">{{ $tag->name }}</span>
                  @endforeach
                </div>
              @endif

            </div>
          </div>
        </div>
      </div>
    </div>
@endsection