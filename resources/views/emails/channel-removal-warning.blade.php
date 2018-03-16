@component('mail::message')

# Dear {{ '@' . $user->username }}, moderator of [#{{ $channel->name }}](https://votepen.com/c/{{ $channel->name }}?ref=email)

During the beta phase, to keep the community clean and active, we are deleting all the inactive channels that haven't had any activities in the last 60 days. Your **#{{ $channel->name }}** channel hasn't had any activities in **{{ optional($channel->submissions()->orderBy('created_at', 'desc')->first())->created_at->diffInDays() }} days**. Thus, In case you intend to keep your channel alive, please start posting to it. Otherwise, just ignore this email.

We'll begin deleting inactive channels a week after the date of sending this email.

@component('mail::button', ['url' => config('app.url') . '/c/' . $channel->name . '?ref=email'])
    Go to #{{ $channel->name }}
@endcomponent

Thank you for being a VotePen moderator!<br>
The VotePen Team

@component('mail::subcopy')
    Need help? Check out our [Help Center](https://votepen.com/help), ask [community](https://votepen.com/c/VotePenSupport), or hit us up on Twitter [@VotePen](https://twitter.com/VotePen).
    Want to give us feedback? Let us know what you think on our [feedback page](https://votepen.com?feedback=1).
@endcomponent

@endcomponent