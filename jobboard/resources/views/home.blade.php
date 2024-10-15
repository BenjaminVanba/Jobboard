@extends('layout')

@section('content')


          <!-- slider Area Start-->
          <div class="slider-area ">
            <!-- Mobile Menu -->
            <div class="slider-active">
                <div class="single-slider slider-height d-flex align-items-center" data-background="">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-6 col-lg-9 col-md-10">
                                <div class="hero__caption">
                                    <h1>Find the most exciting startup jobs</h1>
                                </div>
                            </div>
<!-- Search Box -->
<div class="row">
    <div class="col-xl-8">
        <!-- form -->
        <form action="{{ route('job.search') }}" method="GET" class="search-box">
            <div class="input-form">
                <input type="text" name="keyword" placeholder="Job Title or keyword" required>
            </div>
          
            <div class="search-form">
                <button type="submit" class="btn btn-primary">Find Job</button>
            </div>    
        </form>
    </div>
</div>


@endsection
