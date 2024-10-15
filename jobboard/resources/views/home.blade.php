@extends('layout')

@section('content')
<!-- Search Box -->
<div class="row">
    <div class="col-xl-8">
        <!-- form -->
        <form action="{{ route('job.search') }}" method="GET" class="search-box">
            <div class="input-form">
                <input type="text" name="keyword" placeholder="Job Title or keyword" required>
            </div>
            <div class="select-form">
                <div class="select-itms">
                    <select name="location" id="select1">
                        <option value="">Location</option>
                        <option value="BD">Location BD</option>
                        <option value="PK">Location PK</option>
                        <option value="US">Location US</option>
                        <option value="UK">Location UK</option>
                    </select>
                </div>
            </div>
            <div class="search-form">
                <button type="submit" class="btn btn-primary">Find Job</button>
            </div>    
        </form>
    </div>
</div>

@endsection
