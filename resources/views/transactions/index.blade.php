@extends('layout.template')
@section('title','Transactions')

@section('content')
    @livewire('DetailTransactions')
    @livewire('TransactionsComponent')
@endsection