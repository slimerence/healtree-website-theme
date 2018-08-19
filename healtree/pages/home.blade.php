@extends(_get_frontend_layout_path('frontend'))
@section('content')
    <div class="container">

        <div class="content pt-20 mt-20">
            <div class="columns">
                <div class="column category-block-at-home">
                    <a href="{{ url('/category/view/Essential-Oil-Serial') }}">
                        <h3 class="has-text-centered">{{ strtoupper('Essential Oil Serial') }}</h3>
                        <p class="has-text-centered">ORGANIC INGREDIENTS</p>
                        <img src="{{ asset('images/frontend/essential-products.jpg') }}" class="image" alt="Essential Oil">
                    </a>
                </div>
                <div class="column category-block-at-home">
                    <a href="{{ url('/category/view/Carrier-Oil') }}">
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

    </div>

    <div class="container-fluid bg-dark-green">
        <div class="container bg-dark-green">
            <div class="columns" style="margin-bottom: 0;">
                <div class="column m-0">
                    <div class="mt-20 mb-20">
                        <img src="{{ asset('images/frontend/essential-products.jpg') }}">
                    </div>
                </div>
                <div class="column m-0">
                    <div class="content">
                        <div class="panel">
                            <h2 class="has-text-white mt-20">About Healtree</h2>
                            <p>
                                Healtree is a pure botanic essence brand from Australia. We extract every drop of essence from pure and potent plants to revitalize your body and mind. At Healtree, we believe health is the most important thing in our life, and our goal is improving your physical and emotional wellbeing based on scientific research and developing natural products to make your life healthier and happier.
                            </p>
                            <p>
                                We insist on using ancient traditional methods to extract essential oils, without using any chemical additives. This is not only because the Australian government has the world's most stringent regulatory system for the manufacturing and health product industries,  but also because we believe in the healing power of nature, and only create the healthiest products for you.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection