<?php

/**
 * Portofolio Perdi (NPM: 24312212)
 * Entry Point Aplikasi Laravel & PHP OOP
 * 
 * Mendukung eksekusi melalui Laravel Framework (jika vendor/ terpasang)
 * maupun PHP Built-in Server / XAMPP secara otomatis.
 */

define('LARAVEL_START', microtime(true));

// 1. Hanya aktifkan bootstrap Laravel jika proyek benar-benar Laravel (ada bootstrap/app.php)
if (file_exists(__DIR__ . '/../vendor/autoload.php') && file_exists(__DIR__ . '/../bootstrap/app.php')) {
    require __DIR__ . '/../vendor/autoload.php';

    $app = require_once __DIR__ . '/../bootstrap/app.php';
    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
    $response = $kernel->handle(
        $request = Illuminate\Http\Request::capture()
    )->send();
    $kernel->terminate($request, $response);
    exit;
}

// 2. Standalone / Hybrid Mode (Eksekusi Class Controller & Model secara Direct)
session_start();

function env($key, $default = null) {
    static $loaded = false;
    static $vars = [];

    if (!$loaded) {
        $envPath = __DIR__ . '/../.env';
        if (is_file($envPath)) {
            foreach (file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) as $line) {
                $line = trim($line);
                if ($line === '' || str_starts_with($line, '#') || strpos($line, '=') === false) {
                    continue;
                }
                [$name, $value] = array_map('trim', explode('=', $line, 2));
                $vars[$name] = trim($value, " \t\n\r\0\x0B\"'");
            }
        }
        $loaded = true;
    }

    $value = getenv($key);
    if ($value !== false && $value !== null) {
        return $value;
    }

    return $vars[$key] ?? $default;
}

function setSecurityHeaders() {
    header('X-Content-Type-Options: nosniff');
    header('X-Frame-Options: SAMEORIGIN');
    header('Referrer-Policy: strict-origin-when-cross-origin');
    header('Permissions-Policy: geolocation=(), microphone=(), camera=()');
    header("Content-Security-Policy: default-src 'self'; img-src 'self' data: https:; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com https://cdn.tailwindcss.com; font-src 'self' https://fonts.gstatic.com https://fonts.googleapis.com data:; script-src 'self' 'unsafe-inline' 'unsafe-eval' https://cdn.tailwindcss.com https://cdnjs.cloudflare.com; connect-src 'self' https://fonts.googleapis.com https://fonts.gstatic.com; frame-ancestors 'self'; object-src 'none'; base-uri 'self'; form-action 'self';");
}

function readSmtpResponse($socket) {
    $response = '';
    while (true) {
        $line = fgets($socket, 4096);
        if ($line === false) {
            break;
        }
        $response .= $line;
        if (preg_match('/^\d{3} /', $line) && strlen($line) >= 3) {
            $code = substr($line, 0, 3);
            if (strpos($line, "\r\n") !== false || strpos($line, "\n") !== false) {
                if (preg_match('/^\d{3} /', $line) && strlen($line) >= 4 && preg_match('/\r\n$/', $line) || preg_match('/\n$/', $line)) {
                    break;
                }
            }
        }
        if (strlen($response) > 0 && preg_match('/\r\n\d{3} /', $response)) {
            break;
        }
    }
    return trim($response);
}

function sendPortfolioSmtpEmail($toEmail, $toName, $subject, $body, $replyToEmail = null, $replyToName = null) {
    $mailer = strtolower((string) env('MAIL_MAILER', 'smtp'));
    if ($mailer !== 'smtp') {
        return false;
    }

    $host = env('MAIL_HOST', 'smtp.gmail.com');
    $port = (int) env('MAIL_PORT', 587);
    $username = env('MAIL_USERNAME', '');
    $password = env('MAIL_PASSWORD', '');
    $encryption = strtolower((string) env('MAIL_ENCRYPTION', 'tls'));
    $fromEmail = env('MAIL_FROM_ADDRESS', $username);
    $fromName = env('MAIL_FROM_NAME', 'Perdi Portfolio');

    if (empty($host) || empty($username) || empty($password)) {
        return false;
    }

    $socket = @fsockopen($host, $port, $errno, $errstr, 20);
    if ($socket === false) {
        return false;
    }

    stream_set_timeout($socket, 20);
    $response = readSmtpResponse($socket);
    if (!preg_match('/^220/', $response)) {
        fclose($socket);
        return false;
    }

    fwrite($socket, "EHLO localhost\r\n");
    $response = readSmtpResponse($socket);
    if (!preg_match('/^250/', $response)) {
        fclose($socket);
        return false;
    }

    if ($encryption === 'tls') {
        fwrite($socket, "STARTTLS\r\n");
        $response = readSmtpResponse($socket);
        if (!preg_match('/^220/', $response)) {
            fclose($socket);
            return false;
        }

        if (!stream_socket_enable_crypto($socket, true, STREAM_CRYPTO_METHOD_TLS_CLIENT)) {
            fclose($socket);
            return false;
        }

        fwrite($socket, "EHLO localhost\r\n");
        $response = readSmtpResponse($socket);
        if (!preg_match('/^250/', $response)) {
            fclose($socket);
            return false;
        }
    }

    fwrite($socket, "AUTH LOGIN\r\n");
    $response = readSmtpResponse($socket);
    if (!preg_match('/^334/', $response)) {
        fclose($socket);
        return false;
    }

    fwrite($socket, base64_encode($username) . "\r\n");
    $response = readSmtpResponse($socket);
    if (!preg_match('/^334/', $response)) {
        fclose($socket);
        return false;
    }

    fwrite($socket, base64_encode($password) . "\r\n");
    $response = readSmtpResponse($socket);
    if (!preg_match('/^235/', $response)) {
        fclose($socket);
        return false;
    }

    fwrite($socket, "MAIL FROM:<{$fromEmail}>\r\n");
    $response = readSmtpResponse($socket);
    if (!preg_match('/^250/', $response)) {
        fclose($socket);
        return false;
    }

    fwrite($socket, "RCPT TO:<{$toEmail}>\r\n");
    $response = readSmtpResponse($socket);
    if (!preg_match('/^250|^251/', $response)) {
        fclose($socket);
        return false;
    }

    fwrite($socket, "DATA\r\n");
    $response = readSmtpResponse($socket);
    if (!preg_match('/^354/', $response)) {
        fclose($socket);
        return false;
    }

    $headers = [];
    $headers[] = "From: {$fromName} <{$fromEmail}>";
    $headers[] = "To: {$toName} <{$toEmail}>";
    $headers[] = "Subject: =?UTF-8?B?" . base64_encode($subject) . "?=";
    $headers[] = "MIME-Version: 1.0";
    $headers[] = "Content-Type: text/plain; charset=UTF-8";
    if (!empty($replyToEmail)) {
        $replyName = $replyToName ?: $toName;
        $headers[] = "Reply-To: {$replyName} <{$replyToEmail}>";
    }
    $message = implode("\r\n", $headers) . "\r\n\r\n" . $body . "\r\n.";

    fwrite($socket, $message . "\r\n");
    $response = readSmtpResponse($socket);
    if (!preg_match('/^250/', $response)) {
        fclose($socket);
        return false;
    }

    fwrite($socket, "QUIT\r\n");
    fclose($socket);

    return true;
}

setSecurityHeaders();

// Autoload class dari app/
spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $base_dir = __DIR__ . '/../app/';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

// Helper Functions Laravel Compatibility
if (!function_exists('config')) {
    function config($key, $default = null) {
        $envMap = [
            'app.name' => env('APP_NAME', 'Portofolio'),
            'app.env' => env('APP_ENV', 'local'),
            'app.debug' => env('APP_DEBUG', false),
            'app.url' => env('APP_URL', 'https://yourdomain.com'),
            'mail.mailer' => env('MAIL_MAILER', 'smtp'),
            'mail.host' => env('MAIL_HOST', 'smtp.gmail.com'),
            'mail.port' => env('MAIL_PORT', 587),
            'mail.username' => env('MAIL_USERNAME', ''),
            'mail.password' => env('MAIL_PASSWORD', ''),
            'mail.encryption' => env('MAIL_ENCRYPTION', 'tls'),
            'mail.from.address' => env('MAIL_FROM_ADDRESS', ''),
            'mail.from.name' => env('MAIL_FROM_NAME', 'Perdi Portfolio'),
        ];

        if (isset($envMap[$key])) {
            return $envMap[$key];
        }

        static $configs = [];
        $parts = explode('.', $key);
        $file = $parts[0];
        if (!isset($configs[$file])) {
            $path = __DIR__ . '/../config/' . $file . '.php';
            $configs[$file] = file_exists($path) ? require $path : [];
        }
        $val = $configs[$file];
        for ($i = 1; $i < count($parts); $i++) {
            if (is_array($val) && array_key_exists($parts[$i], $val)) {
                $val = $val[$parts[$i]];
            } else {
                return $default;
            }
        }
        return $val;
    }
}

if (!function_exists('view')) {
    function view($view, $data = []) {
        $rendered = renderBlade($view, $data);
        return $rendered;
    }
}

if (!function_exists('asset')) {
    function asset($path) {
        return ltrim($path, '/');
    }
}

if (!function_exists('route')) {
    function route($name) {
        if ($name === 'home') return './';
        if ($name === 'contact.send') return './index.php?action=contact';
        return '#' . $name;
    }
}

if (!function_exists('response')) {
    function response($data = null, $status = 200) {
        return new class($data, $status) {
            public $data;
            public $status;

            public function __construct($data, $status) {
                $this->data = $data;
                $this->status = $status;
            }

            public function json($payload, $status = null) {
                return [
                    'status' => $status ?? $this->status,
                    'data' => $payload,
                ];
            }
        };
    }
}

if (!function_exists('old')) {
    function old($key, $default = '') {
        return htmlspecialchars($_SESSION['old'][$key] ?? $default);
    }
}

if (!function_exists('session')) {
    function session($key = null) {
        if ($key === null) return $_SESSION;
        $val = $_SESSION[$key] ?? null;
        if ($key === 'status') {
            unset($_SESSION['status']);
        }
        return $val;
    }
}

// Handle Form Submission (POST /contact)
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST' || (isset($_GET['action']) && $_GET['action'] === 'contact')) {
    $name = trim(strip_tags((string)($_POST['name'] ?? '')));
    $email = trim(strip_tags((string)($_POST['email'] ?? '')));
    $subject = trim(strip_tags((string)($_POST['subject'] ?? '')));
    $message = trim(strip_tags((string)($_POST['message'] ?? '')));
    $website = trim(strip_tags((string)($_POST['website'] ?? '')));

    // Honeypot check
    if (!empty($website)) {
        header('Location: ./#contact');
        exit;
    }

    if (!empty($name) && filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($message) >= 10 && strlen($message) <= 3000) {
        $mailSent = sendPortfolioSmtpEmail(
            env('DEV_EMAIL', 'perdi24312212@gmail.com'),
            'Perdi Portfolio',
            $subject ?: 'Pesan baru dari portofolio',
            "Nama: {$name}\nEmail: {$email}\n\n{$message}",
            $email,
            $name
        );

        $logDir = __DIR__ . '/../storage/logs';
        if (!is_dir($logDir)) {
            @mkdir($logDir, 0777, true);
        }
        $logMsg = date('[Y-m-d H:i:s]') . " Pesan baru dari $name <$email>: $subject - $message | SMTP=" . ($mailSent ? 'success' : 'failed') . "\n";
        @file_put_contents($logDir . '/contact.log', $logMsg, FILE_APPEND);

        if ($mailSent) {
            $_SESSION['status'] = "Terima kasih $name! Pesan Anda telah terkirim dan saya akan segera membalas.";
        } else {
            $_SESSION['status'] = "Terima kasih $name! Pesan Anda sudah tercatat, tetapi pengiriman email belum aktif karena SMTP belum dikonfigurasi. Silakan isi MAIL_USERNAME dan MAIL_PASSWORD Gmail App Password.";
        }
        unset($_SESSION['old']);
    } else {
        $_SESSION['old'] = [
            'name' => htmlspecialchars($name, ENT_QUOTES, 'UTF-8'),
            'email' => htmlspecialchars($email, ENT_QUOTES, 'UTF-8'),
            'subject' => htmlspecialchars($subject, ENT_QUOTES, 'UTF-8'),
            'message' => htmlspecialchars($message, ENT_QUOTES, 'UTF-8'),
        ];
        $_SESSION['status'] = "Mohon lengkapi seluruh formulir dengan benar sebelum mengirim.";
    }

    header('Location: ./?status=success#contact');
    exit;
}

// Panggil Controller Class Portofolio (OOP)
$portfolioModel = new \App\Models\PortfolioData();
$p = $portfolioModel->all();

// API Endpoint Standalone: GET /api/portfolio + related endpoints
$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

if ($method === 'GET' && preg_match('#^/api/portfolio(/.*)?$#', $uri)) {
    $controller = new \App\Http\Controllers\Api\PortfolioController();
    $path = trim($uri, '/');
    $segments = array_values(array_filter(explode('/', $path), fn($v) => $v !== ''));

    if (($segments[0] ?? null) === 'api' && ($segments[1] ?? null) === 'portfolio' && ($segments[2] ?? null) === 'profile') {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($controller->profile(), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        exit;
    }

    if (($segments[0] ?? null) === 'api' && ($segments[1] ?? null) === 'portfolio' && ($segments[2] ?? null) === 'skills') {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($controller->skills(), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        exit;
    }

    if (($segments[0] ?? null) === 'api' && ($segments[1] ?? null) === 'portfolio' && ($segments[2] ?? null) === 'projects') {
        if (($segments[3] ?? null) !== null) {
            $slug = $segments[3];
            $payload = $controller->projectDetail($slug);
            if (($payload['status'] ?? null) === 'error') {
                http_response_code(404);
            }
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
            exit;
        }

        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($controller->projects(), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        exit;
    }

    if (($segments[0] ?? null) === 'api' && ($segments[1] ?? null) === 'portfolio' && ($segments[2] ?? null) === 'experiences') {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($controller->experiences(), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        exit;
    }

    if (($segments[0] ?? null) === 'api' && ($segments[1] ?? null) === 'portfolio' && ($segments[2] ?? null) === 'certificates') {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($controller->certificates(), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        exit;
    }

    if ($uri === '/api/portfolio' || $uri === '/api/portfolio/') {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode([
            'status' => 'success',
            'message' => 'Portfolio API endpoint is available.',
            'data' => [
                'profile' => '/api/portfolio/profile',
                'skills' => '/api/portfolio/skills',
                'projects' => '/api/portfolio/projects',
                'experiences' => '/api/portfolio/experiences',
                'certificates' => '/api/portfolio/certificates',
            ],
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        exit;
    }

    header('Content-Type: application/json; charset=utf-8');
    http_response_code(404);
    echo json_encode([
        'status' => 'error',
        'message' => 'Endpoint not found.',
        'data' => null,
    ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    exit;
}

// Helper Collect
if (!function_exists('collect')) {
    function collect($items = []) {
        return new class($items) {
            protected $items;
            public function __construct($items) { $this->items = is_array($items) ? $items : []; }
            public function pluck($key) {
                $res = [];
                foreach ($this->items as $item) {
                    if (isset($item[$key])) $res[] = $item[$key];
                }
                return new self($res);
            }
            public function flatten() {
                $res = [];
                array_walk_recursive($this->items, function($a) use (&$res) { $res[] = $a; });
                return new self($res);
            }
            public function unique() { return new self(array_unique($this->items)); }
            public function values() { return array_values($this->items); }
            public function all() { return $this->items; }
        };
    }
}

// Render Views
function renderBlade($viewName, $data) {
    extract($data);
    $viewPath = __DIR__ . '/../resources/views/' . str_replace('.', '/', $viewName) . '.blade.php';
    if (!file_exists($viewPath)) {
        return "<!-- View not found: $viewName -->";
    }

    $content = file_get_contents($viewPath);


    // Proses @extends dan @section
    if (preg_match('/@extends\([\'"](.+?)[\'"]\)/', $content, $m)) {
        $layoutName = $m[1];
        // Ambil isi content
        if (preg_match('/@section\([\'"]content[\'"]\)(.*?)@endsection/s', $content, $sm)) {
            $sectionContent = $sm[1];
            // Resolve includes dalam sectionContent
            $sectionContent = preg_replace_callback('/@include\([\'"](.+?)[\'"]\)/', function ($im) use ($data) {
                return renderBlade($im[1], $data);
            }, $sectionContent);

            $layoutPath = __DIR__ . '/../resources/views/' . str_replace('.', '/', $layoutName) . '.blade.php';
            $layoutContent = file_get_contents($layoutPath);

            // Ganti @yield('content') dengan sectionContent
            $fullContent = str_replace("@yield('content')", $sectionContent, $layoutContent);

            // Ganti include di layout
            $fullContent = preg_replace_callback('/@include\([\'"](.+?)[\'"]\)/', function ($im) use ($data) {
                return renderBlade($im[1], $data);
            }, $fullContent);

            return evaluateBladePhp($fullContent, $data);
        }
    }

    return evaluateBladePhp($content, $data);
}

function evaluateBladePhp($template, $data) {
    extract($data);

    // Ganti directive umum Blade ke PHP
    $code = preg_replace('/\{\{\-\-(.+?)\-\-\}\}/s', '', $template);
    $code = preg_replace('/@php\s*(.*?)\s*@endphp/s', '<?php $1 ?>', $code);
    
    // Balanced parens untuk @if, @elseif, @foreach
    $code = preg_replace('/@if\s*\(((?:[^()]+|\([^()]*\))*)\)/', '<?php if ($1): ?>', $code);
    $code = preg_replace('/@elseif\s*\(((?:[^()]+|\([^()]*\))*)\)/', '<?php elseif ($1): ?>', $code);
    $code = preg_replace('/@else/', '<?php else: ?>', $code);
    $code = preg_replace('/@endif/', '<?php endif; ?>', $code);
    $code = preg_replace('/@foreach\s*\(((?:[^()]+|\([^()]*\))*)\)/', '<?php foreach ($1): ?>', $code);
    $code = preg_replace('/@endforeach/', '<?php endforeach; ?>', $code);
    $code = preg_replace('/@csrf/', '<input type="hidden" name="_token" value="standalone-token">', $code);
    $code = preg_replace('/@error\([\'"](.+?)[\'"]\)(.*?)@enderror/s', '', $code);

    $code = preg_replace('/@error\([\'"](.+?)[\'"]\)(.*?)@enderror/s', '', $code);

    // {{ ... }} tags
    $code = preg_replace('/\{\{\s*(.+?)\s*\}\}/', '<?= htmlspecialchars((string)($1), ENT_QUOTES, "UTF-8") ?>', $code);

    // Simpan ke temp file untuk eksekusi PHP
    $tmp = tempnam(sys_get_temp_dir(), 'blade_');
    file_put_contents($tmp, $code);
    ob_start();
    try {
        include $tmp;
    } catch (\Throwable $e) {
        echo "Rendering error: " . $e->getMessage();
    }
    $output = ob_get_clean();
    @unlink($tmp);
    return $output;
}

// Eksekusi render utama
echo renderBlade('portfolio', ['p' => $p, 'model' => $portfolioModel]);
