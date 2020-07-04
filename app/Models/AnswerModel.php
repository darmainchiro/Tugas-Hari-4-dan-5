<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class AnswerModel {
    public static function getAll($id) {
        $answers = DB::table('jawaban')->where('pertanyaan_id', $id)->get();
        return $answers;
    }

    public static function save($data) {
        $new_answer = DB::table('jawaban')->insert($data);
        return $new_answer;
    }

    public static function findById($id) {
        $answer = DB::table('jawaban')->where('id', $id)->first();
        return $answer;
    }

    public static function findByAnswerId($id) {
        $quest = DB::table('jawaban')->where('id', $id)->first();
        return $quest;
    }

    public static function update($id, $request) {
        $answer = DB::table('jawaban')
                        ->where('id', $id)
                        ->update([
                            'isi' => $request['isi']
                        ]);
        return $answer;
    }

    public static function destroy($id) {
        $deleted = DB::table('jawaban')->where('id', $id)->delete();
        return $deleted;
    }

}