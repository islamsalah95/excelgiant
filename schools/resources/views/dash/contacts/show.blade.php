@extends('layouts.dash')

@section('titel')
@if($slug == 'replay')
<span class="text-muted fw-light">{{ __('contacts/index.main_titel') }}/</span>{{ __('contacts/index.replay') }}
@elseif($slug == 'redirect')
<span class="text-muted fw-light">{{ __('contacts/index.main_titel') }}/</span>{{ __('contacts/index.redirect') }}
@else
<span class="text-muted fw-light">{{ __('contacts/index.main_titel') }}/</span>{{ __('contacts/index.replay') }}
@endif
@endsection

@section('content')
    <!-- Content -->
    @if($slug == 'replay')
    @livewire('contacts.replay', ['contact' => $contact])
    @elseif($slug == 'redirect')
   @livewire('contacts.redirect', ['contact' => $contact])
   @else
   @livewire('contacts.replay', ['contact' => $contact])
   @endif

    <!-- / Content -->
@endsection


