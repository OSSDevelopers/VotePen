@component('mail::message')
# Welcome To VotePen {{ '@' . $username }}

We are so excited about you joining VotePen. Here are a couple of tips to help you get started:
<br>

- **Customize:** You can [customize](https://votepen.com/{{ '@' . $username }}/settings) your account's **color**, **font** and your very own home **feed** to make sure you always get what's best for you.
- **Find Channels:** VotePen is nothing but a collection of awesome channels (communities) with awesome users like you. Whenever you felt like finding new ones, just [go here](https://votepen.com/find-channels).
- **Need Help?** If you are wondering about a VotePen's feature that is confusing to you, just look for it in our ["help center"](https://votepen.com/help) or ask the community for [help](https://votepen.com/c/VotePenSupport). They'd be happy to help.

We have a warm community waiting to welcome you. How about saying hello to them?

@component('mail::button', ['url' => 'https://votepen.com/c/sayhello'])
Say Hello
@endcomponent


@component('mail::panel')
Should you ever encounter problems with your account or forget your password, we will contact you at this address.
@endcomponent


Regards,<br>
The VotePen Team
@endcomponent