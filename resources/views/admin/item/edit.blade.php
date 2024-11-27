@extends('admin.layout.app');

@section('content')
    <div class="pagetitle">
        <h1>Admin Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item">Items</li>
                <li class="breadcrumb-item active">{{ $pageTitle }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <!-- Right side columns -->
            <div class="col-lg-12">

                <!-- Website Traffic -->
                <div class="card">

                    <div class="card-body p-4">
                        <form action="{{route('web/admin.items.update', $item->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                           @method('PUT')
                            <div class="row">

                                <div class="col-12 col-md-8 col-lg-8 mb-4">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" name="title"
                                        class="form-control @error('title') is-invalid @enderror" id="title" value="{{$item->title}}">
                                    @error('title')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-8 col-lg-8 mb-4">
                                    <label for="description" class="form-label">Description</label>

                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                        cols="30" rows="5">{{$item->description}}</textarea>

                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                </div><!-- End Website Traffic -->



            </div><!-- End Right side columns -->

        </div>
    </section>
@endsection

{{--  --}}
