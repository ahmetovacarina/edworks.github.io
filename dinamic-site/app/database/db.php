<?php

session_start();
require 'connect.php';

function tt($value){
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    exit();
}
// проверка выполнения запроса к БД
function dbCheckError($query){
    $errInfo = $query->errorInfo();
    if ($errInfo[0] !== PDO::ERR_NONE) {
        echo $errInfo[2];
        exit();
    }
    return true;
}

// Запрос на получение данных c одной таблицы
function selectAll($table, $params = []){
    global $pdo;
    $sql = "SELECT * FROM $table";

    if(!empty($params)){
        $i = 0;
        foreach ($params as $key => $value){
            if(!is_numeric($value)){
                $value = "'".$value."'";
            }
            if ($i === 0){
                $sql = $sql . " WHERE $key=$value";
            }else{
                $sql = $sql . " AND $key=$value";
            }
            $i++;
        }
    }

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}


// Запрос на получение одной строки с выбранной таблицы
function selectOne($table, $params = []){
    global $pdo;
    $sql = "SELECT * FROM $table";

    if(!empty($params)){
        $i = 0;
        foreach ($params as $key => $value){
            if(!is_numeric($value)){
                $value = "'".$value."'";
            }
            if ($i === 0){
                $sql = $sql . " WHERE $key=$value";
            }else{
                $sql = $sql . " AND $key=$value";
            }
            $i++;
        }
    }

    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetch();
}

// Запись в таблицу БД
function insert($table, $params){
    global $pdo;
    $i = 0;
    $coll = '';
    $mask = '';
    foreach ($params as $key => $value){
        if($i === 0){
            $coll = $coll . "$key";
            $mask = $mask ."'" . "$value" . "'";
        }else{
            $coll = $coll . ", $key";
            $mask = $mask .", '" . "$value" . "'";
        }
        $i++;
    }

    $sql = "INSERT INTO $table ($coll) VALUES ($mask)";

    $query = $pdo->prepare($sql);
    $query->execute($params);
    dbCheckError($query);
    return $pdo->lastInsertId();
}

// Обновление строки в таблице БД
function update($table, $id, $params){
    global $pdo;
    $i = 0;
    $str = '';
    foreach ($params as $key => $value){
        if($i === 0){
            $str = $str . $key . " = '" . $value . "'";
        }else{
            $str = $str .", " . $key . " = '" . $value . "'";
        }
        $i++;
    }
    $sql = "UPDATE $table SET $str WHERE id = $id";
    $query = $pdo->prepare($sql);
    $query->execute($params);
    dbCheckError($query);
}

// Удаление строки в таблице БД
function delete($table, $id){
    global $pdo;

    $sql = "DELETE FROM $table WHERE id =" . $id;
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
}
//выборка постов (posts) с автором в админку
function selectAllFromPostsWithUsers ($table1, $table2){
    global $pdo;
    $sql = "SELECT
    t1.id,
    t1.title,
    t1.img,
    t1.content,
    t1.status,
    t1.id_topic,
    t1.created_date,
    t2.username
    FROM $table1 AS t1 JOIN $table2 AS t2 ON t1.id_user = t2.id
    ";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}


//выборка постов (posts) с автором на главную
function selectAllFromPostsWithUsersOnIndex ($table1, $table2, $limit, $offset){
    global $pdo;
    $sql = " SELECT p.*, u.username FROM $table1 AS p JOIN $table2 AS u ON p.id_user = u.id WHERE p.status=1 LIMIT $limit OFFSET $offset";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

//выборка постов (posts) в слайд-шоу на главную
function selectTopTopicFromPostsOnIndex ($table1){
    global $pdo;
    $sql = " SELECT * FROM $table1 WHERE id_topic = 1";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

//выборка одного поста (posts) с автором на отдельную страницу (single)
function selectPostFromPostsWithUsersOnSingle($table1, $table2, $id){
    global $pdo;
    $sql = " SELECT p.*, u.username FROM $table1 AS p JOIN $table2 AS u ON p.id_user = u.id WHERE p.id=$id";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetch();
}

// Поиск по заголовкам и содержимому (примитивный)
function searchInTitleAndContent ($text, $table1, $table2){
    $text = trim(strip_tags(stripcslashes(htmlspecialchars($text))));
    global $pdo;
    $sql = " SELECT 
        p.*, u.username 
        FROM $table1 AS p 
        JOIN $table2 AS u 
        ON p.id_user = u.id 
        WHERE p.status=1
        AND p.title LIKE '%$text%' OR p.content LIKE '%$text%'";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}

//Запрос на получение данных с двух таблиц чтобы было имя в полученной информации 
function selectAllAndUsersNames($table1, $param, $table2){
    global $pdo; //обращение к глобальной переменной
    $sql = "SELECT p.*, u.username FROM $table1 AS p JOIN $table2 AS u ON p.id_user = u.id
    WHERE p.id_topic = $param";    

    $query = $pdo->prepare($sql);
    $query->execute();    
    dbCheckError($query);
    return $query->fetchAll();
}

//пагинация
function countRow($table){
    global $pdo; 
    $sql = "SELECT COUNT(*) FROM $table WHERE status = 1";    
    $query = $pdo->prepare($sql);
    $query->execute();    
    dbCheckError($query);
    return $query->fetchColumn();
}


//выборка заказов (orders) в админку
function selectAllFromOrders ($table1, $table2){
    global $pdo;
    $sql = "SELECT
    t1.id,
    t1.name,
    t1.email,
    t1.phone,
    t1.object,
    -- t1.topic,
    t1.sum,
    t1.length,
    t1.width,
    t1.price,
    t1.img,
    t1.comment,
    t1.status,
    t1.created_date
    -- t2.name
    FROM $table1 AS t1 JOIN $table2 AS t2 ON t1.topic = t2.id
    ";
    $query = $pdo->prepare($sql);
    $query->execute();
    dbCheckError($query);
    return $query->fetchAll();
}
