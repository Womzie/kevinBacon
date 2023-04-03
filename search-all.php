<?php
    include_once("common.php");

    
    $db = connectToDatabase();
    getHeader();

    $fName = getFirstName();
    $lName = getLastName();

      

    getMovies($db, $fName, $lName);
    getInputBoxes();
        getFooter();

    function getMovies($db, $fName, $lName){
        try{
            
            $stmt = $db->prepare('
            SELECT a.first_name, a.last_name, m.name, m.year
            FROM movies m
            JOIN roles r1 on m.id = r1.movie_id
            JOIN actors a on a.id = r1.actor_id
            Where (a.first_name LIKE :fName and a.last_name=:lName)
            ORDER BY m.year DESC;');
            $data=array(":fName"=>$fName."%", ":lName"=>$lName);
            $stmt->execute($data);
            $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if($movies){
                echo "<h1>Results for $fName $lName</h1>"; 
                $i = 1;
                echo "<table id=\"movies\">";
                echo "<tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Year</th>
                  </tr>";
                 foreach($movies as $movie){
                    
                    echo "<tr>
                    <td>$i</td>\n
                    <td>".$movie["name"]."</td>\n
                    <td>".$movie["year"]."</td>\n
                    </tr>";
                    
                    $i++;
                //}
                
            }   
            echo "<table>";
            }
            else{
                echo "<h1> There are no results for $fName $lName";
            }
            

        } catch (Exception $e) {
            
            return false;
        }
    }

        
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Movie Database (MyMDb)</title>
    <meta charset="utf-8" />
    <link href="images/favicon.png" type="image/png" rel="shortcut icon" />
    <!-- Link to your CSS file that you should edit -->
    <link href="bacon.css" type="text/css" rel="stylesheet" />
    </head>
</html>
