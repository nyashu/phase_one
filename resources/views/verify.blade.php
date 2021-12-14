<h1>Verify email</h1>

@if (session()->has('success'))

<div class="alert alert-success">
    {{ session()->get('success') }}
</div>


@endif

<p>Please verify your email address by clicking the link in the mail we just sent you. Thanks!</p>

{{-- <form action="{{ route('verification.resend') }}" method="post">
    @csrf
    <button type="submit">Request a new link</button>
</form> --}}