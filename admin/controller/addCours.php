<?php
    require_once '../Classes/Course.php';
    //$id = $_POST['id'];
    
    $level = $_POST['r1'];
    $des = $_POST['desc'];
     if($_FILES['file']['name']!=""){
         move_uploaded_file($_FILES['file']['tmp_name'], '../CoursesPDF/'. basename($_FILES['file']['name']));
         //echo "file uploaded";
    }else{
        echo "no file to upload";
    }
    $path = basename($_FILES['file']['name']);
    
    $cr = new Course();
    
    $res = $cr->findAll();
    if($res->fetch()){
        $i = $res->rowCount();
        $i++;
    }else{
        $i = 1;
    }
    $id = "cr$level$i";
    
    $cr->setId($id);
    $cr->setLevel($level);
    $cr->setPath($path);
    $cr->setDes($des);
    $cr->addCourse();
    header("Location: ../pages/courses.html");
    //echo "course added";

