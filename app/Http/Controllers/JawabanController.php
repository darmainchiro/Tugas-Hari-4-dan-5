<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestModel;
use App\Models\AnswerModel;

class JawabanController extends Controller
{
    public function index(){
        $answers = AnswerModel::getAll();
        return view('larahub.index', compact('answers'));
    }

    public function create($id){
        $quest = QuestModel::findById($id);

        return view('larahub.formanswer',compact('quest'));
    }
    
    public function store(Request $request){
        // dd($request->all());
        $data = $request->all();
        unset($data["_token"]);
        $question = AnswerModel::save($data);
        if($question){
            return redirect('/pertanyaan/'.$request->pertanyaan_id);
        }
    }

    public function show($id){
        $answer = AnswerModel::findById($id);

        return view('larahub.show', compact('quest'));
    }

    public function edit($id){
        $answer = AnswerModel::findById($id);
        return view('larahub.editanswer', compact('answer'));
    }

    public function update($id, Request $request){
        $quest = AnswerModel::findByAnswerId($id);
        $answer = AnswerModel::update($id, $request->all());

        return redirect('/pertanyaan/'.$quest->pertanyaan_id);
    }

    public function destroy($id){
        $quest = AnswerModel::findByAnswerId($id);
        $answer = AnswerModel::destroy($id);

        return redirect('/pertanyaan/'.$quest->pertanyaan_id);
    }
}
