<?php

namespace App\Services\Wiktionary;

use simplehtmldom\HtmlDocument;
class ExtractingTextService
{
    private mixed $sections;
    private HtmlDocument $html;
    private array $json;

    function __construct($response){
        $rawText = $response['parse']['text']['*'];
        $this->sections = $response['parse']['sections'];
        $this->html = (new HtmlDocument())->load($rawText);
        $this->json = [
            'sections' => [],

        ];
    }
    public function parseText(){
        $this->getSections();
        foreach ($this->json['sections'] as $key => $section){
            $this->json['sections'][$key]['html'] = $this->getSectionText($section);
        }
        //echo($this->json['sections'][2]['html'][1]->save());
        $this->cleanHtml();
        $this->htmlToString();
        //return cleaned array
    }
    private function cleanHtml(){

    }
    private function htmlToString(){

    }
    private function getTranscription(){
        //IPA class contains transcription for audio
    }
    private function getSectionText($section){
        //REWRITE
        //h3 section may contains important h4 sections!!!!!!!!!!
        //look for translations
        $sectionText = [];
        $node = $this->html->getElementById($section['anchor'])->parent();
        $nextSectionTag = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'];
        do{
            $sectionText[] = $node;
            $node = $node->next_sibling();
        }while(in_array($node->tag, $nextSectionTag) == false);
        return $sectionText;
    }
    private function getSections(){
        foreach ($this->sections as $section) {
            if($section['level'] == 3)
                $this->json['sections'][] = [
                    'anchor' => $section['linkAnchor'],
                    'title' => $section['line'],
                ];
        }
    }

}
