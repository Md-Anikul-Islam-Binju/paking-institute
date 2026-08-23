@extends('frontend.layout')
@section('content')
    <section class="py-5 mt-5">
        <div class="container">
            <div class="mb-5">
                <h1 class="display-1">
                    Financial Statements
                </h1>
            </div>
            <div class="mb-4 fw-bold">
                <p>{!! $financialStatements->details !!}</p>
            </div>
        </div>
    </section>
@endsection

