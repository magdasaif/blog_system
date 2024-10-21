<?php
namespace App\Traits;

use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

trait MediaTrait
{
   public function StoreMediaWithMediaLibrary($request,$model_data,$media_input_name,$collection_name){
      $file = $request->file($media_input_name);
      return   $model_data->addMedia($file)->toMediaCollection($collection_name);
   }
   #==========================================================================================================#
   public function UpdateMedia($request,$media_name_request,$new_image_name,$model_name,$model_id,$model_collection_name){
      
      # Check if this model has a image or not 
      $CheckImageExist = $this->CheckFileExistMediaWithMediaLibrary($model_name,$model_id,$model_collection_name);
      if(isset($CheckImageExist)){
         // $new_image_without_extension = pathinfo($new_image_name->getClientOriginalName(), PATHINFO_FILENAME) ; 
         #old_image_with_extension  -> $CheckImageExist->file_name;
         $new_image_with_extension = $new_image_name->getClientOriginalName(); 
         if($CheckImageExist->file_name==$new_image_with_extension){
            return null;
         }else{
            #delete image from media table  and from disk 
            $DeleteMedia=$this->DeleteMedia($CheckImageExist->id);
         }
      }
      #store new image in db and generate new image on media disk (if model hasn't image before)
      $model=$model_name::find($model_id);
      if($model){
         return  $this->StoreMediaWithMediaLibrary($request,$model,$media_name_request,$model_collection_name);
      }
   }
   #==========================================================================================================#
   public function CheckFileExistMediaWithMediaLibrary($model_name,$model_id,$model_collection_name){
      return $CheckImageExist =DB::table('media')->where(
         [
            ['model_type'      , $model_name],
            ['model_id'        , $model_id],
            ['collection_name' , $model_collection_name],
         ])->first();
   }
   #==========================================================================================================#
   public function DeleteMedia($media_id){
      $media=Media::find($media_id);
      if(isset($media)){
         $media->delete(); // function media to delete image from media table  and from disk 
         return $media;
      }
   }
   #===============================================multi=============================================================#
   public function StoreMultiMediaWithMediaLibrary($model,$request, $media_input_name,$collection_name){
      foreach ($request->file($media_input_name, []) as $key => $file){
         $model->addMedia($file)->toMediaCollection($collection_name);
      }
   }
   #==========================================================================================================#
   public function CheckMultiFileExistMediaWithMediaLibrary($model_name,$model_id,$model_collection_name){
      return $CheckImageExist =DB::table('media')->where(
         [
            ['model_type'      , $model_name],
            ['model_id'        , $model_id],
            ['collection_name' , $model_collection_name],
         ])->get();
   }
   #==========================================================================================================#
   public function DeleteMultiMedia($media_ids){
      $media = Media::whereIn('uuid', $media_ids)->delete();
      return $media;
   }
   #==========================================================================================================#
}