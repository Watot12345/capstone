
<?php
define('SUPABASE_URL', 'https://fenezpgytgeriefzbtal.supabase.co');
define('SUPABASE_KEY', 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImZlbmV6cGd5dGdlcmllZnpidGFsIiwicm9sZSI6ImFub24iLCJpYXQiOjE3ODQxOTI1MDUsImV4cCI6MjA5OTc2ODUwNX0.rEycTxSxtWbIRSx3yhMqUwPfdxvB9Ei1aQcLYaLEmh4');
define('SUPABASE_SERVICE_KEY', 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImZlbmV6cGd5dGdlcmllZnpidGFsIiwicm9sZSI6InNlcnZpY2Vfcm9sZSIsImlhdCI6MTc4NDE5MjUwNSwiZXhwIjoyMDk5NzY4NTA1fQ.HDrF1m6fcyt3mAIbq2tXFow8W7IUb-_VXmLHBqSlcoI');

class SupabaseDB {
    private $url;
    private $key;
    private $serviceKey;

    public function __construct() {
        $this->url = SUPABASE_URL;
        $this->key = SUPABASE_KEY;
        $this->serviceKey = SUPABASE_SERVICE_KEY;
    }

    public function query($table, $method = 'GET', $data = null, $filters = []) {
        $endpoint = "{$this->url}/rest/v1/{$table}";
        
        if (!empty($filters)) {
            $filterParams = [];
            foreach ($filters as $key => $value) {
                $filterParams[] = "{$key}=eq.{$value}";
            }
            $endpoint .= '?' . implode('&', $filterParams);
        }

        $headers = [
            'apikey: ' . $this->key,
            'Authorization: Bearer ' . $this->key,
            'Content-Type: application/json'
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        if ($data !== null) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        }

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode >= 400) {
            throw new Exception("Supabase API Error: HTTP {$httpCode} - {$response}");
        }

        return json_decode($response, true);
    }

    public function insert($table, $data) {
        return $this->query($table, 'POST', $data);
    }

    public function update($table, $data, $filters) {
        return $this->query($table, 'PATCH', $data, $filters);
    }

    public function delete($table, $filters) {
        return $this->query($table, 'DELETE', null, $filters);
    }

    public function select($table, $filters = []) {
        return $this->query($table, 'GET', null, $filters);
    }
}

$db = new SupabaseDB();
?>
*/