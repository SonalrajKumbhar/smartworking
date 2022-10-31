<?php

namespace App\Http\Controllers;
Use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\PropertyDetail;

class AdminController extends Controller
{
    // public function index(){
    //     return view('admin');
    // }
    public function index()
    {
    
        $PropertyDetails = PropertyDetail::all();
        return view('admin', compact('PropertyDetails'));
    }
    public function getPropertyForm(){
        return view('admin_property_form');
    }
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {

        $storeData = $request->validate([
            'county' => 'required|max:255',
            'town' => 'required|max:255',
            'postcode' => 'required',
            'description' => 'required',
             'displayable_address' => 'required',
            'number_of_bedrooms' => 'required',
            'property_type' => 'required',
            'number_of_bathrooms' => 'required',
            'price' => 'required',
            'for_sale_for_rent' => 'required',
            'postcode' => 'required',
            'image_url' => '',
        ]);
      
        $PropertyDetail = PropertyDetail::create($storeData);
        return redirect('/admin')->with('completed', 'Record has been saved!');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $PropertyDetails = PropertyDetail::findOrFail($id);
        return view('edit', compact('PropertyDetails'));
    }
    /**
     * Update the specified resource in db.
     */
    public function update(Request $request, $id)
    {
        $updateData = $request->validate([
            'county' => 'required|max:255',
            'town' => 'required|max:255',
            'postcode' => 'required',
            'description' => 'required',
            'displayable_address' => 'required',
            'number_of_bedrooms' => 'required',
            'property_type' => 'required',
            'number_of_bathrooms' => 'required',
            'price' => 'required',
            'for_sale_for_rent' => 'required',
            'postcode' => 'required',
            'image_url' => '',
        ]);
        PropertyDetail::whereId($id)->update($updateData);
        return redirect('/admin')->with('completed', 'Record has been updated');
    }
    public function destroy($id)
    {
        $PropertyDetail = PropertyDetail::findOrFail($id);
        $PropertyDetail->delete();
        return redirect('/admin')->with('completed', 'Record has been deleted');
    }
    public function apiDataStore(Request $request)
    {
        $url = "https://trial.craig.mtcserver15.com/api/properties?api_key=3NLTTNlXsi6rBWl7nYGluOdkl2htFHug";

        $json_data = file_get_contents($url);
        // Send request to Server
        $ch = curl_init($url);
        // Get response
        $response = curl_exec($ch);
        // Decode
        $result = json_decode($json_data);
      
         //echo "<pre>";print_r($result);exit; 
        foreach ($result->data as $value) {
              $findUuid = PropertyDetail::where('uuid', $value->uuid)->first();

            if($findUuid){
                $affected = PropertyDetail::where('uuid', $value->uuid)
                            ->update([
                                'county' => $value->county, 
                                'country' => $value->country, 
                                'town' => $value->town,
                                'property_type_id' => $value->property_type_id,
                                'description' => $value->description,
                                'town' => $value->town,
                                'address' => $value->address,
                                'thumbnail_url' => $value->image_thumbnail,
                                'image_url' => $value->image_full,
                                'latitude' => $value->latitude,
                                'longitude' => $value->longitude,
                                'number_of_bedrooms' => $value->num_bedrooms,
                                'number_of_bathrooms' => $value->num_bathrooms,
                                'price' => $value->price,
                                'for_sale_for_rent' => $value->type,
                                
                                ]);
            }else{
                $PropertyDetail = new PropertyDetail;
                $PropertyDetail->uuid = $value->uuid;
                $PropertyDetail->county = $value->county;
                $PropertyDetail->country = $value->country;
                $PropertyDetail->property_type_id = $value->property_type_id;
                $PropertyDetail->town = $value->town;
                $PropertyDetail->description = $value->description;
                $PropertyDetail->address = $value->address;
                $PropertyDetail->image_url = $value->image_full;
                $PropertyDetail->latitude = $value->latitude;
                $PropertyDetail->longitude = $value->longitude;
                $PropertyDetail->number_of_bedrooms = $value->num_bedrooms;
                $PropertyDetail->number_of_bathrooms = $value->num_bathrooms;
                $PropertyDetail->price = $value->price;
                $PropertyDetail->for_sale_for_rent = $value->type;
            
                $PropertyDetail->save();
            }
        }
       
      
        //$PropertyDetail = PropertyDetail::create($storeData);
        return redirect('/admin')->with('completed', 'Record has been saved!');
    }

}
