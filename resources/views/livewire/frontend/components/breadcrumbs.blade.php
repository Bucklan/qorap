
    @unless ($breadcrumbs->isEmpty())
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                @foreach($breadcrumbs as $breadcrumb)
                        @if (!is_null($breadcrumb->url) && !$loop->last)
                        <span></span>
                            <a href="{{ $breadcrumb->url }}" class="text-black-50">{{ $breadcrumb->title }}</a>
                        @else
                            <span></span>
                            {{ $breadcrumb->title }}
                        @endif

                    @endforeach
                </div>
            </div>
        </div>
    @endunless
