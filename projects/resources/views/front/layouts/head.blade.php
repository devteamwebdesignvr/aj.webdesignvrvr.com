<!-- Required meta tags -->
<meta charset="utf-8">
<title>@yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="keywords" content="@yield('keywords')" />
<meta name="description" content="@yield('description')" />
<meta name="robots" content="index, follow"/>
<meta name="coverage" content="Worldwide" />
<link rel="icon" href="{{ asset($setting_data['favicon'] ?? 'front/images/favicon.png') }}"  />
<meta property="og:site_name" content="{{ $setting_data['website'] }}" />
<meta property="og:type" content="article" />
<meta property="og:title" content="@yield('title')" />
<meta property="og:description" content="@yield('description')" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:domain" content="{{ url()->current() }}" />
<meta name="twitter:title" content="@yield('title')" />
<meta name="twitter:description" content="@yield('description')" />
@isset($ogimage)
    @if($ogimage)
        <meta name="twitter:image" content="{{ asset($ogimage) }}" />
        <meta property="og:image" content="{{ asset($ogimage) }}" />
    @else
        @if($setting_data['ogimage'])
            <meta name="twitter:image" content="{{ asset($setting_data['ogimage'] ?? 'front/images/logo.png') }}" />
            <meta property="og:image" content="{{ asset($setting_data['ogimage'] ?? 'front/images/logo.png') }}" />
        @else
            <meta name="twitter:image" content="{{ asset($setting_data['header_logo'] ?? 'front/images/logo.png') }}" />
            <meta property="og:image" content="{{ asset($setting_data['header_logo'] ?? 'front/images/logo.png') }}" />
        @endif
    @endif
@else
    @if($setting_data['ogimage'])
        <meta name="twitter:image" content="{{ asset($setting_data['ogimage'] ?? 'front/images/logo.png') }}" />
        <meta property="og:image" content="{{ asset($setting_data['ogimage'] ?? 'front/images/logo.png') }}" />
    @else
        <meta name="twitter:image" content="{{ asset($setting_data['header_logo'] ?? 'front/images/logo.png') }}" />
        <meta property="og:image" content="{{ asset($setting_data['header_logo'] ?? 'front/images/logo.png') }}" />
    @endif
@endif


<link href="{{ url()->current() }}" rel="canonical">
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "@yield('title')",
  "url": "{{ url('/') }}",
  "logo": "{{ asset($setting_data['favicon'] ?? 'front/images/favicon.png') }}",
  "description": "@yield('description')",
  "contactPoint": {
    "@type": "ContactPoint",
    "contactType": " contact us",
    "telephone":"{{ $setting_data['mobile'] }}",
    "email":"{{ $setting_data['email'] }}"
  },
  "sameAs": [
    "{{ $setting_data['twitter'] }}",
    "{{ $setting_data['linkedin'] }}",
    "{{ $setting_data['facebook'] }}"
  ]
}
</script>
@include("front.layouts.css")
@yield("css")