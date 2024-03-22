<div class="modal-header justify-content-between bg-light">
    <div class="header_logo">
        <img src="{{asset('assets/img/logo2.png')}}" alt="gem_logo" width="80">
    </div>
    <h1 class="modal-title fs-2 fw-bolder text-warning text-uppercase" id="exampleModalLabel">GEM TESTING INDIA</h1>
    <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
    <div class="container px-0">
        <div class="row gx-2">
            <div class="col-md-8 table-box">
                <table class="table table-bordered custom_table">
                    <tbody>
                        @foreach ($data as $key => $value)
                            @if ($key == 'image')
                                @continue
                            @endif
                            <tr>
                                <th scope="row">{{ ucfirst(str_replace('_', ' ', $key)) }} :</th>
                                <td>{{ $value }}</td>
                            </tr>
                            @if ($loop->iteration == 2)
                            <tr>
                            <td class="bg-warning fw-bold" colspan="2"> The results obtained are as follows</td>
                            </tr>
                                
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <div class="gem-img-box w-100 overflow-hidden rounded-3 shadow">
                    <img src="{{ asset('images/gems/' . $data['image']) }}" class="img-fluid" alt="" />
                </div>
                 {{-- <div class="img-box">
                    <img src="{{ asset('assets/img/img.png') }}" class="img-fluid" alt="" />
                </div> --}}
            </div>
        </div>
        {{-- <div class="row justify-content-center mt-3">
            <div class="col-md-9">
                <h3 class="text-center">Have Question? Send Us</h3>
                <form id="contact-form" onsubmit="event.preventDefault(); contactSubmit()"
                    action="{{ route('contact.store') }}">
                    @csrf
                    <div class="row">
                        <div class="mb-3 col-6">
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Your Name">
                        </div>
                        <div class="mb-3 col-6">
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Your Email">
                        </div>

                        <div class="mb-3 col-6">
                            <input type="phone" class="form-control" id="phone" name="phone"
                                placeholder="Your Phone Number">
                        </div>
                        <div class="mb-3 col-6">
                            <input type="text" class="form-control" id="subject" name="subject"
                                placeholder="Subject">
                        </div>
                        <div class="mb-3 col-12">
                            <textarea class="form-control" name="message" placeholder="Type your message here"></textarea>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div> --}}
    </div>
</div>
{{-- <div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
  <button type="button" class="btn btn-primary">Save changes</button>
</div> --}}
