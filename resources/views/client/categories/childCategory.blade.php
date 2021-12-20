@extends('client.layouts.app')

@section('titleWeb' , 'نمایش دسته های فرزند')


@section('content')

    <div id="container">
        <div class="container">

            <!-- Breadcrumb Start-->
            <ul class="breadcrumb">
                <li><a href="index.html"><i class="fa fa-home"></i></a></li>
                <li><a href="{{ route('client.category.getChild' , $childCategory) }}">{{ $childCategory->title_fa }}</a></li>
            </ul>
            <!-- Breadcrumb End-->


            <div class="row">
                <!--Left Part Start -->
                <aside id="column-left" class="col-sm-3 hidden-xs">

                    <h3 class="subtitle">دسته ها</h3>
                    <div class="box-category">


                        <ul id="cat_accordion">
                            <li class="cutom-parent-li"><a href="" class="cutom-parent">مد و زیبایی<span
                                        class="dcjq-icon"></span></a> <span class="down"></span>

                                <ul style="display: none;">
                                    <li class="cutom-parent-li"><a href="category.html" class="cutom-parent">آقایان<span
                                                class="dcjq-icon"></span></a> <span class="down"></span>
                                        <ul style="display: none;">
                                            <li><a href="category.html">زیردسته ها</a></li>
                                            <li><a href="category.html">زیردسته ها</a></li>
                                            <li><a href="category.html">زیردسته ها</a></li>
                                            <li><a href="category.html">زیردسته ها</a></li>
                                            <li><a href="category.html">زیردسته جدید</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="category.html">بانوان</a></li>
                                    <li class="cutom-parent-li"><a href="category.html"
                                                                   class="cutom-parent">دخترانه<span
                                                class="dcjq-icon"></span></a> <span class="down"></span>
                                        <ul style="display: none;">
                                            <li><a href="category.html">زیردسته ها</a></li>
                                            <li><a href="category.html">زیردسته جدید</a></li>
                                            <li><a href="category.html">زیردسته جدید</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="category.html">پسرانه</a></li>
                                    <li><a href="category.html">نوزاد</a></li>
                                    <li class="cutom-parent-li"><a href="category.html" class="cutom-parent">لوازم<span
                                                class="dcjq-icon"></span></a> <span class="down"></span>
                                        <ul style="display: none;">
                                            <li><a href="category.html">زیردسته های جدید</a></li>
                                        </ul>
                                    </li>
                                </ul>


                            </li>
                            <li class="cutom-parent-li"><a class="active cutom-parent"
                                                           href="category.html">الکترونیکی<span
                                        class="dcjq-icon"></span></a> <span class="down"></span>
                                <ul style="display: block;">
                                    <li class="cutom-parent-li"><a href="category.html" class="cutom-parent">لپ تاپ<span
                                                class="dcjq-icon"></span></a> <span class="down"></span>
                                        <ul style="display: none;">
                                            <li><a href="category.html">زیردسته های جدید</a></li>
                                            <li><a href="category.html">زیردسته های جدید</a></li>
                                            <li><a href="category.html">زیردسته جدید</a></li>
                                        </ul>
                                    </li>
                                    <li class="cutom-parent-li"><a href="category.html" class="cutom-parent">رومیزی<span
                                                class="dcjq-icon"></span></a> <span class="down"></span>
                                        <ul style="display: none;">
                                            <li><a href="category.html">زیردسته های جدید</a></li>
                                            <li><a href="category.html">زیردسته جدید</a></li>
                                            <li><a href="category.html">زیردسته جدید</a></li>
                                        </ul>
                                    </li>
                                    <li class="cutom-parent-li"><a href="category.html" class="cutom-parent">دوربین<span
                                                class="dcjq-icon"></span></a> <span class="down"></span>
                                        <ul style="display: none;">
                                            <li><a href="category.html">زیردسته های جدید</a></li>
                                        </ul>
                                    </li>
                                    <li class="cutom-parent-li"><a href="category.html" class="cutom-parent">موبایل و
                                            تبلت<span class="dcjq-icon"></span></a> <span class="down"></span>
                                        <ul style="display: none;">
                                            <li><a href="category.html">زیردسته های جدید</a></li>
                                            <li><a href="category.html">زیردسته های جدید</a></li>
                                        </ul>
                                    </li>
                                    <li class="cutom-parent-li"><a href="category.html" class="cutom-parent">صوتی و
                                            تصویری<span class="dcjq-icon"></span></a> <span class="down"></span>
                                        <ul style="display: none;">
                                            <li><a href="category.html">زیردسته های جدید</a></li>
                                            <li><a href="category.html">زیردسته جدید</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="category.html">لوازم خانگی</a></li>
                                </ul>
                            </li>
                            <li class="cutom-parent-li"><a href="category.html" class="cutom-parent">کفش<span
                                        class="dcjq-icon"></span></a> <span class="down"></span>
                                <ul style="display: none;">
                                    <li><a href="category.html">آقایان</a></li>
                                    <li class="cutom-parent-li"><a href="category.html" class="cutom-parent">بانوان<span
                                                class="dcjq-icon"></span></a> <span class="down"></span>
                                        <ul style="display: none;">
                                            <li><a href="category.html">زیردسته های جدید</a></li>
                                            <li><a href="category.html">زیردسته ها</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="category.html">دخترانه</a></li>
                                    <li><a href="category.html">پسرانه</a></li>
                                    <li><a href="category.html">نوزاد</a></li>
                                    <li class="cutom-parent-li"><a href="category.html" class="cutom-parent">لوازم<span
                                                class="dcjq-icon"></span></a><span class="down"></span>
                                        <ul style="display: none;">
                                            <li><a href="category.html">زیردسته های جدید</a></li>
                                            <li><a href="category.html">زیردسته های جدید</a></li>
                                            <li><a href="category.html">زیردسته ها</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="cutom-parent-li"><a href="category.html" class="cutom-parent">ساعت<span
                                        class="dcjq-icon"></span></a> <span class="down"></span>
                                <ul style="display: none;">
                                    <li><a href="category.html">ساعت مردانه</a></li>
                                    <li><a href="category.html">ساعت زنانه</a></li>
                                    <li><a href="category.html">ساعت بچگانه</a></li>
                                    <li><a href="category.html">لوازم</a></li>
                                </ul>
                            </li>
                            <li class="cutom-parent-li"><a href="category.html" class="cutom-parent">زیبایی و سلامت<span
                                        class="dcjq-icon"></span></a> <span class="down"></span>
                                <ul style="display: none;">
                                    <li><a href="category.html">عطر و ادکلن</a></li>
                                    <li><a href="category.html">آرایشی</a></li>
                                    <li><a href="category.html">ضد آفتاب</a></li>
                                    <li><a href="category.html">مراقبت از پوست</a></li>
                                    <li><a href="category.html">مراقبت از چشم</a></li>
                                    <li><a href="category.html">مراقبت از مو</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>


                    <h3 class="subtitle">پرفروش ها</h3>
                    <div class="side-item">
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="product.html"><img src="image/product/apple_cinema_30-50x75.jpg"
                                                                           alt="تی شرت کتان مردانه"
                                                                           title="تی شرت کتان مردانه"
                                                                           class="img-responsive"></a></div>
                            <div class="caption">
                                <h4><a href="product.html">تی شرت کتان مردانه</a></h4>
                                <p class="price"><span class="price-new">110000 تومان</span> <span class="price-old">122000 تومان</span>
                                    <span class="saving">-10%</span></p>
                            </div>
                        </div>
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="product.html"><img src="image/product/iphone_1-50x75.jpg"
                                                                           alt="آیفون 7" title="آیفون 7"
                                                                           class="img-responsive"></a></div>
                            <div class="caption">
                                <h4><a href="product.html">آیفون 7</a></h4>
                                <p class="price"> 2200000 تومان </p>
                                <div class="rating"><span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                            class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                            class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                            class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                            class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span></div>
                            </div>
                        </div>
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="product.html"><img src="image/product/macbook_1-50x75.jpg"
                                                                           alt="آیدیا پد یوگا" title="آیدیا پد یوگا"
                                                                           class="img-responsive"></a></div>
                            <div class="caption">
                                <h4><a href="product.html">آیدیا پد یوگا</a></h4>
                                <p class="price"> 900000 تومان </p>
                                <div class="rating"><span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                            class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                            class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                            class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                            class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span></div>
                            </div>
                        </div>
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="product.html"><img src="image/product/sony_vaio_1-50x75.jpg"
                                                                           alt="کفش راحتی مردانه"
                                                                           title="کفش راحتی مردانه"
                                                                           class="img-responsive"></a></div>
                            <div class="caption">
                                <h4><a href="product.html">کفش راحتی مردانه</a></h4>
                                <p class="price"><span class="price-new">32000 تومان</span> <span class="price-old">12 میلیون تومان</span>
                                    <span class="saving">-25%</span></p>
                                <div class="rating"><span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                            class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                            class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                            class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                            class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span></div>
                            </div>
                        </div>
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="product.html"><img
                                        src="image/product/FinePix-Long-Zoom-Camera-50x75.jpg" alt="دوربین فاین پیکس"
                                        title="دوربین فاین پیکس" class="img-responsive"></a></div>
                            <div class="caption">
                                <h4><a href="product.html">دوربین فاین پیکس</a></h4>
                                <p class="price">122000 تومان</p>
                            </div>
                        </div>
                    </div>


                    <h3 class="subtitle">ویژه</h3>
                    <div class="side-item">
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="product.html"><img src="image/product/macbook_pro_1-50x75.jpg"
                                                                           alt=" کتاب آموزش باغبانی "
                                                                           title=" کتاب آموزش باغبانی "
                                                                           class="img-responsive"></a></div>
                            <div class="caption">
                                <h4><a href="product.html">کتاب آموزش باغبانی</a></h4>
                                <p class="price"><span class="price-new">98000 تومان</span> <span class="price-old">120000 تومان</span>
                                    <span class="saving">-26%</span></p>
                            </div>
                        </div>
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="product.html"><img src="image/product/samsung_tab_1-50x75.jpg"
                                                                           alt="تبلت ایسر" title="تبلت ایسر"
                                                                           class="img-responsive"></a></div>
                            <div class="caption">
                                <h4><a href="product.html">تبلت ایسر</a></h4>
                                <p class="price"><span class="price-new">98000 تومان</span> <span class="price-old">240000 تومان</span>
                                    <span class="saving">-5%</span></p>
                                <div class="rating"><span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                            class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                            class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                            class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                            class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                    <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span></div>
                            </div>
                        </div>
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="product.html"><img src="image/product/apple_cinema_30-50x75.jpg"
                                                                           alt="تی شرت کتان مردانه"
                                                                           title="تی شرت کتان مردانه"
                                                                           class="img-responsive"></a></div>
                            <div class="caption">
                                <h4>
                                    <a href="http://demo.harnishdesign.net/opencart/marketshop/v1/index.php?route=product/product&amp;product_id=42">تی
                                        شرت کتان مردانه</a></h4>
                                <p class="price"><span class="price-new">110000 تومان</span> <span class="price-old">122000 تومان</span>
                                    <span class="saving">-10%</span></p>
                            </div>
                        </div>
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="product.html"><img src="image/product/nikon_d300_1-50x75.jpg"
                                                                           alt="دوربین دیجیتال حرفه ای"
                                                                           title="دوربین دیجیتال حرفه ای"
                                                                           class="img-responsive"></a></div>
                            <div class="caption">
                                <h4><a href="product.html">دوربین دیجیتال حرفه ای</a></h4>
                                <p class="price"><span class="price-new">92000 تومان</span> <span class="price-old">98000 تومان</span>
                                    <span class="saving">-6%</span></p>
                            </div>
                        </div>
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="product.html"><img src="image/product/nikon_d300_5-50x75.jpg"
                                                                           alt="محصولات مراقبت از مو"
                                                                           title="محصولات مراقبت از مو"
                                                                           class="img-responsive"></a></div>
                            <div class="caption">
                                <h4><a href="product.html">محصولات مراقبت از مو</a></h4>
                                <p class="price"><span class="price-new">66000 تومان</span> <span class="price-old">90000 تومان</span>
                                    <span class="saving">-27%</span></p>
                                <div class="rating"><span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i
                                            class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                            class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                            class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                            class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i
                                            class="fa fa-star-o fa-stack-2x"></i></span></div>
                            </div>
                        </div>
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="product.html"><img src="image/product/macbook_air_1-50x75.jpg"
                                                                           alt="لپ تاپ ایلین ور" title="لپ تاپ ایلین ور"
                                                                           class="img-responsive"></a></div>
                            <div class="caption">
                                <h4><a href="product.html">لپ تاپ ایلین ور</a></h4>
                                <p class="price"><span class="price-new">10 میلیون تومان</span> <span class="price-old">12 میلیون تومان</span>
                                    <span class="saving">-5%</span></p>
                            </div>
                        </div>
                    </div>


                    <div class="banner owl-carousel owl-theme" style="opacity: 1; display: block;">
                        <div class="owl-wrapper-outer">
                            <div class="owl-wrapper"
                                 style="width: 632px; left: 0px; display: block; transition: all 0ms ease 0s; transform: translate3d(-158px, 0px, 0px); transform-origin: 237px center; perspective-origin: 237px center;">
                                <div class="owl-item" style="width: 158px;">
                                    <div class="item"><a href="#">
                                            <img src="image/banner/small-banner1-265x350.jpg" alt="small banner" class="img-responsive"></a>
                                    </div>
                                </div>
                                <div class="owl-item" style="width: 158px;">
                                    <div class="item"><a href="#">
                                            <img src="image/banner/small-banner-265x350.jpg" alt="small banner1" class="img-responsive"></a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </aside>
                <!--Left Part End -->
                <!--Middle Part Start-->
                <div id="content" class="col-sm-9">
                    <h1 class="title">{{ $childCategory->title_fa }}</h1>

                    <h3 class="subtitle">بهبود جستجو</h3>
                    <div class="category-list row">
                        <div class="col-sm-3">
                            <ul class="list-item">
                                <li><a href="category.html">صوتی و تصویری (3)</a></li>
                                <li><a href="category.html">لوازم خانگی (2)</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-3">
                            <ul class="list-item">
                                <li><a href="category.html">موبایل و تبلت (2)</a></li>
                                <li><a href="category.html">لپ تاپ (3)</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-3">
                            <ul class="list-item">
                                <li><a href="category.html">رومیزی (0)</a></li>
                                <li><a href="category.html">دوربین (0)</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="product-filter">
                        <div class="row">
                            <div class="col-md-4 col-sm-5">
                                <div class="btn-group">
                                    <button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip"
                                            title="" data-original-title="List"><i class="fa fa-th-list"></i></button>
                                    <button type="button" id="grid-view" class="btn btn-default selected"
                                            data-toggle="tooltip" title="" data-original-title="Grid"><i
                                            class="fa fa-th"></i></button>
                                </div>
                                <a href="compare.html" id="compare-total">محصولات مقایسه (0)</a></div>
                            <div class="col-sm-2 text-right">
                                <label class="control-label" for="input-sort">مرتب سازی :</label>
                            </div>
                            <div class="col-md-3 col-sm-2 text-right">
                                <select id="input-sort" class="form-control col-sm-3">
                                    <option value="" selected="selected">پیشفرض</option>
                                    <option value="">نام (الف - ی)</option>
                                    <option value="">نام (ی - الف)</option>
                                    <option value="">قیمت (کم به زیاد)</option>
                                    <option value="">قیمت (زیاد به کم)</option>
                                    <option value="">امتیاز (بیشترین)</option>
                                    <option value="">امتیاز (کمترین)</option>
                                    <option value="">مدل (A - Z)</option>
                                    <option value="">مدل (Z - A)</option>
                                </select>
                            </div>
                            <div class="col-sm-1 text-right">
                                <label class="control-label" for="input-limit">نمایش :</label>
                            </div>
                            <div class="col-sm-2 text-right">
                                <select id="input-limit" class="form-control">
                                    <option value="" selected="selected">20</option>
                                    <option value="">25</option>
                                    <option value="">50</option>
                                    <option value="">75</option>
                                    <option value="">100</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row products-category">



                        @forelse ($childCategory->getAllSubCategoryProducts() as $getProducts)  {{-- children --}}
                        <div class="product-layout product-grid col-lg-3 col-md-3 col-sm-4 col-xs-12">

                            <div class="product-thumb">

                                <div class="image"><a href="{{ route('client.productDetails.show' , $getProducts->slug) }}">  {{-- slug --}}
                                        <img src="{{ str_replace('public/image-products' , '/storage/image-products' , $getProducts->image) }}"
                                             alt="{{ $getProducts->name }}" title="{{ $getProducts->name }}" class="img-responsive"/></a>
                                </div>

                                <div class="caption">

                                    <h4><a href="{{ route('client.productDetails.show' , $getProducts->slug) }}">{{ $getProducts->name }}</a></h4>  {{-- slug --}}

                                    <p class="price">
                                        <span class="price-new">{{ number_format($getProducts->price_with_discount) }} تومان </span>

                                        @if ($getProducts->has_discount)   {{-- اگر تخفیفی داشت این قسمت نمایش بده --}}
                                        <span class="price-old">{{ number_format($getProducts->price) }} تومان </span>
                                        <span class="saving">{{ $getProducts->discount_value . '%' }}</span>
                                        @endif

                                    </p>

                                    <div class="rating"><span class="fa fa-stack"><i
                                                class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span
                                            class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span
                                            class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span></div>
                                </div>

                                <div class="button-group">

                                    <button class="btn-primary" type="button" onClick="addToCart({{ $getProducts->id }})"><span>افزودن به سبد</span></button>

                                    <div class="add-to-links">

                                        @auth
                                            <button id="like-{{ $getProducts->id }}" type="button" data-toggle="tooltip" title="افزودن به علاقه مندی"
                                                    onClick=likeProduct({{ $getProducts->id }})> <i class="fa fa-heart @if($getProducts->is_liked) like @endif"></i></button>
                                        @endauth

                                        <button type="button" data-toggle="tooltip" title="افزودن به مقایسه" onClick=""><i class="fa fa-exchange"></i></button>
                                    </div>
                                </div>
                            </div>

                        </div>

                        @empty

                            <h3 class="alert alert-danger text-center">محصولی درون این دسته بندی موجود نمی باشد</h3>
                        @endforelse

                    </div>




                    <div class="row">

                        {{ $childCategory->getAllSubCategoryProducts()->links() }}

                        {{--
                        <div class="col-sm-6 text-left">
                            <ul class="pagination">
                                <li class="active"><span>1</span></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">&gt;</a></li>
                                <li><a href="#">&gt;|</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6 text-right">نمایش 1 تا 12 از 15 (مجموع 2 صفحه)</div>
                        --}}
                    </div>

                </div>
                <!--Middle Part End -->
            </div>
        </div>
    </div>

@endsection
