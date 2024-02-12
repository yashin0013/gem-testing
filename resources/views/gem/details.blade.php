<div class="container">
  <div class="row">
    <div class="col-md-8">
      <table class="table">
          <tbody>
            <tr>
              <th scope="row">Report Number</th>
              <td>{{$gem->report_number}}</td>
            </tr>
            <tr>
              <th scope="row">Weight of stone</th>
              <td>{{$gem->weight}}</td>
            </tr>
            <tr>
              <th scope="row">Dimension</th>
              <td colspan="2">{{$gem->dimension}}</td>
            </tr>
            <tr>
              <th scope="row">Color</th>
              <td colspan="2">{{$gem->color}}</td>
            </tr>
            <tr>
              <th scope="row">Shape & Cut</th>
              <td colspan="2">{{$gem->shape_cut}}</td>
            </tr>
            <tr>
              <th scope="row">Optic Character</th>
              <td colspan="2">{{$gem->optic_char}}</td>
            </tr>
            <tr>
              <th scope="row">Refractive Index</th>
              <td colspan="2">{{$gem->refractive_index}}</td>
            </tr>
            <tr>
              <th scope="row">Specific Gravity</th>
              <td colspan="2">{{$gem->specific_gravity}}</td>
            </tr>
            <tr>
              <th scope="row">Microscope View</th>
              <td colspan="2">{{$gem->microscope_view}}</td>
            </tr>
            <tr>
              <th scope="row">Species</th>
              <td colspan="2">{{$gem->species}}</td>
            </tr>
            <tr>
              <th scope="row">Comments</th>
              <td colspan="2">{{$gem->comments}}</td>
            </tr>
          </tbody>
        </table>
    </div>
    <div class="col-md-4">
      <div class="gem-img-box">
        <img src="{{asset('storage/gems/'.$gem->image)}}" class="img-fluid" alt="" />
      </div>
      <div class="img-box">
        <img src="{{asset('assets/img/img.png')}}" class="img-fluid" alt="" />
      </div>
    </div>
  </div>
  <div class="row justify-content-center mt-3">
    <div class="col-md-9">
      <h3 class="text-center">Have Question? Send Us</h3>
      <form>
        <div class="row">
          <div class="mb-3 col-6">
            <input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
          </div>
          <div class="mb-3 col-6">
            <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
          </div>
        
        <div class="mb-3 col-6">
          <input type="phone" class="form-control" id="phone" name="phone" placeholder="Your Phone Number">
        </div>
        <div class="mb-3 col-6">
          <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
        </div>
        <div class="mb-3 col-12">
          <textarea class="form-control" placeholder="Type your message here"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>