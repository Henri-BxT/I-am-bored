<?php
    function fetchJSON($apiUrl){
        $ch = curl_init($apiUrl);
        $headers[] = 'Connection: Keep-Alive'; 
        $headers[] = 'Content-type: text/plain;charset=UTF-8'; 
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 
        curl_setopt($ch, CURLOPT_HEADER, 0); 
        curl_setopt($ch, CURLOPT_TIMEOUT, 0); 
        curl_setopt($ch, CURLOPT_ENCODING , 'deflate');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($ch, CURLOPT_VERBOSE, 1); 
        $json = curl_exec($ch);
        curl_close($ch);
            
        // Decode the JSON response
        $data = json_decode($json, true);
            
        return $data;
    }

    function summarise_titles($objs){
                
        for($t=0; $t<6; $t++){
            // In each "list" of results we only want to return titles so ignore other results such as actors, characters etc.
            
            // Title
            $s['title'] = $objs['Title'];
                    
            // Released
            $s['released'] = $objs['Released'];
                    
            // Poster
            $s['image'] = $objs['Poster'];

            // Plot
            $s['plot'] = $objs['Plot'];

            // Director
            $s['director'] = $objs['Director'];

            // Comma-seperated list of actors
            $actor = explode(", ", $objs['Actors']);
            $s['actors'] = $actor;
                    
            // Type
            $genre = explode(", ", $objs['Genre']);
            $s['type'] = $genre;
        }
        
        return $s;
    }

    function find_by_title($title){
        $requestURL = "http://www.omdbapi.com/?apikey=33348164&t=".$title."&plot=full";		
        $json = fetchJSON($requestURL);
        
        //$results = $json->data->results;
        $matches = array();
            
        $matches = summarise_titles($json);
        
        return $matches;
    }
?>
