@component('mail::message')

# Hey {{ '@' . $username }},

Thank you for registering for an account on VotePen. Before we get started, we just need to confirm that this is you. Click on below button to verify your email address:

@component('mail::button', ['url' => config('app.url') . '/email/verify?token=' . $token])
Verify Email
@endcomponent

@component('mail::panel')
    Need help? Check out our [Help Center](https://votepen.com/help), ask [community](https://votepen.com/c/VotePenSupport), or hit us up on Twitter [@VotePen](https://twitter.com/VotePen).
    Want to give us feedback? Let us know what you think on our [feedback page](https://votepen.com?feedback=1).
@endcomponent

@component('mail::subcopy')
If you’re having trouble clicking the "Verify Email" button, copy and paste the URL below into your web browser:

{{ config('app.url') . '/email/verify?token=' . $token }}
@endcomponent

@endcomponent
