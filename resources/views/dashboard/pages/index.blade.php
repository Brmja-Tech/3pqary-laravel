@extends('dashboard.layout.layout')

@section('title','Home')

@section('content')
<!--start main wrapper-->

<style>
    .page-breadcrumb {
        display: flex;
        justify-content: center;
        width: 100%;
    }

    .breadcrumb-title {
        text-align: center;
        font-size: 1.5rem;
        /* Adjust as needed */
    }
</style>

<main class="main-wrapper">
    <div class="main-content">
        <!--breadcrumb-->
        <div class="breadcrumb-title pe-3 text-center"> لوحة تحكم منصة العبقري الصغير</div>
    </div>
</main>

@endsection