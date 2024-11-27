@extends('user.layout.app');

@section('content')
<div class="pagetitle">


    <h1>User Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item">Items</li>
            <li class="breadcrumb-item active">{{$pageTitle}}</li>
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
                        <button type="button" class="btn btn-primary"><a href="{{route('items.create')}}">Add
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
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                           
                            <tbody class="table-group-divider">
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->title}}</td>
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
                                        <td>
                                            <a href="{{route('items.edit', $item->id)}}" title="View category"> <img src="{{ asset('assets/img/icons/edit-2.svg') }}" alt="edit"></a>

                                            <form method="POST" action="{{route('items.destroy', $item->id)}}" accept-charset="UTF-8" style="display:inline" onsubmit="return confirm('Confirm delete?')">
                                                @csrf
                                                @method('delete')
                                                 <button type="submit" class="btn btn-sm" title="Delete Student" >
                                                    <img src="{{ asset('assets/img/icons/trash-2.svg') }}" alt="trash">
                                                 </button>
     
                                             </form> 
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
@vite(['resources/js/app.js', 'resources/css/app.css'])

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
    document.addEventListener('DOMContentLoaded', function() {
      if (window.Echo) {
        window.Echo.channel('newitem')
        .listen('ItemCreated', (event) => {
            document.getElementById("item").innerHTML = event.item;
            console.log('New item created:', event.item);
        });
      } else {
        console.error('Echo is not defined');
      }


    });
    

  </script>
@endpush
