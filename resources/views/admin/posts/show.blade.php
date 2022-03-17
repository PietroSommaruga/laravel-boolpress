@extends('layouts.app')

@section('content')
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header d-flex">
              <a href="{{ route('admin.posts.index') }}" class="me-2"> <- </a>
                  {{ $post->title }}
                  <a class="ms-auto" href="{{ route('admin.posts.edit', $post->slug) }}">Modifica</a>
            </div>

            <div class="card-body">

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
                  <p>Modificato: <i>{{$post->updated_at->diffForHumans(date(0)) }}</i></p>
                @else 
                  <p>Modificato: <i>{{$post->updated_at->format($dateFormat)}}</i></p>
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