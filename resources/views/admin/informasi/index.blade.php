@extends('admin.layouts.master')

@section('title','Informasi')

@section('content')
    <h1 class="px-4 text-white">Data Informasi</h1>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-8">
                <div class="card mb-4">

                    <div class="card-header pb-0">
                        <div class="d-flex align-items-center">
                            <p class="mb-0">Information Table </p>
                            <a class="btn btn-primary btn-sm ms-auto" href="{{ route('admin.informasi.create') }}">Create</a>
                        </div>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Title</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Description</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Image</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($informations as $information)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">

                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{$information->title}}</h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0">{{ $information->description }}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                @if ($information->image)
                                                <img src="{{ asset('storage/images/information/'.$information->image) }}" class="avatar avatar-sm" alt=""
                                                    width="100px" class="img-thumbnail">
                                                    @else
                                                    <span class="badge badge-danger">No Image</span>
                                               @endif
                                            </td>

                                            <td class="align-middle text-center text-sm">
                                                <a href="{{ route('admin.informasi.edit', $information->id) }}" class="text-secondary font-weight-bold text-xs px-2"
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    Edit
                                                </a>


                                                <a href="{{ route('admin.informasi.delete', $information->id) }}" class="text-danger font-weight-bold text-xs px-2 "
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    Hapus
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
