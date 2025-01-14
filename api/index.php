<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

require_once 'vendor/autoload.php';
use Symfony\Component\Yaml\Yaml;

try {
    $yamlContent = file_get_contents('https://raw.githubusercontent.com/blinko-space/blinko-hub/main/site.yml');
    $data = Yaml::parse($yamlContent);
    
    $result = $data['sites'];
    
    // Filter by tag
    if (isset($_GET['tag'])) {
        $result = array_filter($result, function($site) {
            return in_array($_GET['tag'], $site['tags']);
        });
    }
    
    // Filter by category
    if (isset($_GET['category'])) {
        $result = array_filter($result, function($site) {
            return strcasecmp($site['category'], $_GET['category']) === 0;
        });
    }
    
    // Search
    if (isset($_GET['q'])) {
        $q = strtolower($_GET['q']);
        $result = array_filter($result, function($site) use ($q) {
            return strpos(strtolower($site['title']), $q) !== false ||
                   strpos(strtolower($site['description']), $q) !== false ||
                   array_reduce($site['tags'], function($carry, $tag) use ($q) {
                       return $carry || strpos(strtolower($tag), $q) !== false;
                   }, false);
        });
    }
    
    echo json_encode(array_values($result));
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to fetch sites data']);
} 