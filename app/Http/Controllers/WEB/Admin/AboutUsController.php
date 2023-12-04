<?php
namespace App\Http\Controllers\WEB\Admin;
use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Image;
use File;

class AboutUsController extends Controller
{

    public function index()
    {
       if(!auth()->user()->can('homepage-setting')){
            abort(403, 'Unauthorized action.');
        }
        $aboutUs = AboutUs::find('1');
        $item = AboutUs::find('2');
        return view('admin.about-us',compact('aboutUs', 'item'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        if(!auth()->user()->can('update-homepage-setting')){
            abort(403, 'Unauthorized action.');
        }
        $rules = [
            'about_us' => 'required',
        ];

        $customMessages = [
            'description.required' => trans('admin_validation.Description is required'),
        ];

        $this->validate($request, $rules,$customMessages);

        $aboutUs = AboutUs::first();
        if($request->banner_image){
            $exist_banner = $aboutUs->banner_image;
            $extention = $request->banner_image->getClientOriginalExtension();
            $banner_name = 'about-us'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $banner_name = 'uploads/website-images/'.$banner_name;
            Image::make($request->banner_image)
                ->save(public_path().'/'.$banner_name);
            $aboutUs->banner_image = $banner_name;
            $aboutUs->save();
            if($exist_banner){
                if(File::exists(public_path().'/'.$exist_banner))unlink(public_path().'/'.$exist_banner);
            }
        }

        if($request->image_two){
            $exist_banner = $aboutUs->image_two;
            $extention = $request->image_two->getClientOriginalExtension();
            $banner_name = 'about-us'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $banner_name = 'uploads/website-images/'.$banner_name;
            Image::make($request->image_two)
                ->save(public_path().'/'.$banner_name);
            $aboutUs->image_two = $banner_name;
            $aboutUs->save();
            if($exist_banner){
                if(File::exists(public_path().'/'.$exist_banner))unlink(public_path().'/'.$exist_banner);
            }
        }

        if($request->video_background){
            $exist_banner = $aboutUs->video_background;
            $extention = $request->video_background->getClientOriginalExtension();
            $banner_name = 'video_background'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $banner_name = 'uploads/website-images/'.$banner_name;
            Image::make($request->video_background)
                ->save(public_path().'/'.$banner_name);
            $aboutUs->video_background = $banner_name;
            $aboutUs->save();
            if($exist_banner){
                if(File::exists(public_path().'/'.$exist_banner))unlink(public_path().'/'.$exist_banner);
            }
        }
        
        
        if($request->dualBanner1){
            $exist_banner = $aboutUs->dualBanner1;
            $extention = $request->dualBanner1->getClientOriginalExtension();
            $banner_name = 'about-us'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $banner_name = 'uploads/website-images/'.$banner_name;
            Image::make($request->dualBanner1)
                ->save(public_path().'/'.$banner_name);
            $aboutUs->dualBanner1 = $banner_name;
            $aboutUs->save();
            if($exist_banner){
                if(File::exists(public_path().'/'.$exist_banner))unlink(public_path().'/'.$exist_banner);
            }
        }
        
        if($request->dualBanner2){
            $exist_banner = $aboutUs->dualBanner2;
            $extention = $request->dualBanner2->getClientOriginalExtension();
            $banner_name = 'about-us'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $banner_name = 'uploads/website-images/'.$banner_name;
            Image::make($request->dualBanner2)
                ->save(public_path().'/'.$banner_name);
            $aboutUs->dualBanner2 = $banner_name;
            $aboutUs->save();
            if($exist_banner){
                if(File::exists(public_path().'/'.$exist_banner))unlink(public_path().'/'.$exist_banner);
            }
        }
        
        if($request->trippleBanner1){
            $exist_banner = $aboutUs->trippleBanner1;
            $extention = $request->trippleBanner1->getClientOriginalExtension();
            $banner_name = 'about-us'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $banner_name = 'uploads/website-images/'.$banner_name;
            Image::make($request->trippleBanner1)
                ->save(public_path().'/'.$banner_name);
            $aboutUs->trippleBanner1 = $banner_name;
            $aboutUs->save();
            if($exist_banner){
                if(File::exists(public_path().'/'.$exist_banner))unlink(public_path().'/'.$exist_banner);
            }
        }
        
        
        if($request->trippleBanner2){
            $exist_banner = $aboutUs->trippleBanner2;
            $extention = $request->trippleBanner2->getClientOriginalExtension();
            $banner_name = 'about-us'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $banner_name = 'uploads/website-images/'.$banner_name;
            Image::make($request->trippleBanner2)
                ->save(public_path().'/'.$banner_name);
            $aboutUs->trippleBanner2 = $banner_name;
            $aboutUs->save();
            if($exist_banner){
                if(File::exists(public_path().'/'.$exist_banner))unlink(public_path().'/'.$exist_banner);
            }
        }
        
        if($request->trippleBanner3){
            $exist_banner = $aboutUs->trippleBanner3;
            $extention = $request->trippleBanner3->getClientOriginalExtension();
            $banner_name = 'about-us'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $banner_name = 'uploads/website-images/'.$banner_name;
            Image::make($request->trippleBanner3)
                ->save(public_path().'/'.$banner_name);
            $aboutUs->trippleBanner3 = $banner_name;
            $aboutUs->save();
            if($exist_banner){
                if(File::exists(public_path().'/'.$exist_banner))unlink(public_path().'/'.$exist_banner);
            }
        }

        $aboutUs->about_us = $request->about_us;
        $aboutUs->icon_one = $request->icon_one;
        $aboutUs->icon_two = $request->icon_two;
        $aboutUs->icon_three = $request->icon_three;
        $aboutUs->title_one = $request->title_one;
        $aboutUs->title_two = $request->title_two;
        $aboutUs->title_three = $request->title_three;
        $aboutUs->description_one = $request->description_one;
        $aboutUs->description_two = $request->description_two;
        $aboutUs->description_three = $request->description_three;
        $aboutUs->video_id = $request->video_id;
        $aboutUs->dualBannerlink1 = $request->dualBannerlink1;
        $aboutUs->dualBannerlink2 = $request->dualBannerlink2;
        $aboutUs->trippleBannerlink1 = $request->trippleBannerlink1;
        $aboutUs->trippleBannerlink2 = $request->trippleBannerlink2;
        $aboutUs->trippleBannerlink3 = $request->trippleBannerlink3;
        
        $aboutUs->save();

        $notification = trans('admin_validation.Updated Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }

    public function store(Request $request){
        if(!auth()->user()->can('store-homepage-setting')){
            abort(403, 'Unauthorized action.');
        }

        $rules = [
            'description' => 'required',
        ];

        $customMessages = [
            'banner_image.required' => trans('admin_validation.Banner is required'),
            'description.required' => trans('admin_validation.Description is required'),
        ];

        $this->validate($request, $rules,$customMessages);

        $aboutUs = new AboutUs();
        if($request->banner_image){
            $extention = $request->banner_image->getClientOriginalExtension();
            $banner_name = 'about-us'.date('-Y-m-d-h-i-s-').rand(999,9999).'.'.$extention;
            $banner_name = 'uploads/custom-images/'.$banner_name;
            Image::make($request->banner_image)
                ->save(public_path().'/'.$banner_name);
            $aboutUs->banner_image = $banner_name;
        }

        $aboutUs->description = $request->description;
        $aboutUs->save();

        $notification = trans('admin_validation.Created Successfully');
        $notification = array('messege'=>$notification,'alert-type'=>'success');
        return redirect()->back()->with($notification);
    }



}

