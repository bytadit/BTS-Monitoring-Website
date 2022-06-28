<?php

namespace App\Http\Controllers;

use App\Models\Monitoring;
use App\Models\Btslist;
use App\Models\Survey;
use App\Models\User;
use App\Models\Config;
// use App\Models\Status;
use App\Models\Mysurvey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MonitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.surveyor.monitoring.index', [
            'monitorings' => Monitoring::all(),
            'configs' => Config::all()->first(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.surveyor.monitoring.create', [
            'monitorings' => Monitoring::all(),
            'btslists' => Btslist::all(),
            'configs' => Config::all()->first(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Survey $survey, User $user)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'waktu_monitoring' => 'required',
            'btslist_id' => 'required'
            // 'surveyor_id' => 'required',
        ]);

        // if($request->file('foto')){
        //     $validatedData['foto'] = $request->file('foto')->store('providers-foto');
        // }

        $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        $validatedData['catatan'] = Str::limit($request->catatan, 300);
        // $validatedData['catatan'] = $request->catatan;
        Monitoring::create($validatedData);

        // $survey_btslist = Survey::find($survey->btslists());
        // $survey->btslists()->attach($btslist);

        // $btslist = Btslist::find($request->btslist_id);
        // $survey->btslists()->attach($btslist);


        $btslist = Btslist::find($request->btslist_id);
        // $survey_btslist = Survey::find($btslist->id);
        // $user->btslists()->attach($btslist);
        // $user->surveys()->attach($survey_btslist);
        // $btslist_many->surveys()->attach($category, ['file_id' => $file->id]);
        foreach ($btslist->surveys as $survey) {
            $mysurvey = new Mysurvey;
            $mysurvey->btslist_id = $request->btslist_id;
            $mysurvey->user_id = auth()->user()->id;
            $mysurvey->survey_id = $survey->id;
            // $mysurvey->mysurvey = true;
            $mysurvey->save();
            // echo $survey->name;
        }
        // return $btslist_many->surveys();
        // $provider = Provider::find($request->provider_id);
        // $btslist->providers()->attach($provider);

        // $provider = Provider::find($request->provider_id);
        // $btslist->providers()->sync($provider);

        return redirect('/dashboard/monitorings')->with('success', 'Data Monitoring telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Monitoring  $monitoring
     * @return \Illuminate\Http\Response
     */
    public function show(Monitoring $monitoring)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Monitoring  $monitoring
     * @return \Illuminate\Http\Response
     */
    public function edit(Monitoring $monitoring)
    {
        return view('dashboard.surveyor.monitoring.edit', [
            'monitoring' => $monitoring,
            'btslists' => Btslist::all(),
            'configs' => Config::all()->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Monitoring  $monitoring
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Monitoring $monitoring)
    {
        $rules = [
            'nama' => 'required|max:255',
            'waktu_monitoring' => 'required',
            'btslist_id' => 'required'
        ];

// // mengatasi masalah slug tidak bisa sama spt sebelumnya
//         if($request->slug != $post->slug){
//             $rules['slug'] = 'required|unique:posts';
//         }

        $validatedData = $request->validate($rules);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['catatan'] = Str::limit($request->catatan, 300);

        // $validatedData['catatan'] = Str::limit(strip_tags($request->catatan), 500);
        // $validatedData['catatan'] = $request->catatan;

        // if($request->file('foto')){
        //     if($request->oldFoto){
        //         Storage::delete($request->oldFoto);
        //     }
        //     $validatedData['foto'] = $request->file('foto')->store('providers-foto');
        // }

        // $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

        Monitoring::where('id', $monitoring->id)->update($validatedData);

        return redirect('/dashboard/monitorings')->with('success', 'Data Monitoring berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Monitoring  $monitoring
     * @return \Illuminate\Http\Response
     */
    public function destroy(Monitoring $monitoring)
    {
        // if($monitoring->foto){
        //     Storage::delete($monitoring->foto);
        // }

        Monitoring::destroy($monitoring->id);
        return redirect('/dashboard/monitorings')->with('success', 'Data Monitoring berhasil dihapus');
    }
}
