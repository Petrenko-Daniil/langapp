<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\Wiktionary\WordParsingService;

class WiktionaryParseApiController extends Controller
{
    public function parse(Request $request, WordParsingService $service){
        $word = Word::where('en', $request->input('word'))->first();
        $service->setWord($word);
        return $service->getWordData($word);

    }
}
