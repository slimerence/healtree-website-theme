@if(isset($footer))
    {!! $footer->content !!}
@else
    <div class="footer d-flex justify-content-center">
        <div class="container">
            <div class="columns">
                <div class="column">
                    {!! \App\Models\Utils\AMP\MediaUtil::NormalImage(asset($siteConfig->logo_dark),'SIIT: a bridge across cultures', 200, 117, 'image') !!}
                </div>
                <nav class="column is-four-fifths">
                    <div class="columns">
                        <div class="column is-one-quarter">
                            <p style="border-bottom: solid 1px white;line-height: 36px;">
                                <a class="is-size-6" href="#" title="Here to help">
                                    Here to help
                                </a>
                            </p>
                            <p>
                                <a href="{{ url('/page/about-us') }}" title="About us">
                                   About us
                                </a>
                            </p>
                            <p>
                                <a href="{{ url('/contact-us') }}" title="Contact us">
                                    Contact us
                                </a>
                            </p>
                            <p>
                                <a href="{{ url('/page/blog') }}" title="Blog">
                                    Blog
                                </a>
                            </p>

                        </div>
                        <div class="column is-one-quarter">
                            <p style="border-bottom: solid 1px white;line-height: 36px;">
                                <a class="is-size-4" href="#" title="">
                                    &nbsp;
                                </a>
                            </p>
                            <p>
                                <a href="{{ url('/page/terms') }}" title="Terms & Conditions">
                                    Terms & Conditions
                                </a>
                            </p>
                            <p>
                                <a href="{{ url('/page/privacy-policy') }}" title="{{ trans('general.News_Events') }}">
                                    Privacy Policy
                                </a>
                            </p>
                        </div>
                        <div class="column footer-logo is-offset-one-quarter">
                            <p style="border-bottom: solid 1px white;line-height: 36px;">
                                <a class="is-size-6" href="#" title="Follow Healtree">
                                    Follow Healtree
                                </a>
                            </p>
                            <div style="justify-content: space-around;">
                                <a href="{{ strpos($siteConfig->facebook,'http') !== false ? $siteConfig->facebook : 'https://'.$siteConfig->facebook }}" target="_blank" class="is-size-4-desktop is-size-3-mobile mr-20">
                                    <i class="fab fa-facebook"></i>
                                </a>
                                <a href="{{ strpos($siteConfig->twitter,'http') !== false ? $siteConfig->twitter : 'https://'.$siteConfig->twitter }}" target="_blank" class=" is-size-4-desktop is-size-3-mobile mr-20">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="{{ strpos($siteConfig->instagram,'http') !== false ? $siteConfig->instagram : 'https://'.$siteConfig->instagram }}" target="_blank" class="is-size-4-desktop is-size-3-mobile mr-20">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="{{ strpos($siteConfig->google_plus,'http') !== false ? $siteConfig->google_plus : 'https://'.$siteConfig->google_plus }}" target="_blank" class="is-size-4-desktop is-size-3-mobile mr-20">
                                    <i class="fab fa-google-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="columns">
                <div class="column" style="border-top: solid 1px #13213b;">
                    <br>
                    <p class="has-text-centered">
                        Copyright © 2019 Healtree.
                    </p>
                    <p class="has-text-centered">
                        Email: <a class="has-text-danger" href="mailto:{{ $siteConfig->contact_email }}">{{ $siteConfig->contact_email }}</a>,&nbsp;&nbsp;
                        Phone: <span class="has-text-danger">{{ $siteConfig->contact_phone }}</span>&nbsp;&nbsp;
                    </p>
                </div>
            </div>
        </div>
    </div>
@endif