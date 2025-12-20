<x-mail::message>

    Hello {{ $user->name }}

    We received a request to reset your password.
    This is tour verification code {{ $user->verification_code }}


    Thanks,
    {{ config('app.name') }}
</x-mail::message>
