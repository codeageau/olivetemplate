@extends('layouts.app')
@section('content')
  <h4 class="mb-3">Settings</h4>
  <div class="card mb-3">
    <div class="card-body">
      <h6>Branding</h6>
      <form>
        <div class="mb-3">
          <label class="form-label">Primary Color</label>
          <input type="color" class="form-control form-control-color" value="#b43232" disabled>
        </div>
        <div class="mb-3">
          <label class="form-label">Logo</label>
          <input type="file" class="form-control" disabled>
        </div>
      </form>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <h6>SMTP (coming soon)</h6>
      <p>SMTP configuration UI will appear here.</p>
    </div>
  </div>
@endsection

