@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      
        @foreach ($contacts as $contact)
        <div class="card col-10 m-2 p-3">  
                <h5>{{ $contact->name }}</h5>
                <span class="mb-1">{{ $contact->email }}</span>
                <div class="mb-1">{{ $contact->message }}</div>
                @if ($contact->attachment)
                <div class="mb-1">
                  <a href="{{ asset('storage/' . $contact->attachment) }}" target="_blank">Apri allegato</a>
                </div>
                @endif
                <span class="text-secondary">{{ $contact->created_at->format('d/m/Y H:i ') }}</span>
        </div>

          


        
        @endforeach
      
    </div>
  </div>
  </div>
@endsection