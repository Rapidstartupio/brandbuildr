@if(!auth()->guest() && auth()->user()->hasAnnouncements())
@include('theme::partials.announcements')
@endif

<!-- Scripts -->
<script src="{{ asset('themes/' . $theme->folder . '/js/app.js?11') }}"></script>
<script src="{{ asset('js/flowbite.min.js') }}"></script>

@yield('javascript')
{!! html_entity_decode(setting('site.custom_footer_code')) !!}
@if(setting('site.google_analytics_tracking_id', ''))
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id={{ setting('site.google_analytics_tracking_id') }}"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', '{{ setting("site.google_analytics_tracking_id") }}');
</script>

@endif