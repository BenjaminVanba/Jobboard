@extends('layout')

@section('content')


           <!-- slider Area Start-->
           <div class="slider-area ">
            <!-- Mobile Menu -->
            <div class="slider-active">
                <div class="single-slider slider-height d-flex align-items-center" data-background="">
                    <div class="container">
                        <div class="row" style="margin-bottom:20px;">
                            <div class="col-xl-6 col-lg-9 col-md-10 ">
                                <div >
                                    <h1 class="font-mono text-[#0f0595] text-6xl" >Découvrez les opportunités les plus passionnantes dans le monde</h1>
                                </div>
                            </div>
                            
                    
                        </div>


                      
    <div class="container-custom">
        
        <!-- form -->
        <form action="{{ route('job.search') }}" method="GET" class="custom-search-box">
            <div class="custom-input-container">
                <input type="text" name="keyword" placeholder="Job Title or keyword" class="tailored-input" required>
            </div>
            <div class="custom-button-container">
                <button type="submit" class="tailored-btn">Trouver un emploi</button>
            </div>    
        </form>
    </div>


<style>
    .search-section {
        padding: 40px;
        background-color: #f0f4f8;
        display: flex;
        justify-content: center;
    }

    .container-custom {
        width: 100%;
        max-width: 900px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        padding: 30px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .custom-search-box {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
    }

    .custom-input-container {
        flex: 1;
        margin-right: 20px;
    }

    .tailored-input {
        width: 100%;
        padding: 14px;
        font-size: 18px;
        border: 1px solid #ced4da;
        border-radius: 6px;
        background-color: #ffffff;
        transition: all 0.3s ease;
    }

    .tailored-input:focus {
        border-color: #fb246a;
        background-color: #ffffff;
        outline: none;
    }

    .custom-button-container {
        flex-shrink: 0;
    }

    .tailored-btn {
        background-color: #fb246a;
        color: white;
        padding: 14px 30px;
        font-size: 18px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .tailored-btn:hover {
        background-color: #0056b3;
        transform: translateY(-
        
    }


  
        
</style>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


@endsection
