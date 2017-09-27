<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImageGallery;
use Illuminate\Support\Facades\Storage;

class ImageGalleryController extends Controller
{

    /**
     * Listing Of images gallery
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$images = ImageGallery::get();
        // возвращает вьюху image-gallery
    	return view('photogallery/image-gallery',compact('images'));
    }

    /**
     * Upload image function
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        //валидация 
    	$this->validate($request, [
    		'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // загружает файл в public/images/
        $input['image'] = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $input['image']);


         Storage::disk('local')->put('images/images'.$input['image'], 'public');
        //   Storage::disk('local')->has($input['image']);

        // сохраняет title 
        $input['title'] = $request->title;
        ImageGallery::create($input);

        // возвращает сообщение "фото отправлено"
    	return back()
    		->with('success','Фото отправлено');
    }

    public function create()
    {
        // возвращает форму для загрузки фото
        return view("photogallery.create");
    }

    /**
     * Remove Image function
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // удаляет фото из галлереи
    	ImageGallery::find($id)->delete();
    	return back()
    		->with('success','Image removed successfully.');	
    }
}
