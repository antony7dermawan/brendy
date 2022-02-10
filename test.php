<?php
// Your ID and token


// ...........................................hit api jeffrey table user
            $postData = array(
                'user' => array(
                    'username' => 'botol@ayam',
                    'password' => '12345678',
                    'name' => 'botol',
                    'company_id' => '1617553966'
                )
            );

            // Setup cURL
            $ch = curl_init('https://kasir-acien.online/backend/user/register');
            curl_setopt_array($ch, array(
                CURLOPT_POST => TRUE,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_HTTPHEADER => array(
                                            'Content-Type: application/json',
                                            'Connection: Keep-Alive'
                                            ),
                CURLOPT_POSTFIELDS => json_encode($postData)
            ));

            // Send the request
            $response = curl_exec($ch);

            // Check for errors
            if ($response === FALSE) {
                die(curl_error($ch));
            }

            // Decode the response
            $responseData = json_decode($response, TRUE);

            // Close the cURL handler
            curl_close($ch);


// Print the date from the response
//echo $responseData['published'];



?>