@component('mail::message')
    # أهلاً وسهلاً {{ $body }} ،
    نقدر لك تواصلك معنا، ويهمنا مساعدتك بشأن الطلب المقدم من قبلك...
    ونود ابلاغك بأن فريق العمل يسعى جاهداً في طلبكم...
    ولمزيد من التفاصيل نأمل منك الاطلاع على صفحة حسابك...

    ونتطلع لخدمتكم دائماً،،،
    {{ config('app.name') }}
@endcomponent
