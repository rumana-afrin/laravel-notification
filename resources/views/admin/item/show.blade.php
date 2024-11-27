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

                        <div class="row">

                            <div class="col-12 col-md-8 col-lg-8 mb-4">
                                <h4>Title: {{ $item->title }}</h4>
                            </div>
                            <div class="col-12 col-md-8 col-lg-8 mb-4">
                                <p>Description: {{ $item->description }}</p>
                            </div>
                        </div>

                        <div>
                            <form action="{{ route('web/admin.item.status', $item->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf

                                @if ($item->status === 'pending')
                                    <button type="submit" name="action" value="approve"
                                        class="border border-0 btn bg-success text-light">Approve</button>
                                    <button type="submit" name="action" value="reject"
                                        class="border border-0 btn bg-danger text-light">Reject</button>
                                @elseif ($item->status === 'approved')
                                    <button type="button" class="border border-0 btn bg-success text-light" disabled>Approved</button>
                                @endif

                            </form>

                        </div>

                    </div>

                </div><!-- End Website Traffic -->



            </div><!-- End Right side columns -->

        </div>
    </section>
@endsection

{{--  --}}
