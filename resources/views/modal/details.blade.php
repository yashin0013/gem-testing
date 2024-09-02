<!-- <div class="modal-header justify-content-between bg-light">
    <div class="header_logo">
        <img src="{{asset('assets/img/logo2.png')}}" alt="gem_logo" width="80">
    </div>
    <h1 class="modal-title fs-2 fw-bolder text-dark text-uppercase" id="exampleModalLabel">GEM TESTING INDIA</h1>
    <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
</div> -->
<style>
    .img-box{
        border-radius: 20px;
    border: 4px solid #AA7716;
    }
    .img-box img{
        width: 100%;
        height: auto;
    }
</style>
<div class="modal-body">
    <div class="container px-0">
        <div class="row gx-2">
            <div class="col-md-12">
                <div class="gem-img-box w-100 overflow-hidden img-box shadow">
                    <img src="{{ asset('images/gems/' . $data['image']) }}" alt="" />
                </div>
            </div>
        </div>
    </div>
</div>
