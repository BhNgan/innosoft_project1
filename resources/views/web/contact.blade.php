@extends('layouts.web')
@section('content')

<div class="contact">
    <div class="container">
        <div class="bg-center bg-cover" style="background-image: url( {{ asset('img/contact.png') }} )">
            <div class="bg-overlay text-center header">
                <h2 class="centered text-uppercase text-white font-weight-bold">liên hệ</h2>
            </div>
        </div>
    </div>
    <div class="container my-3 my-md-4" id="contact">
        <div class="row">
            <div class="col-md-7 order-0 order-md-1">
                <div class="bg-light rounded border p-3">
                    <form action="{{ route('web.contacts.store') }}" method="post">
                        @csrf
                        <h4 class="text-uppercase text-left font-weight-bold mb-4">gửi tin nhắn cho chúng tôi</h4>
                        <div class="row">
                            <div class="col-12 col-lg-6 mb-3">
                                <input type="text" name="customer_name" class="form-control rounded-0" type="text" placeholder="Họ tên">
                            </div>
                            <div class="col-12 col-lg-6 mb-3">
                                <input type="text" name="email" class="form-control rounded-0" type="text" placeholder="Email">
                            </div>
                        </div>
                        <textarea type="text" name="content"  class="form-control rounded-0 my-md-2" id="exampleFormControlTextarea1" placeholder="Nội dung" rows="8" style="resize: none;"></textarea>
                        <div class="row">
                            <div class="col-lg-5 ml-auto">
                                <button type="submit" class="btn btn-warning font-weight-bold btn-send btn-block text-uppercase rounded-0 mt-3">Gửi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-5 order-1 order-md-0 mr-auto mt-5 mt-md-0">
                <div class="bg-light rounded border p-3">
                    <h4 class="text-uppercase font-weight-bold mb-4">thông tin liên hệ</h4>
                    <div class="d-flex mb-3">
                        <h5 class="mr-3 pr-2"><i class="fas fa-envelope text-warning"></i></h5>
                        {{-- {{ dd($data['email']) }} --}}
                        <span>Email: {{ $data['email'] ?? '' }}</span>
                    </div>
                    <div class="d-flex mb-3">
                        <h5 class="mr-3 pr-2"><i class="fas fa-phone-alt text-warning"></i></h5>
                        <span>Điện thoại: {{ $data['phone'] ?? '' }}</span>
                    </div>
                    <div class="d-flex mb-3">
                        <h5 class="mr-3 pr-2"><i class="fas fa-map-marker-alt text-warning"></i></h5>
                        <span class="ml-1">Địa chỉ: {{ $data['address'] ?? '' }}</span>
                    </div>
                    <h4 class="text-uppercase font-weight-bold my-4 pt-xl-4">theo dõi chúng tôi</h4>
                    <div class="d-flex mt-4 my-md-4">
                        <a href="//{{ $data['facebook'] ?? '' }}">
                            <div class="icon rounded-circle bg-white text-body mr-4">
                                <i class="fab fa-facebook-f text-primary w-100"></i>
                            </div>
                        </a>
                        <a href="//{{ $data['youtube'] ?? '' }}">
                            <div class="icon rounded-circle bg-white text-body mr-4">
                                <i class="fab fa-youtube text-danger w-100"></i>
                            </div>
                        </a>
                        <a href="//{{ $data['instagram'] ?? '' }}">
                            <div class="icon rounded-circle bg-white text-body mr-4">
                                <i class="fab fa-instagram text-warning w-100"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="bg-center bg-cover map">
            <iframe id="gmap_canvas" width="100%" height="100%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.731550477616!2d105.77484731471971!3d10.038996992824455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0881c10727c11%3A0xb7a0be387aa3d40d!2zOTgsIDUxIFRy4bqnbiBIxrBuZyDEkOG6oW8sIEFuIEPGsCwgTmluaCBLaeG7gXUsIEPhuqduIFRoxqEsIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1575729361110!5m2!1sen!2s" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
        </div>
    </div>
</div>

@endsection

@push('ready')
    @if ($message = Session::get('info'))
    toastr["info"]("{{$message }}");
    @endif
    @if (count($errors) > 0)
    toastr["error"]("@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach");
    @endif
@endpush