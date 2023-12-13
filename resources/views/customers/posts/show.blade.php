@extends('customers.layouts.app')
@section('title', 'Post Details')
@section('content')
<div class="container-fluid" style="padding: 150px 0; background-color: #EDF1F5">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="section-header">
                    <h2>Chi tiết bài viết</h2>
                    <p>
                        <span>{{ $post->TieuDe }}</span>
                    </p>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-6">
                        <div class="white-box text-center"><img src="{{ asset('assets/img/tintuc/' . $post->Hinh) }}" class="w-100 img-responsive rounded"></div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-6">
                        <h4 class="box-title mt-5">Nội dung chính</h4>
                        <p>{!! $post->NoiDung !!}</p>
                            <h4 class="mt-5">
                                Số lượt xem: {{ number_format($post->SoLuotXem) }}
                            </h4>
                        <button class="btn btn-dark btn-rounded mr-1" data-toggle="tooltip" title="" data-original-title="Add to cart">
                            <i class="bi bi-cart"></i>
                        </button>
                        <button class="btn btn-primary btn-rounded">Buy Now</button>
                    </div>
                </div>

            </div>
            <section id="gallery" class="gallery section-bg">
                <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Bài viết tương tự</h2>
                    <p>Check <span>Our Gallery</span></p>
                </div>

                <div class="gallery-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                        @foreach ( $samePosts as $samePost)
                            <div class="swiper-slide">
                                <a class="glightbox" data-gallery="images-gallery" href="{{ asset('assets/img/tintuc/' . $samePost->Hinh) }}">
                                    <img src="{{ asset('assets/img/tintuc/' . $samePost->Hinh) }}" class="img-fluid" />
                                    <div>{{ $samePost->TieuDe }}</div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

                </div>
            </section>
        </div>
    </div>
</div>
@endsection
