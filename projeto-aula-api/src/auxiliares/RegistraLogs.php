<?php

namespace App\auxiliares;


class RegistraLogs
{
    public function logRequest($request, $response)
    {
        $logsTable = \Cake\ORM\TableRegistry::getTableLocator()->get('logs');
        $log = $logsTable->newEmptyEntity();

        $log->method = $request->getMethod();
        $log->endpoint = $request->getRequestTarget();
        $log->request_body = $request->getBody()->getContents();

        $logsTable->save($log);
    }
}
