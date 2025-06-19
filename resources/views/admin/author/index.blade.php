@extends('layouts.website.main')

@push('styles')
@endpush

@section('content')
    <a href="{{ route('author.create') }}"
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
        Add Author
    </a>

    <table id="myTable" class="table-auto w-full text-left border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-2 border">Name</th>
                <th class="p-2 border">Email</th>
                <th class="p-2 border">Role</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="p-2 border">Alice</td>
                <td class="p-2 border">alice@example.com</td>
                <td class="p-2 border">Admin</td>
            </tr>
            <tr>
                <td class="p-2 border">Bob</td>
                <td class="p-2 border">bob@example.com</td>
                <td class="p-2 border">User</td>
            </tr>
        </tbody>
    </table>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                layout: {
                    topStart: 'search',
                    topEnd: 'pageLength',
                    bottomStart: 'info',
                    bottomEnd: 'paging'
                }
            });
        });
    </script>
@endpush
