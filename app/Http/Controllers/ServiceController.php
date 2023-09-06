<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('tuning-center.services', ['services' => $services]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:273',
        ]);

        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);
        $imagePath = 'images/' . $imageName;
        
        $service = new Service();
        $service->name = $request->name;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->image = $imagePath; // Сохраняем путь к изображению
        $service->save();

        return redirect()->route('admin.dashboard', ['tab' => 'services'])->with('success','Service successfully added.');
    }
    public function destroy($id)
    {
        $service = Service::find($id);
        if ($service) {
            $service->delete();
            return redirect()->route('services')->with('success', 'Service successfully deleted.');
        } else {
            return redirect()->route('services')->with('error', 'Service not found.');
        }
    }
}
