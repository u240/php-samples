<?php
/**
* Copyright 2022 Google Inc.
*
* Licensed under the Apache License, Version 2.0 (the "License");
* you may not use this file except in compliance with the License.
* You may obtain a copy of the License at
*
* http://www.apache.org/licenses/LICENSE-2.0
*
* Unless required by applicable law or agreed to in writing, software
* distributed under the License is distributed on an "AS IS" BASIS,
* WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
* See the License for the specific language governing permissions and
* limitations under the License.
*/
// [START drive_create_team_drives]
use Google\Client;
use Google\Service\Drive;
use Google\Service\Drive\TeamDrive;
use Ramsey\Uuid\Uuid;
function createTeamDrive()
{
    try {
        $client = new Client();
        $client->useApplicationDefaultCredentials();
        $client->addScope(Drive::DRIVE);
        $driveService = new Drive($client);
        $teamDriveMetadata = new TeamDrive(array(
            'name' => 'Project Resources'));
        $requestId = Uuid::uuid4()->toString();
        $teamDrive = $driveService->teamdrives->create($requestId, $teamDriveMetadata, array(
            'fields' => 'id'));
        printf("Team Drive ID: %s\n", $teamDrive->id);
        return $teamDrive->id;

    } catch(Exception $e) {

        echo "Error Message: ".$e;
    }
   
}
// [END drive_create_team_drives]
require_once 'vendor/autoload.php';
createTeamDrive();