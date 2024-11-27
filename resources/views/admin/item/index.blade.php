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
                    <div class=" p-4">
                        <button type="button" class="btn btn-primary"><a href="{{ route('web/admin.items.create') }}">Add
                                Item</a></button>
                    </div>
                    <div class="card-body p-4">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Created By</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>

                            <tbody class="table-group-divider">
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ \Illuminate\Support\Str::words($item->description, 5, '...') }}</td>

                                        <td>

                                            @if ($item->status === 'pending')
                                                <h6 class="badge bg-primary">{{ ucfirst($item->status) }}</h6>
                                            @elseif ($item->status === 'approved')
                                                <h6 class="badge bg-success">{{ ucfirst($item->status) }}</h6>
                                            @else
                                                <h6 class="badge bg-danger">{{ ucfirst($item->status) }}</h6>
                                            @endif
                                        </td>
                                        <td>{{ $item->user->name }}</td>

                                        <td>
                                            <a href="{{ route('web/admin.items.edit', $item->id) }}" title="View category">
                                                <img src="{{ asset('assets/img/icons/edit-2.svg') }}" alt="edit"></a>

                                            <form method="POST" action="{{ route('web/admin.items.destroy', $item->id) }}"
                                                accept-charset="UTF-8" style="display:inline"
                                                onsubmit="return confirm('Confirm delete?')">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm" title="Delete Student">
                                                    <img src="{{ asset('assets/img/icons/trash-2.svg') }}" alt="trash">
                                                </button>
                                            </form>
                                            <div>
                                                <form action="{{ route('web/admin.item.status', $item->id) }}"
                                                    method="POST" style="display:inline-block;">
                                                    @csrf
                                                    <button type="submit" name="action" value="approve"
                                                        class="border border-0 badge bg-success">Approve</button>
                                                    <button type="submit" name="action" value="reject"
                                                        class="border border-0 badge bg-danger">Reject</button>
                                                </form>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- End Website Traffic -->
            </div><!-- End Right side columns -->

        </div>
    </section>
@endsection
{{--  --}}
@push('style')
    <style>
        .user-image {
            max-width: 100px;
            max-width: 100px;
        }

        button[type="button"] a {
            text-decoration: none;
            color: white
        }
    </style>
@endpush
@push('script')
    <script>
        // document.addEventListener('DOMContentLoaded', function() {
        //   if (window.Echo) {
        //     window.Echo.channel('newitem')
        //     .listen('ItemCreated', (event) => {
        //         // document.getElementById("item").innerHTML = event.item;
        //         console.log('New item created:', event.item);
        //     });
        //   } else {
        //     console.error('Echo is not defined');
        //   }
        // });
        // document.addEventListener('DOMContentLoaded', function() {
        //     if (window.Echo) {
        //         window.Echo.private('admin.notifications')
        //             .listen('ItemCreated', (event) => {
        //                 console.log('Event data received:', event);
        //                 alert(`New item created: ${event.item.title}`);
        //             })
        //             .error((error) => {
        //                 console.error('Error subscribing to channel: ', error);
        //             });
        //     } else {
        //         console.error('Echo is not defined');
        //     }
        // });
    </script>
@endpush
