@extends('admin.master_layout')
@section('title')
<title>{{__('admin.About Us')}}</title>
@endsection
@section('admin-content')
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Home Page Setting</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{__('admin.Dashboard')}}</a></div>
              <div class="breadcrumb-item">Home Page Setting</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row mt-4">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                            <form action="{{ route('admin.about-us.update',$aboutUs->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <!--<div class="col-12">-->
                                    <!--    <h5 class="header_title">{{__('admin.First Image')}}</h5>-->
                                    <!--    <hr>-->
                                    <!--</div>-->

                                    <!--<div class="form-group col-12">-->
                                    <!--    <label for="">{{__('admin.Existing Image')}}</label>-->
                                    <!--    <div>-->
                                    <!--        <img class="about_image_one" src="{{ asset($aboutUs->image_two) }}" alt="">-->
                                    <!--    </div>-->
                                    <!--</div>-->

                                    <!--<div class="form-group col-12">-->
                                    <!--    <label for="">{{__('admin.New Image')}}</label>-->
                                    <!--    <input type="file" name="image_two" class="form-control-file">-->
                                    <!--</div>-->

                                    <!--<div class="col-12">-->
                                    <!--    <h5 class="header_title">{{__('admin.Second Image')}}</h5>-->
                                    <!--    <hr>-->
                                    <!--</div>-->

                                    <!--<div class="form-group col-12">-->
                                    <!--    <label for="">{{__('admin.Existing Image')}}</label>-->
                                    <!--    <div>-->
                                    <!--        <img class="about_image_two" src="{{ asset($aboutUs->banner_image) }}" alt="">-->
                                    <!--    </div>-->
                                    <!--</div>-->

                                    <!--<div class="form-group col-12">-->
                                    <!--    <label for="">{{__('admin.New Image')}}</label>-->
                                    <!--    <input type="file" name="banner_image" class="form-control-file">-->
                                    <!--</div>-->

                                    <!--<div class="col-12">-->
                                    <!--    <h5 class="header_title">{{__('admin.First Item')}}</h5>-->
                                    <!--    <hr>-->
                                    <!--</div>-->

                                    <!--<div class="form-group col-12">-->
                                    <!--    <label for="">{{__('admin.Icon')}} <span class="text-danger">*</span></label>-->
                                    <!--    <input type="text" name="icon_one" class="form-control custom-icon-picker" value="{{ $aboutUs->icon_one }}" required>-->
                                    <!--</div>-->

                                    <!--<div class="form-group col-12">-->
                                    <!--    <label for="">{{__('admin.Title')}} <span class="text-danger">*</span></label>-->
                                    <!--    <input type="text" name="title_one" class="form-control" value="{{ $aboutUs->title_one }}" required>-->
                                    <!--</div>-->

                                    <!--<div class="form-group col-12">-->
                                    <!--    <label for="">{{__('admin.Description')}} <span class="text-danger">*</span></label>-->
                                    <!--    <textarea required name="description_one" cols="30" rows="10" class="form-control text-area-3">{{ $aboutUs->description_one }}</textarea>-->
                                    <!--</div>-->

                                    <!--<div class="col-12">-->
                                    <!--    <h5 class="header_title">{{__('admin.Second Item')}}</h5>-->
                                    <!--    <hr>-->
                                    <!--</div>-->

                                    <!--<div class="form-group col-12">-->
                                    <!--    <label for="">{{__('admin.Icon')}} <span class="text-danger">*</span></label>-->
                                    <!--    <input required type="text" name="icon_two" class="form-control custom-icon-picker" value="{{ $aboutUs->icon_two }}">-->
                                    <!--</div>-->

                                    <!--<div class="form-group col-12">-->
                                    <!--    <label for="">{{__('admin.Title')}} <span class="text-danger">*</span></label>-->
                                    <!--    <input required type="text" name="title_two" class="form-control" value="{{ $aboutUs->title_two }}">-->
                                    <!--</div>-->

                                    <!--<div class="form-group col-12">-->
                                    <!--    <label for="">{{__('admin.Description')}} <span class="text-danger">*</span></label>-->
                                    <!--    <textarea required name="description_two" cols="30" rows="10" class="form-control text-area-3">{{ $aboutUs->description_two }}</textarea>-->
                                    <!--</div>-->

                                    <div class="col-12">
                                        <h5 class="header_title">Home Page Settings</h5>
                                        <hr>
                                    </div>

                                    <!--<div class="form-group col-12">-->
                                    <!--    <label for="">{{__('admin.Icon')}} <span class="text-danger">*</span></label>-->
                                    <!--    <input required type="text" name="icon_three" class="form-control custom-icon-picker" value="{{ $aboutUs->icon_three }}">-->
                                    <!--</div>-->



                                    <div class="form-group col-12">
                                        <label for="">{{__('admin.Description')}} <span class="text-danger">*</span></label>
                                        <textarea required name="description_three" cols="30" rows="10" class="form-control text-area-3">{{ $aboutUs->description_three }}</textarea>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="">Hot Item Link 1<span class="text-danger">*</span></label>
                                        <input required type="text" name="title_three" class="form-control" value="{{ $aboutUs->title_three }}">
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="">Hot Item Image 1</label>
                                        <div>
                                            <img src="{{ asset($aboutUs->video_background) }}" alt="" class="w_300">
                                        </div>
                                    </div>
                                    
                                     

                                    <div class="form-group col-12">
                                        <label for="">Hot Image 1</label>
                                        <input type="file" name="video_background" class="form-control-file">
                                    </div>
                                    
                                    <div class="form-group col-12">
                                        <label for="">Hot Item Link 2<span class="text-danger">*</span></label>
                                        <input required type="text" name="title_three" class="form-control" value="{{ $aboutUs->title_three }}">
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="">Hot Item Image 2</label>
                                        <div>
                                            <img src="{{ asset($aboutUs->video_background) }}" alt="" class="w_300">
                                        </div>
                                    </div>
                                     <div class="form-group col-12">
                                        <label for="">Hot Image 2</label>
                                        <input type="file" name="image_two" class="form-control-file">
                                    </div>
                                    <!--<div class="form-group col-12">-->
                                    <!--    <label for="">{{__('admin.Youtube video id')}} <span class="text-danger">*</span></label>-->
                                    <!--    <input required type="text" name="video_id" class="form-control" value="{{ $aboutUs->video_id }}">-->
                                    <!--</div>-->

                                    <div class="form-group col-12">
                                        <label>About Products <span class="text-danger">*</span></label>
                                        <textarea required name="about_us" cols="30" rows="10" class="summernote">{{ $aboutUs->about_us }}</textarea>
                                    </div>
                                    
                                    <div class="form-group col-12">
                                        <label>Dual Banner Image <span class="text-danger">*</span></label>
                                        <div class="col-md-6">
                                            <label>Image 1 </label> 
                                             <img src="{{ asset($aboutUs->dualBanner1) }}" alt="" class="w_300">
                                        <input type="file" name="dualBanner1" class="form-control">
                                        <label>Image 1 link </label> 
                                        <input type="text" name="dualBannerlink1" value="{{$aboutUs->dualBannerlink1}}" class="form-control" placeholder="link1">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Image 2 </label> 
                                            <img src="{{ asset($aboutUs->dualBanner2) }}" alt="" class="w_300">
                                        <input type="file" name="dualBanner2" class="form-control">    
                                        <label>Image 2 link </label> 
                                        <input type="text" name="dualBannerlink2" value="{{$aboutUs->dualBannerlink2}}" class="form-control" placeholder="link2">
                                        </div>
                                        
                                    </div>
                                
                                    <div class="form-group col-12">
                                        <label>Tripple Banner Image <span class="text-danger">*</span></label>
                                        <div class="col-md-6">
                                            <label>Image 1 </label> 
                                            <img src="{{ asset($aboutUs->trippleBanner1) }}" alt="" class="w_300">
                                        <input type="file" name="trippleBanner1" class="form-control">    
                                        <label>Image 1 Link </label> 
                                        
                                        <input type="text" name="trippleBannerlink1" value="{{$aboutUs->trippleBannerlink1}}" class="form-control" placeholder="link1">
                                        
                                        </div>
                                        <div class="col-md-6">
                                            <label>Image 2 </label> 
                                        <input type="file" name="trippleBanner2" class="form-control">   
                                        <img src="{{ asset($aboutUs->trippleBanner2) }}" alt="" class="w_300">
                                        <label>Image 2 link</label> 
                                        <input type="text" name="trippleBannerlink2" value="{{$aboutUs->trippleBannerlink2}}" class="form-control" placeholder="link2">
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label>Image 3 </label> 
                                        <input type="file" name="trippleBanner3" class="form-control">  
                                        <img src="{{ asset($aboutUs->trippleBanner3) }}" alt="" class="w_300">
                                        <label>Image 3 link</label> 
                                        <input type="text" name="trippleBannerlink3" value="{{$aboutUs->trippleBannerlink2}}" class="form-control" placeholder="link3">
                                        </div>
                                        
                                    </div>
                                
                                </div>
                                
                                
                                
                                <div class="row">
                                    <div class="col-12">
                                        <button class="btn btn-primary">{{__('admin.Update')}}</button>
                                    </div>
                                </div>
                            </form>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                            <form action="{{ route('admin.about-us.update',$item->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">

                                    <div class="col-12">
                                        <h5 class="header_title">Popup Offer Settings</h5>
                                        <hr>
                                    </div>


                                    <div class="form-group col-12">
                                        <label for="">{{__('admin.Description')}} <span class="text-danger">*</span></label>
                                        <textarea required name="description_three" cols="30" rows="10" class="form-control text-area-3">{{ $item->description_three }}</textarea>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="">Hot Item Link<span class="text-danger">*</span></label>
                                        <input required type="text" name="title_three" class="form-control" value="{{ $item->title_three }}">
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="">Hot Item Image</label>
                                        <div>
                                            <img src="{{ asset($item->video_background) }}" alt="" class="w_300">
                                        </div>
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="">{{__('admin.New Image')}}</label>
                                        <input type="file" name="banner_image" class="form-control-file">
                                    </div>

                                    <!--<div class="form-group col-12">-->
                                    <!--    <label for="">{{__('admin.Youtube video id')}} <span class="text-danger">*</span></label>-->
                                    <!--    <input required type="text" name="video_id" class="form-control" value="{{ $item->video_id }}">-->
                                    <!--</div>-->

                                    <div class="form-group col-12">
                                        <label>About Products <span class="text-danger">*</span></label>
                                        <textarea required name="about_us" cols="30" rows="10" class="summernote">{{ $item->about_us }}</textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <button class="btn btn-primary">{{__('admin.Update')}}</button>
                                    </div>
                                </div>
                            </form>
                    </div>
                  </div>
                </div>
          </div>
        </section>
      </div>

@endsection

