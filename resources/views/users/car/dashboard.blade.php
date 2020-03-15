@extends('users.layouts.car-master')



@section('content')

     <!--== SlideshowBg Area Start ==-->
    <section id="slideslow-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="slideshowcontent">
                        <div class="display-table">
                            <div class="display-table-cell">
                                <a href="{{ route('car.view.regular') }}"><h1 class="text-info animated infinite bounce delay-2s">BOOK A CAR!</h1></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== SlideshowBg Area End ==-->
@endsection