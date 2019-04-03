@extends('admin_template')

@section('content')
<table id="transactions" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Transaction ID</th>
            <th>Customer ID</th>
            <th>Amount</th>
            <th>Date</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Transaction ID</th>
            <th>Customer ID</th>
            <th>Amount</th>
            <th>Date</th>
        </tr>
    </tfoot>
</table>

@endsection