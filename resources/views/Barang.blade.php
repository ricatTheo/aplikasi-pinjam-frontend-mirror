@extends('Template')

@section('content')
<link rel="stylesheet" href="/css/barang.css">
<div class="table-container">
    <table class="styled-table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Lokasi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barangs as $br)
                <tr class="table-row">
                    <td>{{ $br->nama }}</td>
                    <td>{{ $br->lokasi }}</td>
                    <td>
                        <div class="book">
                            <button class="book-btn">Book</button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>        
    </table>

    {{-- Fake Pagination Manual --}}
    <div class="pagination">
        <a href="#">&laquo;</a>
        <a href="#" class="active">1</a>
        <a href="#">2</a>
        <a href="#">&raquo;</a>
    </div>
</div>
@endsection
