<?php 

require "../vendor/autoload.php";

$router = new \Bramus\Router\Router();
$dotenv = Dotenv\Dotenv::createImmutable("../")->load();



/**
 * ? TABLA campers
 *  */
/**
 *  ! GET
 */
$router -> get("/camper",function(){

    $cox = new \App\connect();
    $res = $cox->con->prepare("SELECT * FROM campers");
    $res -> execute();
    $res = $res -> fetchAll(\PDO::FETCH_ASSOC);
    echo json_encode($res);
});
/**
 *  ! POST
 */
$router->post("/camper", function() {
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $cox = new \App\connect();
    $res = $cox->con->prepare("INSERT INTO campers (idCamper, nombreCamper, apelllidoCamper, fechaNac, idReg) VALUES (:idCamper, :nombreCamper, :apelllidoCamper, :fechaNac, :idReg)");
    $res->bindValue('idCamper', $_DATA["idCamper"]);
    $res->bindValue('nombreCamper', $_DATA["nombreCamper"]);
    $res->bindValue('apelllidoCamper', $_DATA["apelllidoCamper"]);
    $res->bindValue('fechaNac', $_DATA["fechaNac"]);
    $res->bindValue('idReg', $_DATA["idReg"]);
    $res->execute();
    $rowCount = $res->rowCount();
    echo json_encode($rowCount);
});

/**
 *  ! PUT
 */
$router->put("/camper/{id}", function($id) {
    $_DATA = json_decode(file_get_contents("php://input"),true);
    $cox = new \App\connect();
    $res = $cox->con->prepare("UPDATE campers SET  idCamper = :idCamper,nombreCamper = :nombreCamper,apelllidoCamper = :apelllidoCamper,fechaNac = :fechaNac,idReg = :idReg WHERE id = :ID");
    $res -> bindValue('idCamper', $_DATA["idCamper"]);
    $res -> bindValue('nombreCamper', $_DATA["nombreCamper"]);
    $res -> bindValue('apelllidoCamper', $_DATA["apelllidoCamper"]);
    $res -> bindValue('fechaNac', $_DATA["fechaNac"]);
    $res -> bindValue('idReg', $_DATA["idReg"]);
    $res -> bindValue('ID', $id);
    $res -> execute();
    $res = $res->rowCount();
    echo json_encode($res);
});
/**
 *  ! DELETE
 */
$router->delete("/camper/{id}", function($id){
    $_DATA = json_decode(file_get_contents("php://input"),true);
    $cox = new \App\connect();
    $res = $cox->con->prepare("DELETE FROM campers WHERE id=:ID");
    $res -> bindValue('ID', $id);
    $res -> execute();
    $res = $res->rowCount();
    echo json_encode($res);
});



/**
 * ? TABLA region
 *  
 * */
/**
 *  ! GET
 */
$router -> get("/reg",function(){

    $cox = new \App\connect();
    $res = $cox->con->prepare("SELECT region.nombreReg,departamento.nombreDep FROM region INNER JOIN departamento ON region.idDep = departamento.idDep");
    $res -> execute();
    $res = $res -> fetchAll(\PDO::FETCH_ASSOC);
    echo json_encode($res);
});
/**
 *  ! POST
 */
$router->post("/reg", function() {
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $cox = new \App\connect();
    $res = $cox->con->prepare("INSERT INTO region (idReg, nombreReg, idReg) VALUES (:idReg, :nombreReg, :idReg)");
    $res->bindValue('idReg', $_DATA["idReg"]);
    $res->bindValue('nombreReg', $_DATA["nombreReg"]);
    $res->bindValue('idReg', $_DATA["idReg"]);
    $res->execute();
    $rowCount = $res->rowCount();
    echo json_encode($rowCount);
});

/**
 *  ! PUT
 */
$router->put("/reg/{id}", function($id) {
    $_DATA = json_decode(file_get_contents("php://input"),true);
    $cox = new \App\connect();
    $res = $cox->con->prepare("UPDATE region SET  idReg = :idReg,nombreReg = :nombreReg,idReg = :idReg WHERE id = :ID");
    $res -> bindValue('idReg', $_DATA["idReg"]);
    $res -> bindValue('nombreReg', $_DATA["nombreReg"]);
    $res -> bindValue('idReg', $_DATA["idReg"]);
    $res -> bindValue('ID', $id);
    $res -> execute();
    $res = $res->rowCount();
    echo json_encode($res);
});
/**
 *  ! DELETE
 */
$router->delete("/reg/{id}", function($id){
    $_DATA = json_decode(file_get_contents("php://input"),true);
    $cox = new \App\connect();
    $res = $cox->con->prepare("DELETE FROM region WHERE id=:ID");
    $res -> bindValue('ID', $id);
    $res -> execute();
    $res = $res->rowCount();
    echo json_encode($res);
});


/**
 * ? TABLA departamento
 *  
 * */
/**
 *  ! GET
 */
$router -> get("/dep",function(){

    $cox = new \App\connect();
    $res = $cox->con->prepare("SELECT * FROM departamento");
    $res -> execute();
    $res = $res -> fetchAll(\PDO::FETCH_ASSOC);
    echo json_encode($res);
});
/**
 *  ! POST
 */
$router->post("/dep", function() {
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $cox = new \App\connect();
    $res = $cox->con->prepare("INSERT INTO departamento (idDep, nombreDep, idPais) VALUES (:idDep, :nombreDep, :idPais)");
    $res->bindValue('idDep', $_DATA["idDep"]);
    $res->bindValue('nombreDep', $_DATA["nombreDep"]);
    $res->bindValue('idPais', $_DATA["idPais"]);
    $res->execute();
    $rowCount = $res->rowCount();
    echo json_encode($rowCount);
});

/**
 *  ! PUT
 */
$router->put("/dep/{id}", function($id) {
    $_DATA = json_decode(file_get_contents("php://input"),true);
    $cox = new \App\connect();
    $res = $cox->con->prepare("UPDATE departamento SET  idPais = :idPais,nombreDep = :nombreDep,idPais = :idPais WHERE id = :ID");
    $res -> bindValue('idPais', $_DATA["idPais"]);
    $res -> bindValue('nombreDep', $_DATA["nombreDep"]);
    $res -> bindValue('idPais', $_DATA["idPais"]);
    $res -> bindValue('ID', $id);
    $res -> execute();
    $res = $res->rowCount();
    echo json_encode($res);
});
/**
 *  ! DELETE
 */
$router->delete("/dep/{id}", function($id){
    $_DATA = json_decode(file_get_contents("php://input"),true);
    $cox = new \App\connect();
    $res = $cox->con->prepare("DELETE FROM departamento WHERE id=:ID");
    $res -> bindValue('ID', $id);
    $res -> execute();
    $res = $res->rowCount();
    echo json_encode($res);
});


/**
 * ? TABLA pais
 *  
 * */
/**
 *  ! GET
 */
$router -> get("/pais",function(){

    $cox = new \App\connect();
    $res = $cox->con->prepare("SELECT * FROM pais");
    $res -> execute();
    $res = $res -> fetchAll(\PDO::FETCH_ASSOC);
    echo json_encode($res);
});
/**
 *  ! POST
 */
$router->post("/pais", function() {
    $_DATA = json_decode(file_get_contents("php://input"), true);
    $cox = new \App\connect();
    $res = $cox->con->prepare("INSERT INTO pais (idPais, nombrePais) VALUES (:idPais, :nombrePais)");
    $res->bindValue('idPais', $_DATA["idPais"]);
    $res->bindValue('nombrePais', $_DATA["nombrePais"]);
    $res->execute();
    $rowCount = $res->rowCount();
    echo json_encode($rowCount);
});

/**
 *  ! PUT
 */
$router->put("/pais/{id}", function($id) {
    $_DATA = json_decode(file_get_contents("php://input"),true);
    $cox = new \App\connect();
    $res = $cox->con->prepare("UPDATE pais SET  idPais = :idPais,nombrePais = :nombrePais WHERE id = :ID");
    $res -> bindValue('idPais', $_DATA["idPais"]);
    $res -> bindValue('nombrePais', $_DATA["nombrePais"]);
    $res -> execute();
    $res = $res->rowCount();
    echo json_encode($res);
});
/**
 *  ! DELETE
 */
$router->delete("/pais/{id}", function($id){
    $_DATA = json_decode(file_get_contents("php://input"),true);
    $cox = new \App\connect();
    $res = $cox->con->prepare("DELETE FROM pais WHERE id=:ID");
    $res -> bindValue('ID', $id);
    $res -> execute();
    $res = $res->rowCount();
    echo json_encode($res);
});


$router->run();