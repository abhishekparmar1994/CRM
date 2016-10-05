<?php
// Routes

$app->group('/systemupgrade', function () {

  $this->get('/downloadLatestRelease', function () {
    $upgradeFile = $this->SystemService->downloadLatestRelease();
    echo json_encode($upgradeFile);
  });

  $this->post('/doUpgrade', function ($request, $response, $args) {
    $input = (object)$request->getParsedBody();
    $this->SystemService->doUpgrade($input->fullPath,$input->sha1);
  });
});
