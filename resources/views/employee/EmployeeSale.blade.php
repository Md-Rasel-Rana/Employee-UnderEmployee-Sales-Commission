@extends('EmployeeDashboard.sidenav-layout')
@section('content')
@include('customer.customer-create')
@include('customer.customer-list')
@include('customer.customer-update')
@include('customer.customer-delete')
@endsection