@extends('admin.master')

@section('body')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title text-center">Update Company Informations</h4>
                    <hr>
                    <p class="text-success text-center font-14">{{Session::get('message')}}</p>
                    <form class="form-horizontal" action="{{route('company.store' )}}" method="POST" enctype="multipart/form-data">
                        @csrf                        
                        <div class="row mb-3"> 
                            <label for="name" class="col-3 col-form-label">Name</label>
                            <div class="col-9">
                                <input type="text"  name="name" required class="form-control"  id="name" value="{{$company->name}}" placeholder="Name"/>
                            </div>  
                        </div>
                        <div class="row mb-3">
                            <label for="title" class="col-3 col-form-label">Title</label>
                            <div class="col-9">
                                <input type="text" class="form-control"  name="title" value="{{$company->title}}" placeholder="Title">
                            </div>
                        </div> 
                        <div class="row mb-3">
                            <label for="slogan" class="col-3 col-form-label">Slogan</label>
                            <div class="col-9">
                                <input type="text" name="slogan" required class="form-control"  id="slogan" value="{{$company->slogan}}" placeholder="Enter Your Project Slogan"/>
                            </div>
                        </div>  
                        <div class="row mb-3">
                            <label for="mission" class="col-3 col-form-label">Mission</label>
                            <div class="col-9">
                                <textarea name="mission" id="mission" class="form-control"  >{{$company->mission}}</textarea>
                            </div>
                        </div> 
                        <div class="row mb-3">
                            <label for="vission" class="col-3 col-form-label">Vission</label>
                            <div class="col-9">
                                <textarea name="vission" id="vission" class="form-control"  >{{$company->vission}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="vission" class="col-3 col-form-label">Policy</label>
                            <div class="col-9">
                                <textarea name="policy" id="vission" class="form-control" >{{$company->policy}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="vission" class="col-3 col-form-label">Term</label>
                            <div class="col-9">
                                <textarea name="term" id="vission" class="form-control" >{{$company->term}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="vission" class="col-3 col-form-label">Values</label>
                            <div class="col-9">
                                <textarea name="values" id="vission" class="form-control" >{{$company->values}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="vission" class="col-3 col-form-label">Services</label>
                            <div class="col-9">
                                <textarea name="services" id="vission" class="form-control" >{{$company->services}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="vission" class="col-3 col-form-label">Why Us</label>
                            <div class="col-9">
                                <textarea name="whyus" id="vission" class="form-control" >{{$company->whyus}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="logoJpg" class="col-3 col-form-label">Logo Jpg</label>
                            <div class="col-9"> 
                                <input type="file" name="logo_jpg" class="form-control"  id="logoJpg" value="{{$company->logo_jpg}}" placeholder="Enter Your Project logo"/>
                                <img src="{{asset($company->logo_jpg)}}" alt="Logo Jpg" height="100" width="120"/>
                            
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="logoPng" class="col-3 col-form-label">Logo Png</label>
                            <div class="col-9">
                                <input type="file" name="logo_png" class="form-control"  id="logoPng" value="{{$company->logo_png}}" placeholder="Enter Your Project logo"/>
                                <img src="{{asset($company->logo_png)}}" alt="Logo Png" height="100" width="120"/>
                            
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="favicon" class="col-3 col-form-label">Favicon</label>
                            <div class="col-9">
                                <input type="file" name="favicon" class="form-control"  id="favicon" value="{{$company->favicon}}" placeholder="Enter Your Project logo"/>
                                <img src="{{asset($company->favicon)}}" alt="Favicon" height="100" width="120"/>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="contact_number_one" class="col-3 col-form-label">Contact Number 1</label>
                            <div class="col-9">
                                <input type="tel" value="{{$company->contact_number_one}}" pattern="^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$" name="contact_number_one" class="form-control"  id="contact_number_one" placeholder="Enter Your Contact Number 1"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="contact_number_two" class="col-3 col-form-label">Contact Number 2</label>
                            <div class="col-9">
                                <input type="tel" value="{{$company->contact_number_two}}" pattern="^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$" name="contact_number_two" class="form-control"  id="contact_number_two" placeholder="Enter Your Contact Number 2"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="addressOne" class="col-3 col-form-label">Address One</label>
                            <div class="col-9">
                                <input type="text" name="address_one" required class="form-control" id="addressOne" value="{{$company->address_one}}" placeholder="Enter Company Address One" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="addressTwo" class="col-3 col-form-label">Address Two</label>
                            <div class="col-9">
                                <input type="text" name="address_two" required class="form-control" id="addressTwo" value="{{$company->address_two}}" placeholder="Enter Company Address One" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="fbLink" class="col-3 col-form-label">Company Email</label>
                            <div class="col-9">
                                <input type="text" name="email"  class="form-control" id="email" value="{{$company->email}}" placeholder="Enter Company Email"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="fbLink" class="col-3 col-form-label">Facebook Link</label>
                            <div class="col-9">
                                <input type="text" name="fb_link"  class="form-control" id="fbLink" value="{{$company->fb_link}}" placeholder="Enter Facebook Link"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="linkedInLink" class="col-3 col-form-label">LinkedIn Link</label>
                            <div class="col-9">
                                <input type="text" name="linkedin_link"  class="form-control" id="linkedInLink" value="{{$company->linkedin_link}}" placeholder="Enter LinkedIn Link"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="instraLink" class="col-3 col-form-label">Youtube Link</label>
                            <div class="col-9">
                                <input type="text" name="youtube_link"  class="form-control" id="youtube_link" value="{{$company->youtube_link}}" placeholder="Enter Youtube Link"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="instraLink" class="col-3 col-form-label">WhatsApp Number</label>
                            <div class="col-9">
                                <input type="text" name="whatsapp"  class="form-control" id="instraLink" value="{{$company->whatsapp}}" placeholder="Enter Whatsapp Number"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="compProfile" class="col-3 col-form-label">Company Profile</label>
                            <div class="col-9"> 
                                <input type="file" accept="application/pdf" name="comp_profile"  class="form-control" id="compProfile" value="{{$company->comp_profile}}"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="compTradelicense" class="col-3 col-form-label">Company Trade License NO</label>
                            <div class="col-9">
                                <input type="file" accept="application/pdf" name="trade_license"  class="form-control" id="compTradelicense" value="{{$company->trade_license}}"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="simplemde1" class="col-3 col-form-label">Overview</label>
                            <div class="col-9">
                                <div class="tab-pane show active" id="simplemde-preview">
                                    <textarea id="simplemde1" name="overview" class="form-control"">{{$company->overview}}</textarea>
                                </div> <!-- end preview-->
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="status" class="col-3">Status</label>
                            <div class="col-9">
                                <label><input type="radio" name="status" value="1" {{$company->status == 1 ? 'checked' : ''}}/> Active</label>
                                <label><input type="radio" name="status" value="0" {{$company->status == 2 ? 'checked' : ''}}/> Inactive</label>
                            </div>
                        </div>
                        <div class="justify-content-end row">
                            <div class="col-9">
                                <button type="submit" id="saveBtn" class="btn btn-info">Update Company Info</button>
                            </div>
                        </div>
                    </form>
                    
                </div>  <!-- end card-body -->
            </div>  <!-- end card -->
        </div>  <!-- end col -->
    </div>
@endsection
