@extends('frontend.layout.app')
@section('content')
    <div class="container mt-3">

        <h3>Top Category</h3>
        <div class="owl-carousel owl-theme mt-4">
            <div class="item">
                <div class="card h-50">
                    <img src="{{ asset('assets/image.jpg') }}" class="card-img-top" alt="..." width="100%" height="100">
                    <div class="card-body card_footer text-center">
                        <h6 class="card-title">Bread Fruit Cheese Sandwich</h6>
                        <p class="card-text dish-price">$80</p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card h-50">
                    <img src="{{ asset('assets/image.jpg') }}" class="card-img-top" alt="..." width="100%"
                        height="100">
                    <div class="card-body card_footer text-center">
                        <h6 class="card-title">Bread Fruit Cheese Sandwich</h6>
                        <p class="card-text dish-price">$80</p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card h-50">
                    <img src="{{ asset('assets/image.jpg') }}" class="card-img-top" alt="..." width="100%"
                        height="100">
                    <div class="card-body card_footer text-center">
                        <h6 class="card-title">Bread Fruit Cheese Sandwich</h6>
                        <p class="card-text dish-price">$80</p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card h-50">
                    <img src="{{ asset('assets/image.jpg') }}" class="card-img-top" alt="..."width="100%"
                        height="100">
                    <div class="card-body card_footer text-center">
                        <h6 class="card-title">Bread Fruit Cheese Sandwich</h6>
                        <p class="card-text dish-price">$80</p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card h-50">
                    <img src="{{ asset('assets/image.jpg') }}" class="card-img-top" alt="..." width="100%"
                        height="100">
                    <div class="card-body card_footer text-center">
                        <h6 class="card-title">Bread Fruit Cheese Sandwich</h6>
                        <p class="card-text dish-price">$80</p>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="card h-50">
                    <img src="{{ asset('assets/image.jpg') }}" class="card-img-top" alt="..." width="100%"
                        height="100">
                    <div class="card-body card_footer text-center">
                        <h6 class="card-title">Bread Fruit Cheese Sandwich</h6>
                        <p class="card-text dish-price">$80</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- ----------------start main section----------------------- --}}
        <main>

            <section class="post-section">
                <div class="current">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">All Posts</li>
                        </ol>
                    </nav>
                </div>
                <div class="content">
                    <div class="herodiv">
                        <div class="posts">
                            <div class="post-details">
                                <h5>category</h5>
                            </div>
                            <div class="post-content me-5 mt-3">
                                <div class="me-4">
                                    <h2>Lorem ipsum dolor sit amet consectetur.</h2>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique ad distinctio,
                                        quasi
                                        dolore at doloribus. Accusamus!</p>
                                    <p>date: 5 decm 2024</p>
                                </div>
                                <img src="{{ asset('assets/image.jpg') }}" alt="" width="250" height="100">
                            </div>
                        </div>
                        <div class="posts">
                            <div class="post-details">
                                <h5>category</h5>
                            </div>
                            <div class="post-content me-5 mt-3">
                                <div class="me-4">
                                    <h2>Lorem ipsum dolor sit amet consectetur.</h2>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique ad distinctio,
                                        quasi
                                        dolore at doloribus. Accusamus!</p>
                                    <p>date: 5 decm 2024</p>
                                </div>
                                <img src="{{ asset('assets/image.jpg') }}" alt="" width="250" height="100">
                            </div>
                        </div>
                        <div class="posts">
                            <div class="post-details">
                                <h5>category</h5>
                            </div>
                            <div class="post-content me-5 mt-3">
                                <div class="me-4">
                                    <h2>Lorem ipsum dolor sit amet consectetur.</h2>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique ad distinctio,
                                        quasi
                                        dolore at doloribus. Accusamus!</p>
                                    <p>date: 5 decm 2024</p>
                                </div>
                                <img src="{{ asset('assets/image.jpg') }}" alt="" width="250" height="100">
                            </div>
                        </div>
                    </div>

                    <div class="Editors-Pick">
                        <h3>Editor's Picks</h3>
                        <div class="Pick">
                            <p><span class="pe-2"><img class="rounded-circle" src="{{ asset('assets/img/test.jpg') }}"
                                        alt="" width="30" height="30"></span>Auther</p>
                            <h5>Lorem ipsum dolor sit amet.</h5>
                            <p>Date</p>
                        </div>
                        <div class="Pick">
                            <p><span class="pe-2"><img class="rounded-circle" src="{{ asset('assets/img/test.jpg') }}"
                                        alt="" width="30" height="30"></span>Auther</p>
                            <h5>Lorem ipsum dolor sit amet.</h5>
                            <p>Date</p>
                        </div>
                        <div class="Pick">
                            <p><span class="pe-2"><img class="rounded-circle" src="{{ asset('assets/img/test.jpg') }}"
                                        alt="" width="30" height="30"></span>Auther</p>
                            <h5>Lorem ipsum dolor sit amet.</h5>
                            <p>Date</p>
                        </div>
                        <div class="Pick">
                            <p><span class="pe-2"><img class="rounded-circle" src="{{ asset('assets/img/test.jpg') }}"
                                        alt="" width="30" height="30"></span>Auther</p>
                            <h5>Lorem ipsum dolor sit amet.</h5>
                            <p>Date</p>
                        </div>
                    </div>
                </div>
            </section>

            {{-- start recent sention --}}
            <section>
                <div class="row" style="margin-top: 70px">
                    <div class="col-9">
                        <h3>Recent News</h3>
                        <div class="row mt-4 mb-5">
                            <div class="col-6">
                                <img src="{{ asset('assets/img/test.jpg') }}" alt="" class="img-fluid">
                                <div class="mt-3">
                                    <h5>Lorem ipsum dolor sit.</h5>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Excepturi, atque. Lorem
                                        ipsum dolor sit amet consectetur adipisicing elit. Rem, velit.</p>
                                    <h6>Date: dec 7/2024</h6>
                                </div>
                            </div>
                            <div class="col-6">
                                <img src="{{ asset('assets/img/test.jpg') }}" alt="" class="img-fluid">
                                <div class="mt-3">
                                    <h5>Lorem ipsum dolor sit.</h5>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Excepturi, atque. Lorem
                                        ipsum dolor sit amet consectetur adipisicing elit. Rem, velit.</p>
                                    <h6>Date: dec 7/2024</h6>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4 mb-5">
                            <div class="col-6">
                                <img src="{{ asset('assets/img/test.jpg') }}" alt="" class="img-fluid">
                                <div class="mt-3">
                                    <h5>Lorem ipsum dolor sit.</h5>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Excepturi, atque. Lorem
                                        ipsum dolor sit amet consectetur adipisicing elit. Rem, velit.</p>
                                    <h6>Date: dec 7/2024</h6>
                                </div>
                            </div>
                            <div class="col-6">
                                <img src="{{ asset('assets/img/test.jpg') }}" alt="" class="img-fluid">
                                <div class="mt-3">
                                    <h5>Lorem ipsum dolor sit.</h5>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Excepturi, atque. Lorem
                                        ipsum dolor sit amet consectetur adipisicing elit. Rem, velit.</p>
                                    <h6>Date: dec 7/2024</h6>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4 mb-5">
                            <div class="col-6">
                                <img src="{{ asset('assets/img/test.jpg') }}" alt="" class="img-fluid">
                                <div class="mt-3">
                                    <h5>Lorem ipsum dolor sit.</h5>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Excepturi, atque. Lorem
                                        ipsum dolor sit amet consectetur adipisicing elit. Rem, velit.</p>
                                    <h6>Date: dec 7/2024</h6>
                                </div>
                            </div>
                            <div class="col-6">
                                <img src="{{ asset('assets/img/test.jpg') }}" alt="" class="img-fluid">
                                <div class="mt-3">
                                    <h5>Lorem ipsum dolor sit.</h5>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Excepturi, atque. Lorem
                                        ipsum dolor sit amet consectetur adipisicing elit. Rem, velit.</p>
                                    <h6>Date: dec 7/2024</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="row">
                            <h3 class="ms-4">Trending</h3>
                            <div class="col ms-4 mt-4">
                                <p><span class="pe-2"><img class="rounded-circle"
                                            src="{{ asset('assets/img/test.jpg') }}" alt="" width="30"
                                            height="30"></span>Auther</p>
                                <h5>Lorem ipsum dolor sit amet.</h5>
                                <p>Date</p>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

        </main>
    </div>

    <section class="mt-5">
        <div class="row bg-dark py-4">
            <div class="col-8 d-flex justify-content-center">
                <div class="ps-5">
                    <img class="border-bottom" src="{{ asset('assets/PostWave_Large-removebg-preview.png') }}" alt="" width="250" height="100">
                </div>
            </div>
            <div class="col-4">
                <h6 class="text-light">Subscribe to Our Newsletter</h6>
                <form class="w-75" action="/subscribe" method="POST">
                    <input type="text" class="form-control mr-sm-2" placeholder="Enter Email" aria-label="Search">
                    <button class="search-box btn btn-outline-success my-2 mt-2" type="submit"><i class="bi bi-send-fill"></i></button>
                </form>
            </div>
        </div>
        <div class="text-center p-4">
            <h6>Copyright ©2024 All rights reserved | This template is made with <i class="bi bi-balloon-heart-fill text-danger"></i> by Rumana Afrin Ruma</h6>
        </div>
    </section>

@endsection

@push('style')
@endpush
