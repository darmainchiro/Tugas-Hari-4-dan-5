<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;

class QuestModel {
    public static function getAll() {
        $quests = DB::table('pertanyaan')->get();
        return $quests;
    }

    public static function save($data) {
        $new_quest = DB::table('pertanyaan')->insert($data);
        return $new_quest;
    }

    public static function findById($id) {
        $quest = DB::table('pertanyaan')->where('id', $id)->first();
        return $quest;
    }

    public static function update($id, $request) {
        $quest = DB::table('pertanyaan')
                        ->where('id', $id)
                        ->update([
                            'judul' => $request['judul'],
                            'isi' => $request['isi']
                        ]);
        return $quest;
    }

    public static function destroy($id) {
        $deleted = DB::table('pertanyaan')->where('id', $id)->delete();
        return $deleted;
    }

}