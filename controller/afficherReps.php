<?php
    session_start();
    if(!(isset($_SESSION["id_topic"]))){
        header("Location: ../pages/home.html");
    }
    $reponse = $_GET["reps"];  
    $idtop = $_SESSION["id_topic"];
    $login = $_SESSION["login"];
    try{
        $cn = new PDO('mysql:host=localhost;dbname=my_php_db;charset=utf8','med','azerty');
    }catch(Exception $e){
        die('Erreur: '.$e->getMessage());
    }
    
    
    $result = $cn->query("select * from response");
    $rows = 0;
    if($result->fetch()){
        $rows = $result->rowCount();
    }
    
    $rows++;
    $code_rep = "rep00$rows";
    $date = date("y-m-d");
    $prep = $cn->prepare("insert into response values(:coderep,:rep,:codetop,:dater,:log)");
    $prep->execute(array('coderep'=>$code_rep,
                         'rep'=>$reponse,
                         'codetop'=>$idtop,
                         'dater'=>$date,
                         'log'=>$login));
    
    $res = $cn->query("select * from topic where code_topic='$idtop'");
    $res1 = $cn->query("select * from response r, user u where r.login=u.login and r.code_topic='$idtop'");
    $donnee = $res->fetch();
    $title = $donnee["topic"];
               
    echo '
        <article>
                                                        
            <div class="info">
                <h1>'.$title.'</h1>
                                
            </div>
        </article>
        ';
                                             
        if($res1->rowCount()>0){
            while($donnee1 = $res1->fetch()){
                $uname = $donnee1["user_name"];
                //$uname= "aaaa";
                $rep = $donnee1["response"];
                $date = $donnee1["date_rep"];
                $d = date_parse_from_format("Y-m-d", $date);
                echo '
                    <article>
                        <div class="current-date">
                            <p>'.$d["month"].'</p>
                            <p class="date">'.$d["day"].'</p>
                        </div>
                        <div class="info">
                            <h3>'.$uname.'</h3>
                            <p>'.$rep.'.</p>
                        </div>
                    </article>
                    ';
                }
        }else{
            echo '
                <article>
                                    
                    <div class="info">
                        <p>pas de reponse</p>
                                
                    </div>
                </article>
                ';
            }
                                             


