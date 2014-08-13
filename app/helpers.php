<?php



// My common functions
function clean_my_html($html = '', $tags='<ul><sup><li><ol><b><p><strong><br><table><td><th><tr><tbody><i><div><img><a><span><h1><h2><h3><h4><h5><h6>'){

	$cleaned = str_replace('<br />', '<br>', $html);
	$cleaned = str_replace('<br/>', '<br>', $cleaned);
	return strip_tags($cleaned, $tags);

}





function wrap_my_html($text){
    $dom = new DomDocument('4.0');
    $dom->encoding = 'utf-8';
    libxml_use_internal_errors(true);
    //$dom->loadHTML(utf8_decode($test_html));
    $dom->loadHTML($text);
    $xp = new DOMXPath($dom);
    $xpath = '//text()';
    $array = array();
    foreach ($xp->query($xpath) as $node) {
        $node_text = $node->nodeValue;
        $array[] = $node_text;
        //parse text into array of chunks
        $text_array = preg_split('/(\w*)/', $node_text, NULL, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);

        $frag = $dom->createDocumentFragment();
        foreach ($text_array as $array_chunk) {
            if (preg_match('/(^[a-zA-Z0-9])/', $array_chunk)) {
                $element = $frag->appendChild($dom->createElement('w', utf8_encode($array_chunk)));
//              $element = $frag->appendChild($dom->createElement('w', $array_chunk));
			}
            else {
               $element = $frag->appendChild($dom->createElement('z', utf8_encode($array_chunk)));
//             $element = $frag->appendChild($dom->createElement('z', $array_chunk));
			}
        }
        $node->parentNode->replaceChild($frag, $node);
    }
	$cleaned = $dom->saveHTML();

	$cleaned = str_replace("&Acirc;",' ', $cleaned);
	return $cleaned;
}



?>