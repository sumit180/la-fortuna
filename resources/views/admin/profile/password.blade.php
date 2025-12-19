@extends('admin.layouts.app')

@section('title', 'Change Password')
@section('page_title', 'Change Password')

@section('content')
<div class="card" style="max-width:640px;background: var(--white); border: 1px solid var(--light-gray); border-radius: 12px; box-shadow: 0 10px 24px var(--shadow);">
  <div style="padding: 16px; border-bottom:1px solid var(--light-gray);">
    <div style="font-weight:700;">Update Password</div>
    <div style="color: var(--gray); font-size: 14px;">Keep your account secure with a strong password.</div>
  </div>
  <div style="padding: 16px;">
    @if(session('status'))
      <div class="alert alert-success" style="margin-bottom:12px;">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.password.update') }}">
      @csrf
      <div class="form-group" style="margin-bottom: 12px;">
        <label for="current_password">Current Password</label>
        <input id="current_password" type="password" name="current_password" class="form-control" required />
        @error('current_password')<div class="text-danger" style="color:#cc0000; font-size: 13px;">{{ $message }}</div>@enderror
      </div>

      <div class="form-group" style="margin-bottom: 12px;">
        <label for="password">New Password</label>
        <input id="password" type="password" name="password" class="form-control" required />
        @error('password')<div class="text-danger" style="color:#cc0000; font-size: 13px;">{{ $message }}</div>@enderror
      </div>

      <div class="form-group" style="margin-bottom: 16px;">
        <label for="password_confirmation">Confirm New Password</label>
        <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required />
      </div>

      <button type="submit" class="btn btn-primary" style="background: var(--gold); border: none; color: var(--white); padding: 10px 14px; border-radius: 8px;">Update Password</button>
    </form>
  </div>
</div>
@endsection
