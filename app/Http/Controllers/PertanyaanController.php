<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestModel;
use App\Models\AnswerModel;

class PertanyaanController extends Controller
{
    public function index(){
        $quests = QuestModel::getAll();
        return view('larahub.index', compact('quests'));
    }

    public function create(){
        return view('larahub.formquest');
    }
    
    public function store(Request $request){
        // dd($request->all());
        $data = $request->all();
        unset($data["_token"]);
        $question = QuestModel::save($data);
        if($question){
            return redirect('/pertanyaan');
        }
    }

    public function show($id){
        $quest = QuestModel::findById($id);
        $answers = AnswerModel::getAll($id);

        return view('larahub.show', compact(['quest','answers']));
    }

    public function edit($id){
        $quest = QuestModel::findById($id);

        return view('larahub.edit', compact('quest'));
    }

    public function update($id, Request $request){
        $quest = QuestModel::update($id, $request->all());

        return redirect('/pertanyaan');
    }

    public function destroy($id){
        $quest = QuestModel::destroy($id);

        return redirect('/pertanyaan');
    }

}
