<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="This page includes content assisted by AI tools.">
    </head>
<body>
    <?php
    $pageContent = "";

    //Create associative array of 5 album titles as keys and random album ratings as values
    $albums = [
        "Help!" => 8, 
        "Rubber Soul" => 7, 
        "Led Zeppelin IV" => 9, 
        "Let It Bleed" => 8, 
        "Quadrophenia" => 7
    ];
    //Add the sixth album Abbey Road with a rating of 10
    $albums["Abbey Road"] = 10;
    ksort($albums);

    $pageContent .= "<h1>Favorite Albums</h1><ul>";
    foreach ($albums as $title => $rating) {
        $pageContent .= "<li>$title (Rating: $rating)</li>";
    }
    $pageContent .="</ul>";
    //Define a multidimensional array of artists, albums, and release dates
    $musicLibrary =[
        "The Beatles" => [
            ["title" => "A Hard Day's Night", "year" => 1964],
            ["title" => "Help!", "year" => 1965],
            ["title" => "Rubber Soul", "year" => 1965],
            ["title" => "Abbey Road", "year" => 1969]
        ],
        "Led Zeppelin" => [
            ["title" => "Led Zepplin IV", "year" => 1971]
        ],
        "Rolling Stones" => [
            ["title" => "Let It Bleed", "year" => 1969],
            ["title" => "Sticky Fingers", "year" => 1971]
        ],
        "The Who" => [
            ["title" => "Tommy", "year" => 1969],
            ["title" => "Quadrophenia", "year" => 1973],
            ["title" => "The Who by Numbers", "year" => 1975]
        ]
    ];
    //Concatenate the release year of "Tommy" by The Who
    $pageContent .="<p>Tommy by The Who was released in " . $musicLibrary ["The Who"][0]["year"] . "</p>";
   //Loop through the full array and add artist + album list
    $pageContent .="<h2>All Artists and Albums</h2>";
    foreach ($musicLibrary as $artist => $albums) {
        $pageContent .= "<h3>$artist</h3><ul>";
        foreach ($albums as $album) {
            $pageContent .= "<li>{$album['title']} ({$album['year']})</li>";
        }
        $pageContent .="</ul>";
    }

    //Create a loop to list all albums and release years for The Who and append
    $pageContent .="<h2>The Who Albums</h2><ul>";
    foreach ($musicLibrary["The Who"] as $album){
        $pageContent .= "<li>{$album['title']} ({$album['year']})</li>";
    }
    $pageContent .= "</ul>";

    //Loop through the array and list all albums released after 1970
    $pageContent .= "<h2>Albums Released After 1970</h2><ul>";
    foreach ($musicLibrary as $artist => $albums) {
        foreach ($albums as $album) {
            if ($album["year"] > 1970) {
                $pageContent .= "<li>{$album['title']} by $artist ({$album['year']})</li>";
            }
        }
    }
    $pageContent .= "</ul>";
    echo $pageContent;
?>