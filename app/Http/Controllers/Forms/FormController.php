<?php

namespace App\Http\Controllers\Forms;

use App\Http\Controllers\Controller;
use App\Http\Resources\AgriculturalProjectResource;
use App\Http\Resources\ContactListResource;
use App\Http\Resources\IndustrialProjectResource;
use App\Models\AgriculturalProject;
use App\Models\Contact;
use App\Models\IndustrialProject;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

class FormController extends Controller
{
    public function suggest(Request $request){

        $this->validate($request,[
            "name"=>"required",
            "surname"=>"required",
            "topic"=>"required",
            "message"=>"required",
            "mobile"=>"required",
            "email"=>"required|email",
        ]);

        $contact=Contact::create([
            'name'=>$request->name,
            'surname'=>$request->surname,
            'topic'=>$request->topic,
            'message'=>$request->message,
            'mobile'=>$request->mobile,
            'email'=>$request->email,
        ]);
        return redirect()->back()->withSuccess("Ugurla gonderildi");

    }


    public function getApi(Request $request): ResourceCollection
    {
        $fields = Contact::query();



        $fields = $fields->paginate(15);


        return ContactListResource::collection($fields);
    }
    public function getAgricultural_projects(Request $request): ResourceCollection
    {
        $fields = AgriculturalProject::query();



        $fields = $fields->paginate(15);


        return AgriculturalProjectResource::collection($fields);
    }
    public function getIndustrial_projects(Request $request): ResourceCollection
    {
        $fields = IndustrialProject::query();



        $fields = $fields->paginate(15);


        return IndustrialProjectResource::collection($fields);
    }


    public function destroy(int $id)
    {
        $post = Contact::findOrFail($id);

        $post->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
    public function agriculture_projectsDestroy(int $id)
    {
        $post = AgriculturalProject::findOrFail($id);

        $post->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }public function industrial_projectsDestroy(int $id)
    {
        $post = IndustrialProject::findOrFail($id);

        $post->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function industrial_project(Request $request){
        $this->validate($request,[
            'full_name'=>'required',
            'voen'=>'required',
            'project'=>'required',
            'material'=>'required',
            'production'=>'required',
            'time'=>'required',
            'demand'=>'required',
            'productive_capacity'=>'required',
            'investisiya'=>'required',
            'area'=>'required',
            'sales'=>'required',
            'area_electric'=>'required',
            'natural_gas'=>'required',
            'technical_water'=>'required',
            'drinkable_water'=>'required',
            'infrastructure_requirements'=>'required',
        ]);


        IndustrialProject::create([
            'full_name'=>$request->full_name,
            'voen'=>$request->full_name,
            'project'=>$request->project,
            'material'=>$request->material,
            'production'=>$request->production,
            'time'=>$request->time,
            'demand'=>$request->demand,
            'productive_capacity'=>$request->productive_capacity,
            'investisiya'=>$request->investisiya,
            'area'=>$request->area,
            'sales'=>$request->sales,
            'area_electric'=>$request->area_electric,
            'natural_gas'=>$request->natural_gas,
            'technical_water'=>$request->technical_water,
            'drinkable_water'=>$request->drinkable_water,
            'infrastructure_requirements'=>$request->infrastructure_requirements,
        ]);


        return redirect()->back()->withSuccess("Uğurla göndərildi!");
    }

    public function agricultural_project(Request $request){


        $this->validate($request,[
            'full_name'=>'required',
            'address'=>'required',
            'mobile'=>'required',
            'email'=>'required|email',
            'project'=>'required',
            'district'=>'required',
            'sown_area'=>'required',
            'processing_area'=>'required',
            'product'=>'required',
            'date'=>'required',
            'irrigation_method'=>'required',
        ]);


        AgriculturalProject::create([
            'full_name'=>$request->full_name,
            'address'=>$request->address,
            'mobile'=>$request->mobile,
            'email'=>$request->email,
            'project'=>$request->project,
            'district'=>$request->district,
            'sown_area'=>$request->sown_area,
            'processing_area'=>$request->processing_area,
            'product'=>$request->product,
            'date'=>$request->date,
            'irrigation_method'=>$request->irrigation_method,
        ]);

        return redirect()->back()->withSuccess("Uğurla göndərildi!");


    }
}
