<?php

namespace App\Http\Controllers\AI;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AIController extends Controller {
    public function generateOpportunityDescription(Request $request) {
        $contents = $this->buildSystemInstructions();
        $contents[] = [
            "role" => "user",
            "parts" => [
                [
                    "text" => $request->input('query', "Currently respond with this: 'Please provide a valid query...'"),
                ]
            ]
        ];

        $payload = ["contents" => $contents];
        $apiResponse = $this->sendRequest($payload);

        $aiResponse = $apiResponse['candidates'][0]['content']['parts'][0]['text'] ?? '<p>asd Failed to generate response Kindly contact <strong>(developerusman@yahoo.com) asd </strong> the devs <i>alsjd hals</i> for any issue!</p>';

        return response()->json([
            "success" => isset($apiResponse['candidates']),
            "message" => isset($apiResponse['candidates']) ? "Response generated successfully.":"Failed to generate response.",
            "data" => [
                "response" => $aiResponse
            ]
        ]);
    }

    private function buildSystemInstructions(): array {
        return [
            [
                "role" => "user",
                "parts" => [
                    ["text" => "You are an AI assistant specialized in creating structured project proposals and student opportunity descriptions.
                    Your task is to format the user's idea into a structured and detailed project proposal.

                    **Response Format Guidelines:**
                    - Use **HTML** elements for formatting.
                    - Provide a clear and engaging **title** (`<h2>`).
                    - Start with an **overview** (`<p>`).
                    - Use **headings** (`<h3>`) for sections like:
                        - Project Goals
                        - Responsibilities
                        - Required Skills
                        - Application Process
                    - Present key details using **bullet points (`<ul>`)** and **numbered lists (`<ol>`)**.
                    - Ensure that the proposal includes:
                        - A **description of the problem or opportunity**.
                        - Expected **outcomes or impact**.
                        - Required **skills and qualifications**.
                        - Any relevant **deadlines or next steps**.

                    **Example Structure:**
                    <h2>Project Title</h2>
                    <p>Short introduction...</p>
                    <h3>Project Goals</h3>
                    <ul>
                        <li>Goal 1</li>
                        <li>Goal 2</li>
                    </ul>
                    <h3>Required Skills</h3>
                    <ul>
                        <li>Skill 1</li>
                        <li>Skill 2</li>
                    </ul>
                    <h3>Application Process</h3>
                    <p>Details on how to apply...</p>
                    Maintain a professional yet engaging tone, ensuring the response is **easily editable** by the user.
                    Do no enclose the response in the ```html and ```
                    The response must be as such as written by a Computer science student for others students"]
                ]
            ]
        ];
    }

    private function sendRequest(array $payload): array {
        $apiUrl = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=" . config('gemini.api_key');

        $ch = curl_init($apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($payload));

        $response = curl_exec($ch);
        curl_close($ch);

        return json_decode($response, true) ?? [];
    }
}
