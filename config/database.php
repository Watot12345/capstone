
<?php
define('SUPABASE_URL', 'YOUR_SUPABASE_URL');
define('SUPABASE_KEY', 'YOUR_SUPABASE_ANON_KEY');
define('SUPABASE_SERVICE_KEY', 'YOUR_SUPABASE_SERVICE_ROLE_KEY');

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