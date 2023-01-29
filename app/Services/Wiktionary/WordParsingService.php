<?php
namespace App\Services\Wiktionary;
use App\Models\WordSound;
use Illuminate\Support\Facades\Http;
use App\Services\Wiktionary\ExtractingTextService;



class WordParsingService
{

    private $word;
    /**
     * @param mixed $word
     */
    public function setWord($word): void
    {
        $this->word = $word;
    }

    public function getWordData(){
        $response = Http::get('https://en.wiktionary.org/w/api.php', [
            'action' => 'parse',
            'page' => $this->word->en,
            'format' => 'json'
        ]);
        //$this->getSoundsUrls($response->json()['parse']['images']);
        $this->getWordHtml($response->json());
    }
    private function getSoundsUrls($images){
        foreach ($images as $image){
            if(pathinfo($image, PATHINFO_EXTENSION) == "ogg"){
                $this->getSoundUrl($image);
            }
        }
    }
    private function getSoundUrl($sound){
        $response = Http::get('https://en.wiktionary.org/w/api.php', [
            'action' => 'query',
            'titles' => 'File:'.$sound,
            'prop' => 'imageinfo',
            'iiprop' => 'url',
            'format' => 'json',
        ]);
        $wordSound = new WordSound;
        $wordSound->url = $response->json()['query']['pages'][-1]['imageinfo'][0]['url'];
        $wordSound->word_id = $this->word->id;
        $wordSound->save();
    }
    private function getWordHtml($response){
        $extractingTextService = new ExtractingTextService($response);
        $extractedData = $extractingTextService->parseText();

    }
}
