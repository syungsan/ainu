<?php

namespace App\Http\Controllers\Ainu01;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Ainu01TodayChallengeController extends Controller
{
    //
    public function index()
    {
        $current_point = \Auth::user()->status->ainu01_practice_count + 1;
        \Auth::user()->status()->update(["ainu01_practice_count" => $current_point]);

        return view('ainu01/ainu01_today_challenge');
    }

    public function create(Request $request)
    {
        \Auth::user()->ainu01_scores()->create([
            "user_id" => \Auth::id(),
            "type" => "today_challenge",
        ]);
    }

    public function update(Request $request)
    {
        //
        foreach ($request->input() as $key => $val) {

            \Auth::user()->ainu01_scores()->where("type", "today_challenge")->latest()->first()->update([$key => $val]);

            if ($key == "quiz_point") {
                $this->updateStatus($request->input()["quiz_point"]);
            }
        }
    }

    public function updateStatus(int $quiz_point) {

        $current_point = \Auth::user()->status->ainu01_total_quiz_point + $quiz_point;
        \Auth::user()->status()->update(["ainu01_total_quiz_point" => $current_point]);

        if ($current_point >= 0 && $current_point < 100) {
            \Auth::user()->status()->update(["ainu01_cognomen" => "初心者ぺー"]);
        }
        elseif ($current_point >= 100 && $current_point < 200) {
            \Auth::user()->status()->update(["ainu01_cognomen" => "モブ"]);
        }
        elseif ($current_point >= 200 && $current_point < 300) {
            \Auth::user()->status()->update(["ainu01_cognomen" => "インフルエンサー"]);
        }
        elseif ($current_point >= 300) {
            \Auth::user()->status()->update(["ainu01_cognomen" => "神"]);
        }
    }
}
