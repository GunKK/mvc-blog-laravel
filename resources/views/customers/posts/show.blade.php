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

        {{-- comment --}}
        <div class="row" id="post-comment">
            <div class="div col">
                <div class="container card mt-5 mb-5">
                    <div class="row">
                        <div class="ps-3 pe-3 pt-2">
                            @if (count($comments) === 0)
                                <h3 class="border-bottom border-secondary pb-3">Hãy là người đầu tiên đánh giá bài viết này</h3>
                            @else
                                <h3 class="border-bottom border-secondary pb-3">Viết bình luận cho bài viết</h3>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <!-- Review -->
                        @if (count($comments) !== 0 )
                            @foreach ( $comments as $comment )
                                <div class="ps-3 pe-3 pt-2">
                                    <div class="media-body border-bottom border-secondary">
                                        <span class="h5">{{ $comment->user->name }}</span>
                                        <p class="mt-3 ms-2">
                                            <span class="text-success">Nội dung</span>: {{ $comment->NoiDung }}
                                        </p>
                                        <p>
                                            <i class="fa-solid fa-clock"></i>
                                            <small> {{ $comment->created_at }} </small>
                                            @if (Auth::check() && Auth::user()->id === $comment->idUser)

                                                <div class="d-flex">
                                                    <button type="button"
                                                        class="ms-2 btn btn-light"
                                                        data-bs-toggle="modal" data-bs-target="#update-post-form-{{ $comment->id }}" >
                                                        <i class="fa-sharp fa-solid fa-circle-star"></i>
                                                        <i class="fa-solid fa-pen"></i>
                                                    </button>
                                                    <form action="{{ route('comment.destroy', $comment->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="postId" value="{{ $post->id }}">
                                                        <button class="ms-1 btn btn-light" type="submit"><i class="fa-solid fa-trash"></i></button>
                                                    </form>
                                                </div>

                                                {{-- comment update modal --}}
                                                <div class="modal fade" id="update-post-form-{{ $comment->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <form action="{{ route('comment.update', ['id' => $comment->id]) }}" method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Đánh giá bài viết</h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <label for="titleReview" class="form-label">Form chỉnh sửa bài viết</label>
                                                                        <input type="hidden" name="commentId" value="{{ $comment->id}}">
                                                                        <input type="hidden" name="postId" value="{{ $post->id }}">
                                                                    </div>
                                                                    <div class="form-floating">
                                                                        <textarea
                                                                            class="form-control"
                                                                            placeholder="Leave a comment here"
                                                                            name="content"
                                                                            id="content"
                                                                            style="height: 100px"
                                                                        >{{ $comment->NoiDung}}</textarea>
                                                                        <label for="content">Đánh giá</label>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                                                    <button type="submit" name="review" class="btn btn-success">Gửi</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        <div class="ps-3 pe-3 pt-3 pb-3">
                            <button type="button"
                                @if (Auth::check())
                                    class="btn btn-primary"
                                @else
                                    class="btn btn-primary disabled"
                                @endif
                                data-bs-toggle="modal" data-bs-target="#create-post-form"
                            >
                                <i class="fa-sharp fa-solid fa-circle-star"></i>
                                Viết đánh giá
                            </button>

                            <div class="mt-1">
                                <i>
                                    <small>
                                        (<i class="fa-regular fa-asterisk"></i>) Vui lòng đăng nhập để đánh giá bài viết
                                    </small>
                                </i>
                            </div>
                        </div>
                    </div>
                    {{-- modal create comment --}}
                    <div class="modal fade" id="create-post-form" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('comment.store') }}" method="post">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Đánh giá bài viết</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-floating">
                                            <textarea
                                                class="form-control"
                                                placeholder="Leave a comment here"
                                                name="content"
                                                id="content"
                                                style="height: 100px"
                                            ></textarea>
                                            <label for="content">Nội dung</label>
                                        </div>

                                        <input type="hidden" name="postId" value="{{ $post->id }}">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                        <button type="submit" class="btn btn-success">Gửi</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
