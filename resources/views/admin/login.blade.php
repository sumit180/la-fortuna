@extends('layouts.app')

@section('title', 'Admin Login')

@section('content')
<div class="section">
  <div class="container" style="max-width: 480px;">
    <h1 class="section-title" style="margin-bottom: 24px;">Admin Login</h1>
    @if(session('status'))
      <div class="alert alert-success" style="margin-bottom: 16px;">{{ session('status') }}</div>
    @endif
    @if($errors->any())
      <div class="alert alert-danger" style="margin-bottom: 16px;">
        {{ $errors->first() }}
      </div>
    @endif
    <livewire:admin.login />
  </div>
</div>
@endsection
