<?php

$app->get('/api/volunteer', function ($request, $response, $args) {  //GET example

    $pdo =$this->pdo;
    $selectStatement = $pdo->select()
                            ->from('volunteer');
	$stmt = $selectStatement->execute();
	$volunteers= $stmt->fetchAll();

	$res['success'] = true;
	$res['data'] = $volunteers;
	$response->write(json_encode($res));
	$pdo = null;
	return $response;
});

// demo of insert
$app->post('/api/volunteer', function ($request, $response, $args) { //POST example

 	$pdo =$this->pdo;
	$params = $request->getParsedBody();
	$id = $params['id'];
	$name = $params['name'];
	$email = $params['email'];
	$pwd = $params['pwd'];
	$phone = $params['phone'];
	$bday = $params['bday'];
	$org = $params['org'];


    $insertStatement = $pdo->insert(array('vol_id', 'vol_name', 'vol_email', 'vol_pwd', 'vol_phone', 'vol_bday', 'vol_org'))
								->into('volunteer')
								->values(array($id, $name, $email, $pwd, $phone, $bday, $org));
    $insert =  $insertStatement->execute();

	$res['insert'] = $insert; // id of the record
	$res['status'] = 'success';
	$response->write(json_encode($res));
	$pdo = null;
	return $response;
});

// demo of delete
$app->post('/api/delete_volunteer', function ($request, $response, $args) { //POST example

	$pdo =$this->pdo;
   $params = $request->getParsedBody();
   $id = $params['id'];

   $deleteStatement = $pdo->delete()
						->from('contact')
						->where('id', '=', $id);
   $delete =  $deleteStatement->execute();

   $res['delete'] = $delete; // no of rows affected

   $res['status'] = 'success';
   $response->write(json_encode($res));
   
   $pdo = null;
   return $response;
});

?>
