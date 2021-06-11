<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProviderController extends Controller
{

    private $rules;

    public function __construct()
    {
        $this->rules= [
            'provider' => 'required|string|min:4|max:50',
            'tel_prov' => 'required|string|min:10|max:13',
            'email_prov' => 'required|email:rfc|max:80',
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers=Provider::get();
        return view('provider.provider-index', compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('provider.provider-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /** Validacion del Formulario **/
        $request->validate(
            [
                'provider' => 'required|string|min:4|max:50|unique:App\Models\Provider,provider',
                'tel_prov' => 'required|string|min:10|max:13|unique:App\Models\Provider,tel_prov',
                'email_prov' => 'required|email:rfc|max:80',
                
            ]);
        
        /** Almacenamiento en la DB **/
        $provider=Provider::create($request->all());
        return redirect()->route('provider.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        return view('provider.provider-show', compact('provider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit(Provider $provider)
    {
        return view('provider.provider-form', compact('provider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provider $provider)
    {
        /** Validacion del Formulario **/
        $validated = $request->validate([
            'provider' => ['required','string','min:4','max:50',Rule::unique('providers')->ignore($provider->id)],
            'tel_prov' => ['required','string','min:10','max:13',Rule::unique('providers')->ignore($provider->id)],
            'email_prov' => 'required|email:rfc|max:80',
        ]);

        /** Update in DB **/
        Provider::where('id', $provider->id)->update($request->except('_token', '_method'));
        return redirect()->route('provider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        $provider->delete();
        return redirect()->route('provider.index');
    }
}
