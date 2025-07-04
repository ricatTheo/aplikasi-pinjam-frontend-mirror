@extends('Template')

@section('content')
<link rel="stylesheet" href="/css/barang.css">
<div class="table-container">
    <table class="styled-table">
        <thead>
            <tr>
                <th><input type="checkbox" /></th>
                <th>Header A</th>
                <th>Header B</th>
                <th>Header C</th>
                <th>Header D</th>
            </tr>
        </thead>
        <tbody>
            {{-- Data fake --}}
            <tr class="table-row">
                <td><input type="checkbox" /></td>
                <td>Cell A1</td>
                <td>Cell B1</td>
                <td>Cell C1</td>
                <td>1</td>
            </tr>
            <tr class="table-row">
                <td><input type="checkbox" /></td>
                <td>Cell A2</td>
                <td>Cell B2</td>
                <td>Cell C2</td>
                <td>2</td>
            </tr>
            <tr class="table-row">
                <td><input type="checkbox" /></td>
                <td>Cell A3</td>
                <td>Cell B3</td>
                <td>Cell C3</td>
                <td>3</td>
            </tr>
            <tr class="table-row">
                <td><input type="checkbox" /></td>
                <td>Cell A4</td>
                <td>Cell B4</td>
                <td>Cell C4</td>
                <td>4</td>
            </tr>
            <tr class="table-row">
                <td><input type="checkbox" /></td>
                <td>Cell A5</td>
                <td>Cell B5</td>
                <td>Cell C5</td>
                <td>5</td>
            </tr>
            <tr class="table-row">
                <td><input type="checkbox" /></td>
                <td>Cell A6</td>
                <td>Cell B6</td>
                <td>Cell C6</td>
                <td>6</td>
            </tr>
            <tr class="table-row">
                <td><input type="checkbox" /></td>
                <td>Cell A7</td>
                <td>Cell B7</td>
                <td>Cell C7</td>
                <td>7</td>
            </tr>
            <tr class="table-row">
                <td><input type="checkbox" /></td>
                <td>Cell A8</td>
                <td>Cell B8</td>
                <td>Cell C8</td>
                <td>8</td>
            </tr>
            <tr class="table-row">
                <td><input type="checkbox" /></td>
                <td>Cell A9</td>
                <td>Cell B9</td>
                <td>Cell C9</td>
                <td>9</td>
            </tr>
            <tr class="table-row">
                <td><input type="checkbox" /></td>
                <td>Cell A10</td>
                <td>Cell B10</td>
                <td>Cell C10</td>
                <td>10</td>
            </tr>
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
