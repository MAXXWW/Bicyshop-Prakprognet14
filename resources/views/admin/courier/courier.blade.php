@extends('admin.layout-dashboard')

@section('title', 'BicyShop | List Courier')

@section('body')
<div class="card">
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col-8">
                <h2 class="mb-0">LIST COURIER</h2>
            </div>
            <div class="col-4 text-end">
                <a type="button" href="{{ route('courier-add') }}" class="btn btn-sm btn-primary text-white">Add</a>
                <a type="button" href="{{ route('courier-trash') }}" class="btn btn-sm btn-info text-white">Trash</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
    <div class="p-3 pt-0">
        <div class="alert alert-success" role="alert">
            <strong>{{ $message }}</strong>
        </div>
    </div>
    @endif
    <div class="table-responsive">
        <table class="table table-striped align-items-center mb-0 mx-2 my-2">
            <thead>
                <tr class="text-center">
                    <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                    <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Courier</th>
                    <th class="text-center text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($couriers as $courier)
                <tr class="text-center">
                    <td>
                        <div>
                            <div class="my-auto">
                                <h6 class="mb-0 text-xs">{{ $loop->index+1+($couriers->currentPage()-1)*5 }}</h6>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="text-xs font-weight-bold mb-0">{{ $courier->courier }}</span>
                    </td>
                    <td class="align-middle">
                        <form action="{{ route('courier-delete', $courier->id)  }}" method="POST">
                            @csrf
                            <a type="button" class="btn btn-primary" href="{{ route('courier-edit', $courier->id) }}">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
                                <i class="bi bi-backspace"></i>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-2 mb-3 ms-3">
            {{ $couriers->links() }}
        </div>
    </div>
</div>
@endsection