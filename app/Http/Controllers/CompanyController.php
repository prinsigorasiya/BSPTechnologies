<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\State;
use App\Models\Country;
use App\Models\City;

class CompanyController extends Controller
{
    public function index(){
        return view("company.create");
    }


    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:100000',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|string|max:20',
            'services' => 'required|array',
            'country' => 'required|exists:countries,id',
            'state' => 'required|exists:states,id',
            'city' => 'required|exists:cities,id',
            'branches' => 'required|array',
        ]);
    
        $company = new Company;
    
        if ($request->hasFile('logo')) {
            $name = $request->file('logo')->getClientOriginalName();
            $request->file('logo')->storeAs('public/image', $name);
            $company->logo = $name;
        }
    
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->mobile = $request->input('mobile');
        $company->services = json_encode($request->input('services'));
        $countryName = Country::find($request->input('country'))->name;
        $stateName = State::find($request->input('state'))->name;
        $cityName = City::find($request->input('city'))->name;
    
        $company->country = $countryName;
        $company->state = $stateName;
        $company->city = $cityName;
        $company->branches = json_encode($request->input('branches'));
    
        $company->save();
    
        return redirect()->route('viewcompany');
    }

    public function show()
    {
        //

       $company = Company::all();
    // $car = Car::where('ev_customer_car.customer_id', '=', 'users.id')->get();
      // $car= Car::orderBy('created_at','desc')->get();

        $data=compact('company');
        return view('company.viewcompany')->with($data);
    }


    public function edit($id)
    {
        //
        $company= Company::find($id);
        if(is_null($company)){
         echo"No record";
 
        }else{
         return view('company.edit', compact('company'));
        }
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:100000',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|string|max:20',
            'services' => 'required|array',
            'country' => 'required|exists:countries,id',
            'state' => 'required|exists:states,id',
            'city' => 'required|exists:cities,id',
            'branches' => 'required|array',
        ]);
    
        $company = Company::find($id);
    
        if (!$company) {
            return redirect()->back()->with('error', 'Company not found');
        }
    
        if ($request->hasFile('logo')) {
            $name = $request->file('logo')->getClientOriginalName();
            $request->file('logo')->storeAs('public/image', $name);
            $company->logo = $name;
        }
    
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->mobile = $request->input('mobile');
        $company->services = json_encode($request->input('services'));
        $countryName = Country::find($request->input('country'))->name;
        $stateName = State::find($request->input('state'))->name;
        $cityName = City::find($request->input('city'))->name;
    
        $company->country = $countryName;
        $company->state = $stateName;
        $company->city = $cityName;
        $company->branches = json_encode($request->input('branches'));
    
        $company->update();
    
        return redirect()->route('viewcompany');
    }
    

    public function destroy($id)
    {
        // $id = Car::find($id);
        // $id->softDelete();
        // return redirect('/car');

        $company = Company::find($id);
        $company->delete();
        return redirect()->route('viewcompany');

       
    }
    
}