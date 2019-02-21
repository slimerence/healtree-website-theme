<section class="nav-ctn">
    @include(_get_frontend_layout_path('frontend.top_bar'))
    <div class="container">
        <div id="custom-nav">
            <div class="field is-grouped pt-10">
                @if(!session('user_data.id'))
                    <div class="top-icon">
                        <a href="{{ url('frontend/customers/login') }}">
                        <span>
                        <i class="fas fa-sign-in-alt fa-fw"></i>
                        </span>
                        </a>
                    </div>
                    <div class="top-icon">
                        <a href="{{ url('frontend/customers/register') }}">
                        <span>
                        <i class="fas fa-user fa-fw"></i>

                        </span>
                        </a>
                    </div>
                @else
                    <div class="top-icon">
                        <a href="{{ url('frontend/my_orders/'.session('user_data.uuid')) }}">
                          <span>
                            <i class="fab fa-file fa-fw"></i>
                          </span>
                        </a>
                    </div>
                    <div class="top-icon">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                          <span>
                            <i class="fas fa-sign-out-alt fa-fw"></i>
                          </span>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form>
                        </a>
                    </div>
                @endif
                @if(env('activate_ecommerce',false))
                    @include(_get_frontend_layout_path('frontend.shopping_cart'))
                @endif
            </div>
        </div>
    </div>
    <nav class="navbar custom-header container" role="navigation" aria-label="main navigation" id="navigation"  style="z-index: 9999;">

        <div class="navbar-brand">
            <a class="navbar-item logo-head-text" href="{{ url('/') }}">
                @if(empty($siteConfig->logo))
                    {{ str_replace('_',' ',env('APP_NAME','Healtree')) }}
                @else
                    <img src="{{asset($siteConfig->logo)}}" alt="logo" style="height: 80px;">
                @endif
            </a>

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navMenu">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>

        </div>
        <div id="navMenu" class="navbar-menu dark-theme-nav">
            <div class="navbar-start">
                @if(isset($categoriesTree) && count($categoriesTree) > 0)
                    <a id="catalog-viewer-app" class="navbar-item product-category-root" href="#">
                        <i class="fa fa-cart-plus" aria-hidden="true"></i>&nbsp;&nbsp;Catalog
                        <div class="columns is-marginless is-paddingless" id="" style="position: absolute;left:0;top:80px;">
                            <?php
                            $categories = [];
                            foreach ($categoriesTree as $item) {
                                $data = [
                                    'id' => $item->uuid,
                                    'uri' => $item->uri,
                                    'name' => app()->getLocale()=='cn' ? $item->name_cn : $item->name,
                                ];
                                // 目录必须至少包含一个产品或者一个子目录才可以被加载到导航栏
                                $sub = $item->loadForNav();
                                if(count($sub['subs'])>0 || count($sub['products']) > 0){
                                    $data = array_merge($data, $sub);
                                    $categories[] = $data;
                                }
                            }
                            ?>
                            <catalog-viewer
                                    category-loading-url="category/view"
                                    product-loading-url="catalog/product"
                                    :first-level-categories="{{ json_encode($categories) }}"
                                    :width="1280"
                                    :height="600"
                                    :left-width="{{ env('catalog_trigger_menu_width',161) }}"
                                    :show-now="false"
                                    trigger-id=".product-category-root"
                                    show-by="hover"
                                    categories-list-bg-color="{{ $siteConfig->menu_bar_color }}"
                            >
                            </catalog-viewer>
                        </div>
                    </a>
                @endif
                @foreach($rootMenus as $key=>$rootMenu)
                    <?php
                    $tag = $rootMenu->html_tag;
                    $children = $rootMenu->getSubMenus();
                    if($tag && $tag !== 'a'){
                        echo '<'.$tag.'>';
                    }
                    ?>
                    @if(count($children) == 0)
                        <a class="{{ $rootMenu->css_classes }}" href="{{ url($rootMenu->link_to=='/' ? '/' : '/page'.$rootMenu->link_to) }}">
                            {{ app()->getLocale()=='cn' && !empty($rootMenu->name_cn) ? $rootMenu->name_cn : $rootMenu->name }}
                        </a>
                    @else
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link" href="{{ $rootMenu->link_to == '#' ? '#' : url($rootMenu->link_to) }}">
                                {{ app()->getLocale()=='cn' && !empty($rootMenu->name_cn) ? $rootMenu->name_cn : $rootMenu->name }}
                            </a>
                            <div class="navbar-dropdown is-boxed">
                                @foreach($children as $sub)
                                    <a class="navbar-item" href="{{ url('/page'.$sub->link_to) }}">
                                        {{ app()->getLocale()=='cn' && !empty($sub->name_cn) ? $sub->name_cn : $sub->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    <?php
                    if($tag && $tag !== 'a'){
                        echo '</'.$tag.'>';
                    }
                    ?>
                @endforeach
                <a class="navbar-item" href="{{ url('contact-us') }}">
                    {{ trans('general.menu_contact') }}
                </a>
            </div>
        </div>
        <div class="navbar-end">
            <div class="navbar-item">
                @if(env('activate_search_bar',false))
                    <div id="navigation-app">
                        <el-autocomplete
                                class="nav-search-form must-on-layer-top"
                                v-model="searchKeyword"
                                :fetch-suggestions="querySearchAsync"
                                placeholder="Search ..."
                                @select="handleSelect"
                                :trigger-on-focus="false"
                                prefix-icon="el-icon-search"
                        ></el-autocomplete>
                    </div>
                @endif
            </div>
        </div>
    </nav>
</section>
