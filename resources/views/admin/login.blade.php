@extends('layouts.app')

@section('title', 'Admin Login')

@section('content')
<div class="section">
  <div class="container" style="max-width: 480px; padding-top: 24px;">
    <h1 class="section-title" style="margin-bottom: 24px;">Admin Login</h1>
    @if(session('status'))
      <div class="alert alert-success" style="margin-bottom: 16px;">{{ session('status') }}</div>
    @endif
    @if($errors->any())
      <div class="alert" style="margin-bottom: 16px; padding: 14px 16px; border-radius: 10px; background: #fdecec; color: #b71c1c; border: 1px solid #f5c2c7;">
        {{ $errors->first() }}
      </div>
    @endif
    <livewire:admin.login />
  </div>
</div>
@endsection
