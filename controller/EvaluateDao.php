<?php
require_once ('../beans/Evaluate.php');
require_once ('../model/EvaluateService.php');
$type = $_POST['type'];
$service = new EvaluateService();

switch ($type) {
    // 查找
    case 'select':
        $userID = $_POST['userID'];
        $service->selectEvaluate($userID);
        break;
    // 添加
    case 'insert':
        $userID = $_POST['userID'];
        $goodID = $_POST['goodID'];
        $content = $_POST['content'];
        $date = $_POST['date'];
        $evaluate = new Evaluate($userID, $goodID, $content, $date);
        $service->insertEvaluate($evaluate);
        break;
}
