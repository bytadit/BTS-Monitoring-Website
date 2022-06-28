<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use App\Models\Btslist;
// use App\Models\Status;
use App\Models\Mysurvey;
use App\Models\Config;
use App\Models\Question;
use App\Models\Monitoring;
use App\Models\Offeredanswer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Survey $survey)
    {
        return view('dashboard.admin.survey.index', [
            'surveys' => Survey::all(),
            'survey' => $survey,
            'configs' => Config::all()->first(),
            // 'questions' => Question::where('survey_id', $survey->id)->get(),
            // 'offeredanswers' => Offeredanswer::where('question_id', $question->id)->get(),
            // 'offeredanswer' => $offeredanswer,
            'request' => $request
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Survey $survey, Question $question, Offeredanswer $offeredanswer)
    {
        return view('dashboard.admin.survey.create', [

            'surveys' => Survey::all(),
            'survey' => $survey,
            'configs' => Config::all()->first(),
            'questions' => Question::where('survey_id', $survey->id)->get(),
            'offeredanswers' => Offeredanswer::where('question_id', $question->id)->get(),
            'offeredanswer' => $offeredanswer,
            'request' => $request,
            'monitorings' => Monitoring::all(),
            'btslists' => Btslist::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        $survey = new Survey;
        $survey->name = $request->name;
        $survey->description = $request->description;
        // $survey->provider_id = $request->provider_id;
        // $survey->user_id = auth()->user()->id;
        $survey->save();

        $btslist = Btslist::find($request->btslist_id);
        $survey->btslists()->attach($btslist);

        // Status::where('btslist_id', $btslist)->update(['title'=>'Updated title']);
        // Mysurvey::where('btslist_id', $btslist)->update(['title'=>'Updated title']);

        // Quiestionnaire

        $this->validate($request, [
            'question.*' => 'required',
            'optionOne.*' => 'required',
            'optionTwo.*' => 'required',
            'optionThree.*' => 'required',
            'optionFour.*' => 'required',
        ]);

        foreach ($request->question as $key=>$pertanyaan) {
            $tanya = new Question;
            $tanya->question = $pertanyaan;
            $tanya->survey_id = $survey->id;
            $tanya->save();
            if($request->optionOne) {
                $satu = new Offeredanswer();
                $satu->option = $request->optionOne[$key];
                $satu->question_id = $tanya->id;
                $satu->save();
            }
            if($request->optionTwo) {
                $dua = new Offeredanswer();
                $dua->option = $request->optionTwo[$key];
                $dua->question_id = $tanya->id;
                $dua->save();
            }
            if($request->optionThree) {
                $tiga = new Offeredanswer();
                $tiga->option = $request->optionThree[$key];
                $tiga->question_id = $tanya->id;
                $tiga->save();
            }
            if($request->optionFour) {
                $empat = new Offeredanswer();
                $empat->option = $request->optionFour[$key];
                $empat->question_id = $tanya->id;
                $empat->save();
            }
        }

        $btslists = Btslist::find($request->btslist_id);
        $monitorings = Monitoring::all();

        // foreach($monitorings as $monitoring){
        //     echo $monitoring;
        // }
        // $survey_btslist = Survey::find($btslist->id);
        // $user->btslists()->attach($btslist);
        // $user->surveys()->attach($survey_btslist);
        // $btslist_many->surveys()->attach($category, ['file_id' => $file->id]);

        foreach($btslists as $btslist){
            // foreach ($btslist->surveys as $survey) {
            //     $status = new Status;
            //     $status->btslist_id = $btslist->id;
            //     $status->user_id = auth()->user()->id;
            //     $status->survey_id = $survey->id;
            //     // $status->status = true;
            //     $status->save();
            //     // echo $survey->name;
            // }

            foreach ($monitorings->where('btslist_id', $btslist->id) as $monitoring) {
                $mysurvey = new Mysurvey;
                $mysurvey->btslist_id = $btslist->id;
                $mysurvey->user_id = $monitoring->user_id;
                $mysurvey->survey_id = $survey->id;
                // $mysurvey->mysurvey = true;
                $mysurvey->save();
                // echo $survey->name;
            }
        }

        return redirect('/dashboard/surveys')->with('success', 'Survey Baru Berhasil Dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function show(Survey $survey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function edit(Survey $survey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Survey $survey)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function destroy(Survey $survey, Question $question, Request $request)
    {
        $questions = Question::all();
        // destroy offered answers by question_id
        foreach($questions->where('survey_id', $survey->id) as $questionlist){
            Offeredanswer::where('question_id', $questionlist->id)->delete();
        }
        // destroy questions by survey_id
        Question::where('survey_id', $survey->id)->delete();
        // destroy survey by id
        Survey::destroy($survey->id);

        // Status::where('survey_id', $survey->id)->delete();
        Mysurvey::where('survey_id', $survey->id)->delete();

        // DB::delete('delete from btslist_survey where survey_id = ?',[$survey->id]);
        // DB::table('btslist_survey')->where('survey_id', '=', $survey->id)->delete();
        $btslist = Btslist::find($request->btslist_id);
        $survey->btslists()->detach($btslist);
        // $surveys = Survey::find($survey->id);

        return redirect('/dashboard/surveys')->with('success', 'Survey telah dihapus');
    }
}
