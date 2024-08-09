@extends('admin.master')

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title text-center">Add Company Info form</h4>
                    <hr>
                    <p class="text-success text-center font-14">{{Session::get('message')}}</p>
                    <form class="form-horizontal" action="{{route('company.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="row_id" id="row_id">
                        <div class="row mb-3"> 
                            <label for="c_name" class="col-3 col-form-label">Name</label>
                            <div class="col-9">
                                <input type="text"  name="c_name" required class="form-control "  id="c_name" placeholder="Name"/>
                            </div> 
                            {{-- @error('c_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            --}}
                        </div>

                        <div class="row mb-3">
                            <label for="c_title" class="col-3 col-form-label">Title</label>
                            <div class="col-9">
                                <input type="text" class="form-control"   name="c_title" placeholder="Title">
                            </div>
  
                            @if ($errors->has('c_title'))
                            <span class="text-danger">{{ $errors->first('c_title') }}</span>
                            @endif
                        </div> 
                        <div class="row mb-3">
                            <label for="slogan" class="col-3 col-form-label">Slogan</label>
                            <div class="col-9">
                                <input type="text" name="c_slogan" required class="form-control"  id="slogan" placeholder="Enter Your Project Slogan"/>
                            </div>
                        </div>  
                        <div class="row mb-3">
                            <label for="mission" class="col-3 col-form-label">Mission</label>
                            <div class="col-9">
                                <textarea name="c_mission" id="mission" class="form-control"  cols="30" rows="10"></textarea>
                            </div>
                        </div> 
                        <div class="row mb-3">
                            <label for="vission" class="col-3 col-form-label">Vission</label>
                            <div class="col-9">
                                <textarea name="c_vission" id="vission" class="form-control"  cols="30" rows="10"></textarea>
                            </div>
                        </div>  
                        <div class="row mb-3">
                            <label for="simplemde1" class="col-3 col-form-label">Overview</label>
                            <div class="col-9">
                                <div class="tab-pane show active" id="simplemde-preview">
                                    <textarea id="simplemde1" name="c_overview"></textarea> 
                                </div> <!-- end preview-->
                            </div>
                        </div>  
                        <div class="row mb-3">
                            <label for="logoJpg" class="col-3 col-form-label">Logo Jpg</label>
                            <div class="col-9">
                                <input type="file" name="c_logo_jpg" class="form-control"  id="logoJpg" placeholder="Enter Your Project logo"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="logoPng" class="col-3 col-form-label">Logo Png</label>
                            <div class="col-9">
                                <input type="file" name="c_logo_png" class="form-control"  id="logoPng" placeholder="Enter Your Project logo"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="favicon" class="col-3 col-form-label">Favicon</label>
                            <div class="col-9">
                                <input type="file" name="c_favicon" class="form-control"  id="favicon" placeholder="Enter Your Favicon Icon"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="contact_number_one" class="col-3 col-form-label">Contact Number 1</label>
                            <div class="col-9">
                                <input type="tel" pattern="^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$" name="contact_number_one" class="form-control"  id="contact_number_one" placeholder="Enter Your Contact Number 1"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="contact_number_two" class="col-3 col-form-label">Contact Number 2</label>
                            <div class="col-9">
                                <input type="tel" pattern="^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$" name="contact_number_two" class="form-control"  id="contact_number_two" placeholder="Enter Your Contact Number 2"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="addressOne" class="col-3 col-form-label">Address One</label>
                            <div class="col-9">
                                <textarea name="c_address_one" class="form-control"  id="addressOne" cols="20" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="addressTwo" class="col-3 col-form-label">Address Two</label>
                            <div class="col-9">
                                <textarea name="c_address_two" class="form-control"  id="addressTwo" cols="20" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="fbLink" class="col-3 col-form-label">Facebook Link</label>
                            <div class="col-9">
                                <input type="text" name="c_fb_link"  class="form-control" id="fbLink" placeholder="Enter Your Location"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="linkedInLink" class="col-3 col-form-label">LinkedIn Link</label>
                            <div class="col-9">
                                <input type="text" name="c_linkedin_link"  class="form-control" id="linkedInLink" placeholder="Enter Your Location"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="twiterLink" class="col-3 col-form-label">Twiter Link</label>
                            <div class="col-9">
                                <input type="text" name="c_twiter_link"  class="form-control" id="twiterLink" placeholder="Enter Your Location"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="instraLink" class="col-3 col-form-label">Instragram Link</label>
                            <div class="col-9">
                                <input type="text" name="c_instra_link"  class="form-control" id="instraLink" placeholder="Enter Your Location"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="compProfile" class="col-3 col-form-label">Company Profile</label>
                            <div class="col-9"> 
                                <input type="file" accept="application/pdf" name="c_comp_profile"  class="form-control" id="compProfile" placeholder="Enter Your Location"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="compTradelicense" class="col-3 col-form-label">Company Trade License </label>
                            <div class="col-9">
                                <input type="file" accept="application/pdf" name="c_trade_license"  class="form-control" id="compTradelicense" placeholder="Enter Your Location"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="status" class="col-3">Status</label>
                            <div class="col-9">
                                <label><input type="radio" name="c_status" value="1" checked/> Active</label>
                                <label><input type="radio" name="c_status" value="0"/> Inactive</label>
                            </div>
                        </div>
                         
                        <div class="justify-content-end row">
                            <div class="col-9">
                                <button type="submit" id="saveBtn" class="btn btn-info">Add Company Infos </button>
                            </div>
                        </div>
                    </form>
                </div>  <!-- end card-body -->
            </div>  <!-- end card -->
        </div>  <!-- end col -->
    </div>
     
          
@endsection
@section('script')
    <script>
      
    </script>
@endsection
