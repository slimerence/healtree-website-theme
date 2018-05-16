@extends(_get_frontend_layout_path('frontend'))
@section('content')
    <div class="content pt-20 mt-20">
        <div class="columns">
            <div class="column category-block-at-home">
                <a href="">
                    <h3 class="has-text-centered">{{ strtoupper('Essential Oil Serial') }}</h3>
                    <p class="has-text-centered">ORGANIC INGREDIENTS</p>
                    <img src="{{ asset('images/frontend/essential-products.jpg') }}" class="image" alt="Essential Oil">
                </a>
            </div>
            <div class="column category-block-at-home">
                <a href="">
                    <h3 class="has-text-centered">{{ strtoupper('CARRIER OIL') }}</h3>
                    <p class="has-text-centered">ORGANIC INGREDIENTS</p>
                    <img src="{{ asset('images/frontend/health-oil.jpg') }}" class="image" alt="Health Oil">
                </a>
            </div>
        </div>
    </div>

    <div class="content pl-20 pr-20 page-content-wrap">
        {!! $page->rebuildContent() !!}
    </div>

    <div class="content pt-20 mt-20">
        @if(count($featureProducts) > 0)
            <div class="columns">
                <div class="column">
                    <hr>
                </div>
                <div class="column"><h2 class="mt-10 has-text-centered">Feature Products</h2></div>
                <div class="column">
                    <hr>
                </div>
            </div>
            <div class="columns">
            @foreach($featureProducts as $featureProduct)
            <div class="column">
                <div class="show-mask-on-hover">
                        <img src="{{ $featureProduct->getProductDefaultImageUrl() }}" alt="{{ $featureProduct->name }}" class="image mb-10">
                        <div class="mask">
                            <a href="{{ url('catalog/product/'.$featureProduct->uri) }}">
                                <p class="name is-size-4">{{ $featureProduct->name }}</p>
                                <p class="price is-size-5">${{ $featureProduct->getFinalPriceGst() }}</p>
                            </a>
                        </div>
                </div>
            </div>
            @endforeach
            </div>
        @endif
    </div>

    <div class="content">
        <div class="tile is-ancestor">
            <div class="tile is-vertical is-8">
                <div class="tile">
                    <div class="tile is-parent is-vertical">
                        <article class="tile is-child is-marginless is-paddingless">
                            <figure class="image">
                                <img class="image" src="{{ asset('storage/uploads/homepage/2.jpg') }}" style="width: 100%;">
                            </figure>
                        </article>
                        <article class="tile is-child is-marginless is-paddingless">
                            <figure class="image">
                                <img class="image" src="{{ asset('storage/uploads/homepage/5.jpg') }}" style="width: 100%;">
                            </figure>
                        </article>
                    </div>
                    <div class="tile is-parent">
                        <article class="tile is-child is-info">
                            <figure class="image">
                                <img class="image" src="{{ asset('storage/uploads/homepage/3.jpg') }}" style="width: 100%;">
                            </figure>
                        </article>
                    </div>
                </div>
                <div class="tile is-parent">
                    <article class="tile is-child notification is-danger">
                        <p class="title">Contact Us</p>
                        <p class="subtitle">Phone: {{ $siteConfig->contact_phone }}</p>
                        <div class="content">
                        </div>
                    </article>
                </div>
            </div>
            <div class="tile is-parent">
                <article class="tile is-child">
                    <div class="content">
                        <p class="title has-text-centered">Essential Oil</p>
                        <p class="subtitle has-text-centered">Almond Sweet Oil</p>
                        <div class="content">
                            <figure class="image">
                                <img class="image" src="{{ asset('storage/uploads/homepage/7.jpg') }}" style="width: 100%;">
                            </figure>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>

@endsection